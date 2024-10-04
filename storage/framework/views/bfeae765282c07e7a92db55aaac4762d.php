<script>
    $(document).ready(function() {
        $('#countries').DataTable();
        $(".dataTables_wrapper").css("width", "100%");
    });
    <?php if(Session::has('success')): ?>
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.success("<?php echo e(session('success')); ?>");
    <?php elseif(Session::has('danger')): ?>
    toastr.options = {
        "closeButton": true
        , "progressBar": true
    }
    toastr.warning("<?php echo e(session('danger')); ?>");
    <?php endif; ?>

</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\toastr.blade.php ENDPATH**/ ?>