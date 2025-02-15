<!DOCTYPE html>
<html lang="en">
<head>
    <title>PayUMoney Payment</title>
</head>
<body>
    
    <h3>Redirecting to PayUMoney...</h3>
    <form id="payuForm" action="<?php echo e($endpoint); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </form>
    <script>
        document.getElementById('payuForm').submit();
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\mmm\resources\views/payment.blade.php ENDPATH**/ ?>