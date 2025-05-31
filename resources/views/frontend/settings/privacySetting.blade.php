@extends('layouts.frontend.main-master')
@section('title', 'Setting')
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
                        <i class="fa fa-star gt-margin-right-10 fa-spin"></i> Setting
                    </a>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- Name -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a href="{{ route('setting.name') }}">
                                        <i class="fas fa-tag"></i>
                                        Name
                                    </a>
                                </h4>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a href="{{ route('setting.image') }}">
                                        <i class="fas fa-image"></i> Photo
                                    </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a href="{{ route('setting.horoscope') }}">
                                        <i class="fas fa-moon"></i>
                                        Horoscope
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a href="{{ route('setting.mobile.number') }}">
                                        <i class="fas fa-mobile-alt"></i>
                                        Mobile Number
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-exp-main" bis_skin_checked="1">
                <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16" bis_skin_checked="1">
                    <div class="row active" id="exp-1" bis_skin_checked="1">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center xyz active"
                                id="sent_all">
                                <a href="#exp-tab-2" aria-controls="exp-tab-2" role="tab" data-toggle="tab"
                                    style="color:#E47203 ">
                                    <h4> <strong> {{ $heading ?? 'Na' }}</strong></h4>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" bis_skin_checked="1">
                            <div role="tabpanel" class="tab-pane fade in active " id="exp-tab-2" bis_skin_checked="1">

                                @include('alerts.alert')
                                @switch($heading ?? '')
                                    @case('Profile Name Setting')
                                        <x-settings.name-setting-component :settingData="$settingData" />
                                    @break

                                    @case('Profile Photo Setting')
                                        <x-settings.image-setting-component :settingData="$settingData" />
                                    @break

                                    @case('Profile Horoscope Setting')
                                        <x-settings.horoscope-setting-component :settingData="$settingData" />
                                    @break

                                    @case('Profile Mobile Number Setting')
                                        <x-settings.mobile-number-setting-component :settingData="$settingData" />
                                    @break

                                    @default
                                @endswitch
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
