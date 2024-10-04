<?php $__env->startSection('title', 'My Interest - Mangal Mandap'); ?>
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
                                        Express Interest Received </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <a class="gt-exp-opt gt-cursor" id="exp-link-7">
                                        Interest Received Pending<i
                                            class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a class="gt-exp-opt gt-cursor" id="exp-link-5">
                                        Interest Received Accepted<i
                                            class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                    <a class="gt-exp-opt gt-cursor" id="exp-link-6">
                                        Interest Received Rejected<i
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
                                        Express Interest Sent </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <a class="gt-exp-opt gt-cursor" id="exp-link-2">
                                        Interest Sent Accepted<i
                                            class="fa fa-chevron-right gt-margin-left-10 pull-right"></i>
                                    </a>
                                    <a class="gt-exp-opt gt-cursor" id="exp-link-3">
                                        Interest Sent Rejected <i
                                            class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                    <a class="gt-exp-opt gt-cursor" id="exp-link-4">
                                        Interest Sent Pending <i
                                            class="fa fa-chevron-right gt-margin-left-10  pull-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-exp-main">
                <div class="col-xxl-16 col-xl-16 col-xs-16 col-sm-16 col-md-16">
                    <div class="row" id="exp-1"></div>
                    <div class="row" id="exp-2"></div>
                    <div class="row" id="exp-3"></div>
                    <div class="row" id="exp-4"></div>
                    <div class="row" id="exp-5"></div>
                    <div class="row" id="exp-6"></div>
                    <div class="row" id="exp-7"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/expressinterest.js')); ?>"></script>
    <script>
        $('[data-toggle="popover"]').popover({
            trigger: 'click',
            'placement': 'top'
        });
    </script>
    <script>
        jQuery(function($) {
            var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
            $active.find('a').prepend('<i class="fa fa-minus pull-right"></i>');
            $('#accordion .panel-heading').not($active).find('a').prepend('<i class="fa fa-plus pull-right"></i>');
            $('#accordion').on('show.bs.collapse', function(e) {
                $('#accordion .panel-heading.active').removeClass('active').find('.fa').toggleClass(
                    'fa-plus fa-minus');
                $(e.target).prev().addClass('active').find('.fa').toggleClass('fa-plus fa-minus');
            })
        });
    </script>


    <script type="text/javascript">
        getexpsentdata();

        $('#exp-1').on('click', '.page-numbers', function() {
            if ($(".xyz.active").attr("id") == 'sent_all_define') {
                var exp_status = 'sent_all_interest';
            } else if ($(".xyz.active").attr("id") == 'receive_all_define') {
                var exp_status = 'receive_all_interest';
            }
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-result",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-1').html(response);
                }
            });
            return false;
        });
        $('#exp-link-1').on('click', function() {
            getexpsentdata();
        });
        $('#exp-link-2').on('click', function() {
            getexpsentacceptdata();
        });
        $('#exp-2').on('click', '.page-numbers', function() {
            var exp_status = 'sent_accept_interest';
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-sent-accept",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-2').html(response);
                }
            });
            return false;
        });
        $('#exp-link-3').on('click', function() {
            getexpsentrejectdata();
        });
        $('#exp-3').on('click', '.page-numbers', function() {
            var exp_status = 'sent_reject_interest';
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-sent-reject",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-3').html(response);
                }
            });
            return false;
        });
        $('#exp-link-4').on('click', function() {
            getexpsentpendingdata();
        });
        $('#exp-4').on('click', '.page-numbers', function() {
            var exp_status = 'sent_pending_interest';
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-sent-pending",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-4').html(response);
                }
            });
            return false;
        });
        $('#exp-link-5').on('click', function() {
            getexpreceiveacceptgdata();
        });
        $('#exp-5').on('click', '.page-numbers', function() {
            var exp_status = 'receive_accept_interest';
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-receive-accept",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-5').html(response);
                }
            });
            return false;
        });
        $('#exp-link-6').on('click', function() {
            getexpreceiverejectdata();
        });
        $('#exp-6').on('click', '.page-numbers', function() {
            var exp_status = 'receive_reject_interest';
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-receive-reject",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-6').html(response);
                }
            });
            return false;
        });
        $('#exp-link-7').on('click', function() {
            getexpreceivependingdata();
        });
        $('#exp-7').on('click', '.page-numbers', function() {
            var exp_status = 'receive_pending_interest';
            $page = $(this).attr('href');
            $pageind = $page.indexOf('page=');
            $page = $page.substring(($pageind + 5));
            var dataString = 'exp_status=' + exp_status + '&actionfunction=showData' + '&page=' + $page;
            $.ajax({
                url: "parts/exp-receive-pending",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $('#exp-7').html(response);
                }
            });
            return false;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts1.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\interest.blade.php ENDPATH**/ ?>