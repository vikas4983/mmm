<div class="modal fade" id="exampleModal-editSpoteLight<?php echo e($paidUser->user->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel">Edit Spote Light</h5>
                <button type="button" class="close position-absolute" style="right: 1rem;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('spotelights.update', $paidUser->user->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('Patch'); ?>
                    <input type="hidden" name="user_id" value="<?php echo e($paidUser->user->id); ?>">
                    <div class="form-group">
                        <label>Spote Light</label>
                        <p>Enter Days Number</p>
                        <input type="number" class="form-control" name="duration" id="duration" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\edit-spote-light-modal-component.blade.php ENDPATH**/ ?>