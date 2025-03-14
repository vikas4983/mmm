<div class="modal fade" id="photoModal<?php echo e($image->id); ?>" tabindex="-1"
    aria-labelledby="photoModalLabel<?php echo e($image->id); ?>" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="btn-close text-center" data-dismiss="modal" aria-label="Close">X</button>
            <div class="modal-body text-center">
                <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>" class="img-fluid rounded"
                    alt="User Image Large Preview" style="max-height: 500px; object-fit: cover;">
                <h5 class="mt-3"><?php echo e($image->name ?? 'User Name'); ?></h5>
                <p><?php echo e($image->about ?? 'User details or description goes here.'); ?></p>
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-primary">Send Message</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\modals\view-photos-modal-component.blade.php ENDPATH**/ ?>