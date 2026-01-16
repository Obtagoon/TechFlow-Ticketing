<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Kelola Film']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Kelola Film']); ?>
<!-- Header -->
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.movies.create')); ?>" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
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
    <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3" id="filter-form">
        <div class="sm:col-span-2 lg:col-span-1">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" id="live-search"
                   class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#e50914]"
                   placeholder="Cari film...">
        </div>
        <select name="status" onchange="this.form.submit()" class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
            <option value="">Semua Status</option>
            <option value="now_playing" <?php echo e(request('status') === 'now_playing' ? 'selected' : ''); ?>>Sedang Tayang</option>
            <option value="coming_soon" <?php echo e(request('status') === 'coming_soon' ? 'selected' : ''); ?>>Segera Tayang</option>
            <option value="ended" <?php echo e(request('status') === 'ended' ? 'selected' : ''); ?>>Selesai</option>
        </select>
        <select name="genre" onchange="this.form.submit()" class="w-full px-4 py-2 bg-[#0f0f1a] border border-white/10 rounded-lg text-white text-sm">
            <option value="">Semua Genre</option>
            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($genre); ?>" <?php echo e(request('genre') === $genre ? 'selected' : ''); ?>><?php echo e($genre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </form>
</div>

<!-- Desktop Table -->
<div class="desktop-table">
    <div class="bg-[#16162a] rounded-xl border border-white/10 overflow-hidden">
        <div class="overflow-x-auto" id="movies-table">
            <?php echo $__env->make('admin.movies.partials.table', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>
</div>

<!-- Mobile Cards -->
<div class="mobile-cards">
    <div class="space-y-3 p-1" id="movies-cards">
        <?php $__empty_1 = true; $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mobile-card">
                <div class="flex items-start gap-3 mb-3">
                    <img src="<?php echo e($movie->poster_url); ?>" alt="" class="w-16 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <h3 class="text-white font-semibold"><?php echo e($movie->title); ?></h3>
                        <p class="text-gray-400 text-sm"><?php echo e(Str::limit($movie->genre, 30)); ?></p>
                        <?php if($movie->release_date): ?>
                            <p class="text-gray-500 text-xs mt-1"><?php echo e($movie->release_date->format('d M Y')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Durasi</span>
                    <span class="mobile-card-value"><?php echo e($movie->duration); ?> min</span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Rating</span>
                    <span class="mobile-card-value flex items-center gap-1">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <?php echo e(number_format($movie->rating, 1)); ?>

                    </span>
                </div>
                <div class="mobile-card-row">
                    <span class="mobile-card-label">Status</span>
                    <span class="mobile-card-value">
                        <?php if($movie->status === 'now_playing'): ?>
                            <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Tayang</span>
                        <?php elseif($movie->status === 'coming_soon'): ?>
                            <span class="px-2 py-1 bg-yellow-500/20 text-yellow-400 text-xs rounded-full">Segera</span>
                        <?php else: ?>
                            <span class="px-2 py-1 bg-gray-500/20 text-gray-400 text-xs rounded-full">Selesai</span>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="flex items-center gap-2 mt-3 pt-3 border-t border-white/10">
                    <a href="<?php echo e(route('admin.movies.edit', $movie)); ?>" class="flex-1 px-3 py-2 bg-white/10 text-white text-center text-sm rounded-lg hover:bg-white/20">
                        Edit
                    </a>
                    <form id="delete-movie-mobile-<?php echo e($movie->id); ?>" action="<?php echo e(route('admin.movies.destroy', $movie)); ?>" method="POST" class="flex-1">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="button" @click="confirmModal('delete-movie-mobile-<?php echo e($movie->id); ?>')" class="w-full px-3 py-2 bg-red-500/20 text-red-400 text-sm rounded-lg hover:bg-red-500/30">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12 text-gray-500">Belum ada film</div>
        <?php endif; ?>
    </div>
    <?php if($movies->hasPages()): ?>
        <div class="mt-4">
            <?php echo e($movies->withQueryString()->links()); ?>

        </div>
    <?php endif; ?>
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

<?php $__env->startPush('scripts'); ?>
<script>
// Live search
let searchTimeout;
document.getElementById('live-search').addEventListener('input', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        fetch(`<?php echo e(route('admin.movies.index')); ?>?search=${this.value}`, {
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
        fetch(`<?php echo e(route('admin.movies.search-tmdb')); ?>?query=${query}`)
        .then(res => res.json())
        .then(data => {
            if (data.results && data.results.length > 0) {
                let html = '';
                data.results.slice(0, 10).forEach(movie => {
                    html += `
                        <form action="<?php echo e(route('admin.movies.import-tmdb')); ?>" method="POST" class="flex items-center gap-4 p-3 bg-[#0f0f1a] rounded-lg hover:bg-white/5">
                            <?php echo csrf_field(); ?>
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
<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/admin/movies/index.blade.php ENDPATH**/ ?>