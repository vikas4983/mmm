
<?php $__env->startSection('title', 'Admin Menus - Create | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                        <li class="breadcrumb-item"> <a href="<?php echo e(route('adminMenus.index')); ?>">Admin Menu</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Admin Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="text-center">
            <div class="card card-default col-lg-8 mx-auto"> <!-- Added mx-auto class here -->
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
                    <form action="<?php echo e(route('adminMenus.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Menu Name" value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="parent_id">Parent Menu</label>
                                <select name="parent_id" class="form-control">
                                    <option value="">No Parent</option>
                                    <?php $__currentLoopData = $adminMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($parentMenu->id); ?>">
                                            <?php echo e($parentMenu->name); ?>

                                            <?php if(count($parentMenu->childrenRecursive) > 0): ?>
                                                <?php echo $__env->make('menus', ['subMenus' => $parentMenu->childrenRecursive, 'parent' => $parentMenu->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" class="form-control" value="<?php echo e(old('icon')); ?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Url</label>
                                <input type="text" name="url" class="form-control" value="<?php echo e(old('url')); ?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Create Site Setting'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>





















































<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\adminMenus\create.blade.php ENDPATH**/ ?>