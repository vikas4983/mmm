 @extends('layouts.frontend.master')
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
             <div id="message"></div>
             <h3 class="gt-text-green mb-10 fontMerriWeather">
                 <i class="fa fa-user mr-10"></i>Horoscope Details
             </h3>
             <article>
                 <p>You have many matching profiles based on your details. Completing this page will take you closer to
                     your
                     perfect match.</p>
             </article>
             @include('partials.alerts')
             <b class="text-danger mr-5 gtRegMandatory">*</b><b class="gt-text-Grey">Mandatory fields</b>
             <br>
            <form action="{{ route('horoscopes.store') }}" method="POST">
                 @csrf
                 @php
                     $fields = config('formFields.horoscopeDetails');

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

     {{-- <script>
         let horoscopesDetailsBtn = document.getElementById("horoscopesDetailsBtn");
         let horoscopesDetailsForm = document.getElementById("horoscopesDetailsForm");
         horoscopesDetailsForm.addEventListener("submit", function(e) {
             e.preventDefault();
             horoscopesDetailsBtn.disabled = true;
             const formData = new FormData(this);
             for (let [key, value] of formData.entries()) {
                 console.log(key, value);
             }
             fetch('{{ route('horoscopes.store') }}', {
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
                         horoscopesDetailsBtn.disabled = true;
                         document.getElementById("horoscopePage").style.display = 'none';
                         document.getElementById("carrierDetailsPage").innerHTML = data.html;
                         document.getElementById("message").innerHTML = `<div class="alert alert-success">
                    ${data.message}
                </div>`;
                         window.scrollTo({
                             top: 0,
                             behavior: 'smooth'
                         });

                      
                     } else {
                         document.getElementById("message").innerHTML = `<div class="alert alert-danger">
                            ${data.message}
                        </div>`;
                         horoscopesDetailsBtn.disabled = false;
                     }
                 })
                 .catch(error => {
                     horoscopesDetailsBtn.disabled = false;
                     console.error('Error:', error);
                     document.getElementById("message").innerText =
                         'An error occurred while submitting the form.';
                 });
         });
     </script> --}}
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
 @endsection
