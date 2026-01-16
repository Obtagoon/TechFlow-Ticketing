<x-layouts.app title="Status Pembayaran">
<div class="min-h-[60vh] py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#16162a] rounded-2xl p-8 border border-white/10 text-center">
            @if($status === 'success')
                <!-- Success Icon -->
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-green-500/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Pembayaran Berhasil!</h1>
                <p class="text-gray-400 mb-6">{{ $message }}</p>
                
                @if($booking)
                    <div class="bg-[#0f0f1a] rounded-xl p-4 mb-6 text-left">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-400">Kode Booking</span>
                            <span class="text-white font-mono">{{ $booking->booking_code }}</span>
                        </div>
                        @if($booking->midtrans_payment_type)
                        <div class="flex justify-between">
                            <span class="text-gray-400">Metode Pembayaran</span>
                            <span class="text-white">{{ strtoupper($booking->midtrans_payment_type) }}</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="flex gap-3 justify-center">
                        <a href="{{ route('booking.ticket', $booking) }}" 
                           class="px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                            Lihat E-Ticket
                        </a>
                        <a href="{{ route('my-bookings') }}" 
                           class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                            Pesanan Saya
                        </a>
                    </div>
                @else
                    <a href="{{ route('my-bookings') }}" 
                       class="inline-block px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                        Lihat Pesanan Saya
                    </a>
                @endif

            @elseif($status === 'pending')
                <!-- Pending Icon -->
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-yellow-500/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Menunggu Pembayaran</h1>
                <p class="text-gray-400 mb-6">{{ $message }}</p>
                
                @if($booking)
                    <div class="bg-[#0f0f1a] rounded-xl p-4 mb-6 text-left">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-400">Kode Booking</span>
                            <span class="text-white font-mono">{{ $booking->booking_code }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Total</span>
                            <span class="text-white font-semibold">{{ $booking->formatted_price }}</span>
                        </div>
                    </div>
                    
                    <div class="flex gap-3 justify-center">
                        <a href="{{ route('booking.checkout', $booking) }}" 
                           class="px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                            Selesaikan Pembayaran
                        </a>
                        <a href="{{ route('my-bookings') }}" 
                           class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                            Kembali
                        </a>
                        <a href="{{ route('payment.check', $booking) }}" 
                           class="px-6 py-3 bg-blue-600/20 text-blue-400 font-semibold rounded-xl hover:bg-blue-600/30 transition-colors">
                            Cek Status Pembayaran
                        </a>
                    </div>
                @else
                    <a href="{{ route('my-bookings') }}" 
                       class="inline-block px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                        Lihat Pesanan Saya
                    </a>
                @endif

            @else
                <!-- Error Icon -->
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-red-500/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Pembayaran Gagal</h1>
                <p class="text-gray-400 mb-6">{{ $message }}</p>
                
                @if($booking)
                    <div class="flex gap-3 justify-center">
                        <a href="{{ route('booking.checkout', $booking) }}" 
                           class="px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                            Coba Lagi
                        </a>
                        <a href="{{ route('my-bookings') }}" 
                           class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                            Kembali
                        </a>
                    </div>
                @else
                    <a href="{{ route('home') }}" 
                       class="inline-block px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                        Kembali ke Beranda
                    </a>
                @endif
            @endif
        </div>
    </div>
</div>
</x-layouts.app>
