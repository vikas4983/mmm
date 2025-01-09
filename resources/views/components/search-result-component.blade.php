@extends('layouts.frontend.main-master')
@section('title', 'Search Result')
@section('content')
<div class="container mt-20 ">
    <div class="row">
        <div class="row" bis_skin_checked="1">
            <aside class="col-xxl-4 col-xl-4 col-xs-16">
                <div class="gt-panel gt-panel-orange" bis_skin_checked="1">
                    <div class="gt-panel-head gt-border-radius-5"
                        style="margin-bottom: 11px; margin-top: 11px; padding:9px">
                        <div class="panel-title text-center">
                            <div class="thumbnail gt-margin-bottom-0 inHomeMainThumb" bis_skin_checked="1">
                                <img src="http://localhost:8000/storage/users/images/1961734893113.jpg"
                                    class="img-responsive gtFullWidth" alt="User Image">
                                <a href="http://localhost:8000/my-photos" class="gt-myhome-caption ripplelink">

                                </a><a href="http://localhost:8000/my-photos">
                                    <i class="fa fa-camera gt-margin-right-10"></i><span class="">Change Profile
                                        Picture</span>
                                </a>

                            </div>
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true"
                                aria-controls="collapseExample" class="gt-refine">
                                <i class="fa fa-filter gt-margin-right-10 mt-15"></i>Refine Search
                                <i class="fa fa-caret-down gt-margin-left-10"></i>
                            </a>
                        </div>
                    </div>

                    <div class="gt-filter-result collapse in" id="collapseExample" bis_skin_checked="1"
                        aria-expanded="true" style="">
                        <form name="frm_filter" id="frm_filter" method="post" action="">

                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1">
                                            <b>Religion</b>
                                        </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearreligion();" class="gt-cursor">
                                                    <i class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="gt-filter-border col-xs-16" bis_skin_checked="1">
                                            @foreach ($options['religions'] as $religion)
                                                <div class="row" bis_skin_checked="1">
                                                    <label for="filter-952" class="col-xs-16">
                                                        <div class="row" bis_skin_checked="1">
                                                            <span class="col-xs-3">
                                                                <input type="checkbox" id="{{ $religion->id }}"
                                                                    name="religion[]" value="{{ $religion->id }}"
                                                                    class="gt-cursor pull-left gt-margin-right-10"
                                                                    {{ old('religion', $user->basicDetails->religions->id) === $religion->id ? 'checked' : '' }}>
                                                            </span>
                                                            <span class="gt-cursor col-xs-10">
                                                                {{ $religion->name ?? '' }} </span>
                                                            <span class="col-xs-3">
                                                                <span class="badge">0</span>
                                                            </span>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1"
                                style="display: none;">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1">
                                            <b>Caste</b>
                                        </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearcaste();" class="gt-cursor">
                                                    <i class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                    <div class="row" id="users_caste" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            <div class="col-xs-16 " bis_skin_checked="1">
                                                <h5
                                                    class="text-center gt-margin-top-0px gt-margin-bottom-0px gt-font-weight-700">

                                                </h5>
                                            </div>
                                            <div class="clearfix" bis_skin_checked="1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Latest Register Profile</b>
                                        </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearprofilelatestreg();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-1">
                                                <input type="radio" name="profile_latest_register" id="f-1"
                                                    value="1"> <span class="gt-margin-left-10 gt-cursor">Today
                                                    Register
                                                    Profile</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-2">
                                                <input type="radio" name="profile_latest_register" id="f-2"
                                                    value="2"> <span class="gt-margin-left-10 gt-cursor">Last
                                                    Three Days
                                                    Register Profile</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-3">
                                                <input type="radio" name="profile_latest_register" id="f-3"
                                                    value="3"> <span class="gt-margin-left-10 gt-cursor">Last
                                                    Week
                                                    Register Profile</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16 gt-padding-top-5" bis_skin_checked="1">
                                            <label for="f-4">
                                                <input type="radio" name="profile_latest_register" id="f-4"
                                                    value="4"> <span class="gt-margin-left-10 gt-cursor">Last
                                                    Month
                                                    Register Profile</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Profile Type</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearphoto();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <label for="f-1">
                                                <input type="radio" name="photo_search" id="f-1"
                                                    value="Yes">
                                                <span class="gt-margin-left-10 gt-cursor">With Photo</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <label for="f-3">
                                                <input type="radio" name="photo_search" id="f-3"
                                                    value="horoscope">
                                                <span class="gt-margin-left-10 gt-cursor">Profile With Horoscope</span>
                                            </label>
                                        </div>
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <label for="f-2">
                                                <input type="radio" name="photo_search" id="f-2"
                                                    value="" checked=""> <span
                                                    class="gt-margin-left-10 gt-cursor">Does not
                                                    matter</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Marital Status</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearmstatus();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        @foreach ($options['maritalStatuses'] as $maritalStatus)
                                            <div class="row" bis_skin_checked="1">
                                                <label for="marital_status" class="col-xs-16">
                                                    <div class="row" bis_skin_checked="1">
                                                        <span class="col-xs-3">
                                                            <input type="checkbox" id="{{ $maritalStatus->id }}"
                                                                name="marital_status[]"
                                                                value="{{ $maritalStatus->id }}"
                                                                class="gt-cursor pull-left gt-margin-right-10"
                                                                {{ old('marital_status', $user->basicDetails->maritalStatus->id) == $maritalStatus->id ? 'checked' : '' }}>
                                                        </span>
                                                        <span class="gt-cursor col-xs-10">
                                                            {{ $maritalStatus->name ?? '' }} </span>
                                                        <span class="col-xs-3">
                                                            <span class="badge">0</span>
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Age</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearage();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="from_age" id="from_age">
                                                <option value="null">From </option>

                                            </select>
                                        </div>
                                        <div class="col-xs-4 gt-margin-top-10 text-center" bis_skin_checked="1"> To
                                        </div>
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="to_age" id="to_age">
                                                <option value="null">To</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Height</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearheight();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="from_height" id="from_height">
                                                @foreach ($options['heights'] as $height)
                                                    <option value="{{ $height->id }}">{{ $height->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-xs-4 gt-margin-top-10 text-center" bis_skin_checked="1">To
                                        </div>
                                        <div class="col-xs-6" bis_skin_checked="1">
                                            <select class="form-control" name="to_height" id="to_height">
                                                @foreach ($options['heights'] as $height)
                                                    <option value="{{ $height->id }}">{{ $height->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Education</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return cleareducation();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                    <div class="row" id="education" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            @foreach ($options['educations'] as $education)
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="education">
                                                        <input type="checkbox" id="education" name="education[]"
                                                            value="{{ $education->id }}" class="gt-cursor">
                                                        <span
                                                            class="gt-margin-left-10 gt-cursor name">{{ $education->education }}</span>
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="employee" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Employed In</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearoccupation();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                    <div class="row" id="employee" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            @foreach ($options['employees'] as $employee)
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="employee">
                                                        <input type="checkbox" id="employee" name="employee[]"
                                                            value="{{ $employee->id }}">
                                                        <span
                                                            class="gt-margin-left-10 gt-cursor name">{{ $employee->employee }}</span>
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcaste" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Occupation</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearoccupation();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-5" bis_skin_checked="1">
                                    <div class="row" id="occupation" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">

                                            @foreach ($options['occupations'] as $occupation)
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="occupation">
                                                        <input type="checkbox" id="occupation" name="occupation[]"
                                                            value="{{ $occupation->id }}">
                                                        <span
                                                            class="gt-margin-left-10 gt-cursor name">{{ $occupation->occupation }}</span>
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" bis_skin_checked="1">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>Country Living In</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearcountry();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" bis_skin_checked="1">
                                    <div class="row" id="users" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">

                                            @foreach ($options['countries'] as $country)
                                                <div class="col-xs-16" bis_skin_checked="1">
                                                    <label for="country">
                                                        <input type="checkbox" id="country"
                                                            value="{{ $country->id }}" name="country[]"
                                                            class="gt-cursor"> <span
                                                            class="gt-margin-left-10 gt-cursor name"
                                                            {{ old('country', $user->carrierDetails->countries->country) === $country->id ? 'checked' : '' }}>
                                                            {{ $country->country }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="gt-panel gt-panel-default" id="getstate" bis_skin_checked="1"
                                style="display: none;">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>State</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearstate();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-7" bis_skin_checked="1">
                                    <div class="row" id="users_state" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <h5
                                                    class="text-center gt-margin-top-0px gt-margin-bottom-0px gt-font-weight-700">

                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gt-panel gt-panel-default" id="getcity" bis_skin_checked="1"
                                style="display: none;">
                                <div class="gt-panel-head" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xs-12" bis_skin_checked="1"> <b>City</b> </div>
                                        <div class="col-xs-4" bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <a onclick="return clearcity();" class="gt-cursor"> <i
                                                        class="fa fa-times-circle"></i> Clear </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-panel-body max-height-200" id="left-panel-8" bis_skin_checked="1">
                                    <div class="row" id="users_city" bis_skin_checked="1">
                                        <div class="col-xs-16" bis_skin_checked="1">
                                            <input class="search form-control" placeholder="Search">
                                        </div>
                                        <div class="list" bis_skin_checked="1">
                                            <div class="col-xs-16" bis_skin_checked="1">
                                                <h5
                                                    class="text-center gt-margin-top-0px gt-margin-bottom-0px gt-font-weight-700">

                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </aside>

            <div class="col-xxl-12 col-xl-12 col-xs-16 gt-search-result" id="result" bis_skin_checked="1">
                <h3 class="gt-margin-top-10">Your search results</h3>
                <div id="loaderID" style="position: fixed; left: 50%; top: 50%; z-index: -1; opacity: 0;"
                    bis_skin_checked="1">
                    <div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange" bis_skin_checked="1">
                        <font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font>
                    </div>
                </div>

                <ul id="pagination">
                    <div class="col-xs-16 col-lg-16 col-xxl-12 col-xl-12 gt-search-opt mb-20" style="width: 885px">

                    </div>
                    <script type="text/javascript">
                        function save_search() {
                            $('#txt_saved_search_name').val('');
                            $("#div_saved_search").show();
                            $("#div_success").hide();
                        }
                        $(document).ready(function() {
                            $('.religion').select2({
                                placeholder: "Select religion", // Placeholder टेक्स्ट
                                allowClear: true // Clear बटन सक्षम करें
                            });
                        });
                        $(document).ready(function(e) {
                            $('#sub_saved_search').click(function() {
                                if ($('#txt_saved_search_name').val() == '') {
                                    alert('Please fill up the saved search name.');
                                    return false;
                                } else {
                                    var txt_saved_search_nm = $('#txt_saved_search_name').val();
                                    $.ajax({
                                        type: "POST",
                                        url: "saved_search_query",
                                        data: 'saved_nm=' + txt_saved_search_nm,
                                        success: function(data) {
                                            $("#div_saved_search").hide();
                                            $('#sub_saved_search').hide();
                                            $("#div_success").show();
                                            $("#div_success").html(data);
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                    <div class="alert alert-warning" role="alert" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-xxl-16 col-xs-16" bis_skin_checked="1"></div>
                            <div class="col-xxl-16 col-xs-16" bis_skin_checked="1">
                                <h4 class="">
                                    <i class="fa fa-star gt-text-blue gt-margin-right-10"></i>Spotlight Profile
                                </h4>
                                <p>Blue Header profile is are spotlight profile which was showing top of the search
                                    result.Its
                                    gives 10 times faster results.</p>
                                <p>
                                    <span style="color:red;">
                                        <b>{{ $searchResults->count() ?? '' }}</b>
                                    </span> Profiles found :
                                    <span class="text-muted gt-margin-left-10">


                                    </span>
                                </p>
                                <a data-toggle="modal" data-target="#myModal" onclick="save_search();"
                                    class="btn gt-btn-green gt-cursor">
                                    Add To Saved Search </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-16 text-right" bis_skin_checked="1">
                        <div class="buttons" bis_skin_checked="1">
                            <button class="grid btn gt-btn-green">
                                <i class="fa fa-list gt-margin-right-5"></i>Grid View </button>
                            <button class="list btn gt-btn-green">
                                <i class="fa fa-th gt-margin-right-5"></i>List View </button>
                        </div>
                    </div>
                    <div class="clearfix" bis_skin_checked="1"></div>
                    <script>
                        $('button').on('click', function(e) {
                            if ($(this).hasClass('grid')) {
                                $('#result ul').removeClass('list').addClass('grid');
                            } else if ($(this).hasClass('list')) {
                                $('#result ul').removeClass('grid').addClass('list');
                            }
                        });
                    </script>

                    <x-profile-card-component :searchResults="$searchResults" />

                    <div class="modal fade-in" id="myModal1" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <div class="modal fade-in" id="myModal5" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <div class="modal fade-in" id="myModal6" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <div class="modal fade-in" id="myModal7" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <script src="js/function.js" type="text/javascript"></script>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1">
                        <div class="modal-dialog modal-sm" bis_skin_checked="1">
                            <div class="modal-content " bis_skin_checked="1">
                                <form name="saved_search_form" id="saved_search_form" method="post" action="">
                                    <div class="modal-header" bis_skin_checked="1">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Save Search</h4>
                                    </div>
                                    <div class="modal-body" id="div_saved_search" bis_skin_checked="1">
                                        <label> Saved Search Name : </label>
                                        <div class="form-group" bis_skin_checked="1">
                                            <input type="text" name="txt_saved_search_name"
                                                id="txt_saved_search_name" class="gt-form-control">
                                        </div>
                                    </div>
                                    <div class="modal-body" id="div_success" bis_skin_checked="1"></div>
                                    <div class="modal-footer" bis_skin_checked="1">
                                        <input type="button" class="btn gt-btn-orange" id="sub_saved_search"
                                            value="Submit">
                                        <input type="button" class="btn btn-default" data-dismiss="modal"
                                            value="Close">
                                    </div>
                                </form>
                                <div class="clearfix" bis_skin_checked="1"></div>
                            </div>
                        </div>
                    </div>
                    <style>
                        nav.center-text {
                            background: none;
                        }

                        .current {
                            background: none repeat scroll 0 0 #428bca !important;
                            color: #fff !important;
                        }
                    </style>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            function clearage() {
                $('select[name="from_age"]').find(":selected").attr('selected', false);
                $('select[name="to_age"]').find(":selected").attr('selected', false);
                $("#frm_filter").trigger('change');
            }

            function clearheight() {
                $('select[name="from_height"]').find(":selected").attr('selected', false);
                $('select[name="to_height"]').find(":selected").attr('selected', false);
                $("#frm_filter").trigger('change');
            }

            function clearmstatus() {
                $('input[name="m_status"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }

            function clearreligion() {
                $('input[name="religion"]:checked').attr('checked', false);
                $('input[name="caste_id"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
                $('#getcaste').hide();
            }

            function clearcaste() {
                $('input[name="caste_id"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }

            function clearcountry() {
                $('input[name="country"]:checked').attr('checked', false);
                $('input[name="state_id"]:checked').attr('checked', false);
                $('input[name="city_id"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
                $('#getstate').hide();
                $('#getcity').hide();
            }

            function clearstate() {
                $('input[name="state_id"]:checked').attr('checked', false);
                $('input[name="city_id"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
                $('#getcity').hide();
            }

            function clearcity() {
                $('input[name="city_id"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }

            function cleareducation() {
                $('input[name="education"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }

            function clearoccupation() {
                $('input[name="occupation"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }

            function clearincome() {
                $('select[name="annual_income"]').find(":selected").attr('selected', false);
                $("#frm_filter").trigger('change');
            }

            function clearphoto() {
                $('input[name="photo_search"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }

            function clearprofilelatestreg() {
                $('input[name="profile_latest_register"]:checked').attr('checked', false);
                $("#frm_filter").trigger('change');
            }
        </script>
        <div>

        </div>
    </div>

@endsection