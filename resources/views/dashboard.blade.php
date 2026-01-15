@extends('layouts.frontend.main-master')
@section('title', 'Dashboard - Mangal Mandap')
@section('content')
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <div id="dashboard">
        <div class="container mt-20 searchresult" id="searchresult">
            <div class="row">
                <div class="col-xxl-4 col-xs-16 col-sm-16 mb-30">
                    <div class="thumbnail gt-margin-bottom-0 inHomeMainThumb">
                        @foreach ($user->images as $image)
                            @if ($image->dp_image === '1')
                                <img src="{{ isset($image) && isset($image->name) && $image->name
                                    ? asset('storage/users/images/' . $image->name)
                                    : (isset($image) && isset($image->gender) && $image->gender == 'male'
                                        ? asset('storage/users/images/male-default.jpg')
                                        : asset('storage/users/images/female-default.jpg')) }}"
                                    class="img-responsive gtFullWidth" alt="User Image">
                                <a href="{{ route('my.photos') }}" class="gt-myhome-caption ripplelink">
                            @endif
                        @endforeach
                        @if ($user->images->isEmpty())
                            <img src="{{ $user->gender == 'male'
                                ? asset('storage/users/images/male-default.jpg')
                                : asset('storage/users/images/female-default.jpg') }}"
                                class="img-responsive gtFullWidth" alt="User Image">
                        @endif

                        <a href="{{ route('my.photos') }}">
                            <i class="fa fa-camera gt-margin-right-10"></i><span
                                class="">{{ $dashboardConstacts['change_profile_picture'] ?? 'Default' }}</span>
                        </a>

                    </div>

                    <div id="loaderID"></div>
                </div>
                <div class="clearfix visible-xs visible-sm mb-10"></div>
                <div class="col-xxl-12 col-sm-16 col-xs-16">
                    <div class="gt-body mb-20 gtHomeBody">
                        <div class="row">
                            <div class="col-xxl-8 col-xl-8 col-lg-10">
                                <h4>
                                    <span class="gt-text-orange">{{ $user->name }}(
                                        {{ $prefix->name }}-{{ $user->matrimony_id }}
                                        ) </span>
                                    <small class="text-muted gt-margin-left"></small>
                                </h4>
                                {{-- <h5 class="mt-30">
                                    Your profile is 95% complete </h5>
                                <div class="progress mb-10">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active"
                                        role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 95%;"></div>
                                </div> --}}
                                <div class="font-12">
                                    Tip : insert all details which can help you to find perfect life partner </div>
                                <div class="mt-10">
                                    <a href="{{ route('my.profile') }}" class="gt-text-green">
                                        Complete Your Profile <i class="fa fa-caret-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Recent Login -->
                            {{-- <div class="col-xxl-8 col-xl-8 col-lg-16 inHomeRecent">
                                <h4 class="text-center mb-20 pb-15">RECENT LOGIN</h4>
                                <div id="owl-demo" class="owl-carousel">
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN2" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Aarav Acharya"
                                                            alt="IN2" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN2" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Aarav Acharya&nbsp;&nbsp;(IN2)
                                                    </h5>
                                                    <article class="text-center">
                                                        29 Years, 5ft 5in - 165cm , Clerical Official
                                                    </article>
                                                    <article class="text-center">
                                                        Achencoil,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN2')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN24" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Ayaan Banerjee"
                                                            alt="IN24" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN24" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Ayaan Banerjee&nbsp;&nbsp;(IN24)
                                                    </h5>
                                                    <article class="text-center">
                                                        30 Years, 5ft 11in - 180cm , Engineer
                                                    </article>
                                                    <article class="text-center">
                                                        Mumbai,India </article>
                                                </a>
                                                <button class="btn gt-btn-green btn-block mt-5" onClick="sendreminder(3);"
                                                    id="reminder3" title="Send Reminder">
                                                    <i class="fa fa-bell gt-margin-right-5"></i>Send Reminder </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN25" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Yuvaan Burman"
                                                            alt="IN25" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN25" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Yuvaan Burman&nbsp;&nbsp;(IN25)
                                                    </h5>
                                                    <article class="text-center">
                                                        30 Years, 5ft 11in - 180cm , Event Manager
                                                    </article>
                                                    <article class="text-center">
                                                        Alappakkam,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN25')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN26" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Rudra Bhatt"
                                                            alt="IN26" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN26" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Rudra Bhatt&nbsp;&nbsp;(IN26)
                                                    </h5>
                                                    <article class="text-center">
                                                        30 Years, 5ft 7in - 170cm , Factory worker
                                                    </article>
                                                    <article class="text-center">
                                                        Aithar,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN26')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN27" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Kabir Basu"
                                                            alt="IN27" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN27" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Kabir Basu&nbsp;&nbsp;(IN27)
                                                    </h5>
                                                    <article class="text-center">
                                                        31 Years, 5ft 10in - 177cm , Designer
                                                    </article>
                                                    <article class="text-center">
                                                        Jaipur,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN27')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN28" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Madhav Bedi"
                                                            alt="IN28" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN28" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Madhav Bedi&nbsp;&nbsp;(IN28)
                                                    </h5>
                                                    <article class="text-center">
                                                        31 Years, 5ft 6in - 167cm , Flight Attendant
                                                    </article>
                                                    <article class="text-center">
                                                        Ahmadabad,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN28')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Aarush Varma"
                                                            alt="IN29" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Aarush Varma&nbsp;&nbsp;(IN29)
                                                    </h5>
                                                    <article class="text-center">
                                                        32 Years, 5ft 9in - 175cm , Executive
                                                    </article>
                                                    <article class="text-center">
                                                        Bakudi,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN29')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg" title="Ryan Dalal"
                                                            alt="IN30" class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Ryan Dalal&nbsp;&nbsp;(IN30)
                                                    </h5>
                                                    <article class="text-center">
                                                        31 Years, 5ft 6in - 167cm , Doctor
                                                    </article>
                                                    <article class="text-center">
                                                        Alangudi,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN30')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg"
                                                            title="Kartik Chowdhury" alt="IN31"
                                                            class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Kartik Chowdhury&nbsp;&nbsp;(IN31)
                                                    </h5>
                                                    <article class="text-center">
                                                        31 Years, 6ft 2in - 187cm , Defense Employee
                                                    </article>
                                                    <article class="text-center">
                                                        Bhadson,India </article>
                                                </a>

                                                <button class="btn gt-btn-green btn-block mt-5"
                                                    onclick="ExpressInterest('IN31')" title="Send Interest"
                                                    data-target="#myModal1" data-toggle="modal" data-backdrop="static"
                                                    data-keyboard="false">
                                                    <i class="fa fa-heart"></i> Send Interest </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-xxl-16 col-xs-16 col-lg-16">
                                            <a href="member-profile?view_id=IN23" target="_blank" class="gt-result">
                                                <div class="col-xxl-6 col-lg-6 col-xs-16">
                                                    <div class="thumbnail">

                                                        <img src="./img/app_img/male-no-photo.jpg"
                                                            title="Dhruv  Balakrishnan" alt="IN23"
                                                            class="img-responsive gtFullWidth">


                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-xxl-10 col-lg-10 col-xs-16">
                                                <a href="member-profile?view_id=IN23" target="_blank" class="gt-result">
                                                    <h5 class="text-center gt-text-orange mt-5 mb-5">
                                                        Dhruv Balakrishnan&nbsp;&nbsp;(IN23)
                                                    </h5>
                                                    <article class="text-center">
                                                        30 Years, 5ft 5in - 165cm , Contractor
                                                    </article>
                                                    <article class="text-center">
                                                        Kozhikode,India </article>
                                                </a>
                                                <button class="btn gt-btn-green btn-block mt-5" onClick="sendreminder(2);"
                                                    id="reminder2" title="Send Reminder">
                                                    <i class="fa fa-bell gt-margin-right-5"></i>Send Reminder </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- /. Recent Login -->
                        </div>
                    </div>
                    <div id="alerts"></div>
                    <div class="gt-body gtHomeBody inHomeIdSearch mb-20">
                        <form action="{{ route('search.by.id') }}" method="post" class="mb-0">
                            @csrf
                            <div class="row">
                                @include('alerts.alert')
                                <div class="col-xxl-4">
                                    <h4>{{ $dashboardConstacts['search_by_id'] ?? 'Default' }}</h4>
                                </div>
                                <div class="col-xxl-8">
                                    <div class="form-group clearfix mb-0">
                                        <input type="text" class="gt-form-control" id="searchById" name="searchById"
                                            pattern="^\d{6}$" placeholder="Enter matri ID to search" minlength="6"
                                            maxlength="6" required>
                                    </div>
                                    <div id="errorMessage" style="color: red; font-size: 14px; margin-top: 5px;">
                                        <!-- Error messages will appear here -->
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <button type="submit" id="searchByIdBtn" class="btn gt-btn-orange">
                                        {{ $dashboardConstacts['search_now'] ?? 'Default' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <aside class="col-xxl-4 col-xl-4 col-xs-16">
                    <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 visible-xs visible-sm visible-md btn-md"
                        role="button" data-toggle="collapse" href="#collapseLeftPanel" aria-expanded="false"
                        aria-controls="collapseLeftPanel">
                        Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse mobile-collapse mb-15" id="collapseLeftPanel">
                        <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                            <div class="gt-panel-head">
                                <div class="gt-panel-title text-center">
                                    {{ $dashboardConstacts['message'] ?? 'Default' }} </div>
                            </div>
                            <div class="gt-left-pan-option">
                                <div class="row">
                                    <a href="{{ route('message') }}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['inbox'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    0 </div> --}}
                                            </span>
                                        </div>
                                    </a>
                                    {{-- <a href="sentMessages" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['outbox'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                <div class="badge">
                                                    4 </div>
                                            </span>
                                        </div>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                            <div class="gt-panel-head">
                                <div class="gt-panel-title text-center">
                                    {{ $dashboardConstacts['my_profile'] ?? 'Default' }} </div>
                            </div>
                            <div class="gt-left-pan-option">
                                <div class="row">
                                    <a href="{{ route('my.profile') }}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        {{ $dashboardConstacts['edit_profile'] ?? 'Default' }} </a>
                                    <a href="{{ route('my.photos') }}"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                        {{ $dashboardConstacts['manage_photos'] ?? 'Default' }} </a>
                                </div>
                            </div>
                        </div>
                        <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                            <div class="gt-panel-head">
                                <div class="gt-panel-title text-center">
                                    {{ $dashboardConstacts['profile_details'] ?? 'Default' }} </div>
                            </div>
                            <div class="gt-left-pan-option">
                                <div class="row">
                                    <a href="{{ route('my.interest') }}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['express_interest_received'] ?? 'Default' }}</div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    1 </div> --}}
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{ route('my.shortlist') }}"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['my_shortlist_profile'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    1 </div> --}}
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{ route('block.by.me') }}"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['my_blocklist_profile'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    0 </div> --}}
                                            </span>
                                        </div>
                                    </a>

                                    <a href="{{ route('view.profile.by.other') }}"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['my_profile_viewed_by'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    1 </div> --}}
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{ route('view.profile') }}"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['i_visited_profile'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    5 </div> --}}
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{ route('view.contact.by.me') }}"
                                        class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                        <div class="row">
                                            <div class="col-xxl-13 col-xl-12 col-xs-13">
                                                {{ $dashboardConstacts['mobile_number_viewed_by_me'] ?? 'Default' }} </div>
                                            <span class="col-xxl-3 col-xs-3 col-xl-4">
                                                {{-- <div class="badge">
                                                    0 </div> --}}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div id="app"></div>
                <div class="col-xxl-12 col-xl-12 col-xs-16">
                    <!-- Recently Joined -->
                    @if (count($recentJoinProfiles) > 0)
                        <div class="gt-panel inHomePanel">
                            <div class="gt-panel-border-green">
                                <div class="gt-panel-title inPanelGreenTitle">
                                    <i class="fas fa-user-plus"></i> RECENTLY JOINED
                                </div>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    @foreach ($recentJoinProfiles as $recentJoinProfile)
                                        <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                            <a href="{{ route('profile', $recentJoinProfile->uuid) }}" target="_blank"
                                                class="gt-result">
                                                <div class="thumbnail">
                                                    @php
                                                        $dpImage = $recentJoinProfile->images->firstWhere(
                                                            'dp_image',
                                                            '1',
                                                        );
                                                    @endphp

                                                    @if ($dpImage && $dpImage->name)
                                                        <img src="{{ asset('storage/users/images/' . $dpImage->name) }}"
                                                            title="{{ $recentJoinProfile->name ?? '' }}" alt="User Image"
                                                            class="img-responsive gtFullWidth"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ $recentJoinProfile->gender === 'male'
                                                            ? asset('storage/users/images/male-default.jpg')
                                                            : asset('storage/users/images/female-default.jpg') }}"
                                                            title="{{ $recentJoinProfile->name ?? '' }}" alt="User Image"
                                                            class="img-responsive gtFullWidth"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                    @endif
                                                </div>
                                                @php
                                                    $recentSetting = $recentJoinProfile->userSettings->first();
                                                    $authSetting = Auth::user()->userSettings->first();
                                                @endphp

                                                @if (!empty($recentSetting) && !empty($authSetting))
                                                    @if ($recentSetting->name === 0)
                                                        <h5 class="text-center gt-text-orange">
                                                            {{ $prefix->name ?? '' }} -
                                                            {{ $recentJoinProfile->matrimony_id ?? '' }}
                                                        </h5>
                                                    @elseif ($recentSetting->name === 2 && $authSetting->name === 2)
                                                        <h5 class="text-center gt-text-orange">
                                                            {{ $recentJoinProfile->name ?? '' }}
                                                            ({{ $prefix->name ?? '' }} -
                                                            {{ $recentJoinProfile->matrimony_id ?? '' }})
                                                        </h5>
                                                    @else
                                                        @if (!empty($recentJoinProfile->name))
                                                            <h5 class="text-center gt-text-orange">
                                                                {{ $recentJoinProfile->name }}
                                                            </h5>
                                                        @endif
                                                    @endif
                                                @endif
                                                <article class="gt-margin-bottom-5 text-center">
                                                    {{ $recentJoinProfile->age() }},
                                                    {{ $recentJoinProfile->basicDetails->heights->name ?? '' }} ,
                                                    {{ $recentJoinProfile->carrierDetails->occupations->occupation ?? '' }}
                                                </article>
                                                <article class="text-center">
                                                    {{ $recentJoinProfile->carrierDetails->states->state ?? '' }},
                                                    {{ $recentJoinProfile->carrierDetails->countries->country ?? '' }}
                                                </article>
                                            </a>
                                        </div>
                                    @endforeach
                                    <a href="{{ route('recent.join') }}">
                                        <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                            title="View All">
                                            <i class="fas fa-user-check"></i> Show All </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif

                    <!-- /. Recently Joined -->

                    <!-- Featured Profiles -->
                    {{-- <div class="gt-panel inHomePanel">
                        <div class="gt-panel-border-green">
                            <div class="gt-panel-title inPanelGreenTitle">
                                FEATURED PROFILES
                            </div>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                    <a href="member-profile?view_id=IN31" target="_blank" class="gt-result">
                                        <div class="thumbnail">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Kartik Chowdhury"
                                                alt="IN31" class="img-responsive gtFullWidth">


                                        </div>
                                        <h5 class="text-center gt-text-orange">
                                            Kartik Chowdhury(IN31)
                                        </h5>
                                        <article class="gt-margin-bottom-5 text-center">
                                            31 Years, 6ft 2in - 187cm , Defense Employee </article>
                                        <article class="text-center">
                                            Bhadson,India </article>
                                    </a>


                                    <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                        onclick="ExpressInterest('IN31')" title="Send Interest" data-target="#myModal1"
                                        data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                        <i class="fa fa-heart"></i> Send Interest </button>


                                </div>
                                <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                    <a href="member-profile?view_id=IN30" target="_blank" class="gt-result">
                                        <div class="thumbnail">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Ryan Dalal" alt="IN30"
                                                class="img-responsive gtFullWidth">


                                        </div>
                                        <h5 class="text-center gt-text-orange">
                                            Ryan Dalal(IN30)
                                        </h5>
                                        <article class="gt-margin-bottom-5 text-center">
                                            31 Years, 5ft 6in - 167cm , Doctor </article>
                                        <article class="text-center">
                                            Alangudi,India </article>
                                    </a>


                                    <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                        onclick="ExpressInterest('IN30')" title="Send Interest" data-target="#myModal1"
                                        data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                        <i class="fa fa-heart"></i> Send Interest </button>


                                </div>
                                <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                    <a href="member-profile?view_id=IN29" target="_blank" class="gt-result">
                                        <div class="thumbnail">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Aarush Varma"
                                                alt="IN29" class="img-responsive gtFullWidth">


                                        </div>
                                        <h5 class="text-center gt-text-orange">
                                            Aarush Varma(IN29)
                                        </h5>
                                        <article class="gt-margin-bottom-5 text-center">
                                            32 Years, 5ft 9in - 175cm , Executive </article>
                                        <article class="text-center">
                                            Bakudi,India </article>
                                    </a>


                                    <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                        onclick="ExpressInterest('IN29')" title="Send Interest" data-target="#myModal1"
                                        data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                        <i class="fa fa-heart"></i> Send Interest </button>


                                </div>
                                <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                    <a href="member-profile?view_id=IN28" target="_blank" class="gt-result">
                                        <div class="thumbnail">

                                            <img src="./img/app_img/male-no-photo.jpg" title="Madhav Bedi" alt="IN28"
                                                class="img-responsive gtFullWidth">


                                        </div>
                                        <h5 class="text-center gt-text-orange">
                                            Madhav Bedi(IN28)
                                        </h5>
                                        <article class="gt-margin-bottom-5 text-center">
                                            31 Years, 5ft 6in - 167cm , Flight Attendant </article>
                                        <article class="text-center">
                                            Ahmadabad,India </article>
                                    </a>


                                    <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                        onclick="ExpressInterest('IN28')" title="Send Interest" data-target="#myModal1"
                                        data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                        <i class="fa fa-heart"></i> Send Interest </button>


                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /. Featured Profiles -->

                    <!-- My Matches -->
                    {{-- <div class="gt-panel inHomePanel">
                        <div class="gt-panel-border-green">
                            <div class="gt-panel-title inPanelGreenTitle">
                                MY MATCHES </div>
                        </div>
                        <div class="gt-panel-body">
                            <div class="row">
                                <div class="col-xl-16">
                                    <div class="thumbnail">
                                        <img src="img/nodata-available.jpg" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /. My Matches -->

                    <!-- Recently Visited -->
                    @if (count($recentVisitedProfiles) > 0)
                        <div class="gt-panel inHomePanel">
                            <div class="gt-panel-border-green">
                                <div class="gt-panel-title inPanelGreenTitle">
                                    <i class="fas fa-clock"></i> RECENTLY VISITED
                                </div>
                            </div>
                            <div class="gt-panel-body">
                                <div class="row">
                                    @foreach ($recentVisitedProfiles as $recentVisitedProfile)
                                        <div class="col-xxl-4 col-xs-8 col-lg-4 gt-margin-bottom-10">
                                            <a href="{{ route('profile', $recentVisitedProfile->uuid) }}" target="_blank"
                                                class="gt-result">
                                                <div class="thumbnail">
                                                    @php
                                                        $dpImage = $recentVisitedProfile->images->firstWhere(
                                                            'dp_image',
                                                            '1',
                                                        );
                                                    @endphp

                                                    @if ($dpImage && $dpImage->name)
                                                        <img src="{{ asset('storage/users/images/' . $dpImage->name) }}"
                                                            title="{{ $recentVisitedProfile->name ?? '' }}"
                                                            alt="User Image" class="img-responsive gtFullWidth"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ $recentVisitedProfile->gender === 'male'
                                                            ? asset('storage/users/images/male-default.jpg')
                                                            : asset('storage/users/images/female-default.jpg') }}"
                                                            title="{{ $recentVisitedProfile->name ?? '' }}"
                                                            alt="User Image" class="img-responsive gtFullWidth"
                                                            style="width: 150px; height: 150px; object-fit: cover;">
                                                    @endif
                                                </div>
                                                @php
                                                    $recentVisited = $recentVisitedProfile->userSettings->first();
                                                @endphp
                                                @if (!empty($recentVisited) && !empty($authSetting))
                                                    @if ($recentVisited->name === 0)
                                                        <h5 class="text-center gt-text-orange">
                                                            {{ $prefix->name ?? '' }} -
                                                            {{ $recentJoinProfile->matrimony_id ?? '' }}
                                                        </h5>
                                                    @elseif ($recentVisited->name === 2 && $authSetting->name === 2)
                                                        <h5 class="text-center gt-text-orange">
                                                            {{ $recentJoinProfile->name ?? '' }}
                                                            ({{ $prefix->name ?? '' }} -
                                                            {{ $recentJoinProfile->matrimony_id ?? '' }})
                                                        </h5>
                                                    @else
                                                        @if (!empty($recentJoinProfile->name))
                                                            <h5 class="text-center gt-text-orange">
                                                                {{ $recentJoinProfile->name }}
                                                            </h5>
                                                        @endif
                                                    @endif
                                                @endif
                                                <article class="gt-margin-bottom-5 text-center">
                                                    {{ $recentVisitedProfile->age() }},
                                                    {{ $recentVisitedProfile->basicDetails->heights->name ?? '' }} ,
                                                    {{ $recentVisitedProfile->carrierDetails->occupations->occupation ?? '' }}
                                                </article>
                                                <article class="text-center">
                                                    {{ $recentVisitedProfile->carrierDetails->states->state ?? '' }},
                                                    {{ $recentVisitedProfile->carrierDetails->countries->country ?? '' }}
                                                </article>
                                            </a>
                                        </div>
                                    @endforeach
                                    <a href="{{ route('view.profile') }}">
                                        <button class="btn gt-btn-green btn-block gt-margin-top-5 gtFontSMXS12"
                                            title="View All">
                                            <i class="fas fa-history"></i> Show All </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @else
                    @endif

                    <!-- /. Recently Visited -->
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchByIdForm = document.getElementById("searchByIdForm");
            const errorMessage = document.getElementById("errorMessage");
            const searchResult = document.getElementById("searchResult");
            const alerts = document.getElementById("alerts");

            if (searchByIdForm) {
                searchByIdForm.addEventListener("submit", function(e) {
                    e.preventDefault();
                    const searchById = document.getElementById("searchById").value;
                    const csrfToken = document.querySelector('input[name="_token"]').value;
                    errorMessage.textContent = "";

                    if (!searchById) {
                        errorMessage.textContent = "Please enter a valid Profile ID.";
                        return;
                    }

                    $.ajax({
                        url: "{{ route('search.by.id') }}",
                        method: "POST",
                        data: {
                            _token: csrfToken,
                            searchById: searchById,
                        },
                        success: function(response) {
                            var searchresult = document.getElementById('searchresult');
                            searchresult.innerHTML = response;
                        },
                        error: function(xhr) {
                            alerts.innerHTML = xhr.responseJSON.alert;
                            setTimeout(function() {
                                alerts.innerHTML =
                                    '';
                            }, 3000);
                        },
                    });
                });
            }
        });
    </script>
@endsection























































{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
