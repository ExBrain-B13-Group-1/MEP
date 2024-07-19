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
        <div class="py-8 px-8 bg-[#4460EF] bg-opacity-90 rounded-lg shadow-xl">
            <img src="../../../../storages/logo-white.svg" class="mx-auto mb-5" alt="logo">

            <!-- Login Form For Back-End -->
            <form action="../Dashboard/dashoverview.php" class="space-y-4 md:space-y-7">
                <!-- Email -->
                <div>
                    <input type="email" id="email" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Password -->
                <div>
                    <input type="password" id="password" placeholder="Password"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-1/2 py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Login</button>
                </div>
            </form>

            <!-- Redirect Forgot Password Page -->
            <p class="text-center text-sm mt-6">
                <a href="forgotPassword.php" class="text-white">Forgot Password?</a>
            </p>

            <!-- Redirect Sign Up Page -->
            <p class="text-center text-sm text-gray-300 mt-4">If you don't have an account, please
                <a href="signUp.php" class="text-white hover:underline">sign up</a>.</p>
        </div>
    </div>
</body>

</html>