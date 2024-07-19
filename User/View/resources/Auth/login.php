<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
</head>

<body class="bg-blue-light-bg flex items-center justify-center min-h-screen">
    <div class="bg-white grid grid-cols-1 lg:grid-cols-2 rounded-lg shadow-lg overflow-hidden max-w-4xl mx-4">
        <div class="lg:hidden flex flex-col items-center justify-center p-5 bg-white">
            <h2 class="text-4xl font-bold text-primary-main mb-10 text-center">Login</h2>
            <img src="../../../storages/logIn.png" alt="Login Illustration" class="w-72 h-auto">
        </div>

        <div class="hidden lg:flex items-center justify-center p-8">
            <img src="../../../storages/logIn.png" alt="Login Illustration" class="w-full h-auto">
        </div>

        <div class="py-8 px-8 md:px-20 bg-white md:bg-primary-main">
            <h2 class="hidden lg:block text-4xl font-bold text-white mb-8 text-center">Login</h2>

            <!-- Login Form For Back-End -->
            <form action="../dashboard.php" class="space-y-4 md:space-y-7">
                <!-- Email -->
                <div>
                    <input type="email" id="email" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Password -->
                <div>
                    <input type="password" id="password" placeholder="Password"
                        class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-1/2 py-2 px-4 bg-primary-main md:bg-white text-white md:text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Login</button>
                </div>
            </form>

            <!-- Redirect Forgot Password Page -->
             <p class="text-center text-sm mt-6">
                <a href="forgotPassword.php" class="text-dark-gray md:text-white">Forgot Password?</a></p>

            <!-- Redirect Sign Up Page -->
            <p class="text-center text-sm text-dark-gray md:text-gray-300 mt-4">If you don't have an account, please
                <a href="signUp.php" class="text-dark-gray md:text-white hover:underline">sign up</a>.</p>

        </div>
    </div>
</body>

</html>