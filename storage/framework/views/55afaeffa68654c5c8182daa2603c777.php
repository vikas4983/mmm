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

    .blurred-image {
        filter: blur(2px);
        transition: filter 0.3s ease;
    }

    .blurred-image-frame {
        position: relative;
        overflow: hidden;
    }

    .center-text {
        position: absolute;
        /* top: 50%; */
        /* left: 50%; */
        /* transform: translate(-50%, -50%); */
        /* background-color: rgba(0, 0, 0, 0.5); */
        color: #ffffff;
        /* padding: 5px 10px; */
        border-radius: 5px;
        font-size: 15px;
        margin-top: 3rem;

    }

    .friend-btn {
        position: relative;
        display: inline-block;
        text-align: center;
        color: #670311;
        transition: background-color 0.3s;
    }

    .friend-btn .hover-text {
        display: none;
    }

    .friend-btn:hover .default-text {
        display: none;
    }

    .friend-btn:hover .hover-text {
        display: inline;
    }
</style>

<?php
    $user = Auth::user();
    $userPayment = $user->payments->last()->is_paid ?? 0;
    $sender = $user->senderInvitation;
    $receiver = $user->receiverInvitation;
    $friends = $sender->merge($receiver);
?>
<?php $__currentLoopData = $searchResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searchResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li id="abcV<?php echo e($searchResult->id); ?>" class="gt-panel gt-panel-default gt-panel-default gt-main-profile ">
        <a href="<?php echo e(route('profile', $searchResult->uuid)); ?>" target="_blank" class="gt-panel-head">
            <div class="row" bis_skin_checked="1">
                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name" bis_skin_checked="1">

                    <?php $__currentLoopData = $searchResult->userSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nameSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($nameSetting->name === 1 && $userPayment === 'Active'): ?>
                            <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                <?php echo e($searchResult->name ?? 'NA'); ?>


                            </h4>
                        <?php elseif($nameSetting->name === 2): ?>
                            <?php
                                $isFriend = $friends->contains(function ($friend) use ($searchResult) {
                                    return ($friend->sender_id === $searchResult->id ||
                                        $friend->receiver_id === $searchResult->id) &&
                                        $friend->is_friend === 1;
                                });
                            ?>
                            <?php if($isFriend && $userPayment === 'Active'): ?>
                                <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                    <?php echo e($searchResult->name ?? 'NA'); ?>

                                    (<?php echo e($prefix->name ?? 'NA'); ?>-<?php echo e($searchResult->matrimony_id ?? 'NA'); ?>)
                                </h4>
                            <?php else: ?>
                                <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                    <i class="far fa-id-card" title="Visible to Friends Only"
                                        style="color: #3A7303"></i>
                                    <?php echo e($prefix->name ?? 'NA'); ?>-<?php echo e($searchResult->matrimony_id ?? 'NA'); ?>


                                </h4>
                            <?php endif; ?>
                        <?php elseif($nameSetting->name === 0): ?>
                            <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                <i class="fas fa-lock" title="Name Hidden" style="color: #670311"></i>
                                <?php echo e($prefix->name ?? 'NA'); ?>-<?php echo e($searchResult->matrimony_id ?? 'NA'); ?>


                            </h4>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <span id="success-alert<?php echo e($searchResult->id); ?>"></span>

                
            </div>
        </a>
        <div class="gt-result-panel-body">
            <div class="row gt-padding-bottom-15" bis_skin_checked="1">
                <div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth " bis_skin_checked="1">
                    <div>
                        <?php $__currentLoopData = $searchResult->userSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($imageSetting->image === 1 && $userPayment === 'Active'): ?>
                                <?php if($searchResult->images->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($image->dp_image === '1'): ?>
                                            <a class="image-frame" data-toggle="modal"
                                                data-target="#photoModal<?php echo e($image->id); ?>">
                                                <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                                    class="img-responsive gtFullWidth main-image" alt="User Image">
                                                <div class="eye-icon viewPhotosModal">
                                                    <span
                                                        style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                        <?php echo e($searchResult->images->count() ?? ''); ?>

                                                    </span>
                                                </div>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da = $attributes; } ?>
