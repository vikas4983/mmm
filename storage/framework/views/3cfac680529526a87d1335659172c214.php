


    <div class="gt-panel gt-panel-default" id="editBasicSection">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-book"></i>Basic Information</span>
        <a class="pull-right btn gt-btn-orange" id="editBasic">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>
    <div class="gt-panel-body">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Height :
                    </div>
                    <div class="col-xs-10">

                        <b id="userHeight"><?php echo e($user->basicDetails->heights->name ?? 'NA'); ?></b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Mother Tongue :
                    </div>
                    <div class="col-xs-10">
                        <b id="userMotherTongue"> <?php echo e($user->basicDetails->motherTongues->name ?? 'NA'); ?>

                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Religion :
                    </div>
                    <div class="col-xs-10">

                        <b id="userReligion">
                            <?php echo e($user->basicDetails->religions->name ?? 'NA'); ?>

                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Caste :
                    </div>
                    <div class="col-xs-10">
                        <b id="userCaste"><?php echo e($user->basicDetails->castes->name ?? 'NA'); ?></b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Marital Status :
                    </div>
                    <div class="col-xs-10">
                        <b id="userMaritalStatus"><?php echo e($user->basicDetails->maritalStatus->name ?? 'NA'); ?></b>
                    </div>
                </div>
            </div>

            <?php if(isset($user->basicDetails) && $user->basicDetails->marital_status === '1'): ?>
            <?php else: ?>
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                    <div class="row">
                        <div class="col-xs-6">
                            Children:
                        </div>
                        <div class="col-xs-10">

                            <b id="userChildren"><?php echo e($user->basicDetails->children); ?></b>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-10">
                        Willing To marry in other caste? :
                    </div>
                    <div class="col-xs-5">
                       
                        <b id="userOtherCasteMarrige"><?php echo e($user->basicDetails->other_caste_marriage ?? ''); ?></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\view-basic-details-component.blade.php ENDPATH**/ ?>