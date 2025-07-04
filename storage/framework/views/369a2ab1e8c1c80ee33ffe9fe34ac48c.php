<?php $__env->startSection('title', 'Dashboard - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
    
    <div id="dashboard">
        <div class="container mt-20 searchresult" id="searchresult">
            <div class="row">
                <div class="col-xxl-4 col-xs-16 col-sm-16 mb-30">
                    <div class="thumbnail gt-margin-bottom-0 inHomeMainThumb">
                        <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($image->dp_image === '1'): ?>
                                <img src="<?php echo e(isset($image) && isset($image->name) && $image->name
                                    ? asset('storage/users/images/' . $image->name)
                                    : (isset($image) && isset($image->gender) && $image->gender == 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg'))); ?>"
                                    class="img-responsive gtFullWidth" alt="User Image">
                                <a href="<?php echo e(route('my.photos')); ?>" class="gt-myhome-caption ripplelink">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->images->isEmpty()): ?>
                            <img src="<?php echo e($user->gender == 'male'
                                ? asset('storage/users/images/male-default.jpg')
                                : asset('storage/users/images/female-default.jpg')); ?>"
                                class="img-responsive gtFullWidth" alt="User Image">
                        <?php endif; ?>

                        <a href="<?php echo e(route('my.photos')); ?>">
                            <i class="fa fa-camera gt-margin-right-10"></i><span
                                class=""><?php echo e($dashboardConstacts['change_profile_picture'] ?? 'Default'); ?></span>
                        </a>

                    </div>

                    <div id="loaderID"></div>
                </div>
                <div class="clearfix visible-xs visible-sm mb-10"></div>
                <div class="col-xxl-12 col-sm-16 col-xs-16">
                    <div class="gt-body mb-20 gtHomeBody">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-10">
                                <h4>
                                    <span class="gt-text-orange"><?php echo e($user->name); ?>(
                                        <?php echo e($prefix->name); ?>-<?php echo e($user->matrimony_id); ?>

                                        ) </span>
                                    <small class="text-muted gt-margin-left"></small>
                                </h4>
                                
                                <div class="font-12">
                                    Tip : insert all details which can help you to find perfect life partner </div>
                                <div class="mt-10">
                                    <a href="<?php echo e(route('my.profile')); ?>" class="gt-text-green">
                                        Complete Your Profile <i class="fa fa-caret-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Recent Login -->
                            
                            <!-- /. Recent Login -->
                        </div>
                    </div>
                    <div id="alerts"></div>
                    <div class="gt-body gtHomeBody inHomeIdSearch mb-20">
                        <form action="<?php echo e(route('search.by.id')); ?>" method="post" class="mb-0">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <?php echo $__env->make('alerts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-xxl-4">
                                    <h4><?php echo e($dashboardConstacts['search_by_id'] ?? 'Default'); ?></h4>
                                </div>
                                <div class="col-xxl-8">
                                    <div class="form-group clearfix mb-0">
                                        <input type="text" class="gt-form-control" id="searchById" name="searchById"
                                            pattern="^\d{6}$" placeholder="Enter matri ID to search" minlength="6"
                                            maxlength="6" required>
                                    </div>
                                    <div id="errorMessage" style="color: red; font-size: 14px; margin-top: 5px;">
                                        <!-- Error messages will appear here -->
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <button type="submit" id="searchByIdBtn" class="btn gt-btn-orange">
                                        <?php echo e($dashboardConstacts['search_now'] ?? 'Default'); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <aside class="col-xxl-4 col-xl-4 col-xs-16">
                    <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 visible-xs visible-sm visible-md btn-md"
                        role="button" data-toggle="collapse" href="#collapseLeftPanel" aria-expanded="false"
                        aria-controls="collapseLeftPanel">
                        Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse mobile-collapse mb-15" id="collapseLeftPanel">
                        <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                            <div class="gt-panel-head">
                                <div class="gt-panel-title text-center">
                                    <?php echo e($dashboardConstacts['message'] ?? 'Default'); ?> </div>
                            </div>
                            <div class="gt-left-pan-option">
                                <div class="row">
                                    <a href="<?php echo e(route('message')); ?>" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['inbox'] ?? 'Default'); ?> </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                            <div class="gt-panel-head">
                                <div class="gt-panel-title text-center">
                                    <?php echo e($dashboardConstacts['my_profile'] ?? 'Default'); ?> </div>
                            </div>
                            <div class="gt-left-pan-option">
                                <div class="row">
                                    <a href="<?php echo e(route('my.profile')); ?>" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <?php echo e($dashboardConstacts['edit_profile'] ?? 'Default'); ?> </a>
                                    <a href="<?php echo e(route('my.photos')); ?>"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                        <?php echo e($dashboardConstacts['manage_photos'] ?? 'Default'); ?> </a>
                                </div>
                            </div>
                        </div>
                        <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                            <div class="gt-panel-head">
                                <div class="gt-panel-title text-center">
                                    <?php echo e($dashboardConstacts['profile_details'] ?? 'Default'); ?> </div>
                            </div>
                            <div class="gt-left-pan-option">
                                <div class="row">
                                    <a href="<?php echo e(route('my.interest')); ?>" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['express_interest_received'] ?? 'Default'); ?></div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('my.shortlist')); ?>"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['my_shortlist_profile'] ?? 'Default'); ?> </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('block.by.me')); ?>"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['my_blocklist_profile'] ?? 'Default'); ?> </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>

                                    <a href="<?php echo e(route('view.profile.by.other')); ?>"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['my_profile_viewed_by'] ?? 'Default'); ?> </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('view.profile')); ?>"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['i_visited_profile'] ?? 'Default'); ?> </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>
                                    <a href="<?php echo e(route('view.contact.by.me')); ?>"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                <?php echo e($dashboardConstacts['mobile_number_viewed_by_me'] ?? 'Default'); ?> </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div id="app"></div>
                <script src="<?php echo e(mix('js/app.js')); ?>"></script>

                <div class="col-xxl-12 col-xl-12 col-xs-16">
                    <!-- Recently Joined -->
                    <?php if(count($recentJoinProfiles) > 0): ?>
