@extends('layouts.frontend.master')
@section('title', 'Image')

@section('content')
    <div class="container mt-30">
        <div class="row">
            <div
                class="col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 col-xs-16 col-sm-16 col-md-16 gt-upload-photo mb-25">
                <div class="col-xs-16 text-center">
                    <h3 class="gt-text-green inPageTitle fontMerriWeather text-center mt-15 inThemeOrange">
                        Upload Profile Picture</h3>
                    <article>
                        <p class="inPageSubTitle text-center mb-30">Uploading your profile picture gives you 10
                            times more response.</p>
                    </article>
                </div>
                <div class="gt-profile-pic-panel inPhotoUpload pb-30">
                    <div class="col-xs-16 col-md-16 col-xxl-16 col-xl-16 col-lg-16">
                        <div class="row">
                            <div class="col-xxl-3 col-xxl-offset-13">
                                <a class="btn btn-danger btn-block"> *Mandatry </a>
                            </div>
                        </div>
                        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @php
                                $fields = config('formFields.images');

                            @endphp
                            <x-form-fields-component :fields="$fields" />

                            <div class="row form-group">
                                <div class="col-xxl-16 text-center">
                                    <button type="submit" class="btn gt-btn-green inIndexRegBtn mt-10"
                                        id="profilePichtureBtn">Upload & Continue</button>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- jQuery Js-->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap & Green Js -->
    <script src="js/bootstrap.js"></script>
    <script src="js/green.js"></script>
    <script>
        $(document).ready(function() {
            $('#body').show();
            $('.preloader-wrapper').hide();
        });
    </script>

    <!-- Thumbnail Display before image upload -->
    <script>
        function readURL(input) {
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
        let file = document.getElementById("display_picture");
        let dpBtn = document.getElementById("profilePichtureBtn").addEventListener("click", function() {
            if (file.value == '') {
                alert('Select Display Picture First!');
            } else {

            }

        });
    </script>
@endsection
