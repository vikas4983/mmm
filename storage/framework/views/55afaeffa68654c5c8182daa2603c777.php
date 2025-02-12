<?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="gt-panel gt-panel-default gt-panel-default gt-main-profile">
        <a href="<?php echo e(route('profile', $searchResult->uuid)); ?>" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">
                    <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                        <?php echo e($searchResult->name ?? 'NA'); ?>(<?php echo e($prefix->name ?? 'NA'); ?>-<?php echo e($searchResult->matrimony_id ?? 'NA'); ?>)
                    </h4>
                </div>

                <span id="success-alert<?php echo e($searchResult->id); ?>"></span>



                
            </div>
        </a>

        <a href="member-profile?view_id=IN38" target="_blank" class="gt-result-panel-body">
            <div class="row gt-padding-bottom-15" bis_skin_checked="1">
                <div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth" bis_skin_checked="1">
                    <div class="thumbnail gt-margin-bottom-0" bis_skin_checked="1">
                        <?php if(isset($searchResult->images)): ?>
                            <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($image->dp_image === '1'): ?>
                                    <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                        class="img-responsive gtFullWidth" alt="User Image">
                                <?php else: ?>
                                    <img src="<?php echo e($searchResult->gender === 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg')); ?>"
                                        class="img-responsive gtFullWidth" alt="User Image">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <img src="<?php echo e($searchResult->gender === 'male'
                                ? asset('storage/users/images/male-default.jpg')
                                : asset('storage/users/images/female-default.jpg')); ?>"
                                class="img-responsive gtFullWidth" alt="User Image">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xxl-14 col-xl-14 col-xs-16 col-lg-13 gt-margin-top-10 gridFullWidth"
                    bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="redirect" bis_skin_checked="1">
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7 ">Age :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->age); ?>


                                    </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7 ">Height :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->heights->name ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden " bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Marital Status :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->maritalStatus->name ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden " bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Religion :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->religions->name ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Caste :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->castes->name ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0 ">
                                    <label class="col-xs-7 gridHidden">Location :</label>
                                    <span class="col-xs-9 gridFullWidth">
                                        <?php echo e($searchResult->carrierDetails->location ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Education :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->carrierDetails->educations->education ?? ''); ?></span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Mother Tongue :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->motherTongues->name ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Occupation :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->carrierDetails->occupations->occupation ?? ''); ?> </span>
                                </p>
                            </div>
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7">Income :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->carrierDetails->incomes->income ?? ''); ?> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <style>

        </style>
        <div class="gt-result-panel-footer" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden interest-btn-container"
                    bis_skin_checked="1">

                    <?php if(
                        !empty($user) &&
                            !empty($user->invitationDetails) &&
                            $user->invitationDetails->where('receiver_id', $searchResult->id)->where('is_sent', 1)->isNotEmpty()): ?>
                        <div id="send-request<?php echo e($searchResult->id); ?>">
                            <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                                data-id="<?php echo e($searchResult->id); ?>">
                                <span style="color:#A0061C">
                                    <i class="fas fa-times gt-margin-right-5 text-danger"></i> Cancel
                                </span>
                            </a>
                        </div>
                    <?php else: ?>
                        <div id="send-request<?php echo e($searchResult->id); ?>">
                            <a class="btn btn-default btn-block inResultSendMessageBtn send-interest-btn"
                                data-id="<?php echo e($searchResult->id); ?>">
                                <i class="fas fa-heart gt-margin-right-5"></i> Interest
                            </a>
                        </div>
                    <?php endif; ?>


                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a href="composeMessages?user_id=IN38" class="btn btn-default btn-block inResultSendMessageBtn ">
                        <i class="fas fa-envelope"></i> Send Message</a>
                </div>
                <?php if(
                    !empty($user) &&
                        !empty($user->invitationDetails) &&
                        $user->invitationDetails->where('receiver_id', $searchResult->id)->where('status', 0)->isNotEmpty()): ?>
                    <div id="block-user<?php echo e($searchResult->id); ?>"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="<?php echo e($searchResult->id); ?>"
                            class="btn btn-default btn-block inResultBlockBtn unBlock-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i> Unblock </a>
                    </div>
                <?php else: ?>
                    <div id="block-user<?php echo e($searchResult->id); ?>"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="<?php echo e($searchResult->id); ?>"
                            class="btn btn-default btn-block inResultBlockBtn block-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i> Block </a>
                    </div>
                <?php endif; ?>
                
                
                <div id="block-contact<?php echo e($searchResult->id); ?>"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="<?php echo e($searchResult->id); ?>"
                        class="btn btn-default btn-block inResultSendMessageBtn view-contact-btn">
                        <i class="fas fa-mobile-alt"></i> View Contact </a>
                </div>
                
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    $(document).on('click', '.send-interest-btn, .cancel-interest-btn, .block-btn, .unBlock-btn, .view-contact-btn',
        function() {
            const receiver_id = $(this).data('id');
            const sendInterest = $(this).hasClass('send-interest-btn');
            const cancelInterest = $(this).hasClass('cancel-interest-btn');
            const blockUser = $(this).hasClass('block-btn');
            const unBlock = $(this).hasClass('unBlock-btn');
            const viewContact = $(this).hasClass('view-contact-btn');
            let action = sendInterest ?
                '/send-interest' :
                cancelInterest ?
                '/cancel-interest' :
                blockUser ?
                '/block-user' :
                unBlock ?
                '/unblock-user' :
                viewContact ?
                '/view.contact' :
                '';
            sendRequest(receiver_id, action);

        });

    function sendRequest(receiver_id, action) {
        $.ajax({
            url: action,
            method: 'POST',
            data: {
                receiver_id: receiver_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.action === 'sendInterest') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#send-request" + receiver_id).html(response.button)
                }
                if (response.action === 'blockUser') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#block-user" + receiver_id).html(response.button);
                }

                // }
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message);
            },
        });

    }
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\profile-card-component.blade.php ENDPATH**/ ?>