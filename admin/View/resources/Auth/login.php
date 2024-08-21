<?php
session_start();

// Check for "Remember Me" cookie at the start of your session
if (isset($_COOKIE['admin-email'])) {
    // Redirect to the dashboard (or home page)
    header("Location: http://localhost/MEP/admin/View/resources/adminDashboard.php");
    exit();
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
</head>

<body class="bg-custom-bg bg-cover bg-center min-h-screen">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-8 bg-primary-main bg-opacity-90 rounded-lg shadow-xl">
            <img src="../../../../storages/logo-white.svg" class="mx-auto mb-5" alt="logo">

            <!-- Login Form For Back-End -->
            <form action="../../../Controller/LoginController.php" method="POST" class="space-y-4 md:space-y-7">
                <!-- Email -->
                <div>
                    <input type="email" id="email" placeholder="Email" name="email"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required value="<?php echo isset($_SESSION['email']) ? ($_SESSION['email']) : ''; ?>">
                    <?php if (isset($_SESSION['email_error'])) : ?>
                        <p class="text-[#ff3e3e] text-xs mt-1 absolute"><?php echo $_SESSION['email_error'];
                                                                        unset($_SESSION['email_error']); ?></p>
                    <?php endif; ?>
                </div>
                <!-- Password -->
                <div>
                    <input type="password" id="password" placeholder="Password" name="password"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                    <?php if (isset($_SESSION['ps_error'])) : ?>
                        <p class="text-[#ff3e3e] text-xs mt-1 absolute"><?php echo $_SESSION['ps_error'];
                                                                        unset($_SESSION['ps_error']); ?></p>
                    <?php endif; ?>
                </div>
                <div class="flex items-center md:mt-0">
                    <input type="checkbox" id="remember-me" name="remember_me" class="mr-1 w-4 h-4">
                    <label for="remember-me" class="text-sm text-dark-gray">Remember Me</label>
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit" name="login"
                        class="w-1/2 py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Login</button>
                </div>
            </form>

            <!-- Redirect Forgot Password Page -->
            <p class="text-center text-sm mt-6">
                <a href="forgotPassword.php" class="text-white">Forgot Password?</a>
            </p>
        </div>
    </div>
</body>

</html>