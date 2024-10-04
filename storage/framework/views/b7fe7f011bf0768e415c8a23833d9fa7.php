
<?php $__env->startSection('title', 'Banner | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                              <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                                 <li class="breadcrumb-item"> <a href="<?php echo e(route('banners.index')); ?>">Banner</a> </li>
                                 <li class="breadcrumb-item active" aria-current="page">Show
                        </ol>
                    </nav>

                     
                </div>
            </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(url('admin/banners')); ?>"><span style="color: white">Banners</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php $__currentLoopData = $cmsPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmsPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo e(url('admin/cmsPages', $cmsPage->slug)); ?>"><span style="color: white"><?php echo e($cmsPage->name); ?></span></a>
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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\banners\show.blade.php ENDPATH**/ ?>