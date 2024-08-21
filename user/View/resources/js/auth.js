
$(document).ready(function() {
    // Toggle password visibility
    $('#toggle-password').on('mousedown', function() {
        $('#password').attr('type', 'text');
        $(this).html('<i class="fas fa-eye-slash"></i>');
    }).on('mouseup', function() {
        $('#password').attr('type', 'password');
        $(this).html('<i class="fas fa-eye"></i>');
    }).on('mouseout', function() {
        $('#password').attr('type', 'password');
        $(this).html('<i class="fas fa-eye"></i>');
    });

    $('#toggle-confirm-password').on('mousedown', function() {
        $('#confirm-password').attr('type', 'text');
        $(this).html('<i class="fas fa-eye-slash"></i>');
    }).on('mouseup', function() {
        $('#confirm-password').attr('type', 'password');
        $(this).html('<i class="fas fa-eye"></i>');
    }).on('mouseout', function() {
        $('#confirm-password').attr('type', 'password');
        $(this).html('<i class="fas fa-eye"></i>');
    });


    // Validate and handle form submission
    $('#submit-button').on('click', function(e) {
        e.preventDefault(); 

        let email = $('#email').val();
        let password = $('#password').val();
        let confirmPassword = $('#confirm-password').val();
        let $psMessage = $('#psMessage');
        let $emailMessage = $('#emailMessage');

        // Validate email format
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $emailMessage.text("Invalid email format");
            $emailMessage.css('color', '#ff3e3e');
            return;
        }

        if (password.length === 0) {
            $psMessage.text("Password can't be empty!");
            $psMessage.css('color', '#ff3e3e');
            return;
        }

        if (password !== confirmPassword) {
            $psMessage.text("Passwords don't match");
            $psMessage.css('color', '#ff3e3e');
            return;
        }

        // Append new hidden input
        $("<input>")
            .attr({
                type: "hidden",
                name: "register",
            })
            .appendTo("#signup-form");
            
        $('#signup-form').off('submit').submit();
    });

     // Validate and handle form submission
     $('#newPs-button').on('click', function(e) {
        e.preventDefault(); 

        let password = $('#password').val();
        let confirmPassword = $('#confirm-password').val();
        let $psMessage = $('#psMessage');

        if (password.length === 0) {
            $psMessage.text("Password can't be empty!");
            $psMessage.css('color', '#ff3e3e');
            return;
        }

        if (password !== confirmPassword) {
            $psMessage.text("Passwords don't match");
            $psMessage.css('color', '#ff3e3e'); 
            return;
        }
        // Append new hidden input
        $("<input>")
            .attr({
                type: "hidden",
                name: "updatePassword",
            })
            .appendTo("#updatePsForm");

        $('#updatePsForm').off('submit').submit();
    });
});
