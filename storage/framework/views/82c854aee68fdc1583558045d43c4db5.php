<div class="gt-panel gt-panel-default" id="editHoroscopeSection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Horoscope Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editHoroscopeBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>
    
    <div class="gt-panel-body">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        DOB:
                    </div>
                    <div class="col-xs-10">
                        <b id="userDob">
                            <?php echo e($user->basicDetails->dob ?? 'NA'); ?>

                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Manglik:
                    </div>
                    <div class="col-xs-10">
                        <b id="userManglik">
                            <?php echo e($user->horoscopeDetails->manglik ?? 'NA'); ?>

                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Raasi/Moonsign :
                    </div>
                    <div class="col-xs-10">
                        <b id="userRashi">
                            <?php echo e($user->horoscopeDetails->rashies->name ?? ''); ?>

                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Birth Time :
                    </div>
                    <div class="col-xs-10">
                        <b id="userBirthTime">
                            <?php echo e($user->horoscopeDetails->time_of_birth ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Birth Place :
                    </div>
                    <div class="col-xs-10">
                        <b id="userPlaceOfBirth">
                            <?php echo e($user->horoscopeDetails->cities->city ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Horoscope Match? :
                    </div>
                    <div class="col-xs-10">
                        <b id="userHoroscopeMatch">
                            <?php echo e($user->horoscopeDetails->horoscope_match ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Horoscope Show? :
                    </div>
                    <div class="col-xs-10">
                        <b id="userHoroscopeShow">
                            
                            <?php echo e($user->horoscopeDetails->horoscope_show ?? ''); ?> </b>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\view-horoscope-details-component.blade.php ENDPATH**/ ?>