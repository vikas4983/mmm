<style>
    .image-frame {
        position: relative;
        width: 100px;
        height: 120px;
        overflow: hidden;
        border-radius: 8px;
        border: 1px solid #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
    }

    .main-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .eye-icon {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);

        display: flex;
        align-items: center;
        justify-content: center;

        background-color: rgba(255, 255, 255, 0.8);
        color: #E47203;
        width: 25px;
        height: 25px;
        border-radius: 50%;

        cursor: pointer;
        transition: background 0.3s ease;
    }

    .eye-icon:hover {
        background-color: rgba(228, 114, 3, 0.8);
        color: #fff;
    }
</style>
<?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li id="abcV<?php echo e($searchResult->id); ?>" class="gt-panel gt-panel-default gt-panel-default gt-main-profile ">
        <a href="<?php echo e(route('profile', $searchResult->uuid)); ?>" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">
                    <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                        <?php echo e($searchResult->name ?? 'NA'); ?>(<?php echo e($prefix->name ?? 'NA'); ?>-<?php echo e($searchResult->matrimony_id ?? 'NA'); ?>)
                        - <?php echo e($searchResult->id); ?>

                    </h4>
                </div>
                <span id="success-alert<?php echo e($searchResult->id); ?>"></span>
                
            </div>
        </a>

        <div class="gt-result-panel-body">
            <div class="row gt-padding-bottom-15" bis_skin_checked="1">
                <div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth " bis_skin_checked="1">
                    <div >
                        <?php if(isset($searchResult->images)): ?>
                            <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($image->dp_image === '1'): ?>
                                    <a class="image-frame" data-toggle="modal" data-target="#photoModal<?php echo e($image->id); ?>">
                                        <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                            class="img-responsive gtFullWidth main-image " alt="User Image">
                                        <div class="eye-icon viewPhotosModal">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                    </a>
                                    <?php if (isset($component)) { $__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da = $attributes; } ?>
