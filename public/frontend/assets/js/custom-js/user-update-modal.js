const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
$(document).ready(function() {
    const id = window.userId;  
    
    $('#updateForm').on('submit', function(e) {
        e.preventDefault();
        $('#updateButton').prop('disabled', true);
        // Perform form validation (add more validations if necessary)
        const id = $('#userId').val();
        const name = $('#name').val();
        const email = $('#email').val();
        const mobile = $('#mobile').val();
        const gender = $('#gender').val();

        if (!name || !email || !mobile || !gender) {
            alert('All fields are required.');
            $('#updateButton').prop('disabled', false);
            return;
        }
        $.ajax({
            url: "userUpdate/" + id,
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                
                _token: "{{ csrf_token() }}",
                name: name,
                email: email,
                mobile: mobile,
                gender: gender
            },
            
            success: function(response) {
                console.log(response);

                $('#alert-container').html(`
                
<div class="alert alert-success col-xxl-13 col-xl-12 col-lg-16 col-md-16 col-sm-16 role="alert">
${response.success
}<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
</div>
`);
                setTimeout(function() {
                    $('#abc').modal('hide');
                }, );
                $('#updateButton').prop('disabled', false);

                $('#userName').text(response.user.name);
                $('#userEmail').text(response.user.email);
                $('#userMobile').text(response.user.mobile);
                $('#userGender').text(response.user.gender);


            },
            error: function(error) {
                console.log(error);
                alert('Error updating data');
            }
        });
    });
});