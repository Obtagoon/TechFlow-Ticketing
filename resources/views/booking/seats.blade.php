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
                <div class="bg-[#16162a] rounded-xl p-6 border border-white/10 relative overflow-hidden">
                    <!-- Real-time status indicator -->
                    <div id="sync-status" class="absolute top-4 right-4 flex items-center gap-2 text-xs">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span class="text-gray-400">Live</span>
                    </div>

                    <!-- Screen with 3D perspective -->
                    <div class="mb-10 perspective-1000">
                        <div class="relative">
                            <div class="h-3 bg-gradient-to-r from-[#e50914]/20 via-white to-[#e50914]/20 rounded-lg transform rotateX-10 shadow-[0_0_30px_rgba(255,255,255,0.3)]"></div>
                            <div class="absolute inset-0 bg-gradient-to-b from-white/20 to-transparent blur-xl -top-4"></div>
                        </div>
                        <p class="text-center text-sm text-gray-500 mt-3 tracking-widest">LAYAR</p>
                    </div>

                    <!-- Seat Selection Form -->
                    <form action="{{ route('booking.seats', $showtime) }}" method="POST" id="seat-form">
                        @csrf
                        
                        <!-- Seats Grid with 3D perspective -->
                        <div class="space-y-3 mb-8" 
                             x-data="seatSelector()" 
                             x-init="startAutoRefresh()"
                             style="perspective: 800px;">
                            
                            <div class="transform" style="transform: rotateX(5deg);">
                                @foreach($seatsByRow as $row => $seats)
                                    <div class="flex items-center justify-center gap-3 mb-3">
                                        <span class="w-6 text-center text-sm text-gray-500 font-medium">{{ $row }}</span>
                                        <div class="flex gap-2">
                                            @foreach($seats as $seat)
                                                @php
                                                    $isBooked = in_array($seat->id, $bookedSeatIds);
                                                @endphp
                                                
                                                @if($isBooked)
                                                    <!-- Booked Seat -->
                                                    <div class="seat-booked group relative" 
                                                         data-seat-id="{{ $seat->id }}"
                                                         title="Sudah dipesan">
                                                        <div class="w-10 h-10 bg-gradient-to-b from-gray-700 to-gray-800 rounded-t-lg cursor-not-allowed flex items-center justify-center text-xs text-gray-500 border-b-4 border-gray-900 shadow-inner">
                                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </div>
                                                        <!-- Tooltip -->
                                                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 bg-gray-800 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap z-10">
                                                            {{ $seat->seat_code }} - Terisi
                                                        </div>
                                                    </div>
                                                @else
                                                    <!-- Available Seat -->
                                                    <label class="seat-available group relative cursor-pointer" data-seat-id="{{ $seat->id }}">
                                                        <input type="checkbox" name="seats[]" value="{{ $seat->id }}" 
                                                               class="peer sr-only seat-checkbox"
                                                               @change="updateTotal($event)">
                                                        <div class="w-10 h-10 bg-gradient-to-b from-[#1a1a2e] to-[#0f0f1a] border border-white/20 rounded-t-lg 
                                                                    hover:border-[#e50914] hover:scale-105
                                                                    peer-checked:bg-gradient-to-b peer-checked:from-[#e50914] peer-checked:to-[#b20710] 
                                                                    peer-checked:border-[#e50914]
                                                                    transition-all duration-200 flex items-center justify-center text-sm text-gray-400 
                                                                    peer-checked:text-white font-medium border-b-4 border-[#0a0a14] peer-checked:border-[#8a0510]">
                                                            {{ $seat->seat_number }}
                                                        </div>
                                                        <!-- Armrests -->
                                                        <div class="absolute -left-0.5 top-1/2 w-1 h-4 bg-gray-700 rounded-l-full -translate-y-1/2"></div>
                                                        <div class="absolute -right-0.5 top-1/2 w-1 h-4 bg-gray-700 rounded-r-full -translate-y-1/2"></div>
                                                        <!-- Tooltip -->
                                                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 bg-[#e50914] text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap z-10">
                                                            {{ $seat->seat_code }}
                                                        </div>
                                                    </label>
                                                @endif
                                            @endforeach
                                        </div>
                                        <span class="w-6 text-center text-sm text-gray-500 font-medium">{{ $row }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Legend -->
                            <div class="flex items-center justify-center gap-8 mt-8 pt-6 border-t border-white/10">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-gradient-to-b from-[#1a1a2e] to-[#0f0f1a] border border-white/20 rounded-t-lg border-b-4 border-[#0a0a14]"></div>
                                    <span class="text-sm text-gray-400">Tersedia</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-gradient-to-b from-[#e50914] to-[#b20710] rounded-t-lg border-b-4 border-[#8a0510]"></div>
                                    <span class="text-sm text-gray-400">Dipilih</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-gradient-to-b from-gray-700 to-gray-800 rounded-t-lg border-b-4 border-gray-900 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-gray-400">Terisi</span>
                                </div>
                            </div>
                        </div>

                        @error('seats')
                            <p class="text-red-400 text-sm mb-4">{{ $message }}</p>
                        @enderror

                        <!-- Mobile Submit Button -->
                        <button type="submit" id="mobile-submit" disabled
                                class="lg:hidden w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl disabled:opacity-50 disabled:cursor-not-allowed transition-all hover:shadow-[0_0_20px_rgba(229,9,20,0.4)]">
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
                             class="w-20 h-auto rounded-lg shadow-lg">
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
                            <span class="text-white font-medium" id="selected-seats">-</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Jumlah Tiket</span>
                            <span class="text-white"><span id="ticket-count">0</span> tiket</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex justify-between mb-6">
                        <span class="text-lg font-semibold text-white">Total</span>
                        <span class="text-xl font-bold text-[#e50914]" id="total-price">Rp 0</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" form="seat-form" id="desktop-submit" disabled
                            class="hidden lg:block w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl disabled:opacity-50 disabled:cursor-not-allowed transition-all hover:opacity-90 hover:shadow-[0_0_20px_rgba(229,9,20,0.4)]">
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

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-4 right-4 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg transform translate-y-20 opacity-0 transition-all duration-300 z-50">
    <div class="flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <span id="toast-message">Kursi sudah tidak tersedia</span>
    </div>
</div>

@push('scripts')
<script>
    function seatSelector() {
        return {
            selectedSeats: [],
            selectedSeatIds: [],
            pricePerTicket: {{ $showtime->price }},
            showtimeId: {{ $showtime->id }},
            refreshInterval: null,
            
            startAutoRefresh() {
                // Refresh seat status every 30 seconds
                this.refreshInterval = setInterval(() => {
                    this.checkSeatStatus();
                }, 30000);
            },
            
            async checkSeatStatus() {
                try {
                    const response = await fetch(`/api/showtime/${this.showtimeId}/seats`);
                    const data = await response.json();
                    
                    // Update sync status indicator
                    document.getElementById('sync-status').querySelector('span:last-child').textContent = 'Live';
                    
                    // Check if any selected seat is now booked
                    const newlyBooked = this.selectedSeatIds.filter(id => data.booked.includes(id));
                    
                    if (newlyBooked.length > 0) {
                        // Show toast notification
                        this.showToast('Beberapa kursi yang Anda pilih sudah dipesan orang lain!');
                        
                        // Uncheck and update those seats
                        newlyBooked.forEach(seatId => {
                            const checkbox = document.querySelector(`input[value="${seatId}"]`);
                            if (checkbox) {
                                checkbox.checked = false;
                                
                                // Update seat appearance to booked
                                const label = checkbox.closest('label');
                                if (label) {
                                    label.outerHTML = `
                                        <div class="seat-booked group relative" data-seat-id="${seatId}">
                                            <div class="w-9 h-9 bg-gradient-to-b from-gray-700 to-gray-800 rounded-t-lg cursor-not-allowed flex items-center justify-center text-xs text-gray-500 border-b-4 border-gray-900 shadow-inner animate-pulse">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                    `;
                                }
                            }
                        });
                        
                        // Recalculate total
                        this.updateTotal({ target: { checked: false } });
                    }
                    
                    // Update other newly booked seats (not selected by user)
                    data.booked.forEach(seatId => {
                        const availableSeat = document.querySelector(`.seat-available[data-seat-id="${seatId}"]`);
                        if (availableSeat && !this.selectedSeatIds.includes(seatId)) {
                            const seatNumber = availableSeat.querySelector('.seat-checkbox').nextElementSibling.textContent.trim();
                            availableSeat.outerHTML = `
                                <div class="seat-booked group relative" data-seat-id="${seatId}">
                                    <div class="w-9 h-9 bg-gradient-to-b from-gray-700 to-gray-800 rounded-t-lg cursor-not-allowed flex items-center justify-center text-xs text-gray-500 border-b-4 border-gray-900 shadow-inner">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            `;
                        }
                    });
                    
                } catch (error) {
                    document.getElementById('sync-status').querySelector('span:last-child').textContent = 'Offline';
                    console.error('Failed to check seat status:', error);
                }
            },
            
            showToast(message) {
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toast-message');
                toastMessage.textContent = message;
                toast.classList.remove('translate-y-20', 'opacity-0');
                
                setTimeout(() => {
                    toast.classList.add('translate-y-20', 'opacity-0');
                }, 5000);
            },
            
            updateTotal(event) {
                const checkboxes = document.querySelectorAll('.seat-checkbox:checked');
                this.selectedSeats = [];
                this.selectedSeatIds = [];
                
                checkboxes.forEach(cb => {
                    const label = cb.closest('label');
                    const seatDiv = cb.nextElementSibling;
                    const row = cb.closest('.flex.items-center.justify-center').querySelector('.text-gray-500').textContent;
                    this.selectedSeats.push(row + seatDiv.textContent.trim());
                    this.selectedSeatIds.push(parseInt(cb.value));
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
                    this.showToast('Maksimal 6 kursi per transaksi');
                    this.updateTotal(event);
                }
            }
        }
    }
</script>
@endpush

<style>
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 10px rgba(229, 9, 20, 0.4); }
        50% { box-shadow: 0 0 25px rgba(229, 9, 20, 0.7); }
    }
    
    .peer-checked\:animate-pulse {
        animation: pulse-glow 2s ease-in-out infinite;
    }
</style>
</x-layouts.app>
