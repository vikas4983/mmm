 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h5 class="modal-title" id="exampleModalLabel">Login with OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 1rem;">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php if(isset($success)): ?>
                    <div class="alert alert-success mt-3">
                        <?php echo e($success); ?>

                    </div>
                <?php endif; ?>
                
                <div class="modal-body">
                    <form action="<?php echo e(url('send-otp')); ?>" method="post" id="otp-form">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <label for="mobile-email">Mobile No. / Email ID</label>
                                <input type="text" id="otp-input" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                    class="form-control col-lg-12" id="mobile" aria-describedby="mobileHelp"
                                    placeholder="Enter Mobile Number Or Email">
                                <span id="error-message-input" style="color: red; display: none;">Enter 10 digit
                                    Number.</span>
                                <span id="error-message" style="color: red; display: none;">Enter 10 digit Valid
                                    Number.</span>
                                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="text-center w-100">
                                <button type="submit" class="btn btn-primary btn-pill mb-4">Send OTP</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("otp-form").addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var otpInput = document.getElementById("otp-input").value;
            var errorMessage = document.getElementById("error-message");
            var errorMessageInput = document.getElementById("error-message-input");

            // Clear previous error messages
            errorMessage.style.display = 'none';
            errorMessageInput.style.display = 'none';

            // Check if OTP input is empty
            if (otpInput === '') {
                errorMessageInput.style.display = 'inline';
            }
            // Check if OTP input length is greater than 10
            else if (otpInput.length > 10) {
                errorMessage.style.display = 'inline';
            } else {
                this.submit(); // Submit the form if validation passes
            }
        });
        document.getElementById("forgot-password").addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var otpInput = document.getElementById("otp-input").value;
            var errorMessage = document.getElementById("error-message");
            var errorMessageInput = document.getElementById("error-message-input");

            // Clear previous error messages
            errorMessage.style.display = 'none';
            errorMessageInput.style.display = 'none';

            // Check if OTP input is empty
            if (otpInput === '') {
                errorMessageInput.style.display = 'inline';
            }
            // Check if OTP input length is greater than 10
            else if (otpInput.length > 10) {
                errorMessage.style.display = 'inline';
            } else {
                this.submit(); // Submit the form if validation passes
            }
        });
    </script><?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\login-with-otp.blade.php ENDPATH**/ ?>