<x-layouts.app title="Tiket Saya">
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl md:text-3xl font-bold text-white mb-8">Tiket Saya</h1>

        @if($bookings->isEmpty())
            <div class="bg-[#16162a] rounded-xl p-12 text-center border border-white/10">
                <svg class="w-20 h-20 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
                <h3 class="text-xl font-semibold text-white mb-2">Belum ada tiket</h3>
                <p class="text-gray-400 mb-6">Anda belum memiliki pemesanan tiket</p>
                <a href="{{ route('movies.index') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                    Pesan Tiket Sekarang
                </a>
            </div>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="bg-[#16162a] rounded-xl overflow-hidden border border-white/10 hover:border-white/20 transition-colors">
                        <div class="flex flex-col md:flex-row">
                            <!-- Movie Poster -->
                            <div class="md:w-32 flex-shrink-0">
                                <img src="{{ $booking->showtime->movie->poster_url }}" alt="{{ $booking->showtime->movie->title }}" 
                                     class="w-full h-32 md:h-full object-cover">
                            </div>

                            <!-- Details -->
                            <div class="flex-1 p-4 md:p-6">
                                <div class="flex flex-wrap items-start justify-between gap-4">
                                    <div>
                                        <h3 class="font-semibold text-white">{{ $booking->showtime->movie->title }}</h3>
                                        <p class="text-sm text-gray-400 mt-1">{{ $booking->showtime->studio->cinema->name }}</p>
                                    </div>
                                    
                                    <!-- Status Badge -->
                                    @php $status = $booking->status_label; @endphp
                                    <span class="px-3 py-1 rounded-full text-sm font-medium
                                        @if($status['color'] === 'green') bg-green-500/20 text-green-400
                                        @elseif($status['color'] === 'yellow') bg-yellow-500/20 text-yellow-400
                                        @elseif($status['color'] === 'red') bg-red-500/20 text-red-400
                                        @else bg-gray-500/20 text-gray-400
                                        @endif">
                                        {{ $status['label'] }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4 text-sm">
                                    <div>
                                        <p class="text-gray-500">Tanggal</p>
                                        <p class="text-white">{{ $booking->showtime->show_date->format('d M Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Jam</p>
                                        <p class="text-white">{{ $booking->showtime->formatted_time }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Kursi</p>
                                        <p class="text-white">{{ $booking->seat_codes }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500">Total</p>
                                        <p class="text-white font-semibold">{{ $booking->formatted_price }}</p>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex flex-wrap gap-2 mt-4 pt-4 border-t border-white/10">
                                    <span class="text-sm text-gray-500 font-mono">{{ $booking->booking_code }}</span>
                                    <div class="flex-1"></div>
                                    
                                    @if($booking->status === 'paid')
                                        <a href="{{ route('booking.ticket', $booking) }}" 
                                           class="px-4 py-2 bg-[#e50914] text-white text-sm font-medium rounded-lg hover:opacity-90 transition-opacity">
                                            Lihat E-Ticket
                                        </a>
                                    @elseif($booking->status === 'pending')
                                        <a href="{{ route('booking.checkout', $booking) }}" 
                                           class="px-4 py-2 bg-yellow-500 text-black text-sm font-medium rounded-lg hover:opacity-90 transition-opacity">
                                            Bayar Sekarang
                                        </a>
                                        <form id="cancel-booking-{{ $booking->id }}" action="{{ route('booking.cancel', $booking) }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                        <button type="button" @click="confirmModal('cancel-booking-{{ $booking->id }}')"
                                                class="px-4 py-2 text-red-400 text-sm font-medium hover:text-red-300 transition-colors">
                                            Batalkan
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
</x-layouts.app>
