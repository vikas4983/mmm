<?php $__env->startSection('title', ' Help - Mangal Mandap'); ?>
<?php $__env->startSection('styles'); ?>
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
			<!-- Bootstrap & Green Js -->
			<script src="<?php echo e(asset('assets/js/bootstrap.js')); ?>"></script>
			<script src="<?php echo e(asset('assets/js/green.js')); ?>"></script>
           
            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
					<h2 class="text-center inPageTitle fontMerriWeather">Contact Us</h2>
                	<p class="inPageSubTitle text-center mb-20">Feel free to contact us you can ask your questions and query here.</p>
    				<div class="row mt-30">
        				<div class="col-xxl-8 col-xl-8">
                			<div class="row">
                                        						<div class="col-xxl-16 col-xs-16 col-xl-16">
            						<div class="gt-panel inContactPanel">
                						<div class="gt-panel-border-orange">
                    						<h4 class="gt-panel-title">Main Branch Address</h4>
                    					</div>
                						<div class="gt-panel-body">
                    						<div class="row">
                    							<div class="col-xxl-16">
                        							<h4 style="font-family: Gotham, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);"><font face="tahoma, sans-serif" size="4">Mangalmandap.com</font></h4><h4 style="font-family: Gotham, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);">Address:- Nagpur Road Madan Mahal,</h4><h4 style="font-family: Gotham, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Jabalpur India</h4><h4 style="font-family: Gotham, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; color: rgb(51, 51, 51);">Email:-&nbsp; &nbsp; &nbsp;Mangalmandap2016@gmail.com</h4>                        						</div>
                        					</div>
                    					</div>
                 					</div>
            					</div>
                                								           						<div class="col-xxl-16 col-xs-16 col-xl-16">
            						<div class="gt-panel inContactPanel">
                						<div class="gt-panel-border-green">
                    						<h4 class="gt-panel-title">Sub Branch Address</h4>
                    					</div>
                						<div class="gt-panel-body">
                    						<div class="row">
                    							<div class="col-xxl-16">
                        						                        						</div>
                        					</div>
                    					</div>
                 					</div>
           						</div>
								           					</div>
                		</div>
                		<div class="col-xxl-8 col-xl-8">
                			<div class="row">
								<div class="col-xs-16">
        							<div class="gt-panel inContactPanel">
										<div class="gt-panel-border-green">
											<h4 class="gt-panel-title">Ask query or give us feedback</h4>
										</div>
										<div class="gt-panel-body">
											<div class="row">
												<div class="col-xxl-16">
													<form method="post" id="contactform" class="gt-search-opt">
														<div class="form-group">
															<label>Full Name</label>
															<input type="text" class="gt-form-control" name="txt_name" id="txt_name" placeholder="Enter Your Full Name" data-validetta="required">
														</div>
														<div class="form-group">
															<label>Email Id</label>
															<input type="email" class="gt-form-control" name="txt_email" id="txt_email" placeholder="Enter Your Email Id Here" data-validetta="email,required">
														</div>
														<div class="form-group">
															<label>Contact No</label>
															<input type="text" maxlength="10" class="gt-form-control" placeholder="Enter Your Mobile No" name="phone_no" id="phone_no" data-validetta="number,required">
														</div>
														<div class="form-group">
															<label>Subject</label>
															<input type="text" class="gt-form-control" name="subject" id="subject" placeholder="Enter Your Subject Here" data-validetta="required">
														</div>
														<div class="form-group">
															<label>Description</label>
															<textarea class="gt-form-control" rows="5" id="description" name="description" placeholder="Enter Your Query Here"></textarea>
														</div>
														<div class="form-group">
															<div class="row">
																<div class="col-xl-8">
																	<label>Enter Captcha</label>
																	<input type="text" class="gt-form-control" name="captcha" placeholder="Enter Captcha" data-validetta="required">
																</div>
																<div class="col-xl-8">
																	<div class="mb-10">
																		<img src="captcha.php?rand=1234680416" id='captcha_image'>
																	</div>
																	<div>
																		<b><a href="javascript:refreshCaptcha();">click here</a> to refresh</b>
																	</div>
																	
																</div>
															</div>
															
														</div>
														<div class="form-group text-center">
															<button type="submit" name="sub_contact" id="contact-btn" class="btn gt-btn-green inIndexRegBtn">
																Submit															</button>
														</div>
																										   </form>
											  </div>
										  </div>
									  	</div>
                 			 		</div>
								</div>
							</div>
                		</div>
        			</div>
    			</div>
                
<?php $__env->stopSection(); ?>

 

          
<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views/help.blade.php ENDPATH**/ ?>