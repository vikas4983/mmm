<div class="gt-panel gt-panel-default" style="display: none" id="updateAboutMeSection">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-star"></i>About Me</span>
        <a class="pull-right btn gt-btn-orange" id="updateAboutMe">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="margin-right-10">Update</font>
        </a>
     </div>
    <div class="gt-panel-body">
        <div class="row">
            <div
                class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <article>
                    <p class="gt-word-wrap">
                    <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pt-10 pb-10 gt-view-detail"
                        bis_skin_checked="1">
                        <label>
                            <span class="text-danger mr-5 gtRegMandatory">*</span>About Me :
                        </label>

                        <form id="aboutMeForm" action="<?php echo e(route('about.me.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?> <!-- Include CSRF token -->
                            <?php echo method_field('PATCH'); ?>
                            <textarea type="text" class="gt-form-control" rows="5" id="about_me" name="about_me" required><?php echo e($user->carrierDetails->about_me); ?></textarea>
                        </form>
                    </div>
                    </p>
                </article>
            </div>
            <div
                class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <h5 class="text-center inViewApproveStripe">
                    Approval Status:&nbsp;Pending
                </h5>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editAboutMe = document.getElementById("editAboutMe");
        let editAboutMeSection = document.getElementById("editAboutMeSection");
        let updateAboutMeSection = document.getElementById("updateAboutMeSection");
        let updateAboutMe = document.getElementById("updateAboutMe");
        let userAboutMe = document.getElementById("userAboutMe");
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        editAboutMe.addEventListener("click", function() {
            editAboutMeSection.style.display = "none";
            updateAboutMeSection.style.display = "block";
          
            console.log("Switched to the update section");
        });

        updateAboutMe.addEventListener("click", function(event) {
            event.preventDefault();
            let form = document.getElementById("aboutMeForm");
            form.submit();


            // Create FormData from the form
            // let formData = new FormData(form);
            // console.log([formData.entries()]);
            // console.log(csrfToken);

            // // Debugging the formData (optional)
            // for (let [key, value] of formData.entries()) {
            //     console.log(key, value);
            // }

            // let url = "<?php echo e(route('about.me.update')); ?>"; // Server endpoint (make sure it's correct)

            // fetch(url, {
            //         method: 'PATCH', // Ensure the correct HTTP method is used
            //         body: formData, // Pass the FormData directly
            //         headers: {
            //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
            //                 .getAttribute('content'),
            //         }
            //     })
            //     .then(response => {
            //         if (!response.ok) {
            //             throw new Error("Network response was not ok");
            //         }
            //         return response.json();
            //     })
            //     .then(data => {
            //         console.log(data);

            //         // Check if the user data returned and update the UI
            //         if (data && data.user) {
            //             userAboutMe.innerText = data.user
            //             .about_me; // Adjust based on your response structure
            //         }

            //         // Switch back to the view section
            //         updateAboutMeSection.style.display = "none";
            //         editAboutMeSection.style.display = "block";
            //     })
            //     .catch((error) => {
            //         console.error('Error:', error);

            //         // Handle the error and keep the update section visible
            //         updateAboutMeSection.style.display = "block";
            //     });
        });
    });
</script><?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/update-about-me-component.blade.php ENDPATH**/ ?>