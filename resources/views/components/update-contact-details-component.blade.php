<div class="gt-panel gt-panel-default" id="updateContactSection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            @php
                $fields = config('formFields.editContactDetails');

            @endphp
            <i class="fa fa-book"></i>Contact Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateContactBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>
    <form id="userContactDetailsForm" method="POST">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById("editContactBtn").addEventListener("click", function() {

            document.getElementById("editContactSection").style.display = 'none';
            document.getElementById("updateContactSection").style.display = 'block';
        });
        let updateUserFamilyBtn = document.getElementById("updateContactBtn");
        let form = document.getElementById("updateContactBtn");
        if (updateUserFamilyBtn) {
            updateUserFamilyBtn.addEventListener("click", function() {
                const alternateMobile = document.getElementById('alternate_mobile')?.value;
                const alternateOwned = document.getElementById('alternate_owned_by')?.value;
                const landlineNumber = document.getElementById('landline_number')?.value;
                const landlineOwned = document.getElementById('landline_owned_by')?.value;
                const address = document.getElementById('address')?.value;
                $.ajax({
                    url: "{{ route('update.contact.details') }}",
                    method: "PATCH",
                    data: {
                        _token: "{{ csrf_token() }}",
                        alternate_mobile: alternateMobile,
                        alternate_owned_by: alternateOwned,
                        landline_number: landlineNumber,
                        landline_owned_by: landlineOwned,
                        address: address,
                        
                    },
                    success: function(response) {
                        $('#updateContactBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateContactSection").style
                                .display = 'none';
                            document.getElementById("editContactSection").style.display =
                                'block';

                            $('#userAlternateMobile').text(response.user.alternate_mobile);
                            $('#userAlternateOwned').text(response.user.alternate_owned_by);
                            $('#userLandlineNumber').text(response.user.landline_number);
                            $('#userLandlineOwned').text(response.user.landline_owned_by);
                            $('#userAddress').text(response.user.address);
                         
                         


                            $('#userContactDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#userContactDetailsAlert').html(`
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
            console.error("Update User Contact button not found!");
        }
    });
</script>
