;
<?php $__env->startSection('title', 'Approvals - Edit | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('approvals.index')); ?>">Approval</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Approvals >
                                <?php echo e($approval->user->name); ?></li>
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
                    <form action="<?php echo e(route('approvals.update', $approval->id ?? '')); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label>About Me</label>
                                <select name="about_me" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('about_me', $approval->about_me ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('about_me', $approval->about_me ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                                <div>
                                    <textarea class="col-lg-12 mb-3"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>About Education</label>
                                <select name="about_education" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('about_education', $approval->about_education ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('about_education', $approval->about_education ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                                 <div>
                                    <textarea class="col-lg-12 mb-3"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>About Occupation</label>
                                <select name="about_occupation" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('about_occupation', $approval->about_occupation ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('about_occupation', $approval->about_occupation ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                                 <div>
                                    <textarea class="col-lg-12 mb-3"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>About Family</label>
                                <select name="about_family" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('about_family', $approval->about_family ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('about_family', $approval->about_family ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                                 <div>
                                    <textarea class="col-lg-12 mb-3"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Read Carefully</label>
                                <select name="read_carefully" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('read_carefully', $approval->read_carefully ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('read_carefully', $approval->read_carefully ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                                 <div>
                                    <textarea class="col-lg-12 mb-3"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Success Story</label>
                                <select name="success_story" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('success_story', $approval->success_story ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('success_story', $approval->success_story ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Image-1</label>
                                <select name="image1" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('image1', $approval->image1 ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('image1', $approval->image1 ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Image-2</label>
                                <select name="image2" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('image2', $approval->image2 ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('image2', $approval->image2 ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Image-3</label>
                                <select name="image3" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('image3', $approval->image3 ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('image3', $approval->image3 ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Image-14</label>
                                <select name="image1" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('image14', $approval->image14 ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('image14', $approval->image14 ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label>Image-5</label>
                                <select name="image1" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('image5', $approval->image5 ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('image5', $approval->image5 ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>

                           
                            <div class="form-group col-lg-3">
                                <label>Image-6</label>
                                <select name="image1" class="form-control" required>
                                    <option value="0"
                                        <?php echo e(old('image6', $approval->image6 ?? '') == 'Hide From All User' ? 'selected' : ''); ?>>
                                        Pending</option>
                                    <option value="1"
                                        <?php echo e(old('image6', $approval->image6 ?? '') == 'All User Can View' ? 'selected' : ''); ?>>
                                        Approved</option>
                                </select>
                            </div>


                            
                            <div><label class="mr-3">Status</label></div>
                            <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                    value="1" <?php echo e($approval->status == 'Active' ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="customRadio1">Active</label>
                            </div>

                            <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                    value="0" <?php echo e($approval->status == 'Inactive' ? 'checked' : ''); ?>>
                                <label class="custom-control-label" for="customRadio2">Inactive</label>
                            </div>


                        </div>
                        <div class="text-center">
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\approvals\edit.blade.php ENDPATH**/ ?>