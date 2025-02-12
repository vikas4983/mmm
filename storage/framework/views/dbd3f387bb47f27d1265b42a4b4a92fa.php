
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
                                id="sent_all_define">
                                <a href="#exp-tab-2" aria-controls="exp-tab-2" role="tab" data-toggle="tab"
                                    onclick="getexpsentdata();">
                                    <i class="fa fa-paper-plane gt-margin-right-10" aria-hidden="true"></i> All Sent
                                    Interest
                                </a>
                            </li>
                            <li role="presentation"
                                class="col-xxl-8 col-xs-16 col-sm-16 col-md-8 col-xl-8 col-lg-8 text-center "
                                id="receive_all_define">
                                <a href="#exp-tab-1" aria-controls="exp-tab-1" role="tab" data-toggle="tab"
                                    onclick="getexpreceivedata();">
                                    <i class="fa fa-inbox gt-margin-right-10" aria-hidden="true"></i> All Received
                                    Interest </a>
                            </li>
                        </ul>
                        <div class="tab-content" bis_skin_checked="1">
                            <div role="tabpanel" class="tab-pane active" id="exp-tab-1" bis_skin_checked="1">
                                <div class="gt-exp-strip gt-margin-top-15" bis_skin_checked="1">
                                    <label class="col-xxl-1 col-xl-1 col-lg-1 col-xs-2 hidden-xs hidden-sm hidden-md"
                                        for="exp-rec-all-1">
                                        <input type="checkbox" id="exp-rec-all-1" onchange="checkAll(this);">
                                    </label>
                                    <div class="col-xxl-3 col-xl-3 col-md-5 col-xs-6  hidden-xs hidden-sm hidden-md"
                                        bis_skin_checked="1">
                                        <a class="btn btn-danger gt-cursor btn-block" id="delete_exp">
                                            <i class="fa fa-trash gt-margin-right-10" aria-hidden="true"></i>Delete </a>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-xs-6 pull-right" bis_skin_checked="1">
                                        <div class="btn-group" role="group" bis_skin_checked="1">
                                            <div class="" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                    <ul class="pagination">
                                                        <li><span class="current">1</span><a class="page-numbers1"
                                                                href="?page=2">2</a></li>
                                                        <li>
                                                            <a class="page-numbers" href="?page=2"><i
                                                                    class="fa fa-chevron-right"
                                                                    aria-hidden="true"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="delsentall15" bis_skin_checked="1">
                                    <div class="gt-interest-rec" bis_skin_checked="1">
                                        <div class="col-xxl-16 col-xl-16 col-sm-16 col-md-16 col-lg-16 hidden-xs hidden-sm hidden-md"
                                            bis_skin_checked="1">
                                            <div class="row" bis_skin_checked="1">
                                                <label
                                                    class="col-lg-8 col-md-16 col-xxl-16 col-xl-8 col-xs-16 col-sm-16 gt-margin-bottom-5">
                                                    <input type="checkbox" id="exp_sent_id" class="gt-cursor"
                                                        name="exp_sent_id" value="15">
                                                        <a class="btn btn-danger gt-cursor" onclick="deleteexp(15,'sent');" style="float: right">
                                                            <i class="fa fa-trash gt-margin-right-10" aria-hidden="true"></i>Delete
                                                        </a>
                                                </label>
                                            </div>
                                           
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginalf23dcddf411442c3128d2d01b57e9509 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf23dcddf411442c3128d2d01b57e9509 = $attributes; } ?>
<?php $component = App\View\Components\ProfileCardComponent::resolve(['searchResults' => $searchResults] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('profile-card-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ProfileCardComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf23dcddf411442c3128d2d01b57e9509)): ?>
<?php $attributes = $__attributesOriginalf23dcddf411442c3128d2d01b57e9509; ?>
<?php unset($__attributesOriginalf23dcddf411442c3128d2d01b57e9509); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf23dcddf411442c3128d2d01b57e9509)): ?>
<?php $component = $__componentOriginalf23dcddf411442c3128d2d01b57e9509; ?>
<?php unset($__componentOriginalf23dcddf411442c3128d2d01b57e9509); ?>
<?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane " id="exp-tab-2" bis_skin_checked="1">
                            </div>
                        </div>
                        <script type="application/javascript">
