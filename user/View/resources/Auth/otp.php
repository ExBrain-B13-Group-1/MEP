<?php
    session_start();
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill OTP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
</head>

<body class="bg-blue-light-bg flex items-center justify-center min-h-screen">
    <div class="bg-white grid grid-cols-1 lg:grid-cols-2 rounded-lg shadow-lg overflow-hidden max-w-4xl mx-4">
        <div class="lg:hidden flex flex-col items-center justify-center p-5 bg-white">
            <h2 class="text-2xl font-bold text-primary-main mb-10 text-center">Forgot Password</h2>
            <img src="../../../storages/logIn.png" alt="Login Illustration" class="w-72 h-auto">
        </div>

        <div class="hidden lg:flex items-center justify-center p-8">
            <img src="../../../storages/logIn.png" alt="Login Illustration" class="w-full h-auto">
        </div>

        <div class="py-8 px-8 md:px-20 bg-white md:bg-primary-main">
            <h2 class="hidden lg:block text-2xl font-bold text-white mb-8 text-center">Forgot Password</h2>

            <!-- OTP Form For Back-End -->
            <form action="../../../Controller/LoginController.php" method="POST" class="space-y-4 md:space-y-7">
                <!-- Fill OTP -->
                <div class="mt-0 lg:mt-20">
                    <label for="otp" class="block text-dark-gray text-sm">Fill OTP in your email</label>
                    <input type="text" id="otp" name="otp" placeholder="OTP"
                        class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                        <?php if (isset($_SESSION['otp_error'])) : ?>
                        <p class="text-[#ff3e3e] text-xs mt-1 absolute"><?php echo $_SESSION['otp_error'];
                                                                        unset($_SESSION['otp_error']); ?></p>
                    <?php endif; ?>
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit" name="sendOtp"
                        class="w-1/2 py-2 px-4 bg-primary-main md:bg-white text-white md:text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>