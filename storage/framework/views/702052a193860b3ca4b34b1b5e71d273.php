<?php $__env->startSection('title', 'Site Configs | Admin'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/extensions/Scroller/js/dataTables.scroller.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
        rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Site Config</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-header">
                    <?php if(count($siteConfigs) > 0): ?>

                        <table class="table table-striped" id="siteConfigs">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Send Interest</th>
                                    <th scope="col">Profile View</th>
                                    <th scope="col">Profile Name</th>
                                    <th scope="col">Profile Activation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = ($siteConfigs->currentPage() - 1) * $siteConfigs->perPage() + 1;
                                ?>
                                <?php $__currentLoopData = $siteConfigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siteConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($count); ?></td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <button type="button"
                                                    class="mr-1 btn-sm btn btn-icon btn-outline facebook btn-rounded-circle"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <?php if (isset($component)) { $__componentOriginald29b659bc6900e31e979f54fae6a42b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald29b659bc6900e31e979f54fae6a42b8 = $attributes; } ?>
<?php $component = App\View\Components\EditActionButtonComponent::resolve(['editRoute' => route('siteConfigs.edit', $siteConfig->id),'id' => $siteConfig->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('edit-action-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\EditActionButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald29b659bc6900e31e979f54fae6a42b8)): ?>
<?php $attributes = $__attributesOriginald29b659bc6900e31e979f54fae6a42b8; ?>
<?php unset($__attributesOriginald29b659bc6900e31e979f54fae6a42b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald29b659bc6900e31e979f54fae6a42b8)): ?>
<?php $component = $__componentOriginald29b659bc6900e31e979f54fae6a42b8; ?>
<?php unset($__componentOriginald29b659bc6900e31e979f54fae6a42b8); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginaldf8dad82159d82b8495c6758fc5363ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8dad82159d82b8495c6758fc5363ec = $attributes; } ?>
<?php $component = App\View\Components\DestroyActionButtonComponent::resolve(['destroyRoute' => route('siteConfigs.destroy', $siteConfig->id),'id' => $siteConfig->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('destroy-action-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\DestroyActionButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8dad82159d82b8495c6758fc5363ec)): ?>
<?php $attributes = $__attributesOriginaldf8dad82159d82b8495c6758fc5363ec; ?>
<?php unset($__attributesOriginaldf8dad82159d82b8495c6758fc5363ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8dad82159d82b8495c6758fc5363ec)): ?>
<?php $component = $__componentOriginaldf8dad82159d82b8495c6758fc5363ec; ?>
<?php unset($__componentOriginaldf8dad82159d82b8495c6758fc5363ec); ?>
<?php endif; ?>

                                            </div>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header d-flex justify-content-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Site COnfig</h5>
                                                            <button type="button" class="close position-absolute"
                                                                style="right: 1rem;" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <form action="<?php echo e(route('siteConfigs.update', $siteConfig->id)); ?>"
                                                            method="post" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('PATCH'); ?>
                                                            <div class="row">
                                                                <div class="form-group col-lg-6">
                                                                    <label class="mr-3">Send Interest Setting</label>
                                                                    <select name="interest_setting" class="form-control"
                                                                        required>
                                                                        <option value="0"
                                                                            <?php echo e(old('interest_setting', $siteConfig->interest_setting) == 'All User Can Send' ? 'selected' : ''); ?>>
                                                                            All User
                                                                            can Send</option>
                                                                        <option value="1"
                                                                            <?php echo e(old('interest_setting', $siteConfig->interest_setting) == 'Paid User Can Send' ? 'selected' : ''); ?>>
                                                                            Only Paid
                                                                            User can Send</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Profile View Setting</label>
                                                                    <select name="profile_view_setting" class="form-control"
                                                                        required>
                                                                        <option value="0"
                                                                            <?php echo e(old('profile_view_setting', $siteConfig->profile_view_setting) == 'All User Can View' ? 'selected' : ''); ?>>
                                                                            All
                                                                            User can View</option>
                                                                        <option value="1"
                                                                            <?php echo e(old('profile_view_setting', $siteConfig->profile_view_setting) == 'Paid User Can View' ? 'selected' : ''); ?>>
                                                                            Only
                                                                            Paid User Can View</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Profile Name Setting</label>
                                                                    <select name="profile_name_setting" class="form-control"
                                                                        required>
                                                                        <option value="0"
                                                                            <?php echo e(old('profile_name_setting', $siteConfig->profile_name_setting) == 'Show Full Name' ? 'selected' : ''); ?>>
                                                                            Show
                                                                            Full Name</option>
                                                                        <option value="1"
                                                                            <?php echo e(old('profile_name_setting', $siteConfig->profile_name_setting) == 'Show Only First Name' ? 'selected' : ''); ?>>
                                                                            Show
                                                                            only First Name</option>
                                                                        <option value="2"
                                                                            <?php echo e(old('profile_name_setting', $siteConfig->profile_name_setting) == 'Hide Name' ? 'selected' : ''); ?>>
                                                                            Hide
                                                                            Name</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Profile Activation Setting</label>
                                                                    <select name="profile_activation" class="form-control"
                                                                        required>
                                                                        <option value="0"
                                                                            <?php echo e(old('profile_activation', $siteConfig->profile_activation) == 'Activate vie OTP' ? 'selected' : ''); ?>>
                                                                            User
                                                                            Can Activate Profile vie OTP</option>
                                                                        <option value="1"
                                                                            <?php echo e(old('profile_activation', $siteConfig->profile_activation) == 'Activate via Admin' ? 'selected' : ''); ?>>
                                                                            User
                                                                            Profile Activate via Admin</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Profile Photo(Signup)</label>
                                                                    <select name="profile_photo_setting"
                                                                        class="form-control" required>
                                                                        <option value="0"
                                                                            <?php echo e(old('profile_photo_setting', $siteConfig->profile_photo_setting) == 'Not-Mandatory' ? 'selected' : ''); ?>>
                                                                            Not-Mandatory</option>
                                                                        <option value="1"
                                                                            <?php echo e(old('profile_photo_setting', $siteConfig->profile_photo_setting) == 'Mandatory' ? 'selected' : ''); ?>>
                                                                            Mandatory</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Document Upload(Signup)</label>
                                                                    <select name="profile_kyc_setting" class="form-control"
                                                                        required>
                                                                        <option value="0"
                                                                            <?php echo e(old('profile_kyc_setting', $siteConfig->profile_kyc_setting) == 'Not-Mandatory' ? 'selected' : ''); ?>>
                                                                            Not-Mandatory</option>
                                                                        <option value="1"
                                                                            <?php echo e(old('profile_kyc_setting', $siteConfig->profile_kyc_setting) == 'Mandatory' ? 'selected' : ''); ?>>
                                                                            Mandatory</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Success Story Last Year Option</label>
                                                                    <input type="text" class="form-control"
                                                                        name="success_story_year_setting"
                                                                        placeholder="Enter Success Story Year "
                                                                        value="<?php echo e($siteConfig->success_story_year_setting); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Male Legal Age (In Years)</label>
                                                                    <input type="text" class="form-control"
                                                                        name="male_legal_age"
                                                                        placeholder="Enter Male Legal Age "
                                                                        value="<?php echo e($siteConfig->male_legal_age); ?>" required>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <label>Female Legal Age (In Years)</label>
                                                                    <input type="text" class="form-control"
                                                                        name="female_legal_age"
                                                                        placeholder="Enter Female Legal Age "
                                                                        value="<?php echo e($siteConfig->female_legal_age); ?>"
                                                                        required>
                                                                </div>
                                                                <div><label class="mr-3">Status</label></div>
                                                                <div
                                                                    class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                    <input type="radio" id="customRadio1"
                                                                        name="status" class="custom-control-input"
                                                                        value="1"
                                                                        <?php echo e($siteConfig->status == 'Active' ? 'checked' : ''); ?>>
                                                                    <label class="custom-control-label"
                                                                        for="customRadio1">Active</label>
                                                                </div>

                                                                <div
                                                                    class="custom-control custom-radio d-inline-block mr-3 mb-3">
                                                                    <input type="radio" id="customRadio2"
                                                                        name="status" class="custom-control-input"
                                                                        value="0"
                                                                        <?php echo e($siteConfig->status == 'Inactive' ? 'checked' : ''); ?>>
                                                                    <label class="custom-control-label"
                                                                        for="customRadio2">Inactive</label>
                                                                </div>
                                                            </div>
                                                            <div class="text-center mb-3">
                                                                
                                                                <?php if (isset($component)) { $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd = $attributes; } ?>
<?php $component = App\View\Components\SubmitButtonComponent::resolve(['buttonStyle' => '$buttonStyle->buttonStyle','content' => 'Update Site Setting '] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('submit-button-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SubmitButtonComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd)): ?>
<?php $attributes = $__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd; ?>
<?php unset($__attributesOriginal99ef9de2c4e97e756084ed7eab2ebfdd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd)): ?>
<?php $component = $__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd; ?>
<?php unset($__componentOriginal99ef9de2c4e97e756084ed7eab2ebfdd); ?>
<?php endif; ?>
                                                            </div>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php if (isset($component)) { $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984 = $attributes; } ?>
<?php $component = App\View\Components\StatusComponent::resolve(['status' => $siteConfig->status] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\StatusComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984)): ?>
<?php $attributes = $__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984; ?>
<?php unset($__attributesOriginalc706a4c5a6dba5c17dd67cf6ade65984); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984)): ?>
<?php $component = $__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984; ?>
<?php unset($__componentOriginalc706a4c5a6dba5c17dd67cf6ade65984); ?>
<?php endif; ?><?php echo e($siteConfig->interest_setting); ?>

                                        </td>
                                        <td><?php echo e($siteConfig->profile_view_setting); ?></td>
                                        <td><?php echo e($siteConfig->profile_name_setting); ?></td>
                                        <td><?php echo e($siteConfig->profile_activation); ?></td>
                                    </tr>
                                    <?php
                                        $count++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <span><?php echo e($siteConfigs->links()); ?></span>

                        </div>
                    <?php else: ?>
                        <h3 class="text-center text-danger">No Site Setting found</h3>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
    <script></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#siteConfigs').DataTable();
            $(".dataTables_wrapper").css("width", "100%");
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\siteConfigs\index.blade.php ENDPATH**/ ?>