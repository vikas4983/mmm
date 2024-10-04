@extends('layouts1.app')
@section('title', 'Privacy - Mangal Mandap')
@section('content')
<div class="container">
            			<div class="row">
              				<div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 gt-margin-bottom-20 text-center">
                				<h2 class="inPageTitle fontMerriWeather inThemeOrange">All Settings</h2>
                				<p class="inPageSubTitle">Here is all of your settings you can set your privacy as you want.</p>
              				</div>
						  	<div class="clearfix"></div>
             	 			<div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 gt-search-opt gt-margin-bottom-20">
                				<div role="tabpanel">
                  					<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#photo-privacy" aria-controls="photo-privacy" role="tab" data-toggle="tab">
												<i class="fa fa-image gt-margin-right-10 fa-lg"></i> Photo Privacy									  		</a>
										</li>
										<li role="presentation" class="">
											<a href="#blocklist" aria-controls="blocklist" role="tab" data-toggle="tab">
												<i class="fa fa-user-times gt-margin-right-10 fa-lg"></i> Blacklist										  	</a>
										</li>
                   						<li role="presentation" class="">
											<a href="#contact-setting" aria-controls="contact-setting" role="tab" data-toggle="tab">
												<i class="fa fa-phone gt-margin-right-10 fa-lg"></i> Contact show setting										  	</a>
                    					</li>
                   		 				<li role="presentation" class="" >
                      						<a href="#change-password" aria-controls="change-password" role="tab" data-toggle="tab">
                        						<i class="fa fa-cog gt-margin-right-10 fa-lg"></i> Change Password                      						</a>
                    					</li>
                  					</ul>
                  					<div class="tab-content">
										<!-- Photo Privacy -->
										<div role="tabpanel" class="tab-pane  active  " id="photo-privacy">
											<div class="row">
												<div class="col-xxl-14 col-xxl-offset-2 col-xl-14 col-xl-offset-1">
													<h3 class="inSearchTitle">Photo Privacy Setting</h3>
													<p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle"> You can set you photo privacy from here,so can manage who can see your photos. </p>
													<div class="row">
														<div class="col-xxl-4 col-xl-4 col-xs-16 col-sm-16 col-md-16 col-lg-6">
															<h5>Current Status :</h5>
														</div>
														<div class="col-xxl-4 col-xl-4 col-xs-10 col-sm-10 col-md-10 col-lg-6">
															<h5>
																<span class="text-danger gt-mar" id="photo_view_status">
																	<i class="fa fa-eye gt-margin-right-10"></i>Show To All
																</span>
															</h5> 
														</div>
														<div class="col-xxl-4 col-xl-4 col-xs-6 col-sm-6 col-md-6 col-lg-4">
															<a class="btn btn-danger" role="button" data-toggle="collapse" href="#photo-settings" aria-expanded="false" aria-controls="photo-settings">
																<i class="fa fa-pen gt-margin-right-10"></i>Edit 
															</a>
														</div>
													</div>
													<div class="row gt-margin-top-20">
														<div class="collapse col-xxl-11 col-xl-12 col-xs-16 col-sm-16 col-md-16 col-lg-12" id="photo-settings">
                                                        </div>
													</div>
													<div class="row">
																													<div class="col-xxl-5 col-xl-5 col-xs-16 col-sm-16 col-md-16 col-lg-6"> 
																<a class="" role="button" data-toggle="collapse" href="#photo-settings-2" aria-expanded="false" aria-controls="photo-settings-2">
																	Set Password for protect photo
																</a> 
															</div>
																												</div>
													<div class="row gt-margin-top-20">
														<div class="collapse col-xxl-11 col-xl-12 col-xs-16 col-sm-16 col-md-16 col-lg-12" id="photo-settings-2">
															<div class="col-xs-16 col-xxl-16 col-xl-16 col-md-16 col-sm-16 col-lg-16 setting-collapse-bucket">
																<div class="row gt-margin-bottom-10">
																	<form action="" method="post" name="set_photo_pass_form" id="set_photo_pass_form">
																		<div class="col-xxl-6 col-xl-6 col-xs-16 col-sm-16 col-md-16 col-lg-6">
																			<input type="text" name="set_pass" placeholder="Set Photo Password" class="gt-form-control" data-validetta="required">
																		</div>
																		<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-16 col-sm-16 col-xs-16 gt-margin-bottom-10">
																			<input type="submit" name="set_photo_pass" value="Submit" class="btn gt-btn-green">
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /. Photo Privacy -->
										<!-- Blacklist -->
										<div role="tabpanel" class="tab-pane " id="blocklist">
											<div class="row">
												<div class="col-xxl-12 col-xxl-offset-2 col-xl-14 col-xl-offset-1">
													<h3 class="inSearchTitle">Blocked Members List</h3>
													<p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle"> 
														You can see all blocked members list here and you also can block directly from here. 
													</p>
													<div class="row gt-margin-top-20">
														<form action="" method="post" id="blocklist_form" name="blocklist_form">
															<div class="col-xxl-10 col-xl-10 col-lg-12 col-md-16 col-sm-16 col-xs-16">
																<label> Enter User Id Or Email Id </label>
																<div class="input-group">
																	<span class="">
																		<input type="text" class="gt-form-control flat" placeholder="Enter User Id Or Email Id" name="blockuserid" id="blockuserid" data-validetta="required">
																	</span> 
																	<span class="input-group-btn">
																		<button class="btn btn-danger gt-btn-lg flat" type="submit" name="block_sub" value="block_sub">
																		  <i class="fa fa-user-times gt-margin-right-10"></i>Block																		</button>
																	</span>
																</div>
															</div>
														</form>
													</div>
													<div id="blocklistdiv"></div>
												</div>
											</div>
										</div>
										<!-- /. Blacklist -->
										<!-- Contact View -->
										<div role="tabpanel" class="tab-pane " id="contact-setting">
											<div class="row">
												<div class="col-xxl-12 col-xxl-offset-2 col-xl-14 col-xl-offset-1">
													<h3 class="inSearchTitle">Contact show setting</h3>
													<p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle"> 
														Contact show setting option gives you access to set privacy for your contact detail. 
													</p>
													<div class="row">
														<div class="col-xxl-4 col-xl-4 col-xs-16 col-sm-16 col-md-16 col-lg-6">
															<h5>Current Status :</h5> 
														</div>
														<div class="col-xxl-4 col-xl-4 col-xs-10 col-sm-10 col-md-10 col-lg-6">
															<h5>
																<span class="text-danger gt-mar" id="contact_view_status">
																	<i class="fa fa-eye gt-margin-right-10"></i>Show To Express Interest Accepted Paid Member																</span>
															</h5> 
														</div>
														<div class="col-xxl-4 col-xl-4 col-xs-6 col-sm-6 col-md-6 col-lg-4">
															<a class="btn btn-danger" role="button" data-toggle="collapse" href="#contact-show" aria-expanded="false" aria-controls="contact-show"> 
																<i class="fa fa-pen gt-margin-right-10"></i>Edit 
															</a>
														</div>
													</div>
													<div class="row gt-margin-top-20">
														<div class="collapse col-xxl-11 col-xl-12 col-xs-16 col-sm-16 col-md-16 col-lg-12" id="contact-show"> </div>
													</div>
												</div>
											</div>
										</div>
										<!-- /. Contact View -->
										<!-- Change Password -->
										<div role="tabpanel" class="tab-pane " id="change-password">
											<div class="row">
												<div class="col-xxl-12 col-xxl-offset-2 col-xl-14 col-xl-offset-1">
													<h3 class="inSearchTitle">Change Password</h3>
													<p class="pb-10 gt-border-bottom-smoke-white inSearchSubTitle"> 
														Have any privacy concern ? You can easily change your account password from here. 
													</p>
													<div class="row">
														<form action="" method="post" name="change_pass" id="change_pass">
															<div class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15">
																<label> Enter Old Password </label>
																<input type="password" id="old_pass" name="old_pass" data-validetta="required" class="gt-form-control">
																<div class='error-msg' id='validationSummary'> </div>
																 
															</div>
															<div class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15">
																<label>Enter New Password</label>
																<input type="password" class="gt-form-control" id="new_pass" name="new_pass" data-validetta="required">
															</div>
															<div class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15">
																<label>Confirm New Password</label>
																<input type="password" class="gt-form-control" id="cnfm_pass" name="cnfm_pass" data-validetta="equalTo[new_pass]">
															</div>
															<div class="col-xs-16 col-sm-16 col-md-16 col-lg-16 col-xxl-10 col-xxl-offset-3 col-xl-10 col-xl-offset-3 gt-margin-bottom-15 text-center">
																<input type="submit" name="submit" value="Save Changes" class="btn gt-btn-green inBtnTheme-1"> 
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- /. Change Password -->
									</div>
                				</div>
              				</div>
            			</div>
          			</div>
        		</div>
