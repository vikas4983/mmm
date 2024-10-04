;
<?php $__env->startSection('title', 'Site Setting - Edit | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                              <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('siteSettings.index')); ?>">Site Setting</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Site Setting >
                                <?php echo e($siteSetting->name); ?></li>
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
                    <form action="<?php echo e(route('siteSettings.update', $siteSetting->id)); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label> Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Site Name"
                                    value="<?php echo e(old('name') ?? $siteSetting->name); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter  Site Title "
                                    value="<?php echo e(old('title') ?? $siteSetting->title); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Enter Description "
                                    value="<?php echo e(old('description') ?? $siteSetting->description); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Number</label>
                                <input type="text" class="form-control" name="number" placeholder="Enter Number "
                                    value="<?php echo e(old('number') ?? $siteSetting->number); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Email "
                                    value="<?php echo e(old('email') ?? $siteSetting->email); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Google Analytics Code</label>
                                <input type="text" class="form-control" name="google_analytics_code"
                                    placeholder="Enter Google Analytics Code "
                                    value="<?php echo e(old('google_analytics_code') ?? $siteSetting->google_analytics_code); ?>"
                                    required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Footer Description</label>
                                <input type="text" class="form-control" name="footer"
                                    placeholder="Enter Footer Description "
                                    value="<?php echo e(old('footer') ?? $siteSetting->footer); ?>" required>
                            </div>

                            
                            <div><label class="mr-3">Status</label></div>
                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                value="1" <?php echo e($siteSetting->status == 'Active' ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>

                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                value="0" <?php echo e($siteSetting->status == 'Inactive' ? 'checked' : ''); ?>>
                            <label class="custom-control-label" for="customRadio2">Inactive</label>
                        </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\siteSettings\edit.blade.php ENDPATH**/ ?>