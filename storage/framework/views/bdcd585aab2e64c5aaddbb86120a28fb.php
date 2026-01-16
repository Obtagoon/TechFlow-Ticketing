<table class="w-full">
    <thead>
        <tr class="text-left text-gray-400 text-sm border-b border-white/10">
            <th class="px-6 py-4 font-medium">Film</th>
            <th class="px-6 py-4 font-medium">Genre</th>
            <th class="px-6 py-4 font-medium">Durasi</th>
            <th class="px-6 py-4 font-medium">Rating</th>
            <th class="px-6 py-4 font-medium">Status</th>
            <th class="px-6 py-4 font-medium">Aksi</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-white/5">
        <?php $__empty_1 = true; $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="hover:bg-white/5">
                <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                        <img src="<?php echo e($movie->poster_url); ?>" alt="" class="w-10 h-14 object-cover rounded">
                        <div>
                            <p class="text-white font-medium"><?php echo e($movie->title); ?></p>
                            <?php if($movie->release_date): ?>
                                <p class="text-sm text-gray-500"><?php echo e($movie->release_date->format('d M Y')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-gray-300"><?php echo e(Str::limit($movie->genre, 20)); ?></td>
                <td class="px-6 py-4 text-gray-300"><?php echo e($movie->duration); ?> min</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-white"><?php echo e(number_format($movie->rating, 1)); ?></span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <?php if($movie->status === 'now_playing'): ?>
                        <span class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Tayang</span>
                    <?php elseif($movie->status === 'coming_soon'): ?>
                        <span class="px-2 py-1 bg-yellow-500/20 text-yellow-400 text-xs rounded-full">Segera</span>
                    <?php else: ?>
                        <span class="px-2 py-1 bg-gray-500/20 text-gray-400 text-xs rounded-full">Selesai</span>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <a href="<?php echo e(route('admin.movies.edit', $movie)); ?>" class="p-2 text-gray-400 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form id="delete-movie-<?php echo e($movie->id); ?>" action="<?php echo e(route('admin.movies.destroy', $movie)); ?>" method="POST" class="hidden">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                        <button type="button" @click="confirmModal('delete-movie-<?php echo e($movie->id); ?>')" class="p-2 text-gray-400 hover:text-red-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">Belum ada film</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php if($movies->hasPages()): ?>
    <div class="px-6 py-4 border-t border-white/10">
        <?php echo e($movies->withQueryString()->links()); ?>

    </div>
<?php endif; ?>
<?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/admin/movies/partials/table.blade.php ENDPATH**/ ?>