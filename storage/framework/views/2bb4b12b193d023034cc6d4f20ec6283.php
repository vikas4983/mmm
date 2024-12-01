<div class="gt-panel gt-panel-default" id="editAboutFamilySection">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-users"></i>About Family</span>
        <a class="pull-right btn gt-btn-orange" id="editAboutFamilyBtn">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            <div
                class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <article>
                    <p id="userAboutFamily" class="gt-word-wrap">
                        <?php echo e($user->familyDetails->about_family); ?>

                    </p>
                </article>
            </div>
            <div
                class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <h5 class="text-center inViewApproveStripe">
                    Approval Status:&nbsp;Pending
                </h5>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/view-family-details-component.blade.php ENDPATH**/ ?>