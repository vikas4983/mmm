<div id="mobileModal">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <div class="modal fade" id="changeMobileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form id="changeMobileForm" action="<?php echo e(route('request.otp')); ?>" method="post" class="inMobileVerifyChange gt-search-opt">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-xxl-16 text-center">
                                <h4 class="fontMerriWeather">Edit Mobile No</h4>
                            </div>
                            <div class="col-xxl-16 mt-20">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="gt-form-control" id="mobile" name="mobile"
                                        value="<?php echo e(old('mobile', $user->mobile ?? '')); ?>" placeholder="Enter Mobile No"
                                        required>
                                </div>
                            </div>
                            <div class="col-xxl-16 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn gt-btn-orange gt-margin-top-5" name="action" value="mobileVerification">Submit</button>
                                  
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mobileVerifyModal">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <div class="modal fade" id="mobileVerify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form id="mobileVerifyForm"  class="inMobileVerifyChange gt-search-opt">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div id="alert-container-resend" class="mt-3"></div>
                            <h4 class="fontMerriWeather text-center">Verify Mobile Number </h4>
                            <p class="font-12 text-center">An SMS with verification PIN has been sent to</p>
                            <h5 class="gtMobileNo text-center">+91-<span
                                    id="mobileNumber"><?php echo e($data['mobile'] ?? 'NA'); ?></span></h5>

                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="mb-3 text-center">
                                    <input type="text" class="form-control text-center" name="otp" id="otp"
                                        placeholder="Enter OTP" maxlength="6" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="mobileVerifyBtn"
                                        class="btn gt-btn-green btnVerify mt-10">Verify</button>
                                </div>
                            </div>

                            <div class="col-xs-16 mt-3 text-center">
                                <form action="<?php echo e(route('otp.resend')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="mobile" id="mobile"
                                        value="<?php echo e($data['mobile'] ?? 'NA'); ?>">
                                    <input type="hidden" name="email" id="email"
                                        value="<?php echo e($data['email'] ?? 'NA'); ?>">
                                    <input type="hidden" name="action" id="action"
                                        value="<?php echo e($data['action'] ?? 'NA'); ?>">

                                    <div class="row">
                                        <div class="col-xs-16 font-12">
                                            Not received verification code yet? <span id="countVerify">60</span><b>s</b>
                                        </div>
                                    </div>

                                    <button type="submit"  class="btn gt-btn-orange mt-10" id="resendOTPBtn" disabled>
                                        Send OTP Again
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/change-mobile-verification.blade.php ENDPATH**/ ?>