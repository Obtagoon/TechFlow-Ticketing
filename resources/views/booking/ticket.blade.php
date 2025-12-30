<x-layouts.app :title="'E-Ticket - ' . $booking->booking_code">
<div class="py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500/50 rounded-xl p-4 mb-8 flex items-center gap-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-green-400">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Ticket Card -->
        <div class="bg-[#16162a] rounded-2xl overflow-hidden border border-white/10 shadow-xl">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#6e080d] to-[#90141a] p-6 text-center">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <img src="{{ asset('images/logo-techflow.png') }}" alt="Logo" class="w-10 h-10">
                    <span class="text-xl font-bold text-white">TechFlow Ticketing</span>
                </div>
                <p class="text-white/80 text-sm">E-TICKET</p>
            </div>

            <!-- Movie Info -->
            <div class="p-6">
                <div class="flex gap-4 mb-6 pb-6 border-b border-white/10">
                    <img src="{{ $booking->showtime->movie->poster_url }}" alt="{{ $booking->showtime->movie->title }}" 
                         class="w-24 rounded-lg">
                    <div>
                        <h2 class="text-xl font-bold text-white">{{ $booking->showtime->movie->title }}</h2>
                        <p class="text-gray-400 mt-1">{{ $booking->showtime->studio->type_label }}</p>
                        <p class="text-gray-400">{{ $booking->showtime->movie->duration }} menit</p>
                    </div>
                </div>

                <!-- Ticket Details -->
                <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b border-white/10">
                    <div>
                        <p class="text-gray-500 text-sm">Bioskop</p>
                        <p class="text-white font-medium">{{ $booking->showtime->studio->cinema->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Studio</p>
                        <p class="text-white font-medium">{{ $booking->showtime->studio->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Tanggal</p>
                        <p class="text-white font-medium">{{ $booking->showtime->show_date->format('l, d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Jam</p>
                        <p class="text-white font-medium">{{ $booking->showtime->formatted_time }} WIB</p>
                    </div>
                </div>

                <!-- Seats -->
                <div class="mb-6 pb-6 border-b border-white/10">
                    <p class="text-gray-500 text-sm mb-2">Kursi</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($booking->seats as $seat)
                            <span class="px-3 py-1 bg-[#e50914] text-white font-bold rounded-lg">
                                {{ $seat->seat_code }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Booking Code (as QR substitute) -->
                <div class="text-center mb-6 pb-6 border-b border-white/10">
                    <p class="text-gray-500 text-sm mb-3">Kode Booking</p>
                    <div class="inline-block bg-white p-4 rounded-xl">
                        <p class="text-2xl font-mono font-bold text-black tracking-wider">
                            {{ $booking->booking_code }}
                        </p>
                    </div>
                    <p class="text-gray-500 text-xs mt-3">Tunjukkan kode ini di loket bioskop</p>
                </div>

                <!-- Customer Info -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-gray-500 text-sm">Nama</p>
                        <p class="text-white font-medium">{{ $booking->user->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Email</p>
                        <p class="text-white font-medium">{{ $booking->user->email }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <a href="{{ route('booking.ticket.download', $booking) }}" 
                       class="flex-1 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl text-center hover:opacity-90 transition-opacity">
                        Download PDF
                    </a>
                    <a href="{{ route('my-bookings') }}" 
                       class="flex-1 py-3 bg-white/10 text-white font-semibold rounded-xl text-center hover:bg-white/20 transition-colors">
                        Tiket Saya
                    </a>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="mt-8 bg-[#16162a] rounded-xl p-6 border border-white/10">
            <h3 class="font-semibold text-white mb-4">Petunjuk Penggunaan</h3>
            <ul class="space-y-3 text-gray-400 text-sm">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Simpan atau screenshot e-ticket ini</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Tunjukkan kode booking di loket bioskop untuk mendapatkan tiket fisik</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Datang minimal 30 menit sebelum film dimulai</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <span>E-ticket tidak dapat ditukar atau dikembalikan</span>
                </li>
            </ul>
        </div>
    </div>
</div>
</x-layouts.app>
