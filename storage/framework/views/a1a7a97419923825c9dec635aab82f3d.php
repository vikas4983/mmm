<div class="d-flex flex-row">
    <button>
        <a href="<?php echo e(url($editRoute, $id)); ?>" class="mr-1 mb-3 btn-lg btn btn-icon btn-outline facebook btn-rounded-circle ">
            <i class=" fa fa-edit"></i>
        </a>
    </button>
    
    <form action="<?php echo e(url($destroyRoute, $id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" onclick="DeleteFunction();"
            class="mr-1 mb-3 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"><i class=" fa fa-trash"
                style="color: red"></i></button>
    </form>
    <script>
        function DeleteFunction() {
            return confirm("Are you sure you want to delete?");
        }
    </script>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\action-button.blade.php ENDPATH**/ ?>