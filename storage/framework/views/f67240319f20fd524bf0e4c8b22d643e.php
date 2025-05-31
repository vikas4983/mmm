
<?php $__env->startSection('title', 'Mangal Mandap - Interests'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container gt-margin-top-20">
        <div class="row">
            <div class="col-xxl-4 col-xl-4 gt-left-exp">
                <a class="btn gt-btn-orange btn-block gt-margin-bottom-15 visible-xs visible-sm visible-md btn-md"
                    role="button" data-toggle="collapse" href="#collapseLeftPanel" aria-expanded="false"
                    aria-controls="collapseLeftPanel">
                    Options &nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                </a>
                <div class="collapse mobile-collapse gt-padding-bottom-15" id="collapseLeftPanel">
                    <a href="exp-interest.php" class="btn gt-btn-orange gt-btn-xl mb-20 btn-block"><i
                            class="fa fa-star gt-margin-right-10 fa-spin"></i>All Express Interest</a>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title ">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Express Interest Sent </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <a href="<?php echo e(route('my.interest')); ?>" class="gt-exp-opt gt-cursor" id="exp-link-7">
                                        Interest Sent Pending<i
                                            class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a href="<?php echo e(route('interest.accept.by.other')); ?>" class="gt-exp-opt gt-cursor"
                                        id="exp-link-5">
                                        Interest Sent Accepted<i
                                            class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                    <a href="<?php echo e(route('interest.declined.by.other')); ?>" class="gt-exp-opt gt-cursor"
                                        id="exp-link-6">
                                        Interest Sent Rejected<i
                                            class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Express Interest Received </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <a href="<?php echo e(route('interest.sent.by.other')); ?>" class="gt-exp-opt gt-cursor"
                                        id="exp-link-4">
                                        Interest Received <i class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                    <a href="<?php echo e(route('interest.accepted.by.me')); ?>" class="gt-exp-opt gt-cursor"
                                        id="exp-link-2">
                                        Interest Accepted<i class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a href="<?php echo e(route('interest.declined.by.me')); ?>" class="gt-exp-opt gt-cursor"
                                        id="exp-link-3">
                                        Interest Rejected <i class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-exp-main" bis_skin_checked="1">
                <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16" bis_skin_checked="1">
                    <div class="row active" id="exp-1" bis_skin_checked="1">
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
                        <div class="col-xxl-16 col-xl-16 text-center" bis_skin_checked="1">
                            <h2 class="inPageTitle fontMerriWeather inThemeOrange">All Express Interest</h2>
                            <article class="mb-30">
                                <p class="inPageSubTitle">Here you can see your all express interest which you send and
                                    received from members.and with left side panel you can access other particluar express
                                    interest.</p>
                            </article>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center xyz active"
                                id="sent_all">
                                <a href="#exp-tab-2" aria-controls="exp-tab-2" role="tab" data-toggle="tab">
                                    <i class="fa fa-paper-plane gt-margin-right-10" aria-hidden="true"></i>
                                    <?php echo e($heading ?? 'All Sent'); ?>

                                </a>
                            </li>
                            <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center "
                                id="receive_all">
                                <a href="#exp-tab-1" aria-controls="exp-tab-1" role="tab" data-toggle="tab">
                                    <i class="fa fa-inbox gt-margin-right-10" aria-hidden="true"></i> All Received
                                    Interest </a>
                            </li>
                        </ul>
                        <div class="tab-content" bis_skin_checked="1">
                            <div role="tabpanel" class="tab-pane fade in active " id="exp-tab-2" bis_skin_checked="1">
                                <h1>sent</h1>
                                
                            </div>
                        </div>
                        <div class="tab-content" bis_skin_checked="1">
                            <div role="tabpanel" class="tab-pane fade in active " id="exp-tab-1" bis_skin_checked="1">
                                <h1>Receive</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    endsection

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\shortlists\shortlist.blade.php ENDPATH**/ ?>