<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body {
      background-color: #9E6DE0;
    }

    .rows {
      height: 100vh;
    }

    .form-control {
      display: block;
      width: 100%;
      min-height: calc(1.5em + .75rem + 2px);
      padding: .575rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: 52px;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .card {
      padding: 20px;
      background-color: #eee;
      padding-bottom: 50px;
      padding-top: 50px;
    }

    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #f9a826;
      outline: 0;
      box-shadow: none;
    }

    .border-rad {
      border-top-right-radius: 28px;
      border-bottom-right-radius: 28px;
      color: #fff;
      background-color: #f9a826;
      border-color: #f9a826;
    }

    .border-rad:hover {
      background-color: #f9a826;
      border-color: #f9a826;
    }

    .footer {
      margin-top: 30px;
      text-align: center;
    }

    .footer a {
      color: #9E6DE0;
      text-decoration: none;
      margin: 0 10px;
      font-weight: bold;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .logo-container {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo-container a img {
      max-width: 200px; /* Adjust the size of the logo */
      margin: 0 10px;
      background-color: transparent; /* Ensure background color is transparent */
    }
  </style>
</head>

<body>
  <div class="row d-flex justify-content-center align-items-center rows">
    <div class="col-md-6">
      <div class="card">
        <div class="logo-container">
          <!-- Dynamic Logo(s) with Anchor Tag -->
          <!-- <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
            <a href="https://www.mangalmandap.com" target="_blank"> <!-- Ensure 'link' is the correct field for the logo URL -->
              <img src="https://www.mangalmandap.com/images/mangal_logo.png" alt="Logo"> <!-- Ensure the logo is a PNG with transparency -->
            </a>
          <!-- <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
        </div>
        <div class="text-center">
          <img src="https://i.imgur.com/Dh7U4bp.png" width="200">
          <div>
            <span class="d-block mt-3">Dear <?php echo e($user['name']); ?>, <br><br> <?php echo e($otp); ?> is your one time password (OTP) for mobile number verification OTP. Please do not share the OTP with others.</span>
          </div>
          <div class="footer">
            <!-- Dynamic Footer Menu Links -->
            <?php $__currentLoopData = $footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e($footer->url); ?>"><?php echo e($footer->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\mmm\storage\framework\views/9fad42689f872a1780ad39cc97b269f1.blade.php ENDPATH**/ ?>