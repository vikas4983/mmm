@extends('layouts.frontend.master')
@section('title', 'Basic Details')
@section('content')
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
            <i class="fa fa-user mr-10"></i>Basic Information
        </h3>
        <article>
            <p>You have many matching profiles based on your details. Completing this page will take you closer to
                your
                perfect match.</p>
        </article>
        {{-- Success/Error alert --}}
        <div id="message"></div>
        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
        <br><br>
        <form id="multiStepForm" method="POST">
            @csrf

            <!-- Step 1: Basic Info -->
            <div id="step1">
                @php
                $fields = config('formFields.basicDetails');

                @endphp
                <x-form-fields-component :fields="$fields" />
                <div class="row form-group">
                    <div class="col-xxl-16 text-center">
                        <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="basicDetailsBtn"
                            name="basicDetailsBtn">Submit</button>
                    </div>
                </div>
            </div>

            <!-- Step 2: Horoscope Info (Initially hidden) -->
            <div id="step2" style="display:none">
                <h3 class="gt-text-green mb-10 fontMerriWeather">
                    <i class="fa fa-user mr-10"></i>Horoscope Details
                </h3>
                <article>
                    <p>You have many matching profiles based on your details. Completing this page will take you
                        closer to
                        your
                        perfect match.</p>
                </article>
                <div id="message"></div>
                <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                @php
                $fields = config('formFields.horoscopeDetails');

                @endphp
                <x-form-fields-component :fields="$fields" />
                <div class="row form-group">
                    <div class="col-xxl-16 text-center">
                        <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="horoscopeDetailsBtn"
                            name="horoscopeDetailsBtn">Submit</button>
                    </div>
                </div>
            </div>

            <!-- Step 3: Career Info (Initially hidden) -->
            <div id="step3" style="display:none">
                <h3 class="gt-text-green mb-10 fontMerriWeather">
                    <i class="fa fa-user mr-10"></i>Carrier Details
                </h3>
                <article>
                    <p>You have many matching profiles based on your details. Completing this page will take you
                        closer to
                        your
                        perfect match.</p>
                </article>
                <div id="message2"></div>
                <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                @php
                $fields = config('formFields.carrierDetails');

                @endphp
                <x-form-fields-component :fields="$fields" />
                <div class="row form-group">
                    <div class="col-xxl-16 text-center">
                        <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="carrierDetailsBtn"
                            name="carrierDetailsBtn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const country = document.getElementById("country");
    const state = document.getElementById("hiddenState");
    state.style.display = 'none';
    country.addEventListener("change", function(e) {
        let countryId = country.value;

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

@endsection