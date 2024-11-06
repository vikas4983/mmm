
<?php $__env->startSection('title', 'Account Verification'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap & Green Js -->
    <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div id="body">
        <div id="wrap">
            <div id="main">
                <div class="container">
                    <div class="gtMobileVerification col-xxl-10 col-xxl-offset-3 col-xs-16 col-xs-offset-0">
                        <div class="text-center inThemeOrange">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">Account Verification</h2>
                        <article class="text-center text-danger">
                            Verify OTP with mobile number & Email id & Login to your account.
                        </article>
                        <div class="gtSMSVerification col-xxl-10 col-xxl-offset-3">
                            
                            <?php dump($data); ?>
                            <?php echo $__env->make('partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div id="alert-container-resend" class="mt-3"></div>
                            <h4>Verify mobile number through SMS</h4>
                            <p class="font-12">An SMS with verification PIN has been sent to </p>
                            <h5 class="gtMobileNo">+91-<?php echo e($data['mobile'] ?? $data['email']); ?></h5>
                            <div class="col-xxl-16">
                                <a href="#myModal" data-toggle="modal" class="btn gt-btn-orange gt-margin-top-5">Edit
                                    Mobile No</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group mt-30">
                                <form action="<?php echo e(route('login.otp.validate')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="d-flex flex-column align-items-center justify-content-center">

                                        <div class="mb-3 text-center">
                                            <input type="text" class="form-control text-center" name="otp"
                                                id="otp" placeholder="Enter OTP" maxlength="6" required>
                                            <input type="hidden" name="email" id="email"
                                                value="<?php echo e($data['email'] ?? 'NA'); ?>">
                                            <input type="hidden" name="mobile" id="mobile"
                                                value="<?php echo e($data['mobile'] ?? 'NA'); ?>">
                                            <input type="hidden" name="action" id="action"
                                                value="<?php echo e($data['action'] ?? 'NA'); ?>">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn gt-btn-green btnVerify mt-10">Verify</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-16">
                                <form action="<?php echo e(route('otp.resend')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="mobile" id="mobile"
                                        value="<?php echo e($data['mobile'] ?? 'NA'); ?>">
                                    <input type="hidden" name="email" id="email"
                                        value="<?php echo e($data['email'] ?? 'NA'); ?>">
                                    <input type="hidden" name="action" id="action"
                                        value="<?php echo e($data['action'] ?? 'NA'); ?>">
                                    <div class="row">
                                        <div class="col-xs-16 font-12">Not received verification code yet? <span
                                                id="countVerify"></span><b>s</b></div>
                                    </div>
                                    <button type="submit" class="btn gt-btn-orange mt-10" id="resendOTPBtn" disabled>
                                        Send OTP Again
                                    </button>
                                </form>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <form action="" method="post" class="inMobileVerifyChange gt-search-opt">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-xxl-16 text-center">
                                    <h4 class="fontMerriWeather">Edit Mobile No</h4>
                                </div>
                                <div class="col-xxl-16 mt-20">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="text" class="gt-form-control" name="change_mobile"
                                            placeholder="Enter Mobile No">
                                    </div>
                                </div>
                                <div class="col-xxl-16 text-center">
                                    <div class="form-group">
                                        <input type="submit" class="btn gt-btn-orange gt-margin-top-5" name="Submit"
                                            class="gt-form-control" value="Submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container gt-margin-top-10">
        </div>

        <div class="modal fade" id="loginWithOTP" tabindex="-1" role="dialog" aria-labelledby="loginWithOTPLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center" id="loginWithOTPLabel">Login With OTP</h5>
                    </div>
                    <div class="modal-body">
                        <form class="" action="login-with-otp" method="post">
                            <div class="form-group">
                                <label>Email/Mobile No/Matri id</label>
                                <input type="text" name="userId" class="gt-form-control"
                                    placeholder="Enter Email id / Mobile No / Matri Id">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="GET OTP" class="btn gt-btn-green">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Right Click Disable -->
        <!--
                                                                                                                                                                                                                                                    <script language=JavaScript>
                                                                                                                                                                                                                                                        function clickIE4() {
                                                                                                                                                                                                                                                            if (event.button == 2) {
                                                                                                                                                                                                                                                                return false;
                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                                        function clickNS4(e) {
                                                                                                                                                                                                                                                            if (document.layers || document.getElementById && !document.all) {
                                                                                                                                                                                                                                                                if (e.which == 2 || e.which == 3) {
                                                                                                                                                                                                                                                                    return false;
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                        if (document.layers) {
                                                                                                                                                                                                                                                            document.captureEvents(Event.MOUSEDOWN);
                                                                                                                                                                                                                                                            document.onmousedown = clickNS4;
                                                                                                                                                                                                                                                        } else if (document.all && !document.getElementById) {
                                                                                                                                                                                                                                                            document.onmousedown = clickIE4;
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                        document.oncontextmenu = new Function("return false")
                                                                                                                                                                                                                                                    </script>
                                                                                                                                                                                                                                                                                                                                -->
        <!-- /.Right Click Disable -->

        <!-- Live Chat -->
        <script type="text/javascript">
            var auto_refresh = setInterval(
                function() {
                    $('#count').load('parts/online').fadeIn("slow");
                }, 15000
            ); // refresh every 10 second
        </script>
        <script src="js/jquery.min.js"></script>
        <small class="pull-right">
        </small>
        <script>
            var id = 'UA-demo';
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', id, 'auto');
            ga('send', 'pageview');
        </script>
    </div>
    <script>
        $(document).ready(function() {
            $('#body').show();
            $('.preloader-wrapper').hide();
        });
    </script>

    <script type="text/javascript" src="<?php echo e(asset('frontend/assets/js/bootstrap-pincode-input.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#pincode-input1').pincodeInput({
                hidedigits: false,
                complete: function(value, e, errorElement) {
                    $("#pincode-callback").html(
                        "This is the 'complete' callback firing. Current value: " + value);
                }
            });
        });
        window.onload = function() {
            $('#pincode-input1').pincodeInput().data('plugin_pincodeInput').focus();
        };
    </script>


    <script>
        var spn = document.getElementById("countVerify");
        var resendOTPBtn = document.getElementById("resendOTPBtn");
        var resendForm = document.getElementById("resendForm");

        var count = 5;
        var timer = null;

        function countDown() {
            spn.textContent = count;

            if (count > 0) {
                count--;
                resendOTPBtn.setAttribute("disabled", true);
                timer = setTimeout(countDown, 1000);
            } else {
                resendOTPBtn.removeAttribute("disabled");
                clearTimeout(timer);
            }
        }
        resendOTPBtn.addEventListener("click", function(e) {
            resendForm.submit();
            this.disabled = true;
            count = 5;
            countDown();
        });
        window.onload = function() {
            countDown();
        };
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\account-verification.blade.php ENDPATH**/ ?>