<?php $component = App\View\Components\Modals\ViewPhotosModalComponent::resolve(['image' => $image] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.view-photos-modal-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modals\ViewPhotosModalComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da)): ?>
<?php $attributes = $__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da; ?>
<?php unset($__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da)): ?>
<?php $component = $__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da; ?>
<?php unset($__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da); ?>
<?php endif; ?>
                                <?php else: ?>
                                <div class="image-frame">
                                    <img src="<?php echo e($searchResult->gender === 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg')); ?>"
                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <div class="image-frame">
                            <img src="<?php echo e($searchResult->gender === 'male'
                            ? asset('storage/users/images/male-default.jpg')
                            : asset('storage/users/images/female-default.jpg')); ?>"
                            class="img-responsive gtFullWidth main-image" alt="User Image">
                        </div>
                            
                        <?php endif; ?>
                    </div>
                </div>

                <a href="<?php echo e(route('profile', $searchResult->uuid)); ?>" target="_blank"
                    class="col-xxl-14 col-xl-14 col-xs-16 col-lg-13 gt-margin-top-10 gridFullWidth"
                    bis_skin_checked="1">
                    <div class="row" bis_skin_checked="1">
                        <div class="redirect" bis_skin_checked="1">
                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth" bis_skin_checked="1">
                                <p class="row gt-margin-bottom-0">
                                    <label class="col-xs-7 ">Age :</label>
                                    <span class="col-xs-9">
                                        <?php echo e($searchResult->basicDetails->age ?? ''); ?>


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
                </a>
            </div>
        </div>
        <div class="gt-result-panel-footer" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden interest-btn-container"
                    bis_skin_checked="1">
                    <?php if(!empty($user)): ?>
                        <?php
                            $invitationFound = false;
                            $isDecline = false;

                        ?>

                        <?php $__currentLoopData = $user->senderInvitation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 1 &&
                                    $sender->is_decline === 0): ?>
                                <?php $invitationFound = true; ?>
                                <div id="send-request<?php echo e($searchResult->id); ?>">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span>
                                            <i class="fas fa-check gt-margin-right-5"
                                                style="color: #28a745; transition: transform 0.3s;"></i>Friend
                                        </span>
                                    </a>
                                </div>
                            <?php elseif(
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 0 &&
                                    $sender->is_decline === 0): ?>
                                <?php $invitationFound = true; ?>
                                <div id="send-request<?php echo e($searchResult->id); ?>">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn decline-interest-btn-by-other"
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span style="color:#A0061C">
                                            <i class="fas fa-times gt-margin-right-5 text-danger"></i>Cancel
                                        </span>
                                    </a>
                                </div>
                            <?php elseif(
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 0 &&
                                    $sender->is_decline === 1): ?>
                                <?php $invitationFound = true; ?>
                                <div class="row" id="accept-by-me<?php echo e($searchResult->id); ?>"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn " style="margin-right: 1.5rem"
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span style="color:#A0061C; margin-left:-1.5rem;">
                                            <i class="fas fa-exclamation-circle text-danger gt-margin-right-5"></i>Your
                                            request rejected
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $user->receiverInvitation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($receiver->sender_id === $searchResult->id && $receiver->is_sent === 1 && $receiver->is_friend === 1): ?>
                                <?php $invitationFound = true; ?>
                                <div id="send-request<?php echo e($searchResult->id); ?>">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span>
                                            <i class="fas fa-check gt-margin-right-5"
                                                style="color: #28a745; transition: transform 0.3s;"></i>Friend
                                        </span>
                                    </a>
                                </div>
                            <?php elseif(
                                $receiver->sender_id === $searchResult->id &&
                                    $receiver->is_sent === 1 &&
                                    $receiver->is_friend === 0 &&
                                    $receiver->is_decline === 0): ?>
                                <?php $invitationFound = true; ?>
                                <div class="row" id="accept-by-me<?php echo e($searchResult->id); ?>"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn accept-interest-btn-by-me"
                                        style="margin-left: 1.5rem" data-id="<?php echo e($searchResult->id); ?>">
                                        <i class="fas fa-handshake gt-margin-right-5"></i>Accept <span
                                            style="color: #E47203">|</span>
                                    </a>
                                    <a class="btn btn-default inResultSendMessageBtn decline-interest-btn-by-me"
                                        style="margin-right: 1.5rem" data-id="<?php echo e($searchResult->id); ?>">
                                        <span style="color:#A0061C; margin-left:-1.5rem;">
                                            <i class="fas fa-times gt-margin-right-5"></i>Decline
                                        </span>
                                    </a>
                                </div>
                            <?php elseif(
                                $receiver->sender_id === $searchResult->id &&
                                    $receiver->is_sent === 1 &&
                                    $receiver->is_friend === 0 &&
                                    $receiver->is_decline === 1): ?>
                                <?php $invitationFound = true; ?>
                                <div class="row" id="accept-by-me<?php echo e($searchResult->id); ?>"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn decline-btn "
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span
                                            style="color:#A0061C; text-align: center;border: none; padding: 7px 10px 7px 10px;border-radius: 5px;margin-bottom: 0px;font-size: 14px; background: none;transition: all 0.3sease">
                                            <i class="fas fa-times gt-margin-right-5"></i>Decline
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if(!$invitationFound): ?>
                            <div id="send-request<?php echo e($searchResult->id); ?>">
                                <a class="btn btn-default btn-block inResultSendMessageBtn send-interest-btn"
                                    data-id="<?php echo e($searchResult->id); ?>">
                                    <i class="fas fa-heart gt-margin-right-5"></i>Interest
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <style>
                        .fa-check:hover {
                            transform: scale(1.5);
                        }
                    </style>
                </div>
                <div id="send-message<?php echo e($searchResult->id); ?>"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="<?php echo e($searchResult->id); ?>"
                        class="btn btn-default btn-block inResultSendMessageBtn send-message-modal ">
                        <i class="fas fa-envelope"></i> Send Message</a>
                </div>

                <?php if(!empty($user) && !empty($user->blockedUser->contains('blocked_id', $searchResult->id))): ?>
                    <div id="block-user<?php echo e($searchResult->id); ?>"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="<?php echo e($searchResult->id); ?>"
                            class="btn btn-default btn-block inResultBlockBtn unBlock-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i>Unblock
                        </a>
                    </div>
                <?php else: ?>
                    <div id="block-user<?php echo e($searchResult->id); ?>"
                        class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                        <a data-id="<?php echo e($searchResult->id); ?>"
                            class="btn btn-default btn-block inResultBlockBtn block-btn">
                            <i class="fas fa-lock gt-margin-right-5"></i>Block
                        </a>
                    </div>
                <?php endif; ?>
                <div id="view-contact<?php echo e($searchResult->id); ?>"
                    class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                    <a data-id="<?php echo e($searchResult->id); ?>"
                        class="btn btn-default btn-block inResultSendMessageBtn view-contact-btn">
                        <i class="fas fa-mobile-alt"></i> View Contact </a>
                </div>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if (isset($component)) { $__componentOriginalb55be17bee5a7c18ce1be12c9593f430 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb55be17bee5a7c18ce1be12c9593f430 = $attributes; } ?>
<?php $component = App\View\Components\Modals\MessageModalComponent::resolve(['searchResults' => $searchResults] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.message-modal-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modals\MessageModalComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb55be17bee5a7c18ce1be12c9593f430)): ?>
<?php $attributes = $__attributesOriginalb55be17bee5a7c18ce1be12c9593f430; ?>
<?php unset($__attributesOriginalb55be17bee5a7c18ce1be12c9593f430); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb55be17bee5a7c18ce1be12c9593f430)): ?>
<?php $component = $__componentOriginalb55be17bee5a7c18ce1be12c9593f430; ?>
<?php unset($__componentOriginalb55be17bee5a7c18ce1be12c9593f430); ?>
<?php endif; ?>



