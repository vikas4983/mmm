<div class="gt-panel gt-panel-default" id="editUserFamilySection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Family Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editUserFamilyBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Father  Occupation :</div>
                    <div class="col-xs-10">
                        <b id="userFatherOccupation">
                            <?php echo e($user->familyDetails->fatherOccupations->name ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Mother  Occupation :</div>
                    <div class="col-xs-10">
                        <b id="userMotherOccupation">
                            <?php echo e($user->familyDetails->motherOccupations->name ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">No. of Brothers :</div>
                <div class="col-xs-10">
                    <b id="userBrother">
                        <?php echo e($user->familyDetails->brother ?? ''); ?>  </b>
                </div>
            </div>
        </div>
        <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">Married Brothers :</div>
                <div class="col-xs-10">
                    <b id="userBrotherMarried">
                        <?php echo e($user->familyDetails->brother_married ?? ''); ?> </b>
                </div>
            </div>
        </div>
        <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">No. of Sisters :</div>
                <div class="col-xs-10">
                    <b id="userSister">
                        <?php echo e($user->familyDetails->sister ?? ''); ?></b>
                </div>
            </div>
        </div>
        <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">Married Sisters :</div>
                <div class="col-xs-10">
                    <b id="userSisterMarried">
                        <?php echo e($user->familyDetails->sister_married ?? ''); ?> </b>
                </div>
            </div>
        </div>
           <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Family Type :</div>
                    <div class="col-xs-10">
                        <b id="userFamilyType">
                            <?php echo e($user->familyDetails->familyTypes->name ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Family Status :</div>
                    <div class="col-xs-10">
                        <b  id="userFamilyStatus">
                            <?php echo e($user->familyDetails->familyStatus->name ?? ''); ?> </b>
                    </div>
                </div>
            </div>
    
    
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Family Value :</div>
                    <div class="col-xs-10">
                        <b id="userFamilyValue">
                            <?php echo e($user->familyDetails->familyValues->name ?? ''); ?></b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Father Gotra :</div>
                    <div class="col-xs-10">
                        <b id="userFatherGotra">
                            <?php echo e($user->familyDetails->father_gotra ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Mother Gotra :</div>
                    <div class="col-xs-10">
                        <b id="userMotherGotra">
                            <?php echo e($user->familyDetails->mother_gotra ?? ''); ?> </b>
                    </div>
                </div>
            </div>
            
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Location :</div>
                    <div class="col-xs-10">
                     
                        <b id="userFamilyLocation">
                          
                            <?php echo e($user->familyDetails->familyCity->city ?? ''); ?> (<?php echo e($user->familyDetails->familyState->state ?? ''); ?>)</b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Address :</div>
                    <div class="col-xs-10">
                        <b id="userFamilyAddress">
                            <?php echo e($user->familyDetails->contact_address ?? ''); ?>  </b>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>





















<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/view-user-family-details-component.blade.php ENDPATH**/ ?>