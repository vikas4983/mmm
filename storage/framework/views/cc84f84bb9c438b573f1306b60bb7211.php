<div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
    <!-- Basic Details -->
    <div class="gt-panel gt-panel-default inViewProfile" id="updateAccountSection" style="display: none">
        <div class="gt-panel-head">
            <span class="pull-left"><i class="fa fa-file"></i>Account Details(<?php echo e($prefix->name); ?> -
                <?php echo e($user->id); ?>)</span>
            <a class="pull-right btn gt-btn-orange" data-toggle="modal" data-backdrop ="static" data-keyboard="false"
                data-target="#dynamicUpdateModal" data-info=<?php echo e($user->id); ?> id="updateAccountBtn">
                <i class="fas fa-pencil-alt fa-fw"></i>
                <font class="gt-margin-left-5">Update</font>
            </a>

            
        </div>
        <?php
            $fields = config('formFields.editAccountDetails');
        ?>
        <div class="gt-panel-body">
            <div class="row">

                <form id="userAccountDetailsForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="gt-panel-body">
                        <div class="row">
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php switch($field['type']):
                                    case ('select'): ?>
                                        <?php if (isset($component)) { $__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb = $attributes; } ?>
<?php $component = App\View\Components\SelectProfileUpdateComponent::resolve(['user' => $user,'name' => $field['name'],'label' => $field['label'],'options' => $field['options']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select-profile-update-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SelectProfileUpdateComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb)): ?>
<?php $attributes = $__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb; ?>
<?php unset($__attributesOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb)): ?>
<?php $component = $__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb; ?>
<?php unset($__componentOriginalf8e2d4a3eae46c0bb5ec467ab9bef0cb); ?>
<?php endif; ?>
                                    <?php break; ?>

                                    <?php default: ?>
                                        <?php if (isset($component)) { $__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35 = $attributes; } ?>
<?php $component = App\View\Components\InputProfileUpdateComponent::resolve(['user' => $user,'name' => $field['name'],'label' => $field['label'],'type' => 'text'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-profile-update-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\InputProfileUpdateComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($field['rules'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35)): ?>
<?php $attributes = $__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35; ?>
<?php unset($__attributesOriginal8f7e6025eb2c56b8cc3e102acac9cb35); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35)): ?>
<?php $component = $__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35; ?>
<?php unset($__componentOriginal8f7e6025eb2c56b8cc3e102acac9cb35); ?>
<?php endif; ?>
                                <?php endswitch; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /. Basic Details -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("editAccountBtn").addEventListener("click", function() {
            document.getElementById("editAccountSection").style.display = 'none';
            document.getElementById("updateAccountSection").style.display = 'block';
        });
        let updateUserAccountBtn = document.getElementById("updateAccountBtn");
        if (updateUserAccountBtn) {
            updateUserAccountBtn.addEventListener("click", function() {
                const name = document.getElementById('name')?.value;
                const email = document.getElementById('user_email')?.value;
                const profileFor = document.getElementById('profile_for')?.value;
                const country = document.getElementById('country')?.value;
                const state = document.getElementById('hstate')?.value;
                const city = document.getElementById('hcity')?.value;
                console.log(email, name);

                $.ajax({
                    url: "<?php echo e(route('account.details.update')); ?>",
                    method: "PATCH",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        name: name,
                        user_email: email,
                        profile_for: profileFor,
                        country: country,
                        state: state,
                        city: city,
                    },
                    success: function(response) {
                        $('#updateAccountBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateAccountSection").style
                                .display = 'none';
                            document.getElementById("editAccountSection").style.display =
                                'block';

                            $('#userName').text(response.user.name);
                            $('#userEmail').text(response.user.email);
                            $('#userProfileFor').text(response.user.profile_for);
                            $('#userCountry').text(response.user.country);
                            $('#userState').text(response.user.state);
                            $('#userCity').text(response.user.city);
                            $('#accountDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#accountDetailsAlert').html(`
    <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
        ${response.message}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
`);
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this).remove();
                                });
                            }, 10000);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        } else {
            console.error("Update User Account button not found!");
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/update-account-details-component.blade.php ENDPATH**/ ?>