
<?php $__env->startSection('title', 'Image'); ?>

<?php $__env->startSection('content'); ?>
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
                        <form action="<?php echo e(route('images.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php
                                $fields = config('formFields.images');

                            ?>
                            <?php if (isset($component)) { $__componentOriginal7a42694a19dc8f5a836f15aa90b268f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8 = $attributes; } ?>
<?php $component = App\View\Components\FormFieldsComponent::resolve(['fields' => $fields] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-fields-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\FormFieldsComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8)): ?>
<?php $attributes = $__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8; ?>
<?php unset($__attributesOriginal7a42694a19dc8f5a836f15aa90b268f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7a42694a19dc8f5a836f15aa90b268f8)): ?>
<?php $component = $__componentOriginal7a42694a19dc8f5a836f15aa90b268f8; ?>
<?php unset($__componentOriginal7a42694a19dc8f5a836f15aa90b268f8); ?>
<?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/frontend/registration/imgaes/create.blade.php ENDPATH**/ ?>