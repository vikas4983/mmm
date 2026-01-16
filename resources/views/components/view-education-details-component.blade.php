<div class="gt-panel gt-panel-default" id="editAboutEducationSection">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-graduation-cap"></i>About Education</span>
        <a class="pull-right btn gt-btn-orange" id="editAboutEducationBtn">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <article>
                    <p id="userEducationDetails" class="gt-word-wrap">
                        {{ $user->carrierDetails->education_detail }}
                    </p>
                </article>
            </div>
            <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <h5 class="text-center inViewApproveStripe">
                    Approval Status:&nbsp;Pending
                </h5>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->

