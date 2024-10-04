<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta name="theme-name" content="mono" />

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="<?php echo e(asset('assets/auth/plugins/material/css/materialdesignicons.min.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('assets/auth/plugins/simplebar/simplebar.css')); ?>" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="<?php echo e(asset('assets/auth/plugins/nprogress/nprogress.css')); ?>" rel="stylesheet" />

        <?php echo $__env->yieldContent('styles'); ?> <?php echo $__env->yieldContent('font-awesome-cdn'); ?>
        <link href="<?php echo e(asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
            rel="stylesheet" />



        <link href="<?php echo e(asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css')); ?>" rel="stylesheet" />



        <link href="<?php echo e(asset('assets/auth/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />



        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



        <link href="<?php echo e(asset('assets/auth/plugins/toaster/toastr.min.css')); ?>" rel="stylesheet" />


        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="<?php echo e(asset('assets/auth/css/style.css')); ?>" />




        <!-- FAVICON -->
        <link href="<?php echo e(asset('assets/auth/images/favicon.png')); ?>" rel="shortcut icon" />

        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="<?php echo e(asset('assets/auth/plugins/nprogress/nprogress.js')); ?>"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css"
            rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
</head>

<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xxl-12 col-md-12 ">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0" href="">
                                    <img src="https://mangalmandap.com/images/mangal_logo.jpg" height="70px"
                                        width="800px" alt="Mono">
                                    <span class="brand-name text-dark"></span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-5 pt-0">
                            <h4 class="text-dark text-center mb-5"></h4>
                            
                            <form action="<?php echo e(route('register')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php
                                    $fields = config('formFields.register');
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div class="custom-control custom-checkbox mr-3 mb-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">I Agree the
                                                    terms and conditions.</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary btn-pill mb-4">Sign
                                                Up</button>
                                        </div>
                                        <p class="text-center">Already have an account?
                                            <a class="text-blue " href="<?php echo e(route('login')); ?>">Sign in</a>
                                        </p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script>
    <?php if(Session::has('success')): ?>


        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "duration": 3000,
        }
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    <?php if(Session::has('danger')): ?>
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>

    <?php if(Session::has('danger')): ?>
        toastr.options = {
            "closeButton": true,
            "progressBar": true

                ,

        }
        toastr.warning("<?php echo e(session('danger')); ?>");
    <?php endif; ?>
</script>







<script>
    // let person = {
    //   name: 'Vikas',
    //   age : '29',
    //   city: 'Jabalpur',
    //   sayHello : function(){
    //     console.log("Hello i am" +" "+  this.name + " "+"and  i have a" +" "+ car.brand + " " +car.model + " "+ "car");

    //   },
    //   sayBye(){
    //         console.log('Bye')
    //     }
    // }

    // let qualification = {
    //     education :'BE',
    //     occupation : 'Business',
    //     income : '25LPA'
    // }

    // let car ={
    //     brand: 'Tata',
    //     model: 'safari'

    // }



    //person.name = 'Kumar'
    // console.log(person, qualification);
    // console.log(person.name);
    // console.log('mobile' in  person);
    // for(let key in person){
    //     console.log(key + ": " +person[key]);
    // }

    // person.sayHello = function(){
    //     console.log('Hello');
    // }
    // person.sayHello();

    // function show(){
    //     console.log('Hello');
    // }
    // person.sayHello = show;


    //  person.sayHello();
    //  person.sayBye();
</script>

</html>













































<?php /**PATH C:\xampp\htdocs\mmm\resources\views\auth\register.blade.php ENDPATH**/ ?>