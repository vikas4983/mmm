



<?php
    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        'maritalStatuses',
        'rashies',
        'countries',
        'educations',
        'employees',
        'occupations',
        'incomes',
        'fatherOccupations',
        'motherOccupations',
        'bodyTypes',
        'complexions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
    ];
    $optionData = [];
    foreach ($optionKeys as $key) {
        $optionData[$key] = Cache::get($key);
    }
    extract($optionData);

    

?>
<div class="modal fade" id="dynamicUpdateModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form id="accountDetailsForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php switch($field['type']):
                    case ('email'): ?>
                    <?php if (isset($component)) { $__componentOriginal538212dd4828510b89f1f05e4a604186 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal538212dd4828510b89f1f05e4a604186 = $attributes; } ?>
<?php $component = App\View\Components\EditInputComponent::resolve(['name' => $field['name'],'label' => $field['label'],'id' => $id,'actionUrl' => $actionUrl,'user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('edit-input-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EditInputComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal538212dd4828510b89f1f05e4a604186)): ?>
<?php $attributes = $__attributesOriginal538212dd4828510b89f1f05e4a604186; ?>
<?php unset($__attributesOriginal538212dd4828510b89f1f05e4a604186); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal538212dd4828510b89f1f05e4a604186)): ?>
<?php $component = $__componentOriginal538212dd4828510b89f1f05e4a604186; ?>
<?php unset($__componentOriginal538212dd4828510b89f1f05e4a604186); ?>
<?php endif; ?>
                    <?php break; ?>
            
                    <?php case ('password'): ?>
                        <?php if (isset($component)) { $__componentOriginald69afe920a3c2ac1f07889a3f5b5f303 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69afe920a3c2ac1f07889a3f5b5f303 = $attributes; } ?>
<?php $component = App\View\Components\InputComponent::resolve(['name' => $field['name'],'label' => $field['label'],'type' => 'password'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\InputComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69afe920a3c2ac1f07889a3f5b5f303)): ?>
<?php $attributes = $__attributesOriginald69afe920a3c2ac1f07889a3f5b5f303; ?>
<?php unset($__attributesOriginald69afe920a3c2ac1f07889a3f5b5f303); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69afe920a3c2ac1f07889a3f5b5f303)): ?>
<?php $component = $__componentOriginald69afe920a3c2ac1f07889a3f5b5f303; ?>
<?php unset($__componentOriginald69afe920a3c2ac1f07889a3f5b5f303); ?>
<?php endif; ?>
                    <?php break; ?>
            
                    <?php case ('textarea'): ?>
                        <?php if (isset($component)) { $__componentOriginalfb75706cb66544fef9929e8c73e1f48a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb75706cb66544fef9929e8c73e1f48a = $attributes; } ?>
<?php $component = App\View\Components\TextareaComponent::resolve(['name' => $field['name'],'label' => $field['label'],'type' => 'text'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('textarea-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\TextareaComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb75706cb66544fef9929e8c73e1f48a)): ?>
<?php $attributes = $__attributesOriginalfb75706cb66544fef9929e8c73e1f48a; ?>
<?php unset($__attributesOriginalfb75706cb66544fef9929e8c73e1f48a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb75706cb66544fef9929e8c73e1f48a)): ?>
<?php $component = $__componentOriginalfb75706cb66544fef9929e8c73e1f48a; ?>
<?php unset($__componentOriginalfb75706cb66544fef9929e8c73e1f48a); ?>
<?php endif; ?>
                    <?php break; ?>
            
                    <?php case ('select'): ?>
                        <?php if (isset($component)) { $__componentOriginald94b2d7f3fc252729315f3348a1d9db3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald94b2d7f3fc252729315f3348a1d9db3 = $attributes; } ?>
<?php $component = App\View\Components\EditSelectComponent::resolve(['name' => $field['name'],'label' => $field['label'],'options' => $field['options']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('edit-select-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EditSelectComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user),'rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald94b2d7f3fc252729315f3348a1d9db3)): ?>
<?php $attributes = $__attributesOriginald94b2d7f3fc252729315f3348a1d9db3; ?>
<?php unset($__attributesOriginald94b2d7f3fc252729315f3348a1d9db3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald94b2d7f3fc252729315f3348a1d9db3)): ?>
<?php $component = $__componentOriginald94b2d7f3fc252729315f3348a1d9db3; ?>
<?php unset($__componentOriginald94b2d7f3fc252729315f3348a1d9db3); ?>
<?php endif; ?>
                    <?php break; ?>
            
                    <?php case ('radio'): ?>
                        <?php if (isset($component)) { $__componentOriginalda588f7898f29684b6e148c7f9640af4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda588f7898f29684b6e148c7f9640af4 = $attributes; } ?>
<?php $component = App\View\Components\RadioComponent::resolve(['name' => $field['name'],'label' => $field['label'],'options' => $field['options'],'selected' => old($field['name'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('radio-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\RadioComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda588f7898f29684b6e148c7f9640af4)): ?>
<?php $attributes = $__attributesOriginalda588f7898f29684b6e148c7f9640af4; ?>
<?php unset($__attributesOriginalda588f7898f29684b6e148c7f9640af4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda588f7898f29684b6e148c7f9640af4)): ?>
<?php $component = $__componentOriginalda588f7898f29684b6e148c7f9640af4; ?>
<?php unset($__componentOriginalda588f7898f29684b6e148c7f9640af4); ?>
<?php endif; ?>
                    <?php break; ?>
            
                    <?php case ('file'): ?>
                        <?php if (isset($component)) { $__componentOriginalf82a045ca5e11a6892e6cb780d2dda6e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf82a045ca5e11a6892e6cb780d2dda6e = $attributes; } ?>
<?php $component = App\View\Components\FileComponent::resolve(['name' => $field['name'],'label' => $field['label']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('file-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\FileComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf82a045ca5e11a6892e6cb780d2dda6e)): ?>
<?php $attributes = $__attributesOriginalf82a045ca5e11a6892e6cb780d2dda6e; ?>
<?php unset($__attributesOriginalf82a045ca5e11a6892e6cb780d2dda6e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf82a045ca5e11a6892e6cb780d2dda6e)): ?>
<?php $component = $__componentOriginalf82a045ca5e11a6892e6cb780d2dda6e; ?>
<?php unset($__componentOriginalf82a045ca5e11a6892e6cb780d2dda6e); ?>
<?php endif; ?>
                    <?php break; ?>
            
                    <?php default: ?>
                    
                    <?php if (isset($component)) { $__componentOriginal538212dd4828510b89f1f05e4a604186 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal538212dd4828510b89f1f05e4a604186 = $attributes; } ?>
<?php $component = App\View\Components\EditInputComponent::resolve(['name' => $field['name'],'label' => $field['label'],'id' => $id,'actionUrl' => $actionUrl,'user' => $user] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('edit-input-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EditInputComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal538212dd4828510b89f1f05e4a604186)): ?>
<?php $attributes = $__attributesOriginal538212dd4828510b89f1f05e4a604186; ?>
<?php unset($__attributesOriginal538212dd4828510b89f1f05e4a604186); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal538212dd4828510b89f1f05e4a604186)): ?>
<?php $component = $__componentOriginal538212dd4828510b89f1f05e4a604186; ?>
<?php unset($__componentOriginal538212dd4828510b89f1f05e4a604186); ?>
<?php endif; ?>
                <?php endswitch; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="form-group text-center">
                        <button type="submit"  id="accountDetailsBtn" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/edit-form-field-component.blade.php ENDPATH**/ ?>