@extends('layouts.frontend.main-master')
@section('title', 'MM - Active Plan')
@section('styles')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/green.js') }}"></script>

@endsection
@section('content')
<div class="container">
    <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 text-center" bis_skin_checked="1">
        <h2 class="inPageTitle fontMerriWeather inThemeOrange">Current Plan Details</h2>
        <p class="inPageSubTitle">You can check your current membership plan detail and also recommanded plan suggestion with
            that.</p>
    </div>
    <div class="col-xxl-16 col-xl-16 col-md-16 col-sm-16 col-lg-16" bis_skin_checked="1">
        <div class="gt-panel gt-panel-default inCurrentPlan" bis_skin_checked="1">
            <div class="gt-panel-head" bis_skin_checked="1">
                <div class="gt-panel-title" bis_skin_checked="1">
                    {{-- <h4 class="gt-margin-bottom-0 gt-margin-top-0 text-center">
                        <span class="gt-text-orange">
                            MM-Plan Payment </span>
                    </h4> --}}
                </div>
            </div>
            <div class="gt-panel-body" bis_skin_checked="1" >
                <div class="row" bis_skin_checked="1" style="display: flex">
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Plan Name</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                                {{$activePlanDetails['name'] ?? 'NA'}} </b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Expired</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              {{ \Carbon\Carbon::parse($activePlanDetails['expiry_date'])->format('d M Y h:ia') ?? 'NA' }}
                            </b>
                        </p>
                       
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Paid</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              {{$activePlanDetails['offer_price'] ?? 'NA'}}</b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Left Contact</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              {{$activePlanDetails['contact'] ?? 'NA'}} </b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Send Interest</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              {{$activePlanDetails['interest'] ?? 'Yes'}} </b>
                        </p>
                        
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-sm-16 col-md-8 col-xs-16 gt-margin-bottom-20 text-center"
                        bis_skin_checked="1">
                        <h4 class="gt-text-orange">Send Message</h4>
                        <p class="gt-margin-bottom-5">
                            <b>
                              {{$activePlanDetails['message'] ?? 'NA'}} </b>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
