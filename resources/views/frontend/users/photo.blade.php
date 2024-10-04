@extends('layouts1.app')
@section('title', ' My Photos - Mangal Mandap')
@section('content')
<div class="container gt-margin-top-20">
            			<div class="row">
							<div class="col-xxl-12 col-xxl-offset-4 col-xl-12 col-xl-offset-4 text-center">
								<h2 class="inPageTitle fontMerriWeather inThemeOrange">Upload & Profile Picture Settings</h2>
								<article>
									<p class="inPageSubTitle mb-20">
										Here is your option to set your profile pictures and other pictures.Remember upload profile picture gives you 10 times better respose.So do it now if you didnt.
									</p>
								</article>
							</div>
							<div class="col-xxl-4 col-xl-4 gt-left-opt-msg">
								<a class="btn gt-btn-green btn-block hidden-xxl hidden-xl gt-margin-bottom-20" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >
									Options <i class="fa fa-angle-down"></i>
								</a>
								<div class="collapse mobile-collapse" id="collapseExample">
									<div class="gt-panel gt-panel-orange inHomeLeftPanel">
    <div class="gt-panel-head">
        <div class="gt-panel-title text-center">
            MESSAGES        </div>
    </div>
    <div class="gt-left-pan-option">
        <div class="row">
            <a href="inboxMessages" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        Inbox                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            0                        </div>
                    </span>
                </div>
            </a>
            <a href="sentMessages" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        Outbox                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            13                        </div>
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="gt-panel gt-panel-orange inHomeLeftPanel">
    <div class="gt-panel-head">
        <div class="gt-panel-title text-center">
           MY PROFILE        </div>
    </div>
    <div class="gt-left-pan-option">
        <div class="row">
            <a href="view-profile" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                Edit Profile            </a>
            <a href="my-photo" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                Manage Photos            </a>
        </div>
    </div>
