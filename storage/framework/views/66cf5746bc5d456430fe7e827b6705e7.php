<?php $__env->startSection('title', 'Search Result'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-20 ">
        <div class="row">
            <div class="row" bis_skin_checked="1">
                <aside class="col-xxl-4 col-xl-4 col-xs-16">
                    <div class="gt-panel gt-panel-orange" bis_skin_checked="1">
                        <div class="gt-panel-head gt-border-radius-5"
                            style="margin-bottom: 11px; margin-top: 11px; padding:9px">
                            <div class="panel-title text-center">

                                <div class="thumbnail gt-margin-bottom-0 inHomeMainThumb" bis_skin_checked="1">
                                    <?php $__currentLoopData = $user->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($image->dp_image === '1'): ?>
                                            <a data-toggle="modal" data-target="#photoModal<?php echo e($image->id); ?>">
                                                <img src="<?php echo e(asset('storage/users/images/' . $image->name)); ?>"
                                                    class="img-responsive gtFullWidth " alt="User Image">
                                                <div class="eye-icon viewPhotosModal">
                                                    <span
                                                        style="display: inline-block;background-color: #545C56;color: #fff;padding: 5px 10px;border-radius: 50px;font-size: 14px;font-weight: bold; text-align: center; min-width: 30px;">
                                                        <?php echo e($user->images->count() ?? ''); ?>

                                                    </span>
                                                </div>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da = $attributes; } ?>
