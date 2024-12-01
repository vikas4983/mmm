<div id="aboutEducationDetailsAlert"></div>
<div class="gt-panel gt-panel-default" id="updateAboutOccupationSection" style="display: none">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-star"></i>Update Education</span>
        <a class="pull-right btn gt-btn-orange" id="updateAboutOccupationBtn">
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
                            About Occupation :
                        </label>
                        <form id="aboutOccupationForm" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <textarea type="text" class="gt-form-control" rows="5" id="occupation_detail" name="occupation_detail" required><?php echo e($user->carrierDetails->education_detail); ?></textarea>
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
        const editAboutOccupationBtn = document.getElementById("editAboutOccupationBtn");
        const editAboutOccupationSection = document.getElementById("editAboutOccupationSection");
        const updateAboutOccupationSection = document.getElementById("updateAboutOccupationSection");
        const updateAboutOccupationBtn = document.getElementById("updateAboutOccupationBtn");
        const userOccupationDetails = document.getElementById("userAboutOccupation");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const aboutOccupationDetailsAlert = document.getElementById('aboutOccupationDetailsAlert');

        if (editAboutOccupationBtn) {
            editAboutOccupationBtn.addEventListener("click", function() {
                editAboutOccupationSection.style.display = "none";
                updateAboutOccupationSection.style.display = "block";

            });
        }

        if (updateAboutOccupationBtn) {
            updateAboutOccupationBtn.addEventListener("click", function() {
                const OccupationDetails = document.getElementById('occupation_detail')?.value;

                if (!OccupationDetails) {
                    alert("Please fill in the education details.");
                    return;
                }

                updateAboutOccupationBtn.disabled = true;

                $.ajax({
                    url: "<?php echo e(route('occupation.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: csrfToken,
                        occupation_detail: OccupationDetails,
                    },
                    success: function(response) {
                        if (response.success) {
                            updateAboutOccupationSection.style.display = "none";
                            editAboutOccupationSection.style.display = "block";
                            userOccupationDetails.textContent = response.user
                                .occupation_detail;
                                aboutOccupationDetailsAlert.innerHTML = `
                            <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${response.message}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                        aboutOccupationDetailsAlert.scrollIntoView({
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
                            
                            const errorMessage = xhr.responseJSON.errors.occupation_detail[
                            0];

                           
                            aboutOccupationDetailsAlert.innerHTML = `
                            <div class="alert alert-danger col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${errorMessage}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                        aboutOccupationDetailsAlert.scrollIntoView({
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
                        updateAboutOccupationBtn.disabled = false;
                    }
                });
            });
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views/components/update-occupation-details-component.blade.php ENDPATH**/ ?>