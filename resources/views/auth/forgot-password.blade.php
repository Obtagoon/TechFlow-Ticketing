<x-layouts.app title="Lupa Password">
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-[#16162a] rounded-2xl p-8 border border-white/10">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-[#e50914]/20 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-[#e50914]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white">Lupa Password?</h1>
                <p class="text-gray-400 mt-2">Masukkan email Anda untuk menerima link reset password</p>
            </div>

            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500/50 text-green-400 p-4 rounded-lg mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="block text-sm text-gray-400 mb-2">Email</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 pl-12 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors"
                               placeholder="email@contoh.com">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                    Kirim Link Reset
                </button>
            </form>

            <p class="text-center text-gray-400 mt-6">
                <a href="{{ route('login') }}" class="text-[#e50914] hover:underline flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Login
                </a>
            </p>
        </div>
    </div>
</div>
</x-layouts.app>
