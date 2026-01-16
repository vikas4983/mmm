<div class="gt-panel gt-panel-default" id="updateCarrierSection" style="display: none;">
    <div class="gt-panel-head">
        <span class="pull-left">
            @php
                $fields = config('formFields.editCarrierDetails');

            @endphp
            <i class="fa fa-book"></i>Carrier Information </span>
        <a class="pull-right btn gt-btn-orange" id="updateCarrierBtn">
            <i class="fa fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>
    <form id="carrierDetailsForm" method="POST">
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

        document.getElementById("editCarrierBtn").addEventListener("click", function() {
            console.log('vikas');
            document.getElementById("editCarrierSection").style.display = 'none';
            document.getElementById("updateCarrierSection").style.display = 'block';
        });
        let updateHoroscopeBtn = document.getElementById("updateCarrierBtn");
        let form = document.getElementById("updateCarrierBtn");
        if (updateCarrierBtn) {
            updateCarrierBtn.addEventListener("click", function() {

                const education = document.getElementById('education')?.value;
                const employee = document.getElementById('employee')?.value;
                const occupation = document.getElementById('occupation')?.value;
                const income = document.getElementById('income')?.value;
                const organizationName = document.getElementById('organization_name')?.value;
                const schoolName = document.getElementById('school_name')?.value;
                const collegeName = document.getElementById('college_name')?.value;
                const sittledAbroad = document.getElementById('interested_abroad')?.value;

                $.ajax({
                    url: "{{ route('update.carrier.details') }}",
                    method: "PATCH",
                    data: {
                        _token: "{{ csrf_token() }}",
                        education: education,
                        employee: employee,
                        occupation: occupation,
                        income: income,
                        organization_name: organizationName,
                        school_name: schoolName,
                        college_name: collegeName,
                        interested_abroad: sittledAbroad,
                    },
                    success: function(response) {
                        $('#updateCarrierBtn').prop('disabled', false);
                        if (response.success) {
                            document.getElementById("updateCarrierSection").style
                                .display = 'none';
                            document.getElementById("editCarrierSection").style.display =
                                'block';

                            $('#userEducation').text(response.user.education);
                            $('#userEmployee').text(response.user.employee);
                            $('#userOccupation').text(response.user.occupation);
                            $('#userIncome').text(response.user.income);
                            $('#userOrganizationName').text(response.user.organization_name);
                            $('#userSchoolName').text(response.user.school_name);
                            $('#userCollegeName').text(response.user.college_name);
                            $('#userInterestedAbroad').text(response.user
                                .interested_abroad);
                            $('#carrierDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'center',
                                inline: 'nearest' // Ensures the alert is visible at the center of the viewport
                            });
                            $('#carrierDetailsAlert').html(`
    <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
        ${response.message}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
    </div>
`);
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
            console.error("Update Carrier button not found!");
        }
    });
</script>
<script>
    const employee = document.getElementById("employee");
    const occupation = document.getElementById("occupation");
    employee.addEventListener("change", function() {
        const employeeId = employee.value;
       
        if (employeeId) {
        
            $.ajax({
                url: '/get-occupation/' + employeeId,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $("#occupation").empty();
                    $("#occupation").append();
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

