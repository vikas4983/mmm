

<?php $__env->startSection('title', 'Banners | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div>
<img src="<?php echo e(asset('storage/admin/banners/banner1.jpg')); ?>" alt="Banner Image" style="width: 100%;
            height: 100vh; /* 100% of the viewport height */
            object-fit: cover;">
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\banners.blade.php ENDPATH**/ ?>