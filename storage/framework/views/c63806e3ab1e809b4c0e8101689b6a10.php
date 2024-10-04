;
<?php $__env->startSection('title', 'Success Story - Edit | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('successStories.index')); ?>">Plan</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Success Story >
                                <?php echo e($successStory->groom_name); ?> & <?php echo e($successStory->bride_name); ?></li>
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
 
                    <form action="<?php echo e(route('successStories.update', $successStory->id)); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="Groom Name">Groom Name</label>
                                <input type="text" class="form-control" id="groom_name" name="groom_name"
                                    placeholder="Enter Groom Name"
                                    value="<?php echo e(old('groom_name', $successStory->groom_name)); ?>">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="Bride Name">Bride Name</label>
                                <input type="text" class="form-control" id="bride_name" name="bride_name"
                                    placeholder="Enter Bride Name"
                                    value="<?php echo e(old('bride_name', $successStory->bride_name)); ?>">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="Date">Wedding Date</label>
                                <input type="date" class="form-control" id="wedding_date" name="wedding_date"
                                    value="<?php echo e(old('wedding_date', $successStory->wedding_date)); ?>">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Wedding Description"><?php echo e(old('description', $successStory->description)); ?></textarea>
                            </div>

                            <div class="form-group col-lg-6">
                                <input type="file" class="form-control-file" id="wedding_image" name="wedding_image">
                                <img src="<?php echo e(asset('storage/admin/successStory/' . $successStory->wedding_image ?? '')); ?>"
                                    width="300px" height="150px">
                            </div>
                           <div>
    <label class="mr-3">Status</label>
</div>
<div class="custom-control custom-radio d-inline-block mr-3 mb-3">
    <input type="radio" id="customRadio1" name="status" class="custom-control-input"
        value="1" <?php echo e(old('status', $successStory->status) == 'Active' ? 'checked' : ''); ?>>
    <label class="custom-control-label" for="customRadio1">Active</label>
</div>

<div class="custom-control custom-radio d-inline-block mr-3 mb-3">
    <input type="radio" id="customRadio2" name="status" class="custom-control-input"
        value="0" <?php echo e(old('status', $successStory->status) == 'Inactive' ? 'checked' : ''); ?>>
    <label class="custom-control-label" for="customRadio2">InActive</label>
</div>

                        </div>
                        <div class="text-center">
                            <button type="submit" onclick="createSuccessStory();" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\successStories\edit.blade.php ENDPATH**/ ?>