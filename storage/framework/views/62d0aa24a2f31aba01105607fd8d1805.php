 <?php $__env->startSection('title', 'Dashboard | Admin'); ?> <?php $__env->startSection('styles'); ?>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
<script src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
<script src="http://datatables.net/release-datatables/extensions/Scroller/js/dataTables.scroller.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link href="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
    rel="stylesheet" /> <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            
            <?php $__currentLoopData = $adminMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(($adminMenu && $adminMenu->count > 0) || $adminMenu->parent_id == null): ?>
                    
                    <?php if($adminMenu->parent_id == null && $adminMenu->model_name == null && $adminMenu->count == null): ?>
                    <?php else: ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-default">
                                <a href="<?php echo e('/admin'. $adminMenu->url); ?>" style="color: inherit">
                                    <div class="d-flex p-5">
                                        <div class="icon-md bg-secondary rounded-circle mr-3">
                                            <i class="<?php echo e($adminMenu->icon); ?>"></i>
                                        </div>
                                        <div class=" text-left">
                                            <span class="h2 d-block"><?php echo e($adminMenu->count); ?></span>
                                            <p><?php echo e($adminMenu->name); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php $__currentLoopData = $adminMenu->childrenRecursive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($subMenu) && $subMenu->count > 0): ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card card-default">
                                    <a href="<?php echo e('/admin'. $subMenu->url); ?>" style="color: inherit">
                                        <div class="d-flex p-5">
                                            <div class="icon-md bg-secondary rounded-circle mr-3">
                                                <i class="<?php echo e($subMenu->icon); ?>"></i>
                                            </div>
                                            <div class=" text-left">
                                                <span class="h2 d-block"><?php echo e($subMenu->count); ?></span>
                                                <p><?php echo e($subMenu->name); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

















































<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>