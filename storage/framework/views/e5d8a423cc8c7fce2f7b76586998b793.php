;
<?php $__env->startSection('title', 'Favicon - Create | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                             <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('logos.index')); ?>">Favicon</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Logo & Favicon</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-body">
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    


                    
                    <form action="<?php echo e(route('favicons.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label> Upload Favicon</label>
                            <div>
                                
                            </div>
                            <input type="file" class="form-control" name="favicon">
                        </div>
                        
                        <div><label>Status</label></div>
                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            
                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                 value="1">
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>

                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="status" class="custom-control-input" checked="checked" value="0">
                            <label class="custom-control-label" for="customRadio2">InActive</label>
                        </div>

                        
                         <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Upload Favicon '] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('submit-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubmitButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd)): ?>
<?php $attributes = $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd; ?>
<?php unset($__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd)): ?>
<?php $component = $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd; ?>
<?php unset($__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd); ?>
<?php endif; ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\favicons\create.blade.php ENDPATH**/ ?>