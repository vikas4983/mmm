@extends('layouts.frontend.main-master')
@section('title', 'Mangal Mandap - Plans')
@section('styles')
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap & Green Js -->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/green.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <h2 class="text-center inPageTitle fontMerriWeather">Membership Plans</h2>
        <p class="inPageSubTitle text-center mb-20">Select from our multiple membership plan and find your best life partner
            with membership benefits.</p>
        <h3>
            @include('alerts.alert')
        </h3>
        <div class="row">
            <div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16">
                <div class="row mb-20">
                    @foreach ($plans as $plan)
                        <label for="gt-plan-28" class="col-xxl-4 col-xl-4 col-xs-16 col-lg-8">
                            {{-- style="{{ $plan->id === $activePlan->plan_id ? '' : '' }}" --}}
                            <div class="gt-plan" id="setselected28">
                                <div class="gt-plan-header">
                                    {{-- <h1><i class="fa fa-certificate"></i></h1> --}}
                                    <h4>
                                        FLAT
                                        <span style="color: #021def">
                                            {{ $plan->offer ?? '' }}%
                                        </span>
                                        OFF ON

                                        <input type="radio" id="gt-plan-28" name="plan" onChange="getselected('28');"
                                            class="Table_Details inDisplayNone">
                                        <span id="planname28">
                                            {{ $plan->name ?? '' }} </span>
                                    </h4>
                                    <div class="gt-plan-price">
                                        <h4 id="planamount28">
                                            Rs. {{ $plan->price ?? '' }} </h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Plan display for mobile -->
                                <a class="btn btn-primary gtMobPlan visible-xs visible-sm visible-md" role="button"
                                    data-toggle="collapse" href="#{{ $plan->id }}" aria-expanded="false"
                                    aria-controls="{{ $plan->id }}">
                                    View Plan Detail <div class="clearfix"></div>
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <div class="collapse" id="{{ $plan->id }}">
                                    <form action="#" method="post">
                                        @csrf
                                        <input type="hidden" name="planId" value="{{ $plan->id }}">
                                        <div class="well">
                                            <div class="gt-plan-body">
                                                <ul class="gt-plan-desc">
                                                    <li>
                                                        <h3>Duration</h3>
                                                        <h5 id="planduration28">
                                                            {{ $plan->duration ?? '' }}
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h3>Messages</h3>
                                                        <h5>
                                                            {{ $plan->unlimited ?? 'Unlimited' }}
                                                        </h5>
                                                    </li>

                                                    <li>
                                                        <h3>Contact Views</h3>
                                                        <h5>
                                                            {{ $plan->allow_contact }} </h5>
                                                    </li>
                                                    <li>
                                                        <h3>Live Chat</h3>
                                                        <h5>
                                                            {{ $plan->chat ?? 'Unlimited' }} </h5>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" style="width: 263px;"
                                            class="gt-plan-footer hidden-xs hidden-sm hidden-md">
                                            Continue
                                        </button>
                                    </form>

                                </div>
                                <!-- /. Plan display for mobile -->
                                <!-- Plan for desktop -->
                                @if (!empty($plan) && !empty($activePlan) && $plan->id === $activePlan->plan_id)
                                    <div class="gt-plan-body hidden-xs hidden-sm hidden-md">
                                        <ul class="gt-plan-desc">
                                            <li>
                                                <h3>Duration</h3>
                                                <h5 id="planduration28">
                                                    {{ $plan->duration ?? '' }}
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Messages</h3>
                                                <h5>
                                                    {{ $plan->message ?? 'Unlimited' }}
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Contact Views</h3>
                                                <h5>
                                                    {{ $plan->allow_contact ?? '' }} </h5>
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Live Chat</h3>
                                                <h5>
                                                    {{ $plan->chat ?? 'Unlimited' }} </h5>
                                            </li>

                                        </ul>
                                    </div>
                                @else
                                    <div class="gt-plan-body hidden-xs hidden-sm hidden-md">
                                        <ul class="gt-plan-desc">
                                            <li>
                                                <h3>Duration</h3>
                                                <h5 id="planduration28">
                                                    {{ $plan->duration ?? '' }}
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Messages</h3>
                                                <h5>
                                                    {{ $plan->message ?? 'Unlimited' }}
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Contact Views</h3>
                                                <h5>
                                                    {{ $plan->allow_contact ?? '' }} </h5>
                                                </h5>
                                            </li>
                                            <li>
                                                <h3>Live Chat</h3>
                                                <h5>
                                                    {{ $plan->chat ?? 'Unlimited' }} </h5>
                                            </li>

                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('razorpay.order') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id ?? '' }}">
                                    <input type="hidden" name="name" value="{{ $plan->name ?? '' }}">
                                    <input type="hidden" name="offer_price" value="{{ $plan->offer_price ?? '' }}">


                                    <button type="submit" id="pay" style="width: 263px;"
                                        class="gt-plan-footer hidden-xs hidden-sm hidden-md">
                                        Net Payable: ₹ {{ $plan->offer_price > 0 ? $plan->offer_price : $plan->price }}
                                    </button>
                                </form>
                            </div>
                        </label>
                    @endforeach
                </div>
                {{-- <div class="row">
                    					<div class="col-xxl-16 col-xl-16 box">
                        					<div class="gt-panel inMembershipSelected" id="{{ $plan->id }}">
                            					<div class="gt-panel-head gt-bg-green">You Have Selected</div>
                                				<div class="gt-panel-body">
                                					<div class="row">
                                    					<div class="col-xxl-5 col-xl-5 col-lg-4">
                                            				<h4>Plan Name</h4>
                                            				<h5 class="gt-text-orange" id="dis_plan_name">Bronze</h5>
                                            			</div>
                                        				<div class="col-xxl-5 col-xl-5 col-lg-4">
                                            				<h4>Duration</h4>
                                            				<h5 class="gt-text-orange" id="dis_plan_duaration">{{ $plan->duration }}</h5>
                                        				</div>
                                        				<div class="col-xxl-6 col-xl-6 col-lg-8">
                                            				<h4 class="gt-margin-top-30">
                                               					Total  Amount  :- 
                                                                    <span class="gt-margin-left-10 gt-text-green" id="dis_plan_amount">{{ $plan->price }}</span>
                                            				</h4>
                                        				</div>
                                    				</div>
                                    				<div class="row text-center">
                                       					<a href="" id="checkout" class="btn gt-btn-green gt-btn-md mt-15">
                                            				<i class="fas fa-shopping-cart gt-margin-right-10 font-12"></i>Checkout                                        				</a>
                                        			</div>
            										<div class="row text-right">
                                    					<div class="col-xs-16">
                                        					<p>Including all taxes </p>
                                        				</div>
                                    				</div>
                                    			</div>
                            				</div>
                        				</div>
                    				</div> --}}
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
@endsection
