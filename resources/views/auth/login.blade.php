<x-layouts.app title="Masuk">
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="#" class="inline-flex items-center gap-2 mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-24">
            </a>
            <h1 class="text-3xl font-bold text-white">Selamat Datang Kembali</h1>
            <p class="text-gray-400 mt-2">Masuk ke akun TechFlow Ticketing Anda</p>
        </div>

        <!-- Login Form -->
        <div class="bg-[#16162a] rounded-2xl p-8 border border-white/10 shadow-xl">
            <form method="POST" action="#" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#e50914] focus:border-transparent transition-all"
                           placeholder="nama@email.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#e50914] focus:border-transparent transition-all"
                               placeholder="••••••••">
                        <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/20 bg-[#0f0f1a] text-[#e50914] focus:ring-[#e50914] focus:ring-offset-0">
                        <span class="text-sm text-gray-400">Ingat saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity shadow-lg shadow-red-500/25">
                    Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-1 border-t border-white/10"></div>
                <span class="px-4 text-sm text-gray-500">atau</span>
                <div class="flex-1 border-t border-white/10"></div>
            </div>

            <!-- Register Link -->
            <p class="text-center text-gray-400">
                Belum punya akun?
                <a href="#" class="text-[#e50914] hover:text-[#f5c518] font-medium transition-colors">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </div>
</div>
</x-layouts.app>