<script type="text/javascript">
	var auto_refresh = setInterval(
		function (){
			$('#count').load('parts/online').fadeIn("slow");
		},15000 
	); // refresh every 10 second
</script>
<script src="js/jquery.min.js"></script>
<small class="pull-right">
        <link rel="stylesheet" type="text/css" href="who-is-online/widget.css" />
    <script type="text/javascript" src="who-is-online/widget.js"></script>
    <div class="onlineWidget">
	    <div class="channel">
            <img class="preloader" src="who-is-online/img/preloader.gif" alt="Loading.." width="22" height="22" />
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
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
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
        <!--<script src="js/jquery.validate.js"></script>-->
        <script>
            $(document).ready(function() {
              $('#body').show();
              $('.preloader-wrapper').hide();
            });
        </script>
        <!-- Mobile Side Panel Collapse -->
        <script>
            (function($) {
            var $window = $(window),
                $html = $('.mobile-collapse');
                    $window.width(function width(){
                        if ($window.width() > 767) {
                        return $html.addClass('in');
                    }
                    $html.removeClass('in');
                    });
                })(jQuery);
        </script>
        <script type="text/javascript" src="js/validetta.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#set_photo_pass_form').validetta({
                    errorClose: false,
                    realTime: true
                });
            });
            $(function() {
                $('#blocklist_form').validetta({
                    errorClose: false,
                    realTime: true
                });
            });
            $(function() {
                $('#change_pass').validetta({
                    errorClose: false,
                    realTime: true
                });
            });

            function photovisbility(pval) {
                var dataString = 'photo_view_status='+pval;
                jQuery.ajax({
                    url: "./web-services/set_view_preference",
                    type: "POST",
                    data: dataString,
                    cache: false,
                    success: function(response) {
                        $('#photo-settings').html(response);
                        if(pval == '0') {
                            $('#photo_view_status').html('<i class="fa fa-eye-slash gt-margin-right-10"></i>Hidden For All');
                        } else if(pval == '1') {
                            $('#photo_view_status').html('<i class="fa fa-eye gt-margin-right-10"></i>Visible To All Members');
                        } else if(pval == '2') {
                            $('#photo_view_status').html('<i class="fa fa-eye gt-margin-right-10"></i>Visible To Paid Members');
                        }
                        //alert('Your photo view preference is edited Successfully.');
                    },
                });
            }

            function contactvisbility(pval) {
                var dataString='contact_view_status='+pval;
                jQuery.ajax({
                    url:"./web-services/set_view_preference",
                    type:"POST",
                    data:dataString,
                    cache: false,
                    success:function(response){
                        $('#contact-show').html(response);
                        if(pval == '1') {
                            $('#contact_view_status').html('<i class="fa fa-eye gt-margin-right-10"></i>Show To Paid Members');
                        } else if(pval == '0') {
                            $('#contact_view_status').html('<i class="fa fa-eye gt-margin-right-10"></i>Show To Express Interest &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accepted Paid Member');
                        }
                        //alert('Your photo view preference is edited Successfully.');
                    },
                });
            }

            function removephotopass() {
                var dataString = 'remove_photo_pass=1';
                jQuery.ajax({
                    url: "./web-services/set_view_preference",
                    type: "POST",
                    data: dataString,
                    cache: false,
                    success: function(response) {
                        alert('Your photo protect password successfully removed.');
                        window.location = 'settings?photoVisiblity';
                    },
                });
            }
            $(document).ready(function(e) {
                photovisbility('1');
                contactvisbility('1');
            });
        </script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: 'web-services/blocklist-pagination',
                    type: 'POST',
                    data: 'actionfunction=showData' + '&page=1',
                    success: function(data) {
                        $('#blocklistdiv').html(data);
                    },
                    error: function() {
                        //called when there is an error
                        //console.log(e.message);
                    }
                });
                $('#blocklistdiv').on('click', '.page-numbers', function() {
                    $page = $(this).attr('href');
                    $pageind = $page.indexOf('page=');
                    $page = $page.substring(($pageind + 5));
                    var dataString = 'actionfunction=showData' + '&page=' + $page;
                    $.ajax({
                        url: "web-services/blocklist-pagination",
                        type: "POST",
                        data: dataString,
                        cache: false,
                        success: function(response) {
                            $('#blocklistdiv').html(response);
                        }
                    });
                    return false;
                });
            });
        </script>
  	</body>
</html>                                                                                                                              
<script>
    $(document).ready(function(){
        dis_thumbnail();
    });
    function dis_thumbnail(){
        var dataString = '';
        jQuery.ajax({
            url: "./web-services/display_thumbnail",
            type: "POST",
            data: dataString,
            cache: false,
            success: function(response)
            {
                $("#dis_thumbnail").html('');
                $("#dis_thumbnail").append(response);
            },
        });
    }
</script>
@endsection