</div>
<div class="gt-panel gt-panel-orange inHomeLeftPanel">
    <div class="gt-panel-head">
        <div class="gt-panel-title text-center">
            PROFILE DETAILS        </div>
    </div>
    <div class="gt-left-pan-option">
        <div class="row">
            <a href="exp-interest" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        Express Interest Received                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            1                        </div>
                    </span>
                </div>
            </a>
            <a href="shortlisted-members" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        My Shortlist Profile                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            1                        </div>
                    </span>
                </div>
            </a>
            <a href="blocklisted-members" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        My Blocklist Profile                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            0                        </div>
                    </span>
                </div>
            </a>

            <a href="member-visited-me" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        My Profile Viewed By                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            1                        </div>
                    </span>
                </div>
            </a>
            <a href="i-visited-members" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        I Visited Profile                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            5                        </div>
                    </span>
                </div>
            </a>
            <a href="who-watch-mobileno" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                        Mobile Numbers Viewed By Me                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            0                        </div>
                    </span>
                </div>
            </a>

            <a href="photo-request" class="col-xxl-16 col-xl-16 col-xs-16 ripplelink inBRBtm5">
                <div class="row">
                    <div class="col-xxl-13 col-xl-12 col-xs-13">
                       Photo Password Request Received 
                    </div>
                    <span class="col-xxl-3 col-xs-3 col-xl-4">
                        <div class="badge">
                            0                        </div>
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>
    <div class="gt-panel gt-panel-orange inHomeLeftPanel">
        <div class="gt-panel-head">
            <div class="gt-panel-title text-center">
                SAVED SEARCHES            </div>
        </div>
        <div class="gt-saved-search">
            <div class="row">
                                    <a href="search_result.php?ss_id=1" class="col-xxl-16 col-xl-16 col-xs-16 col-lg-8 ripplelink" >
                        <h4 class="gt-text-orange">
                            abc                        </h4>
                        <h5>
                            <i class="fa fa-calendar gt-margin-right-5"></i>13 Mar 2024 ,18:46 PM 
                        </h5>

                    </a>
                          
            </div>
        </div>
    </div>
								</div>
							</div>
                			<div class="col-xxl-12 col-xl-12 col-xs-16 col-sm-16 col-md-16 gt-upload-photo">
								<div class="inUploadPhoto mb-30">
									<div class="gt-profile-pic-title">
										<h4>Change Or Upload Profile Picture</h4>
									</div>
									<div class="gt-profile-pic-panel">
										<div class="col-xs-16 col-md-16 col-xxl-16 col-xl-16 col-lg-16">
											<div class="row">
												<div class="col-xxl-6 col-xxl-offset-5 col-xl-6 col-xxl-offset-5 col-md-12 col-md-offset-2 col-lg-6 col-lg-offset-5">
													<div class="col-xs-16 gtImageUpload">
														 
															<img src="my_photos/cropped4874125363721381687.jpg" class="img-responsive img-thumbnail gt-margin-bottom-15">
														 
															<a href="#editPhoto1Modal" data-toggle="modal" class="btn gt-btn-green btn-block gt-margin-bottom-10">
																Change Profile Picture															</a>
														 
															<a href="my-photo.php?del_id=1" class="btn btn-danger btn-block">
																Delete Profile Picture															</a>
																											</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="inUploadPhoto mb-30">
									<div class="gt-profile-pic-title">
										<h4>Upload More Photos</h4>
									</div>
									<div class="gt-profile-pic-panel">
                        				<div class="row">
											<div class="col-xxl-4 col-xs-8 col-md-4">
												<div class="gtImageUpload">
													<div class="thumbnail">
														<div class="caption text-center">Photo 2</div>
																													<img src="my_photos/cropped2346294346668212043.jpg" class="img-responsive gt-margin-bottom-15">
																								 
													</div>  
													<a href="#editPhoto2Modal" data-toggle="modal" class="btn gt-btn-green btn-block gt-margin-bottom-10">
														Edit Photo 2
													</a>
																											<a href="my-photo.php?del_id=2" class="btn btn-danger btn-block">
															Delete Photo 2
														</a>
																									</div>
											</div>
											<div class="col-xxl-4 col-xs-8 col-md-4">
												<div class="gtImageUpload">
													<div class="thumbnail">
														<div class="caption text-center">
															Photo 3
														</div>
																																													<img src="img/female.jpg" class="img-responsive gt-margin-bottom-15">	
																								 
													</div>  
													<a href="#editPhoto3Modal" data-toggle="modal" class="btn gt-btn-green btn-block gt-margin-bottom-10">
														Edit Photo 3
													</a>
																									</div>
											</div>
											<div class="col-xxl-4 col-xs-8 col-md-4">
												<div class="gtImageUpload">
													<div class="thumbnail">
														<div class="caption text-center">Photo 4</div>
																																													<img src="img/female.jpg" class="img-responsive gt-margin-bottom-15">	
																								 
													</div>  
													<a href="#editPhoto4Modal" data-toggle="modal" class="btn gt-btn-green btn-block gt-margin-bottom-10">
														Edit Photo 4
													</a>
																									</div>
											</div>
											<div class="col-xxl-4 col-xs-8 col-md-4">
												<div class="gtImageUpload">
													<div class="thumbnail">
														<div class="caption text-center">Photo 5</div>
																																													<img src="img/female.jpg" class="img-responsive gt-margin-bottom-15">	
																								 
													</div>  
													<a href="#editPhoto5Modal" data-toggle="modal" class="btn gt-btn-green btn-block gt-margin-bottom-10">
														  Edit Photo 5
													</a>
																									</div>
											</div>
						 				</div>
										<div class="row gt-margin-top-20">
											<div class="col-xxl-4 col-xs-8 col-md-4">
												<div class="gtImageUpload">
													<div class="thumbnail">
														<div class="caption text-center">Photo 6</div>
																																													<img src="img/female.jpg" class="img-responsive gt-margin-bottom-15">	
																								 
													</div>  
													<a href="#editPhoto6Modal" data-toggle="modal" class="btn gt-btn-green btn-block gt-margin-bottom-10">
														Edit Photo 6
													</a>
																									</div>
											</div>
										</div>
                    				</div>
								</div>
                			</div>
            			</div>
        			</div>


                    <!-- Photo Edit Modal -->
			<div class="modal fade" id="editPhoto1Modal" tabindex="-1" role="dialog" aria-labelledby="editPhoto1Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
       	<div class="col-12">
        	<h5 class="modal-title" id="exampleModalLabel">Edit Profile Picture         	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        	</h5>
        </div>
      </div>
      <div class="modal-body">
       	<form action="" method="post" enctype="multipart/form-data" class="editPhotoModal">
       		<p class="text-center">Select image and then click on submit button to upload image</p>
        	<div class="col-xxl-10 col-xxl-offset-3">
				<center>
   				   					<img src="my_photos/cropped4874125363721381687.jpg" class="img-fluid img-thumbnail" id="photo1_prev">
   				   				<input type="file" name="photo1" id="photo1" onchange="readURL1(this);">
   				<label for="photo1" class="btn gt-btn-orange btn-block gt-margin-top-20">
					Select Image				</label>
				<div class="form-group text-center mt-3">
					<input type="submit" name="editPhoto1" value="SUBMIT" class="btn gt-btn-green btn-block gt-margin-top-20">
				</div>
				</center>
       		</div>
        </form>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>			<div class="modal fade" id="editPhoto2Modal" tabindex="-1" role="dialog" aria-labelledby="editPhoto1Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
       	<div class="col-12">
        	<h5 class="modal-title" id="exampleModalLabel">Edit Photo 2
         	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        	</h5>
        </div>
      </div>
      <div class="modal-body">
       	<form action="" method="post" enctype="multipart/form-data" class="editPhotoModal">
       		<p class="text-center">Select image and then click on submit button to upload image</p>
        	<div class="col-xxl-10 col-xxl-offset-3">
				<center>
   				   					<img src="my_photos/cropped2346294346668212043.jpg" class="img-fluid img-thumbnail" id="photo2_prev">
   				   				<input type="file" name="photo2" id="photo2" onchange="readURL2(this);">
   				<label for="photo2" class="btn gt-btn-orange btn-block gt-margin-top-20">
					Select Image				</label>
				<div class="form-group text-center mt-3">
					<input type="submit" name="editPhoto2" value="SUBMIT" class="btn gt-btn-green btn-block gt-margin-top-20">
				</div>
				</center>
       		</div>
        </form>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>			<div class="modal fade" id="editPhoto3Modal" tabindex="-1" role="dialog" aria-labelledby="editPhoto1Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
       	<div class="col-12">
        	<h5 class="modal-title" id="exampleModalLabel">Edit Photo 3
         	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        	</h5>
        </div>
      </div>
      <div class="modal-body">
       	<form action="" method="post" enctype="multipart/form-data" class="editPhotoModal">
       		<p class="text-center">Select image and then click on submit button to upload image</p>
        	<div class="col-xxl-10 col-xxl-offset-3">
				<center>
   				   					   						<img src="img/female.jpg" class="img-fluid img-thumbnail" id="photo3_prev">
					   				   				<input type="file" name="photo3" id="photo3" onchange="readURL3(this);">
   				<label for="photo3" class="btn gt-btn-orange btn-block gt-margin-top-20">
					Select Image				</label>
				<div class="form-group text-center mt-3">
					<input type="submit" name="editPhoto3" value="SUBMIT" class="btn gt-btn-green btn-block gt-margin-top-20">
				</div>
				</center>
       		</div>
        </form>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>			<div class="modal fade" id="editPhoto4Modal" tabindex="-1" role="dialog" aria-labelledby="editPhoto1Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
       	<div class="col-12">
        	<h5 class="modal-title" id="exampleModalLabel">Edit Photo 4
         	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        	</h5>
        </div>
      </div>
      <div class="modal-body">
       	<form action="" method="post" enctype="multipart/form-data" class="editPhotoModal">
       		<p class="text-center">Select image and then click on submit button to upload image</p>
        	<div class="col-xxl-10 col-xxl-offset-3">
				<center>
   				   					   						<img src="img/female.jpg" class="img-fluid img-thumbnail" id="photo4_prev">
					   				   				<input type="file" name="photo4" id="photo4" onchange="readURL4(this);">
   				<label for="photo4" class="btn gt-btn-orange btn-block gt-margin-top-20">
					Select Image				</label>
				<div class="form-group text-center">
					<input type="submit" name="editPhoto4" value="SUBMIT" class="btn gt-btn-green btn-block gt-margin-top-20">
				</div>
				</center>
       		</div>
        </form>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>			<div class="modal fade" id="editPhoto5Modal" tabindex="-1" role="dialog" aria-labelledby="editPhoto1Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
       	<div class="col-12">
        	<h5 class="modal-title" id="exampleModalLabel">Edit Photo 5
         	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        	</h5>
        </div>
      </div>
      <div class="modal-body">
       	<form action="" method="post" enctype="multipart/form-data" class="editPhotoModal">
       		<p class="text-center">Select image and then click on submit button to upload image</p>
        	<div class="col-xxl-10 col-xxl-offset-3">
				<center>
   				   					   						<img src="img/female.jpg" class="img-fluid img-thumbnail" id="photo5_prev">
					   				   				<input type="file" name="photo5" id="photo5" onchange="readURL5(this);">
   				<label for="photo5" class="btn gt-btn-orange btn-block gt-margin-top-20">
					Select Image				</label>
				<div class="form-group text-center">
					<input type="submit" name="editPhoto5" value="SUBMIT" class="btn gt-btn-green btn-block gt-margin-top-20">
				</div>
				</center>
       		</div>
        </form>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>			<div class="modal fade" id="editPhoto6Modal" tabindex="-1" role="dialog" aria-labelledby="editPhoto6Modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
       	<div class="col-12">
        	<h5 class="modal-title" id="exampleModalLabel">Edit Photo 6
         	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        	</h5>
        </div>
      </div>
      <div class="modal-body">
       	<form action="" method="post" enctype="multipart/form-data" class="editPhotoModal">
       		<p class="text-center">Select image and then click on submit button to upload image</p>
        	<div class="col-xxl-10 col-xxl-offset-3">
				<center>
   				   					   						<img src="img/female.jpg" class="img-fluid img-thumbnail" id="photo6_prev">
					   				   				<input type="file" name="photo6" id="photo6" onchange="readURL6(this);">
   				<label for="photo6" class="btn gt-btn-orange btn-block gt-margin-top-20">
					Select Image				</label>
				<div class="form-group text-center">
					<input type="submit" name="editPhoto6" value="SUBMIT" class="btn gt-btn-green btn-block gt-margin-top-20">
				</div>
				</center>
       		</div>
        </form>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>		</div>
        
       
 		<!-- Responsive Tab js -->
        <script src="{{asset('assets/js/jquery.bootstrap-responsive-tabs.min.js')}}" type="text/javascript"></script>
        <script>
			$('.responsive-tabs').responsiveTabs({
  			accordionOn: ['xs', 'sm']
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
		<script>
			function readURL1(input) {
				if(input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#photo1_prev').attr('src', e.target.result)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
	  	</script>
	  	<script>
			function readURL2(input) {
				if(input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#photo2_prev').attr('src', e.target.result)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
	  	</script>
	  	<script>
			function readURL3(input) {
				if(input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#photo3_prev').attr('src', e.target.result)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
	  	</script>
	  	<script>
			function readURL4(input) {
				if(input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#photo4_prev').attr('src', e.target.result)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
	  	</script>
	  	<script>
			function readURL5(input) {
				if(input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#photo5_prev').attr('src', e.target.result)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
	  	</script>
	  	<script>
			function readURL6(input) {
				if(input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#photo6_prev').attr('src', e.target.result)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
	  	</script>
@endsection