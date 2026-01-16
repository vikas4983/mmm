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
            @include('alerts.alert')
            <h3 class="gt-text-green mb-10 fontMerriWeather">
                <i class="fa fa-user mr-10"></i>Basic Information
            </h3>
            <article>
                <p>You have many matching profiles based on your details. Completing this page will take you closer to
                    your
                    perfect match.</p>
            </article>
            <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
            <br><br>
            <form action="{{ route('basicDetails.store') }}" method="POST">
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
        </div>
        </form>
    </div>
    </div>
    <script>
        const dob = document.getElementById('dob');
        if (dob) {
            const today = new Date();
            const maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());
            const minDate = new Date(1900, 0, 1);
            const formatForInput = (date) => {
                const d = String(date.getDate()).padStart(2, '0');
                const m = String(date.getMonth() + 1).padStart(2, '0');
                const y = date.getFullYear();
                return `${y}-${m}-${d}`;
            };
            dob.setAttribute('min', formatForInput(minDate));
            dob.setAttribute('max', formatForInput(maxDate));
            dob.value = formatForInput(maxDate);
            dob.addEventListener('change', function() {
                const selected = new Date(this.value);
                const day = String(selected.getDate()).padStart(2, '0');
                const month = String(selected.getMonth() + 1).padStart(2, '0');
                const year = selected.getFullYear();
                const formattedDate = `${day}/${month}/${year}`;
            });
        }
    </script>
    <script>
        const religion = document.getElementById("religion");
        const maritalStatus = document.getElementById("marital_status");
        const caste = document.getElementById("hiddenCaste");
        const children = document.getElementById("hiddenChildren");
        const loader = document.getElementById('loader');
        caste.style.display = 'none';
        children.style.display = 'none';
        religion.addEventListener("change", function(e) {
            let religionId = religion.value;
            if (religionId) {
                loader.style.display = 'flex';
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 1000);
                $.ajax({
                    url: '/get-caste/' + religionId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        caste.style.display = 'block';
                        $("#caste").html(data.castes);
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
                caste.style.display = 'none';
            }
        });
        maritalStatus.addEventListener("change", function(e) {
            let maritalStatusId = maritalStatus.value;
            const selectOptions = maritalStatus.options[maritalStatus.selectedIndex].text.trim();
            if (selectOptions === 'Awaiting Divorce' ||
                selectOptions === 'Divorced' ||
                selectOptions === 'Widowed' ||
                selectOptions === 'Annulled') {
                children.style.display = 'block';
            } else {
                children.style.display = 'none';

            }
        });
    </script>

@endsection
