const employee = document.getElementById("employee");
const occupation = document.getElementById("hiddenOccupation");
employee.addEventListener("change", function() {
    const employeeId = employee.value;
    console.log(employeeId);
    if (employeeId) {
        occupation.style.display = 'block';
        $.ajax({
            url: '/get-occupation/' + employeeId,
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $("#occupation").empty();
                $("#occupation").append('<option value="">Select </option>');
                $.each(data, function(key, value) {
                    $('#occupation').append('<option value="' + value.id + '">' + value
                        .occupation + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error Status:', status);
                console.error('Error Details:', xhr.responseText);
                alert(
                    'An error occurred while fetching the caste data. Please try again later.'
                );
            }
        });
    } else {

        $('#occupation').fadeOut();
        $('#occupation').empty();
        $('#occupation').append('<option value="">Select occupation</option>');
    }
});