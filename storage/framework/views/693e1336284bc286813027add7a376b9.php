<form action="<?php echo e($destroyRoute); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" onclick="return confirm('Are you sure you want to delete?');"
        class="mr-1 mb-3 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle">
        <i class="fas fa-trash" style="color: red"></i>
    </button>
</form><?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\destroy-action-button-component.blade.php ENDPATH**/ ?>