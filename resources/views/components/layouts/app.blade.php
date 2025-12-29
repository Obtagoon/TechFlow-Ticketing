@props(['title' => 'TechFlow Ticketing', 'description' => 'TechFlow Ticketing - Platform pemesanan tiket bioskop online terbaik. Pesan tiket film favorit Anda dengan mudah dan cepat.'])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - Pesan Tiket Bioskop Online</title>
    <meta name="description" content="{{ $description }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Ikon Logo -->
    <link rel="icon" href="{{ asset('images/logo-techflow.png') }}">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="bg-[#0f0f1a] text-white min-h-screen antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0a12]/90 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo-techflow.png') }}" alt="Logo" class="w-8 h-8">
                    <span class="text-xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">
                        TechFlow Ticketing
                    </span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors {{ request()->routeIs('home') ? 'text-white' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('movies.index') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors {{ request()->routeIs('movies.*') ? 'text-white' : '' }}">
                        Film
                    </a>
                    @auth
                        <a href="{{ route('my-bookings') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors {{ request()->routeIs('my-bookings') ? 'text-white' : '' }}">
                            Tiket Saya
                        </a>
                    @endauth
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-4">
                    @auth
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-gray-300 hover:text-white transition-colors">
                                <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-full object-cover">
                                <span class="hidden sm:block">{{ auth()->user()->name }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition
                                 class="absolute right-0 mt-2 w-48 bg-[#16162a] rounded-lg shadow-xl border border-white/10 py-2">
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white">
                                        Admin Dashboard
                                    </a>
                                @endif
                                <a href="{{ route('my-bookings') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white">
                                    Tiket Saya
                                </a>
                                <hr class="my-2 border-white/10">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/5">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white text-sm font-semibold rounded-lg hover:opacity-90 transition-opacity">
                            Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             class="fixed top-20 right-4 z-50 bg-green-500/20 border border-green-500/50 text-green-400 px-6 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div x-data="{ show: true }" x-show="show"
             class="fixed top-20 right-4 z-50 bg-red-500/20 border border-red-500/50 text-red-400 px-6 py-3 rounded-lg shadow-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main Content -->
    <main class="pt-16">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-[#0a0a12] border-t border-white/10 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('images/logo-techflow.png') }}" alt="Logo" class="w-8 h-8">
                        <span class="text-xl font-bold">TechFlow Ticketing</span>
                    </a>
                    <p class="text-gray-400 text-sm max-w-md">
                        Platform pemesanan tiket bioskop online terbaik di Indonesia. Nikmati pengalaman menonton yang luar biasa dengan kemudahan booking dari mana saja.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('movies.index') }}" class="hover:text-white transition-colors">Film</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Promo</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Bantuan</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>Email: info@techflowticketing.com</li>
                        <li>Telepon: 021-1234567</li>
                        <li>WhatsApp: 0812-3456-7890</li>
                    </ul>
                </div>
            </div>

            <hr class="my-8 border-white/10">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} TechFlow Ticketing. All rights reserved.</p>
                <p>Powered by TMDB API</p>
            </div>
        </div>
    </footer>

    <!-- Global Confirm Modal -->
    <x-confirm-modal title="Konfirmasi Batalkan" message="Pemesanan yang dibatalkan tidak dapat dikembalikan. Yakin ingin melanjutkan?" confirmText="Ya, Batalkan" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
</body>
</html>
