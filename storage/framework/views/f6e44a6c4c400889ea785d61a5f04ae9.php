<?php $__env->startSection('title', 'Account Verfication'); ?>
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
                <script>
                    function notification(noti_id) {
                        $.ajax({
                            url: "web-services/notification",
                            type: "POST",
                            data: "noti_id=" + noti_id,
                            cache: false,
                            success: function(response) {
                                location.reload();
                            }
                        });
                        return true;
                    }
                </script> <!-- /. Header & Menu -->
                
                <div class="container">
                    <div class="gtMobileVerification col-xxl-10 col-xxl-offset-3 col-xs-16 col-xs-offset-0">
                        <div class="text-center inThemeOrange">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h2 class="inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">Account Verfication
                        </h2>
                        <p class="inPageSubTitle text-center mb-20">Verify Account now to activate your
                            profile.</p>
                        <article class="text-center text-danger">
                            It is mandatory to verify your mobile number otherwise your profile will not be displayed to
                            other members.
                        </article>
                        <?php
                            $mobile = session('accountInfo.mobile');
                            $email = session('accountInfo.email');

                        ?>
                        <div class="gtSMSVerification col-xxl-10 col-xxl-offset-3">
                            <?php echo $__env->make('partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <h4>Verify Account through SMS</h4>
                            <p class="font-12">An SMS with verification PIN has been sent to </p>
                            <h5 class="gtMobileNo">+91-<?php echo e($mobile ?? 'NA'); ?></h5>
                            <div class="col-xxl-16">
                                <a href="#myModal" data-toggle="modal" class="btn gt-btn-orange gt-margin-top-5">Edit
                                    Mobile No</a>
                            </div>

                            <div class="clearfix"></div>
                            <div class="form-group mt-30">
                                <?php if(session()->has('registration_step')): ?>
                                    <form action="<?php echo e(route('otp.varify')); ?>" method="post">
                                    <?php else: ?>
                                        <form action="<?php echo e(route('otp.validate')); ?>" id="resendForm" method="post">
                                <?php endif; ?>

                                <?php echo csrf_field(); ?>
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <!-- Centered Text Box -->
                                    <div class="mb-3 text-center">
                                        <input type="text" class="form-control text-center" name="otp" id="otp"
                                            placeholder="Enter OTP" maxlength="6">

                                        <input type="hidden" name="email" id="email" value="<?php echo e($email); ?>">
                                        <input type="hidden" name="mobile" id="mobile" value="<?php echo e($mobile); ?>">
                                    </div>
                                    <!-- Centered Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn gt-btn-green btnVerify mt-10">Verify</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="col-xs-16">
                                <?php if(session()->has('registration_step')): ?>
                                    <form action="<?php echo e(route('otp.again')); ?>" id="resendForm" method="post">
                                    <?php else: ?>
                                        <form action="<?php echo e(route('otp.resend')); ?>" id="resendForm" method="post">
                                <?php endif; ?>
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="mobile" id="mobile" value="<?php echo e($mobile); ?>">
                                <input type="hidden" name="email" id="email" value="<?php echo e($email); ?>">
                                <input type="hidden" name="action" id="action" value="UserResendOTP">
                                <div class="row">
                                    <div class="col-xs-16 font-12">Not received verification code yet? <span
                                            id="countVerify"></span><b>s</b></div>
                                </div>
                                <button type="submit" class="btn gt-btn-orange mt-10" id="resendOTPBtn" disabled>
                                    Resend OTP
                                </button>
                                </form>
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
                                            resendOTPBtn.setAttribute("disabled", false);
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
                            <?php echo csrf_field(); ?>
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
    <script>
        // var spn = document.getElementById("countVerify");
        // var btn = document.getElementById("btnCounterVerify");

        // var count = 2;
        // var timer = null;

        // function countDown() {

        //     spn.textContent = count;


        //     if (count !== 0) {
        //         timer = setTimeout(countDown, 1000);
        //         count--;
        //     } else {

        //         btn.removeAttribute("disabled");
        //     }
        // }

        // document.getElementById('resendForm').addEventListener('submit', function(e) {
        //     e.preventDefault(); // Prevent the default form submission
        //     const mobile = document.querySelector('input[name="mobile"]').value;


        //     // Pause execution in the browser's developer tools

        //     fetch('<?php echo e(route('otp.resend')); ?>', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
        //             },
        //             body: JSON.stringify({
        //                 mobile: mobile,

        //             })


        //         })
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             document.getElementById('send-otp-success')?.remove();
        //             document.getElementById('send-otp-error')?.remove();
        //             const alertContainer = document.getElementById('alert-container-resend');
        //             alertContainer.innerHTML = ''; // Clear previous alerts

        //             if (data.success) {
        //                 alertContainer.innerHTML = `
    //                 <div class="alert alert-success alert-dismissible fade show" role="alert">
    //                     ${data.message}
    //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                         <span aria-hidden="true">&times;</span>
    //                     </button>
    //                 </div>
    //             `;
        //                 setTimeout(() => {
        //                     const successAlert = document.getElementById('alert-container-resend');
        //                     if (successAlert) {
        //                         successAlert.classList.remove('show');
        //                         successAlert.classList.add('fade');
        //                     }
        //                 }, 5000);

        //                 document.getElementById('resendOTP').disabled = true; // Disable the button again
        //                 startCountdown(); // Start the countdown
        //             } else {
        //                 alertContainer.innerHTML = `
    //                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                     ${data.error}
    //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                         <span aria-hidden="true">&times;</span>
    //                     </button>
    //                 </div>
    //             `;
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Fetch Error:', error);
        //             const alertContainer = document.getElementById('alert-container-resend');
        //             alertContainer.innerHTML = `
    //             <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                 An error occurred. Please try again.
    //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                     <span aria-hidden="true">&times;</span>
    //                 </button>
    //             </div>
    //         `;
        //         });
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\verification.blade.php ENDPATH**/ ?>