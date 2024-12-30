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
                            {{$user->familyDetails->fatherOccupations->name ?? ''}} </b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Mother  Occupation :</div>
                    <div class="col-xs-10">
                        <b id="userMotherOccupation">
                            {{$user->familyDetails->motherOccupations->name ?? ''}} </b>
                    </div>
                </div>
            </div>
            <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">No. of Brothers :</div>
                <div class="col-xs-10">
                    <b id="userBrother">
                        {{$user->familyDetails->brother ?? ''}}  </b>
                </div>
            </div>
        </div>
        <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">Married Brothers :</div>
                <div class="col-xs-10">
                    <b id="userBrotherMarried">
                        {{$user->familyDetails->brother_married ?? ''}} </b>
                </div>
            </div>
        </div>
        <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">No. of Sisters :</div>
                <div class="col-xs-10">
                    <b id="userSister">
                        {{$user->familyDetails->sister ?? ''}}</b>
                </div>
            </div>
        </div>
        <div
            class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
            <div class="row">
                <div class="col-xs-6">Married Sisters :</div>
                <div class="col-xs-10">
                    <b id="userSisterMarried">
                        {{$user->familyDetails->sister_married ?? ''}} </b>
                </div>
            </div>
        </div>
           <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Family Type :</div>
                    <div class="col-xs-10">
                        <b id="userFamilyType">
                            {{$user->familyDetails->familyTypes->name ?? ''}} </b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Family Status :</div>
                    <div class="col-xs-10">
                        <b  id="userFamilyStatus">
                            {{$user->familyDetails->familyStatus->name ?? ''}} </b>
                    </div>
                </div>
            </div>
    
    
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Family Value :</div>
                    <div class="col-xs-10">
                        <b id="userFamilyValue">
                            {{$user->familyDetails->familyValues->name ?? ''}}</b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Father Gotra :</div>
                    <div class="col-xs-10">
                        <b id="userFatherGotra">
                            {{$user->familyDetails->father_gotra ?? ''}} </b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Mother Gotra :</div>
                    <div class="col-xs-10">
                        <b id="userMotherGotra">
                            {{$user->familyDetails->mother_gotra ?? ''}} </b>
                    </div>
                </div>
            </div>
            
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Location :</div>
                    <div class="col-xs-10">
                     
                        <b id="userFamilyLocation">
                          
                            {{ $user->familyDetails->familyCity->city ?? '' }} ({{$user->familyDetails->familyState->state ?? ''}})</b>
                    </div>
                </div>
            </div>
            <div
                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <div class="row">
                    <div class="col-xs-6">Address :</div>
                    <div class="col-xs-10">
                        <b id="userFamilyAddress">
                            {{$user->familyDetails->contact_address ?? ''}}  </b>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>





















