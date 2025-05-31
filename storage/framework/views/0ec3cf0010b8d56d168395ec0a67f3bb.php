<?php
    $user = Auth::user();
    $selectedCastes = old(
        'caste',
        isset($user->basicDetails->castes)
            ? (array) $user->basicDetails->castes->pluck('id')->toArray()
            : [(int) $user->basicDetails->castes->id],
    );
?>

<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <label for="religion-<?php echo e($country->id); ?>" class="col-xs-16">

            <div class="col-xs-16" style="text-align: center;">
                <span
                    style="
                    display: inline-block;
                    background-color: #E47203;
                    color: white;
                    padding: 4px 12px;
                    margin: 6px 0;
                    border-radius: 2px;
                    font-size: 11px;
                    font-weight: bold;
                ">
                    <?php echo e($country->country); ?>

                </span>
            </div>

        </label>
    </div>
   
    <?php $__currentLoopData = $country->state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staten): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-16" bis_skin_checked="1">
            <label for="state">
                <input type="checkbox" id="state" value="<?php echo e($staten->id); ?>" name="state[]"
                    class="statecb"> <span class="gt-margin-left-10 gt-cursor name"
                    <?php echo e(old('state', $user->carrierDetails->states->state) === $staten->id ? 'checked' : ''); ?>>
                    <?php echo e($staten->state); ?>-<?php echo e($staten->id); ?></span>
            </label>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views\ajaxOptions\sidebarFilter\states.blade.php ENDPATH**/ ?>