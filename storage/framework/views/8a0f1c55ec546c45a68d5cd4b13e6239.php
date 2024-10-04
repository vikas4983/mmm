
<?php $__env->startSection('title', 'Menus | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(url('admin/menus')); ?>"><span style="color: white">Menus</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo e($menu->url); ?>"><span
                                    style="color: white"><?php echo e($menu->name); ?></span></a>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </div>
        </div>
    </nav>

    <img src="<?php echo e(asset('storage/admin/banners/' . ($banner->name ?? ''))); ?>" alt="Banner"
        style="width: 100%;
            height: 100vh; /* 100% of the viewport height */
            object-fit: 
                                                ">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\profileids\show.blade.php ENDPATH**/ ?>