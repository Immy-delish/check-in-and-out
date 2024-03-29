// validate_username.js

// Function to validate the username asynchronously
function validateUsername(username) {
    // Make an AJAX request to a PHP file that checks if the username exists
    // Replace 'validate_username.php' with the actual PHP file that handles username validation
    $.ajax({
        url: 'validate_username.php',
        method: 'POST',
        data: { username: username },
        success: function(response) {
            if (response === 'valid') {
                // Username is valid, display a green tick and enable the password field
                $('#username-validation').html('<i class="fas fa-check-circle"></i>');
                $('#password').prop('disabled', false);
                $('#submit-btn').prop('disabled', false);
            } else {
                // Username is not valid, display an error message and disable the password field and submit button
                $('#username-validation').html('User not found');
                $('#password').prop('disabled', true);
                $('#submit-btn').prop('disabled', true);
            }
        }
    });
}

// Event listener for the username input field
$(document).ready(function() {
    $('#username').on('input', function() {
        var username = $(this).val();
        validateUsername(username);
    });
});
