<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script src="../../resources/lib/jquery-3.7.1.js"></script>
</head>

<body class="bg-custom-enroll-bg bg-cover">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-8 md:px-20 bg-primary-main rounded-lg bg-opacity-90 shadow-xl w-4/4 md:w-3/4  relative overflow-hidden">
            <!-- Logo and Form Name -->
            <div class="flex flex-col md:flex-row justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6 block">Thank You</h2>
            </div>

            <!-- Received Information Announced -->
            <div id="step2" class="form-step text-center">
                <h2 class="text-white text-base md:text-xl mb-2 md:mb-6">Your Request is Under Review</h2>
                <div class="p-6 bg-white rounded-lg shadow-md text-gray-800 text-sm md:text-base">
                    <h3 class="text-base md:text-lg font-bold mb-4">Thank You for Your Submission!</h3>
                    <p class="mb-4">We have received your request and it is currently being reviewed by our team. We aim to provide a response within <span class="font-semibold">24 hours</span>.</p>
                    <p class="mb-4">Once your request is approved, you will receive an email confirmation. If any information is found to be incorrect, we will contact you for further details. If you believe there has been a mistake, please reach out to us.</p>
                    <p class="mb-4">In the meantime, if you have any questions or need assistance, feel free to get in touch with us.</p>
                    <!-- Redirect Back to User Dashboard Page -->
                    <div class="flex justify-center mt-6">
                        <a href="../index.php" class="py-2 px-4 bg-primary-main text-white font-bold rounded-md hover:bg-opacity-90 duration-75">Finish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>