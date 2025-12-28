<x-layouts.app :title="'Checkout - ' . $booking->showtime->movie->title">
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Rejection Notice -->
        @if($booking->status === 'rejected' && $booking->admin_notes)
            <div class="bg-red-500/20 border border-red-500/50 rounded-xl p-4 mb-8">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <div>
                        <p class="font-semibold text-red-400">Pembayaran Ditolak</p>
                        <p class="text-red-300 text-sm mt-1">{{ $booking->admin_notes }}</p>
                        <p class="text-red-300/70 text-sm mt-2">Silakan upload ulang bukti pembayaran yang valid.</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Timer Warning -->
        @if($booking->status === 'pending')
        <div x-data="{ 
            timeLeft: Math.max(0, Math.floor((new Date('{{ $booking->expires_at->toISOString() }}') - new Date()) / 1000)),
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
        @endif

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Order Summary -->
            <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                <h2 class="text-xl font-bold text-white mb-6">Detail Pesanan</h2>

                <!-- Movie Info -->
                <div class="flex gap-4 mb-6 pb-6 border-b border-white/10">
                    <img src="{{ $booking->showtime->movie->poster_url }}" alt="{{ $booking->showtime->movie->title }}" 
                         class="w-24 rounded-lg">
                    <div>
                        <h3 class="font-semibold text-white">{{ $booking->showtime->movie->title }}</h3>
                        <p class="text-sm text-gray-400 mt-1">{{ $booking->showtime->studio->type_label }}</p>
                        <p class="text-sm text-gray-400">{{ $booking->showtime->movie->duration }} menit</p>
                    </div>
                </div>

                <!-- Details -->
                <div class="space-y-3 mb-6 pb-6 border-b border-white/10">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Kode Booking</span>
                        <span class="text-white font-mono">{{ $booking->booking_code }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Bioskop</span>
                        <span class="text-white text-right">{{ $booking->showtime->studio->cinema->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Studio</span>
                        <span class="text-white">{{ $booking->showtime->studio->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Tanggal</span>
                        <span class="text-white">{{ $booking->showtime->formatted_date }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jam</span>
                        <span class="text-white">{{ $booking->showtime->formatted_time }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Kursi</span>
                        <span class="text-white">{{ $booking->seat_codes }}</span>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Harga Tiket ({{ $booking->total_seats }}x)</span>
                        <span class="text-white">{{ $booking->showtime->formatted_price }}</span>
                    </div>
                    <div class="flex justify-between pt-3 border-t border-white/10">
                        <span class="text-lg font-semibold text-white">Total Pembayaran</span>
                        <span class="text-lg font-bold text-[#e50914]">{{ $booking->formatted_price }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Section -->
            <div class="space-y-6">
                <!-- Bank Transfer Info -->
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <h2 class="text-xl font-bold text-white mb-4">Informasi Pembayaran</h2>
                    <p class="text-gray-400 text-sm mb-4">Transfer ke salah satu rekening berikut:</p>
                    
                    <div class="space-y-4">
                        <!-- BCA -->
                        <div class="bg-[#0f0f1a] rounded-xl p-4 border border-white/5">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-12 h-8 bg-white rounded flex items-center justify-center">
                                    <span class="text-blue-600 font-bold text-sm">BCA</span>
                                </div>
                                <span class="text-white font-medium">Bank BCA</span>
                            </div>
                            <p class="text-gray-400 text-sm">No. Rekening</p>
                            <p class="text-white font-mono text-lg">1234567890</p>
                            <p class="text-gray-400 text-sm mt-1">a.n. TechFlow Cinema</p>
                        </div>

                        <!-- Mandiri -->
                        <div class="bg-[#0f0f1a] rounded-xl p-4 border border-white/5">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-12 h-8 bg-white rounded flex items-center justify-center">
                                    <span class="text-yellow-600 font-bold text-xs">Mandiri</span>
                                </div>
                                <span class="text-white font-medium">Bank Mandiri</span>
                            </div>
                            <p class="text-gray-400 text-sm">No. Rekening</p>
                            <p class="text-white font-mono text-lg">0987654321</p>
                            <p class="text-gray-400 text-sm mt-1">a.n. TechFlow Cinema</p>
                        </div>

                        <!-- BNI -->
                        <div class="bg-[#0f0f1a] rounded-xl p-4 border border-white/5">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-12 h-8 bg-white rounded flex items-center justify-center">
                                    <span class="text-orange-600 font-bold text-sm">BNI</span>
                                </div>
                                <span class="text-white font-medium">Bank BNI</span>
                            </div>
                            <p class="text-gray-400 text-sm">No. Rekening</p>
                            <p class="text-white font-mono text-lg">1122334455</p>
                            <p class="text-gray-400 text-sm mt-1">a.n. TechFlow Cinema</p>
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-blue-500/10 border border-blue-500/30 rounded-lg">
                        <p class="text-blue-400 text-sm">
                            <strong>Penting:</strong> Pastikan transfer sesuai nominal {{ $booking->formatted_price }}
                        </p>
                    </div>
                </div>

                <!-- Upload Payment Proof -->
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <h2 class="text-xl font-bold text-white mb-4">Upload Bukti Pembayaran</h2>

                    <form action="{{ route('booking.pay', $booking) }}" method="POST" enctype="multipart/form-data" 
                          x-data="{ 
                              method: '{{ old('payment_method', $booking->payment_method) }}',
                              preview: null,
                              handleFileSelect(e) {
                                  const file = e.target.files[0];
                                  if (file) {
                                      this.preview = URL.createObjectURL(file);
                                  }
                              }
                          }">
                        @csrf
                        
                        <!-- Bank Selection -->
                        <div class="mb-4">
                            <label class="block text-sm text-gray-400 mb-2">Bank Tujuan Transfer</label>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method" value="bca" x-model="method" class="sr-only peer">
                                    <div class="p-3 rounded-lg border border-white/10 text-center peer-checked:border-[#e50914] peer-checked:bg-[#e50914]/10 transition-colors">
                                        <span class="text-white text-sm">BCA</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method" value="mandiri" x-model="method" class="sr-only peer">
                                    <div class="p-3 rounded-lg border border-white/10 text-center peer-checked:border-[#e50914] peer-checked:bg-[#e50914]/10 transition-colors">
                                        <span class="text-white text-sm">Mandiri</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="payment_method" value="bni" x-model="method" class="sr-only peer">
                                    <div class="p-3 rounded-lg border border-white/10 text-center peer-checked:border-[#e50914] peer-checked:bg-[#e50914]/10 transition-colors">
                                        <span class="text-white text-sm">BNI</span>
                                    </div>
                                </label>
                            </div>
                            @error('payment_method')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="mb-4">
                            <label class="block text-sm text-gray-400 mb-2">Bukti Transfer</label>
                            <div class="relative">
                                <input type="file" name="payment_proof" accept="image/jpeg,image/png,image/jpg" 
                                       @change="handleFileSelect" class="sr-only" id="payment_proof">
                                <label for="payment_proof" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-white/20 rounded-xl cursor-pointer hover:border-[#e50914]/50 transition-colors"
                                       :class="preview && 'border-[#e50914]'">
                                    <template x-if="!preview">
                                        <div class="text-center">
                                            <svg class="w-10 h-10 text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                            <p class="text-gray-400 text-sm">Klik untuk upload bukti transfer</p>
                                            <p class="text-gray-500 text-xs mt-1">JPG, PNG (max 2MB)</p>
                                        </div>
                                    </template>
                                    <template x-if="preview">
                                        <img :src="preview" class="max-h-36 rounded-lg object-contain">
                                    </template>
                                </label>
                            </div>
                            @error('payment_proof')
                                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label class="block text-sm text-gray-400 mb-2">Catatan (opsional)</label>
                            <textarea name="payment_notes" rows="2" 
                                      class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white placeholder-gray-500 focus:border-[#e50914] focus:outline-none"
                                      placeholder="Contoh: Transfer dari rekening a.n. Budi">{{ old('payment_notes') }}</textarea>
                        </div>

                        <button type="submit" :disabled="!method"
                                class="w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl disabled:opacity-50 disabled:cursor-not-allowed transition-opacity hover:opacity-90">
                            Upload Bukti Pembayaran
                        </button>
                    </form>

                    <!-- Cancel -->
                    <form id="cancel-checkout-{{ $booking->id }}" action="{{ route('booking.cancel', $booking) }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <button type="button" onclick="confirmModal('cancel-checkout-{{ $booking->id }}')"
                            class="w-full py-3 text-gray-400 hover:text-red-400 transition-colors text-sm mt-4">
                        Batalkan Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>
