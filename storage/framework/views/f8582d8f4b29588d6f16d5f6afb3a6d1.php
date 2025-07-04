
<?php $__env->startSection('title', 'Change Password - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 gt-margin-bottom-20 text-center">
                <h2 class="inPageTitle fontMerriWeather inThemeOrange">All Settings</h2>
                <p class="inPageSubTitle">Here is all of your settings you can set your privacy as you want.</p>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 gt-search-opt gt-margin-bottom-20">
                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        
                        
                        <li role="presentation" class="active">
                            <a href="#change-password" aria-controls="change-password" role="tab" data-toggle="tab">
                                <i class="fa fa-cog gt-margin-right-10 fa-lg"></i> Change Password </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Photo Privacy -->
                        
                        <!-- /. Photo Privacy -->
                        <!-- Blacklist -->
                        
                        <!-- /. Blacklist -->
                        <!-- Contact View -->
                        
                        <!-- /. Contact View -->
                        <!-- Change Password -->
                        <div role="tabpanel" class="tab-pane  active " id="change-password">
                            <div class="row">
                                
                                <div class="col-xxl-12 col-xxl-offset-2 col-xl-14 col-xl-offset-1">
                                    <h3 class="inSearchTitle">Change Password</h3>
                                    <?php $__currentLoopData = ['success', 'error', 'warning', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(session($msg)): ?>
                                        <div class="alert alert-<?php echo e($msg); ?>">
                                            <?php echo e(session($msg)); ?>

                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                        Have any privacy concern ? You can easily change your account password from here.
                                    </p>
                                    <div class="row">
                                        <form action="<?php echo e(url('changePassword')); ?>" method="post" name="change_password"
                                            id="change_password">
                                            <?php echo csrf_field(); ?>
                                            <div
                                                class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15">
                                                <label for="current_password">Enter Current Password</label>
                                                <input type="password" id="current_password" name="current_password"
                                                    class="gt-form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    required>
                                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div
                                                class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15">
                                                <label>Enter New Password</label>
                                                <input type="password"
                                                    class="gt-form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="new_password" name="new_password" required>
                                                <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div
                                                class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15">
                                                <label>Confirm New Password</label>
                                                <input type="password"
                                                    class="gt-form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="password_confirmation" name="password_confirmation" required>
                                                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>

                                            <div
                                                class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15 text-center">
                                                <input type="submit" name="submit" value="Save Changes"
                                                    class="btn gt-btn-green inBtnTheme-1">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. Change Password -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function($) {
            var $window = $(window),
                $html = $('.mobile-collapse');
            $window.width(function width() {
                if ($window.width() > 767) {
                    return $html.addClass('in');
                }
                $html.removeClass('in');
            });
        })(jQuery);
    </script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/validetta.js')); ?>"></script>
    <script type="text/javascript">
        $(function() {
            $('#set_photo_pass_form').validetta({
                errorClose: false,
                realTime: true
            });
        });
        $(function() {
            $('#blocklist_form').validetta({
                errorClose: false,
                realTime: true
            });
        });
        $(function() {
            $('#change_pass').validetta({
                errorClose: false,
                realTime: true
            });
        });

        function photovisbility(pval) {
            var dataString = 'photo_view_status=' + pval;
            jQuery.ajax({
                url: "./web-services/set_view_preference",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#photo-settings').html(response);
                    if (pval == '0') {
                        $('#photo_view_status').html(
                            '<i class="fa fa-eye-slash gt-margin-right-10"></i>Hidden For All');
                    } else if (pval == '1') {
                        $('#photo_view_status').html(
                            '<i class="fa fa-eye gt-margin-right-10"></i>Visible To All Members');
                    } else if (pval == '2') {
                        $('#photo_view_status').html(
                            '<i class="fa fa-eye gt-margin-right-10"></i>Visible To Paid Members');
                    }
                    //alert('Your photo view preference is edited Successfully.');
                },
            });
        }

        function contactvisbility(pval) {
            var dataString = 'contact_view_status=' + pval;
            jQuery.ajax({
                url: "./web-services/set_view_preference",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#contact-show').html(response);
                    if (pval == '1') {
                        $('#contact_view_status').html(
                            '<i class="fa fa-eye gt-margin-right-10"></i>Show To Paid Members');
                    } else if (pval == '0') {
                        $('#contact_view_status').html(
                            '<i class="fa fa-eye gt-margin-right-10"></i>Show To Express Interest &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accepted Paid Member'
                        );
                    }
                    //alert('Your photo view preference is edited Successfully.');
                },
            });
        }

        function removephotopass() {
            var dataString = 'remove_photo_pass=1';
            jQuery.ajax({
                url: "./web-services/set_view_preference",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    alert('Your photo protect password successfully removed.');
                    window.location = 'settings?photoVisiblity';
                },
            });
        }
        $(document).ready(function(e) {
            photovisbility('1');
            contactvisbility('1');
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'web-services/blocklist-pagination',
                type: 'POST',
                data: 'actionfunction=showData' + '&page=1',
                success: function(data) {
                    $('#blocklistdiv').html(data);
                },
                error: function() {
                    //called when there is an error
                    //console.log(e.message);
                }
            });
            $('#blocklistdiv').on('click', '.page-numbers', function() {
                $page = $(this).attr('href');
                $pageind = $page.indexOf('page=');
                $page = $page.substring(($pageind + 5));
                var dataString = 'actionfunction=showData' + '&page=' + $page;
                $.ajax({
                    url: "web-services/blocklist-pagination",
                    type: "POST",
                    data: dataString,
                    cache: false,
                    success: function(response) {
                        $('#blocklistdiv').html(response);
                    }
                });
                return false;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\settings\changePassword.blade.php ENDPATH**/ ?>