<?php $component = App\View\Components\Modals\ViewPhotosModalComponent::resolve(['photos' => $user->images] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modals.view-photos-modal-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Modals\ViewPhotosModalComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da)): ?>
<?php $attributes = $__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da; ?>
<?php unset($__attributesOriginal25f4e9139185c7d4f0f6ef75ce4177da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da)): ?>
<?php $component = $__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da; ?>
<?php unset($__componentOriginal25f4e9139185c7d4f0f6ef75ce4177da); ?>
<?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($user->images->isEmpty()): ?>
                                        <div class="image-frame">
                                            <img src="<?php echo e($user->gender === 'male'
                                                ? asset('storage/users/images/male-default.jpg')
                                                : asset('storage/users/images/female-default.jpg')); ?>"
                                                class="img-responsive gtFullWidth main-image" alt="User Image">
                                        </div>
                                    <?php endif; ?>
                                    <a href="http://localhost:8000/my-photos" class="gt-myhome-caption ripplelink">

                                    </a><a href="http://localhost:8000/my-photos">
                                        <i class="fa fa-camera gt-margin-right-10"></i><span class="">Change Profile
                                            Picture</span>
                                    </a>
                                </div>
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true"
                                    aria-controls="collapseExample" class="gt-refine">
                                    <i class="fa fa-filter gt-margin-right-10 mt-15"></i>Refine Search
                                    <i class="fa fa-caret-down gt-margin-left-10"></i>
                                </a>
                            </div>
                        </div>

                        <div class="gt-filter-result collapse in aside-sideFilter" id="collapseExample" bis_skin_checked="1"
                            aria-expanded="true">
                            <form name="frm_filter" id="frm_filter" method="post" action="">

                                <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1">
                                                <b>Photo Setting </b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearreligion();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-7" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="photo">
                                                        <input type="checkbox"
                                                            class="photo-checkbox all-religion gt-margin-left-10 gt-cursor name"
                                                            id="photo" name="photo[]" value="0"
                                                            <?php echo e(in_array(0, old('photo', $validatedData['photo'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="photo">
                                                        <input type="checkbox"
                                                            class="photo-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="photo" name="photo[]" value="1"
                                                            <?php echo e(in_array(1, old('photo', $validatedData['photo'] ?? [])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">With Photo</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1">
                                                <b>Recently Joined </b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearreligion();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-7" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="join_at">
                                                        <input type="checkbox"
                                                            class="join_at-checkbox  gt-margin-left-10 gt-cursor name"
                                                            id="join_at" name="join_at[]" value="0"
                                                            <?php echo e(in_array(0, old('join_at', $validatedData['join_at'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="join_at">
                                                        <input type="checkbox"
                                                            class="join_at-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="join_at" name="join_at[]" value="day"
                                                            <?php echo e(in_array('day', old('join_at', $validatedData['join_at'] ?? [''])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">Within a Day</span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="join_at">
                                                        <input type="checkbox"
                                                            class="join_at-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="join_at" name="join_at[]" value="week"
                                                            <?php echo e(in_array('week', old('join_at', $validatedData['join_at'] ?? [''])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">Within a Week</span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="join_at">
                                                        <input type="checkbox"
                                                            class="join_at-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="join_at" name="join_at[]" value="month"
                                                            <?php echo e(in_array('month', old('join_at', $validatedData['join_at'] ?? [''])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">Within a Month</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1">
                                                <b>Religion </b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearreligion();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-7" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="religion">
                                                        <input type="checkbox"
                                                            class="religion-checkbox all-religion gt-margin-left-10 gt-cursor name"
                                                            id="religion" name="religion[]" value="0"
                                                            <?php echo e(in_array(0, old('religion', $validatedData['religion'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="religion">
                                                            <input type="checkbox"
                                                                class="religion-checkbox religioncb gt-margin-left-10 gt-cursor name"
                                                                id="religion" name="religion[]"
                                                                value="<?php echo e($religion->id); ?>"
                                                                <?php echo e(in_array($religion->id, old('religion', $validatedData['religion'] ?? [])) ? 'checked' : ''); ?>>

                                                            <span
                                                                style="margin-left: 10px"><?php echo e($religion->name ?? ''); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default " bis_skin_checked="1" id="whole-caste-div">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"
                                                style="display: flex; align-items: center;">
                                                <b style="display: flex; align-items: center;">
                                                    Castes
                                                    <span id="loader" class="data-load-loader" style="display: none;">
                                                        <?php if (isset($component)) { $__componentOriginal1ecadc6d68688358e6e0de216be4e673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ecadc6d68688358e6e0de216be4e673 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\LoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\LoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $attributes = $__attributesOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $component = $__componentOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__componentOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
                                                    </span>
                                                </b>
                                            </div>

                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearreligion();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="caste-checkbox" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="gt-filter-border col-xs-16" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="caste">
                                                            <input type="checkbox"
                                                                class="caste-checkbox all-caste gt-margin-left-10 gt-cursor name"
                                                                id="caste" name="caste[]" value="0"
                                                                <?php echo e(in_array(0, old('caste', $validatedData['caste'] ?? [])) ? 'checked' : ''); ?>>
                                                            <span style="margin-left: 10px">All</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-16" bis_skin_checked="1" id="caste-list">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script></script>
                                <div class="gt-panel gt-panel-default" id="getmaritalstatus" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1">
                                                <b>Marital Status</b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearmaritalstatus();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-6" bis_skin_checked="1">
                                        <div class="row" id="marital_status" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="marital_status">
                                                        <input type="checkbox"
                                                            class="marital-status-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="marital_status" name="marital_status[]" value="0"
                                                            <?php echo e(in_array(0, old('marital_status', $validatedData['marital_status'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['maritalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maritalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="marital_status">
                                                            <input type="checkbox"
                                                                class="marital-status-checkbox gt-margin-left-10 gt-cursor name"
                                                                id="marital_status" name="marital_status[]"
                                                                value="<?php echo e($maritalStatus->id); ?>"
                                                                <?php echo e(in_array($maritalStatus->id, old('marital_status', $validatedData['marital_status'] ?? [])) ? 'checked' : ''); ?>>
                                                            <span
                                                                style="margin-left: 10px"><?php echo e($maritalStatus->name ?? ''); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"> <b>Education</b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return cleareducation();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                        <div class="row" id="education" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="education">
                                                        <input type="checkbox"
                                                            class="education-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="education" name="education[]" value="0"
                                                            <?php echo e(in_array(0, old('education', $validatedData['education'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="education">
                                                            <input type="checkbox"
                                                                class="education-checkbox gt-margin-left-10 gt-cursor name"
                                                                id="education" name="education[]"
                                                                value="<?php echo e($education->id); ?>"
                                                                <?php echo e(in_array($education->id, old('education', $validatedData['education'] ?? [])) ? 'checked' : ''); ?>

                                                                class="gt-cursor">
                                                            <span
                                                                style="margin-left: 10px"><?php echo e($education->education); ?>-<?php echo e($education->id); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" id="employee" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"> <b>Working With</b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearoccupation();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                        <div class="row" id="employee" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="employee">
                                                        <input type="checkbox"
                                                            class="employee-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="employee" name="employee[]" value="0"
                                                            <?php echo e(in_array(0, old('employee', $validatedData['employee'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="employee">
                                                            <input type="checkbox"
                                                                class="employee-checkbox gt-margin-left-10 gt-cursor name"
                                                                id="employee" name="employee[]"
                                                                value="<?php echo e($employee->id); ?>"
                                                                <?php echo e(in_array($employee->id, old('employee', $validatedData['employee'] ?? [])) ? 'checked' : ''); ?>>
                                                            <span
                                                                style="margin-left: 10px"><?php echo e($employee->employee); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"> <b>Occupation</b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearoccupation();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                        <div class="row" id="occupation" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="occupation">
                                                        <input type="checkbox"
                                                            class="occupation-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="occupation" name="occupation[]" value="0"
                                                            <?php echo e(in_array(0, old('occupation', $validatedData['occupation'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['occupations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="occupation">
                                                            <input type="checkbox"
                                                                class="occupation-checkbox custom-checkbox gt-margin-left-10 gt-cursor name "
                                                                id="occupation" name="occupation[]"
                                                                value="<?php echo e($occupation->id); ?>"
                                                                <?php echo e(in_array($occupation->id, old('occupation', $validatedData['occupation'] ?? [])) ? 'checked' : ''); ?>>
                                                            <span
                                                                style="margin-left: 10px"><?php echo e($occupation->occupation); ?>-<?php echo e($occupation->id); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" id="employee" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"> <b>Income</b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearoccupation();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                        <div class="row" id="income" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="income">
                                                        <input type="checkbox"
                                                            class="income-checkbox gt-margin-left-10 gt-cursor name"
                                                            id="income" name="income[]" value="0"
                                                            <?php echo e(in_array(0, old('income', $validatedData['income'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        <span style="margin-left: 10px">All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['incomes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="income">
                                                            <input type="checkbox"
                                                                class="income-checkbox gt-margin-left-10 gt-cursor name"
                                                                id="income" name="income[]"
                                                                value="<?php echo e($income->id); ?>"
                                                                <?php echo e(in_array($income->id, old('income', $validatedData['income'] ?? [])) ? 'checked' : ''); ?>>
                                                            <span
                                                                style="margin-left: 10px"><?php echo e($income->income); ?>-<?php echo e($income->id); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"
                                                style="display: flex; align-items: center;">
                                                <b style="display: flex; align-items: center;">
                                                    Eating Habits
                                                    <span class="loader1" style="display:none; margin-left: 8px;">
                                                        <?php if (isset($component)) { $__componentOriginal1ecadc6d68688358e6e0de216be4e673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ecadc6d68688358e6e0de216be4e673 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\LoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\LoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $attributes = $__attributesOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $component = $__componentOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__componentOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
                                                    </span>
                                                </b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearcountry();" class="gt-cursor"> <i
                                                            class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" bis_skin_checked="1">
                                        <div class="row" id="users" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="diet-all">
                                                        <input type="checkbox"
                                                            class="diet-checkbox all-diet gt-margin-left-10 gt-cursor name"
                                                            id="diet" name="diet[]" value="0"
                                                            <?php echo e(in_array(0, old('diet', $validatedData['diet'] ?? ['0'])) ? 'checked' : ''); ?>>&nbsp;&nbsp;&nbsp;
                                                        <span>All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['dietaryHabits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="diet">
                                                            <input type="checkbox" id="diet"
                                                                value="<?php echo e($diet->id); ?>" name="diet[]"
                                                                class="diet-checkbox "> <span
                                                                class="gt-margin-left-10 gt-cursor name"
                                                                <?php echo e(in_array($diet->id, old('diet', $validatedData['diet'] ?? [])) ? 'checked' : ''); ?>>
                                                                <?php echo e($diet->name); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"
                                                style="display: flex; align-items: center;">
                                                <b style="display: flex; align-items: center;">
                                                    Physical Status
                                                    <span class="loader1" style="display:none; margin-left: 8px;">
                                                        <?php if (isset($component)) { $__componentOriginal1ecadc6d68688358e6e0de216be4e673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ecadc6d68688358e6e0de216be4e673 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\LoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\LoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $attributes = $__attributesOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $component = $__componentOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__componentOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
                                                    </span>
                                                </b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearcountry();" class="gt-cursor"> <i
                                                            class="fa fa-times-circle"></i> Clear </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" bis_skin_checked="1">
                                        <div class="row" id="users" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="diet-all">
                                                        <input type="checkbox"
                                                            class="physical-status-checkbox all-physical-status gt-margin-left-10 gt-cursor name"
                                                            id="physical_status" name="physical_status[]" value="0"
                                                            <?php echo e(in_array(0, old('physical_status', $validatedData['physical_status'] ?? ['0'])) ? 'checked' : ''); ?>>&nbsp;&nbsp;&nbsp;

                                                        <span>All</span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = $options['physicalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physicalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="physical_status">
                                                            <input type="checkbox" id="physical_status"
                                                                value="<?php echo e($physicalStatus->id); ?>"
                                                                name="physical_status[]"
                                                                class="physical-status-checkbox "> <span
                                                                class="gt-margin-left-10 gt-cursor name"
                                                                <?php echo e(in_array($physicalStatus->id, old('physical_status', $validatedData['physical_status'] ?? [])) ? 'checked' : ''); ?>>
                                                                <?php echo e($physicalStatus->name); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                    <div class="gt-panel-head" bis_skin_checked="1">
                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-xs-12" bis_skin_checked="1"
                                                style="display: flex; align-items: center;">
                                                <b style="display: flex; align-items: center;">
                                                    Country
                                                    <span class="loader1" style="display:none; margin-left: 8px;">
                                                        <?php if (isset($component)) { $__componentOriginal1ecadc6d68688358e6e0de216be4e673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ecadc6d68688358e6e0de216be4e673 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\LoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\LoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $attributes = $__attributesOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $component = $__componentOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__componentOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
                                                    </span>
                                                </b>
                                            </div>
                                            <div class="col-xs-4" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <a onclick="return clearcountry();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200" bis_skin_checked="1">
                                        <div class="row" id="users" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="list" bis_skin_checked="1">
                                                
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="country-all">
                                                        <input type="checkbox"
                                                            class="country-checkbox all-country countrycb gt-margin-left-10 gt-cursor name"
                                                            id="country-all" name="country[]" value="0"
                                                            <?php echo e(in_array(0, old('country', $validatedData['country'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <span>All</span>
                                                    </label>
                                                </div>

                                                
                                                <?php $__currentLoopData = $options['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-xs-16" bis_skin_checked="1">
                                                        <label for="country-<?php echo e($country->id); ?>">
                                                            <input type="checkbox" id="country-<?php echo e($country->id); ?>"
                                                                value="<?php echo e($country->id); ?>" name="country[]"
                                                                class="country-checkbox countrycb"
                                                                <?php echo e(in_array($country->id, old('country', $validatedData['country'] ?? [])) ? 'checked' : ''); ?>>
                                                            <span
                                                                class="gt-margin-left-10 gt-cursor name"><?php echo e($country->country); ?></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="gt-panel gt-panel-default" id="state-div">
                                    <div class="gt-panel-head">
                                        <div class="row">
                                            <div class="col-xs-12" style="align-items: center;">
                                                <b style="align-items: center;">
                                                    States
                                                    <span id="loader" class="data-load-loader" style="display: none;">
                                                        <?php if (isset($component)) { $__componentOriginal1ecadc6d68688358e6e0de216be4e673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ecadc6d68688358e6e0de216be4e673 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\LoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\LoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $attributes = $__attributesOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $component = $__componentOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__componentOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
                                                    </span>
                                                </b>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="row">
                                                    <a onclick="return clearcountry();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200">
                                        <div class="row" id="users">
                                            <div class="col-xs-16">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="col-xs-16">
                                                <label for="state-all">
                                                    <input type="checkbox"
                                                        class="statecb state-checkbox gt-margin-left-10 gt-cursor name"
                                                        id="state-all" name="state[]" value="0"
                                                        <?php echo e(in_array(0, old('state', $validatedData['state'] ?? ['0'])) ? 'checked' : ''); ?>>
                                                    &nbsp;&nbsp;&nbsp;<span>All</span>
                                                </label>
                                            </div>

                                            <div id="state-list">
                                                <div class="list">
                                                    <?php $__currentLoopData = $options['states']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-xs-16">
                                                            <label for="state-<?php echo e($state->id); ?>">
                                                                <input type="checkbox" id="state"
                                                                    value="<?php echo e($state->id); ?>" name="state[]"
                                                                    class="state-checkbox statecb"
                                                                    <?php echo e(in_array($state->id, old('state', $validatedData['state'] ?? [])) ? 'checked' : ''); ?>>
                                                                <span class="gt-margin-left-10 gt-cursor name">
                                                                    <?php echo e($state->state); ?>

                                                                </span>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gt-panel gt-panel-default" id="city-div">
                                    <div class="gt-panel-head">
                                        <div class="row">
                                            <div class="col-xs-12" style="align-items: center;">
                                                <b style="align-items: center;">
                                                    Cities
                                                    <span id="loader" class="data-load-loader" style="display: none;">
                                                        <?php if (isset($component)) { $__componentOriginal1ecadc6d68688358e6e0de216be4e673 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1ecadc6d68688358e6e0de216be4e673 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\LoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\LoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $attributes = $__attributesOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__attributesOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1ecadc6d68688358e6e0de216be4e673)): ?>
<?php $component = $__componentOriginal1ecadc6d68688358e6e0de216be4e673; ?>
<?php unset($__componentOriginal1ecadc6d68688358e6e0de216be4e673); ?>
<?php endif; ?>
                                                    </span>
                                                </b>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="row">
                                                    <a onclick="return clearcountry();" class="gt-cursor">
                                                        <i class="fa fa-times-circle"></i> Clear
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gt-panel-body max-height-200">
                                        <div class="row" id="users">
                                            <div class="col-xs-16">
                                                <input class="search form-control" placeholder="Search">
                                            </div>
                                            <div class="col-xs-16">
                                                <label for="city-all">
                                                    <input type="checkbox"
                                                        class="city city-filter gt-margin-left-10 gt-cursor name"
                                                        id="city-all" name="city[]" value="0"
                                                        <?php echo e(in_array(0, old('city', $validatedData['city'] ?? [])) ? 'checked' : ''); ?>>
                                                    &nbsp;&nbsp;&nbsp;<span>All</span>
                                                </label>
                                            </div>
                                            <div id="city-list">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </aside>

                <div class="col-xxl-12 col-xl-12 col-xs-16 gt-search-result" id="result" bis_skin_checked="1">
                    <h3 class="gt-margin-top-10">Your search results</h3>
                    <div id="loaderID" style="position: fixed; left: 50%; top: 50%; z-index: -1; opacity: 0;"
                        bis_skin_checked="1">
                        <div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange" bis_skin_checked="1">
                            <font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font>
                        </div>
                    </div>

                    <ul id="pagination">
                        <div class="col-xs-16 col-lg-16 col-xxl-12 col-xl-12 gt-search-opt mb-20" style="width: 885px">

                        </div>
                        <script type="text/javascript">
                            function save_search() {
                                $('#txt_saved_search_name').val('');
                                $("#div_saved_search").show();
                                $("#div_success").hide();
                            }
                            $(document).ready(function() {
                                $('.religion').select2({
                                    placeholder: "Select religion",
                                    allowClear: true
                                });
                            });
                            $(document).ready(function(e) {
                                $('#sub_saved_search').click(function() {
                                    if ($('#txt_saved_search_name').val() == '') {
                                        alert('Please fill up the saved search name.');
                                        return false;
                                    } else {
                                        var txt_saved_search_nm = $('#txt_saved_search_name').val();
                                        $.ajax({
                                            type: "POST",
                                            url: "saved_search_query",
                                            data: 'saved_nm=' + txt_saved_search_nm,
                                            success: function(data) {
                                                $("#div_saved_search").hide();
                                                $('#sub_saved_search').hide();
                                                $("#div_success").show();
                                                $("#div_success").html(data);
                                            }
                                        });
                                    }
                                });
                            });
                        </script>
                        <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-xxl-16 col-xs-16" bis_skin_checked="1"></div>
                                <div class="col-xxl-16 col-xs-16" bis_skin_checked="1">
                                    <h4 class="">
                                        <i class="fa fa-star gt-text-blue gt-margin-right-10"></i>Spotlight
                                        Profile
                                    </h4>
                                    <p>Blue Header profile is are spotlight profile which was showing top of the
                                        search
                                        result.Its
                                        gives 10 times faster results.</p>
                                    <p>
                                        <span style="color:red;">
                                            <b class="result-count"><?php echo e($count->count() ?? ''); ?></b>
                                        </span> Profiles found :
                                        <span class="text-muted gt-margin-left-10">


                                        </span>
                                    </p>
                                    <a data-toggle="modal" data-target="#myModal" onclick="save_search();"
                                        class="btn gt-btn-green gt-cursor">
                                        Add To Saved Search </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-16 text-right" bis_skin_checked="1">
                            <div class="buttons" bis_skin_checked="1">
                                <button class="grid btn gt-btn-green">
                                    <i class="fa fa-list gt-margin-right-5"></i>Grid View </button>
                                <button class="list btn gt-btn-green">
                                    <i class="fa fa-th gt-margin-right-5"></i>List View </button>
                            </div>
                        </div>
                        <div class="clearfix" bis_skin_checked="1"></div>
                        <script>
                            $('button').on('click', function(e) {
                                if ($(this).hasClass('grid')) {
                                    $('#result ul').removeClass('list').addClass('grid');
                                } else if ($(this).hasClass('list')) {
                                    $('#result ul').removeClass('grid').addClass('list');
                                }
                            });
                        </script>

                        <div id="waveLoader" style="display: none">
                            <?php if (isset($component)) { $__componentOriginal1d03a612b9d775483b4d1aff66b6aca0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d03a612b9d775483b4d1aff66b6aca0 = $attributes; } ?>
<?php $component = App\View\Components\Loaders\WaveLoaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('loaders.wave-loader-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Loaders\WaveLoaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d03a612b9d775483b4d1aff66b6aca0)): ?>
<?php $attributes = $__attributesOriginal1d03a612b9d775483b4d1aff66b6aca0; ?>
<?php unset($__attributesOriginal1d03a612b9d775483b4d1aff66b6aca0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d03a612b9d775483b4d1aff66b6aca0)): ?>
<?php $component = $__componentOriginal1d03a612b9d775483b4d1aff66b6aca0; ?>
<?php unset($__componentOriginal1d03a612b9d775483b4d1aff66b6aca0); ?>
<?php endif; ?>
                        </div>
                        <div class="filter-profile">
                            <?php if (isset($component)) { $__componentOriginalf23dcddf411442c3128d2d01b57e9509 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf23dcddf411442c3128d2d01b57e9509 = $attributes; } ?>
<?php $component = App\View\Components\ProfileCardComponent::resolve(['searchResults' => $searchResults] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('profile-card-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ProfileCardComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf23dcddf411442c3128d2d01b57e9509)): ?>
<?php $attributes = $__attributesOriginalf23dcddf411442c3128d2d01b57e9509; ?>
<?php unset($__attributesOriginalf23dcddf411442c3128d2d01b57e9509); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf23dcddf411442c3128d2d01b57e9509)): ?>
<?php $component = $__componentOriginalf23dcddf411442c3128d2d01b57e9509; ?>
<?php unset($__componentOriginalf23dcddf411442c3128d2d01b57e9509); ?>
<?php endif; ?>
                        </div>

                        <div class="modal fade-in" id="myModal1" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                        <div class="modal fade-in" id="myModal5" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                        <div class="modal fade-in" id="myModal6" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                        <div class="modal fade-in" id="myModal7" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                        <script src="js/function.js" type="text/javascript"></script>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
                            <div class="modal-dialog modal-sm" bis_skin_checked="1">
                                <div class="modal-content " bis_skin_checked="1">
                                    <form name="saved_search_form" id="saved_search_form" method="post" action="">
                                        <div class="modal-header" bis_skin_checked="1">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Save Search</h4>
                                        </div>
                                        <div class="modal-body" id="div_saved_search" bis_skin_checked="1">
                                            <label> Saved Search Name : </label>
                                            <div class="form-group" bis_skin_checked="1">
                                                <input type="text" name="txt_saved_search_name"
                                                    id="txt_saved_search_name" class="gt-form-control">
                                            </div>
                                        </div>
                                        <div class="modal-body" id="div_success" bis_skin_checked="1"></div>
                                        <div class="modal-footer" bis_skin_checked="1">
                                            <input type="button" class="btn gt-btn-orange" id="sub_saved_search"
                                                value="Submit">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                value="Close">
                                        </div>
                                    </form>
                                    <div class="clearfix" bis_skin_checked="1"></div>
                                </div>
                            </div>
                        </div>
                        <style>
                            nav.center-text {
                                background: none;
                            }

                            .current {
                                background: none repeat scroll 0 0 #428bca !important;
                                color: #fff !important;
                            }
                        </style>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                function clearage() {
                    $('select[name="from_age"]').find(":selected").attr('selected', false);
                    $('select[name="to_age"]').find(":selected").attr('selected', false);
                    $("#frm_filter").trigger('change');
                }

                function clearheight() {
                    $('select[name="from_height"]').find(":selected").attr('selected', false);
                    $('select[name="to_height"]').find(":selected").attr('selected', false);
                    $("#frm_filter").trigger('change');
                }

                function clearmstatus() {
                    $('input[name="m_status"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }

                function clearreligion() {
                    $('input[name="religion"]:checked').attr('checked', false);
                    $('input[name="caste_id"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                    $('#getcaste').hide();
                }

                function clearcaste() {
                    $('input[name="caste_id"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }

                function clearcountry() {
                    $('input[name="country"]:checked').attr('checked', false);
                    $('input[name="state_id"]:checked').attr('checked', false);
                    $('input[name="city_id"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                    $('#getstate').hide();
                    $('#getcity').hide();
                }

                function clearstate() {
                    $('input[name="state_id"]:checked').attr('checked', false);
                    $('input[name="city_id"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                    $('#getcity').hide();
                }

                function clearcity() {
                    $('input[name="city_id"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }

                function cleareducation() {
                    $('input[name="education"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }

                function clearoccupation() {
                    $('input[name="occupation"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }

                function clearincome() {
                    $('select[name="annual_income"]').find(":selected").attr('selected', false);
                    $("#frm_filter").trigger('change');
                }

                function clearphoto() {
                    $('input[name="photo_search"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }

                function clearprofilelatestreg() {
                    $('input[name="profile_latest_register"]:checked').attr('checked', false);
                    $("#frm_filter").trigger('change');
                }
            </script>
            <div>

            </div>
        </div>
        <style>
            .aside-sideFilter.disabled {
                pointer-events: none;
                opacity: 0.5;
            }
        </style>
        <script>
            function getCheckedValues(selector) {
                let checkboxs = document.querySelectorAll(selector);
                let checkedValues = Array.from(checkboxs)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);

                if (checkedValues.length > 2 && checkedValues.includes('0')) {
                    checkedValues = checkedValues.filter(value => value === '0');
                    checkboxs.forEach(cb => {
                        if (cb.value !== '0') {
                            cb.checked = false;
                        }
                    });
                } else if (checkedValues.length > 1) {
                    checkedValues = checkedValues.filter(value => value !== '0');
                    checkboxs.forEach(cb => {
                        if (cb.value === '0') {
                            cb.checked = false;
                        }
                    });
                } else if (checkedValues.length === 0) {
                    checkboxs.forEach(cb => {
                        if (cb.value === '0') {
                            cb.checked = true;
                        } else {
                            cb.checked = false;
                        }
                    });
                }
                console.log('After : ', checkedValues)
                return checkedValues.length ? checkedValues : ['0'];
            }

            function showLoader() {
                const waveLoader = document.getElementById('waveLoader');
                waveLoader.style.display = 'block';
            }

            function hideLoader() {
                const waveLoader = document.getElementById('waveLoader');
                waveLoader.style.display = 'none';
            }

            function disableCheckboxes() {

                document.querySelectorAll('.aside-sideFilter input[type="checkbox"').forEach(function(checkbox) {
                    checkbox.disabled = true;
                });
            }

            function enableCheckboxes() {
                document.querySelectorAll('.aside-sideFilter input[type="checkbox"').forEach(function(checkbox) {
                    checkbox.disabled = false;
                });
            }

            function resultCount(count) {

                const result = document.querySelector('.result-count');
                if (result) {
                    return result.textContent = count;
                } else {
                    return result.textContent = '';
                }
            }

            // Filter the Record with Side Filter
            function sendAjax() {
                let photoIds = getCheckedValues('.photo-checkbox');
                let joinIds = getCheckedValues('.join_at-checkbox');
                let religionIds = getCheckedValues('.religion-checkbox');
                let casteIds = getCheckedValues('.caste-checkbox');
                let casteId = getCheckedValues('.castecb');
                let maritalStatusIds = getCheckedValues('.marital-status-checkbox');
                let educationIds = getCheckedValues('.education-checkbox');
                let employeeIds = getCheckedValues('.employee-checkbox');
                let occupationIds = getCheckedValues('.occupation-checkbox');
                let incomeIds = getCheckedValues('.income-checkbox');
                let dietIds = getCheckedValues('.diet-checkbox');
                let physicalStatusIds = getCheckedValues('.physical-status-checkbox');
                let countryIds = getCheckedValues('.country-checkbox');
                let stateIds = getCheckedValues('.statecb');
                let cityIds = getCheckedValues('.city-filter');
                const container = document.querySelector('.filter-profile');

                $.ajax({
                    url: '/sidebar-filter',
                    type: 'POST',
                    data: {
                        photo: photoIds,
                        join_at: joinIds,
                        religion: religionIds,
                        caste: casteIds,
                        marital_status: maritalStatusIds,
                        education: educationIds,
                        employee_in: employeeIds,
                        occupation: occupationIds,
                        income: incomeIds,
                        diet: dietIds,
                        physical_status: physicalStatusIds,
                        country: countryIds,
                        state: stateIds,
                        city: cityIds,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        showLoader();

                    },
                    success: function(response) {
                        if (response) {
                            container.innerHTML = response.html;
                            resultCount(response.count);
                            container.style.display = 'block';
                            enableCheckboxes();

                        } else {
                            container.innerHTML = response.html;
                            container.style.display = 'block';
                        }

                    },
                    complete: function() {
                        hideLoader();
                        enableCheckboxes();
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', () => {

                async function stateList() {
                    const countries = document.querySelectorAll('.country');
                    let checkedValues = Array.from(countries)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);

                    if (checkedValues.length === 0) {
                        checkedValues = ['0'];
                    }
                    sLoader();
                    const route = '/get-state';
                    await fetchDataFrom(route, checkedValues,
                        'sidebarFilter');
                }

                async function cityList() {
                    const states = document.querySelectorAll('.statecb');
                    let checkedValues = Array.from(states)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);

                    if (checkedValues.length === 0) {
                        checkedValues = ['0'];


                    }

                    sLoader();
                    const route = '/get-city';
                    await fetchDataFrom(route, checkedValues,
                        'sidebarFilter');
                }
                let timeout;
                document.querySelectorAll(
                    '.photo-checkbox, .join_at-checkbox,.religion-checkbox, .caste-checkbox,.caste-checkbox1,.city-filter, .marital-status-checkbox, .education-checkbox, .employee-checkbox, .occupation-checkbox,.income-checkbox, .diet-checkbox, .physical-status-checkbox, .country-checkbox, .statecb, .city-filter'
                ).forEach(cb => {
                    cb.addEventListener('change', () => {
                        let photoIds = getCheckedValues('.photo-checkbox');
                        let joinIds = getCheckedValues('.join_at-checkbox');
                        let religionIds = getCheckedValues('.religion-checkbox');
                        let casteIds = getCheckedValues('.caste-checkbox');
                        let casteId = getCheckedValues('.castecb');
                        let maritalStatusIds = getCheckedValues('.marital-status-checkbox');
                        let educationIds = getCheckedValues('.education-checkbox');
                        let employeeIds = getCheckedValues('.employee-checkbox');
                        let occupationIds = getCheckedValues('.occupation-checkbox');
                        let incomeIds = getCheckedValues('.income-checkbox');
                        let dietIds = getCheckedValues('.diet-checkbox');
                        let physicalStatusIds = getCheckedValues('.physical-status-checkbox');
                        let countryIds = getCheckedValues('.country-checkbox');
                        let statesIds = getCheckedValues('.statecb');
                        let cityIds = getCheckedValues('.city-filter');

                        const container = document.querySelector('.filter-profile');
                        showLoader();
                        clearTimeout(timeout);
                        timeout = setTimeout(function() {
                            disableCheckboxes();

                            sendAjax();
                        }, 1000);
                    });
                });

                function fetchDataFrom(route, checkedValues, action, filter) {
                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: {
                            ids: checkedValues,
                            action: action,
                            filter: filter,

                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.action === 'casteData') {
                                $('#caste-list').html(response.data)
                                $('#whole-caste-div').show();
                            } else if (response.action === 'stateData') {
                                let states = document.querySelector('#state-list');
                                states.innerHTML = '';
                                states.innerHTML = response.data;
                                let cities = document.querySelector('#city-list');
                                cities.innerHTML = '';
                                cityDiv.style.display = 'none';
                            } else if (response.action === 'cityData') {
                                cityDiv.style.display = 'block';
                                let cities = document.querySelector('#city-list');
                                cities.innerHTML = '';
                                cities.innerHTML = response.data;
                            } else {

                                alert('Something went wrong!');
                            }

                        },
                        complete: function(response) {
                            hLoader();
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error:', status, error);
                            console.log(xhr.responseText);
                        }
                    });
                }

                // Hide the div of Caste, State, City
                const casteDiv = document.querySelector('#whole-caste-div');
                const religion = document.querySelector('.all-religion');
                const country = document.querySelector('.all-country');
                const state = document.querySelector('.all-state');
                const onlyCaste = document.querySelector('#caste-div');
                const loader = document.getElementById('loader');
                const casteDiv1 = document.querySelector('#caste-div');
                const stateDiv = document.querySelector('#state-div');
                const cityDiv = document.querySelector('#city-div');
                const states = document.querySelector('#state-list');
                const cities = document.querySelector('#city-list');

                if (country) {
                    country.addEventListener('click', () => {
                        states.innerHTML = '';
                        cities.innerHTML = '';
                        stateDiv.style.display = 'none';
                        cityDiv.style.display = 'none';
                    });
                } else {
                    states.innerHTML = '';
                    stateDiv.style.display = 'block';
                }
                if (state) {
                    state.addEventListener('click', () => {
                        cities.innerHTML = '';
                        cityDiv.style.display = 'none';

                    });
                } else {
                    cities.innerHTML = '';
                    cityDiv.style.display = 'block';
                }

                document.body.addEventListener('change', function(e) {
                    const target = e.target;
                    if (target.classList.contains('castecb')) {
                        sendAjax();
                    } else if (target.classList.contains(
                            'statecb')) {
                        sendAjax();

                    } else if (target.classList.contains('city-filter')) {
                        setTimeout(function() {
                            sendAjax();
                        }, 1500);
                    }
                });
                document.body.addEventListener('change', function(e) {
                    const target = e.target;
                    if (target.classList.contains('statecb')) {

                        let checkedValues = Array.from(document.querySelectorAll('.statecb'))
                            .filter(cb => cb.checked)
                            .map(cb => cb.value);
                        if (checkedValues.length === 1 && checkedValues[0] === '0') {
                            stateList();
                        } else {
                            cityList();
                        }

                    }
                });

                $(document).ready(function() {
                    $('.state-checkbox:checked').each(function() {
                        let checkedValues = $(this).val();
                        console.log(checkedValues);
                        if (checkedValues.length === 1 && checkedValues.includes('0')) {
                            $('#city-div').hide();
                        } else if (checkedValues.length > 0) {
                            cityList();

                        }

                    });
                });
                $(document).ready(function() {
                    let checkedValues = $('.religion-checkbox:checked').map(function() {
                        return $(this).val();
                    }).get();

                    if (checkedValues.length === 1 && checkedValues.includes('0')) {
                        $('#whole-caste-div').hide();
                    } else {

                        fetchDataFrom('get-caste', checkedValues, 'sidebarFilter', 'basicSearch');
                        $('#whole-caste-div').show();
                    }
                });

                $(document).ready(function() {
                    let checkedValues = $('.country-checkbox:checked').map(function() {
                        return $(this).val();
                    }).get();
                    if (checkedValues.length === 1 && checkedValues.includes('0')) {
                        $('#state-div').hide();
                        $('#city-div').hide();
                    } else {
                        $('#state-div').show();
                    }
                });

                $(document).ready(function() {
                    $('.all-religion').on('change', function() {
                        $('#whole-caste-div').hide();
                    });
                });
                const religionCheckboxes = document.querySelectorAll('.religioncb');
                religionCheckboxes.forEach(cb => {
                    cb.addEventListener('change', () => {
                        $('#whole-caste-div').show();
                        let checkedValues = Array.from(religionCheckboxes)
                            .filter(cb => cb.checked)
                            .map(cb => cb.value ?? ['0']);
                        if (checkedValues.length == 1 && checkedValues.includes('0')) {
                            checkedValues = ['0'];
                            $('#whole-caste-div').hide();
                        } else {
                            $('#whole-caste-div').show();
                            sLoader();
                            fetchDataFrom('get-caste', checkedValues, 'sidebarFilter');
                        }

                    });
                });


                const countryCheckboxes = document.querySelectorAll('.countrycb');
                countryCheckboxes.forEach(cb => {
                    cb.addEventListener('change', () => {
                        let states = document.querySelector('#state-list');
                        states.innerHTML = '';
                        stateDiv.style.display = 'block';
                        let checkedValues = Array.from(countryCheckboxes)
                            .filter(cb => cb.checked)
                            .map(cb => cb.value ?? ['0']);

                        if (checkedValues.length === 1 && checkedValues.includes('0')) {

                            checkedValues = ['0'];
                            stateDiv.style.display = 'none';
                            cityDiv.style.display = 'none';
                        } else {
                            const route = '/get-state';
                            const action = 'sidebarFilter';
                            loader.style.display = 'flex';
                            sLoader();
                            fetchDataFrom(route, checkedValues, action);
                        }
                    });
                });

                function sLoader() {
                    const loaders = document.querySelectorAll('.data-load-loader');
                    let loader = loaders.forEach(l1 => {
                        l1.style.display = 'block';
                    })
                }

                function hLoader() {
                    const loaders = document.querySelectorAll('.data-load-loader');
                    let loader = loaders.forEach(l1 => {
                        l1.style.display = 'none';
                    })

                }

            });
        </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/search-result-component.blade.php ENDPATH**/ ?>