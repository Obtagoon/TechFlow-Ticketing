<x-layouts.app title="Profil Saya">
<div class="py-8">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-white mb-8">Profil Saya</h1>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500/50 text-green-400 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Avatar & Info -->
        <div class="bg-[#16162a] rounded-xl p-6 border border-white/10 mb-6">
            <h2 class="text-lg font-semibold text-white mb-4">Informasi Profil</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="flex items-center gap-6 mb-6">
                    <div class="relative group">
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" 
                             class="w-24 h-24 rounded-full object-cover border-2 border-white/20">
                        <div class="absolute inset-0 rounded-full bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Ganti Foto Profil</label>
                        <input type="file" name="avatar" accept="image/*" 
                               class="text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#e50914] file:text-white hover:file:opacity-90 file:cursor-pointer">
                        @error('avatar')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">No. Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="081234567890"
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors">
                        @error('phone')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="mt-6 px-6 py-3 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-semibold rounded-xl hover:opacity-90 transition-opacity">
                    Simpan Perubahan
                </button>
            </form>
        </div>
        
        <!-- Change Password -->
        <div class="bg-[#16162a] rounded-xl p-6 border border-white/10">
            <h2 class="text-lg font-semibold text-white mb-4">Ubah Password</h2>
            <form action="{{ route('profile.password') }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Password Saat Ini</label>
                        <input type="password" name="current_password" 
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors">
                        @error('current_password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Password Baru</label>
                        <input type="password" name="password" 
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors">
                        @error('password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" 
                               class="w-full px-4 py-3 bg-[#0f0f1a] border border-white/10 rounded-xl text-white focus:outline-none focus:border-[#e50914] transition-colors">
                    </div>
                </div>
                
                <button type="submit" class="mt-6 px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-colors">
                    Ubah Password
                </button>
            </form>
        </div>
        
        <!-- Back Link -->
        <div class="mt-6">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
</x-layouts.app>
