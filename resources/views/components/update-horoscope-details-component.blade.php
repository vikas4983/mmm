<div class="gt-panel gt-panel-default" id="updateHoroscopeSection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            @php
                $fields = config('formFields.editHoroscopeDetails');

            @endphp
            <i class="fa fa-book"></i>Horoscope Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateHoroscopeBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>
    <form id="horoscopeDetailsForm">
        <div class="gt-panel-body">
            <div class="row">
                @foreach ($fields as $field)
                    @switch($field['type'])
                        @case('select')
                            <x-select-profile-update-component :user="$user" :name="$field['name']" :label="$field['label']"
                                :options="$field['options']" :rules="$field['rules']" />
                        @break

                        {{-- @case('radio')
                        <x-radio-profile-update-component :user="$user" :name="$field['name']" :label="$field['label']" :options="$field['options']" :selected="old($field['name'])" />
                        @break --}}

                        @default
                            <x-input-profile-update-component :user="$user" :name="$field['name']" :label="$field['label']"
                                :rules="$field['rules']" type="text" />
                    @endswitch
                @endforeach


            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById("editHoroscopeBtn").addEventListener("click", function() {
            console.log('vikas');
            document.getElementById("editHoroscopeSection").style.display = 'none';
            document.getElementById("updateHoroscopeSection").style.display = 'block';
        });
        let updateHoroscopeBtn = document.getElementById("updateHoroscopeBtn");
        let form = document.getElementById("updateHoroscopeBtn");
        if (updateHoroscopeBtn) {
            updateHoroscopeBtn.addEventListener("click", function() {

                const timeOfBirth = document.getElementById('time_of_birth')?.value;
                const manglik = document.getElementById('manglik')?.value;
                const placeOfBirth = document.getElementById('city')?.value;
                const rashi = document.getElementById('rashi')?.value;
                const horoscopeMatch = document.getElementById('horoscope_match')?.value;
                const horoscopeShow = document.getElementById('horoscope_show')?.value;
                console.log(placeOfBirth);
                $.ajax({
                    url: "{{ route('update.horoscope.details') }}",
                    method: "PATCH",
                    data: {
                        _token: "{{ csrf_token() }}",
                        time_of_birth: timeOfBirth,
                        manglik: manglik,
                        place_of_birth: placeOfBirth,
                        rashi: rashi,
                        horoscope_match: horoscopeMatch,
                        horoscope_show: horoscopeShow,
                    },
                    success: function(response) {
                        $('#updateBasicBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateHoroscopeSection").style
                                .display = 'none';
                            document.getElementById("editHoroscopeSection").style.display =
                                'block';

                            $('#userBirthTime').text(response.user.time_of_birth);
                            $('#userManglik').text(response.user.manglik);
                            $('#userPlaceOfBirth').text(response.user.place_of_birth);
                            $('#userRashi').text(response.user.rashi);
                            $('#userHoroscopeMatch').text(response.user.horoscope_match);
                            $('#userHoroscopeShow').text(response.user.horoscope_show);
                            $('#horoscopeDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });

                            // Dynamically update the alert content
                            $('#horoscopeDetailsAlert').html(`
    <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
        ${response.message}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
`);

                            // Automatically fade out the alert after 1.5 seconds
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this).remove();
                                });
                            }, 1500);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        } else {
            console.error("Update Horoscope button not found!");
        }
    });
</script>
