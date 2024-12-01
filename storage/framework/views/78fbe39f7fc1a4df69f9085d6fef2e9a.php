<div class="gt-panel gt-panel-default" style="display: none" id="updateAboutMeSection">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-star"></i>About Me</span>
        <a class="pull-right btn gt-btn-orange" id="updateAboutMeBtn">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="margin-right-10">Update</font>
        </a>
    </div>
    <div class="gt-panel-body">
        <div class="row">
            <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <article>
                    <p class="gt-word-wrap">
                    <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pt-10 pb-10 gt-view-detail"
                        bis_skin_checked="1">
                        <label>
                            <span class="text-danger mr-5 gtRegMandatory">*</span>About Me :
                        </label>

                        <form id="aboutMeForm"  method="POST">
                            <?php echo csrf_field(); ?> <!-- Include CSRF token -->
                            <?php echo method_field('PATCH'); ?>
                            <textarea type="text" class="gt-form-control" rows="5" id="about_me" name="about_me" required><?php echo e($user->carrierDetails->about_me); ?></textarea>
                        </form>
                    </div>
                    </p>
                </article>
            </div>
            <div class="col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16 col-xs-16 pb-10 pt-10 gt-view-detail">
                <h5 class="text-center inViewApproveStripe">
                    Approval Status:&nbsp;Pending
                </h5>
            </div>
        </div>
    </div>
</div>
<script>
   document.addEventListener("DOMContentLoaded", function() {
    const editAboutMe = document.getElementById("editAboutMe");
    const editAboutMeSection = document.getElementById("editAboutMeSection");
    const updateAboutMeSection = document.getElementById("updateAboutMeSection");
    const updateAboutMeBtn = document.getElementById("updateAboutMeBtn");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const aboutMeDetailsAlert = document.getElementById('aboutMeDetailsAlert');

    if (editAboutMe) {
        editAboutMe.addEventListener("click", function() {
            editAboutMeSection.style.display = "none";
            updateAboutMeSection.style.display = "block";
        });
    }

    if (updateAboutMeBtn) {
        updateAboutMeBtn.addEventListener("click", function() {
            const aboutMe = document.getElementById('about_me')?.value;
            if (!aboutMe) {
                alert('Please fill in the "About Me" field.');
                return;
            }

            updateAboutMeBtn.disabled = true;

            $.ajax({
                url: "<?php echo e(route('about.me.update')); ?>",
                method: "PATCH",
                data: {
                    _token: csrfToken,
                    about_me: aboutMe,
                },
                success: function(response) {
                    if (response.success) {
                        updateAboutMeSection.style.display = "none";
                        editAboutMeSection.style.display = "block";
                        $('#userAboutMe').text(response.user.about_me);
                        
                        // Success Alert
                        aboutMeDetailsAlert.innerHTML = `
                            <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${response.message}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                        aboutMeDetailsAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });

                        setTimeout(function() {
                            $('.alert').fadeOut('slow', function() {
                                $(this).remove();
                            });
                        }, 5000);
                    } else {
                        alert('Failed to update details. Please try again.');
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errorMessage = xhr.responseJSON.errors.about_me[0];

                        // Error Alert
                        aboutMeDetailsAlert.innerHTML = `
                            <div class="alert alert-danger col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${errorMessage}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                        aboutMeDetailsAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        console.error(xhr.responseJSON.message || 'An unexpected error occurred');
                        alert('An unexpected error occurred. Please try again later.');
                    }
                },
                complete: function() {
                    updateAboutMeBtn.disabled = false;
                }
            });
        });
    }
});

</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\update-about-me-component.blade.php ENDPATH**/ ?>