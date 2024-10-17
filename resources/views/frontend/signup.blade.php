@extends('layouts.frontend.master')
@section('title', 'Basic Details')
@section('content')
    <div id="Horoscope-Details">

    </div>
    <div id="Basic-Details">
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

                <form id="multiStepForm" method="POST">
                    @csrf

                    <!-- Step 1: Basic Info -->
                    <div id="basicDetails">
                        <h3 class="gt-text-green mb-10 fontMerriWeather">
                            <i class="fa fa-user mr-10"></i><span id="heading">Bsaic Details</span>
                        </h3>
                        <article>
                            <p>You have many matching profiles based on your details. Completing this page will take you
                                closer to
                                your
                                perfect match.</p>
                        </article>
                        {{-- Success/Error alert --}}
                        <div id="alertBasic"></div>
                        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                        <br><br>
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
                    <div id="horoscopeDetails" style="display:none">
                        <h3 class="gt-text-green mb-10 fontMerriWeather">
                            <i class="fa fa-user mr-10"></i><span id="heading">Horoscope Details</span>
                        </h3>
                        <article>
                            <p>You have many matching profiles based on your details. Completing this page will take you
                                closer to
                                your
                                perfect match.</p>
                        </article>
                        {{-- Success/Error alert --}}
                        <div id="alertHoroscope"></div>
                        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                        <br><br>
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
                    <div id="carrierDetails" style="display:none">
                        <h3 class="gt-text-green mb-10 fontMerriWeather">
                            <i class="fa fa-user mr-10"></i><span id="heading">Carrier Details</span>
                        </h3>
                        <article>
                            <p>You have many matching profiles based on your details. Completing this page will take you
                                closer to
                                your
                                perfect match.</p>
                        </article>
                        {{-- Success/Error alert --}}
                        <div id="alertCarrier"></div>
                        <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                        <br><br>
                        {{-- @php
                            $fields = config('formFields.carrierDetails');

                        @endphp
                        <x-form-fields-component :fields="$fields" /> --}}
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
        <script>
            document.getElementById('basicDetailsBtn').addEventListener('click', function(e) {
                e.preventDefault();
                let formData = new FormData(document.getElementById('multiStepForm'));
                fetch('{{ route('basicDetails.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status === 'success') {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            
                            document.getElementById("alertHoroscope").innerHTML = `
                <div class="alert alert-success">
                    ${data.message}
                </div>
            `;
                            document.getElementById('basicDetailsBtn').disabled = true;
                            document.getElementById('basicDetails').style.display = 'none';
                            document.getElementById('horoscopeDetails').style.display = 'block';
                            // document.getElementById('step2').style.display = 'block';
                        } else {
                            document.getElementById("messagen").innerHTML = `
                <div class="alert alert-error">
                    ${data.message}
                </div>
            `;

                        }
                    });
            });

            document.getElementById('horoscopeDetailsBtn').addEventListener('click', function(e) {
                e.preventDefault();
                let formData = new FormData(document.getElementById('multiStepForm'));
                fetch('{{ route('horoscopes.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                            document.getElementById("alertCarrier").innerHTML = `
                <div class="alert alert-success">
                    ${data.message}
                </div>
            `;
                            document.getElementById('horoscopeDetailsBtn').disabled = true;
                            document.getElementById('horoscopeDetails').style.display = 'none';
                            document.getElementById('carrierDetails').style.display = 'block';
                        } else {}
                    });
            });
        </script>

        {{-- <script>
            let basicDetailsBtn = document.getElementById("basicDetailsBtn");
            let basicDetailsForm = document.getElementById("basicDetailsForm");
            basicDetailsForm.addEventListener("submit", function(e) {
                e.preventDefault();
                basicDetailsBtn.disabled = true;
                const formData = new FormData(this);
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }
                fetch('{{ route('basicDetails.store') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })

                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById("message").innerHTML = `<div class="alert alert-success">
                    ${data.message}
                </div>`;
                            //basicDetailsForm.reset(); // Reset the form
                            basicDetailsBtn.disabled = true;
                            document.getElementById("Horoscope-Details").innerHTML = data.html;
                            document.getElementById("message").innerHTML = `<div class="alert alert-success">
                    ${data.message}
                </div>`;
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth' // You can also use 'auto' for an instant scroll
                            });
                            document.getElementById("Basic-Details").style.display = 'none';
                        } else {
                            document.getElementById("message").innerHTML = `<div class="alert alert-danger">
                    ${data.message}
                </div>`;
                            basicDetailsBtn.disabled = false;
                        }
                    })
                    .catch(error => {
                        basicDetailsBtn.disabled = false;
                        console.error('Error:', error);
                        document.getElementById("message").innerText =
                            'An error occurred while submitting the form.';
                    });
            });
        </script> --}}

        <script>
            const religion = document.getElementById("religion");
            const caste = document.getElementById("hiddenCaste");
            caste.style.display = 'none';
            religion.addEventListener("change", function(e) {
                let religionId = religion.value;

                if (religionId) {
                    caste.style.display = 'block';
                    $.ajax({
                        url: '/get-caste/' + religionId,
                        type: 'GET',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $("#caste").empty();
                            $("#caste").append('<option value="">Select Caste</option>');
                            $.each(data, function(key, value) {
                                $('#caste').append('<option value="' + value.id + '">' + value
                                    .name + '</option>');
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

                    $('#caste').fadeOut();
                    $('#caste').empty();
                    $('#caste').append('<option value="">Select Caste</option>');
                }
            });
        </script>
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
        </script>

    </div>

@endsection
