
<?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="messageModal<?php echo e($searchResult->id); ?>" data-id="<?php echo e($searchResult->id); ?>" tabindex="-1"
        aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
               <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 530px; background-color:white;border:none;font-size:20px">
                    ✖
                </button>
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-md-4 text-center mb-3">
                            <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e($image->name ? asset('storage/users/images/' . $image->name) : asset('user/images/male-default.jpg')); ?>"
                                    class="rounded-circle img-fluid"
                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;"
                                    alt="User Image">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <h4><?php echo e($prefix->name); ?><?php echo e($searchResult->matrimony_id ?? ''); ?></h4>
                            <div id="successMessage<?php echo e($searchResult->id ?? ''); ?>"></div>
                            <div id="expireMessage<?php echo e($searchResult->id ?? ''); ?>" style="color: #AF3042"></div>
                        </div>
                        
                        <div class="col-md-8" style="margin-top: -2.5rem">
                            <h3 class="mb-1"><?php echo e($searchResult['name'] ?? 'NA'); ?></h3>
                            <p class="text-muted">Profile created by <?php echo e($searchResult['profile_for'] ?? 'NA'); ?></p>
                            <div class="mt-3">
                                <form class="send-message-form" method="post" data-id="<?php echo e($searchResult->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <textarea name="message" id="message<?php echo e($searchResult->id); ?>" placeholder="Enter Message" class="modal-textarea"></textarea>
                                    <div class="row text-center">
                                        <button class="btn gt-btn-green gt-cursor send-message-btn"
                                            type="submit">Send</button>
                                        
                                  <a href="<?php echo e(route('message')); ?>" class="btn gt-btn-green gt-cursor send-message-btn">View Message</a>

                                    </div>
                                </form>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\modals\message-modal-component.blade.php ENDPATH**/ ?>