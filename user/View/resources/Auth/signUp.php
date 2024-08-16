<?php
ini_set('display_errors', '1');
include '../../../Controller/UserController.php';

$isVerified = isset($_COOKIE['verified']);
if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION['error_message']);
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script src="../../resources/lib/jquery-3.7.1.js"></script>
</head>

<body class="bg-blue-light-bg flex items-center justify-center min-h-screen">
    <div class="bg-white grid grid-cols-1 lg:grid-cols-2 rounded-lg shadow-lg overflow-hidden max-w-4xl mx-4">
        <div class="lg:hidden flex flex-col items-center justify-center p-5 bg-white">
            <h2 class="text-4xl font-bold text-primary-main mb-10 text-center">Sign Up</h2>
            <img src="../../../storages/signUp.png" alt="Sign Up Illustration" class="w-72 h-auto">
        </div>
        <div class="py-8 px-8 md:px-20 bg-white md:bg-primary-main">
            <h2 class="hidden lg:block text-4xl font-bold text-white mb-8 text-center">Sign Up</h2>

            <!-- Sign Up Form -->
            <form id="signup-form" action="../../../Controller/UserController.php" method="POST" class="space-y-4 md:space-y-7">
                <!-- Username -->
                <div>
                    <input type="text" id="username" name="name" placeholder="Username" class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                </div>
                <!-- Email -->
                <div>
                    <input type="email" id="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                </div>
                <div class="relative">
                    <p id="emailMessage" class="absolute text-xs bottom-3"></p>
                </div>
                <!-- Password -->
                <div class="password-container relative">
                    <input type="password" id="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                    <span class="eye-icon absolute bottom-[0.6rem] right-2 text-primaryColor text-sm" id="toggle-password">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <!-- Confirm Password -->
                <div class="password-container relative">
                    <input type="password" id="confirm-password" placeholder="Confirm Password" class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                    <span class="eye-icon absolute bottom-[0.6rem] right-2 text-primaryColor text-sm" id="toggle-confirm-password">
                        <i class="fas fa-eye text-primary-main"></i>
                    </span>
                </div>
                <div class="relative">
                    <p id="psMessage" class="absolute text-xs bottom-3"></p>
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="button" id="submit-button" class="w-1/2 py-2 px-4 bg-primary-main md:bg-white text-white md:text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Sign
                        Up</button>
                </div>
            </form>
            <!-- Redirect Login Page -->
            <p class="text-center text-sm text-dark-gray md:text-gray-300 mt-4">If you already have an account, please
                <a href="login.php" class="text-dark-gray md:text-white hover:underline">log in</a>.
            </p>
        </div>
        <div class="hidden lg:flex items-center justify-center p-8">
            <img src="../../../storages/signUp.png" alt="Sign Up Illustration" class="w-full h-auto">
        </div>
    </div>

    <script src="../js/auth.js"></script>

</body>

</html>