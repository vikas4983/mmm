<?php $__env->startSection('title', 'Payment Gateway - Create | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('paymentgateways.index')); ?>">Site Config</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Site Setting</li>
                        </ol>
                    </nav>
                </div>
            </div>
          
            <?php if( $paymentGateway ?? ''): ?>
                <div class="row">

                    <!-- First Card -->
                    <div class="col-lg-4">
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
                                <form action="<?php echo e(route('paymentgateways.update', 1)); ?>" method="post">
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
                                                <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>Active
                                                </option>
                                                <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>Deactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Second Card -->
                    <div class="col-lg-4">
                        <div class="card card-default">
                            <div class="card-body">
                                <h3 class="text-center mr-3" style="color:white;background-color: #18B08A">Payumoney</h3>
                                
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo e(route('paymentgateways.update', 2)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="name" value="PayUmoney">

                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Merchant Key</label>
                                            <input type="text" class="form-control" name="merchant_key"
                                                placeholder="Enter Merchant Key " value="<?php echo e(old('merchant_key')); ?>">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Salt</label>
                                            <input type="text" class="form-control" name="salt"
                                                placeholder="Enter Salt " value="<?php echo e(old('salt')); ?>">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Merchant Id</label>
                                            <input type="text" class="form-control" name="merchant_id"
                                                placeholder="Enter Merchant Id " value="<?php echo e(old('merchant_id')); ?>">
                                        </div>

                                        <div class="form-group col-lg-12">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>Active
                                                </option>
                                                <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>
                                                    Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Third Card -->
                    <div class="col-lg-4">
                        <div class="card card-default">
                            <div class="card-body">
                                <h3 class="text-center mr-3" style="color:white;background-color: #17A6E0">Bank</h3>
                                
                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo e(route('paymentgateways.update', 3)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="name" value="Bank">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control" name="bank_name"
                                                placeholder="Enter Bank Name " value="<?php echo e(old('bank_name')); ?>">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Bank Account Name</label>
                                            <input type="text" class="form-control" name="account_name"
                                                placeholder="Enter Account Name " value="<?php echo e(old('account_name')); ?>">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Bank Account Number</label>
                                            <input type="text" class="form-control" name="bank_account_number"
                                                placeholder="Enter Bank Account Number "
                                                value="<?php echo e(old('bank_account_number')); ?>">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Bank IFSC Code</label>
                                            <input type="text" class="form-control" name="bank_ifsc"
                                                placeholder="Enter Bank IFSC Code " value="<?php echo e(old('bank_ifsc')); ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Account Type</label>
                                            <input type="text" class="form-control" name="bank_account_type"
                                                placeholder="Enter Account Type " value="<?php echo e(old('bank_account_type')); ?>">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>Active
                                                </option>
                                                <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>
                                                    Deactive</option>
                                            </select>
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
                <?php endif; ?>
           
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\paymentgateways\edit.blade.php ENDPATH**/ ?>