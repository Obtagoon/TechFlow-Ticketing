<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => isset($movie) ? 'Edit Film' : 'Tambah Film']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($movie) ? 'Edit Film' : 'Tambah Film')]); ?>
<div class="max-w-3xl">
    <a href="<?php echo e(route('admin.movies.index')); ?>" class="inline-flex items-center gap-2 text-gray-400 hover:text-white mb-6 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <div class="bg-[#16162a] rounded-xl border border-white/10">
        <div class="p-6 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white"><?php echo e(isset($movie) ? 'Edit Film' : 'Tambah Film Baru'); ?></h2>
        </div>

        <form action="<?php echo e(isset($movie) ? route('admin.movies.update', $movie) : route('admin.movies.store')); ?>" 
              method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            <?php echo csrf_field(); ?>
            <?php if(isset($movie)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Judul Film *</label>
                <input type="text" name="title" value="<?php echo e(old('title', $movie->title ?? '')); ?>" required
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914] <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-400"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Synopsis -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Sinopsis</label>
                <textarea name="synopsis" rows="4"
                          class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]"><?php echo e(old('synopsis', $movie->synopsis ?? '')); ?></textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Duration -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Durasi (menit) *</label>
                    <input type="number" name="duration" value="<?php echo e(old('duration', $movie->duration ?? 120)); ?>" required min="1"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>

                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Rating (0-10)</label>
                    <input type="number" name="rating" value="<?php echo e(old('rating', $movie->rating ?? 0)); ?>" min="0" max="10" step="0.1"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Genre -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Genre</label>
                    <input type="text" name="genre" value="<?php echo e(old('genre', $movie->genre ?? '')); ?>" placeholder="Action, Drama, Comedy"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>

                <!-- Release Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Tanggal Rilis</label>
                    <input type="date" name="release_date" value="<?php echo e(old('release_date', isset($movie) && $movie->release_date ? $movie->release_date->format('Y-m-d') : '')); ?>"
                           class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-[#e50914]">
                    <option value="coming_soon" <?php echo e(old('status', $movie->status ?? '') === 'coming_soon' ? 'selected' : ''); ?>>Segera Tayang</option>
                    <option value="now_playing" <?php echo e(old('status', $movie->status ?? '') === 'now_playing' ? 'selected' : ''); ?>>Sedang Tayang</option>
                    <option value="ended" <?php echo e(old('status', $movie->status ?? '') === 'ended' ? 'selected' : ''); ?>>Selesai</option>
                </select>
            </div>

            <!-- Poster -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Poster</label>
                <?php if(isset($movie) && $movie->poster): ?>
                    <div class="mb-3">
                        <img src="<?php echo e($movie->poster_url); ?>" alt="" class="w-32 h-48 object-cover rounded-lg">
                    </div>
                <?php endif; ?>
                <input type="file" name="poster" accept="image/jpeg,image/png,image/jpg,image/webp"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#e50914] file:text-white file:cursor-pointer">
                <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG, WebP. Maks 2MB</p>
            </div>

            <!-- Backdrop -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Backdrop</label>
                <?php if(isset($movie) && $movie->backdrop): ?>
                    <div class="mb-3">
                        <img src="<?php echo e($movie->backdrop_url); ?>" alt="" class="w-full h-32 object-cover rounded-lg">
                    </div>
                <?php endif; ?>
                <input type="file" name="backdrop" accept="image/jpeg,image/png,image/jpg,image/webp"
                       class="w-full px-4 py-2.5 bg-[#0f0f1a] border border-white/10 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#e50914] file:text-white file:cursor-pointer">
                <p class="mt-1 text-xs text-gray-500">Format: JPEG, PNG, WebP. Maks 4MB</p>
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white font-medium rounded-lg hover:opacity-90 transition-opacity">
                    <?php echo e(isset($movie) ? 'Update Film' : 'Simpan Film'); ?>

                </button>
                <a href="<?php echo e(route('admin.movies.index')); ?>" class="px-6 py-2.5 text-gray-400 hover:text-white transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?><?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/admin/movies/edit.blade.php ENDPATH**/ ?>