<div class="text-center">
    <h1>Welcome Admin</h1>
</div>
<?php
   $abc=  Auth::guard('admin')->user()->email;
   dump( $abc);
?>
<div>
    <a href="<?php echo e(url('logout')); ?>">Logout</a>
</div><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\admins\admin-dashboard.blade.php ENDPATH**/ ?>