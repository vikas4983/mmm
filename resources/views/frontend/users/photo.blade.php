@extends('layouts.frontend.main-master')
@section('title', ' My Photos - Mangal Mandap')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">

    <div class="container gt-margin-top-20">
        <div class="row">
            <div class="col-xxl-12 col-xxl-offset-4 col-xl-12 col-xl-offset-4 text-center">
                <h2 class="inPageTitle fontMerriWeather inThemeOrange">Upload & Profile Picture Settings</h2>
                <article>
                    <p class="inPageSubTitle mb-20">
                        Here is your option to set your profile pictures and other pictures.Remember upload profile picture
                        gives you 10 times better respose.So do it now if you didnt.
                    </p>
                </article>
            </div>
            <div class="col-xxl-4 col-xl-4 gt-left-opt-msg">
                <a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20" role="button"
                    data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Options <i class="fa fa-angle-down"></i>
                </a>
                <div class="collapse mobile-collapse" id="collapseExample">
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                MESSAGES </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="{{route('message')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Inbox </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span>
                                    </div>
                                </a>
                                {{-- <a href="sentMessages" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Outbox </div>
                                        <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                13 </div>
                                        </span>
                                    </div>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                MY PROFILE </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="{{route('my.profile')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    Edit Profile </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                PROFILE DETAILS </div>
                        </div>
                        <div class="gt-left-pan-option">
                            <div class="row">
                                <a href="{{route('my.interest')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Express Interest Received </div>
                                        {{-- <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span> --}}
                                    </div>
                                </a>
                                <a href="{{route('my.shortlist')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Shortlist Profile </div>
                                        {{-- <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span> --}}
                                    </div>
                                </a>
                                <a href="{{route('block.by.me')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Blocklist Profile </div>
                                        {{-- <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span> --}}
                                    </div>
                                </a>

                                <a href="{{route('view.profile.by.other')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            My Profile Viewed By </div>
                                        {{-- <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                1 </div>
                                        </span> --}}
                                    </div>
                                </a>
                                <a href="{{route('view.profile')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            I Visited Profile </div>
                                        {{-- <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                5 </div>
                                        </span> --}}
                                    </div>
                                </a>
                                <a href="{{route('view.contact.by.me')}}" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                                    <div class="row">
                                        <div class="col-xxl-13 col-xl-12 col-xs-13">
                                            Mobile Numbers Viewed By Me </div>
                                        {{-- <span class="col-xxl-3 col-xs-3 col-xl-4">
                                            <div class="badge">
                                                0 </div>
                                        </span> --}}
                                    </div>
                                </a>

                                
                            </div>
                        </div>
                    </div>
                    {{-- <div class="gt-panel gt-panel-orange inHomeLeftPanel">
                        <div class="gt-panel-head">
                            <div class="gt-panel-title text-center">
                                SAVED SEARCHES </div>
                        </div>
                        <div class="gt-saved-search">
                            <div class="row">
                                <a href="search_result.php?ss_id=1"
                                    class="col-xxl-16 col-xl-16 col-xs-16 col-lg-8 ripplelink">
                                    <h4 class="gt-text-orange">
                                        abc </h4>
                                    <h5>
                                        <i class="fa fa-calendar gt-margin-right-5"></i>13 Mar 2024 ,18:46 PM
                                    </h5>

                                </a>

                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-upload-photo">
                <div class="inUploadPhoto mb-30">
                    @include('alerts.alert')
                    <div class="gt-profile-pic-title">
                        <h4>Change Or Upload Profile Picture</h4>
                    </div>
                    <div class="gt-profile-pic-panel">
                        <div class="col-xs-16 col-md-16 col-xxl-16 col-xl-16 col-lg-16">
                            <div class="row">
                                <div
                                    class="col-xxl-6 col-xxl-offset-5 col-xl-6 col-xxl-offset-5 col-md-12 col-md-offset-2 col-lg-6 col-lg-offset-5">
                                    <div class="col-xs-16 gtImageUpload">
                                        @foreach ($user->images as $image)
                                            @if ($image->dp_image === '1')
                                                <img src="{{ isset($image->name) && $image->name ? asset('storage/users/images/' . $image->name) : ($image->name == 'male' ? asset('storage/users/images/male-default.jpg') : asset('storage/users/images/female-default.jpg')) }}"
                                                    class="img-responsive gtFullWidth" alt="User Image">
                                                <a href="#editPhoto1Modal" data-toggle="modal"
                                                    data-info="{{ $image->id }}" class="btn gt-btn-green btn-block">
                                                    Change Profile Picture
                                                </a>
                                                <form action="{{ route('delete.image') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $image->id }}">

                                                    <button class="btn btn-danger btn-block mt-5"
                                                        onclick="deleteDisplayImage(event)"> Delete Profile
                                                        Picture</button>
                                                </form>
                                            @endif
                                        @endforeach
                                        @if ($user->images->isEmpty())
                                            <img src="{{ $user->gender == 'male'
                                                ? asset('storage/users/images/male-default.jpg')
                                                : asset('storage/users/images/female-default.jpg') }}"
                                                class="img-responsive gtFullWidth" alt="User Image">
                                        @endif
                                        <a href="#addPhoto1Modal" data-toggle="modal" data-info="{{ $image->id ?? '' }}"
                                            class="btn gt-btn-green btn-block mt-5">
                                            Add Photos
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inUploadPhoto mb-30">
                    <div class="gt-profile-pic-title">
                        <h4>Upload More Photos</h4>
                    </div>
                    <div class="gt-profile-pic-panel">
                        <div class="row">
                            @foreach ($user->images as $image)
                                @if ($image->dp_image === '0')
                                    <div class="col-xxl-4 col-xs-8 col-md-4">
                                        <div class="gtImageUpload">
                                            <div class="thumbnail position-relative">
                                                <div class="text-center">
                                                    <!-- Flexbox container for buttons -->
                                                    <div class="d-flex flex-row justify-content-center align-items-center gap-2"
                                                        style="display: flex; justify-content: center;">
                                                        <!-- DP Image Button -->
                                                        <form action="{{ route('dp.image') }}" method="post"
                                                            class="m-0">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $image->id }}">
                                                            <button type="submit"
                                                                class="btn btn-icon btn-outline-danger btn-rounded-circle"
                                                                style="color:#E47203">
                                                                <i class="mdi mdi-star-face" title="Set as Display Image"></i>
                                                            </button>
                                                        </form>
                                                        <a href="#{{ $image->id }}" data-toggle="modal"
                                                            class="btn btn-icon btn-outline-danger btn-rounded-circle"
                                                            style="color:#499202" title="Change Image">
                                                            <i class="mdi mdi-image-plus"></i>
                                                        </a>
                                                        <form action="{{ route('delete.image') }}" method="post"
                                                            class="m-0">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $image->id }}">
                                                            <button type="submit"
                                                                class="btn btn-icon btn-outline-danger btn-rounded-circle"
                                                                style="color:#D74F4B" onclick="deleteImage(event)" title="Delete Image">
                                                                <i class="mdi mdi-delete-empty"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <img class="img-responsive img-thumbnail gt-margin-bottom-15"
                                                    src="{{ $image->name
                                                        ? asset('storage/users/images/' . $image->name)
                                                        : asset('storage/users/images/' . ($user->gender == 'female' ? 'female.jpg' : 'male.jpg')) }}"
                                                    alt="Display Picture">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Photo Edit Modal -->
        @foreach ($user->images as $image)
            @if ($image->dp_image === '1')
                <div class="modal fade" id="editPhoto1Modal" tabindex="-1" role="dialog"
                    aria-labelledby="editPhoto1Modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <div class="col-12">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile Picture <button
                                            type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('change.profile.image') }}" method="post"
                                    enctype="multipart/form-data" class="editPhotoModal">
                                    <input type="hidden" name="id" value="{{ $image->id ?? '' }}">
                                    @csrf

                                    <p class="text-center">Select image and then click on submit button to upload image</p>
                                    <div class="col-xxl-10 col-xxl-offset-3">
                                        <center>
                                            <img src="{{ isset($image->display_picture) && $image->display_picture ? asset('storage/users/images/' . $image->display_picture) : ($image->display_picture == 'male' ? asset('storage/users/images/male-default.jpg') : asset('storage/users/images/female-default.jpg')) }}"
                                                class="img-fluid img-thumbnail" id="photo1_prev">
                                            <input type="file" name="photo" id="photo"
                                                onchange="readURL1(this);">

                                            <label for="photo" class="btn gt-btn-orange btn-block gt-margin-top-20">
                                                Select Image </label>
                                            <div class="form-group text-center mt-3">

                                                <input type="submit" name="editPhoto1" value="SUBMIT"
                                                    class="btn gt-btn-green btn-block gt-margin-top-20">
                                            </div>
                                        </center>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <!-- Photo Add Modal -->
        <div class="modal fade" id="addPhoto1Modal" tabindex="-1" role="dialog" aria-labelledby="addPhoto1Modal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <div class="col-12">
                            <h5 class="modal-title" id="exampleModalLabel">Add Photo <button type="button"
                                    class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('add.image') }}" method="post" enctype="multipart/form-data"
                            class="editPhotoModal">
                            @csrf
                            <p class="text-center">Select image and then click on submit button to upload image</p>
                            <div class="col-xxl-10 col-xxl-offset-3">
                                <center>
                                    <img src="{{ isset($user->image) && $user->image
                                        ? asset('storage/users/images/' . $user->image)
                                        : ($user->gender === 'male'
                                            ? asset('storage/users/images/male-default.jpg')
                                            : asset('storage/users/images/female-default.jpg')) }}"
                                        class="img-fluid img-thumbnail" id="photo2_prev">
                                    <input type="file" name="photo2" id="photo2" onchange="readURL2(this);">

                                    <label for="photo2" class="btn gt-btn-orange btn-block gt-margin-top-20">
                                        Select Image </label>
                                    <div class="form-group text-center mt-3">

                                        <input type="submit" name="editPhoto1" value="SUBMIT"
                                            class="btn gt-btn-green btn-block gt-margin-top-20">
                                    </div>
                                </center>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Photo Change Modal -->
        @foreach ($user->images as $image)
            @if ($image->dp_image === '0')
                <div class="modal fade" id="{{ $image->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="changePhoto1Modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <div class="col-12">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Photo <button type="button"
                                            class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('change.image') }}" method="post" enctype="multipart/form-data"
                                    class="editPhotoModal">
                                    @csrf

                                    <p class="text-center">Select image and then click on submit button to upload image</p>
                                    <div class="col-xxl-10 col-xxl-offset-3">
                                        <center>
                                            <img src="{{ isset($image->name) && $image->name ? asset('storage/users/images/' . $image->name) : ($image->name == 'male' ? asset('storage/users/images/male-default.jpg') : asset('storage/users/images/female-default.jpg')) }}"
                                                class="img-fluid img-thumbnail" id="photo3_prev">
                                            <input type="file" name="photo3" id="photo3"
                                                onchange="readURL3(this);">
                                            <input type="hidden" name="id" value="{{ $image->id ?? '' }}">

                                            <label for="photo3" class="btn gt-btn-orange btn-block gt-margin-top-20">
                                                Select Image </label>
                                            <div class="form-group text-center mt-3">

                                                <input type="submit" name="editPhoto3" value="SUBMIT"
                                                    class="btn gt-btn-green btn-block gt-margin-top-20">
                                            </div>
                                        </center>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div>


    <!-- Responsive Tab js -->
    <script src="{{ asset('assets/js/jquery.bootstrap-responsive-tabs.min.js') }}" type="text/javascript"></script>
    <script>
        $('.responsive-tabs').responsiveTabs({
            accordionOn: ['xs', 'sm']
        });
    </script>
    <script>
        (function($) {
            var $window = $(window),
                $html = $('.mobile-collapse');
            $window.width(function width() {
                if ($window.width() > 767) {
                    return $html.addClass('in');
                }
                $html.removeClass('in');
            });
        })(jQuery);
    </script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo1_prev').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo2_prev').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo3_prev').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo4_prev').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo5_prev').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function readURL6(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo6_prev').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function deleteDisplayImage(e) {
            let confirmDelete = confirm('Are you sure you want to delete Display Picture?');
            if (!confirmDelete) {
                e.preventDefault();
            }
        }
    </script>
    <script>
        function deleteImage(e) {
            let confirmDelete = confirm('Are you sure you want to delete this image?');
            if (!confirmDelete) {
                e.preventDefault();
            }
        }
    </script>
@endsection
