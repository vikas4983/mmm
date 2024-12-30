<div class="container mt-20 ">
    <div class="row">
        <div class="row" bis_skin_checked="1">
            <aside class="col-xxl-4 col-xl-4 col-xs-16">
                <div class="gt-panel gt-panel-orange" bis_skin_checked="1">
                    <div class="gt-panel-head gt-border-radius-5"
                        style="margin-bottom: 11px; margin-top: 11px; padding:9px">
                        <div class="panel-title text-center">
                            <div class="thumbnail gt-margin-bottom-0 inHomeMainThumb" bis_skin_checked="1">
                                <img src="http://localhost:8000/storage/users/images/1961734893113.jpg"
                                    class="img-responsive gtFullWidth" alt="User Image">
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

                    <div class="gt-filter-result collapse in" id="collapseExample" bis_skin_checked="1"
                        aria-expanded="true" style="">
                        <form name="frm_filter" id="frm_filter" method="post" action="">

                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1">
                                            <b>Religion</b>
                                        </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearreligion();" class="gt-cursor">
                                                    <i class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="gt-filter-border col-xs-16" bis_skin_checked="1">
                                            <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row" bis_skin_checked="1">
                                                    <label for="filter-952" class="col-xs-16">
                                                        <div class="row" bis_skin_checked="1">
                                                            <span class="col-xs-3">
                                                                <input type="checkbox" id="<?php echo e($religion->id); ?>"
                                                                    name="religion[]" value="<?php echo e($religion->id); ?>"
                                                                    class="gt-cursor pull-left gt-margin-right-10"
                                                                    <?php echo e(old('religion', $user->basicDetails->religions->id) === $religion->id ? 'checked' : ''); ?>>
                                                            </span>
                                                            <span class="gt-cursor col-xs-10">
                                                                <?php echo e($religion->name ?? ''); ?> </span>
                                                            <span class="col-xs-3">
                                                                <span class="badge">0</span>
                                                            </span>
                                                        </div>
                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1"
                                style="display: none;">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1">
                                            <b>Caste</b>
                                        </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearcaste();" class="gt-cursor">
                                                    <i class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                    <div class="row" id="users_caste" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            <div class="col-xs-16 " bis_skin_checked="1">
                                                <h5
                                                    class="text-center gt-margin-top-0px gt-margin-bottom-0px gt-font-weight-700">

                                                </h5>
                                            </div>
                                            <div class="clearfix" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Latest Register Profile</b>
                                        </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearprofilelatestreg();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-1">
                                                <input type="radio" name="profile_latest_register" id="f-1"
                                                    value="1"> <span class="gt-margin-left-10 gt-cursor">Today
                                                    Register
                                                    Profile</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-2">
                                                <input type="radio" name="profile_latest_register" id="f-2"
                                                    value="2"> <span class="gt-margin-left-10 gt-cursor">Last
                                                    Three Days
                                                    Register Profile</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-3">
                                                <input type="radio" name="profile_latest_register" id="f-3"
                                                    value="3"> <span class="gt-margin-left-10 gt-cursor">Last
                                                    Week
                                                    Register Profile</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-4">
                                                <input type="radio" name="profile_latest_register" id="f-4"
                                                    value="4"> <span class="gt-margin-left-10 gt-cursor">Last
                                                    Month
                                                    Register Profile</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Profile Type</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearphoto();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <label for="f-1">
                                                <input type="radio" name="photo_search" id="f-1"
                                                    value="Yes">
                                                <span class="gt-margin-left-10 gt-cursor">With Photo</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <label for="f-3">
                                                <input type="radio" name="photo_search" id="f-3"
                                                    value="horoscope">
                                                <span class="gt-margin-left-10 gt-cursor">Profile With Horoscope</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <label for="f-2">
                                                <input type="radio" name="photo_search" id="f-2"
                                                    value="" checked=""> <span
                                                    class="gt-margin-left-10 gt-cursor">Does not
                                                    matter</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Marital Status</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearmstatus();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <?php $__currentLoopData = $options['maritalStatuses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maritalStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row" bis_skin_checked="1">
                                                <label for="marital_status" class="col-xs-16">
                                                    <div class="row" bis_skin_checked="1">
                                                        <span class="col-xs-3">
                                                            <input type="checkbox" id="<?php echo e($maritalStatus->id); ?>"
                                                                name="marital_status[]"
                                                                value="<?php echo e($maritalStatus->id); ?>"
                                                                class="gt-cursor pull-left gt-margin-right-10"
                                                                <?php echo e(old('marital_status', $user->basicDetails->maritalStatus->id) == $maritalStatus->id ? 'checked' : ''); ?>>
                                                        </span>
                                                        <span class="gt-cursor col-xs-10">
                                                            <?php echo e($maritalStatus->name ?? ''); ?> </span>
                                                        <span class="col-xs-3">
                                                            <span class="badge">0</span>
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Age</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearage();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="from_age" id="from_age">
                                                <option value="null">From </option>

                                            </select>
                                        </div>
                                        <div class="col-xs-4 gt-margin-top-10 text-center" bis_skin_checked="1"> To
                                        </div>
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="to_age" id="to_age">
                                                <option value="null">To</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Height</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearheight();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="from_height" id="from_height">
                                                <?php $__currentLoopData = $options['heights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($height->id); ?>"><?php echo e($height->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                        <div class="col-xs-4 gt-margin-top-10 text-center" bis_skin_checked="1">To
                                        </div>
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="to_height" id="to_height">
                                                <?php $__currentLoopData = $options['heights']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $height): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($height->id); ?>"><?php echo e($height->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Education</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return cleareducation();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
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
                                            <?php $__currentLoopData = $options['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="education">
                                                        <input type="checkbox" id="education" name="education[]"
                                                            value="<?php echo e($education->id); ?>" class="gt-cursor">
                                                        <span
                                                            class="gt-margin-left-10 gt-cursor name"><?php echo e($education->education); ?></span>
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
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Employed In</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearoccupation();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
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
                                            <?php $__currentLoopData = $options['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="employee">
                                                        <input type="checkbox" id="employee" name="employee[]"
                                                            value="<?php echo e($employee->id); ?>">
                                                        <span
                                                            class="gt-margin-left-10 gt-cursor name"><?php echo e($employee->employee); ?></span>
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
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Occupation</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearoccupation();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
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

                                            <?php $__currentLoopData = $options['occupations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="occupation">
                                                        <input type="checkbox" id="occupation" name="occupation[]"
                                                            value="<?php echo e($occupation->id); ?>">
                                                        <span
                                                            class="gt-margin-left-10 gt-cursor name"><?php echo e($occupation->occupation); ?></span>
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
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Country Living In</b> </div>
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

                                            <?php $__currentLoopData = $options['countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="country">
                                                        <input type="checkbox" id="country"
                                                            value="<?php echo e($country->id); ?>" name="country[]"
                                                            class="gt-cursor"> <span
                                                            class="gt-margin-left-10 gt-cursor name"
                                                            <?php echo e(old('country', $user->carrierDetails->countries->country) === $country->id ? 'checked' : ''); ?>>
                                                            <?php echo e($country->country); ?></span>
                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="gt-panel gt-panel-default" id="getstate" bis_skin_checked="1"
                                style="display: none;">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>State</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearstate();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-7" bis_skin_checked="1">
                                    <div class="row" id="users_state" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <h5
                                                    class="text-center gt-margin-top-0px gt-margin-bottom-0px gt-font-weight-700">

                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcity" bis_skin_checked="1"
                                style="display: none;">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>City</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearcity();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-8" bis_skin_checked="1">
                                    <div class="row" id="users_city" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <h5
                                                    class="text-center gt-margin-top-0px gt-margin-bottom-0px gt-font-weight-700">

                                                </h5>
                                            </div>
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
                        <div role="tabpanel">
                            <ul class="nav nav-tabs responsive-tabs" role="tablist" style="
    display: flex;">

                                <li role="presentation" class="active">
                                    <a href="#quick-search" aria-controls="quick-search" role="tab"
                                        data-toggle="tab">
                                        Quick Search </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#basic-search" aria-controls="basic-search" role="tab"
                                        data-toggle="tab">
                                        Basic Search </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#adv-search" aria-controls="adv-search" role="tab"
                                        data-toggle="tab">
                                        Advanced Search </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#key-search" aria-controls="key-search" role="tab"
                                        data-toggle="tab">
                                        Keyword Search </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#loc-search" aria-controls="loc-search" role="tab"
                                        data-toggle="tab">
                                        Location Search </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#oct-search" aria-controls="oct-search" role="tab"
                                        data-toggle="tab">
                                        Occupation Search </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Quick Search -->
                                <div role="tabpanel" class="tab-pane active" id="quick-search">
                                    <div class="row">
                                        <div class="col-xxl-14 col-xxl-offset-1">
                                            <h3 class="inSearchTitle">Quick Search</h3>
                                            <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                                Search profiles and provide you suitable profiles quickly.
                                            </p>
                                            <form id="quickSearchForm" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">Age</label>
                                                        </div>
                                                        <?php
                                                            $minAge = session()->get('quickSearch.min_age');
                                                            $maxAge = session()->get('quickSearch.max_age');
                                                            $selectedReligions = session()->get('quickSearch.religion', []);
                                                            $selectedCastes = session()->get('quickSearch.caste',[]);
                                                           dump( $selectedCastes);
                                                           @dump($options['castes'])
                                                        ?>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <div class="row">
                                                                <div class="col-xs-6">

                                                                    <select class="gt-form-control" name="min_age"
                                                                        id="min_age">
                                                                        <?php for($age = 18; $age <= 60; $age++): ?>
                                                                            <option value="<?php echo e($age); ?>"
                                                                                <?php echo e(old('min_age', $minAge ?? null) == $age ? 'selected' : ''); ?>>
                                                                                <?php echo e($age); ?> Year
                                                                            </option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xs-4 text-center mt-10">To</div>
                                                                <div class="col-xs-4">
                                                                    <select class="gt-form-control" name="max_age"
                                                                        id="max_age">
                                                                        <?php for($age = 18; $age <= 60; $age++): ?>
                                                                            <option value="<?php echo e($age); ?>"
                                                                                <?php echo e(old('max_age', $maxAge ?? null) == $age ? 'selected' : ''); ?>>
                                                                                <?php echo e($age); ?> Year
                                                                            </option>
                                                                        <?php endfor; ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Religion </label>
                                                        </div>
                                                        <div class="col-xxl-8 col-xl-8">
                                                            <select id="religion" name="religion[]"
                                                                class="form-control" multiple
                                                                multiselect-search="true"
                                                                multiselect-select-all="true">
                                                                <?php $__currentLoopData = $options['religions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($religion->id); ?>"
                                                                        <?php echo e(in_array($religion->id, $selectedReligions) ? 'selected' : ''); ?>>
                                                                        <?php echo e($religion->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <div id="CasteDivloader"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="caste-div" >
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Caste </label>
                                                        </div>
                                                        <div class="col-xxl-8 col-xl-8">
                                                            <select class="js-example-basic-multiple" id="caste"
                                                                name="caste[]" multiple="multiple"
                                                                style="width: 340px">
                                                                <?php $__currentLoopData = $options['castes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($caste->id); ?>">
                                                                       <?php echo e($caste->name); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center">
                                                    <input type="submit" value="Search Now" name="quick_sub"
                                                        class="btn gt-btn-green">
                                                    <a class="btn gt-btn-green gt-cursor" href="saved-searches">Saved
                                                        Search</a>
                                                </div>
                                            </form>
                                            <script>
                                                const religion = document.getElementById("religion");
                                                religion.addEventListener("click", function(e) {
                                                    let religionId = religion.value;

                                                    if (religionId) {
                                                        caste.style.display = 'block';
                                                        $.ajax({
                                                            url: '/get-caste/' + religionId,
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            success: function(data) {
                                                                $("#caste").empty();
                                                                document.getElementById("caste-div").style.display = "block";
                                                                $("#caste").append('<option value="">Select Caste </option>');
                                                                $.each(data, function(key, value) {

                                                                    $('#caste').append('<option value="' + value.id + '">' + value
                                                                        .name + '</option>');
                                                                });
                                                            },
                                                            error: function(xhr, status, error) {
                                                                console.error('Error Status:', status);
                                                                console.error('Error Details:', xhr.responseText);
                                                                alert(
                                                                    'An error occurred while fetching the caste data. Please try again later.'
                                                                );
                                                            }
                                                        });
                                                    } else {

                                                        $('#caste').fadeOut();
                                                        $('#caste').empty();
                                                        $('#caste').append('<option value="">Select Caste</option>');
                                                    }
                                                });
                                            </script>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    const quickSearchForm = document.getElementById("quickSearchForm");
                                                    const errorMessage = document.getElementById("errorMessage");
                                                    const alerts = document.getElementById("alerts");
                                                    const fromAge = document.getElementById("from_age");
                                                    const toAge = document.getElementById("to_age");
                                                    const religionSelect = document.getElementById("religion");
                                                    const casteSelect = document.getElementById("caste");
                                                    const csrfToken = document.querySelector('input[name="_token"]').value;

                                                    if (quickSearchForm) {
                                                        quickSearchForm.addEventListener("submit", function(e) {
                                                            e.preventDefault();

                                                            const fromAgeValue = fromAge.value;
                                                            const toAgeValue = toAge.value;
                                                            const religionValues = Array.from(religionSelect.selectedOptions).map(
                                                                (option) => option.value
                                                            );
                                                            const casteValues = Array.from(casteSelect.selectedOptions).map(
                                                                (option) => option.value
                                                            );

                                                            alerts.innerHTML = "";
                                                            errorMessage.textContent = "";
                                                            if (
                                                                !fromAgeValue ||
                                                                !toAgeValue ||
                                                                religionValues.length === 0 ||
                                                                casteValues.length === 0
                                                            ) {
                                                                errorMessage.textContent = "All fields are required.";
                                                                return;
                                                            }
                                                            $.ajax({
                                                                url: "<?php echo e(route('quick.search')); ?>",
                                                                method: "POST",
                                                                data: {
                                                                    _token: csrfToken,
                                                                    from_age: fromAgeValue,
                                                                    to_age: toAgeValue,
                                                                    religion: religionValues,
                                                                    caste: casteValues,
                                                                },
                                                                success: function(response) {
                                                                    const searchResult = document.getElementById("searchResult");
                                                                    searchResult.innerHTML = response;
                                                                },
                                                                error: function(xhr) {
                                                                    alerts.innerHTML = xhr.responseJSON.alert || "An error occurred.";
                                                                    setTimeout(function() {
                                                                        alerts.innerHTML = "";
                                                                    }, 3000);
                                                                },
                                                            });
                                                        });
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Quick Search -->
                                <!-- Basic Search  -->
                                <div role="tabpanel" class="tab-pane " id="basic-search">
                                    <div class="row">
                                        <div class="col-xxl-14 col-xxl-offset-1">
                                            <h3 class="inSearchTitle">Basic Search</h3>
                                            <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                                Searches to provide suitable profiles.
                                            </p>
                                            <form action="" id="baisc_search_form" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Age </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <?php
                                                                        $count = 60;

                                                                    ?>
                                                                    <select class="gt-form-control" name="from_age"
                                                                        id="from_age_basic">
                                                                        <option value="">Select Age From</option>

                                                                    </select>
                                                                </div>
                                                                <div class="col-xs-4 text-center mt-10">To</div>
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control" name="to_age"
                                                                        id="part_to_age_basic">
                                                                        <option value="1" disabled>
                                                                            18 Year</option>
                                                                        <option value="2">
                                                                            19 Year</option>
                                                                        <option value="3">
                                                                            20 Year</option>
                                                                        <option value="4">
                                                                            21 Year</option>
                                                                        <option value="5">
                                                                            22 Year</option>
                                                                        <option value="6">
                                                                            23 Year</option>
                                                                        <option value="7">
                                                                            24 Year</option>
                                                                        <option value="8">
                                                                            25 Year</option>
                                                                        <option value="9">
                                                                            26 Year</option>
                                                                        <option value="10">
                                                                            27 Year</option>
                                                                        <option value="11">
                                                                            28 Year</option>
                                                                        <option value="12">
                                                                            29 Year</option>
                                                                        <option value="13" selected>
                                                                            30 Year</option>
                                                                        <option value="14">
                                                                            31 Year</option>
                                                                        <option value="15">
                                                                            32 Year</option>
                                                                        <option value="16">
                                                                            33 Year</option>
                                                                        <option value="17">
                                                                            34 Year</option>
                                                                        <option value="18">
                                                                            35 Year</option>
                                                                        <option value="19">
                                                                            36 Year</option>
                                                                        <option value="20">
                                                                            37 Year</option>
                                                                        <option value="21">
                                                                            38 Year</option>
                                                                        <option value="22">
                                                                            39 Year</option>
                                                                        <option value="23">
                                                                            40 Year</option>
                                                                        <option value="24">
                                                                            41 Year</option>
                                                                        <option value="25">
                                                                            42 Year</option>
                                                                        <option value="26">
                                                                            43 Year</option>
                                                                        <option value="27">
                                                                            44 Year</option>
                                                                        <option value="28">
                                                                            45 Year</option>
                                                                        <option value="29">
                                                                            46 Year</option>
                                                                        <option value="30">
                                                                            47 Year</option>
                                                                        <option value="31">
                                                                            48 Year</option>
                                                                        <option value="32">
                                                                            49 Year</option>
                                                                        <option value="33">
                                                                            50 Year</option>
                                                                        <option value="34">
                                                                            51 Year</option>
                                                                        <option value="35">
                                                                            52 Year</option>
                                                                        <option value="36">
                                                                            53 Year</option>
                                                                        <option value="37">
                                                                            54 Year</option>
                                                                        <option value="38">
                                                                            55 Year</option>
                                                                        <option value="39">
                                                                            56 Year</option>
                                                                        <option value="40">
                                                                            57 Year</option>
                                                                        <option value="41">
                                                                            58 Year</option>
                                                                        <option value="42">
                                                                            59 Year</option>
                                                                        <option value="43">
                                                                            60 Year</option>
                                                                        <option value="44">
                                                                            60+ Year</option>


                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Height </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control flat"
                                                                        name="from_height" id="from_height_basic">
                                                                        <option value="1">Below 4ft 6in - 137cm
                                                                        </option>
                                                                        <option value="2" selected>4ft 6in - 137cm
                                                                        </option>
                                                                        <option value="3">4ft 7in - 139cm</option>
                                                                        <option value="4">4ft 8in - 142cm</option>
                                                                        <option value="5">4ft 9in - 144cm</option>
                                                                        <option value="6">4ft 10in - 147cm
                                                                        </option>
                                                                        <option value="7">4ft 11in - 149cm
                                                                        </option>
                                                                        <option value="8">5ft - 152cm</option>
                                                                        <option value="9">5ft 1in - 154cm</option>
                                                                        <option value="10">5ft 2in - 157cm</option>
                                                                        <option value="11">5ft 3in - 160cm</option>
                                                                        <option value="12">5ft 4in - 162cm</option>
                                                                        <option value="13">5ft 5in - 165cm</option>
                                                                        <option value="14">5ft 6in - 167cm</option>
                                                                        <option value="15">5ft 7in - 170cm</option>
                                                                        <option value="16">5ft 8in - 172cm</option>
                                                                        <option value="17">5ft 9in - 175cm</option>
                                                                        <option value="18">5ft 10in - 177cm
                                                                        </option>
                                                                        <option value="19">5ft 11in - 180cm
                                                                        </option>
                                                                        <option value="20">6ft - 182cm</option>
                                                                        <option value="21">6ft 1in - 185cm</option>
                                                                        <option value="22">6ft 2in - 187cm</option>
                                                                        <option value="23">6ft 3in - 190cm</option>
                                                                        <option value="24">6ft 4in - 193cm</option>
                                                                        <option value="25">6ft 5in - 195cm</option>
                                                                        <option value="26">6ft 6in - 198cm</option>
                                                                        <option value="27">6ft 7in - 200cm</option>
                                                                        <option value="28">6ft 8in - 203cm</option>
                                                                        <option value="29">6ft 9in - 205cm</option>
                                                                        <option value="30">6ft 10in - 208cm
                                                                        </option>
                                                                        <option value="31">6ft 11in - 210cm
                                                                        </option>
                                                                        <option value="32">7ft - 213cm</option>
                                                                        <option value="33">Above 7ft - 213cm
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xs-4 text-center mt-10">
                                                                    To </div>
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control flat"
                                                                        name="to_height" id="part_to_height_basic">
                                                                        <option value="1" disabled>
                                                                            Below 4ft 6in - 137cm</option>
                                                                        <option value="2" disabled>
                                                                            4ft 6in - 137cm</option>
                                                                        <option value="3" disabled>
                                                                            4ft 7in - 139cm</option>
                                                                        <option value="4" disabled>
                                                                            4ft 8in - 142cm</option>
                                                                        <option value="5" disabled>
                                                                            4ft 9in - 144cm</option>
                                                                        <option value="6" disabled>
                                                                            4ft 10in - 147cm</option>
                                                                        <option value="7" disabled>
                                                                            4ft 11in - 149cm</option>
                                                                        <option value="8" disabled>
                                                                            5ft - 152cm</option>
                                                                        <option value="9" disabled>
                                                                            5ft 1in - 154cm</option>
                                                                        <option value="10" disabled>
                                                                            5ft 2in - 157cm</option>
                                                                        <option value="11" disabled>
                                                                            5ft 3in - 160cm</option>
                                                                        <option value="12" disabled>
                                                                            5ft 4in - 162cm</option>
                                                                        <option value="13" disabledselected>
                                                                            5ft 5in - 165cm</option>
                                                                        <option value="14">
                                                                            5ft 6in - 167cm</option>
                                                                        <option value="15">
                                                                            5ft 7in - 170cm</option>
                                                                        <option value="16">
                                                                            5ft 8in - 172cm</option>
                                                                        <option value="17">
                                                                            5ft 9in - 175cm</option>
                                                                        <option value="18">
                                                                            5ft 10in - 177cm</option>
                                                                        <option value="19">
                                                                            5ft 11in - 180cm</option>
                                                                        <option value="20">
                                                                            6ft - 182cm</option>
                                                                        <option value="21">
                                                                            6ft 1in - 185cm</option>
                                                                        <option value="22">
                                                                            6ft 2in - 187cm</option>
                                                                        <option value="23">
                                                                            6ft 3in - 190cm</option>
                                                                        <option value="24">
                                                                            6ft 4in - 193cm</option>
                                                                        <option value="25">
                                                                            6ft 5in - 195cm</option>
                                                                        <option value="26">
                                                                            6ft 6in - 198cm</option>
                                                                        <option value="27">
                                                                            6ft 7in - 200cm</option>
                                                                        <option value="28">
                                                                            6ft 8in - 203cm</option>
                                                                        <option value="29">
                                                                            6ft 9in - 205cm</option>
                                                                        <option value="30">
                                                                            6ft 10in - 208cm</option>
                                                                        <option value="31">
                                                                            6ft 11in - 210cm</option>
                                                                        <option value="32">
                                                                            7ft - 213cm</option>
                                                                        <option value="33">
                                                                            Above 7ft - 213cm</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Marital status </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Marital Status"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" name="m_status[]">
                                                                <option value="Never Married">Never Married</option>
                                                                <option value="Widow">Widow</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Awaiting Divorce">Awaiting Divorce
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Religion </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Religion"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="5" id="religion_id_basic"
                                                                name="religion_id[]">
                                                                <option value="52">
                                                                    Buddhist </option>
                                                                <option value="46">
                                                                    Christian </option>
                                                                <option value="37">
                                                                    Hindu </option>
                                                                <option value="48">
                                                                    Jain - Digambar </option>
                                                                <option value="49">
                                                                    Jain - Shwetambar </option>
                                                                <option value="53">
                                                                    Jewish </option>
                                                                <option value="45">
                                                                    Muslim - Others </option>
                                                                <option value="43">
                                                                    Muslim - Shia </option>
                                                                <option value="44">
                                                                    Muslim - Sunni </option>
                                                                <option value="51">
                                                                    Parsi </option>
                                                                <option value="47">
                                                                    Sikh </option>
                                                            </select>
                                                            <div id="CasteDivloaderbasic"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Caste </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Caste"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                id="caste_id_basic" name="caste_id[]">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Country living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Country"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="country_id_bsc"
                                                                name="country_id[]">
                                                                <option value=""></option>
                                                                <option value="1">Andorra</option>
                                                                <option value="2">United Arab Emirates</option>
                                                                <option value="3">Afghanistan</option>
                                                                <option value="4">Antigua And Barbuda</option>
                                                                <option value="5">Albania</option>
                                                                <option value="6">Armenia</option>
                                                                <option value="7">Angola</option>
                                                                <option value="8">Antarctica</option>
                                                                <option value="9">Argentina</option>
                                                                <option value="10">American Samoa</option>
                                                                <option value="11">Austria</option>
                                                                <option value="12">Australia</option>
                                                                <option value="13">Aruba</option>
                                                                <option value="14">Aland Islands</option>
                                                                <option value="15">Azerbaijan</option>
                                                                <option value="16">Bosnia And Herzegovina</option>
                                                                <option value="17">Barbados</option>
                                                                <option value="18">Bangladesh</option>
                                                                <option value="19">Belgium</option>
                                                                <option value="20">Burkina Faso</option>
                                                                <option value="21">Bulgaria</option>
                                                                <option value="22">Bahrain</option>
                                                                <option value="23">Burundi</option>
                                                                <option value="24">Benin</option>
                                                                <option value="25">Bermuda</option>
                                                                <option value="26">Brunei</option>
                                                                <option value="27">Bolivia</option>
                                                                <option value="28">Bonaire, Saint Eustatius And
                                                                    Saba
                                                                </option>
                                                                <option value="29">Brazil</option>
                                                                <option value="30">Bahamas</option>
                                                                <option value="31">Bhutan</option>
                                                                <option value="32">Bouvet Island</option>
                                                                <option value="33">Botswana</option>
                                                                <option value="34">Belarus</option>
                                                                <option value="35">Belize</option>
                                                                <option value="36">Canada</option>
                                                                <option value="37">Democratic Republic Of The Congo
                                                                </option>
                                                                <option value="38">Central African Republic
                                                                </option>
                                                                <option value="39">Republic Of The Congo</option>
                                                                <option value="40">Switzerland</option>
                                                                <option value="41">Ivory Coast</option>
                                                                <option value="42">Chile</option>
                                                                <option value="43">Cameroon</option>
                                                                <option value="44">China</option>
                                                                <option value="45">Colombia</option>
                                                                <option value="46">Costa Rica</option>
                                                                <option value="47">Cuba</option>
                                                                <option value="48">Cape Verde</option>
                                                                <option value="49">Cyprus</option>
                                                                <option value="50">Czech Republic</option>
                                                                <option value="51">Germany</option>
                                                                <option value="52">Djibouti</option>
                                                                <option value="53">Denmark</option>
                                                                <option value="54">Dominica</option>
                                                                <option value="55">Dominican Republic</option>
                                                                <option value="56">Algeria</option>
                                                                <option value="57">Ecuador</option>
                                                                <option value="58">Estonia</option>
                                                                <option value="59">Egypt</option>
                                                                <option value="60">Western Sahara</option>
                                                                <option value="61">Eritrea</option>
                                                                <option value="62">Spain</option>
                                                                <option value="63">Ethiopia</option>
                                                                <option value="64">Finland</option>
                                                                <option value="65">Fiji</option>
                                                                <option value="66">Micronesia</option>
                                                                <option value="67">Faroe Islands</option>
                                                                <option value="68">France</option>
                                                                <option value="69">Gabon</option>
                                                                <option value="70">United Kingdom</option>
                                                                <option value="71">Grenada</option>
                                                                <option value="72">Georgia</option>
                                                                <option value="73">French Guiana</option>
                                                                <option value="74">Guernsey</option>
                                                                <option value="75">Ghana</option>
                                                                <option value="76">Greenland</option>
                                                                <option value="77">Gambia</option>
                                                                <option value="78">Guinea</option>
                                                                <option value="79">Guadeloupe</option>
                                                                <option value="80">Equatorial Guinea</option>
                                                                <option value="81">Greece</option>
                                                                <option value="82">Guatemala</option>
                                                                <option value="83">Guam</option>
                                                                <option value="84">Guinea-Bissau</option>
                                                                <option value="85">Guyana</option>
                                                                <option value="86">Hong Kong</option>
                                                                <option value="87">Honduras</option>
                                                                <option value="88">Croatia</option>
                                                                <option value="89">Haiti</option>
                                                                <option value="90">Hungary</option>
                                                                <option value="91">Indonesia</option>
                                                                <option value="92">Ireland</option>
                                                                <option value="93">Israel</option>
                                                                <option value="94">Isle Of Man</option>
                                                                <option value="95">India</option>
                                                                <option value="96">British Indian Ocean Territory
                                                                </option>
                                                                <option value="97">Iraq</option>
                                                                <option value="98">Iran</option>
                                                                <option value="99">Iceland</option>
                                                                <option value="100">Italy</option>
                                                                <option value="101">Jersey</option>
                                                                <option value="102">Jamaica</option>
                                                                <option value="103">Jordan</option>
                                                                <option value="104">Japan</option>
                                                                <option value="105">Kenya</option>
                                                                <option value="106">Kyrgyzstan</option>
                                                                <option value="107">Cambodia</option>
                                                                <option value="108">Kiribati</option>
                                                                <option value="109">Comoros</option>
                                                                <option value="110">Saint Kitts And Nevis</option>
                                                                <option value="111">North Korea</option>
                                                                <option value="112">South Korea</option>
                                                                <option value="113">Kuwait</option>
                                                                <option value="114">Kazakhstan</option>
                                                                <option value="115">Laos</option>
                                                                <option value="116">Lebanon</option>
                                                                <option value="117">Saint Lucia</option>
                                                                <option value="118">Liechtenstein</option>
                                                                <option value="119">Sri Lanka</option>
                                                                <option value="120">Liberia</option>
                                                                <option value="121">Lesotho</option>
                                                                <option value="122">Lithuania</option>
                                                                <option value="123">Luxembourg</option>
                                                                <option value="124">Latvia</option>
                                                                <option value="125">Libya</option>
                                                                <option value="126">Morocco</option>
                                                                <option value="127">Monaco</option>
                                                                <option value="128">Moldova</option>
                                                                <option value="129">Montenegro</option>
                                                                <option value="130">Madagascar</option>
                                                                <option value="131">Marshall Islands</option>
                                                                <option value="132">Macedonia</option>
                                                                <option value="133">Mali</option>
                                                                <option value="134">Myanmar</option>
                                                                <option value="135">Mongolia</option>
                                                                <option value="136">Macao</option>
                                                                <option value="137">Northern Mariana Islands
                                                                </option>
                                                                <option value="138">Martinique</option>
                                                                <option value="139">Mauritania</option>
                                                                <option value="140">Montserrat</option>
                                                                <option value="141">Mauritius</option>
                                                                <option value="142">Maldives</option>
                                                                <option value="143">Malawi</option>
                                                                <option value="144">Mexico</option>
                                                                <option value="145">Malaysia</option>
                                                                <option value="146">Mozambique</option>
                                                                <option value="147">Namibia</option>
                                                                <option value="148">New Caledonia</option>
                                                                <option value="149">Niger</option>
                                                                <option value="150">Nigeria</option>
                                                                <option value="151">Nicaragua</option>
                                                                <option value="152">Netherlands</option>
                                                                <option value="153">Norway</option>
                                                                <option value="154">Nepal</option>
                                                                <option value="155">Nauru</option>
                                                                <option value="156">New Zealand</option>
                                                                <option value="157">Oman</option>
                                                                <option value="158">Panama</option>
                                                                <option value="159">Peru</option>
                                                                <option value="160">French Polynesia</option>
                                                                <option value="161">Papua New Guinea</option>
                                                                <option value="162">Philippines</option>
                                                                <option value="163">Pakistan</option>
                                                                <option value="164">Poland</option>
                                                                <option value="165">Saint Pierre And Miquelon
                                                                </option>
                                                                <option value="166">Puerto Rico</option>
                                                                <option value="167">Palestinian Territory</option>
                                                                <option value="168">Portugal</option>
                                                                <option value="169">Palau</option>
                                                                <option value="170">Paraguay</option>
                                                                <option value="171">Qatar</option>
                                                                <option value="172">Reunion</option>
                                                                <option value="173">Romania</option>
                                                                <option value="174">Serbia</option>
                                                                <option value="175">Russia</option>
                                                                <option value="176">Rwanda</option>
                                                                <option value="177">Saudi Arabia</option>
                                                                <option value="178">Solomon Islands</option>
                                                                <option value="179">Seychelles</option>
                                                                <option value="180">Sudan</option>
                                                                <option value="181">Sweden</option>
                                                                <option value="182">Singapore</option>
                                                                <option value="183">Saint Helena</option>
                                                                <option value="184">Slovenia</option>
                                                                <option value="185">Svalbard And Jan Mayen</option>
                                                                <option value="186">Slovakia</option>
                                                                <option value="187">Sierra Leone</option>
                                                                <option value="188">San Marino</option>
                                                                <option value="189">Senegal</option>
                                                                <option value="190">Somalia</option>
                                                                <option value="191">Suriname</option>
                                                                <option value="192">South Sudan</option>
                                                                <option value="193">Sao Tome And Principe</option>
                                                                <option value="194">El Salvador</option>
                                                                <option value="195">Syria</option>
                                                                <option value="196">Swaziland</option>
                                                                <option value="197">Chad</option>
                                                                <option value="198">French Southern Territories
                                                                </option>
                                                                <option value="199">Togo</option>
                                                                <option value="200">Thailand</option>
                                                                <option value="201">Tajikistan</option>
                                                                <option value="202">Tokelau</option>
                                                                <option value="203">East Timor</option>
                                                                <option value="204">Turkmenistan</option>
                                                                <option value="205">Tunisia</option>
                                                                <option value="206">Tonga</option>
                                                                <option value="207">Turkey</option>
                                                                <option value="208">Trinidad And Tobago</option>
                                                                <option value="209">Tuvalu</option>
                                                                <option value="210">Taiwan</option>
                                                                <option value="211">Tanzania</option>
                                                                <option value="212">Ukraine</option>
                                                                <option value="213">Uganda</option>
                                                                <option value="214">United States Minor Outlying
                                                                    Islands
                                                                </option>
                                                                <option value="215">United States</option>
                                                                <option value="216">Uruguay</option>
                                                                <option value="217">Uzbekistan</option>
                                                                <option value="218">Saint Vincent And The
                                                                    Grenadines
                                                                </option>
                                                                <option value="219">Venezuela</option>
                                                                <option value="220">U.S. Virgin Islands</option>
                                                                <option value="221">Vietnam</option>
                                                                <option value="222">Vanuatu</option>
                                                                <option value="223">Wallis And Futuna</option>
                                                                <option value="224">Samoa</option>
                                                                <option value="225">Kosovo</option>
                                                                <option value="226">Yemen</option>
                                                                <option value="227">Mayotte</option>
                                                                <option value="228">South Africa</option>
                                                                <option value="229">Zambia</option>
                                                                <option value="230">Zimbabwe</option>
                                                            </select>
                                                            <div id="stateDivloader_bsc"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                State living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a State"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="state_id_bsc"
                                                                name="state_id[]">
                                                                <option value=""></option>
                                                            </select>
                                                            <div id="cityDivloader_bsc"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                City living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a City"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="city_id_bsc" name="city_id[]">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Education </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Education"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" name="education[]">
                                                                <option value=""></option>
                                                                <option value="9">B Arch</option>
                                                                <option value="16">B Com</option>
                                                                <option value="15">B Phil</option>
                                                                <option value="10">B Plan</option>
                                                                <option value="12">B Tech</option>
                                                                <option value="60">B.Pharm</option>
                                                                <option value="17">BA</option>
                                                                <option value="67">Bachelor Of Law</option>
                                                                <option value="54">Bachelor Of Veterinary Science
                                                                </option>
                                                                <option value="52">BAMS</option>
                                                                <option value="25">BBA</option>
                                                                <option value="8">BCA</option>
                                                                <option value="48">BDS</option>
                                                                <option value="11">BE</option>
                                                                <option value="22">BEd</option>
                                                                <option value="18">BFA</option>
                                                                <option value="26">BFM (Financial Management)
                                                                </option>
                                                                <option value="66">BGL</option>
                                                                <option value="24">BHM</option>
                                                                <option value="50">BHMS</option>
                                                                <option value="19">BLIS</option>
                                                                <option value="21">BMM (MASS MEDIA)</option>
                                                                <option value="58">BPT</option>
                                                                <option value="13">BSc Computer Science</option>
                                                                <option value="14">BSc IT</option>
                                                                <option value="62">BSc Nursing</option>
                                                                <option value="20">BSW</option>
                                                                <option value="72">CA Final</option>
                                                                <option value="71">CA Inter</option>
                                                                <option value="75">CFA (Chartered Financial
                                                                    Analyst)
                                                                </option>
                                                                <option value="74">Company Secretary (CS)</option>
                                                                <option value="56">Degree In Medicine</option>
                                                                <option value="80">Diploma</option>
                                                                <option value="64">Diploma In Nursing</option>
                                                                <option value="47">DM - Doctorate Of Medicine
                                                                </option>
                                                                <option value="82">High School</option>
                                                                <option value="77">IAS</option>
                                                                <option value="73">ICWA</option>
                                                                <option value="78">IPS</option>
                                                                <option value="79">IRS</option>
                                                                <option value="83">Less Than High School</option>
                                                                <option value="68">LLB</option>
                                                                <option value="70">LLM</option>
                                                                <option value="28">M Arch</option>
                                                                <option value="35">M Com</option>
                                                                <option value="34">M Phil</option>
                                                                <option value="36">M Sc</option>
                                                                <option value="31">M Tech</option>
                                                                <option value="61">M.Pharm</option>
                                                                <option value="37">MA</option>
                                                                <option value="53">MAMS</option>
                                                                <option value="57">Master In Medicine</option>
                                                                <option value="69">Master Of Law</option>
                                                                <option value="55">Master Of Veterinary Science
                                                                </option>
                                                                <option value="41">MBA</option>
                                                                <option value="44">MBBS</option>
                                                                <option value="29">MCA</option>
                                                                <option value="46">MCh - Master Of Chirurgiae
                                                                </option>
                                                                <option value="45">MD / MS (Medical)</option>
                                                                <option value="49">MDS</option>
                                                                <option value="27">ME</option>
                                                                <option value="23">MEd</option>
                                                                <option value="65">Medical Laboratory Technology
                                                                </option>
                                                                <option value="43">MFM (Financial Management)
                                                                </option>
                                                                <option value="40">MHM</option>
                                                                <option value="51">MHMS</option>
                                                                <option value="38">MLIS</option>
                                                                <option value="59">MPT</option>
                                                                <option value="32">MSc Computer Science</option>
                                                                <option value="33">MSc IT</option>
                                                                <option value="63">MSc Nursing</option>
                                                                <option value="39">MSW</option>
                                                                <option value="84">Other Education</option>
                                                                <option value="30">PGDCA</option>
                                                                <option value="42">PGDM</option>
                                                                <option value="76">Ph D</option>
                                                                <option value="81">Polytechnic</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Photo settings </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select class="gt-form-control flat"
                                                                name="photo_search">
                                                                <option value="">Does not matter</option>
                                                                <option value="Yes">With Photo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Search Now" name="basic_sub"
                                                        class="btn gt-btn-green">
                                                    <a class="btn gt-btn-green gt-cursor"
                                                        href="saved-searches">Saved
                                                        Search</a>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Basic Search  -->
                                <!-- Advance Search  -->
                                <div role="tabpanel" class="tab-pane " id="adv-search">
                                    <div class="row">
                                        <div class="col-xxl-14 col-xxl-offset-1">
                                            <h3 class="inSearchTitle">Advanced Search</h3>
                                            <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                                Advance search contain criteria that helps you to find a suitable
                                                profile.
                                            </p>
                                            <form action="" id="baisc_search_form" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Age </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control" name="from_age"
                                                                        id="from_age_adv">
                                                                        <option value="">Select Age From
                                                                        </option>
                                                                        <option value="1" selected>18 Year
                                                                        </option>
                                                                        <option value="2">19 Year</option>
                                                                        <option value="3">20 Year</option>
                                                                        <option value="4">21 Year</option>
                                                                        <option value="5">22 Year</option>
                                                                        <option value="6">23 Year</option>
                                                                        <option value="7">24 Year</option>
                                                                        <option value="8">25 Year</option>
                                                                        <option value="9">26 Year</option>
                                                                        <option value="10">27 Year</option>
                                                                        <option value="11">28 Year</option>
                                                                        <option value="12">29 Year</option>
                                                                        <option value="13">30 Year</option>
                                                                        <option value="14">31 Year</option>
                                                                        <option value="15">32 Year</option>
                                                                        <option value="16">33 Year</option>
                                                                        <option value="17">34 Year</option>
                                                                        <option value="18">35 Year</option>
                                                                        <option value="19">36 Year</option>
                                                                        <option value="20">37 Year</option>
                                                                        <option value="21">38 Year</option>
                                                                        <option value="22">39 Year</option>
                                                                        <option value="23">40 Year</option>
                                                                        <option value="24">41 Year</option>
                                                                        <option value="25">42 Year</option>
                                                                        <option value="26">43 Year</option>
                                                                        <option value="27">44 Year</option>
                                                                        <option value="28">45 Year</option>
                                                                        <option value="29">46 Year</option>
                                                                        <option value="30">47 Year</option>
                                                                        <option value="31">48 Year</option>
                                                                        <option value="32">49 Year</option>
                                                                        <option value="33">50 Year</option>
                                                                        <option value="34">51 Year</option>
                                                                        <option value="35">52 Year</option>
                                                                        <option value="36">53 Year</option>
                                                                        <option value="37">54 Year</option>
                                                                        <option value="38">55 Year</option>
                                                                        <option value="39">56 Year</option>
                                                                        <option value="40">57 Year</option>
                                                                        <option value="41">58 Year</option>
                                                                        <option value="42">59 Year</option>
                                                                        <option value="43">60 Year</option>
                                                                        <option value="44">60+ Year</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xs-4 text-center mt-10">To</div>
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control" name="to_age"
                                                                        id="part_to_age_adv">
                                                                        <option value="1" disabled>
                                                                            18 Year</option>
                                                                        <option value="2">
                                                                            19 Year</option>
                                                                        <option value="3">
                                                                            20 Year</option>
                                                                        <option value="4">
                                                                            21 Year</option>
                                                                        <option value="5">
                                                                            22 Year</option>
                                                                        <option value="6">
                                                                            23 Year</option>
                                                                        <option value="7">
                                                                            24 Year</option>
                                                                        <option value="8">
                                                                            25 Year</option>
                                                                        <option value="9">
                                                                            26 Year</option>
                                                                        <option value="10">
                                                                            27 Year</option>
                                                                        <option value="11">
                                                                            28 Year</option>
                                                                        <option value="12">
                                                                            29 Year</option>
                                                                        <option value="13" selected>
                                                                            30 Year</option>
                                                                        <option value="14">
                                                                            31 Year</option>
                                                                        <option value="15">
                                                                            32 Year</option>
                                                                        <option value="16">
                                                                            33 Year</option>
                                                                        <option value="17">
                                                                            34 Year</option>
                                                                        <option value="18">
                                                                            35 Year</option>
                                                                        <option value="19">
                                                                            36 Year</option>
                                                                        <option value="20">
                                                                            37 Year</option>
                                                                        <option value="21">
                                                                            38 Year</option>
                                                                        <option value="22">
                                                                            39 Year</option>
                                                                        <option value="23">
                                                                            40 Year</option>
                                                                        <option value="24">
                                                                            41 Year</option>
                                                                        <option value="25">
                                                                            42 Year</option>
                                                                        <option value="26">
                                                                            43 Year</option>
                                                                        <option value="27">
                                                                            44 Year</option>
                                                                        <option value="28">
                                                                            45 Year</option>
                                                                        <option value="29">
                                                                            46 Year</option>
                                                                        <option value="30">
                                                                            47 Year</option>
                                                                        <option value="31">
                                                                            48 Year</option>
                                                                        <option value="32">
                                                                            49 Year</option>
                                                                        <option value="33">
                                                                            50 Year</option>
                                                                        <option value="34">
                                                                            51 Year</option>
                                                                        <option value="35">
                                                                            52 Year</option>
                                                                        <option value="36">
                                                                            53 Year</option>
                                                                        <option value="37">
                                                                            54 Year</option>
                                                                        <option value="38">
                                                                            55 Year</option>
                                                                        <option value="39">
                                                                            56 Year</option>
                                                                        <option value="40">
                                                                            57 Year</option>
                                                                        <option value="41">
                                                                            58 Year</option>
                                                                        <option value="42">
                                                                            59 Year</option>
                                                                        <option value="43">
                                                                            60 Year</option>
                                                                        <option value="44">
                                                                            60+ Year</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Height </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control flat"
                                                                        name="from_height" id="from_height_adv">
                                                                        <option value="1">Below 4ft 6in - 137cm
                                                                        </option>
                                                                        <option value="2" selected>4ft 6in -
                                                                            137cm
                                                                        </option>
                                                                        <option value="3">4ft 7in - 139cm
                                                                        </option>
                                                                        <option value="4">4ft 8in - 142cm
                                                                        </option>
                                                                        <option value="5">4ft 9in - 144cm
                                                                        </option>
                                                                        <option value="6">4ft 10in - 147cm
                                                                        </option>
                                                                        <option value="7">4ft 11in - 149cm
                                                                        </option>
                                                                        <option value="8">5ft - 152cm</option>
                                                                        <option value="9">5ft 1in - 154cm
                                                                        </option>
                                                                        <option value="10">5ft 2in - 157cm
                                                                        </option>
                                                                        <option value="11">5ft 3in - 160cm
                                                                        </option>
                                                                        <option value="12">5ft 4in - 162cm
                                                                        </option>
                                                                        <option value="13">5ft 5in - 165cm
                                                                        </option>
                                                                        <option value="14">5ft 6in - 167cm
                                                                        </option>
                                                                        <option value="15">5ft 7in - 170cm
                                                                        </option>
                                                                        <option value="16">5ft 8in - 172cm
                                                                        </option>
                                                                        <option value="17">5ft 9in - 175cm
                                                                        </option>
                                                                        <option value="18">5ft 10in - 177cm
                                                                        </option>
                                                                        <option value="19">5ft 11in - 180cm
                                                                        </option>
                                                                        <option value="20">6ft - 182cm</option>
                                                                        <option value="21">6ft 1in - 185cm
                                                                        </option>
                                                                        <option value="22">6ft 2in - 187cm
                                                                        </option>
                                                                        <option value="23">6ft 3in - 190cm
                                                                        </option>
                                                                        <option value="24">6ft 4in - 193cm
                                                                        </option>
                                                                        <option value="25">6ft 5in - 195cm
                                                                        </option>
                                                                        <option value="26">6ft 6in - 198cm
                                                                        </option>
                                                                        <option value="27">6ft 7in - 200cm
                                                                        </option>
                                                                        <option value="28">6ft 8in - 203cm
                                                                        </option>
                                                                        <option value="29">6ft 9in - 205cm
                                                                        </option>
                                                                        <option value="30">6ft 10in - 208cm
                                                                        </option>
                                                                        <option value="31">6ft 11in - 210cm
                                                                        </option>
                                                                        <option value="32">7ft - 213cm</option>
                                                                        <option value="33">Above 7ft - 213cm
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-xs-4 text-center mt-10">
                                                                    To </div>
                                                                <div class="col-xs-6">
                                                                    <select class="gt-form-control flat"
                                                                        name="to_height" id="part_to_height_adv">
                                                                        <option value="1" disabled>Below 4ft 6in
                                                                            - 137cm
                                                                        </option>
                                                                        <option value="2" disabled>4ft 6in -
                                                                            137cm
                                                                        </option>
                                                                        <option value="3" disabled>4ft 7in -
                                                                            139cm
                                                                        </option>
                                                                        <option value="4" disabled>4ft 8in -
                                                                            142cm
                                                                        </option>
                                                                        <option value="5" disabled>4ft 9in -
                                                                            144cm
                                                                        </option>
                                                                        <option value="6" disabled>4ft 10in -
                                                                            147cm
                                                                        </option>
                                                                        <option value="7" disabled>4ft 11in -
                                                                            149cm
                                                                        </option>
                                                                        <option value="8" disabled>5ft - 152cm
                                                                        </option>
                                                                        <option value="9" disabled>5ft 1in -
                                                                            154cm
                                                                        </option>
                                                                        <option value="10" disabled>5ft 2in -
                                                                            157cm
                                                                        </option>
                                                                        <option value="11" disabled>5ft 3in -
                                                                            160cm
                                                                        </option>
                                                                        <option value="12" disabled>5ft 4in -
                                                                            162cm
                                                                        </option>
                                                                        <option value="13" disabledselected>5ft
                                                                            5in - 165cm
                                                                        </option>
                                                                        <option value="14">5ft 6in - 167cm
                                                                        </option>
                                                                        <option value="15">5ft 7in - 170cm
                                                                        </option>
                                                                        <option value="16">5ft 8in - 172cm
                                                                        </option>
                                                                        <option value="17">5ft 9in - 175cm
                                                                        </option>
                                                                        <option value="18">5ft 10in - 177cm
                                                                        </option>
                                                                        <option value="19">5ft 11in - 180cm
                                                                        </option>
                                                                        <option value="20">6ft - 182cm</option>
                                                                        <option value="21">6ft 1in - 185cm
                                                                        </option>
                                                                        <option value="22">6ft 2in - 187cm
                                                                        </option>
                                                                        <option value="23">6ft 3in - 190cm
                                                                        </option>
                                                                        <option value="24">6ft 4in - 193cm
                                                                        </option>
                                                                        <option value="25">6ft 5in - 195cm
                                                                        </option>
                                                                        <option value="26">6ft 6in - 198cm
                                                                        </option>
                                                                        <option value="27">6ft 7in - 200cm
                                                                        </option>
                                                                        <option value="28">6ft 8in - 203cm
                                                                        </option>
                                                                        <option value="29">6ft 9in - 205cm
                                                                        </option>
                                                                        <option value="30">6ft 10in - 208cm
                                                                        </option>
                                                                        <option value="31">6ft 11in - 210cm
                                                                        </option>
                                                                        <option value="32">7ft - 213cm</option>
                                                                        <option value="33">Above 7ft - 213cm
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Marital status </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Marital Status"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" name="m_status[]">
                                                                <option value="Never Married">Never Married</option>
                                                                <option value="Widow">Widow</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Awaiting Divorce">Awaiting Divorce
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Physical status </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Physical Status"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" name="physical_status[]">
                                                                <option value="Normal">Normal</option>
                                                                <option value="Physically-challenged">
                                                                    Physically-challenged
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Religion </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Religion"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="5" id="religion_id_adv"
                                                                name="religion_id[]">
                                                                <option value="52">
                                                                    Buddhist </option>
                                                                <option value="46">
                                                                    Christian </option>
                                                                <option value="37">
                                                                    Hindu </option>
                                                                <option value="48">
                                                                    Jain - Digambar </option>
                                                                <option value="49">
                                                                    Jain - Shwetambar </option>
                                                                <option value="53">
                                                                    Jewish </option>
                                                                <option value="45">
                                                                    Muslim - Others </option>
                                                                <option value="43">
                                                                    Muslim - Shia </option>
                                                                <option value="44">
                                                                    Muslim - Sunni </option>
                                                                <option value="51">
                                                                    Parsi </option>
                                                                <option value="47">
                                                                    Sikh </option>
                                                            </select>
                                                            <div id="CasteDivloaderadv"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Caste </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Caste"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                id="caste_id_adv" name="caste_id[]">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="gt-text-orange gt-border-bottom-smoke-white pb-15">
                                                    Location Details </h4>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Country living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Country"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="country_id_adv"
                                                                name="country_id[]">
                                                                <option value=""></option>
                                                                <option value="1">Andorra</option>
                                                                <option value="2">United Arab Emirates</option>
                                                                <option value="3">Afghanistan</option>
                                                                <option value="4">Antigua And Barbuda</option>
                                                                <option value="5">Albania</option>
                                                                <option value="6">Armenia</option>
                                                                <option value="7">Angola</option>
                                                                <option value="8">Antarctica</option>
                                                                <option value="9">Argentina</option>
                                                                <option value="10">American Samoa</option>
                                                                <option value="11">Austria</option>
                                                                <option value="12">Australia</option>
                                                                <option value="13">Aruba</option>
                                                                <option value="14">Aland Islands</option>
                                                                <option value="15">Azerbaijan</option>
                                                                <option value="16">Bosnia And Herzegovina</option>
                                                                <option value="17">Barbados</option>
                                                                <option value="18">Bangladesh</option>
                                                                <option value="19">Belgium</option>
                                                                <option value="20">Burkina Faso</option>
                                                                <option value="21">Bulgaria</option>
                                                                <option value="22">Bahrain</option>
                                                                <option value="23">Burundi</option>
                                                                <option value="24">Benin</option>
                                                                <option value="25">Bermuda</option>
                                                                <option value="26">Brunei</option>
                                                                <option value="27">Bolivia</option>
                                                                <option value="28">Bonaire, Saint Eustatius And
                                                                    Saba
                                                                </option>
                                                                <option value="29">Brazil</option>
                                                                <option value="30">Bahamas</option>
                                                                <option value="31">Bhutan</option>
                                                                <option value="32">Bouvet Island</option>
                                                                <option value="33">Botswana</option>
                                                                <option value="34">Belarus</option>
                                                                <option value="35">Belize</option>
                                                                <option value="36">Canada</option>
                                                                <option value="37">Democratic Republic Of The
                                                                    Congo
                                                                </option>
                                                                <option value="38">Central African Republic
                                                                </option>
                                                                <option value="39">Republic Of The Congo</option>
                                                                <option value="40">Switzerland</option>
                                                                <option value="41">Ivory Coast</option>
                                                                <option value="42">Chile</option>
                                                                <option value="43">Cameroon</option>
                                                                <option value="44">China</option>
                                                                <option value="45">Colombia</option>
                                                                <option value="46">Costa Rica</option>
                                                                <option value="47">Cuba</option>
                                                                <option value="48">Cape Verde</option>
                                                                <option value="49">Cyprus</option>
                                                                <option value="50">Czech Republic</option>
                                                                <option value="51">Germany</option>
                                                                <option value="52">Djibouti</option>
                                                                <option value="53">Denmark</option>
                                                                <option value="54">Dominica</option>
                                                                <option value="55">Dominican Republic</option>
                                                                <option value="56">Algeria</option>
                                                                <option value="57">Ecuador</option>
                                                                <option value="58">Estonia</option>
                                                                <option value="59">Egypt</option>
                                                                <option value="60">Western Sahara</option>
                                                                <option value="61">Eritrea</option>
                                                                <option value="62">Spain</option>
                                                                <option value="63">Ethiopia</option>
                                                                <option value="64">Finland</option>
                                                                <option value="65">Fiji</option>
                                                                <option value="66">Micronesia</option>
                                                                <option value="67">Faroe Islands</option>
                                                                <option value="68">France</option>
                                                                <option value="69">Gabon</option>
                                                                <option value="70">United Kingdom</option>
                                                                <option value="71">Grenada</option>
                                                                <option value="72">Georgia</option>
                                                                <option value="73">French Guiana</option>
                                                                <option value="74">Guernsey</option>
                                                                <option value="75">Ghana</option>
                                                                <option value="76">Greenland</option>
                                                                <option value="77">Gambia</option>
                                                                <option value="78">Guinea</option>
                                                                <option value="79">Guadeloupe</option>
                                                                <option value="80">Equatorial Guinea</option>
                                                                <option value="81">Greece</option>
                                                                <option value="82">Guatemala</option>
                                                                <option value="83">Guam</option>
                                                                <option value="84">Guinea-Bissau</option>
                                                                <option value="85">Guyana</option>
                                                                <option value="86">Hong Kong</option>
                                                                <option value="87">Honduras</option>
                                                                <option value="88">Croatia</option>
                                                                <option value="89">Haiti</option>
                                                                <option value="90">Hungary</option>
                                                                <option value="91">Indonesia</option>
                                                                <option value="92">Ireland</option>
                                                                <option value="93">Israel</option>
                                                                <option value="94">Isle Of Man</option>
                                                                <option value="95">India</option>
                                                                <option value="96">British Indian Ocean Territory
                                                                </option>
                                                                <option value="97">Iraq</option>
                                                                <option value="98">Iran</option>
                                                                <option value="99">Iceland</option>
                                                                <option value="100">Italy</option>
                                                                <option value="101">Jersey</option>
                                                                <option value="102">Jamaica</option>
                                                                <option value="103">Jordan</option>
                                                                <option value="104">Japan</option>
                                                                <option value="105">Kenya</option>
                                                                <option value="106">Kyrgyzstan</option>
                                                                <option value="107">Cambodia</option>
                                                                <option value="108">Kiribati</option>
                                                                <option value="109">Comoros</option>
                                                                <option value="110">Saint Kitts And Nevis</option>
                                                                <option value="111">North Korea</option>
                                                                <option value="112">South Korea</option>
                                                                <option value="113">Kuwait</option>
                                                                <option value="114">Kazakhstan</option>
                                                                <option value="115">Laos</option>
                                                                <option value="116">Lebanon</option>
                                                                <option value="117">Saint Lucia</option>
                                                                <option value="118">Liechtenstein</option>
                                                                <option value="119">Sri Lanka</option>
                                                                <option value="120">Liberia</option>
                                                                <option value="121">Lesotho</option>
                                                                <option value="122">Lithuania</option>
                                                                <option value="123">Luxembourg</option>
                                                                <option value="124">Latvia</option>
                                                                <option value="125">Libya</option>
                                                                <option value="126">Morocco</option>
                                                                <option value="127">Monaco</option>
                                                                <option value="128">Moldova</option>
                                                                <option value="129">Montenegro</option>
                                                                <option value="130">Madagascar</option>
                                                                <option value="131">Marshall Islands</option>
                                                                <option value="132">Macedonia</option>
                                                                <option value="133">Mali</option>
                                                                <option value="134">Myanmar</option>
                                                                <option value="135">Mongolia</option>
                                                                <option value="136">Macao</option>
                                                                <option value="137">Northern Mariana Islands
                                                                </option>
                                                                <option value="138">Martinique</option>
                                                                <option value="139">Mauritania</option>
                                                                <option value="140">Montserrat</option>
                                                                <option value="141">Mauritius</option>
                                                                <option value="142">Maldives</option>
                                                                <option value="143">Malawi</option>
                                                                <option value="144">Mexico</option>
                                                                <option value="145">Malaysia</option>
                                                                <option value="146">Mozambique</option>
                                                                <option value="147">Namibia</option>
                                                                <option value="148">New Caledonia</option>
                                                                <option value="149">Niger</option>
                                                                <option value="150">Nigeria</option>
                                                                <option value="151">Nicaragua</option>
                                                                <option value="152">Netherlands</option>
                                                                <option value="153">Norway</option>
                                                                <option value="154">Nepal</option>
                                                                <option value="155">Nauru</option>
                                                                <option value="156">New Zealand</option>
                                                                <option value="157">Oman</option>
                                                                <option value="158">Panama</option>
                                                                <option value="159">Peru</option>
                                                                <option value="160">French Polynesia</option>
                                                                <option value="161">Papua New Guinea</option>
                                                                <option value="162">Philippines</option>
                                                                <option value="163">Pakistan</option>
                                                                <option value="164">Poland</option>
                                                                <option value="165">Saint Pierre And Miquelon
                                                                </option>
                                                                <option value="166">Puerto Rico</option>
                                                                <option value="167">Palestinian Territory</option>
                                                                <option value="168">Portugal</option>
                                                                <option value="169">Palau</option>
                                                                <option value="170">Paraguay</option>
                                                                <option value="171">Qatar</option>
                                                                <option value="172">Reunion</option>
                                                                <option value="173">Romania</option>
                                                                <option value="174">Serbia</option>
                                                                <option value="175">Russia</option>
                                                                <option value="176">Rwanda</option>
                                                                <option value="177">Saudi Arabia</option>
                                                                <option value="178">Solomon Islands</option>
                                                                <option value="179">Seychelles</option>
                                                                <option value="180">Sudan</option>
                                                                <option value="181">Sweden</option>
                                                                <option value="182">Singapore</option>
                                                                <option value="183">Saint Helena</option>
                                                                <option value="184">Slovenia</option>
                                                                <option value="185">Svalbard And Jan Mayen</option>
                                                                <option value="186">Slovakia</option>
                                                                <option value="187">Sierra Leone</option>
                                                                <option value="188">San Marino</option>
                                                                <option value="189">Senegal</option>
                                                                <option value="190">Somalia</option>
                                                                <option value="191">Suriname</option>
                                                                <option value="192">South Sudan</option>
                                                                <option value="193">Sao Tome And Principe</option>
                                                                <option value="194">El Salvador</option>
                                                                <option value="195">Syria</option>
                                                                <option value="196">Swaziland</option>
                                                                <option value="197">Chad</option>
                                                                <option value="198">French Southern Territories
                                                                </option>
                                                                <option value="199">Togo</option>
                                                                <option value="200">Thailand</option>
                                                                <option value="201">Tajikistan</option>
                                                                <option value="202">Tokelau</option>
                                                                <option value="203">East Timor</option>
                                                                <option value="204">Turkmenistan</option>
                                                                <option value="205">Tunisia</option>
                                                                <option value="206">Tonga</option>
                                                                <option value="207">Turkey</option>
                                                                <option value="208">Trinidad And Tobago</option>
                                                                <option value="209">Tuvalu</option>
                                                                <option value="210">Taiwan</option>
                                                                <option value="211">Tanzania</option>
                                                                <option value="212">Ukraine</option>
                                                                <option value="213">Uganda</option>
                                                                <option value="214">United States Minor Outlying
                                                                    Islands
                                                                </option>
                                                                <option value="215">United States</option>
                                                                <option value="216">Uruguay</option>
                                                                <option value="217">Uzbekistan</option>
                                                                <option value="218">Saint Vincent And The
                                                                    Grenadines
                                                                </option>
                                                                <option value="219">Venezuela</option>
                                                                <option value="220">U.S. Virgin Islands</option>
                                                                <option value="221">Vietnam</option>
                                                                <option value="222">Vanuatu</option>
                                                                <option value="223">Wallis And Futuna</option>
                                                                <option value="224">Samoa</option>
                                                                <option value="225">Kosovo</option>
                                                                <option value="226">Yemen</option>
                                                                <option value="227">Mayotte</option>
                                                                <option value="228">South Africa</option>
                                                                <option value="229">Zambia</option>
                                                                <option value="230">Zimbabwe</option>
                                                            </select>
                                                            <div id="stateDivloader_adv"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                State living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a State"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="state_id_adv"
                                                                name="state_id[]">
                                                                <option value=""></option>
                                                            </select>
                                                            <div id="cityDivloader_adv"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                City living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a City"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="city_id_adv" name="city_id[]">
                                                                <option value=""></option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="gt-text-orange gt-border-bottom-smoke-white pb-15">
                                                    Education / Occupation / income Details </h4>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Education </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Education"
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" name="education[]">
                                                                <option value=""></option>
                                                                <option value="9">B Arch</option>
                                                                <option value="16">B Com</option>
                                                                <option value="15">B Phil</option>
                                                                <option value="10">B Plan</option>
                                                                <option value="12">B Tech</option>
                                                                <option value="60">B.Pharm</option>
                                                                <option value="17">BA</option>
                                                                <option value="67">Bachelor Of Law</option>
                                                                <option value="54">Bachelor Of Veterinary Science
                                                                </option>
                                                                <option value="52">BAMS</option>
                                                                <option value="25">BBA</option>
                                                                <option value="8">BCA</option>
                                                                <option value="48">BDS</option>
                                                                <option value="11">BE</option>
                                                                <option value="22">BEd</option>
                                                                <option value="18">BFA</option>
                                                                <option value="26">BFM (Financial Management)
                                                                </option>
                                                                <option value="66">BGL</option>
                                                                <option value="24">BHM</option>
                                                                <option value="50">BHMS</option>
                                                                <option value="19">BLIS</option>
                                                                <option value="21">BMM (MASS MEDIA)</option>
                                                                <option value="58">BPT</option>
                                                                <option value="13">BSc Computer Science</option>
                                                                <option value="14">BSc IT</option>
                                                                <option value="62">BSc Nursing</option>
                                                                <option value="20">BSW</option>
                                                                <option value="72">CA Final</option>
                                                                <option value="71">CA Inter</option>
                                                                <option value="75">CFA (Chartered Financial
                                                                    Analyst)
                                                                </option>
                                                                <option value="74">Company Secretary (CS)</option>
                                                                <option value="56">Degree In Medicine</option>
                                                                <option value="80">Diploma</option>
                                                                <option value="64">Diploma In Nursing</option>
                                                                <option value="47">DM - Doctorate Of Medicine
                                                                </option>
                                                                <option value="82">High School</option>
                                                                <option value="77">IAS</option>
                                                                <option value="73">ICWA</option>
                                                                <option value="78">IPS</option>
                                                                <option value="79">IRS</option>
                                                                <option value="83">Less Than High School</option>
                                                                <option value="68">LLB</option>
                                                                <option value="70">LLM</option>
                                                                <option value="28">M Arch</option>
                                                                <option value="35">M Com</option>
                                                                <option value="34">M Phil</option>
                                                                <option value="36">M Sc</option>
                                                                <option value="31">M Tech</option>
                                                                <option value="61">M.Pharm</option>
                                                                <option value="37">MA</option>
                                                                <option value="53">MAMS</option>
                                                                <option value="57">Master In Medicine</option>
                                                                <option value="69">Master Of Law</option>
                                                                <option value="55">Master Of Veterinary Science
                                                                </option>
                                                                <option value="41">MBA</option>
                                                                <option value="44">MBBS</option>
                                                                <option value="29">MCA</option>
                                                                <option value="46">MCh - Master Of Chirurgiae
                                                                </option>
                                                                <option value="45">MD / MS (Medical)</option>
                                                                <option value="49">MDS</option>
                                                                <option value="27">ME</option>
                                                                <option value="23">MEd</option>
                                                                <option value="65">Medical Laboratory Technology
                                                                </option>
                                                                <option value="43">MFM (Financial Management)
                                                                </option>
                                                                <option value="40">MHM</option>
                                                                <option value="51">MHMS</option>
                                                                <option value="38">MLIS</option>
                                                                <option value="59">MPT</option>
                                                                <option value="32">MSc Computer Science</option>
                                                                <option value="33">MSc IT</option>
                                                                <option value="63">MSc Nursing</option>
                                                                <option value="39">MSW</option>
                                                                <option value="84">Other Education</option>
                                                                <option value="30">PGDCA</option>
                                                                <option value="42">PGDM</option>
                                                                <option value="76">Ph D</option>
                                                                <option value="81">Polytechnic</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Occupation </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Occupation"
                                                                class="chosen-select gt-form-control" multiple
                                                                name="occupation[]">
                                                                <option value=""></option>
                                                                <option value="18">Civil Engineer</option>
                                                                <option value="19">Clerical Official</option>
                                                                <option value="20">Commercial Pilot</option>
                                                                <option value="21">Company Secretary</option>
                                                                <option value="22">Computer Professional</option>
                                                                <option value="23">Consultant</option>
                                                                <option value="24">Contractor</option>
                                                                <option value="25">Cost Accountant</option>
                                                                <option value="26">Creative Person</option>
                                                                <option value="27">Customer Support Professional
                                                                </option>
                                                                <option value="28">Defense Employee</option>
                                                                <option value="29">Dentist</option>
                                                                <option value="30">Designer</option>
                                                                <option value="31">Doctor</option>
                                                                <option value="32">Economist</option>
                                                                <option value="33">Engineer</option>
                                                                <option value="34">Engineer (Mechanical)</option>
                                                                <option value="35">Engineer (Project)</option>
                                                                <option value="36">Entertainment Professional
                                                                </option>
                                                                <option value="37">Event Manager</option>
                                                                <option value="38">Executive</option>
                                                                <option value="39">Factory worker</option>
                                                                <option value="40">Farmer</option>
                                                                <option value="41">Fashion Designer</option>
                                                                <option value="42">Finance Professional</option>
                                                                <option value="43">Flight Attendant</option>
                                                                <option value="44">Government Employee</option>
                                                                <option value="45">Health Care Professional
                                                                </option>
                                                                <option value="46">Home Maker</option>
                                                                <option value="47">Hotel & Restaurant Professional
                                                                </option>
                                                                <option value="48">Human Resources Professional
                                                                </option>
                                                                <option value="49">Interior Designer</option>
                                                                <option value="50">Investment Professional
                                                                </option>
                                                                <option value="51">IT / Telecom Professional
                                                                </option>
                                                                <option value="52">Journalist</option>
                                                                <option value="53">Lawyer</option>
                                                                <option value="54">Lecturer</option>
                                                                <option value="55">Legal Professional</option>
                                                                <option value="56">Manager</option>
                                                                <option value="57">Marketing Professional</option>
                                                                <option value="58">Media Professional</option>
                                                                <option value="59">Medical Professional</option>
                                                                <option value="60">Medical Transcriptionist
                                                                </option>
                                                                <option value="61">Merchant Naval Officer</option>
                                                                <option value="95">Not Working</option>
                                                                <option value="62">Nurse</option>
                                                                <option value="63">Occupational Therapist</option>
                                                                <option value="64">Optician</option>
                                                                <option value="94">Others</option>
                                                                <option value="65">Pharmacist</option>
                                                                <option value="66">Physician Assistant</option>
                                                                <option value="67">Physicist</option>
                                                                <option value="68">Physiotherapist</option>
                                                                <option value="69">Pilot</option>
                                                                <option value="70">Politician</option>
                                                                <option value="71">Production professional
                                                                </option>
                                                                <option value="72">Professor</option>
                                                                <option value="73">Psychologist</option>
                                                                <option value="74">Public Relations Professional
                                                                </option>
                                                                <option value="75">Real Estate Professional
                                                                </option>
                                                                <option value="76">Research Scholar</option>
                                                                <option value="78">Retail Professional</option>
                                                                <option value="77">Retired Person</option>
                                                                <option value="79">Sales Professional</option>
                                                                <option value="80">Scientist</option>
                                                                <option value="81">Self-employed Person</option>
                                                                <option value="82">Social Worker</option>
                                                                <option value="83">Software Consultant</option>
                                                                <option value="84">Sportsman</option>
                                                                <option value="85">Student</option>
                                                                <option value="86">Teacher</option>
                                                                <option value="87">Technician</option>
                                                                <option value="88">Training Professional</option>
                                                                <option value="89">Transportation Professional
                                                                </option>
                                                                <option value="90">Veterinary Doctor</option>
                                                                <option value="91">Volunteer</option>
                                                                <option value="92">Writer</option>
                                                                <option value="93">Zoologist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Annual Income </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Annual Income..."
                                                                class="chosen-select gt-form-control" multiple
                                                                name="annual_income[]">
                                                                <option value=""></option>
                                                                <option value="1">50,000</option>
                                                                <option value="2">1,00,000</option>
                                                                <option value="3">2,00,000</option>
                                                                <option value="4">3,00,000</option>
                                                                <option value="5">4,00,000</option>
                                                                <option value="6">5,00,000</option>
                                                                <option value="7">6,00,000</option>
                                                                <option value="8">7,00,000</option>
                                                                <option value="9">8,00,000</option>
                                                                <option value="10">9,00,000</option>
                                                                <option value="11">10,00,000</option>
                                                                <option value="12">11,00,000</option>
                                                                <option value="13">12,00,000</option>
                                                                <option value="14">13,00,000</option>
                                                                <option value="15">14,00,000</option>
                                                                <option value="16">15,00,000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="gt-text-orange gt-border-bottom-smoke-white pb-15">
                                                    Horoscope Details </h4>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Star </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Star..."
                                                                class="chosen-select gt-form-control flat" multiple
                                                                name="star[]">
                                                                <option value="">Does not matter</option>
                                                                <option value="1">Ashwini</option>
                                                                <option value="2">Bharani</option>
                                                                <option value="3">Krittika</option>
                                                                <option value="4">Rohini</option>
                                                                <option value="5">Mrigashira</option>
                                                                <option value="6">Ardra</option>
                                                                <option value="7">Punarvasu</option>
                                                                <option value="8">Pushya</option>
                                                                <option value="9">Ashlesha</option>
                                                                <option value="10">Magha</option>
                                                                <option value="11">Purva Phalguni</option>
                                                                <option value="12">Uttara Phalguni</option>
                                                                <option value="13">Hasta</option>
                                                                <option value="14">Chitra</option>
                                                                <option value="15">Swati</option>
                                                                <option value="17">Anuradha</option>
                                                                <option value="18">Jyeshtha</option>
                                                                <option value="19">Mula</option>
                                                                <option value="20">Purva Ashadha</option>
                                                                <option value="21">Uttara Ashadha</option>
                                                                <option value="22">Abhijit</option>
                                                                <option value="23">Shravana</option>
                                                                <option value="24">Dhanishta</option>
                                                                <option value="25">Shatabhisha</option>
                                                                <option value="26">Purva Bhadrapada</option>
                                                                <option value="27">Uttara Bhadrapada</option>
                                                                <option value="28">Revati</option>
                                                                <option value="30">Vishakha</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Have a dosh?
                                                            </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select class="gt-form-control flat" name="manglik">
                                                                <option value="">Does not matter</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Search Now" name="advance_sub"
                                                        class="btn gt-btn-green">
                                                    <a class="btn gt-btn-green gt-cursor"
                                                        href="saved-searches">Saved
                                                        Search</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Advance Search  -->
                                <!-- Keyword Search  -->
                                <div role="tabpanel" class="tab-pane " id="key-search">
                                    <div class="row">
                                        <div class="col-xxl-14 col-xxl-offset-1">
                                            <h3 class="inSearchTitle">
                                                Keyword Search </h3>
                                            <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                                With keyword search, you can get suitable profiles with specific
                                                keywords.
                                            </p>
                                            <form action="" id="baisc_search_form" method="post">
                                                <div class="form-group mt-15">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Keyword Search </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <input type="text" class="gt-form-control"
                                                                name="keyword">
                                                            <p class="text-muted ">
                                                                Example - First Name, Last Name, Email id.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Photo settings </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select class="gt-form-control flat"
                                                                name="photo_search">
                                                                <option value="">Does not matter</option>
                                                                <option value="Yes">With Photo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Search Now" name="keyword_sub"
                                                        class="btn gt-btn-green">
                                                    <a class="btn gt-btn-green gt-cursor"
                                                        href="saved-searches">Saved
                                                        Search</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Keyword Search  -->
                                <!-- Location Search  -->
                                <div role="tabpanel" class="tab-pane " id="loc-search">
                                    <div class="row">
                                        <div class="col-xxl-14 col-xxl-offset-1">
                                            <h3 class="inSearchTitle">
                                                Location Search </h3>
                                            <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                                With Location search, you can get suitable profiles from specific
                                                location or
                                                place.
                                            </p>
                                            <form action="" id="location_search_form" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Country living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Country..."
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="country_id_loc"
                                                                name="country_id[]">
                                                                <option value=""></option>
                                                                <option value="1">Andorra</option>
                                                                <option value="2">United Arab Emirates</option>
                                                                <option value="3">Afghanistan</option>
                                                                <option value="4">Antigua And Barbuda</option>
                                                                <option value="5">Albania</option>
                                                                <option value="6">Armenia</option>
                                                                <option value="7">Angola</option>
                                                                <option value="8">Antarctica</option>
                                                                <option value="9">Argentina</option>
                                                                <option value="10">American Samoa</option>
                                                                <option value="11">Austria</option>
                                                                <option value="12">Australia</option>
                                                                <option value="13">Aruba</option>
                                                                <option value="14">Aland Islands</option>
                                                                <option value="15">Azerbaijan</option>
                                                                <option value="16">Bosnia And Herzegovina</option>
                                                                <option value="17">Barbados</option>
                                                                <option value="18">Bangladesh</option>
                                                                <option value="19">Belgium</option>
                                                                <option value="20">Burkina Faso</option>
                                                                <option value="21">Bulgaria</option>
                                                                <option value="22">Bahrain</option>
                                                                <option value="23">Burundi</option>
                                                                <option value="24">Benin</option>
                                                                <option value="25">Bermuda</option>
                                                                <option value="26">Brunei</option>
                                                                <option value="27">Bolivia</option>
                                                                <option value="28">Bonaire, Saint Eustatius And
                                                                    Saba
                                                                </option>
                                                                <option value="29">Brazil</option>
                                                                <option value="30">Bahamas</option>
                                                                <option value="31">Bhutan</option>
                                                                <option value="32">Bouvet Island</option>
                                                                <option value="33">Botswana</option>
                                                                <option value="34">Belarus</option>
                                                                <option value="35">Belize</option>
                                                                <option value="36">Canada</option>
                                                                <option value="37">Democratic Republic Of The
                                                                    Congo
                                                                </option>
                                                                <option value="38">Central African Republic
                                                                </option>
                                                                <option value="39">Republic Of The Congo</option>
                                                                <option value="40">Switzerland</option>
                                                                <option value="41">Ivory Coast</option>
                                                                <option value="42">Chile</option>
                                                                <option value="43">Cameroon</option>
                                                                <option value="44">China</option>
                                                                <option value="45">Colombia</option>
                                                                <option value="46">Costa Rica</option>
                                                                <option value="47">Cuba</option>
                                                                <option value="48">Cape Verde</option>
                                                                <option value="49">Cyprus</option>
                                                                <option value="50">Czech Republic</option>
                                                                <option value="51">Germany</option>
                                                                <option value="52">Djibouti</option>
                                                                <option value="53">Denmark</option>
                                                                <option value="54">Dominica</option>
                                                                <option value="55">Dominican Republic</option>
                                                                <option value="56">Algeria</option>
                                                                <option value="57">Ecuador</option>
                                                                <option value="58">Estonia</option>
                                                                <option value="59">Egypt</option>
                                                                <option value="60">Western Sahara</option>
                                                                <option value="61">Eritrea</option>
                                                                <option value="62">Spain</option>
                                                                <option value="63">Ethiopia</option>
                                                                <option value="64">Finland</option>
                                                                <option value="65">Fiji</option>
                                                                <option value="66">Micronesia</option>
                                                                <option value="67">Faroe Islands</option>
                                                                <option value="68">France</option>
                                                                <option value="69">Gabon</option>
                                                                <option value="70">United Kingdom</option>
                                                                <option value="71">Grenada</option>
                                                                <option value="72">Georgia</option>
                                                                <option value="73">French Guiana</option>
                                                                <option value="74">Guernsey</option>
                                                                <option value="75">Ghana</option>
                                                                <option value="76">Greenland</option>
                                                                <option value="77">Gambia</option>
                                                                <option value="78">Guinea</option>
                                                                <option value="79">Guadeloupe</option>
                                                                <option value="80">Equatorial Guinea</option>
                                                                <option value="81">Greece</option>
                                                                <option value="82">Guatemala</option>
                                                                <option value="83">Guam</option>
                                                                <option value="84">Guinea-Bissau</option>
                                                                <option value="85">Guyana</option>
                                                                <option value="86">Hong Kong</option>
                                                                <option value="87">Honduras</option>
                                                                <option value="88">Croatia</option>
                                                                <option value="89">Haiti</option>
                                                                <option value="90">Hungary</option>
                                                                <option value="91">Indonesia</option>
                                                                <option value="92">Ireland</option>
                                                                <option value="93">Israel</option>
                                                                <option value="94">Isle Of Man</option>
                                                                <option value="95">India</option>
                                                                <option value="96">British Indian Ocean Territory
                                                                </option>
                                                                <option value="97">Iraq</option>
                                                                <option value="98">Iran</option>
                                                                <option value="99">Iceland</option>
                                                                <option value="100">Italy</option>
                                                                <option value="101">Jersey</option>
                                                                <option value="102">Jamaica</option>
                                                                <option value="103">Jordan</option>
                                                                <option value="104">Japan</option>
                                                                <option value="105">Kenya</option>
                                                                <option value="106">Kyrgyzstan</option>
                                                                <option value="107">Cambodia</option>
                                                                <option value="108">Kiribati</option>
                                                                <option value="109">Comoros</option>
                                                                <option value="110">Saint Kitts And Nevis</option>
                                                                <option value="111">North Korea</option>
                                                                <option value="112">South Korea</option>
                                                                <option value="113">Kuwait</option>
                                                                <option value="114">Kazakhstan</option>
                                                                <option value="115">Laos</option>
                                                                <option value="116">Lebanon</option>
                                                                <option value="117">Saint Lucia</option>
                                                                <option value="118">Liechtenstein</option>
                                                                <option value="119">Sri Lanka</option>
                                                                <option value="120">Liberia</option>
                                                                <option value="121">Lesotho</option>
                                                                <option value="122">Lithuania</option>
                                                                <option value="123">Luxembourg</option>
                                                                <option value="124">Latvia</option>
                                                                <option value="125">Libya</option>
                                                                <option value="126">Morocco</option>
                                                                <option value="127">Monaco</option>
                                                                <option value="128">Moldova</option>
                                                                <option value="129">Montenegro</option>
                                                                <option value="130">Madagascar</option>
                                                                <option value="131">Marshall Islands</option>
                                                                <option value="132">Macedonia</option>
                                                                <option value="133">Mali</option>
                                                                <option value="134">Myanmar</option>
                                                                <option value="135">Mongolia</option>
                                                                <option value="136">Macao</option>
                                                                <option value="137">Northern Mariana Islands
                                                                </option>
                                                                <option value="138">Martinique</option>
                                                                <option value="139">Mauritania</option>
                                                                <option value="140">Montserrat</option>
                                                                <option value="141">Mauritius</option>
                                                                <option value="142">Maldives</option>
                                                                <option value="143">Malawi</option>
                                                                <option value="144">Mexico</option>
                                                                <option value="145">Malaysia</option>
                                                                <option value="146">Mozambique</option>
                                                                <option value="147">Namibia</option>
                                                                <option value="148">New Caledonia</option>
                                                                <option value="149">Niger</option>
                                                                <option value="150">Nigeria</option>
                                                                <option value="151">Nicaragua</option>
                                                                <option value="152">Netherlands</option>
                                                                <option value="153">Norway</option>
                                                                <option value="154">Nepal</option>
                                                                <option value="155">Nauru</option>
                                                                <option value="156">New Zealand</option>
                                                                <option value="157">Oman</option>
                                                                <option value="158">Panama</option>
                                                                <option value="159">Peru</option>
                                                                <option value="160">French Polynesia</option>
                                                                <option value="161">Papua New Guinea</option>
                                                                <option value="162">Philippines</option>
                                                                <option value="163">Pakistan</option>
                                                                <option value="164">Poland</option>
                                                                <option value="165">Saint Pierre And Miquelon
                                                                </option>
                                                                <option value="166">Puerto Rico</option>
                                                                <option value="167">Palestinian Territory</option>
                                                                <option value="168">Portugal</option>
                                                                <option value="169">Palau</option>
                                                                <option value="170">Paraguay</option>
                                                                <option value="171">Qatar</option>
                                                                <option value="172">Reunion</option>
                                                                <option value="173">Romania</option>
                                                                <option value="174">Serbia</option>
                                                                <option value="175">Russia</option>
                                                                <option value="176">Rwanda</option>
                                                                <option value="177">Saudi Arabia</option>
                                                                <option value="178">Solomon Islands</option>
                                                                <option value="179">Seychelles</option>
                                                                <option value="180">Sudan</option>
                                                                <option value="181">Sweden</option>
                                                                <option value="182">Singapore</option>
                                                                <option value="183">Saint Helena</option>
                                                                <option value="184">Slovenia</option>
                                                                <option value="185">Svalbard And Jan Mayen</option>
                                                                <option value="186">Slovakia</option>
                                                                <option value="187">Sierra Leone</option>
                                                                <option value="188">San Marino</option>
                                                                <option value="189">Senegal</option>
                                                                <option value="190">Somalia</option>
                                                                <option value="191">Suriname</option>
                                                                <option value="192">South Sudan</option>
                                                                <option value="193">Sao Tome And Principe</option>
                                                                <option value="194">El Salvador</option>
                                                                <option value="195">Syria</option>
                                                                <option value="196">Swaziland</option>
                                                                <option value="197">Chad</option>
                                                                <option value="198">French Southern Territories
                                                                </option>
                                                                <option value="199">Togo</option>
                                                                <option value="200">Thailand</option>
                                                                <option value="201">Tajikistan</option>
                                                                <option value="202">Tokelau</option>
                                                                <option value="203">East Timor</option>
                                                                <option value="204">Turkmenistan</option>
                                                                <option value="205">Tunisia</option>
                                                                <option value="206">Tonga</option>
                                                                <option value="207">Turkey</option>
                                                                <option value="208">Trinidad And Tobago</option>
                                                                <option value="209">Tuvalu</option>
                                                                <option value="210">Taiwan</option>
                                                                <option value="211">Tanzania</option>
                                                                <option value="212">Ukraine</option>
                                                                <option value="213">Uganda</option>
                                                                <option value="214">United States Minor Outlying
                                                                    Islands
                                                                </option>
                                                                <option value="215">United States</option>
                                                                <option value="216">Uruguay</option>
                                                                <option value="217">Uzbekistan</option>
                                                                <option value="218">Saint Vincent And The
                                                                    Grenadines
                                                                </option>
                                                                <option value="219">Venezuela</option>
                                                                <option value="220">U.S. Virgin Islands</option>
                                                                <option value="221">Vietnam</option>
                                                                <option value="222">Vanuatu</option>
                                                                <option value="223">Wallis And Futuna</option>
                                                                <option value="224">Samoa</option>
                                                                <option value="225">Kosovo</option>
                                                                <option value="226">Yemen</option>
                                                                <option value="227">Mayotte</option>
                                                                <option value="228">South Africa</option>
                                                                <option value="229">Zambia</option>
                                                                <option value="230">Zimbabwe</option>
                                                            </select>
                                                            <div id="stateDivloader_loc"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                State living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a State..."
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="state_id_loc"
                                                                name="state_id[]">
                                                                <option value=""></option>
                                                            </select>
                                                            <div id="cityDivloader_loc"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                City living in </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a City..."
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" id="city_id_loc" name="city_id[]">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Photo settings </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select class="gt-form-control flat"
                                                                name="photo_search">
                                                                <option value="">Does not matter</option>
                                                                <option value="Yes">With Photo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Search Now" name="location_sub"
                                                        class="btn gt-btn-green">
                                                    <a class="btn gt-btn-green gt-cursor"
                                                        href="saved-searches">Saved
                                                        Search</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Location Search  -->
                                <!-- Occupation Search  -->
                                <div role="tabpanel" class="tab-pane " id="oct-search">
                                    <div class="row">
                                        <div class="col-xxl-14 col-xxl-offset-1">
                                            <h3 class="inSearchTitle">
                                                Occupation Search </h3>
                                            <p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle">
                                                With Occupation Search, you can get suitable profiles with specific type
                                                of
                                                occupation.
                                            </p>
                                            <form action="" id="ocp_search_form" method="post">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Education </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Education..."
                                                                class="chosen-select gt-form-control flat" multiple
                                                                tabindex="4" name="education[]">
                                                                <option value=""></option>
                                                                <option value="9">B Arch</option>
                                                                <option value="16">B Com</option>
                                                                <option value="15">B Phil</option>
                                                                <option value="10">B Plan</option>
                                                                <option value="12">B Tech</option>
                                                                <option value="60">B.Pharm</option>
                                                                <option value="17">BA</option>
                                                                <option value="67">Bachelor Of Law</option>
                                                                <option value="54">Bachelor Of Veterinary Science
                                                                </option>
                                                                <option value="52">BAMS</option>
                                                                <option value="25">BBA</option>
                                                                <option value="8">BCA</option>
                                                                <option value="48">BDS</option>
                                                                <option value="11">BE</option>
                                                                <option value="22">BEd</option>
                                                                <option value="18">BFA</option>
                                                                <option value="26">BFM (Financial Management)
                                                                </option>
                                                                <option value="66">BGL</option>
                                                                <option value="24">BHM</option>
                                                                <option value="50">BHMS</option>
                                                                <option value="19">BLIS</option>
                                                                <option value="21">BMM (MASS MEDIA)</option>
                                                                <option value="58">BPT</option>
                                                                <option value="13">BSc Computer Science</option>
                                                                <option value="14">BSc IT</option>
                                                                <option value="62">BSc Nursing</option>
                                                                <option value="20">BSW</option>
                                                                <option value="72">CA Final</option>
                                                                <option value="71">CA Inter</option>
                                                                <option value="75">CFA (Chartered Financial
                                                                    Analyst)
                                                                </option>
                                                                <option value="74">Company Secretary (CS)</option>
                                                                <option value="56">Degree In Medicine</option>
                                                                <option value="80">Diploma</option>
                                                                <option value="64">Diploma In Nursing</option>
                                                                <option value="47">DM - Doctorate Of Medicine
                                                                </option>
                                                                <option value="82">High School</option>
                                                                <option value="77">IAS</option>
                                                                <option value="73">ICWA</option>
                                                                <option value="78">IPS</option>
                                                                <option value="79">IRS</option>
                                                                <option value="83">Less Than High School</option>
                                                                <option value="68">LLB</option>
                                                                <option value="70">LLM</option>
                                                                <option value="28">M Arch</option>
                                                                <option value="35">M Com</option>
                                                                <option value="34">M Phil</option>
                                                                <option value="36">M Sc</option>
                                                                <option value="31">M Tech</option>
                                                                <option value="61">M.Pharm</option>
                                                                <option value="37">MA</option>
                                                                <option value="53">MAMS</option>
                                                                <option value="57">Master In Medicine</option>
                                                                <option value="69">Master Of Law</option>
                                                                <option value="55">Master Of Veterinary Science
                                                                </option>
                                                                <option value="41">MBA</option>
                                                                <option value="44">MBBS</option>
                                                                <option value="29">MCA</option>
                                                                <option value="46">MCh - Master Of Chirurgiae
                                                                </option>
                                                                <option value="45">MD / MS (Medical)</option>
                                                                <option value="49">MDS</option>
                                                                <option value="27">ME</option>
                                                                <option value="23">MEd</option>
                                                                <option value="65">Medical Laboratory Technology
                                                                </option>
                                                                <option value="43">MFM (Financial Management)
                                                                </option>
                                                                <option value="40">MHM</option>
                                                                <option value="51">MHMS</option>
                                                                <option value="38">MLIS</option>
                                                                <option value="59">MPT</option>
                                                                <option value="32">MSc Computer Science</option>
                                                                <option value="33">MSc IT</option>
                                                                <option value="63">MSc Nursing</option>
                                                                <option value="39">MSW</option>
                                                                <option value="84">Other Education</option>
                                                                <option value="30">PGDCA</option>
                                                                <option value="42">PGDM</option>
                                                                <option value="76">Ph D</option>
                                                                <option value="81">Polytechnic</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Occupation </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Occupation..."
                                                                class="chosen-select gt-form-control flat" multiple
                                                                name="occupation[]">
                                                                <option value=""></option>
                                                                <option value="18">Civil Engineer</option>
                                                                <option value="19">Clerical Official</option>
                                                                <option value="20">Commercial Pilot</option>
                                                                <option value="21">Company Secretary</option>
                                                                <option value="22">Computer Professional</option>
                                                                <option value="23">Consultant</option>
                                                                <option value="24">Contractor</option>
                                                                <option value="25">Cost Accountant</option>
                                                                <option value="26">Creative Person</option>
                                                                <option value="27">Customer Support Professional
                                                                </option>
                                                                <option value="28">Defense Employee</option>
                                                                <option value="29">Dentist</option>
                                                                <option value="30">Designer</option>
                                                                <option value="31">Doctor</option>
                                                                <option value="32">Economist</option>
                                                                <option value="33">Engineer</option>
                                                                <option value="34">Engineer (Mechanical)</option>
                                                                <option value="35">Engineer (Project)</option>
                                                                <option value="36">Entertainment Professional
                                                                </option>
                                                                <option value="37">Event Manager</option>
                                                                <option value="38">Executive</option>
                                                                <option value="39">Factory worker</option>
                                                                <option value="40">Farmer</option>
                                                                <option value="41">Fashion Designer</option>
                                                                <option value="42">Finance Professional</option>
                                                                <option value="43">Flight Attendant</option>
                                                                <option value="44">Government Employee</option>
                                                                <option value="45">Health Care Professional
                                                                </option>
                                                                <option value="46">Home Maker</option>
                                                                <option value="47">Hotel & Restaurant Professional
                                                                </option>
                                                                <option value="48">Human Resources Professional
                                                                </option>
                                                                <option value="49">Interior Designer</option>
                                                                <option value="50">Investment Professional
                                                                </option>
                                                                <option value="51">IT / Telecom Professional
                                                                </option>
                                                                <option value="52">Journalist</option>
                                                                <option value="53">Lawyer</option>
                                                                <option value="54">Lecturer</option>
                                                                <option value="55">Legal Professional</option>
                                                                <option value="56">Manager</option>
                                                                <option value="57">Marketing Professional</option>
                                                                <option value="58">Media Professional</option>
                                                                <option value="59">Medical Professional</option>
                                                                <option value="60">Medical Transcriptionist
                                                                </option>
                                                                <option value="61">Merchant Naval Officer</option>
                                                                <option value="95">Not Working</option>
                                                                <option value="62">Nurse</option>
                                                                <option value="63">Occupational Therapist</option>
                                                                <option value="64">Optician</option>
                                                                <option value="94">Others</option>
                                                                <option value="65">Pharmacist</option>
                                                                <option value="66">Physician Assistant</option>
                                                                <option value="67">Physicist</option>
                                                                <option value="68">Physiotherapist</option>
                                                                <option value="69">Pilot</option>
                                                                <option value="70">Politician</option>
                                                                <option value="71">Production professional
                                                                </option>
                                                                <option value="72">Professor</option>
                                                                <option value="73">Psychologist</option>
                                                                <option value="74">Public Relations Professional
                                                                </option>
                                                                <option value="75">Real Estate Professional
                                                                </option>
                                                                <option value="76">Research Scholar</option>
                                                                <option value="78">Retail Professional</option>
                                                                <option value="77">Retired Person</option>
                                                                <option value="79">Sales Professional</option>
                                                                <option value="80">Scientist</option>
                                                                <option value="81">Self-employed Person</option>
                                                                <option value="82">Social Worker</option>
                                                                <option value="83">Software Consultant</option>
                                                                <option value="84">Sportsman</option>
                                                                <option value="85">Student</option>
                                                                <option value="86">Teacher</option>
                                                                <option value="87">Technician</option>
                                                                <option value="88">Training Professional</option>
                                                                <option value="89">Transportation Professional
                                                                </option>
                                                                <option value="90">Veterinary Doctor</option>
                                                                <option value="91">Volunteer</option>
                                                                <option value="92">Writer</option>
                                                                <option value="93">Zoologist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-xl-6">
                                                            <label class="mt-10">
                                                                Annual Income </label>
                                                        </div>
                                                        <div class="col-xxl-10 col-xl-10">
                                                            <select data-placeholder="Choose a Annual Income..."
                                                                class="chosen-select gt-form-control" multiple
                                                                name="annual_income[]">
                                                                <option value=""></option>
                                                                <option value="1">50,000</option>
                                                                <option value="2">1,00,000</option>
                                                                <option value="3">2,00,000</option>
                                                                <option value="4">3,00,000</option>
                                                                <option value="5">4,00,000</option>
                                                                <option value="6">5,00,000</option>
                                                                <option value="7">6,00,000</option>
                                                                <option value="8">7,00,000</option>
                                                                <option value="9">8,00,000</option>
                                                                <option value="10">9,00,000</option>
                                                                <option value="11">10,00,000</option>
                                                                <option value="12">11,00,000</option>
                                                                <option value="13">12,00,000</option>
                                                                <option value="14">13,00,000</option>
                                                                <option value="15">14,00,000</option>
                                                                <option value="16">15,00,000</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="submit" value="Search Now" name="occupation_sub"
                                                        class="btn gt-btn-green">
                                                    <a class="btn gt-btn-green gt-cursor"
                                                        href="saved-searches">Saved
                                                        Search</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Occupation Search  -->
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function save_search() {
                            $('#txt_saved_search_name').val('');
                            $("#div_saved_search").show();
                            $("#div_success").hide();
                        }
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
                                    <i class="fa fa-star gt-text-blue gt-margin-right-10"></i>Spotlight Profile
                                </h4>
                                <p>Blue Header profile is are spotlight profile which was showing top of the search
                                    result.Its
                                    gives 10 times faster results.</p>
                                <p>
                                    <span style="color:red;">
                                        <b>1</b>
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
                                <form name="saved_search_form" id="saved_search_form" method="post"
                                    action="">
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
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\search-result-component.blade.php ENDPATH**/ ?>