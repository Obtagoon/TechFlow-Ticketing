<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Checkout - ' . $booking->showtime->movie->title]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Checkout - ' . $booking->showtime->movie->title)]); ?>
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Rejection Notice -->
        <?php if($booking->status === 'rejected' && $booking->admin_notes): ?>
            <div class="bg-red-500/20 border border-red-500/50 rounded-xl p-4 mb-8">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div>
                        <p class="font-semibold text-red-400">Pembayaran Ditolak</p>
                        <p class="text-red-300 text-sm mt-1"><?php echo e($booking->admin_notes); ?></p>
                        <p class="text-red-300/70 text-sm mt-2">Silakan upload ulang bukti pembayaran yang valid.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Timer Warning -->
        <?php if($booking->status === 'pending'): ?>
        <div x-data="{ 
            timeLeft: Math.max(0, Math.floor((new Date('<?php echo e($booking->expires_at->toISOString()); ?>') - new Date()) / 1000)),
            formatTime(seconds) {
                const m = Math.floor(seconds / 60);
                const s = seconds % 60;
                return m + ':' + (s < 10 ? '0' : '') + s;
            }
        }" x-init="setInterval(() => { if(timeLeft > 0) timeLeft-- }, 1000)">
            <div class="bg-yellow-500/20 border border-yellow-500/50 rounded-xl p-4 mb-8 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-yellow-400">Selesaikan pembayaran dalam</span>
                </div>
                <span class="text-xl font-bold text-yellow-500" x-text="formatTime(timeLeft)"></span>
            </div>
        </div>
        <?php endif; ?>

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Order Summary -->
            <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                <h2 class="text-xl font-bold text-white mb-6">Detail Pesanan</h2>

                <!-- Movie Info -->
                <div class="flex gap-4 mb-6 pb-6 border-b border-white/10">
                    <img src="<?php echo e($booking->showtime->movie->poster_url); ?>" alt="<?php echo e($booking->showtime->movie->title); ?>" 
                         class="w-24 rounded-lg">
                    <div>
                        <h3 class="font-semibold text-white"><?php echo e($booking->showtime->movie->title); ?></h3>
                        <p class="text-sm text-gray-400 mt-1"><?php echo e($booking->showtime->studio->type_label); ?></p>
                        <p class="text-sm text-gray-400"><?php echo e($booking->showtime->movie->duration); ?> menit</p>
                    </div>
                </div>

                <!-- Details -->
                <div class="space-y-3 mb-6 pb-6 border-b border-white/10">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Kode Booking</span>
                        <span class="text-white font-mono"><?php echo e($booking->booking_code); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Bioskop</span>
                        <span class="text-white text-right"><?php echo e($booking->showtime->studio->cinema->name); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Studio</span>
                        <span class="text-white"><?php echo e($booking->showtime->studio->name); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal</span>
                        <span class="text-white"><?php echo e($booking->showtime->formatted_date); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jam</span>
                        <span class="text-white"><?php echo e($booking->showtime->formatted_time); ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Kursi</span>
                        <span class="text-white"><?php echo e($booking->seat_codes); ?></span>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Harga Tiket (<?php echo e($booking->total_seats); ?>x)</span>
                        <span class="text-white"><?php echo e($booking->showtime->formatted_price); ?></span>
                    </div>
                    <div class="flex justify-between pt-3 border-t border-white/10">
                        <span class="text-lg font-semibold text-white">Total Pembayaran</span>
                        <span class="text-lg font-bold text-[#e50914]"><?php echo e($booking->formatted_price); ?></span>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="space-y-6">
                <!-- Midtrans Payment -->
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <h2 class="text-xl font-bold text-white mb-4">Pembayaran</h2>
                    <p class="text-gray-400 text-sm mb-6">
                        Klik tombol "Bayar Sekarang" untuk membuka halaman pembayaran. Anda dapat memilih metode pembayaran seperti QRIS, Virtual Account, E-Wallet, atau Kartu Kredit.
                    </p>
                    
                    <!-- Payment Methods Info -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1.5 bg-[#0f0f1a] rounded-lg text-gray-400 text-xs border border-white/5">📱 QRIS</span>
                        <span class="px-3 py-1.5 bg-[#0f0f1a] rounded-lg text-gray-400 text-xs border border-white/5">🏦 Bank Transfer</span>
                        <span class="px-3 py-1.5 bg-[#0f0f1a] rounded-lg text-gray-400 text-xs border border-white/5">💳 E-Wallet</span>
                        <span class="px-3 py-1.5 bg-[#0f0f1a] rounded-lg text-gray-400 text-xs border border-white/5">💎 Credit Card</span>
                    </div>

                    <button type="button" 
                            id="pay-button"
                            class="w-full py-4 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl transition-all hover:opacity-90 hover:scale-[1.02] flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span>Bayar Sekarang</span>
                    </button>

                    <div id="payment-loading" class="hidden w-full py-4 bg-gray-600 text-white font-semibold rounded-xl flex items-center justify-center gap-2">
                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Memproses...</span>
                    </div>

                    <p id="payment-error" class="hidden text-red-400 text-sm mt-3 text-center"></p>

                    <!-- Cancel -->
                    <form id="cancel-checkout-<?php echo e($booking->id); ?>" action="<?php echo e(route('booking.cancel', $booking)); ?>" method="POST" class="hidden">
                        <?php echo csrf_field(); ?>
                    </form>
                    <button type="button" onclick="confirmModal('cancel-checkout-<?php echo e($booking->id); ?>')"
                            class="w-full py-3 text-gray-400 hover:text-red-400 transition-colors text-sm mt-4">
                        Batalkan Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Midtrans Snap JS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function() {
        const payButton = document.getElementById('pay-button');
        const loadingButton = document.getElementById('payment-loading');
        const errorText = document.getElementById('payment-error');
        
        // Show loading state
        payButton.classList.add('hidden');
        loadingButton.classList.remove('hidden');
        errorText.classList.add('hidden');
        
        // Create transaction
        fetch('<?php echo e(route("payment.create", $booking)); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                throw new Error(data.message || data.error);
            }
            
            // Open Snap popup
            window.snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    window.location.href = '<?php echo e(route("payment.finish")); ?>?order_id=' + result.order_id + '&transaction_status=' + result.transaction_status;
                },
                onPending: function(result) {
                    window.location.href = '<?php echo e(route("payment.unfinish")); ?>?order_id=' + result.order_id;
                },
                onError: function(result) {
                    window.location.href = '<?php echo e(route("payment.error")); ?>?order_id=' + result.order_id;
                },
                onClose: function() {
                    // User closed the popup without completing payment
                    payButton.classList.remove('hidden');
                    loadingButton.classList.add('hidden');
                }
            });
        })
        .catch(error => {
            console.error('Payment Error:', error);
            payButton.classList.remove('hidden');
            loadingButton.classList.add('hidden');
            errorText.textContent = error.message || 'Terjadi kesalahan. Silakan coba lagi.';
            errorText.classList.remove('hidden');
        });
    });
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>

<?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/booking/checkout.blade.php ENDPATH**/ ?>