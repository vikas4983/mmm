<div id="aboutEducationDetailsAlert"></div>
<div class="gt-panel gt-panel-default" id="updateAboutEducationSection" style="display: none">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-star"></i>Update Education</span>
        <a class="pull-right btn gt-btn-orange" id="updateAboutEducationBtn">
            <i class="fas fa-pencil-alt fa-fw"></i>
            <font class="gt-margin-left-5">Update</font>
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
                            About Education :
                        </label>
                        <form id="aboutEducationForm" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <textarea type="text" class="gt-form-control" rows="5" id="education_detail" name="education_detail" required><?php echo e($user->carrierDetails->education_detail); ?></textarea>
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
<!-- JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editAboutEducationBtn = document.getElementById("editAboutEducationBtn");
        const editAboutEducationSection = document.getElementById("editAboutEducationSection");
        const updateAboutEducationSection = document.getElementById("updateAboutEducationSection");
        const updateAboutEducationBtn = document.getElementById("updateAboutEducationBtn");
        const userEducationDetails = document.getElementById("userEducationDetails");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const aboutEducationDetailsAlert = document.getElementById('aboutEducationDetailsAlert');

        if (editAboutEducationBtn) {
            editAboutEducationBtn.addEventListener("click", function() {
                editAboutEducationSection.style.display = "none";
                updateAboutEducationSection.style.display = "block";

            });
        }

        if (updateAboutEducationBtn) {
            updateAboutEducationBtn.addEventListener("click", function() {
                const educationDetails = document.getElementById('education_detail')?.value;

                if (!educationDetails) {
                    alert("Please fill in the education details.");
                    return;
                }

                updateAboutEducationBtn.disabled = true;

                $.ajax({
                    url: "<?php echo e(route('education.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: csrfToken,
                        education_detail: educationDetails,
                    },
                    success: function(response) {
                        if (response.success) {
                            updateAboutEducationSection.style.display = "none";
                            editAboutEducationSection.style.display = "block";
                            userEducationDetails.textContent = response.user
                                .education_detail;
                            aboutEducationDetailsAlert.innerHTML = `
                            <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${response.message}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                            aboutEducationDetailsAlert.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

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
                            
                            const errorMessage = xhr.responseJSON.errors.education_detail[
                            0];

                           
                            aboutEducationDetailsAlert.innerHTML = `
                            <div class="alert alert-danger col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${errorMessage}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                            aboutEducationDetailsAlert.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        } else {
                            console.error(xhr.responseJSON.message ||
                                'An unexpected error occurred');
                            alert('An unexpected error occurred. Please try again later.');
                        }
                    },
                    complete: function() {
                        updateAboutEducationBtn.disabled = false;
                    }
                });
            });
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\update-education-details-component.blade.php ENDPATH**/ ?>