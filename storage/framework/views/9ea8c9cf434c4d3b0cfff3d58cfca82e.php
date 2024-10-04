<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>How to Integrate Razorpay Payment Gateway in Laravel 9 - LaravelTuts.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success alert-dismissible fade <?php echo e(Session::has('success') ? 'show' : 'in'); ?>"
                                role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>

                        <div class="card card-default">
                            <div class="card-header">
                                Laravel - Razorpay Payment Gateway Integration - LaravelTuts.com
                            </div>

                            <div class="card-body text-center">
                                <form action="<?php echo e(route('razorpay.payment.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="plan_id" id="plan_id" value="<?php echo e($plan->id); ?>">
                                    <input type="hidden" name="admin_id" id="admin_id" value="<?php echo e(Auth::user()->id); ?>">
                                    <input type="hidden" name="order_id" id="order_id"
                                        value="<?php echo e(rand(1000, 99999)); ?>">
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo e(env('RAZORPAY_KEY')); ?>"
                                        data-amount="<?php echo e($plan->offer_price * 100 ?? ''); ?>" data-prefill.contact="<?php echo e($admin->contact ?? '8770745845'); ?>"
                                        data-buttontext="Pay 10 INR" data-name="Mangal Mandap" data-description="Rozerpay"
                                        data-image="https://mangalmandap.com/images/mangal_logo.jpg" data-prefill.name=<?php echo e($admin->name ?? ''); ?>

                                        data-prefill.email=<?php echo e($admin->email ?? ''); ?> data-theme.color="#ff7529"></script>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\razorpay\razorpayView.blade.php ENDPATH**/ ?>