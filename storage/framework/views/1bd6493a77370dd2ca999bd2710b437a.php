<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <label for="state-<?php echo e($state->id); ?>" class="col-xs-16">
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
                    <?php echo e($state->state); ?>

                </span>
            </div>

        </label>
    </div>
    <?php $__currentLoopData = $state->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-16" bis_skin_checked="1">
            <label for="city-<?php echo e($city->id); ?>">
                <input type="checkbox" id="city-<?php echo e($city->id); ?>" value="<?php echo e($city->id); ?>" name="city[]"
                    class="city-filter"
                    <?php echo e(in_array($city->id, old('city', $basicFilter['city'] ?? [])) ? 'checked' : ''); ?>>
                <span class="gt-margin-left-10 gt-cursor name">
                    <?php echo e($city->city); ?>

                </span>
            </label>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script></script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/ajaxOptions/sidebarFilter/cities.blade.php ENDPATH**/ ?>