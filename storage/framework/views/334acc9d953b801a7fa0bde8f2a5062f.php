<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Status Pembayaran']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Status Pembayaran']); ?>
<div class="min-h-[60vh] py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#16162a] rounded-2xl p-8 border border-white/10 text-center">
            <?php if($status === 'success'): ?>
                <!-- Success Icon -->
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-green-500/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Pembayaran Berhasil!</h1>
                <p class="text-gray-400 mb-6"><?php echo e($message); ?></p>
                
                <?php if($booking): ?>
                    <div class="bg-[#0f0f1a] rounded-xl p-4 mb-6 text-left">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-400">Kode Booking</span>
                            <span class="text-white font-mono"><?php echo e($booking->booking_code); ?></span>
                        </div>
                        <?php if($booking->midtrans_payment_type): ?>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Metode Pembayaran</span>
                            <span class="text-white"><?php echo e(strtoupper($booking->midtrans_payment_type)); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex gap-3 justify-center">
                        <a href="<?php echo e(route('booking.ticket', $booking)); ?>" 
                           class="px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                            Lihat E-Ticket
                        </a>
                        <a href="<?php echo e(route('my-bookings')); ?>" 
                           class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                            Pesanan Saya
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('my-bookings')); ?>" 
                       class="inline-block px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                        Lihat Pesanan Saya
                    </a>
                <?php endif; ?>

            <?php elseif($status === 'pending'): ?>
                <!-- Pending Icon -->
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-yellow-500/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Menunggu Pembayaran</h1>
                <p class="text-gray-400 mb-6"><?php echo e($message); ?></p>
                
                <?php if($booking): ?>
                    <div class="bg-[#0f0f1a] rounded-xl p-4 mb-6 text-left">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-400">Kode Booking</span>
                            <span class="text-white font-mono"><?php echo e($booking->booking_code); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Total</span>
                            <span class="text-white font-semibold"><?php echo e($booking->formatted_price); ?></span>
                        </div>
                    </div>
                    
                    <div class="flex gap-3 justify-center">
                        <a href="<?php echo e(route('booking.checkout', $booking)); ?>" 
                           class="px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                            Selesaikan Pembayaran
                        </a>
                        <a href="<?php echo e(route('my-bookings')); ?>" 
                           class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                            Kembali
                        </a>
                        <a href="<?php echo e(route('payment.check', $booking)); ?>" 
                           class="px-6 py-3 bg-blue-600/20 text-blue-400 font-semibold rounded-xl hover:bg-blue-600/30 transition-colors">
                            Cek Status Pembayaran
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('my-bookings')); ?>" 
                       class="inline-block px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                        Lihat Pesanan Saya
                    </a>
                <?php endif; ?>

            <?php else: ?>
                <!-- Error Icon -->
                <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-red-500/20 flex items-center justify-center">
                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Pembayaran Gagal</h1>
                <p class="text-gray-400 mb-6"><?php echo e($message); ?></p>
                
                <?php if($booking): ?>
                    <div class="flex gap-3 justify-center">
                        <a href="<?php echo e(route('booking.checkout', $booking)); ?>" 
                           class="px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                            Coba Lagi
                        </a>
                        <a href="<?php echo e(route('my-bookings')); ?>" 
                           class="px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                            Kembali
                        </a>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('home')); ?>" 
                       class="inline-block px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                        Kembali ke Beranda
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
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
<?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/booking/payment-status.blade.php ENDPATH**/ ?>