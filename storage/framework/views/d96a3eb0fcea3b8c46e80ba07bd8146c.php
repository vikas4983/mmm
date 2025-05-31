
    <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <label for="religion-<?php echo e($religion->id); ?>" class="col-xs-16">
                <div class="row">
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
                            <?php echo e($religion->name); ?>

                        </span>
                    </div>
                </div>
            </label>
        </div>
        <?php $__currentLoopData = $religion->castes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <label for="filter-<?php echo e($caste->id); ?>" class="col-xs-16">
                    <div class="row">
                        <span class="col-xs-3">
                            <input type="checkbox"
                                class="castecb caste-checkbox  gt-cursor pull-left gt-margin-right-10" name="caste[]"
                                value="<?php echo e($caste->id); ?>"
                                
                                <?php echo e(in_array($caste->id, old('caste', $basicFilter['caste'] ?? [])) ? 'checked' : ''); ?>>
                        </span>
                        <span style="margin-left: -5px">
                            <?php echo e($caste->name ?? ''); ?>

                        </span>
                    </div>
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\ajaxOptions\sidebarFilter\castes.blade.php ENDPATH**/ ?>