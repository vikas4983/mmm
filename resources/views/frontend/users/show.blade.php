@extends('layouts.frontend.main-master')
@section('title', 'My Profile - Mangal mandap')
@section('content')
    <script>
        function notification(noti_id) {
            $.ajax({
                url: "web-services/notification",
                type: "POST",
                data: "noti_id=" + noti_id,
                cache: false,
                success: function(response) {
                    location.reload();
                }
            });
            return true;
        }
    </script>
    <div class="container">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="row">
            <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 mb-20 text-center">
                <h2 class="inPageTitle fontMerriWeather inThemeOrange">My Profile</h2>
                <p class="inPageSubTitle">This is your all profile detail which you added.You can view your
                    all details and also can edit all your detail from here.</p>
            </div>
            <div class="col-xxl-16 col-xs-16 gt-margin-bottom-20">
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-times-circle"></i>
                    </button>
                    <article>
                        Edit your profile details is very easy just click on the left pencil button ( <i
                            class="fas fa-pen-square gt-margin-left-5 gt-margin-right-5 font-18"></i> ) and
                        here we go. You can edit your profile detail </article>
                </div>
            </div>
        </div>
    </div>
     @dump(session()->all())
    <div class="container gt-view-profile">
        <div class="row">
            <div class="col-xxl-3 col-xl-4 col-xs-16 col-sm-16">
                <div class="thumbnail gt-margin-bottom-0">
                    @foreach ($user->images as $image)
                        @if ($image->dp_image === '1')
                            <img src="{{ isset($image->name) && $image->name ? asset('storage/users/images/' . $image->name) : ($user->gender == 'male' ? asset('storage/users/images/male-default.jpg') : asset('storage/users/images/female-default.jpg')) }}"
                                class="img-responsive gtFullWidth" alt="User Image">
                        @endif
                    @endforeach
                    @if ($user->images->isEmpty())
                        <img src="{{ $user->gender == 'male'
                            ? asset('storage/users/images/male-default.jpg')
                            : asset('storage/users/images/female-default.jpg') }}"
                            class="img-responsive gtFullWidth" alt="User Image">
                    @endif
                    <a href="{{ route('my.photos') }}" class="gt-view-caption">
                        Edit Profile Picture </a>
                </div>
                <!-- Modal more photos -->
                <div class="modal fade" id="morePhotos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-16 col-xxl-10 col-xxl-offset-3">
                                        <div id="viewMorePhotos" class="owl-carousel gtImageUpload owl-theme"
                                            style="opacity: 0; display: block;">
                                            <div class="owl-wrapper-outer">
                                                <div class="owl-wrapper" style="width: 200px; left: 0px; display: block;">
                                                    <div class="owl-item" style="width: 100px;">
                                                        <div class="item">
                                                            <a
                                                                href="https://matrimonialphpscript.com/premium-demo-2/view-profile">
                                                                <img src="./Matrimonywebsite123_files/watermark.php"
                                                                    class="img-responsive">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="owl-controls clickable" style="display: none;">
                                                <div class="owl-buttons">
                                                    <div class="owl-prev">PREV</div>
                                                    <div class="owl-next">NEXT</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./ Modal more photos -->
                <!-- Left Panel Mobile Only -->
                <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 gt-margin-top-15 visible-xs visible-sm visible-md visible-lg"
                    role="button" data-toggle="collapse"
                    href="https://matrimonialphpscript.com/premium-demo-2/view-profile#collapseLeftPanel"
                    aria-expanded="false" aria-controls="collapseLeftPanel">
                    Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
                <div class="collapse gt-padding-bottom-15" id="collapseLeftPanel">
                    <div class="col-xxl-16 col-xl-16">
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li><a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><i
                                            class="fas fa-paper-plane gt-margin-right-10"></i>Send
                                        Message</a></li>
                                <li><a href="https://matrimonialphpscript.com/premium-demo-2/my-photo"><i
                                            class="fas fa-image gt-margin-right-10"></i>View Photos</a></li>
                            </ul>
                        </div>
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li>
                                    <a class="gt-bg-orange text-center gt-text-white">MESSAGES</a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/inboxMessages"><span
                                            class="pull-left">Inbox</span><span class="pull-right badge">0</span></a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><span
                                            class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li>
                                    <a class="gt-bg-orange text-center gt-text-white"><i
                                            class="fa fa-star gt-margin-right-10"></i>INTEREST</a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                            class="pull-left">Received</span><span class="pull-right badge">5</span></a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                            class="pull-left">Sent</span><span class="pull-right badge">13</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="gt-left-opt-msg">
                            <ul>
                                <li>
                                    <a class="gt-bg-orange text-center gt-text-white"><i
                                            class="fas fa-picture gt-margin-right-10"></i>PHOTO REQUEST</a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                            class="pull-left">Received</span><span class="pull-right badge">0</span></a>
                                </li>
                                <li>
                                    <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                            class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <a href="https://www.facebook.com/" class="col-xs-16" target="_blank">
                            <div class="row" style="max-width:160px !important;">
                                <img src="./Matrimonywebsite123_files/1626606199.jpg" class="img-responsive"
                                    style="width:100%;max-height:600px !important;">
                            </div>
                        </a>

                    </div>
                </div>
                <!-- /. Left Panel Mobile Only -->
            </div>

            {{-- About Me Details --}}
            @php
                $fields = config('formFields.accountDetails');
            @endphp
            <x-view-account-details-component :user="$user" :fields="$fields" :prefix="$prefix" />
            <x-update-account-details-component :user="$user" :prefix="$prefix" />

        </div>
    </div>
    <div class="container gt-view-profile">
        <div class="row">
            <!-- Left Panel Desktop Only -->
            <div class="col-xxl-3 col-xl-4 hidden-xs hidden-sm hidden-md hidden-lg">
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><i
                                    class="fas fa-paper-plane gt-margin-right-10"></i>Send Message</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/my-photo"><i
                                    class="fas fa-image gt-margin-right-10"></i>View Photos</a>
                        </li>
                    </ul>
                </div>
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a class="gt-bg-orange text-center gt-text-white">MESSAGES</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/inboxMessages"><span
                                    class="pull-left">Inbox</span><span class="pull-right badge">0</span></a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/sentMessages"><span
                                    class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                        </li>
                    </ul>
                </div>
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a class="gt-bg-orange text-center gt-text-white">INTEREST</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                    class="pull-left">Received</span><span class="pull-right badge">5</span></a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/exp-interest"><span
                                    class="pull-left">Sent</span><span class="pull-right badge">13</span></a>
                        </li>
                    </ul>
                </div>
                <div class="gt-left-opt-msg">
                    <ul>
                        <li>
                            <a class="gt-bg-orange text-center gt-text-white">PHOTO REQUEST</a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                    class="pull-left">Received</span><span class="pull-right badge">0</span></a>
                        </li>
                        <li>
                            <a href="https://matrimonialphpscript.com/premium-demo-2/photo-request"><span
                                    class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <a href="https://www.facebook.com/" class="col-xs-16" target="_blank">
                    <div class="row" style="max-width:160px !important;">
                        <img src="./Matrimonywebsite123_files/1626606199.jpg" class="img-responsive"
                            style="width:100%;max-height:600px !important;">
                    </div>
                </a>
            </div>
            <!-- /. Left Panel Desktop Only -->
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2"
                style="position: fixed; left: 43%; top: 20%; z-index: -1; opacity: 0;" id="loaderID">
                <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange">
                    <font class="gt-margin-left-5">Loading ...&nbsp;&nbsp;</font>
                </div>
            </div>

            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5"
                style="position: fixed; left: 43%; top: 20%; z-index: -1; opacity: 0;" id="edit_success">
                <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 btn gt-btn-green">
                    <font class="gt-margin-left-5">Your Profile Edit Successfully.&nbsp;&nbsp;</font>
                </div>
            </div>

            <div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
                <!-- About Me Section -->
                <div id="aboutMeAlert">
                    @include('alerts.alert')
                </div>

                {{-- About Me Details --}}
                <div id="aboutMeDetailsAlert"></div>
                <x-view-about-me-component :user="$user" />
                <x-update-about-me-component :user="$user" />

                {{-- About Education Details --}}
                <div id="aboutEducationDetailsAlert"></div>
                <x-view-education-details-component :user="$user" />
                <x-update-education-details-component :user="$user" />

                {{-- About Occupation Details --}}
                <div id="aboutOccupationDetailsAlert"></div>
                <x-view-occupation-details-component :user="$user" />
                <x-update-occupation-details-component :user="$user" />

                {{-- About Family Details --}}
                <div id="aboutFamilyDetailsAlert"></div>
                <x-view-family-details-component :user="$user" />
                <x-update-family-details-component :user="$user" />



                {{-- Basic Details --}}
                <div id="basicDetailsAlert"></div>
                <x-view-basic-details-component :user="$user" />
                <x-update-basic-details-component :user="$user" />

                {{-- Horoscope Details --}}
                <div id="horoscopeDetailsAlert"></div>
                <x-view-horoscope-details-component :user="$user" />
                <x-update-horoscope-details-component :user="$user" />

                {{-- Carrier Details --}}
                <div id="carrierDetailsAlert"></div>
                <x-view-carrier-details-component :user="$user" />
                <x-update-carrier-details-component :user="$user" />

                {{-- Family Details --}}
                <div id="userFamilyDetailsAlert"></div>
                <x-view-user-family-details-component :user="$user" />
                <x-update-user-family-details-component :user="$user" />

                {{-- Lifestyle Details --}}
                <div id="userLifestyleDetailsAlert"></div>
                <x-view-lifestyle-details-component :user="$user" />
                <x-update-lifestyle-details-component :user="$user" />

                {{-- Contact Details --}}
                <div id="userContactDetailsAlert"></div>
                <x-view-contact-details-component :user="$user" />
                <x-update-contact-details-component :user="$user" />


                <div class="gt-panel gt-panel-default" id="edit6">
                    <div class="gt-panel-head">
                        <span class="pull-left"><i class="fa fa-map-marker"></i>Location Information</span>
                        <a class="pull-right btn gt-btn-orange" onclick="return edit6();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Country Living In :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>India</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        State Living In :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>Andhra Pradesh</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        City Living In :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>Achhayyapalli</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="edit7">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-users"></i>Habits And Hobbies </span>
                        <a class="pull-right btn gt-btn-orange" onclick="return edit7();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Eating Habits :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Non Vegetarian </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Drinking Habits :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            No </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Smoking Habits :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            No </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="edit9">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-star"></i>Physical Attributes </span>
                        <a class="pull-right btn gt-btn-orange" onclick="return edit9();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">Height:</div>
                                    <div class="col-xs-10">
                                        <b>
                                            5ft - 152cm
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">Weight :</div>
                                    <div class="col-xs-10">
                                        <b> 48 Kg </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">Body type:</div>
                                    <div class="col-xs-10">
                                        <b>Slim</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">Complexion:</div>
                                    <div class="col-xs-10">
                                        <b>Fair</b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">Physical Status:</div>
                                    <div class="col-xs-10">
                                        <b>Normal</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-16">
                    <div class="row">
                        <h4 class="text-center gt-bg-green pt-15 pb-15 inViewProSection">
                            <i class="fa fa-heart gt-margin-right-10"></i>Partner Preference
                        </h4>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="editpref1">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-file"></i>Basic Preferences </span>
                        <a class="pull-right btn gt-btn-orange" onclick="return part_edit_1();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Marital Status :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Never Married </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Age :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            18&nbsp;&nbsp;Years &nbsp;&nbsp;&nbsp;&nbsp;To
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            30&nbsp;&nbsp;Years </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Height :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            5ft 1in - 154cm &nbsp;&nbsp;&nbsp;&nbsp;To
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            5ft 3in - 160cm </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Eating Habits :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Vegetarian </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Smoking Habits :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            No </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Drinking Habits :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            No </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Physical status :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Normal </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="editpref2">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-university"></i>Education / Professional Preference </span>
                        <a class="pull-right btn gt-btn-orange" onclick="return part_edit_2();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Education :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            B Arch, B.Pharm </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Occupation :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Civil Engineer , Cost Accountant ,
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Employed in :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Private </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Annual Income:
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Rs.2,00,000,&nbsp;Rs.4,00,000,&nbsp; </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="editpref3">
                    <div class="gt-panel-head">
                        <span class="pull-left"><i class="fa fa-book"></i>Religion Preference</span>
                        <a class="pull-right btn gt-btn-orange" onclick="return part_edit_3();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Religion :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Christian, Hindu </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Caste :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Ad Dharmi
                                        </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Mother Tongue :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Angika, English, Hindi </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Star :
                                    </div>
                                    <div class="col-xs-10">
                                        <b> Ardra </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="editpref4">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-map-marker"></i>Location Preference </span>
                        <a class="pull-right btn gt-btn-orange" onclick="return part_edit_4();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        Country :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Antigua And Barbuda, India </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        State :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Parish of Saint Paul </b>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-6">
                                        City :
                                    </div>
                                    <div class="col-xs-10">
                                        <b>
                                            Bedpa </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gt-panel gt-panel-default" id="editpref5">
                    <div class="gt-panel-head">
                        <span class="pull-left">
                            <i class="fa fa-star"></i>Partner Expectation </span>
                        <a class="pull-right btn gt-btn-orange" onclick="return part_edit_5();">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                            <font class="gt-margin-left-5">EDIT</font>
                        </a>
                    </div>
                    <div class="gt-panel-body">
                        <div class="row">
                            <div
                                class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                <div class="row">
                                    <div class="col-xs-16">
                                        <b>
                                            Write some of about you.for example which kind of person you are
                                            ,about your Personality,Hobbies,About your family ect.

                                            jhcjhchgc </b>
                                    </div>
                                    <div
                                        class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                                        <h5 class="text-center inViewApproveStripe">
                                            Approval Status:&nbsp;Pending </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
    <!-- Login With OTP Modal  -->
    <div class="modal fade" id="loginWithOTP" tabindex="-1" role="dialog" aria-labelledby="loginWithOTPLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title text-center" id="loginWithOTPLabel">Login With OTP</h5>
                </div>
                <div class="modal-body">
                    <form class="" action="https://matrimonialphpscript.com/premium-demo-2/login-with-otp"
                        method="post">
                        <div class="form-group">
                            <label>Email/Mobile No/Matri id</label>
                            <input type="text" name="userId" class="gt-form-control"
                                placeholder="Enter Email id / Mobile No / Matri Id">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="GET OTP" class="btn gt-btn-green">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#accountDetailsForm').on('submit', function(e) {
                e.preventDefault();
                $('#accountDetailsBtn').prop('disabled',
                    true);
                const name = $('#name').val();
                const email = $('#email').val();
                const profile_for = $('#profile_for').val();
                if (!name || !email || !profile_for) {
                    alert('All fields are required.');
                    $('#accountDetailsBtn').prop('disabled', false);
                    return;
                }
                $.ajax({
                    url: "{{ route('profile.update') }}",
                    method: "PATCH",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        profile_for: profile_for,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#userName').text(response.user.name);
                        $('#userEmail').text(response.user.email);
                        $('#userProfileFor').text(response.user.profile_for);

                        $('#dynamicUpdateModal').modal('hide');
                        $('#accountDetailsBtn').prop('disabled', false);
                        $('#alert-container-acoountDetails').get(0).scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        $('#alert-container-acoountDetails').html(`
        <div class="alert alert-success col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 role="alert">
            ${response.success}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
        </div>
    `);
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error updating data');
                        $('#accountDetailsBtn').prop('disabled',
                            false);
                    }
                });
            });
        });
    </script>

    {{-- <script>
    const country = document.getElementById("country");
    const state = document.getElementById("hiddenState");
    state.style.display = 'none';
    country.addEventListener("change", function(e) {
        let countryId = country.value;
        console.log(countryId);
        if (countryId) {
            state.style.display = 'block';
            $.ajax({
                url: '/get-state/' + countryId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#state").empty();
                    $("#state").append('<option value="">Select state</option>');
                    $.each(data, function(key, value) {
                        $('#state').append('<option value="' + value.id + '">' + value
                            .state + '</option>');
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

            $('#state').fadeOut();
            $('#state').empty();
            $('#state').append('<option value="">Select state</option>');
        }
    });
</script>
<script>
    const state1 = document.getElementById("state");
    const city = document.getElementById("hiddenCity");
    city.style.display = 'none';
    state1.addEventListener("change", function(e) {
        let stateId = state1.value;
        if (stateId) {
            city.style.display = 'block';
            $.ajax({
                url: '/get-city/' + stateId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#city").empty();
                    $("#city").append('<option value="">Select City</option>');
                    $.each(data, function(key, value) {
                        $('#city').append('<option value="' + value.id + '">' + value
                            .city + '</option>');
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
            $('#city').fadeOut();
            $('#city').empty();
            $('#city').append('<option value="">Select City</option>');
        }
    });
</script>  --}}
    <script>
        const birthCountry = document.getElementById("country");
        const birthState = document.getElementById("hstate");
        const birthCity = document.getElementById("hcity");

        birthCountry.addEventListener("change", function() {
            const countryId = birthCountry.value;
            if (countryId) {
                $.ajax({
                    url: '/get-state/' + countryId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        birthState.innerHTML = '<option value="">Select State</option>';
                        data.forEach(state => {
                            birthState.innerHTML +=
                                `<option value="${state.id}">${state.state}</option>`;
                        });
                        birthCity.innerHTML =
                            '<option value="">Select City</option>'; // Reset city dropdown
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching states:', error);
                        alert('Failed to fetch states. Please try again later.');
                    }
                });
            } else {
                birthState.innerHTML = '<option value="">Select State</option>';
                birthCity.innerHTML = '<option value="">Select City</option>';
            }
        });

        birthState.addEventListener("change", function() {
            const stateId = birthState.value;

            if (stateId) {
                $.ajax({
                    url: '/get-city/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        birthCity.innerHTML = '<option value="">Select City</option>';
                        data.forEach(city => {
                            birthCity.innerHTML +=
                                `<option value="${city.id}">${city.city}</option>`;
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities:', error);
                        alert('Failed to fetch cities. Please try again later.');
                    }
                });
            } else {
                birthCity.innerHTML = '<option value="">Select City</option>';
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const familyCountry = document.getElementById("family_living");
            const familyState = document.getElementById("family_state");
            const familyCity = document.getElementById("family_city");
            console.log(country);
            familyCountry.addEventListener("change", function() {
                const countryId = familyCountry.value;
                if (countryId) {
                    console.log(countryId);
                    $.ajax({
                        url: '/get-state/' + countryId,
                        type: 'GET',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(data) {
                            familyState.innerHTML = '<option value="">Select State</option>';
                            data.forEach(state => {
                                familyState.innerHTML +=
                                    `<option value="${state.id}">${state.state}</option>`;
                            });
                            familyCity.innerHTML =
                                '<option value="">Select City</option>'; // Reset city dropdown
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching states:', error);
                            alert('Failed to fetch states. Please try again later.');
                        }
                    });
                } else {
                    familyState.innerHTML = '<option value="">Select State</option>';
                    familyCity.innerHTML = '<option value="">Select City</option>';
                }
            });

            familyState.addEventListener("change", function() {
                const stateId = familyState.value;

                if (stateId) {
                    console.log(stateId);
                    $.ajax({
                        url: '/get-city/' + stateId,
                        type: 'GET',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            familyCity.innerHTML = '<option value="">Select City</option>';
                            data.forEach(city => {
                                familyCity.innerHTML +=
                                    `<option value="${city.id}">${city.city}</option>`;
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching cities:', error);
                            alert('Failed to fetch cities. Please try again later.');
                        }
                    });
                } else {
                    familyCity.innerHTML = '<option value="">Select City</option>';
                }
            });
        });
    </script>

@endsection
