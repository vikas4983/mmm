
<div class="menu-line">
    <form action="<?php echo e($destroyRoute); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" onclick="DeleteFunction()">
            <i class="fa fa-trash" aria-hidden="true" style="color: red; display: inline-block; margin-right: 5px;"></i>
            <?php echo e($name); ?>

        </button>
    </form>
    <script>
        function DeleteFunction() {
            return confirm("Are you sure you want to delete?");
        }
    </script>
</div><?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\destroy-button-component.blade.php ENDPATH**/ ?>