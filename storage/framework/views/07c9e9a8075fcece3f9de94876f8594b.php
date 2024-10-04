;
<?php $__env->startSection('title', 'Email Template - Edit | Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content">
        <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                          <li class="breadcrumb-item"> <a href="<?php echo e(route('emailTemplates.index')); ?>">Email Templates</a> </li>
                           <li class="breadcrumb-item active" aria-current="page">Edit Education > <?php echo e($emailTemplate->name); ?> </li>
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
                
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>

                <form action="<?php echo e(route('emailTemplates.update', $emailTemplate->id)); ?>" method="post">
                       <?php echo csrf_field(); ?>
                       <?php echo method_field('patch'); ?>
                    <div class="row">
                      <div class="form-group col-lg-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Email Template Name" value="<?php echo e(old('name', $emailTemplate->name ?? '')); ?>" required>
                
                      </div>
                      <div class="form-group col-lg-3">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" value="<?php echo e(old('subject',$emailTemplate->subject ?? '')); ?>" required>
                      </div>
                      <div class="form-group col-lg-3">
                        <label>Action</label>
                        <select name="action" class="form-control">
                          <option value="1" <?php echo e(old('action', $emailTemplate->action) == 'Admin' ? 'selected' : ''); ?>>Admin</option>
                          <option value="0" <?php echo e(old('action', $emailTemplate->action) == 'User' ? 'selected' : ''); ?>>User</option>
                        </select>
                      </div>
                      
                      <div class="form-group col-lg-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="1" <?php echo e(old('status',$emailTemplate->status) == 'Active' ? 'selected' : ''); ?>>Active</option>
                          <option value="0" <?php echo e(old('status',$emailTemplate->status) == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                      </div>
                      <div class="form-group col-lg-12">
                        <label>Body</label>
                        <textarea class="form-control" name="body" placeholder="Enter Body" required><?php echo e(old('body', $emailTemplate->body ?? '')); ?></textarea>
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




































<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\emailTemplates\edit.blade.php ENDPATH**/ ?>