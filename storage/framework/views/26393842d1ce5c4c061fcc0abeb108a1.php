
<?php $__env->startSection('title', 'MM - Active Plan'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        body {
            background-color: #f9f9fa
        }

        .flex {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }

        @media (max-width:991.98px) {
            .padding {
                padding: 1.5rem
            }
        }

        @media (max-width:767.98px) {
            .padding {
                padding: 1rem
            }
        }

        .padding {
            padding: 5rem
        }

        .card {
            box-shadow: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none
        }

        .pl-3,
        .px-3 {
            padding-left: 1rem !important
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #d2d2dc;
            border-radius: 0
        }

        .card .card-title {
            color: #000000;
            margin-bottom: 0.625rem;
            text-transform: capitalize;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .card .card-description {
            margin-bottom: .875rem;
            font-weight: 400;
            color: #76838f;
        }

        p {
            font-size: 0.875rem;
            margin-bottom: .5rem;
            line-height: 1.5rem;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table,
        .jsgrid .jsgrid-table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .table thead th,
        .jsgrid .jsgrid-table thead th {
            border-top: 0;
            border-bottom-width: 1px;
            font-weight: 500;
            font-size: .875rem;
            text-transform: uppercase;
        }

        .table td,
        .jsgrid .jsgrid-table td {
            font-size: 0.875rem;
            padding: .875rem 0.9375rem;
        }

        .badge {
            border-radius: 0;
            font-size: 12px;
            line-height: 1;
            padding: .375rem .5625rem;
            font-weight: normal;
        }
    </style>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">

                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Table</h4>
                            <p class="card-description">
                                Basic table with card
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>ID No.</th>
                                            <th>Created On</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Samso Park</td>
                                            <td>34424433</td>
                                            <td>12 May 2017</td>
                                            <td><label class="badge badge-danger">Pending</label></td>
                                        </tr>
                                        <tr>
                                            <td>Marlo Sanki</td>
                                            <td>53425532</td>
                                            <td>15 May 2015</td>
                                            <td><label class="badge badge-warning">In progress</label></td>
                                        </tr>
                                        <tr>
                                            <td>John ryte</td>
                                            <td>53275533</td>
                                            <td>14 May 2017</td>
                                            <td><label class="badge badge-info">Fixed</label></td>
                                        </tr>
                                        <tr>
                                            <td>Peter mark</td>
                                            <td>53275534</td>
                                            <td>16 May 2017</td>
                                            <td><label class="badge badge-success">Completed</label></td>
                                        </tr>
                                        <tr>
                                            <td>Dave</td>
                                            <td>53275535</td>
                                            <td>20 May 2017</td>
                                            <td><label class="badge badge-warning">In progress</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\plans\activePlan.blade.php ENDPATH**/ ?>