<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
                    <input type="email" id="email" placeholder="Email" class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Password -->
                <div>
                    <input type="password" id="password" placeholder="Password" class="w-full px-4 py-2 border rounded-md md:bg-white bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 py-2 px-4 bg-primary-main md:bg-white text-white md:text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Login</button>
                </div>
            </form>

            <!-- Redirect Forgot Password Page -->
            <p class="text-center text-sm mt-6">
                <a href="forgotPassword.php" class="text-dark-gray md:text-white">Forgot Password?</a>
            </p>

            <!-- Redirect Sign Up Page -->
            <p class="text-center text-sm text-dark-gray md:text-gray-300 mt-4">If you don't have an account, please
                <a href="#" id="signUpLink" class="text-dark-gray md:text-white hover:underline">sign up</a>.
            </p>

            <!-- Pop-up Box -->
            <div id="signup-popup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50 hidden">
                <div class="bg-white py-8 px-20 rounded-lg shadow-lg max-w-md mx-4 md:mx-8 relative">
                    <button id="close-popup" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
                        <ion-icon class="text-2xl" name="close-outline"></ion-icon>
                    </button>
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Sign Up</h2>
                        <p class="text-gray-600 text-sm">Choose your sign-up option:</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <!-- User Sign Up -->
                        <a href="signUp.php" class="block text-center bg-primary-main text-white font-semibold py-2 px-6 rounded-lg shadow-lg hover:bg-blue-600 transition-colors">
                            <span class="block">Sign Up as User</span>
                        </a>
                        <p class="text-gray-600 text-center text-sm">OR</p>
                        <!-- Institute Sign Up -->
                        <a href="instituteSignUp.php" class="block text-center bg-green-500 text-white font-semibold py-2 px-6 rounded-lg shadow-lg hover:bg-green-600 transition-colors">
                            <span class="block">Sign Up as Institute</span>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="../../resources/lib/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            // Show the popup when the sign up link is clicked
            $('#signUpLink').click(function(e) {
                e.preventDefault();
                $('#signup-popup').removeClass('hidden');
            });

            // Close the popup when the close button is clicked
            $('#close-popup').click(function() {
                $('#signup-popup').addClass('hidden');
            });

            // Close the popup if clicking outside of the popup content
            $(window).click(function(e) {
                if ($(e.target).is('#signup-popup')) {
                    $('#signup-popup').addClass('hidden');
                }
            });
        });
    </script>

</body>

</html>