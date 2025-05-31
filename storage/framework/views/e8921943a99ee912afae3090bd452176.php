   <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-16" bis_skin_checked="1">
            <label for="state">
                <input type="checkbox" id="state" value="<?php echo e($state->id); ?>" name="state[]"
                    class="statecb"> <span class="gt-margin-left-10 gt-cursor name"
                   >
                    <?php echo e($state->state); ?></span>
            </label>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\ajaxOptions\sidebarFilter\allStates.blade.php ENDPATH**/ ?>