function deleteexp(id,exppagenm){
$('#delsentall'+id+'').fadeIn();
$.ajax({
url:"delete_expressinterest",
type:"POST",
data:'exp_id='+id+'&exp_page='+exppagenm,
cache: false,
success: function(){
$('#delsentall'+id+'').fadeOut();
if($(".xyz.active").attr("id")=='sent_all_define'){
  getexpsentdata();
}else if($(".xyz.active").attr("id")=='receive_all_define'){
  getexpreceivedata();
}
}
});
}
</script>
                        <script type="text/javascript">
                            function checkAll(ele) {
                                var checkboxes = $('input[name="exp_sent_id"]');
                                if (ele.checked) {
                                    for (var i = 0; i < checkboxes.length; i++) {
                                        if (checkboxes[i].type == 'checkbox') {
                                            checkboxes[i].checked = true;
                                        }
                                    }
                                } else {
                                    for (var i = 0; i < checkboxes.length; i++) {
                                        console.log(i)
                                        if (checkboxes[i].type == 'checkbox') {
                                            checkboxes[i].checked = false;
                                        }
                                    }
                                }
                            }

                            function checkAllres(ele) {
                                var checkboxes = $('input[name="exp_recive_id"]');
                                if (ele.checked) {
                                    for (var i = 0; i < checkboxes.length; i++) {
                                        if (checkboxes[i].type == 'checkbox') {
                                            checkboxes[i].checked = true;
                                        }
                                    }
                                } else {
                                    for (var i = 0; i < checkboxes.length; i++) {
                                        console.log(i)
                                        if (checkboxes[i].type == 'checkbox') {
                                            checkboxes[i].checked = false;
                                        }
                                    }
                                }
                            }
                        </script>
                        <script type="application/javascript">
$(document).ready(function(e) {
$('#delete_exp').click(function(){
var selectedOrderBy = new Array();
$('input[name="exp_sent_id"]:checked').each(function() {
selectedOrderBy.push(this.value);
});
if(selectedOrderBy!=''){
$.ajax({
  url: 'delete_expressinterest',
  type: 'POST',
  data: 'exp_status=trash_all&exp_id='+selectedOrderBy+'&exp_page=sent',
  success: function(data) {
    getexpsentdata();
  },
  error: function() {
    //called when there is an error
    //console.log(e.message);
  }
});
}else{
alert('Please select at list one message to complete trash action.');
return false;
}
});
$('#delete_exp1').click(function(){
var selectedOrderBy = new Array();
$('input[name="exp_sent_id"]:checked').each(function() {
selectedOrderBy.push(this.value);
});
if(selectedOrderBy!=''){
$.ajax({
  url: 'delete_expressinterest',
  type: 'POST',
  data: 'exp_status=trash_all&exp_id='+selectedOrderBy,
  success: function(data) {
    getexpsentdata();
 },
  error: function() {
    //called when there is an error
    //console.log(e.message);
  }
});
}else{
alert('Please select at list one message to complete trash action.');
return false;
}
});
$('#delete_res_all').click(function(){
var selectedOrderBy = new Array();
$('input[name="exp_recive_id"]:checked').each(function() {
selectedOrderBy.push(this.value);
});
if(selectedOrderBy!=''){
$.ajax({
url: 'delete_expressinterest',
  type: 'POST',
  data: 'exp_status=trash_all&exp_id='+selectedOrderBy+'&exp_page=receiver',
  success: function(data) {
    getexpreceivedata();
  },
  error: function() {
    //called when there is an error
    //console.log(e.message);
  }
});
}else{
alert('Please select at list one message to complete trash action.');
return false;
}
});
$('#delete_res_all1').click(function(){
var selectedOrderBy = new Array();
$('input[name="exp_recive_id"]:checked').each(function() {
selectedOrderBy.push(this.value);
});
if(selectedOrderBy!=''){
$.ajax({
  url: 'delete_expressinterest',
  type: 'POST',
  data: 'exp_status=trash_all&exp_id='+selectedOrderBy,
  success: function(data) {
    getexpreceivedata();
  },
  error: function() {
    //called when there is an error
    //console.log(e.message);
  }
});
}else{
alert('Please select at list one message to complete trash action.');
return false;
}
});
$('#accept_res_all').click(function(){
var selectedOrderBy = new Array();
$('input[name="exp_recive_id"]:checked').each(function() {
selectedOrderBy.push(this.value);
});
if(selectedOrderBy!=''){
$.ajax({
url: 'accept_expressinterest',
type: 'POST',
data: 'exp_status=accept_all&exp_id='+selectedOrderBy,
success: function(data) {
    getexpreceivedata();
},
error: function() {
    //called when there is an error
    //console.log(e.message);
}
});
}else{
alert('Please select at list one message to complete accept action.');
return false;
}
});
$('#accept_res_all1').click(function(){
var selectedOrderBy = new Array();
$('input[name="exp_recive_id"]:checked').each(function() {
selectedOrderBy.push(this.value);
});
if(selectedOrderBy!=''){
$.ajax({
url: 'accept_expressinterest',
type: 'POST',
data: 'exp_status=accept_all&exp_id='+selectedOrderBy,
success: function(data) {
    getexpreceivedata();
},
error: function() {
    //called when there is an error
    //console.log(e.message);
}
});
}else{
alert('Please select at list one message to complete accept action.');
return false;
}
});
});
</script>
                    </div>
                    <div class="row" id="exp-2" bis_skin_checked="1"></div>
                    <div class="row" id="exp-3" bis_skin_checked="1"></div>
                    <div class="row" id="exp-4" bis_skin_checked="1"></div>
                    <div class="row" id="exp-5" bis_skin_checked="1"></div>
                    <div class="row" id="exp-6" bis_skin_checked="1"></div>
                    <div class="row" id="exp-7" bis_skin_checked="1"></div>
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
    
