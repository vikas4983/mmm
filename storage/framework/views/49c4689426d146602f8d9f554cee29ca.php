;
<?php $__env->startSection('title', 'ProfileId - Create | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper ">
        <div class="content ">
            <div class="row justify-content-center">
                <div class="card card-default col-lg-8 ">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                                <li class="breadcrumb-item"> <a href="<?php echo e(route('profileids.index')); ?>">Profile Id</a> </li>
                                <li class="breadcrumb-item active" aria-current="page">Add ProfileId</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card card-default col-lg-8 mx-auto">
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
                        <form action="<?php echo e(Route('profileids.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label> Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter ProfileId Name" value="<?php echo e(old('name')); ?>" required>
                                </div>

                                
                                <div class="mb-3">
                                    <div><label>Status</label></div>
                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                        <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                            value="1">
                                        <label class="custom-control-label " for="customRadio1">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                        <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                            checked="checked" value="0">
                                        <label class="custom-control-label " for="customRadio2">InActive</label>
                                    </div>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\profileids\create.blade.php ENDPATH**/ ?>