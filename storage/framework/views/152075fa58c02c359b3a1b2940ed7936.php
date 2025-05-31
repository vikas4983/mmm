<?php $__env->startSection('title', 'Privacy Setting'); ?>
<?php $__env->startSection('content'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        nav.center-text,
        nav {
            background: none;
        }

        .pagination {
            margin: -6px 0px;
        }

        .current {
            background: none repeat scroll 0 0 rgba(236, 236, 236, 1) !important;
            color: #000 !important;
            padding: 4px 8px;
        }

        .pagination>li>a {
            padding: 8px 12px;
        }

        .page-numbers1 {
            display: none;
        }

        .ne-success-story ul {
            border-bottom: none !important;
        }

        .ne-success-story li {
            background: none !important;
            border-bottom: none !important;
        }
    </style>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\settings\setting-component.blade.php ENDPATH**/ ?>