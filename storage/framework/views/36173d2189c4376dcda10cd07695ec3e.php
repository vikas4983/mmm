<?php $__env->startSection('title', 'Saved Search - Mangal Mandap'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
						<div class="row">
							<div class="col-xs-16 col-lg-16 col-xxl-16 col-xl-16 text-center mb-10">
								<h2 class="inPageTitle fontMerriWeather inThemeOrange">Saved Searches</h2>
								<p class="inPageSubTitle">All saved searches are here, with single button click you can search profile on behalf of your search criteria.</p>
							</div>
							
						</div>
					</div>
    				<div class="container gt-view-profile">
    					<div class="row">
        					<div class="col-xxl-3 col-xl-4 col-xs-16 col-sm-16">
								<!-- left option visible only in small-->
												<a class="btn gt-btn-green btn-block gt-margin-bottom-20 hidden-xxl hidden-xl" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >
 					Options <i class="fa fa-angel-down"></i>
				</a>
                <div class="collapse mobile-collapse" id="collapseExample">
                	<div class="gt-left-opt-msg">
            			<ul>
                			<li>
                            	<a href="sentMessages"><i class="fas fa-paper-plane gt-margin-right-10"></i>Send Message</a>
                            </li>
                            <li>
                            	<a href="my-photo"><i class="fas fa-image gt-margin-right-10"></i>View Photos</a>
                            </li>
                		</ul>
                	</div>
					<div class="gt-left-opt-msg">
						<ul>
							<li>
								<a class="gt-bg-orange text-center gt-text-white">MESSAGES</a>
							</li>
							<li>
								<a href="inboxMessages"><span class="pull-left">Inbox</span><span class="pull-right badge">0</span></a>
							</li>
							<li>
								<a href="sentMessages"><span class="pull-left">Sent</span><span class="pull-right badge">12</span></a>
							</li>
						</ul>
					</div>
					<div class="gt-left-opt-msg">
						<ul>
							<li>
								<a class="gt-bg-orange text-center gt-text-white">INTEREST</a>
							</li>
							<li>
								<a href="exp-interest"><span class="pull-left">Received</span><span class="pull-right badge">1</span></a>
							</li>
							<li>
								<a href="exp-interest"><span class="pull-left">Sent</span><span class="pull-right badge">5</span></a>
							</li>
						</ul>
					</div>
					<div class="gt-left-opt-msg">
						<ul>
							<li>
								<a class="gt-bg-orange text-center gt-text-white">PHOTO REQUEST</a>
							</li>
							<li>
								<a href="photo-request"><span class="pull-left">Received</span><span class="pull-right badge">0</span></a>
							</li>
							<li>
								<a href="photo-request"><span class="pull-left">Sent</span><span class="pull-right badge">0</span></a>
							</li>
						</ul>
					</div>
                </div>                                
<a href="" class="col-xs-16" target="_blank">
    <div class="row" style="max-width:160px !important;">
        <img src="advertise/" class="img-responsive" style="width:100%;max-height:600px !important;">
    </div>
</a>

								<!--  left option visible only in small end-->
            				</div>
        					<div class="col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16">
            					<div class="row">
																		<div class="col-xxl-8 col-xl-8 col-sm-16 col-md-16 col-xs-16 col-lg-8 mb-30" id="remove1">
										<div class="gt-saved-search-bucket">
											<h3 class="gt-margin-top-10">
												<span class="pull-left fontMerriWeather inThemeGreen">abc</span>
												<a class="pull-right gt-cursor inThemeGreen" onClick="del_ss(1);"><i class="fa fa-trash"></i></a>
											</h3>
											<div class="clearfix"></div>
											<h5>
												<i class="fas fa-calendar-alt gt-margin-right-5"></i>13 Mar 2024 ,18:46 PM											</h5>
											<a href="search_result.php?ss_id=1" class="btn gt-btn-orange">Search</a>
										</div>
									</div>
                    				                				</div>
            				</div>
						</div>
    				</div>
				</div>
  			</div>
  			<div class="container gt-margin-top-10">
		</div>
        <!-- Delete Saved Search -->
    	<script>
	  		function del_ss(ss_id){
			$.ajax({
					type: "POST",
					url: "delete_ss_query",
					data: 'ss_id='+ss_id,
					success: function(data){
						$('#remove'+ss_id+'').fadeOut('slow');
					}
				});
			}
    	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts1.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mmm\resources\views\frontend\users\savedsearch.blade.php ENDPATH**/ ?>