
<?php $__env->startSection('title', 'Admin Menus - Edit | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default  ">
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

            <!-- Parent Menu -->
            <div class="card card-default mb-3">
                <div class="card-body">
                    <div class="text-center">
                        <span class="btn btn-primary btn-sm mb-3">
                            <?php if($parentMenus): ?>
                                    <h4 style="color: white">Parent Menu</h4>
                                <?php endif; ?>
                        </span>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('adminMenus.update', $adminMenu->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Menu Name"
                                    value="<?php echo e($adminMenu->name ?? ''); ?>" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="parent_id">Parent Menu</label>
                                <select name="parent_id" class="form-control">
                                    <option value="">No Parent</option>
                                    <?php $__currentLoopData = $parentMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($parentMenu->id); ?>">
                                            <?php echo e($parentMenu->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" class="form-control"
                                    value="<?php echo e($adminMenu->icon ?? ''); ?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" <?php echo e($adminMenu->status == 'Active' ? 'selected' : ''); ?>>Active
                                    </option>
                                    <option value="0" <?php echo e($adminMenu->status == 'Inactive' ? 'selected' : ''); ?>>
                                        Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Url</label>
                                <input type="text" name="url" class="form-control"
                                    value="<?php echo e($adminMenu->url ?? ''); ?>">
                            </div>
                            
                        </div>
                        <div class="text-center">
                            <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Update Admin Menu'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

            <!-- Sub Menus -->
            <div class="row">
                <?php $__currentLoopData = $adminMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 mb-4">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="btn btn-primary btn-sm mb-3">
                                        <h4 style="color: white"><?php echo e($subMenu->name); ?></h4>
                                    </span>
                                </div>
                                <form action="<?php echo e(route('adminMenus.update', $subMenu->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter Menu Name" value="<?php echo e($subMenu->name); ?>" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="parent_id">Parent Menu</label>
                                            <select name="parent_id" class="form-control">
                                                <option value="">No Parent</option>
                                                <?php $__currentLoopData = $parentMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($parentMenu->id); ?>"
                                                        <?php echo e(old('parent_id', $subMenu->parent_id) == $parentMenu->id ? 'selected' : ''); ?>>
                                                        <?php echo e($parentMenu->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="icon">Icon</label>
                                            <input type="text" name="icon" class="form-control"
                                                value="<?php echo e($subMenu->icon ?? ''); ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1"
                                                    <?php echo e($subMenu->status == 'Active' ? 'selected' : ''); ?>>Active</option>
                                                <option value="0"
                                                    <?php echo e($subMenu->status == 'Inactive' ? 'selected' : ''); ?>>Inactive
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Url</label>
                                            <input type="text" name="url" class="form-control"
                                                value="<?php echo e($subMenu->url ?? ''); ?>">
                                        </div>
                                        
                                    </div>
                                    <div class="text-center">
                                        <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Update Sub Menu'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                        <!-- Child Menus -->
                        <?php $__currentLoopData = $subMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($child->parent_id == $subMenu->id): ?>
                                <div class="card card-default mt-4">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <span class="btn btn-primary btn-sm mb-3">
                                                <h4 style="color: white"><?php echo e($subMenu->name); ?> - <?php echo e($child->name); ?></h4>
                                            </span>
                                        </div>
                                        <form action="<?php echo e(route('adminMenus.update', $child->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Enter Menu Name" value="<?php echo e($child->name); ?>"
                                                        required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="parent_id">Parent Menu</label>
                                                    <select name="parent_id" class="form-control">
                                                        <option value="<?php echo e($subMenu->id); ?>"
                                                            <?php echo e(old('parent_id', $child->parent_id) == $subMenu->id ? 'selected' : ''); ?>>
                                                            <?php echo e($subMenu->name); ?>

                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="icon">Icon</label>
                                                    <input type="text" name="icon" class="form-control"
                                                        value="<?php echo e($child->icon ?? ''); ?>">
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="1"
                                                            <?php echo e($child->status == 'Active' ? 'selected' : ''); ?>>Active
                                                        </option>
                                                        <option value="0"
                                                            <?php echo e($child->status == 'Inactive' ? 'selected' : ''); ?>>Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label>Url</label>
                                                    <input type="text" name="url" class="form-control"
                                                        value="<?php echo e($child->url ?? ''); ?>">
                                                </div>
                                               
                                            </div>
                                            <div class="text-center">
                                                <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Update Child Menu'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>





























































<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\adminMenus\edit.blade.php ENDPATH**/ ?>