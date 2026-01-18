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
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form">
                @csrf
                @method('PATCH')
                
                <!-- Hidden input for delete avatar flag -->
                <input type="hidden" name="delete_avatar" id="delete-avatar-flag" value="0">
                
                <div class="flex items-center gap-6 mb-6" x-data="avatarUpload()">
                    <div class="relative">
                        <!-- Avatar Image -->
                        <img :src="previewUrl || '{{ $user->avatar_url }}'" alt="{{ $user->name }}" 
                             class="w-24 h-24 rounded-full object-cover border-2 border-white/20"
                             :class="{ 'opacity-50': markedForDelete }">
                        
                        <!-- Delete overlay indicator -->
                        <div x-show="markedForDelete" 
                             class="absolute inset-0 rounded-full bg-red-500/30 flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </div>
                        
                        <!-- Edit Button -->
                        <button type="button" @click="open = !open" 
                                class="absolute bottom-0 right-0 w-8 h-8 bg-[#e50914] rounded-full flex items-center justify-center border-2 border-[#16162a] hover:bg-[#b20710] transition-colors shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             style="background-color: #0f0f1a;"
                             class="absolute top-full left-0 mt-2 w-48 rounded-lg shadow-2xl border border-white/20 overflow-hidden z-50">
                            
                            <!-- Pilih Gambar -->
                            <label class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-white cursor-pointer transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm font-medium">Pilih Gambar</span>
                                <input type="file" name="avatar" accept="image/*" class="hidden" 
                                       x-ref="fileInput"
                                       @change="handleFileSelect($event)">
                            </label>
                            
                            <!-- Divider -->
                            <div class="border-t border-white/10"></div>
                            
                            <!-- Hapus Foto -->
                            @if($user->avatar)
                            <button type="button" 
                                    @click="markForDelete()"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-red-500/20 hover:text-red-300 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span class="text-sm font-medium">Hapus Foto</span>
                            </button>
                            @else
                            <div class="flex items-center gap-3 px-4 py-3 text-gray-500 cursor-not-allowed">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                <span class="text-sm font-medium">Hapus Foto</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-white font-medium">{{ $user->name }}</h3>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                        <p x-show="!previewUrl && !markedForDelete" class="text-gray-500 text-xs mt-1">Klik tombol edit untuk mengubah foto</p>
                        <p x-show="previewUrl" class="text-green-400 text-xs mt-1">✓ Foto baru dipilih (belum tersimpan)</p>
                        <p x-show="markedForDelete" class="text-red-400 text-xs mt-1">✗ Foto akan dihapus saat disimpan</p>
                        <button type="button" x-show="previewUrl || markedForDelete" 
                                @click="cancelChanges()"
                                class="text-yellow-400 text-xs mt-1 hover:underline">
                            Batalkan perubahan foto
                        </button>
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
        
        <script>
            function avatarUpload() {
                return {
                    open: false,
                    previewUrl: null,
                    markedForDelete: false,
                    
                    handleFileSelect(event) {
                        const file = event.target.files[0];
                        if (file) {
                            this.previewUrl = URL.createObjectURL(file);
                            this.markedForDelete = false;
                            document.getElementById('delete-avatar-flag').value = '0';
                        }
                        this.open = false;
                    },
                    
                    markForDelete() {
                        this.markedForDelete = true;
                        this.previewUrl = null;
                        document.getElementById('delete-avatar-flag').value = '1';
                        // Clear file input
                        if (this.$refs.fileInput) {
                            this.$refs.fileInput.value = '';
                        }
                        this.open = false;
                    },
                    
                    cancelChanges() {
                        this.previewUrl = null;
                        this.markedForDelete = false;
                        document.getElementById('delete-avatar-flag').value = '0';
                        // Clear file input
                        if (this.$refs.fileInput) {
                            this.$refs.fileInput.value = '';
                        }
                    }
                }
            }
        </script>
        
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
