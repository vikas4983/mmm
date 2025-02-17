<!DOCTYPE html>
<html lang="en">

<head>
    <title>Redirecting to PayUMoney</title>
</head>

<body onload="document.getElementById('payuForm').submit();">

    <h3>Redirecting to PayUMoney...</h3>
    <form id="payuForm" action="<?php echo e($endpoint); ?>" method="POST">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <button type="submit">Click here if not redirected</button>
    </form>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\payu\redirect.blade.php ENDPATH**/ ?>