<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Transaction;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Create Midtrans transaction and get Snap Token
     */
    public function createTransaction(Booking $booking)
    {
        // Verify ownership
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        // Check if already paid
        if ($booking->status === 'paid') {
            return response()->json(['error' => 'Pesanan sudah dibayar.'], 400);
        }

        // Check if expired
        if ($booking->isExpired()) {
            $booking->update(['status' => 'expired']);
            return response()->json(['error' => 'Waktu pemesanan sudah habis.'], 400);
        }

        // Load relations
        $booking->load(['user', 'showtime.movie', 'showtime.studio.cinema', 'seats']);

        // Build transaction parameters
        $params = [
            'transaction_details' => [
                'order_id' => $booking->booking_code . '-' . time(),
                'gross_amount' => (int) $booking->total_price,
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
                'phone' => $booking->user->phone ?? '',
            ],
            'item_details' => [
                [
                    'id' => 'TICKET-' . $booking->showtime_id,
                    'price' => (int) ($booking->total_price / $booking->total_seats),
                    'quantity' => $booking->total_seats,
                    'name' => substr($booking->showtime->movie->title, 0, 50),
                ],
            ],
            'callbacks' => [
                'finish' => route('payment.finish'),
                'unfinish' => route('payment.unfinish'),
                'error' => route('payment.error'),
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            
            // Save snap token to booking
            $booking->update([
                'snap_token' => $snapToken,
                'midtrans_transaction_id' => $params['transaction_details']['order_id'],
            ]);

            return response()->json([
                'snap_token' => $snapToken,
                'client_key' => config('midtrans.client_key'),
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error', [
                'message' => $e->getMessage(),
                'booking_id' => $booking->id,
            ]);
            return response()->json([
                'error' => 'Gagal membuat transaksi pembayaran.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Handle Midtrans webhook notification
     */
    public function handleNotification(Request $request)
    {
        try {
            $notification = new Notification();
            
            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;
            $paymentType = $notification->payment_type;
            $fraudStatus = $notification->fraud_status ?? null;

            Log::info('Midtrans Notification', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'payment_type' => $paymentType,
                'fraud_status' => $fraudStatus,
            ]);

            // Find booking by midtrans_transaction_id
            $booking = Booking::where('midtrans_transaction_id', $orderId)->first();

            if (!$booking) {
                Log::warning('Booking not found for order_id: ' . $orderId);
                return response()->json(['status' => 'booking not found'], 404);
            }

            // Update payment type
            $booking->update(['midtrans_payment_type' => $paymentType]);

            // Handle transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $this->markAsPaid($booking, $paymentType);
                }
            } elseif ($transactionStatus == 'settlement') {
                $this->markAsPaid($booking, $paymentType);
            } elseif ($transactionStatus == 'pending') {
                $booking->update(['status' => 'pending']);
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                if ($transactionStatus == 'expire') {
                    $booking->update(['status' => 'expired']);
                } else {
                    $booking->update(['status' => 'cancelled']);
                }
            }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Mark booking as paid
     */
    private function markAsPaid(Booking $booking, string $paymentType): void
    {
        $booking->update([
            'status' => 'paid',
            'payment_method' => $paymentType,
            'paid_at' => now(),
        ]);
        
        // Send confirmation email
        try {
            \Illuminate\Support\Facades\Mail::to($booking->user->email)
                ->send(new \App\Mail\BookingConfirmation($booking));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send booking confirmation email', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Handle finish redirect (payment success)
     */
    /**
     * Handle finish redirect (payment success)
     */
    public function finish(Request $request)
    {
        $orderId = $request->get('order_id');
        
        $booking = null;
        if ($orderId) {
            $booking = Booking::where('midtrans_transaction_id', $orderId)->first();
            
            // Auto update status
            if ($booking) {
                $this->updateBookingStatusGeneric($booking);
            }
        }

        return view('booking.payment-status', [
            'status' => 'success',
            'booking' => $booking,
            'message' => 'Pembayaran berhasil! E-Ticket Anda sudah tersedia.',
        ]);
    }

    /**
     * Handle unfinish redirect (payment pending)
     */
    public function unfinish(Request $request)
    {
        $orderId = $request->get('order_id');
        
        $booking = null;
        if ($orderId) {
            $booking = Booking::where('midtrans_transaction_id', $orderId)->first();

            // Auto update status
            if ($booking) {
                $this->updateBookingStatusGeneric($booking);
            }
        }

        return view('booking.payment-status', [
            'status' => 'pending',
            'booking' => $booking,
            'message' => 'Pembayaran belum selesai. Silakan selesaikan pembayaran Anda.',
        ]);
    }

    /**
     * Handle error redirect (payment failed)
     */
    public function error(Request $request)
    {
        $orderId = $request->get('order_id');
        
        $booking = null;
        if ($orderId) {
            $booking = Booking::where('midtrans_transaction_id', $orderId)->first();
        }

        return view('booking.payment-status', [
            'status' => 'error',
            'booking' => $booking,
            'message' => 'Pembayaran gagal. Silakan coba lagi.',
        ]);
    }

    /**
     * Check payment status manually
     */
    public function checkStatus(Booking $booking)
    {
        // Verify ownership
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }

        if (!$booking->midtrans_transaction_id) {
            return back()->with('error', 'Belum ada transaksi pembayaran.');
        }

        $result = $this->updateBookingStatusGeneric($booking);

        if ($result['status'] === 'success') {
            return back()->with('success', 'Status pembayaran berhasil diperbarui.');
        } elseif ($result['status'] === 'pending') {
            return back()->with('info', 'Pembayaran masih menunggu (pending).');
        } else {
            return back()->with('error', $result['message']);
        }
    }

    /**
     * Generic method to update booking status from Midtrans
     */
    private function updateBookingStatusGeneric(Booking $booking)
    {
        try {
            $status = Transaction::status($booking->midtrans_transaction_id);
            
            $transactionStatus = $status->transaction_status;
            $paymentType = $status->payment_type;
            $fraudStatus = $status->fraud_status ?? null;

            // Update payment type
            $booking->update(['midtrans_payment_type' => $paymentType]);

            // Handle transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $this->markAsPaid($booking, $paymentType);
                }
            } elseif ($transactionStatus == 'settlement') {
                $this->markAsPaid($booking, $paymentType);
            } elseif ($transactionStatus == 'pending') {
                $booking->update(['status' => 'pending']);
                return ['status' => 'pending'];
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                if ($transactionStatus == 'expire') {
                    $booking->update(['status' => 'expired']);
                } else {
                    $booking->update(['status' => 'cancelled']);
                }
                return ['status' => 'error', 'message' => 'Pembayaran gagal atau kadaluarsa.'];
            }

            return ['status' => 'success'];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => 'Gagal mengecek status: ' . $e->getMessage()];
        }
    }
}
