;
<?php $__env->startSection('title', 'Plan - Edit | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                              <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('plans.index')); ?>">Plan</a> </li>
                           <li class="breadcrumb-item active" aria-current="page">Edit Income > <?php echo e($plan->name); ?></li>
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
                
                


                <form action="<?php echo e(route('plans.update', $plan->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" 
                            name="image" >
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="<?php echo e(old('name') ?? $plan->name); ?>"
                            name="name" placeholder="Enter Plan Name">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" class="form-control" value="<?php echo e(old('duration') ?? $plan->duration); ?>"
                            name="duration" placeholder="Enter Plan Duration">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" value="<?php echo e(old('price') ?? $plan->price); ?>"
                            name="price" placeholder="Enter Plan Price">
                    </div>
                    <div class="form-group">
                        <label>Offer</label>
                        <input type="text" class="form-control" value="<?php echo e(old('offer') ?? $plan->offer); ?>"
                            name="offer" placeholder="Enter Plan Offer">
                    </div>
                    
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="allow_contact" class="form-control" value="<?php echo e(old('allow_contact') ?? $plan->allow_contact); ?>"
                            name="allow_contact" placeholder="Enter Allow Contact">
                    </div>
                    
                    <div class="form-group">
                        <label>Message</label>
                        <select name="message" id="" class="form-control">
                            <option value="Yes" <?php echo e(old('message', $plan->message) == 'Yes' ? 'selected' : ''); ?>>Yes
                            </option>
                            <option value="No" <?php echo e(old('message', $plan->message) == 'No' ? 'selected' : ''); ?>>No
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chat</label>
                        <select name="chat" id="" class="form-control">
                            <option value="Yes" <?php echo e(old('chat', $plan->chat) == 'Yes' ? 'selected' : ''); ?>>Yes
                            </option>
                            <option value="No" <?php echo e(old('chat', $plan->chat) == 'No' ? 'selected' : ''); ?>>No
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Video Call</label>
                        <select name="video_call" id="" class="form-control">
                            <option value="Yes" <?php echo e(old('video_call', $plan->video_call) == 'Yes' ? 'selected' : ''); ?>>Yes
                            </option>
                            <option value="No" <?php echo e(old('video_call', $plan->video_call) == 'No' ? 'selected' : ''); ?>>No
                            </option>
                        </select>
                    </div>
                    
                    
                    <div><label>Status</label></div>
                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                value="1" <?php echo e($plan->status == 'Active' ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>

                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                value="0" <?php echo e($plan->status == 'Inactive' ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="customRadio2">Inactive</label>
                        </div>
                    
                    <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Update Plan'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\plans\edit.blade.php ENDPATH**/ ?>