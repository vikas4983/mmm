<style>
    .modal-dialog {
        max-width: 50rem;
        width: 90%;
        margin: 3rem auto;
    }

    .modal-content {
        padding: 2rem;
        border-radius: 10px;
        position: relative;
    }

    .modal-close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        background-color: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    @media (max-width: 1024px) {
        .modal-dialog {
            max-width: 45rem;
        }
    }

    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 40rem;
        }
    }

    @media (max-width: 480px) {

        .modal-dialog {
            max-width: 35rem;
        }

        .modal-content {
            padding: 1.5rem;
        }

        .modal-close-btn {
            font-size: 18px;
        }
    }

    .modal-textarea {
        width: 100%;
        max-width: 100%;
        height: 200px;
        max-height: 250px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: none;
        overflow-y: auto;
    }

    @media (min-width: 768px) {
        .modal-textarea {
            width: 150%;
            max-width: 160%;
        }
    }
</style>
<?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="messageModal<?php echo e($searchResult->id); ?>" data-id="<?php echo e($searchResult->id); ?>" tabindex="-1" aria-labelledby="messageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
                <!-- Close Button (Properly Styled & Functional) -->
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

                        </div>
                        
                        <div class="col-md-8" style="margin-top: -2.5rem">
                            <h3 class="mb-1"><?php echo e($searchResult['name'] ?? 'NA'); ?></h3>
                            <p class="text-muted">Profile created by <?php echo e($searchResult['profile_for'] ?? 'NA'); ?></p>
                            <div class="mt-3">
                                <form action="<?php echo e(route('send.message')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <textarea name="message" id="message" placeholder="Enter Message" class="modal-textarea"></textarea>
                                    <div class="row text-center">
                                        <button id="sendMessageBtn" class="btn gt-btn-green gt-cursor send-message-btn">Send</button>
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