@extends('layouts.frontend.main-master')
@section('title', 'Mangal Mandap - Access Controll')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        nav.center-text,
        nav {
            background: none;
        }

        .pagination {
            margin: -6px 0px;
        }

        .current {
            background: none repeat scroll 0 0 rgba(236, 236, 236, 1) !important;
            color: #000 !important;
            padding: 4px 8px;
        }

        .pagination>li>a {
            padding: 8px 12px;
        }

        .page-numbers1 {
            display: none;
        }

        .ne-success-story ul {
            border-bottom: none !important;
        }

        .ne-success-story li {
            background: none !important;
            border-bottom: none !important;
        }
    </style>
    <div class="container gt-margin-top-20">
        <div class="row">
            <div class="col-xxl-4 col-xl-4 gt-left-exp">
                <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 visible-xs visible-sm visible-md btn-md"
                    role="button" data-toggle="collapse" href="#collapseLeftPanel" aria-expanded="false"
                    aria-controls="collapseLeftPanel">
                    Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
                <style>
                    .panel-title a::after {
                        content: '\f105';
                        font-family: 'FontAwesome';
                        float: right;
                        font-size: 25px;
                        color: #333;
                        font-weight: bold;
                        transition: transform 0.3s ease;
                    }

                    .panel-title a[aria-expanded="true"]::after {
                        content: '\f107';
                        transform: rotate(0deg);
                    }

                    .panel-title a[aria-expanded="false"]::after {
                        content: '\f105';
                    }
                </style>

                <div class="collapse mobile-collapse gt-padding-bottom-15" id="collapseLeftPanel">
                    <a href="exp-interest.php" class="btn gt-btn-orange gt-btn-xl mb-20 btn-block">
                        <i class="fa fa-star gt-margin-right-10 fa-spin"></i> Access Control
                    </a>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- View Profile -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        View Profile
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <a href="{{ route('view.profile') }}" class="gt-exp-opt gt-cursor">View Profile By Me
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a href="{{ route('view.profile.by.other') }}" class="gt-exp-opt gt-cursor">View Profile
                                        By Others
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- View Contact -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        View Contact
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <a href="{{ route('view.contact.by.me') }}" class="gt-exp-opt gt-cursor">Contacts Viewed
                                        By Me
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a href="{{ route('view.contact.by.other') }}" class="gt-exp-opt gt-cursor">Contacts
                                        Viewed By Others
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Block Profile -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        Block Profile
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <a href="{{ route('block.by.me') }}" class="gt-exp-opt gt-cursor">Block By Me
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a href="{{ route('block.by.other') }}" class="gt-exp-opt gt-cursor">Block By Others
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Shortlist Profiles -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Shortlist Profiles
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <a href="{{ Route('my.shortlist') }}" class="gt-exp-opt gt-cursor">Shortlisted By Me
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a href="{{ Route('shortlisted.by.other') }}" class="gt-exp-opt gt-cursor">Shortlisted
                                        By
                                        Others
                                        <i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-exp-main" bis_skin_checked="1">
                <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16" bis_skin_checked="1">
                    <div class="row active" id="exp-1" bis_skin_checked="1">
                        {{-- <div class="col-xxl-16 col-xl-16 text-center" bis_skin_checked="1">
                            <h2 class="inPageTitle fontMerriWeather inThemeOrange">All Express Interest</h2>
                            <article class="mb-30">
                                <p class="inPageSubTitle">Here you can see your all express interest which you send and
                                    received from members.and with left side panel you can access other particluar express
                                    interest.</p>
                            </article>
                        </div> --}}
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center xyz active"
                                id="sent_all">
                                <a href="#exp-tab-2" aria-controls="exp-tab-2" role="tab" data-toggle="tab">
                                    {{-- <i class="fa fa-paper-plane gt-margin-right-10" aria-hidden="true"></i> --}}
                                    <strong> {{ $heading ?? 'Na' }}</strong>
                                </a>
                            </li>
                            {{-- <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center "
                                id="receive_all">
                                <a href="#exp-tab-1" aria-controls="exp-tab-1" role="tab" data-toggle="tab">
                                    <i class="fa fa-inbox gt-margin-right-10" aria-hidden="true"></i> All Received
                                    Interest </a>
                            </li> --}}
                        </ul>

                        <div class="tab-content" bis_skin_checked="1">
                            <div role="tabpanel" class="tab-pane fade in active " id="exp-tab-2" bis_skin_checked="1">
                                @if (count($searchResults) > 0)
                                    <x-profile-card-component :searchResults="$searchResults" />
                                @else
                                    <img src="{{ asset('storage/users/images/nodata-available.jpg') }}"
                                        class="img-responsive">
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

