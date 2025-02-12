@extends('layouts.frontend.main-master')
@section('title', 'Mangal Mandap - Profile')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xxl-14 col-xxl-offset-1 col-xl-16 col-xl-offset-0 col-lg-16 col-md-16 col-sm-16">
                <h3 class="gt-text-orange">
                    {{ $prefix->name ?? 'NA' }}{{ $profile->matrimony_id ?? '' }} -
                    {{ $profile->name ?? '' }} </h3>
            </div>
        </div>
    </div>
    <div id="loaderID"></div>
    <div class="container gt-view-profile gt-margin-top-15">
        <div class="row">
            <div class="col-xxl-14 col-xxl-offset-1 col-xl-16 col-xl-offset-0 col-lg-16 col-md-16 col-sm-16">
                <div class="row">
                    <div
                        class="col-xxl-4 col-xxl-offset-0 col-xl-4 col-xl-offset-0 col-xs-16 col-sm-16 col-md-8 col-md-offset-4 col-lg-4 col-lg-offset-0">
                        <a class="thumbnail gt-cursor gt-margin-bottom-0" data-toggle="modal" data-target="#myModal5"
                            onClick="photoview('MM11');">
                            <img src="my_photos/watermark.php?image=1695554242.png&watermark=watermark.png"
                                class="img-responsive gtFullWidth" title="shubhi khanna" title="shubhi khanna"
                                alt="MM11">

                            @if (isset($profile->images))
                                @foreach ($profile->images as $image)
                                    @if ($image->dp_image === '1')
                                        <img src="{{ asset('storage/users/images/' . $image->name) }}"
                                            class="img-responsive gtFullWidth" alt="User Image" style="height: 100px; width: auto;">
                                    @else
                                        <img src="{{ $profile->gender === 'male'
                                            ? asset('storage/users/images/male-default.jpg')
                                            : asset('storage/users/images/female-default.jpg') }}"
                                            class="img-responsive gtFullWidth" alt="User Image" style="height: 100px; width: auto;">
                                    @endif
                                @endforeach
                            @else
                                <img src="{{ $profile->gender === 'male'
                                    ? asset('storage/users/images/male-default.jpg')
                                    : asset('storage/users/images/female-default.jpg') }}"
                                    class="img-responsive gtFullWidth" alt="User Image" style="height: 100px; width: auto;">
                            @endif

                            <span class="gtMemAlbum">
                                1 </span>
                        </a>
                    </div>
                    <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-lg-12">
                        <div class="gt-panel gt-panel-default">
                            <div class="gt-panel-head">
                                <span class="pull-left">
                                    <i class="fa fa-file"></i>Basic Details </span>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7">Name:</div>
                                            <div class="col-xs-9">
                                                <b>{{ $profile->name ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> Marital Status: </div>
                                            <div class="col-xs-9">
                                                <b>
                                                    {{ $profile->basicDetails->maritalStatus->name ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> No Of Children: </div>
                                            <div class="col-xs-9">
                                                <b>
                                                    {{ $profile->basicDetails->children ?? '' }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> Children Living Status: </div>
                                            <div class="col-xs-9">
                                                <b>
                                                    {{ $profile->basicDetails->children ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> Mother Tongue : </div>
                                            <div class="col-xs-9">

                                                <b>
                                                    {{ $profile->basicDetails->motherTongues->name ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <div class="row">
                                            <div class="col-xs-7"> Profile Created By : </div>
                                            <div class="col-xs-9">
                                                <b>
                                                    {{ $profile->profile_for ?? '' }} </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gt-panel gt-panel-default gt-margin-top-10">
                            <div class="gt-panel-head">
                                <span class="pull-left">
                                    <i class="fa fa-star"></i>About Me </span>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    <div
                                        class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <article>
                                            <p style="word-wrap: break-word;">
                                                {{ $profile->carrierDetails->about_me ?? '' }}</p>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group btn-group-justified gt-margin-bottom-15 gtMemProfileBtn" role="group">
                    <div class="btn-group" role="group">
                        <button type="button" data-toggle="modal" data-target="#myModal1" title="Send Interest"
                            onclick="ExpressInterest('MM11')" class="gt-cursor btn btn-default"> <i class="fa fa-heart"></i>
                            <p class="hidden-xs hidden-sm hidden-md"> Send Express Interest </p>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" data-toggle="modal" data-target="#myModal2" title="View Contact Details"
                            onClick="checkcontactcount('MM11')" class="gt-cursor btn btn-default"> <i
                                class="fas fa-phone-alt"></i>
                            <p class="hidden-xs hidden-sm hidden-md"> View Contact Details </p>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="composeMessages?user_id=MM11 " class="btn btn-default"> <i class="fa fa-envelope"></i>
                            <p class="hidden-xs hidden-sm hidden-md"> Send Personal Message </p>
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        <a class="btn btn-default gt-cursor addToshort-data" id="MM11" title="Add to Blocklist">
                            <i class="fa fa-ban"></i>
                            <p class="hidden-xs hidden-sm hidden-md"> Add to Blocklist </p>
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        <a class="btn btn-default gt-cursor addToshort-link" id="MM11" title="Add to Shortlist">
                            <i class="fa fa-sort"></i>
                            <p class="hidden-xs hidden-sm hidden-md"> Add to Shortlist </p>
                        </a>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fas fa-running"></i>Physical Attributes </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Height : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->heights->name ?? '' }}

                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Weight : </div>
                                    <div class="col-xs-10">
                                        <b> {{ $profile->lifestyleDetails->weight ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Body type : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->bodyTypes->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Complexion : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->complextions->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Physical status : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->physicalStatus->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Blood Group : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->bloodgroups->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Blood Group : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->bloodgroups->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Hiv+ : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->hiv ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Own House : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->own_house ?? 'NA' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Own Car : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->own_car ?? 'NA' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-book"></i>Religion Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Religion : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->religions->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Caste : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->castes->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Willing To marry in other caste? : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->basicDetails->other_caste_marriage ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Speak Language : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->speaklanguages->name ?? 'NA' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-university"></i>Education / Profession Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Highest Education : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->educations->education ?? '' }}
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Additional Degree : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            MCA
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Employed in : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->employees->employee ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Occupation : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->occupations->occupation ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Annual Income : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->incomes->income ?? '' }}

                                        </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-users"></i>Family Details </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Family Type : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->familyTypes->name ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Family Status : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->familystatus->name ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Family Value : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->familyValues->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Father Occupation : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->fatherOccupations->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Mother Occupation : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->motherOccupations->name ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> No. of Brothers : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->brother ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Married Brothers : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->brother_married ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> No. of Sisters : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->sister ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Married Sisters : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->familydetails->sister_married ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fas fa-moon"></i>Horoscope Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Manglik : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->horoscopeDetails->manglik ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Star : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->horoscopeDetails->rashies->name ?? '' }}

                                        </b>
                                    </div>
                                </div>
                            </div>
                            {{-- <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Moonsign : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            N/A

                                        </b>
                                    </div>
                                </div>
                            </div> --}}
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Birth Time : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->horoscopeDetails->time_of_birth ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Birth Place : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->horoscopeDetails->place_of_birth ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-map-marker"></i>Location Information </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Country : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->countries->country ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> State : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->states->state ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> City : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->carrierDetails->cities->city ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fas fa-utensils"></i>Habits And Hobbies </span>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Eating Habits : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->dietary_habit ?? '' }} </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Drinking Habits : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->drinking_habit ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6"> Smoking Habits : </div>
                                    <div class="col-xs-10">
                                        <b>
                                            {{ $profile->lifestyleDetails->smoking_habit ?? '' }}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 inPartnerDivider">
                    <div class="row">
                        <h4 class="text-center gt-bg-green pt-15 pb-15">
                            <i class="fas fa-heart gt-margin-right-10"></i>Partner Preference
                        </h4>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 col-xl-16">
                    <div class="row">
                        <div class="col-xs-3">

                            <img src="my_photos/watermark.php?image=1695538456.jpg&watermark=watermark.png"
                                title="Surbhi Sharma" alt="MM2" class="img-thumbnail">
                        </div>
                        <div class="col-xs-10 text-center gt-margin-top-30">
                            <h4>
                                Your profile matches with <b>3 / 19</b> of <b class="gt-text-orange">shubhi's</b>
                                preferences!
                            </h4>
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-primary btn-lg thumbnail" data-toggle="modal" data-target="#myModal5"
                                onClick="photoview('MM11');">
                                <img src="my_photos/watermark.php?image=1695554242.png&watermark=watermark.png"
                                    class="img-responsive gtFullWidth" title="shubhi khanna" title="shubhi khanna"
                                    alt="MM11">



                                <span class="gtMemAlbum">
                                    1 </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-file gt-margin-right-10 gt-text-orange"></i>Basic Preferences
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13">
                                    <b>Marital Status :</b>
                                </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style="">
                                    <i class="fa fa-check gt-text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Age :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                35&nbsp;&nbsp;Years &nbsp;&nbsp;&nbsp;&nbsp;To &nbsp;&nbsp;&nbsp;&nbsp;
                                47&nbsp;&nbsp;Years
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-match" style="">
                                    <i class="fa fa-check gt-text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13">
                                    <b>Height :</b>
                                </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                4ft 8in - 142cm &nbsp;&nbsp;&nbsp;&nbsp;To &nbsp;&nbsp;&nbsp;&nbsp;
                                4ft 9in - 144cm
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style="">
                                    <i class="fa fa-check gt-text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13">
                                    <b>Eating Habits :</b>
                                </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"><b>Smoking Habits :</b></label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Drinking Habits :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Physical status :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-university gt-margin-right-10 gt-text-orange"></i>Education /
                        Profession Preference
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Education :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Annual Income:</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">

                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Employed in :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Occupation :</b> </label>
                            </div>
                            <div class="col-xxl-8 col-xs-11 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-book gt-margin-right-10 gt-text-orange"></i>Religion Preference
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Religion :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""><i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Caste :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b> :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Mother Tongue :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>Star :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                Not Available
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-map-marker gt-margin-right-10 gt-text-orange"></i>Location
                        Preference
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"><b>Country :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                            </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>State :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-8 col-xs-16">
                            <div class="col-xxl-6 col-xs-5 pt-5">
                                <label class="font-13"> <b>City :</b> </label>
                            </div>
                            <div class="col-xxl-8 font-13 pt-10 inThemeGreen">
                                No </div>
                            <div class="col-xxl-2">
                                <div class="check-circle gt-pref-not-match" style=""> <i
                                        class="fa fa-check gt-text-white"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-16 col-xxl-16 gt-margin-top-15">
                    <h3 class="pb-15 inBorderExtraLightGrey font-15">
                        <i class="fa fa-star gt-margin-right-10 gt-text-orange"></i>Partner Expectation
                    </h3>
                    <div class="row gt-margin-top-20 inMemPartnerPrefDet">
                        <div class="col-xxl-16 col-xs-16">
                            <div class="col-xxl-3 col-xs-5 pt-5">
                                <label class="font-13"> <b>Expectations :</b> </label>
                            </div>
                            <div class="col-xxl-13 col-xs-11 font-13 pt-10 inThemeGreen">
                                <p style="word-wrap: break-word;">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- For Photo Album Display--->
    <!-- For Photo Album Display--->
    <div class="container gt-margin-top-10">
    </div>
@endsection
