<div class="modal fade" id="contactModal<?php echo e($contactDetails->id); ?>" tabindex="-1" aria-labelledby="contactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 100px; padding: 15px;">
            <button data-dismiss="modal"
                style="margin-left: 44rem; background-color:white;border:none;font-size:20px">X</button>
            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-md-4">
                        <?php $__currentLoopData = $contactDetails->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($image->dp_image === '1'): ?>
                                <a class="image-frame-">
                                    <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                        class="img-responsive gtFullWidth main-image " alt="User Image">

                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($contactDetails->images->count() === 0): ?>
                            <div class="image-frame-">
                                <img src="<?php echo e($contactDetails->gender === 'male'
                                    ? asset('storage/users/images/male-default.jpg')
                                    : asset('storage/users/images/female-default.jpg')); ?>"
                                    class="img-responsive gtFullWidth main-image" alt="User Image">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-12">
                        <div>
                            <h3 class="mb-1" style="margin-top: -15px"><?php echo e($contactDetails['name'] ?? 'NA'); ?></h3>
                            <p class="mb-1" style="margin-top: -8px;color: #CCCCD0;">Profile created by
                                <?php echo e($contactDetails['profile_for'] ?? 'NA'); ?></p>
                        </div>
                        <div style="margin-top: 30px">
                            <h5>
                                <strong>
                                    <a href="mailto:<?php echo e($contactDetails['email'] ?? '#'); ?>" style="color: black">
                                        <?php echo e($contactDetails['email'] ?? 'NA'); ?>

                                    </a>
                                </strong>
                            </h5>
                            <h5>
                                <strong>
                                    <a href="tel:<?php echo e($contactDetails['mobile'] ?? '#'); ?>" style="color: black">
                                        <?php echo e($contactDetails['mobile'] ?? 'NA'); ?>

                                    </a>
                                </strong>
                            </h5>
                        </div>
                        <hr style="border: 1px solid #CCCCD0; ">
                        <div style="float: right">

                            Contact Balance :
                            <?php echo e($user->payments()->latest()->first()->contact ?? 'NA'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/view-contact.blade.php ENDPATH**/ ?>