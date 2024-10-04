;
<?php $__env->startSection('title', 'Site Configs - Create | Admin'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default ">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"> <a href="<?php echo e(url('dashboard')); ?>">Home</a> </li>
                          
                            <li class="breadcrumb-item"> <a href="<?php echo e(route('siteConfigs.index')); ?>">Site Config</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Site Setting</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-body">
                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    


                    <form action="<?php echo e(route('siteConfigs.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Send Interest Setting</label>
                                <select name="interest_setting" class="form-control" required>
                                    <option value="0" <?php echo e(old('interest_setting') == '0' ? 'selected' : ''); ?>>All User
                                        can Send</option>
                                    <option value="1" <?php echo e(old('interest_setting') == '1' ? 'selected' : ''); ?>>Only Paid
                                        User can Send</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Profile View Setting</label>
                                <select name="profile_view_setting" class="form-control" required>
                                    <option value="0" <?php echo e(old('profile_view_setting') == '0' ? 'selected' : ''); ?>>All
                                        User can View</option>
                                    <option value="1" <?php echo e(old('profile_view_setting') == '1' ? 'selected' : ''); ?>>Only
                                        Paid User Can View</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Profile Name Setting</label>
                                <select name="profile_name_setting" class="form-control" required>
                                    <option value="0" <?php echo e(old('profile_name_setting') == '0' ? 'selected' : ''); ?>>Show
                                        Full Name</option>
                                    <option value="1" <?php echo e(old('profile_name_setting') == '1' ? 'selected' : ''); ?>>Show
                                        only First Name</option>
                                    <option value="2" <?php echo e(old('profile_name_setting') == '2' ? 'selected' : ''); ?>>Hide
                                        Name</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Profile Activation Setting</label>
                                <select name="profile_activation" class="form-control" required>
                                    <option value="0" <?php echo e(old('profile_activation') == '0' ? 'selected' : ''); ?>>User
                                        Can Activate Profile vie OTP</option>
                                    <option value="1" <?php echo e(old('profile_activation') == '1' ? 'selected' : ''); ?>>User
                                        Profile Activate via Admin</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Profile Photo(Signup)</label>
                                <select name="profile_photo_setting" class="form-control" required>
                                    <option value="0" <?php echo e(old('profile_photo_setting') == '0' ? 'selected' : ''); ?>>
                                        Not-Mandatory</option>
                                    <option value="1" <?php echo e(old('profile_photo_setting') == '1' ? 'selected' : ''); ?>>
                                        Mandatory</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Document Upload(Signup)</label>
                                <select name="profile_kyc_setting" class="form-control" required>
                                    <option value="0" <?php echo e(old('profile_kyc_setting') == '0' ? 'selected' : ''); ?>>
                                        Not-Mandatory</option>
                                    <option value="1" <?php echo e(old('profile_kyc_setting') == '1' ? 'selected' : ''); ?>>
                                        Mandatory</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Success Story Last Year Option</label>
                                <input type="text" class="form-control" name="success_story_year_setting"
                                    placeholder="Enter Success Story Year " value="<?php echo e(old('success_story_year_setting')); ?>"
                                    required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Male Legal Age (In Years)</label>
                                <input type="text" class="form-control" name="male_legal_age"
                                    placeholder="Enter Male Legal Age " value="<?php echo e(old('male_legal_age')); ?>" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Female Legal Age (In Years)</label>
                                <input type="text" class="form-control" name="female_legal_age"
                                    placeholder="Enter Female Legal Age " value="<?php echo e(old('female_legal_age')); ?>" required>
                            </div>
                            
                            <div><label class="mr-3">Status</label></div>
                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            
                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                 value="1">
                            <label class="custom-control-label" for="customRadio1">Active</label>
                        </div>

                        <div class="custom-control custom-radio d-inline-block mr-3 mb-3">
                            <input type="radio" id="customRadio2" name="status" class="custom-control-input" checked="checked" value="0">
                            <label class="custom-control-label" for="customRadio2">InActive</label>
                        </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\admin\siteConfigs\create.blade.php ENDPATH**/ ?>