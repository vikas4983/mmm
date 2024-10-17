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
                @include('partials.alerts')
                <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
                <form action="{{ route('carrierDetails.store') }}" method="post">
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
        const employee = document.getElementById("employee");
        const occupation = document.getElementById("hiddenOccupation");
        employee.addEventListener("change", function() {
            const employeeId = employee.value;
            console.log(employeeId);
            if (employeeId) {
                occupation.style.display = 'block';
                $.ajax({
                    url: '/get-occupation/' + employeeId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $("#occupation").empty();
                        $("#occupation").append('<option value="">Select </option>');
                        $.each(data, function(key, value) {
                            $('#occupation').append('<option value="' + value.id + '">' + value
                                .occupation + '</option>');
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

                $('#occupation').fadeOut();
                $('#occupation').empty();
                $('#occupation').append('<option value="">Select occupation</option>');
            }
        });
    </script>
@endsection
