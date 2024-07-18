<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../resources/css/output.css" rel="stylesheet">
</head>

<body class="bg-custom-bg bg-cover bg-center min-h-screen">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-8 bg-primary-main bg-opacity-90 rounded-lg shadow-xl">
            <img src="../../../storages/logo-white.svg" class="mx-auto mb-5" alt="logo">

            <!-- Forgot Password Form For Back-End -->
            <form action="otp.php" class="space-y-4 md:space-y-7">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-dark-gray text-sm">Find your account</label>
                    <input type="email" id="email" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-1/2 py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Search</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>