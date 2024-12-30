<div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
    <!-- Basic Details -->
    <div class="gt-panel gt-panel-default inViewProfile" id="updateAccountSection" style="display: none">
        <div class="gt-panel-head">
            <span class="pull-left"><i class="fa fa-file"></i>Account Details({{ $prefix->name }} -
                {{ $user->id }})</span>
            <a class="pull-right btn gt-btn-orange" data-toggle="modal" data-backdrop ="static" data-keyboard="false"
                data-target="#dynamicUpdateModal" data-info={{ $user->id }} id="updateAccountBtn">
                <i class="fas fa-pencil-alt fa-fw"></i>
                <font class="gt-margin-left-5">Update</font>
            </a>

            {{-- <x-edit-form-field-component :user="$user" :fields="$fields" :actionUrl="route('profile.update')" :id="$user->id" /> --}}
        </div>
        @php
            $fields = config('formFields.editAccountDetails');
        @endphp
        <div class="gt-panel-body">
            <div class="row">

                <form id="userAccountDetailsForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="gt-panel-body">
                        <div class="row">
                            @foreach ($fields as $field)
                                @switch($field['type'])
                                    @case('select')
                                        <x-select-profile-update-component :user="$user" :name="$field['name']" :label="$field['label']"
                                            :options="$field['options']" :rules="$field['rules']" />
                                    @break

                                    @default
                                        <x-input-profile-update-component :user="$user" :name="$field['name']" :label="$field['label']"
                                            :rules="$field['rules']" type="text" />
                                @endswitch
                            @endforeach


                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /. Basic Details -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("editAccountBtn").addEventListener("click", function() {
            document.getElementById("editAccountSection").style.display = 'none';
            document.getElementById("updateAccountSection").style.display = 'block';
        });
        let updateUserAccountBtn = document.getElementById("updateAccountBtn");
        if (updateUserAccountBtn) {
            updateUserAccountBtn.addEventListener("click", function() {
                const name = document.getElementById('name')?.value;
                const email = document.getElementById('user_email')?.value;
                const profileFor = document.getElementById('profile_for')?.value;
                const country = document.getElementById('country')?.value;
                const state = document.getElementById('hstate')?.value;
                const city = document.getElementById('hcity')?.value;
                console.log(email, name);

                $.ajax({
                    url: "{{ route('account.details.update') }}",
                    method: "PATCH",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        user_email: email,
                        profile_for: profileFor,
                        country: country,
                        state: state,
                        city: city,
                    },
                    success: function(response) {
                        $('#updateAccountBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateAccountSection").style
                                .display = 'none';
                            document.getElementById("editAccountSection").style.display =
                                'block';

                            $('#userName').text(response.user.name);
                            $('#userEmail').text(response.user.email);
                            $('#userProfileFor').text(response.user.profile_for);
                            $('#userCountry').text(response.user.country);
                            $('#userState').text(response.user.state);
                            $('#userCity').text(response.user.city);
                            $('#accountDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#accountDetailsAlert').html(`
    <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
        ${response.message}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
`);
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this).remove();
                                });
                            }, 10000);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        } else {
            console.error("Update User Account button not found!");
        }
    });
</script>
