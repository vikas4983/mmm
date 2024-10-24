

<div class="row">
    <div class="col-xxl-16 mt-15">
        <div class="form-group text-center">
            <p>Click on <b>Select Image</b> and then <b>UPLOAD</b> to upload the
                image.</p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div
        class="col-xxl-8 col-xxl-offset-4 col-xl-8 col-xxl-offset-4 col-md-12 col-md-offset-2 col-lg-6 col-lg-offset-5 mt-15">
        <center>
            <div class="thumbnail" style="max-height: 250px;width: 250px;">
                <img src="<?php echo e(asset('frontend/assets/img/upload-male-female')); ?>" class="img-responsive" id="photo1_prev"
                    style="max-height: 250px;width: 250px;">
            </div>
        </center>
    </div>
</div>
<div class="row">
    <div class="col-xxl-6 col-xl-16 col-xxl-offset-5 text-center">
        <div class="row">
            <label for="<?php echo e($name); ?>" class="btn btn-computer btn-block inIndexRegBtn">
                <?php echo e($label); ?>

            </label>
            <input type="file" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" onchange="readURL(this);" required>
          
            <p class="mt-10">After selecting the image, click on <b>Upload &
                    Continue</b> button.</p>
           
        </div>
        <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger" style="font-size: 0.8em;"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\file-component.blade.php ENDPATH**/ ?>