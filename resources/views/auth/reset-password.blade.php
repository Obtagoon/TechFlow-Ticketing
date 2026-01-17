<x-layouts.app title="Reset Password">
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-[#16162a] rounded-2xl p-8 border border-white/10">
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-[#e50914]/20 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-[#e50914]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-white">Reset Password</h1>
                <p class="text-gray-400 mt-2">Masukkan password baru Anda</p>
            </div>

            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Email</label>
                        <div class="relative">
                            <input type="email" name="email" value="{{ old('email', $email) }}" required readonly
                                   class="w-full px-4 py-3 pl-12 bg-[#0f0f1a] border border-white/10 rounded-xl text-white/60 focus:outline-none cursor-not-allowed">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Password Baru</label>
                        <div class="relative">
                            <input type="password" name="password" required
                                   class="w-full px-4 py-3 pl-12 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors"
                                   placeholder="Minimal 8 karakter">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        @error('password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" required
                                   class="w-full px-4 py-3 pl-12 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors"
                                   placeholder="Ulangi password baru">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit" class="mt-6 w-full py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                    Reset Password
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