<script>
    $(document).ready(function() {
        $('.send-message-modal').click(function(e) {
            e.preventDefault();
            let receiver_id = $(this).data('id');
            console.log("Receiver ID:", receiver_id);
            let modal = $('#messageModal' + receiver_id);
            if (modal.length) {
                modal.modal('show');
            } else {
                console.error("Modal not found for ID:", receiver_id);
            }
        });
        $(document).on('submit', '.send-message-form', function(e) {
            e.preventDefault();

            let form = $(this);
            let receiver_id = form.attr('data-id');
            let message = form.find('textarea[name="message"]').val().trim();
            if (!message) {
                alert("Please enter a message.");
                return;
            }

            $.ajax({
                url: '/send-message',
                method: 'POST',
                data: {
                    receiver_id: receiver_id,
                    message: message,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    if (response.action === 'sendMessage') {
                        $("#successMessage" + receiver_id).html(response.message);
                    }
                    $("#message" + receiver_id).val('');
                    setTimeout(function() {
                        $("#successMessage" + receiver_id).html("");
                    }, 2000);
                    if (response.action === 'expirePlan') {
                        $("#expireMessage" + receiver_id).html(response.message);
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                    }
                    if (response.action === 'takePlan') {
                        $("#expireMessage" + receiver_id).html(response.message);
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                    }


                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.responseText);
                    alert("Error: " + (xhr.responseJSON?.message ||
                        "Something went wrong!"));
                }
            });
        });
        $(document).on('click', '.modal-close-btn', function() {
            $(this).closest('.modal').modal('hide');
        });
    });
</script>
<script>
    $(document).on('click',
        '.send-interest-btn, .cancel-interest-btn, .block-btn, .unBlock-btn, .view-contact-btn, .accept-interest-btn-by-me, .decline-interest-btn-by-me, .decline-btn',
        function() {
            const receiver_id = $(this).data('id');
            const sendInterest = $(this).hasClass('send-interest-btn');
            const cancelInterest = $(this).hasClass('cancel-interest-btn');
            const blockUser = $(this).hasClass('block-btn');
            const unBlock = $(this).hasClass('unBlock-btn');
            const viewContact = $(this).hasClass('view-contact-btn');
            const acceptByMe = $(this).hasClass('accept-interest-btn-by-me');
            const declineByMe = $(this).hasClass('decline-interest-btn-by-me');
            const declined = $(this).hasClass('decline-btn');
            let action = sendInterest ?
                '/send-interest' :
                cancelInterest ?
                '/cancel-interest' :
                blockUser ?
                '/block-user' :
                unBlock ?
                '/unblock-user' :
                viewContact ?
                '/view-contact' :
                acceptByMe ?
                '/interest-accept-by-me' :
                declineByMe ?
                '/interest-decline-by-me' :
                declined ?
                '/declined' :
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
                    $("#accept-by-me" + receiver_id).html(response.button)
                }

                if (response.action === 'blockUser') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#block-user" + receiver_id).html(response.button);
                }
                if (response.action === 'block') {
                    $("#success-alert" + receiver_id).html(response.message);
                    // $("#block-user" + receiver_id).html(response.button);
                }
                if (response.action === 'viewContact') {
                    //$("#success-alert" + receiver_id).html(response.message);
                    $("body").append(response.html);
                    $("#contactModal" + receiver_id).modal("show");

                }
                if (response.action === 'exceededContact') {
                    $("#success-alert" + receiver_id).html(response.message);
                    setTimeout(function() {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 2000);

                }
                if (response.action === 'hide') {
                    $("#success-alert" + receiver_id).html(response.message);
                    //  $("body").append(response.html); 
                    //  $("#contactModal" + receiver_id).modal("show");
                }
                if (response.action === 'friend') {
                    $("#success-alert" + receiver_id).html(response.message);
                    //  $("body").append(response.html); 
                    //  $("#contactModal" + receiver_id).modal("show");
                }
                if (response.action === 'acceptByMe') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#accept-by-me" + receiver_id).html(response.button);

                }
                if (response.action === 'declineByMe') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#accept-by-me" + receiver_id).html(response.button);

                }
                if (response.action === 'declined') {
                    $("#success-alert" + receiver_id).html(response.message);
                    $("#accept-by-me" + receiver_id).html(response.button);

                }
                if (response.action === 'takePlan') {
                    // $("body").append(response.html);
                    // $("#expireModal").modal("show");
                    $("#success-alert" + receiver_id).html(response.message);

                    setTimeout(function() {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    }, 2000);
                }

                if (response.action === 'expirePlan') {
                    $("body").append(response.html);
                    $("#expireModal").modal("show");
                    if (response.action === 'expirePlan') {
                        setTimeout(function() {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            }
                        }, 2000);

                    }
                }
            },
            error: function(xhr) {
                alert(xhr.responseJSON.message);
            },
        });

    }
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\profile-card-component.blade.php ENDPATH**/ ?>