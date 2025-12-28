<x-layouts.app :title="'Pilih Kursi - ' . $showtime->movie->title">
<div class="py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('movies.show', $showtime->movie) }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-4 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Detail Film
            </a>
            <h1 class="text-2xl md:text-3xl font-bold text-white">Pilih Kursi</h1>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Seat Map -->
            <div class="lg:col-span-2">
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
                    <!-- Screen -->
                    <div class="mb-8">
                        <div class="h-2 bg-gradient-to-r from-transparent via-white to-transparent rounded-full mb-2"></div>
                        <p class="text-center text-sm text-gray-500">LAYAR</p>
                    </div>

                    <!-- Seat Selection Form -->
                    <form action="{{ route('booking.seats', $showtime) }}" method="POST" id="seat-form">
                        @csrf
                        
                        <!-- Seats Grid -->
                        <div class="space-y-3 mb-8" x-data="seatSelector()">
                            @foreach($seatsByRow as $row => $seats)
                                <div class="flex items-center justify-center gap-2">
                                    <span class="w-6 text-center text-sm text-gray-500 font-medium">{{ $row }}</span>
                                    <div class="flex gap-1">
                                        @foreach($seats as $seat)
                                            @php
                                                $isBooked = in_array($seat->id, $bookedSeatIds);
                                            @endphp
                                            
                                            @if($isBooked)
                                                <div class="w-8 h-8 bg-gray-700 rounded-t-lg cursor-not-allowed flex items-center justify-center text-xs text-gray-500" 
                                                     title="Sudah dipesan">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                            @else
                                                <label class="relative cursor-pointer">
                                                    <input type="checkbox" name="seats[]" value="{{ $seat->id }}" 
                                                           class="peer sr-only seat-checkbox"
                                                           @change="updateTotal($event)">
                                                    <div class="w-8 h-8 bg-[#0f0f1a] border border-white/20 rounded-t-lg 
                                                                hover:border-[#e50914] hover:bg-[#e50914]/20
                                                                peer-checked:bg-[#e50914] peer-checked:border-[#e50914]
                                                                transition-all flex items-center justify-center text-xs text-gray-400 peer-checked:text-white"
                                                         title="{{ $seat->seat_code }}">
                                                        {{ $seat->seat_number }}
                                                    </div>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                    <span class="w-6 text-center text-sm text-gray-500 font-medium">{{ $row }}</span>
                                </div>
                            @endforeach

                            <!-- Legend -->
                            <div class="flex items-center justify-center gap-6 mt-6 pt-6 border-t border-white/10">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 bg-[#0f0f1a] border border-white/20 rounded-t-lg"></div>
                                    <span class="text-sm text-gray-400">Tersedia</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 bg-[#e50914] rounded-t-lg"></div>
                                    <span class="text-sm text-gray-400">Dipilih</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 bg-gray-700 rounded-t-lg"></div>
                                    <span class="text-sm text-gray-400">Terisi</span>
                                </div>
                            </div>
                        </div>

                        @error('seats')
                            <p class="text-red-400 text-sm mb-4">{{ $message }}</p>
                        @enderror

                        <!-- Mobile Submit Button -->
                        <button type="submit" id="mobile-submit" disabled
                                class="lg:hidden w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl disabled:opacity-50 disabled:cursor-not-allowed transition-opacity">
                            Lanjut ke Pembayaran
                        </button>
                    </form>
                </div>
            </div>

            <!-- Booking Summary -->
            <div class="lg:col-span-1">
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10 sticky top-24">
                    <!-- Movie Info -->
                    <div class="flex gap-4 mb-6 pb-6 border-b border-white/10">
                        <img src="{{ $showtime->movie->poster_url }}" alt="{{ $showtime->movie->title }}" 
                             class="w-20 h-auto rounded-lg">
                        <div>
                            <h3 class="font-semibold text-white line-clamp-2">{{ $showtime->movie->title }}</h3>
                            <p class="text-sm text-gray-400 mt-1">{{ $showtime->studio->type_label }}</p>
                        </div>
                    </div>

                    <!-- Showtime Details -->
                    <div class="space-y-3 mb-6 pb-6 border-b border-white/10">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Bioskop</span>
                            <span class="text-white text-right">{{ $showtime->studio->cinema->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Studio</span>
                            <span class="text-white">{{ $showtime->studio->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Tanggal</span>
                            <span class="text-white">{{ $showtime->formatted_date }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Jam</span>
                            <span class="text-white">{{ $showtime->formatted_time }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Harga/Tiket</span>
                            <span class="text-white">{{ $showtime->formatted_price }}</span>
                        </div>
                    </div>

                    <!-- Selected Seats -->
                    <div class="mb-6 pb-6 border-b border-white/10">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-400">Kursi Dipilih</span>
                            <span class="text-white" id="selected-seats">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Jumlah Tiket</span>
                            <span class="text-white"><span id="ticket-count">0</span> tiket</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between mb-6">
                        <span class="text-lg font-semibold text-white">Total</span>
                        <span class="text-lg font-bold text-[#e50914]" id="total-price">Rp 0</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" form="seat-form" id="desktop-submit" disabled
                            class="hidden lg:block w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl disabled:opacity-50 disabled:cursor-not-allowed transition-opacity hover:opacity-90">
                        Lanjut ke Pembayaran
                    </button>

                    <p class="text-xs text-gray-500 text-center mt-4">
                        Maksimal 6 kursi per transaksi
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function seatSelector() {
        return {
            selectedSeats: [],
            pricePerTicket: {{ $showtime->price }},
            
            updateTotal(event) {
                const checkboxes = document.querySelectorAll('.seat-checkbox:checked');
                this.selectedSeats = Array.from(checkboxes).map(cb => {
                    const label = cb.closest('label').querySelector('div');
                    const row = cb.closest('.flex.items-center.justify-center').querySelector('.text-gray-500').textContent;
                    return row + label.textContent.trim();
                });
                
                const count = checkboxes.length;
                const total = count * this.pricePerTicket;
                
                document.getElementById('selected-seats').textContent = count > 0 ? this.selectedSeats.join(', ') : '-';
                document.getElementById('ticket-count').textContent = count;
                document.getElementById('total-price').textContent = 'Rp ' + total.toLocaleString('id-ID');
                
                const mobileBtn = document.getElementById('mobile-submit');
                const desktopBtn = document.getElementById('desktop-submit');
                
                if (count > 0 && count <= 6) {
                    mobileBtn.disabled = false;
                    desktopBtn.disabled = false;
                } else {
                    mobileBtn.disabled = true;
                    desktopBtn.disabled = true;
                }
                
                // Limit to 6 seats
                if (count > 6) {
                    event.target.checked = false;
                    alert('Maksimal 6 kursi per transaksi');
                    this.updateTotal(event);
                }
            }
        }
    }
</script>
@endpush
</x-layouts.app>
