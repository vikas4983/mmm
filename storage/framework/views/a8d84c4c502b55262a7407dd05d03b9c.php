

<!-- In send-interest-component.blade.php -->

    <?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>User ID: <?php echo e($searchResult->id); ?></p>
        <!-- Access other user data -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\user-actions\send-interest-component.blade.php ENDPATH**/ ?>