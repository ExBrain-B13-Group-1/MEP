<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill OTP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
</head>

<body class="bg-custom-bg bg-cover bg-center min-h-screen">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-8 bg-[#4460EF] bg-opacity-90 rounded-lg shadow-xl">
            <img src="../../../../storages/logo-white.svg" class="mx-auto mb-5" alt="logo">

            <!-- OTP Form For Back-End -->
            <form action="newPassword.php" class="space-y-4 md:space-y-7">
                <!-- Email -->
                <div>
                    <label for="otp" class="block text-[#BDBDBD] text-sm">Fill OTP in your email</label>
                    <input type="text" id="otp" placeholder="OTP"
                        class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-1/2 py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75 focus:outline-none focus:ring-2 focus:ring-blue-600">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>