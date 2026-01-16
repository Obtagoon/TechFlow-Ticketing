<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Bantuan','description' => 'Pusat bantuan TechFlow Ticketing - Temukan jawaban untuk pertanyaan Anda tentang pemesanan tiket bioskop']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Bantuan','description' => 'Pusat bantuan TechFlow Ticketing - Temukan jawaban untuk pertanyaan Anda tentang pemesanan tiket bioskop']); ?>
    <!-- FAQ Section -->
    <section class="py-16 mt-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-[#e50914] to-[#b20710] rounded-2xl mb-6 shadow-lg shadow-[#e50914]/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold mb-4 pb-1 bg-gradient-to-r from-white via-gray-200 to-gray-400 bg-clip-text text-transparent">
                    Pertanyaan yang Sering Diajukan
                </h1>
                <p class="text-gray-400 max-w-xl mx-auto">Temukan jawaban untuk pertanyaan umum seputar pemesanan tiket di TechFlow Ticketing</p>
            </div>
            
            <div class="space-y-4" x-data="{ activeIndex: null }">
                <!-- FAQ 1 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 0 ? null : 0" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-[#e50914]/20 to-[#e50914]/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-[#e50914]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Bagaimana cara memesan tiket bioskop?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 0 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 0" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="space-y-3">
                                <div class="flex items-start gap-3 p-3 bg-[#0f0f1a]/80 rounded-xl border border-white/5">
                                    <div class="w-6 h-6 rounded-full bg-[#e50914] text-white text-xs font-bold flex items-center justify-center flex-shrink-0">1</div>
                                    <p class="text-gray-300 text-sm">Pilih film dari halaman <a href="<?php echo e(route('movies.index')); ?>" class="text-[#e50914] hover:underline font-medium">Film</a></p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-[#0f0f1a]/80 rounded-xl border border-white/5">
                                    <div class="w-6 h-6 rounded-full bg-[#e50914] text-white text-xs font-bold flex items-center justify-center flex-shrink-0">2</div>
                                    <p class="text-gray-300 text-sm">Pilih jadwal tayang yang sesuai</p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-[#0f0f1a]/80 rounded-xl border border-white/5">
                                    <div class="w-6 h-6 rounded-full bg-[#e50914] text-white text-xs font-bold flex items-center justify-center flex-shrink-0">3</div>
                                    <p class="text-gray-300 text-sm">Pilih kursi yang tersedia <span class="text-gray-500">(maksimal 6 kursi per transaksi)</span></p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-[#0f0f1a]/80 rounded-xl border border-white/5">
                                    <div class="w-6 h-6 rounded-full bg-[#e50914] text-white text-xs font-bold flex items-center justify-center flex-shrink-0">4</div>
                                    <p class="text-gray-300 text-sm">Klik "Bayar Sekarang" dan pilih metode pembayaran</p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-[#0f0f1a]/80 rounded-xl border border-white/5">
                                    <div class="w-6 h-6 rounded-full bg-[#e50914] text-white text-xs font-bold flex items-center justify-center flex-shrink-0">5</div>
                                    <p class="text-gray-300 text-sm">Selesaikan pembayaran melalui popup Midtrans</p>
                                </div>
                                <div class="flex items-start gap-3 p-3 bg-[#0f0f1a]/80 rounded-xl border border-white/5">
                                    <div class="w-6 h-6 rounded-full bg-[#e50914] text-white text-xs font-bold flex items-center justify-center flex-shrink-0">6</div>
                                    <p class="text-gray-300 text-sm">E-ticket langsung tersedia di menu "Tiket Saya" setelah pembayaran berhasil</p>
                                </div>
                            </div>
                            <div class="mt-4 p-3 bg-yellow-500/10 border border-yellow-500/20 rounded-lg">
                                <p class="text-yellow-400 text-xs">⏱️ Batas waktu pembayaran: <strong>10 menit</strong> setelah memilih kursi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 1 ? null : 1" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500/20 to-green-500/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Metode pembayaran apa saja yang tersedia?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 1" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                <div class="bg-[#0f0f1a]/80 rounded-xl p-4 border border-white/5 hover:border-green-500/30 transition-colors text-center">
                                    <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center mx-auto mb-3">
                                        <span class="text-2xl">💚</span>
                                    </div>
                                    <span class="text-sm font-medium text-white">GoPay</span>
                                </div>
                                <div class="bg-[#0f0f1a]/80 rounded-xl p-4 border border-white/5 hover:border-orange-500/30 transition-colors text-center">
                                    <div class="w-12 h-12 rounded-xl bg-orange-500/20 flex items-center justify-center mx-auto mb-3">
                                        <span class="text-2xl">🧡</span>
                                    </div>
                                    <span class="text-sm font-medium text-white">ShopeePay</span>
                                </div>
                                <div class="bg-[#0f0f1a]/80 rounded-xl p-4 border border-white/5 hover:border-purple-500/30 transition-colors text-center">
                                    <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center mx-auto mb-3">
                                        <span class="text-2xl">🔲</span>
                                    </div>
                                    <span class="text-sm font-medium text-white">QRIS</span>
                                </div>
                                <div class="bg-[#0f0f1a]/80 rounded-xl p-4 border border-white/5 hover:border-blue-500/30 transition-colors text-center">
                                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center mx-auto mb-3">
                                        <span class="text-2xl">🏦</span>
                                    </div>
                                    <span class="text-sm font-medium text-white">Virtual Account</span>
                                    <p class="text-xs text-gray-500 mt-1">BCA, BNI, BRI, Mandiri</p>
                                </div>
                                <div class="bg-[#0f0f1a]/80 rounded-xl p-4 border border-white/5 hover:border-cyan-500/30 transition-colors text-center">
                                    <div class="w-12 h-12 rounded-xl bg-cyan-500/20 flex items-center justify-center mx-auto mb-3">
                                        <span class="text-2xl">💳</span>
                                    </div>
                                    <span class="text-sm font-medium text-white">Kartu Kredit/Debit</span>
                                    <p class="text-xs text-gray-500 mt-1">Visa, Mastercard, JCB</p>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 text-center mt-3">Pembayaran diproses melalui Midtrans Payment Gateway</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 2 ? null : 2" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500/20 to-blue-500/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Bagaimana cara melihat tiket saya?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 2" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-xl p-4 border border-blue-500/20">
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    Klik menu <span class="inline-flex items-center gap-1 bg-white/10 px-2 py-0.5 rounded text-white font-medium text-xs">Tiket Saya</span> di navigasi atas setelah login. Anda dapat melihat semua tiket beserta statusnya dan mengunduh <strong class="text-blue-400">e-ticket PDF</strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 3 ? null : 3" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-500/20 to-yellow-500/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Apakah saya bisa membatalkan tiket?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 3" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="bg-gradient-to-r from-yellow-500/10 to-orange-500/10 rounded-xl p-4 border border-yellow-500/20">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-yellow-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01"/>
                                        </svg>
                                    </div>
                                    <div class="text-gray-300 text-sm leading-relaxed">
                                        <p>Pembatalan dapat dilakukan melalui halaman <strong class="text-white">"Tiket Saya"</strong> selama:</p>
                                        <ul class="mt-2 space-y-1 text-gray-400">
                                            <li>• Status masih <span class="text-yellow-400">menunggu pembayaran</span></li>
                                            <li>• Status masih <span class="text-yellow-400">menunggu verifikasi</span></li>
                                        </ul>
                                        <p class="mt-2 text-gray-500 text-xs">Tiket yang sudah dikonfirmasi tidak dapat dibatalkan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 4 ? null : 4" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500/20 to-purple-500/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Berapa lama konfirmasi pembayaran?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 4" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 rounded-xl p-5 border border-green-500/20">
                                <div class="flex items-center justify-center gap-4">
                                    <div class="w-16 h-16 rounded-full bg-green-500/20 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-4xl font-bold bg-gradient-to-r from-green-500 to-emerald-500 bg-clip-text text-transparent">Instan</div>
                                        <div class="text-sm text-gray-400 mt-1">Konfirmasi Otomatis</div>
                                    </div>
                                </div>
                                <p class="text-center text-gray-400 text-sm mt-4">Pembayaran melalui Midtrans dikonfirmasi secara otomatis. E-ticket langsung tersedia setelah pembayaran berhasil.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 5 ? null : 5" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500/20 to-cyan-500/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-cyan-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 11h2v2H3v-2zm0-4h2v2H3V7zm0 8h2v2H3v-2zm4-4h2v2H7v-2zm0-4h2v2H7V7zm0 8h2v2H7v-2zm4-4h2v2h-2v-2zm0-4h2v2h-2V7zm0 8h2v2h-2v-2zm4-4h2v2h-2v-2zm0-4h2v2h-2V7zm0 8h2v2h-2v-2zm4-4h2v2h-2v-2zm0-4h2v2h-2V7zm0 8h2v2h-2v-2z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Bagaimana cara menunjukkan tiket di bioskop?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 5 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 5" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="flex items-center gap-4 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-xl p-4 border border-cyan-500/20">
                                <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M3 11h2v2H3v-2zm0-4h2v2H3V7zm0 8h2v2H3v-2zm4-4h2v2H7v-2zm0-4h2v2H7V7zm0 8h2v2H7v-2zm4-4h2v2h-2v-2zm0-4h2v2h-2V7zm0 8h2v2h-2v-2zm4-4h2v2h-2v-2zm0-4h2v2h-2V7zm0 8h2v2h-2v-2zm4-4h2v2h-2v-2zm0-4h2v2h-2V7zm0 8h2v2h-2v-2z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    Tunjukkan <strong class="text-cyan-400">QR Code</strong> dari e-ticket kepada petugas. QR Code tersedia di halaman tiket atau file PDF yang telah diunduh.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="group bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 overflow-hidden hover:border-[#e50914]/30 transition-all duration-300">
                    <button @click="activeIndex = activeIndex === 6 ? null : 6" class="w-full px-6 py-5 text-left flex items-center justify-between hover:bg-white/5 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-pink-500/20 to-pink-500/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-100">Apakah bisa memilih kursi tertentu?</span>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-400 transition-transform duration-300" :class="{ 'rotate-180 text-[#e50914]': activeIndex === 6 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div x-show="activeIndex === 6" x-collapse>
                        <div class="px-6 pb-6 pt-0 ml-14">
                            <div class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 rounded-xl p-4 border border-green-500/20">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <div class="text-gray-300 text-sm">
                                        <p><strong class="text-green-400">Ya, tentu!</strong> Anda bebas memilih kursi dari denah studio.</p>
                                        <p class="text-gray-500 text-xs mt-1">Maksimal 6 kursi per transaksi. Kursi yang sudah dipesan tidak dapat dipilih.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gradient-to-b from-transparent to-[#16162a]/30">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold mb-3">Butuh Bantuan Lainnya?</h2>
                <p class="text-gray-400">Hubungi tim support kami yang siap membantu</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Email -->
                <a href="mailto:info@techflowticketing.com" class="group relative bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 p-6 text-center overflow-hidden hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-1">Email</h3>
                        <p class="text-gray-400 text-sm">info@techflowticketing.com</p>
                    </div>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281953156184" target="_blank" class="group relative bg-gradient-to-br from-[#1e1e35] to-[#16162a] rounded-2xl border border-white/10 p-6 text-center overflow-hidden hover:border-[#25D366]/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#25D366]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#25D366]/20 to-[#128C7E]/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-1">WhatsApp</h3>
                        <p class="text-gray-400 text-sm">0812-3456-7890</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
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
<?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/help.blade.php ENDPATH**/ ?>