@extends('layouts1.app')
@section('title', 'Preferred-Matches - Mangal Mandap')
@section('content')
 <div class="container">
        <div class="row">
            <aside class="col-xxl-4 col-xl-4 col-xs-16">
                <a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20 gt-margin-top-15" role="button"
                    data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Options <i class="fa fa-angel-down"></i>
                </a>
                <div class="collapse mobile-collapse" id="collapseExample">
                    <ul class="my-match-aside mb-20 col-xs-16">
                        <li>
                            <a href="one-way-matches"><i class="fas fa-long-arrow-alt-right gt-margin-right-10"></i>One Way
                                Matches</a>
                        </li>
                        <li>
                            <a href="two-way-matches"><i class="fas fa-exchange-alt gt-margin-right-10"></i>Two Way
                                Matches</a>
                        </li>
                        <li>
                            <a href="preferred-matches"><i class="fas fa-star gt-margin-right-10"></i>Preferred Matches</a>
                        </li>
                        <li>
                            <a href="broader-matches"><i class="fa fa-arrows-alt gt-margin-right-10"></i>Broader Matches</a>
                        </li>
                        <li>
                            <a href="custom-matches"><i class="fa fa-tasks gt-margin-right-10"></i>Custom Matches</a>
                        </li>
                    </ul>
                </div>
            </aside>
           <div class="col-xxl-12 col-xl-12 col-xs-16" bis_skin_checked="1">
                <h3 class="inPageTitle fontMerriWeather inThemeOrange text-center">Preferred Match</h3>
                <article class="text-center">
                    <p class="inPageSubTitle mb-20">
                        Preferred Match is the profile show in perticular criteria at its best.its help you to find out your
                        life partner easily.
                    </p>
                </article>
                <div id="loaderID" style="position: fixed; left: 50%; top: 50%; z-index: -1; opacity: 0;"
                    bis_skin_checked="1">
                    <div class="col-lg-16 col-md-16 col-sm-16 btn gt-btn-orange" bis_skin_checked="1">
                        <font class="gt-margin-left-5">Loding ...&nbsp;&nbsp;</font>
                    </div>
                </div>
                <div id="pagination" bis_skin_checked="1">
                  <div class="alert alert-info" role="alert" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-xxl-16 col-xs-16" bis_skin_checked="1">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                        aria-hidden="true">×</span> </button>
                            </div>
                            <div class="col-xxl-16 col-xs-16" bis_skin_checked="1">
                                <h4 class="">
                                    <i class="fa fa-star gt-text-blue gt-margin-right-10" aria-hidden="true"></i>Spotlight
                                    Profile
                                </h4>
                                <p>Blue color profiles are spotlight profile. Which always show on the top of all result.
                                </p>
                                <p>
                                    <span style="color:red;"><b>1</b></span> Profiles found
                                </p>
                            </div>
                        </div>
                    </div>
                    <li class="gt-panel gt-panel-default gt-panel-default gt-main-profile">
                        <a href="member-profile?view_id=IN1" target="_blank" class="gt-panel-head">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gridFullWidth gt-main-name"
                                    bis_skin_checked="1">
                                    <h4 class="gt-margin-top-0 gt-margin-bottom-0 inThemeOrange">
                                        mokka mohan ( IN1 )
                                    </h4>
                                </div>
                                <div class="col-xxl-11 col-xl-11 col-lg-11 col-xs-16 text-right gridHidden"
                                    bis_skin_checked="1">
                                    <h5 class="gt-margin-top-5 gt-margin-bottom-0">
                                        Register On: 26 Aug 2022 ,03:41 AM </h5>
                                </div>
                            </div>
                        </a>
                        <a href="member-profile?view_id=IN1" target="_blank" class="gt-result-panel-body">
                            <div class="row gt-padding-bottom-15" bis_skin_checked="1">
                                <div class="col-xxl-2 col-xl-2 col-xs-16 col-lg-3 gridFullWidth" bis_skin_checked="1">
                                    <div class="thumbnail gt-margin-bottom-0" bis_skin_checked="1">

                                        <img src="./img/app_img/female-no-photo.jpg" title="mokka mohan" alt="IN1"
                                            class="img-responsive gtFullWidth">


                                    </div>
                                </div>
                                <div class="col-xxl-14 col-xl-14 col-xs-16 col-lg-13 gt-margin-top-10 gridFullWidth"
                                    bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="redirect" bis_skin_checked="1">
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7 ">Age :</label>
                                                    <span class="col-xs-9">
                                                        49 years 1 months
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7 ">Height :</label>
                                                    <span class="col-xs-9">
                                                        5ft - 152cm </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden "
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7">Religion :</label>
                                                    <span class="col-xs-9">
                                                        Hindu </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7">Caste :</label>
                                                    <span class="col-xs-9">
                                                        Agarwal </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridFullWidth"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0 ">
                                                    <label class="col-xs-7 gridHidden">Location :</label>
                                                    <span class="col-xs-9 gridFullWidth">
                                                        Achhayyapalli, India </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7">Education :</label>
                                                    <span class="col-xs-9">
                                                        B Arch </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7">Mother Tongue :</label>
                                                    <span class="col-xs-9">
                                                        Hindi </span>
                                                </p>
                                            </div>
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-xs-16 gridHidden"
                                                bis_skin_checked="1">
                                                <p class="row gt-margin-bottom-0">
                                                    <label class="col-xs-7">Occupation :</label>
                                                    <span class="col-xs-9">
                                                        Civil Engineer </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="gt-result-panel-footer" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-xxl-4 col-xl-4 col-lg-4 gt-margin-top-10 gridHidden" bis_skin_checked="1">
                                    <a href="composeMessages?user_id=IN1"
                                        class="btn btn-default btn-block inResultSendMessageBtn">
                                        <i class="fas fa-envelope" aria-hidden="true"></i> Send Message </a>
                                </div>
                                <div class="col-xxl-11 col-xl-11 col-lg-11 pull-right gridFullWidth" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-xxl-5 col-xl-5 col-xs-16 col-lg-5 gt-margin-top-10 gridFullWidth"
                                            bis_skin_checked="1">

                                            <a data-toggle="modal" data-target="#myModal1" title="Send Interest"
                                                onclick="ExpressInterest('IN1')" class="btn gt-btn-orange btn-block">
                                                <i class="fas fa-heart gt-margin-right-5" aria-hidden="true"></i>Send
                                                Interest </a>
                                        </div>
                                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden"
                                            bis_skin_checked="1">
                                            <a class="btn btn-default btn-block inResultBlockBtn gt-cursor 
                        addToshort-data"
                                                id="IN1" title="Add to Blocklist">
                                                <i class="fas fa-ban gt-margin-right-5" aria-hidden="true"></i>Add to
                                                Blocklist </a>
                                        </div>
                                        <div class="col-xxl-5 col-xl-5 col-lg-5 col-xs-16 gt-margin-top-10 gridHidden"
                                            bis_skin_checked="1">
                                            <a class="btn btn-default btn-block inResultShortBtn gt-cursor addToshort-link"
                                                id="IN1" title="Add to Shortlist">
                                                <i class="fa fa-sort gt-margin-right-5" aria-hidden="true"></i>Add to
                                                Shortlist </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <div class="modal fade-in" id="myModal1" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <div class="modal fade-in" id="myModal5" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <div class="modal fade-in" id="myModal6" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <div class="modal fade-in" id="myModal7" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" bis_skin_checked="1"></div>
                    <script src="js/function.js" type="text/javascript"></script>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" bis_skin_checked="1">
                        <div class="modal-dialog" bis_skin_checked="1">
                            <div class="modal-content" bis_skin_checked="1">
                                <form name="saved_search_form" id="saved_search_form" method="post" action="">
                                    <div class="modal-header" bis_skin_checked="1">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            Saved Search
                                        </h4>
                                    </div>
                                    <div class="modal-body" id="div_saved_search" bis_skin_checked="1">
                                        Saved Search Name :
                                        <div class="" bis_skin_checked="1">
                                            <input type="text" name="txt_saved_search_name" id="txt_saved_search_name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-body " id="div_success" bis_skin_checked="1"></div>
                                    <div class="modal-footer" bis_skin_checked="1">
                                        <input type="button" class="btn btn-default pull-right" data-dismiss="modal"
                                            value="Close">
                                        <input type="button" class="btn btn-default pull-right" id="sub_saved_search"
                                            value="Submit">
                                    </div>
                                </form>
                                <div class="clearfix" bis_skin_checked="1"></div>
                            </div>
                        </div>
                    </div>
                    <style>
                        nav.center-text {
                            background: none;
                        }

                        .current {
                            background: none repeat scroll 0 0 #428bca !important;
                            color: #fff !important;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container gt-margin-top-10">
    </div>
    <script type="text/javascript">
        var auto_refresh = setInterval(
            function() {
                $('#count').load('parts/online').fadeIn("slow");
            }, 15000
        ); // refresh every 10 second
    </script>

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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142522590-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-142522590-1');
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
                        function save_search() {
                            $('#txt_saved_search_name').val('');
                            $("#div_saved_search").show();
                            $("#div_success").hide();
                        }
                        $(document).ready(function(e) {
                            $('#sub_saved_search').click(function() {
                                if ($('#txt_saved_search_name').val() == '') {
                                    alert('Please fill up the saved search name.');
                                    return false;
                                } else {
                                    var txt_saved_search_nm = $('#txt_saved_search_name').val();
                                    $.ajax({
                                        type: "POST",
                                        url: "saved_search_query",
                                        data: 'saved_nm=' + txt_saved_search_nm,
                                        success: function(data) {
                                            $("#div_saved_search").hide();
                                            $('#sub_saved_search').hide();
                                            $("#div_success").show();
                                            $("#div_success").html(data);
                                        }
                                    });
                                }
                            });
                        });
                    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var dataString = 'result_status=broader&actionfunction=showData' + '&page=1';

            $("#loaderID").css("opacity", 1);
            $("#loaderID").css("z-index", 9999);
            $.ajax({
                url: "dbmanupulate1",
                type: "POST",
                data: dataString,
                cache: false,
                success: function(response) {
                    $("#loaderID").css("opacity", 0);
                    $("#loaderID").css("z-index", -1);
                    $('#pagination').html(response);
                }
            });
            $('#pagination').on('click', '.page-numbers', function() {
                $("#loaderID").css("opacity", 1);
                $("#loaderID").css("z-index", 9999);
                $page = $(this).attr('href');
                $pageind = $page.indexOf('page=');
                $page = $page.substring(($pageind + 5));

                var dataString = 'result_status=broader&actionfunction=showData' + '&page=' + $page;
                $.ajax({
                    url: "dbmanupulate1",
                    type: "POST",
                    data: dataString,
                    cache: false,
                    success: function(response) {
                        $("#loaderID").css("opacity", 0);
                        $("#loaderID").css("z-index", -1);
                        $('#pagination').html(response);
                    }
                });
                return false;
            });
        });
    </script>
@endsection

