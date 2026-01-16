<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'TechFlow Ticketing', 'description' => 'TechFlow Ticketing - Platform pemesanan tiket bioskop online terbaik. Pesan tiket film favorit Anda dengan mudah dan cepat.']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => 'TechFlow Ticketing', 'description' => 'TechFlow Ticketing - Platform pemesanan tiket bioskop online terbaik. Pesan tiket film favorit Anda dengan mudah dan cepat.']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title); ?> - Pesan Tiket Bioskop Online</title>
    <meta name="description" content="<?php echo e($description); ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Ikon Logo -->
    <link rel="icon" href="<?php echo e(asset('images/logo-techflow.png')); ?>">
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <!-- Additional Styles -->
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-[#0f0f1a] text-white min-h-screen antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#0a0a12]/90 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2">
                    <img src="<?php echo e(asset('images/logo-techflow.png')); ?>" alt="Logo" class="w-8 h-8">
                    <span class="text-xl font-bold bg-gradient-to-r from-white to-gray-400 bg-clip-text text-transparent">
                        TechFlow Ticketing
                    </span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="<?php echo e(route('home')); ?>" class="text-sm font-medium text-gray-300 hover:text-white transition-colors <?php echo e(request()->routeIs('home') ? 'text-white' : ''); ?>">
                        Beranda
                    </a>
                    <a href="<?php echo e(route('movies.index')); ?>" class="text-sm font-medium text-gray-300 hover:text-white transition-colors <?php echo e(request()->routeIs('movies.*') ? 'text-white' : ''); ?>">
                        Film
                    </a>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('my-bookings')); ?>" class="text-sm font-medium text-gray-300 hover:text-white transition-colors <?php echo e(request()->routeIs('my-bookings') ? 'text-white' : ''); ?>">
                            Tiket Saya
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-4">
                    <?php if(auth()->guard()->check()): ?>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 text-sm font-medium text-gray-300 hover:text-white transition-colors">
                                <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="w-8 h-8 rounded-full object-cover">
                                <span class="hidden sm:block"><?php echo e(auth()->user()->name); ?></span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition
                                 class="absolute right-0 mt-2 w-48 bg-[#16162a] rounded-lg shadow-xl border border-white/10 py-2">
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white">
                                        Admin Dashboard
                                    </a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('my-bookings')); ?>" class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white">
                                    Tiket Saya
                                </a>
                                <hr class="my-2 border-white/10">
                                <form action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/5">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">
                            Masuk
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 bg-gradient-to-r from-[#e50914] to-[#b20710] text-white text-sm font-semibold rounded-lg hover:opacity-90 transition-opacity">
                            Daftar
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <?php if(session('success')): ?>
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             class="fixed top-20 right-4 z-50 bg-green-500/20 border border-green-500/50 text-green-400 px-6 py-3 rounded-lg shadow-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div x-data="{ show: true }" x-show="show"
             class="fixed top-20 right-4 z-50 bg-red-500/20 border border-red-500/50 text-red-400 px-6 py-3 rounded-lg shadow-lg">
            <ul class="list-disc list-inside">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="pt-16">
        <?php echo e($slot); ?>

    </main>

    <!-- Footer -->
    <footer class="bg-[#0a0a12] border-t border-white/10 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 mb-4">
                        <img src="<?php echo e(asset('images/logo-techflow.png')); ?>" alt="Logo" class="w-8 h-8">
                        <span class="text-xl font-bold">TechFlow Ticketing</span>
                    </a>
                    <p class="text-gray-400 text-sm max-w-md">
                        Platform pemesanan tiket bioskop online terbaik di Indonesia. Nikmati pengalaman menonton yang luar biasa dengan kemudahan booking dari mana saja.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="<?php echo e(route('movies.index')); ?>" class="hover:text-white transition-colors">Film</a></li>
                        <li><a href="<?php echo e(route('help')); ?>" class="hover:text-white transition-colors">Bantuan</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>Email: info@techflowticketing.com</li>
                        <li>WhatsApp: 0819-5315-6184</li>
                    </ul>
                </div>
            </div>

            <hr class="my-8 border-white/10">

            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-400">
                <p>&copy; <?php echo e(date('Y')); ?> TechFlow Ticketing. All rights reserved.</p>
                <p>Powered by TMDB API</p>
            </div>
        </div>
    </footer>

    <!-- Global Confirm Modal -->
    <?php if (isset($component)) { $__componentOriginal2cfaf2d8c559a20e3495c081df2d0b10 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2cfaf2d8c559a20e3495c081df2d0b10 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirm-modal','data' => ['title' => 'Konfirmasi Batalkan','message' => 'Pemesanan yang dibatalkan tidak dapat dikembalikan. Yakin ingin melanjutkan?','confirmText' => 'Ya, Batalkan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('confirm-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Konfirmasi Batalkan','message' => 'Pemesanan yang dibatalkan tidak dapat dikembalikan. Yakin ingin melanjutkan?','confirmText' => 'Ya, Batalkan']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2cfaf2d8c559a20e3495c081df2d0b10)): ?>
<?php $attributes = $__attributesOriginal2cfaf2d8c559a20e3495c081df2d0b10; ?>
<?php unset($__attributesOriginal2cfaf2d8c559a20e3495c081df2d0b10); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2cfaf2d8c559a20e3495c081df2d0b10)): ?>
<?php $component = $__componentOriginal2cfaf2d8c559a20e3495c081df2d0b10; ?>
<?php unset($__componentOriginal2cfaf2d8c559a20e3495c081df2d0b10); ?>
<?php endif; ?>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\laragon\www\PrakWeb2025_A_233040022\tubes\TechFlow-Ticketing\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>