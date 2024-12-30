<div class="gt-panel gt-panel-default" id="editCarrierSection">
    <div class="gt-panel-head">
        <span class="pull-left">
            <i class="fa fa-book"></i>Carrier Information
        </span>
        <a class="pull-right btn gt-btn-orange" id="editCarrierBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">EDIT</font>
        </a>
    </div>

    <div class="gt-panel-body">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Education :
                    </div>
                    <div class="col-xs-10">
                        <b id="userEducation">
                            {{ $user->carrierDetails->educations->education ?? 'NA' }}
                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Employed in :
                    </div>
                    <div class="col-xs-10">
                        <b id="userEmployee">
                            {{ $user->carrierDetails->employees->employee ?? '' }}
                        </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Occupation :
                    </div>
                    <div class="col-xs-10">
                        <b id="userOccupation">
                            {{ $user->carrierDetails->occupations->occupation ?? 'NA' }}
                        </b>
                    </div>
                </div>
            </div>

            
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Annual Income :
                    </div>
                    <div class="col-xs-10">
                        <b id="userIncome">
                            {{ $user->carrierDetails->incomes->income ?? '' }} </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Orgnaization Name :
                    </div>
                    <div class="col-xs-10">
                        <b id="userOrganizationName">
                            {{ $user->carrierDetails->organization_name ?? '' }} </b>
                    </div>
                </div>
            </div>


            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        School Name :
                    </div>
                    <div class="col-xs-10">
                        <b id="userSchoolName">

                            {{ $user->carrierDetails->school_name ?? '' }} </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Collage Name :
                    </div>
                    <div class="col-xs-10">
                        <b id="userCollegeName">

                            {{ $user->carrierDetails->college_name ?? '' }} </b>
                    </div>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">
                        Interested In Abroad :
                    </div>
                    <div class="col-xs-10">
                        <b id="userInterestedAbroad">

                            {{ $user->carrierDetails->interested_abroad ?? '' }} </b>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
