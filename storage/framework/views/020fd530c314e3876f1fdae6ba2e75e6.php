
<form action="<?php echo e(route('settings.image.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <div class="mb-3">
        
        <div class="form-check mt-5">
            <input class="form-check-input" type="radio" name="image_privacy" id="privacyAll" value="1"
                <?php echo e(old('image_privacy', $settingData->image) == 1 ? 'checked' : ''); ?>>
            <label class="form-check-label" for="privacyAll">Show for All</label>
        </div>

        <div class="form-check mt-5">
            <input class="form-check-input" type="radio" name="image_privacy" id="privacyFriends" value="2"
                <?php echo e(old('image_privacy', $settingData->image) == 2 ? 'checked' : ''); ?>>
            <label class="form-check-label" for="privacyFriends">Show Only Friends</label>
        </div>

        <div class="form-check mt-5">
            <input class="form-check-input" type="radio" name="image_privacy" id="privacyHidden" value="0"
                <?php echo e(old('image_privacy', $settingData->image) == 0 ? 'checked' : ''); ?>>
            <label class="form-check-label" for="privacyHidden">Hide from All</label>
        </div>

    </div>
    <div class="row mt-5" style="margin-left: 18rem;">
        <button type="submit" class="btn btn-primary" style="background-color: #E47203; border:none">Update</button>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\settings\image-setting-component.blade.php ENDPATH**/ ?>