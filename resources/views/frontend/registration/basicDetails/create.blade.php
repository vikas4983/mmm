@extends('layouts.frontend.master')
@section('title', 'Basic Details')

@section('content')

    {{-- <style>
        h4 {
            margin-top: 25px;
            margin-bottom: -3px;
        }
    </style>

    <div class="container col-lg-8" style=" min-height: 100vh;">
        <div class="card w-100" style="min-width: 600px;">
            <div class="card-body ">
                <div class="row text-center">
                    <h4 class="text-dark mt-30px">Register</h4>
                </div>

                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @php
                        $fields = config('formFields.register');
                    @endphp
                    <x-form-fields-component :fields="$fields" />
                    <div class="row text-center">
                        <button class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div> --}}



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
                <p>You have many matching profiles based on your details. Completing this page will take you closer to your
                    perfect match.</p>
            </article>
            <div id="message"></div>
            <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
            <br><br>

            <form id="basicDetailsForm" action="{{ route('basicDetails.store') }}" method="post" name="basicDetails">
                @csrf
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

            </form>
        </div>
    </div>

    <script>
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
                    } else {
                        document.getElementById("message").innerHTML = `<div class="alert alert-danger">
                    ${data.message}
                </div>`;
                        basicDetailsBtn.disabled = true;

                    }
                })
                .catch(error => {
                    basicDetailsBtn.disabled = false;
                    console.error('Error:', error);
                    document.getElementById("message").innerText =
                        'An error occurred while submitting the form.';
                });
        });
    </script>
    <script>
        const religion = document.getElementById("religion");
        const caste = document.getElementById("hiddenCaste");
        caste.style.display = 'none';
        religion.addEventListener("change", function(e) {
            let religionId = religion.value;
            console.log(religionId);
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

                $(caste).fadeOut();
                $('#caste').empty();
                $('#caste').append('<option value="">Select Caste</option>');
            }
        });
    </script>
@endsection
