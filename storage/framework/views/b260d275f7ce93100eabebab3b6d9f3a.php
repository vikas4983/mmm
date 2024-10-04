<div class="modal fade" id="exampleModal-editPlan<?php echo e($paidUser->user->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Plan</h5>
                <button type="button" class="close position-absolute" style="right: 1rem;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="<?php echo e(route('payments.update', $paidUser->id)); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <input type="hidden" name="user_id" value="<?php echo e($paidUser->user->id); ?>">
                    <div class="form-group">
                        <label>Select Plan</label>
                        <select name="plan_id" class="form-control col-lg-12" required>
                            <option value="" disabled selected>Select a Plan</option>
                            <option value="1">Silver</option>
                            <option value="2">Gold</option>
                            <option value="3">Diamond</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\edit-plan-component.blade.php ENDPATH**/ ?>