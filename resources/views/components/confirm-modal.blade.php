@props([
    'id' => 'confirm-modal',
    'title' => 'Konfirmasi',
    'message' => 'Apakah Anda yakin?',
    'confirmText' => 'Ya, Lanjutkan',
    'cancelText' => 'Batal',
    'confirmColor' => 'red'
])

<!-- Mendaftarkan fungsi confirmModal secara global sebelum Alpine diinisialisasi -->
<script>
    window.confirmModalData = { open: false, formToSubmit: null };
    window.confirmModal = function(formId) {
        window.confirmModalData.formToSubmit = document.getElementById(formId);
        window.confirmModalData.open = true;
        window.dispatchEvent(new CustomEvent('open-confirm-modal'));
    };
</script>

<div x-data="{ 
    open: false, 
    formToSubmit: null,
    init() {
        window.addEventListener('open-confirm-modal', () => {
            this.formToSubmit = window.confirmModalData.formToSubmit;
            this.open = true;
        });
    },
    confirm() {
        if (this.formToSubmit) {
            this.formToSubmit.submit();
        }
        this.open = false;
    }
}"
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    style="display: none;">
    
    <!-- Latar Belakang Gelap -->
    <div class="fixed inset-0 bg-black/70 backdrop-blur-sm" @click="open = false"></div>
    
    <!-- Modal -->
    <div x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="relative bg-[#16162a] rounded-2xl border border-white/10 shadow-2xl w-full max-w-md overflow-hidden">
        
        <!-- Bagian Atas -->
        <div class="p-6 text-center">
            <!-- Ikon -->
            <div class="mx-auto mb-4 w-14 h-14 rounded-full {{ $confirmColor === 'red' ? 'bg-red-500/20' : 'bg-yellow-500/20' }} flex items-center justify-center">
                @if($confirmColor === 'red')
                    <svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                @else
                    <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                @endif
            </div>
            
            <h3 class="text-xl font-semibold text-white mb-2">{{ $title }}</h3>
            <p class="text-gray-400">{{ $message }}</p>
        </div>
        
        <!-- Tombol Aksi -->
        <div class="flex gap-3 p-6 pt-0">
            <button @click="open = false" 
                    class="flex-1 px-4 py-3 text-gray-300 hover:text-white bg-white/5 hover:bg-white/10 rounded-xl font-medium transition-colors">
                {{ $cancelText }}
            </button>
            <button @click="confirm()" 
                    class="flex-1 px-4 py-3 text-white font-medium rounded-xl transition-colors
                           {{ $confirmColor === 'red' ? 'bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600' : 'bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-500 hover:to-yellow-600' }}">
                {{ $confirmText }}
            </button>
        </div>
    </div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
