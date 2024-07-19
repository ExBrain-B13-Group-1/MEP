<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script src="../../resources/lib/jquery-3.7.1.js"></script>
    <style>
        .hpp-checkbox,
        .hpp-radio {
            width: 20px;
            height: 20px;
        }
    </style>
</head>

<body class="bg-custom-enroll-bg">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-20 bg-primary-main rounded-lg bg-opacity-90 shadow-xl w-3/4 relative overflow-hidden">
            <!-- Logo and Form Name -->
            <div class="flex justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6">Verification Form</h2>
            </div>

            <div>
                <!-- Verification Form Back-End -->
                <form action="" id="verifyForm" class="form-step active space-y-6">
                    <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                        <!-- User Full Name -->
                        <div>
                            <label for="user-name" class="text-dark-gray text-sm">Full Name *</label>
                            <input type="text" id="user-name" value="John Smith (Acc Name)" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- User Email -->
                        <div>
                            <label for="user-email" class="text-dark-gray text-sm">Email Address *</label>
                            <input type="email" id="user-email" value="johnsmith@gmail.com" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Age -->
                        <div>
                            <label for="age" class="text-dark-gray text-sm">Age *</label>
                            <input type="number" id="age" min="5" max="90" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="text-dark-gray text-sm">Gender</label>
                            <div id="gender" class="flex items-center space-x-4 text-white mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="male" class="form-radio hpp-radio" checked>
                                    <span class="ml-2">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="female" class="form-radio hpp-radio">
                                    <span class="ml-2">Female</span>
                                </label>
                            </div>
                        </div>
                        <!-- NRC Verification Upload -->
                        <div>
                            <label class="text-white text-sm">NRC Verification * </label>
                            <p class="text-red-500 text-sm">Please Also Upload Your NRC Information</p>
                            <div class="flex justify-between">
                                <!-- Front Side Upload -->
                                <div>
                                    <label class="block text-white mb-2">Front Side</label>
                                    <input type="file" class="hidden" id="upload-front" required>
                                    <label for="upload-front" class="cursor-pointer inline-block px-6 py-2 bg-white text-primary-main font-bold rounded-md border border-gray-800 hover:bg-opacity-90 transition duration-75">Upload
                                        Here</label>
                                    <!-- Image Preview -->
                                    <div class="mt-6" id="preview-front">
                                        <img id="preview-image-front" src="#" alt="Front-side Preview" class="hidden rounded-md w-32 h-32">
                                        <div id="file-name-front" class="mt-2 text-sm text-white"></div>
                                    </div>
                                </div>
                                <!-- Back Side Upload -->
                                <div>
                                    <label class="block text-white mb-2">Back Side</label>
                                    <input type="file" class="hidden" id="upload-back" required>
                                    <label for="upload-back" class="cursor-pointer inline-block px-6 py-2 bg-white text-primary-main font-bold rounded-md border border-gray-800 hover:bg-opacity-90 transition duration-75">Upload
                                        Here</label>
                                    <!-- Image Preview -->
                                    <div class="mt-6" id="preview-back">
                                        <img id="preview-image-back" src="#" alt="Back-side Preview" class="hidden rounded-md w-32 h-32">
                                        <div id="file-name-back" class="mt-2 text-sm text-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Agree Terms & Conditions -->
                    <div class="mb-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="agree-terms" class="form-checkbox hpp-checkbox">
                            <span class="ml-2 text-white text-sm">Agree Terms & Conditions</span>
                        </label>
                    </div>
                    <!-- 2 Buttons (Back, Enroll) -->
                    <div class="flex justify-between">
                        <button type="button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75"><a href="#">Back</a></button>
                        <button type="submit" id="submit-button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md opacity-50 cursor-not-allowed duration-75" disabled>Verify</button>
                    </div>
                </form>
            </div>

            <!-- Received Information Announced -->
            <div id="step2" class="form-step hidden text-center">
                <h2 class="text-white text-xl mb-6">Verification Received</h2>
                <div class="p-6 bg-white rounded-lg shadow-md text-gray-800">
                    <h3 class="text-lg font-bold mb-4">Thank you for your Verification!</h3>
                    <p class="mb-4">We have successfully received your <b>personal</b> information. Our team is
                        currently
                        reviewing your submission, and you should expect a response within <span class="font-semibold">24 hours</span>.</p>
                    <p class="mb-4">Once your information is approved, you will receive an email notification with a
                        <b>verified mark</b> on your account. If any information is incorrect, you will be asked to fill
                        in the
                        correct information again. If you believe we made an error, please do not hesitate to contact
                        us.
                    </p>
                    <p class="mb-4">If you have any questions in the meantime, please do not hesitate to contact us.</p>
                    <!-- Redirect Back to User Dashboard Page -->
                    <div class="flex justify-center mt-6">
                        <a href="../dashboard.php" class="py-2 px-4 bg-primary-main text-white font-bold rounded-md hover:bg-opacity-90 duration-75">Finish</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../js/formStep.js"></script>

</body>

</html>