<?php
session_start();
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script src="../../resources/lib/jquery-3.7.1.js"></script>
</head>

<body class="bg-custom-bg bg-cover bg-center min-h-screen">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-8 bg-primary-main bg-opacity-90 rounded-lg shadow-xl">
            <img src="../../../../storages/logo-white.svg" class="mx-auto mb-5" alt="logo">

            <!-- New Password Form For Back-End -->
            <form id="updatePsForm" action="../../../Controller/LoginController.php" method="POST" class="space-y-4 md:space-y-7">
                <!-- New Password -->
                <div>
                    <input type="password" id="password" placeholder="New Password" name="password"
                        class="w-full px-6 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Confirm Password -->
                <div>
                    <input type="password" id="confirm-password" placeholder="Confirm Password"
                        class="w-full px-6 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <div class="relative">
                    <p id="psMessage" class="absolute text-xs bottom-3"></p>
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="button" id="newPs-button"
                        class="w-1/2 py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
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
    </script>
</body>

</html>