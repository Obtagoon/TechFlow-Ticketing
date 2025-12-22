@props(['title' => 'TechFlow Ticketing', 'description' => 'TechFlow Ticketing - Platform pemesanan tiket bioskop online terbaik.'])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Pesan Tiket Bioskop Online</title>
    <meta name="description" content="{{ $description }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    @stack('styles')
</head>
<body class="bg-[#0f0f1a] text-white min-h-screen antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0a12]/90 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12">
                    <span class="text-xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">
                        TechFlow Ticketing
                    </span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#" class="text-sm font-medium text-white transition-colors">Beranda</a>
                    <a href="#" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Film</a>
                    <a href="#" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Tiket Saya</a>
                </div>

                <!-- Auth Buttons (Guest State) -->
                <div class="flex items-center gap-4">
                    <a href="#" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Masuk</a>
                    <a href="#" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white text-sm font-semibold rounded-lg hover:opacity-90 transition-opacity">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-[#0a0a12] border-t border-white/10 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <a href="#" class="flex items-center gap-2 mb-4">
                        <span class="text-xl font-bold">TechFlow Ticketing</span>
                    </a>
                    <p class="text-gray-400 text-sm max-w-md">Platform pemesanan tiket bioskop online terbaik di Indonesia. Nikmati pengalaman menonton yang luar biasa dengan kemudahan booking dari mana saja.</p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Film</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Promo</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Bantuan</a></li>
                    </ul>
                </div>
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
            <div class="text-center text-sm text-gray-400">
                <p>&copy; 2025 TechFlow Ticketing. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
</html>