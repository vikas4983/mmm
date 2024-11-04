@extends('layouts.frontend.master')
@section('title', 'Regitration')

@section('content')
<div id="carrierDetailsPage">
        <div class="container">
            <div class="row mt-10 inRegTopTitle">
                <div class="col-xxl-11">
                    <div class="row">
                        <div class="col-xxl-2">
                            <img src="{{ asset('frontend/assets/img/register-img.png') }}" class="img-responsive">
                        </div>
                        <div class="col-xxl-14">
                            <h3 class="gt-text-green">Completing this page will take you closer to your perfect match.</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gtRegister col-xxl-11">
                <div class="row mb-20">
                    <img src="{{ asset('frontend/assets/img/reg-step-1.png') }}" class="img-responsive">
                </div>

                <h3 class="gt-text-green mb-10 fontMerriWeather">
                    <i class="fa fa-user mr-10"></i> REGISTER NOW
                </h3>
                <article>
                    <p>You have many matching profiles based on your details. Completing this page will take you closer to
                        your
                        perfect match.</p>
                </article>
                @include('partials.alerts')
                <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                <form action="{{ route('members.store') }}" method="post">
                    @csrf
                    @php
                        $fields = config('formFields.register');

                    @endphp
                    <x-form-fields-component :fields="$fields" />
                    <div class="row form-group">
                        <div class="col-xxl-16 text-center">
                            <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10"
                                id="horoscopesDetailsBtn">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