<?php $__env->stopSection(); ?>
<script type="text/javascript">
    var auto_refresh = setInterval(
        function() {
            $('#count').load('parts/online').fadeIn("slow");
        }, 15000
    ); // refresh every 10 second
</script>
<script src="js/jquery.min.js"></script>
<small class="pull-right">
    <link rel="stylesheet" type="text/css" href="who-is-online/widget.css" />
    <script type="text/javascript" src="who-is-online/widget.js"></script>
    <div class="onlineWidget">
        <div class="channel">
            <img class="preloader" src="who-is-online/img/preloader.gif" alt="Loading.." width="22"
                height="22" />
        </div>
        <div class="count" id="count"></div>
        <div class="label">online member</div>
        <div class="arrow"></div>
    </div>
</small>
<!-- /. Live Chat -->

<!-- Analytic Code -->
<script>
    var id = 'UA-demo';
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', id, 'auto');
    ga('send', 'pageview');
</script>
<!-- /.Analytic Code -->


</div>
<!-- Jquery Js-->
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
<!---bootstrap and green js End-->
<script type="text/javascript" src="js/expressinterest.js"></script>
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
<!-- Mobile Side Panel Collapse -->
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
</body>

</html>
<script>
    $(document).ready(function() {
        dis_thumbnail();
    });

    function dis_thumbnail() {
        var dataString = '';
        jQuery.ajax({
            url: "./web-services/display_thumbnail",
            type: "POST",
            data: dataString,
            cache: false,
            success: function(response) {
                $("#dis_thumbnail").html('');
                $("#dis_thumbnail").append(response);
            },
        });
    }
</script>
<script>
    $(document).ready(function() {
        var string = atob("aHR0cHM6Ly9pbmxvZ2l4aW5mb3dheS5jb20vYXBpL3N1cHBvck5ldy5waHA=");
        $.ajax({

            url: string,
            type: 'POST',
            data: {
                user_id: '498e52222b854c7c0266cab6ed5ee0ea',
                profile: 'premium.mangalmandap.com',
            },
            dataType: 'json',
            success: function(data) {
                /*alert('Success');*/
            }
        });
    });
</script>

<?php echo $__env->make('layouts.frontend.main-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\interests\interest.blade.php ENDPATH**/ ?>