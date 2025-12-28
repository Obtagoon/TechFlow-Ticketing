<x-layouts.admin title="Kelola Film">
<!-- Header -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.movies.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
            + Tambah Film
        </a>
        <button type="button" onclick="document.getElementById('tmdb-modal').classList.remove('hidden')"
                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
            Import dari TMDB
        </button>
    </div>
</div>

<!-- Filters -->
<div class="bg-[#16162a] rounded-xl p-4 mb-6 border border-white/10">
    <form method="GET" class="flex flex-wrap items-center gap-4" id="filter-form">
        <div class="flex-1 min-w-[200px]">
            <input type="text" name="search" value="{{ request('search') }}" id="live-search"
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#e50914]"
                   placeholder="Cari film...">
        </div>
        <select name="status" onchange="this.form.submit()" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Status</option>
            <option value="now_playing" {{ request('status') === 'now_playing' ? 'selected' : '' }}>Sedang Tayang</option>
            <option value="coming_soon" {{ request('status') === 'coming_soon' ? 'selected' : '' }}>Segera Tayang</option>
            <option value="ended" {{ request('status') === 'ended' ? 'selected' : '' }}>Selesai</option>
        </select>
        <select name="genre" onchange="this.form.submit()" class="px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white">
            <option value="">Semua Genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre }}" {{ request('genre') === $genre ? 'selected' : '' }}>{{ $genre }}</option>
            @endforeach
        </select>
    </form>
</div>

<!-- Table -->
<div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
    <div class="overflow-x-auto" id="movies-table">
        @include('admin.movies.partials.table')
    </div>
</div>

<!-- TMDB Import Modal -->
<div id="tmdb-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-[#16162a] rounded-xl w-full max-w-2xl mx-4 border border-white/10">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white">Import Film dari TMDB</h3>
            <button type="button" onclick="document.getElementById('tmdb-modal').classList.add('hidden')" class="text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="mb-4">
                <input type="text" id="tmdb-search" 
                       class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white placeholder-gray-500"
                       placeholder="Cari film di TMDB...">
            </div>
            <div id="tmdb-results" class="max-h-96 overflow-y-auto space-y-2">
                <p class="text-gray-500 text-center py-8">Ketik untuk mencari film</p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Live search
let searchTimeout;
document.getElementById('live-search').addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        fetch(`{{ route('admin.movies.index') }}?search=${this.value}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('movies-table').innerHTML = html;
        });
    }, 300);
});

// TMDB Search
let tmdbTimeout;
document.getElementById('tmdb-search').addEventListener('input', function() {
    clearTimeout(tmdbTimeout);
    const query = this.value;
    if (query.length < 2) {
        document.getElementById('tmdb-results').innerHTML = '<p class="text-gray-500 text-center py-8">Ketik minimal 2 karakter</p>';
        return;
    }
    
    tmdbTimeout = setTimeout(() => {
        fetch(`{{ route('admin.movies.search-tmdb') }}?query=${query}`)
        .then(res => res.json())
        .then(data => {
            if (data.results && data.results.length > 0) {
                let html = '';
                data.results.slice(0, 10).forEach(movie => {
                    html += `
                        <form action="{{ route('admin.movies.import-tmdb') }}" method="POST" class="flex items-center gap-4 p-3 bg-[#0f0f1a] rounded-lg hover:bg-white/5">
                            @csrf
                            <input type="hidden" name="tmdb_id" value="${movie.id}">
                            <img src="${movie.poster_path ? 'https://image.tmdb.org/t/p/w92' + movie.poster_path : '/images/no-poster.jpg'}" 
                                 class="w-12 h-16 object-cover rounded">
                            <div class="flex-1">
                                <p class="text-white font-medium">${movie.title}</p>
                                <p class="text-sm text-gray-400">${movie.release_date || 'N/A'}</p>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-[#e50914] text-white text-sm rounded-lg hover:opacity-90">
                                Import
                            </button>
                        </form>
                    `;
                });
                document.getElementById('tmdb-results').innerHTML = html;
            } else {
                document.getElementById('tmdb-results').innerHTML = '<p class="text-gray-500 text-center py-8">Tidak ada hasil</p>';
            }
        });
    }, 300);
});
</script>
@endpush
</x-layouts.admin>