<?php $component = App\View\Components\Modals\ViewPhotosModalComponent::resolve(['photos' => $searchResult->images] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                            <?php elseif($imageSetting->image === 2): ?>
                                <?php
                                    $isFriend = $friends->contains(function ($friend) use ($searchResult) {
                                        return ($friend->sender_id === $searchResult->id ||
                                            $friend->receiver_id === $searchResult->id) &&
                                            $friend->is_friend === 1;
                                    });
                                ?>

                                <?php if($isFriend && $userPayment === 'Active'): ?>
                                    <?php if($searchResult->images->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($image->dp_image === '1'): ?>
                                                <a class="image-frame" data-toggle="modal"
                                                    data-target="#photoModal<?php echo e($image->id); ?>">
                                                    <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                                    <div class="eye-icon viewPhotosModal">
                                                        <span
                                                            style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                            <?php echo e($searchResult->images->count() ?? ''); ?>

                                                        </span>

                                                    </div>
                                                </a>
                                                <?php if (isset($component)) { $__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da = $attributes; } ?>
<?php $component = App\View\Components\Modals\ViewPhotosModalComponent::resolve(['photos' => $searchResult->images] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                                <?php else: ?>
                                    <?php if($searchResult->images->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($image->dp_image === '1'): ?>
                                                <a class="image-frame blurred-image-frame">
                                                    <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                                        class="img-responsive gtFullWidth main-image blurred-image"
                                                        alt="User Image">
                                                    <div class="eye-icon viewPhotosModal">
                                                        <span
                                                            style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                            <?php echo e($searchResult->images->count() ?? ''); ?>

                                                        </span>

                                                    </div>
                                                    <div class="center-text" title="Show Only Friend">Only Friend</div>
                                                </a>
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
                                <?php endif; ?>
                            <?php elseif($imageSetting->image === 0): ?>
                                <?php if($searchResult->images->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $searchResult->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($image->dp_image === '1'): ?>
                                            <a class="image-frame blurred-image-frame">
                                                <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                                    class="img-responsive gtFullWidth main-image blurred-image"
                                                    alt="User Image">
                                                <div class="eye-icon viewPhotosModal">
                                                    <span
                                                        style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                        <?php echo e($searchResult->images->count() ?? ''); ?>

                                                    </span>

                                                </div>
                                                <div class="center-text"><i class="fas fa-eye-slash"
                                                        title="Photo Hide"></i></div>
                                            </a>
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
                            <?php else: ?>
                                <div class="image-frame">
                                    <img src="<?php echo e($searchResult->gender === 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg')); ?>"
                                        class="img-responsive gtFullWidth main-image" alt="User Image">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                        ?>
                        <?php $__currentLoopData = $user->senderInvitation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(
                                $sender->receiver_id === $searchResult->id &&
                                    $sender->is_sent === 1 &&
                                    $sender->is_friend === 1 &&
                                    $sender->is_decline === 0): ?>
                                <?php $invitationFound = true; ?>
                                <div id="send-interest<?php echo e($searchResult->id); ?>">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn friend-btn"
                                        data-id="<?php echo e($searchResult->id); ?>">

                                        <span class="default-text">
                                            <i class="fas fa-check gt-margin-right-5" style="color: #28a745;"></i>
                                            Friend
                                        </span>

                                        <span class="hover-text cancel-interest-btn"
                                            data-id="<?php echo e($searchResult->id); ?>" style="color: #dc3545;">
                                            <i class="fas fa-times gt-margin-right-5"></i> Cancel
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
                                    <a class="btn btn-default btn-block inResultSendMessageBtn cancel-interest-btn"
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
                                <div id="friend<?php echo e($searchResult->id); ?>">
                                    <a class="btn btn-default btn-block inResultSendMessageBtn friend-btn"
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span class="default-text">
                                            <i class="fas fa-check gt-margin-right-5"
                                                style="color: #28a745; transition: transform 0.3s;"></i>
                                            Friend
                                        </span>
                                        <span class="hover-text decline-interest-by-me-btn"
                                            data-id="<?php echo e($searchResult->id); ?>" style="color: #dc3545;">
                                            <i class="fas fa-times gt-margin-right-5"></i>
                                            Decline
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
                                    style="display: flex; margin-left: 3.5rem;">
                                    <a class="btn btn-default inResultSendMessageBtn accept-interest-by-me-btn"
                                        style="margin-left: 1.5rem" data-id="<?php echo e($searchResult->id); ?>">
                                        <i class="fas fa-handshake gt-margin-right-5"></i>Accept <span
                                            style="color: #E47203">|</span>
                                    </a>
                                    <a class="btn btn-default inResultSendMessageBtn decline-interest-by-me-btn"
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
                                <div class="row" id="cancel-decline-by-me<?php echo e($searchResult->id); ?>"
                                    style="display: flex; margin-left: 35px;">
                                    <a class="btn btn-default inResultSendMessageBtn cancel-decline-by-me-btn"
                                        data-id="<?php echo e($searchResult->id); ?>">
                                        <span style="color: #A0061C; font-size: 14px;margin-left: 1.5rem; ">
                                            <i class="fas fa-times gt-margin-right-5"></i>Cancel Decline
                                        </span>
                                    </a>
                                </div>
                            <?php elseif(
                                $receiver->sender_id === $searchResult->id &&
                                    $receiver->is_sent === 1 &&
                                    $receiver->is_friend === 1 &&
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
                            <div id="send-interest<?php echo e($searchResult->id); ?>">
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
 <div class="mt-4">
    <?php echo e($searchResults->links()); ?>

</div>
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



















<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\profile-card-component.blade.php ENDPATH**/ ?>