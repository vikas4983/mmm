@extends('layouts.frontend.master')
@section('title', 'Family Details')
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
                    <i class="fa fa-user mr-10"></i>Family Details
                </h3>
                <article>
                    <p>You have many matching profiles based on your details. Completing this page will take you closer to
                        your
                        perfect match.</p>
                </article>
                @include('alerts.alert')
                <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                <form action="{{ route('familyDetails.store') }}" method="post">
                    @csrf
                    @php
                        $fields = config('formFields.familyDetails');
                        
                       
                    @endphp
                    <x-form-fields-component :fields="$fields" />
                    <div class="row form-group">
                        <div class="col-xxl-16 text-center">
                            <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10" id="horoscopesDetailsBtn"
                                name="horoscopesDetailsBtn">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
   
    <script>
        const country = document.getElementById("country");
        const state = document.getElementById("hiddenState");
        const state1 = document.getElementById("state");
        const city = document.getElementById("hiddenCity");
        const CountryLoader = document.getElementById('country-loader');
        const stateLoader = document.getElementById('state-loader');
    
        state.style.display = 'none';
        country.addEventListener("change", function(e) {
            let countryId = country.value;
            console.log(countryId);
            if (countryId) {
                
               if(CountryLoader){
                CountryLoader.style.display = 'flex';
                setTimeout(function() {
                    CountryLoader.style.display = 'none';
                }, 1000);
               }
    
                $.ajax({
                    url: '/get-state/' + countryId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        state.style.display = 'block';
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
                state.style.display = 'none';
            }
        });
    
        city.style.display = 'none';
        state1.addEventListener("change", function(e) {
            let stateId = state1.value;
            if (stateId) {
                stateLoader.style.display = 'flex';
                setTimeout(function() {
                    stateLoader.style.display = 'none';
                }, 1000);
    
                $.ajax({
                    url: '/get-city/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        city.style.display = 'block';
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
                city.style.display = 'none';
            }
        });
    </script>
@endsection