<div class="gt-panel inHomePanel">
                        <div class="gt-panel-border-green">
                            <div class="gt-panel-title inPanelGreenTitle">
                                <i class="fas fa-user-plus"></i> RECENTLY JOINED
                            </div>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <?php $__currentLoopData = $recentJoinProfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentJoinProfile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                        <a href="<?php echo e(route('profile', $recentJoinProfile->uuid)); ?>" target="_blank"
                                            class="gt-result">
                                            <div class="thumbnail">
                                                <?php
                                                    $dpImage = $recentJoinProfile->images->firstWhere('dp_image', '1');
                                                ?>

                                                <?php if($dpImage && $dpImage->name): ?>
                                                    <img src="<?php echo e(asset('storage/users/images/' . $dpImage->name)); ?>"
                                                        title="<?php echo e($recentJoinProfile->name ?? ''); ?>" alt="User Image"
                                                        class="img-responsive gtFullWidth"
                                                        style="width: 150px; height: 150px; object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?php echo e($recentJoinProfile->gender === 'male'
                                                        ? asset('storage/users/images/male-default.jpg')
                                                        : asset('storage/users/images/female-default.jpg')); ?>"
                                                        title="<?php echo e($recentJoinProfile->name ?? ''); ?>" alt="User Image"
                                                        class="img-responsive gtFullWidth"
                                                        style="width: 150px; height: 150px; object-fit: cover;">
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                                $recentSetting = $recentJoinProfile->userSettings->first();
                                                $authSetting = Auth::user()->userSettings->first();
                                            ?>

                                            <?php if(!empty($recentSetting) && !empty($authSetting)): ?>
                                                <?php if($recentSetting->name === 0): ?>
                                                    <h5 class="text-center gt-text-orange">
                                                        <?php echo e($prefix->name ?? ''); ?> -
                                                        <?php echo e($recentJoinProfile->matrimony_id ?? ''); ?>

                                                    </h5>
                                                <?php elseif($recentSetting->name === 2 && $authSetting->name === 2): ?>
                                                    <h5 class="text-center gt-text-orange">
                                                        <?php echo e($recentJoinProfile->name ?? ''); ?> (<?php echo e($prefix->name ?? ''); ?> -
                                                        <?php echo e($recentJoinProfile->matrimony_id ?? ''); ?>)
                                                    </h5>
                                                <?php else: ?>
                                                    <?php if(!empty($recentJoinProfile->name)): ?>
                                                        <h5 class="text-center gt-text-orange">
                                                            <?php echo e($recentJoinProfile->name); ?>

                                                        </h5>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <article class="gt-margin-bottom-5 text-center">
                                                <?php echo e($recentJoinProfile->age()); ?>,
                                                <?php echo e($recentJoinProfile->basicDetails->heights->name ?? ''); ?> ,
                                                <?php echo e($recentJoinProfile->carrierDetails->occupations->occupation ?? ''); ?>

                                            </article>
                                            <article class="text-center">
                                                <?php echo e($recentJoinProfile->carrierDetails->states->state ?? ''); ?>,
                                                <?php echo e($recentJoinProfile->carrierDetails->countries->country ?? ''); ?>

                                            </article>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('recent.join')); ?>">
                                    <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                        title="View All">
                                        <i class="fas fa-user-check"></i> Show All </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <?php endif; ?>
                    
                    <!-- /. Recently Joined -->

                    <!-- Featured Profiles -->
                    
                    <!-- /. Featured Profiles -->

                    <!-- My Matches -->
                    
                    <!-- /. My Matches -->

                    <!-- Recently Visited -->
                    <div class="gt-panel inHomePanel">
                        <div class="gt-panel-border-green">
                            <div class="gt-panel-title inPanelGreenTitle">
                                <i class="fas fa-clock"></i> RECENTLY VISITED
                            </div>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <?php $__currentLoopData = $recentVisitedProfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentVisitedProfile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                        <a href="<?php echo e(route('profile', $recentVisitedProfile->uuid)); ?>" target="_blank"
                                            class="gt-result">
                                            <div class="thumbnail">
                                                <?php
                                                    $dpImage = $recentVisitedProfile->images->firstWhere(
                                                        'dp_image',
                                                        '1',
                                                    );
                                                ?>

                                                <?php if($dpImage && $dpImage->name): ?>
                                                    <img src="<?php echo e(asset('storage/users/images/' . $dpImage->name)); ?>"
                                                        title="<?php echo e($recentVisitedProfile->name ?? ''); ?>" alt="User Image"
                                                        class="img-responsive gtFullWidth"
                                                        style="width: 150px; height: 150px; object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?php echo e($recentVisitedProfile->gender === 'male'
                                                        ? asset('storage/users/images/male-default.jpg')
                                                        : asset('storage/users/images/female-default.jpg')); ?>"
                                                        title="<?php echo e($recentVisitedProfile->name ?? ''); ?>" alt="User Image"
                                                        class="img-responsive gtFullWidth"
                                                        style="width: 150px; height: 150px; object-fit: cover;">
                                                <?php endif; ?>
                                            </div>
                                            <?php
                                                $recentVisited = $recentVisitedProfile->userSettings->first();
                                            ?>
                                            <?php if(!empty($recentVisited) && !empty($authSetting)): ?>
                                                <?php if($recentVisited->name === 0): ?>
                                                    <h5 class="text-center gt-text-orange">
                                                        <?php echo e($prefix->name ?? ''); ?> -
                                                        <?php echo e($recentJoinProfile->matrimony_id ?? ''); ?>

                                                    </h5>
                                                <?php elseif($recentVisited->name === 2 && $authSetting->name === 2): ?>
                                                    <h5 class="text-center gt-text-orange">
                                                        <?php echo e($recentJoinProfile->name ?? ''); ?> (<?php echo e($prefix->name ?? ''); ?> -
                                                        <?php echo e($recentJoinProfile->matrimony_id ?? ''); ?>)
                                                    </h5>
                                                <?php else: ?>
                                                    <?php if(!empty($recentJoinProfile->name)): ?>
                                                        <h5 class="text-center gt-text-orange">
                                                            <?php echo e($recentJoinProfile->name); ?>

                                                        </h5>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <article class="gt-margin-bottom-5 text-center">
                                                <?php echo e($recentVisitedProfile->age()); ?>,
                                                <?php echo e($recentVisitedProfile->basicDetails->heights->name ?? ''); ?> ,
                                                <?php echo e($recentVisitedProfile->carrierDetails->occupations->occupation ?? ''); ?>

                                            </article>
                                            <article class="text-center">
                                                <?php echo e($recentVisitedProfile->carrierDetails->states->state ?? ''); ?>,
                                                <?php echo e($recentVisitedProfile->carrierDetails->countries->country ?? ''); ?>

                                            </article>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('view.profile')); ?>">
                                    <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                        title="View All">
                                        <i class="fas fa-history"></i> Show All </button>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- /. Recently Visited -->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchByIdForm = document.getElementById("searchByIdForm");
            const errorMessage = document.getElementById("errorMessage");
            const searchResult = document.getElementById("searchResult");
            const alerts = document.getElementById("alerts");

            if (searchByIdForm) {
                searchByIdForm.addEventListener("submit", function(e) {
                    e.preventDefault();
                    const searchById = document.getElementById("searchById").value;
                    const csrfToken = document.querySelector('input[name="_token"]').value;
                    errorMessage.textContent = "";

                    if (!searchById) {
                        errorMessage.textContent = "Please enter a valid Profile ID.";
                        return;
                    }

                    $.ajax({
                        url: "<?php echo e(route('search.by.id')); ?>",
                        method: "POST",
                        data: {
                            _token: csrfToken,
                            searchById: searchById,
                        },
                        success: function(response) {
                            var searchresult = document.getElementById('searchresult');
                            searchresult.innerHTML = response;
                        },
                        error: function(xhr) {
                            alerts.innerHTML = xhr.responseJSON.alert;
                            setTimeout(function() {
                                alerts.innerHTML =
                                    '';
                            }, 3000);
                        },
                    });
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

























































<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\dashboard.blade.php ENDPATH**/ ?>