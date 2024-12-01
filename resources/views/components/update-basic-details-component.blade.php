@php
    $optionKeys = [
        'profileFors',
        'heights',
        'motherTongues',
        'religions',
        'maritalStatuses',
        'rashies',
        'countries',
        'educations',
        'employees',
        'occupations',
        'incomes',
        'fatherOccupations',
        'motherOccupations',
        'bodyTypes',
        'complexions',
        'bloodGroups',
        'habits',
        'physicalStatuses',
        'hobbies',
        'interests',
        'musics',
        'dresses',
        'movies',
        'sports',
    ];
    $optionData = [];
    foreach ($optionKeys as $key) {
        $optionData[$key] = Cache::get($key);
    }
    extract($optionData);

@endphp
<div class="gt-panel gt-panel-default" id="updateBasicSection" style="display: none">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-book"></i>Basic Information</span>
        <a class="pull-right btn gt-btn-orange" id="updateBasicBtn">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
        </a>
    </div>

    <form id="basicDetailsForm">

        @csrf
        @method('PATCH')
        <div class="gt-panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="height"><b class="text-danger mr-5 gtRegMandatory">*</b>Height</label>

                        <select id="height" name="height" class="form-control" required>
                            <option value="">Select Height</option>
                            @foreach ($heights as $height)
                                <option value="{{ $height->id }}"
                                    {{ old('height', $user->basicDetails->heights->id) == $height->id ? 'selected' : '' }}>
                                    {{ $height->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('height')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-1 d-flex align-items-center justify-content-center">
                    <!-- Spacer column -->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_tongue"><b class="text-danger mr-5 gtRegMandatory">*</b>Mother Tongue</label>
                        <select id="mother_tongue" name="mother_tongue" class="form-control" required>
                            <option value="">Select Mother Tongue</option>
                            @foreach ($motherTongues as $motherTongue)
                                <option value="{{ $motherTongue->id }}"
                                    {{ old('mother_tongue', $user->basicDetails->motherTongues->id) == $motherTongue->id ? 'selected' : '' }}>
                                    {{ $motherTongue->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('mother_tongue')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion"><b class="text-danger mr-5 gtRegMandatory">*</b>Religion</label>
                        <select id="religion" name="religion" class="form-control" disabled required>
                            <option value="">Select Religion</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}"
                                    {{ old('religion', $user->basicDetails->religions->id) == $religion->id ? 'selected' : '' }}>
                                    {{ $religion->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('religion')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center justify-content-center">
                    <!-- Spacer column -->
                </div>
                <div class="col-md-6" id="editCaste">
                    <div class="form-group">
                        <label for="caste"><b class="text-danger mr-5 gtRegMandatory">*</b>Caste</label>
                        <select id="caste" name="caste" class="form-control" required>
                            {{-- <option value="">Select Caste</option> --}}
                            @foreach ($user->basicDetails->religions->castes as $caste)
                                <option value="{{ $caste->id }}"
                                    {{ old('caste', $user->basicDetails->castes->id) == $caste->id ? 'selected' : '' }}>
                                    {{ $caste->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('caste')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="marital_status"><b class="text-danger mr-5 gtRegMandatory">*</b>Marital
                            Status</label>
                        <select id="marital_status" name="marital_status" class="form-control" required disabled>
                            @foreach ($maritalStatuses as $maritalStatus)
                                <option value="{{ $maritalStatus->id }}"
                                    {{ old('marital_status', $user->basicDetails->maritalStatus->id) == $maritalStatus->id ? 'selected' : '' }}>
                                    {{ $maritalStatus->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('marital_status')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="col-md-1 d-flex align-items-center justify-content-center">
                    <!-- Spacer column -->
                </div>
                <div class="col-md-6" id="editCaste">
                    <div class="form-group">
                        <label for="children"><b class="text-danger mr-5 gtRegMandatory">*</b>Children</label>
                        <select id="children" name="children" class="form-control">
                            <option value="0"
                                {{ old('children', $user->basicDetails->children ?? 'None') == 'None' ? 'selected' : '' }}>
                                None
                            </option>
                            <option value="1"
                                {{ old('children', $user->basicDetails->children ?? 'One') == 'One' ? 'selected' : '' }}>
                                One
                            </option>
                            <option value="2"
                                {{ old('children', $user->basicDetails->children ?? 'Two') == 'Two' ? 'selected' : '' }}>
                                Two
                            </option>
                            <option value="3"
                                {{ old('children', $user->basicDetails->children ?? 'Three') == 'Three' ? 'selected' : '' }}>
                                Three
                            </option>
                            <option value="4"
                                {{ old('children', $user->basicDetails->children ?? 'Four') == 'Four' ? 'selected' : '' }}>
                                Four
                            </option>
                        </select>
                        @error('children')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6" id="editCaste">
                    <div class="form-group">
                        <label for="other_caste_marriage"><b class="text-danger mr-5 gtRegMandatory">*</b>Willing To marry in other caste?</label>
                        <select id="other_caste_marriage" name="other_caste_marriage" class="form-control">
                            <option value="1"
                                {{ old('other_caste_marriage', $user->basicDetails->other_caste_marriage ?? 'Yes') == 'Yes' ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="0"
                                {{ old('other_caste_marriage', $user->basicDetails->other_caste_marriage ?? 'No') == 'No' ? 'selected' : '' }}>
                                No
                            </option>

                        </select>
                        @error('other_caste_marriage')
                            <span class="text-danger" style="font-size: 0.8em;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>


        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editBasic = document.getElementById("editBasic");
        let editBasicSection = document.getElementById("editBasicSection");
        let updateBasicSection = document.getElementById("updateBasicSection");
        let updateBasicBtn = document.getElementById("updateBasicBtn");
        if (editBasic) {
            editBasic.addEventListener("click", function() {
                console.log('Edit button clicked');
                if (updateBasicSection && editBasicSection) {
                    updateBasicSection.style.display = "block";
                    editBasicSection.style.display = "none";
                }
            });
        }
        if (updateBasicBtn) {
            updateBasicBtn.addEventListener("click", function(e) {
                e.preventDefault();
                const height = document.getElementById('height')?.value;
                const motherTongue = document.getElementById('mother_tongue')?.value;
                const caste = document.getElementById('caste')?.value;
                const children = document.getElementById('children')?.value;
                const otherCasteMarriage = document.getElementById('other_caste_marriage')?.value;
                $.ajax({
                    url: "{{ route('update.basic.details') }}",
                    method: "PATCH",
                    data: {
                        _token: "{{ csrf_token() }}",
                        height: height,
                        mother_tongue: motherTongue,
                        children: children,
                        caste: caste,
                        other_caste_marriage: otherCasteMarriage,
                    },
                    success: function(response) {
                        $('#updateBasicBtn').prop('disabled', false);
                        if (response.success) {
                            updateBasicSection.style.display = "none";
                            editBasicSection.style.display = "block";
                            $('#userHeight').text(response.user.height);
                            $('#userMotherTongue').text(response.user.mother_tongue);
                            $('#userCaste').text(response.user.caste);
                            $('#userChildren').text(response.user.children);
                            $('#userOtherCasteMarrige').text(response.user.otherCasteMarriage);
                            $('#basicDetailsAlert').get(0).scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            $('#basicDetailsAlert').html(`
                             <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 role="alert">
                                 ${response.message}
                              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                                  `);
                            setTimeout(function() {
                                $('.alert').fadeOut('slow', function() {
                                    $(this)
                                        .remove();
                                });
                            }, 1500);

                        } else {
                            alert('Failed to update details. Please try again.');
                        }
                    },

                });
            });
        }
    });
</script>
