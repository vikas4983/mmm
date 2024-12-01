
<div class="gt-panel gt-panel-default" id="updateAboutFamilySection" style="display: none">
    <div class="gt-panel-head">
        <span class="pull-left"><i class="fa fa-star"></i>Update Family</span>
        <a class="pull-right btn gt-btn-orange" id="updateAboutFamilyBtn">
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
                            About Family :
                        </label>
                        <form id="aboutFamilyForm" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <textarea type="text" class="gt-form-control" rows="5" id="about_family" name="about_family" required><?php echo e($user->familyDetails->about_family); ?></textarea>
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
        const editAboutFamilyBtn = document.getElementById("editAboutFamilyBtn");
        const editAboutFamilySection = document.getElementById("editAboutFamilySection");
        const updateAboutFamilySection = document.getElementById("updateAboutFamilySection");
        const updateAboutFamilyBtn = document.getElementById("updateAboutFamilyBtn");
        const userFamilyDetails = document.getElementById("userAboutFamily");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const aboutFamilyDetailsAlert = document.getElementById('aboutFamilyDetailsAlert');

        if (editAboutFamilyBtn) {
            editAboutFamilyBtn.addEventListener("click", function() {
                editAboutFamilySection.style.display = "none";
                updateAboutFamilySection.style.display = "block";

            });
        }

        if (updateAboutFamilyBtn) {
            updateAboutFamilyBtn.addEventListener("click", function() {
                const FamilyDetails = document.getElementById('about_family')?.value;

                if (!FamilyDetails) {
                    alert("Please fill in the education details.");
                    return;
                }

                updateAboutFamilyBtn.disabled = true;

                $.ajax({
                    url: "<?php echo e(route('Family.details')); ?>",
                    method: "PATCH",
                    data: {
                        _token: csrfToken,
                        about_family: FamilyDetails,
                    },
                    success: function(response) {
                        if (response.success) {
                            updateAboutFamilySection.style.display = "none";
                            editAboutFamilySection.style.display = "block";
                            userFamilyDetails.textContent = response.user
                                .about_family;
                                aboutFamilyDetailsAlert.innerHTML = `
                            <div class="alert alert-success col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${response.message}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                        aboutFamilyDetailsAlert.scrollIntoView({
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
                            
                            const errorMessage = xhr.responseJSON.errors.about_family[
                            0];

                           
                            aboutFamilyDetailsAlert.innerHTML = `
                            <div class="alert alert-danger col-xxl-16 col-xl-16 col-lg-16 col-md-16 col-sm-16" role="alert">
                                ${errorMessage}
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
                            </div>
                        `;
                        aboutFamilyDetailsAlert.scrollIntoView({
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
                        updateAboutFamilyBtn.disabled = false;
                    }
                });
            });
        }
    });
</script>
<?php /**PATH C:\xampp\htdocs\mmm\resources\views\components\update-family-details-component.blade.php ENDPATH**/ ?>