<div class="card card-default">
    <div class="card-body">
        <h3 class="text-center mr-3" style="color:white;background-color: #1364F1">Razorpay</h3>
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('paymentgateways.update', $paymentGateway->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="row">
                <div class="form-group col-lg-12">
                    <label>Razorpay Key</label>
                    <input type="text" class="form-control" name="razorpay_key"
                        placeholder="Enter Razorpay Key"
                        value="<?php echo e(old('razorpay_key', $paymentGateway->razorpay_key)); ?>">
                    <input type="hidden" name="name" value="Razorpay">
                </div>
                <div class="form-group col-lg-12">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>Active</option>
                        <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>Deactive</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\razorpay-update-component.blade.php ENDPATH**/ ?>