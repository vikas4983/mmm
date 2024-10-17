<?php
    $alertTypes = ['success', 'error', 'info', 'warning'];
?>

<?php $__currentLoopData = $alertTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alertType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(session()->has($alertType)): ?>
        <?php switch($alertType):
            case ('success'): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session($alertType)); ?>

                </div>
            <?php break; ?>

            <?php case ('info'): ?>
                <div class="alert alert-info" role="alert">
                    <?php echo e(session($alertType)); ?>

                </div>
            <?php break; ?>

            <?php case ('warning'): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo e(session($alertType)); ?>

                </div>
            <?php break; ?>

            <?php default: ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session($alertType)); ?>

                </div>
        <?php endswitch; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\partials\alerts.blade.php ENDPATH**/ ?>