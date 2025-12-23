<x-layouts.admin title="Detail Pemesanan">
<div class="max-w-3xl">
    <a href="/admin/bookings" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-white">Detail Pemesanan</h2>
            <span class="px-3 py-1 rounded-full text-sm font-medium bg-blue-500/20 text-blue-400">Menunggu Konfirmasi</span>
        </div>

        <div class="p-6 space-y-6">
            <!-- Booking Info -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-500 text-sm">Kode Booking</p>
                    <p class="text-white font-mono text-lg">BK20241222002</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Tanggal Booking</p>
                    <p class="text-white">22 Des 2024, 10:30</p>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- User Info -->
            <div>
                <h3 class="font-medium text-white mb-3">Informasi Pemesan</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500 text-sm">Nama</p>
                        <p class="text-white">Siti Nurhaliza</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Email</p>
                        <p class="text-white">siti.nurhaliza@email.com</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Telepon</p>
                        <p class="text-white">081234567890</p>
                    </div>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Movie & Showtime -->
            <div>
                <h3 class="font-medium text-white mb-3">Detail Film</h3>
                <div class="flex gap-4">
                    <img src="https://image.tmdb.org/t/p/w200/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg" class="w-20 h-28 object-cover rounded-lg">
                    <div class="space-y-2">
                        <p class="text-white font-medium">Spider-Man: No Way Home</p>
                        <p class="text-gray-400 text-sm">Cinema XXI Gandaria City</p>
                        <p class="text-gray-400 text-sm">Studio 3 (IMAX)</p>
                        <p class="text-gray-400 text-sm">Minggu, 22 Des 2024 - 17:00</p>
                    </div>
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Seats & Price -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-500 text-sm">Kursi</p>
                    <p class="text-white text-lg font-medium">B5, B6</p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Pembayaran</p>
                    <p class="text-[#e50914] text-xl font-bold">Rp 100.000</p>
                </div>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Metode Pembayaran</p>
                <p class="text-white">TRANSFER BCA</p>
            </div>

            <!-- Payment Proof Section -->
            <hr class="border-white/10">
            <div>
                <h3 class="font-medium text-white mb-3">Bukti Pembayaran</h3>
                <div x-data="{ showModal: false }">
                    <img src="https://via.placeholder.com/300x400/1a1a2e/ffffff?text=Bukti+Transfer" 
                         alt="Bukti Pembayaran" 
                         class="max-w-xs rounded-lg border border-white/10 cursor-pointer hover:opacity-80 transition-opacity"
                         @click="showModal = true">
                    
                    <p class="text-gray-400 text-sm mt-2">
                        <span class="text-gray-500">Catatan:</span> Transfer dari rekening a.n. Siti Nurhaliza
                    </p>

                    <!-- Modal for full image -->
                    <div x-show="showModal" 
                         x-cloak
                         class="fixed inset-0 z-50 flex items-center justify-center bg-black/80"
                         @click="showModal = false"
                         @keydown.escape.window="showModal = false">
                        <div class="max-w-4xl max-h-[90vh] p-4" @click.stop>
                            <img src="https://via.placeholder.com/600x800/1a1a2e/ffffff?text=Bukti+Transfer" 
                                 alt="Bukti Pembayaran" 
                                 class="max-w-full max-h-[85vh] rounded-lg">
                            <button @click="showModal = false" 
                                    class="absolute top-4 right-4 text-white hover:text-gray-300">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions for Waiting Confirmation -->
            <div class="pt-4 border-t border-white/10" x-data="{ showRejectForm: false }">
                <h3 class="font-medium text-white mb-3">Verifikasi Pembayaran</h3>
                
                <div class="flex gap-4" x-show="!showRejectForm">
                    <button type="button" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:opacity-90 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Approve Pembayaran
                    </button>
                    <button type="button" @click="showRejectForm = true" 
                            class="px-6 py-2 bg-red-600 text-white rounded-lg hover:opacity-90 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Tolak Pembayaran
                    </button>
                </div>

                <!-- Reject Form -->
                <div x-show="showRejectForm" x-cloak class="bg-red-500/10 border border-red-500/30 rounded-lg p-4">
                    <form action="#" method="POST">
                        <div class="mb-4">
                            <label class="block text-sm text-red-400 mb-2">Alasan Penolakan *</label>
                            <textarea name="admin_notes" rows="3" required
                                      class="w-full px-4 py-2 bg-[#0f0f1a] border border-red-500/30 rounded-lg text-white placeholder-gray-500 focus:border-red-500 focus:outline-none"
                                      placeholder="Contoh: Bukti transfer tidak jelas, nominal tidak sesuai, dll."></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:opacity-90">
                                Konfirmasi Tolak
                            </button>
                            <button type="button" @click="showRejectForm = false" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:opacity-90">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.admin>