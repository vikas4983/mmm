<?php $__env->startSection('title', 'Document - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
<div class="container gt-margin-top-20">
						<div class="row">
							<div class="col-xxl-12 col-xxl-offset-2 col-xl-12 col-xl-offset-2  gt-margin-bottom-20 gt-upload-photo">
								<h3 class="inPageTitle fontMerriWeather inThemeOrange text-center">Document – Upload / Edit Details</h3>
								<article class="text-center">
									<p class="inPageSubTitle mb-20">
										Uploading document will get your profile approval of authentication									</p>
								</article>
								<div class="gt-profile-pic-panel gt-margin-top-20" bis_skin_checked="1">
									<div class="row" bis_skin_checked="1">
										<div class="col-xxl-6 gtPreviewAadhaar" bis_skin_checked="1">
											<div class="thumbnail" bis_skin_checked="1">
																									<img src="img/document-default.jpg" class="img-responsive">
																								<div class="caption" bis_skin_checked="1">
													<h5 class="text-center gt-margin-bottom-0 gt-margin-top-0">Status : <b class="text-danger"></b></h5>
												</div>
											</div>
										</div>
										<form action="" class="col-xxl-10 gt-margin-top-40" method="post" enctype="multipart/form-data">
											<div class="form-group" bis_skin_checked="1">
												<label>To get verified Upload document below:</label>
												<input type="file" placeholder="Select File" class="gt-form-control" name="attachment">
											</div>
											<div class="col-xxl-16 text-center" bis_skin_checked="1">
											<input type="Submit" value="Upload" name="submit" class="btn gt-btn-orange inBtnTheme-2">
											</div>
									   </form>
									</div>
								</div>
							</div>
			   			</div>
			 		</div>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-body">
       				<div class="col-xxl-16">
       					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       				</div>
       				<div class="col-xxl-16 gtAadhaarModal">
        				<img src="uploads/1710357944.jpg" class="img-responsive">
        			</div>
      			</div>
      			<div class="clearfix"></div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      			</div>
    		</div>
  		</div>
	</div>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts1.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\document.blade.php ENDPATH**/ ?>