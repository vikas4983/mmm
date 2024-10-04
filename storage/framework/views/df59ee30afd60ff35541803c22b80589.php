
<?php $__env->startSection('title', 'CMS Page | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('cmsPages.index')); ?>">CMS Page</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Show > <?php echo e($cmsPage->name ?? ''); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <div class="card card-default">
                <div class="card-header">
                    <?php echo $cmsPage->content; ?>

                    
                </div>
            </div>
            
        </div>
    </div>

<?php $__env->stopSection(); ?>


























































<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\cmspages\show.blade.php ENDPATH**/ ?>