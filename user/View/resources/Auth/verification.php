<?php
ini_set('display_errors', '1');
include '../../../Controller/UserController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script src="../../resources/lib/jquery-3.7.1.js"></script>
    <style>
        .hpp-checkbox,
        .hpp-radio {
            width: 20px;
            height: 20px;
        }


        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .upload-area {
            position: relative;
            width: 100%;
            height: 200px;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background-color: #f7f7f7;
        }

        #uploaded-image-front,
        #uploaded-image-back {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .upload-text {
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            pointer-events: none;
        }
    </style>
</head>

<body class="bg-custom-enroll-bg">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-20 bg-primary-main rounded-lg bg-opacity-90 shadow-xl w-3/4 relative overflow-hidden">
            <!-- Logo and Form Name -->
            <div class="flex flex-col md:flex-row justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6 block">Verification Form</h2>
            </div>

            <div>
                <!-- Verification Form Back-End -->
                <form action="" id="verifyForm" class="form-step active space-y-6" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-4">
                        <!-- User Full Name -->
                        <div>
                            <label for="user-name" class="text-dark-gray text-sm">Full Name *</label>
                            <input type="text" id="user-name" value="<?= $user[0]['name'] ?>" name="name" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- User Email -->
                        <div>
                            <label for="user-email" class="text-dark-gray text-sm">Email Address *</label>
                            <input type="email" id="user-email" value="<?= $user[0]['email'] ?>" name="email" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Age -->
                        <div>
                            <label for="age" class="text-dark-gray text-sm">Age *</label>
                            <input type="text" id="age" name="age" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- User Contact -->
                        <div>
                            <label for="contact" class="text-dark-gray text-sm">Contact *</label>
                            <input type="text" id="contact" placeholder="+959" name="contact" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Gender -->
                        <div>
                            <label for="gender" class="text-dark-gray text-sm">Gender</label>
                            <div id="gender" class="flex items-center space-x-4 text-white mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Male" class="form-radio hpp-radio">
                                    <span class="ml-2">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Female" class="form-radio hpp-radio">
                                    <span class="ml-2">Female</span>
                                </label>
                            </div>
                        </div>
                        <!-- Empty Div -->
                        <div></div>
                        <!-- NRC Verification Upload (Front) -->
                        <div>
                            <label class="text-white text-sm">NRC Verification * </label>
                            <p class="text-red-500 text-sm">Please Also Upload Your NRC Information</p>
                            <!-- Front Side Upload -->
                            <div class="w-full">
                                <label class="block text-white mb-3">Front Side *</label>
                                <div class="mb-2 md:mb-6">
                                    <div class="upload-area rounded-md" id="upload-area-front">
                                        <input type="file" name="nrc_front" id="file-input-front" accept="image/*" required class="hidden">
                                        <img id="uploaded-image-front" alt="Uploaded Image">
                                        <div id="upload-text-front" class="upload-text text-center">
                                            <ion-icon name="cloud-upload-outline" class="text-2xl text-gray-500"></ion-icon>
                                            <p class="text-gray-400 text-sm">Upload Here (Front) </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- NRC Verification Upload (Back) -->
                        <div class="mt-0 md:mt-10">
                            <!-- Back Side Upload -->
                            <div class="w-full">
                                <label class="block text-white mb-4">Back Side *</label>
                                <div class="mb-2 md:mb-6">
                                    <div class="upload-area rounded-md" id="upload-area-back">
                                        <input type="file" name="nrc_back" id="file-input-back" accept="image/*" required class="hidden">
                                        <img id="uploaded-image-back" alt="Uploaded Image">
                                        <div id="upload-text-back" class="upload-text text-center">
                                            <ion-icon name="cloud-upload-outline" class="text-2xl text-gray-500"></ion-icon>
                                            <p class="text-gray-400 text-sm">Upload Here (Back) </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Agree Terms & Conditions -->
                        <div class="mb-0 md:mb-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" id="agree-terms" class="form-checkbox hpp-checkbox">
                                <span class="ml-2 text-white text-sm">Agree Terms & Conditions</span>
                            </label>
                        </div>
                        <!-- Empty Div -->
                        <div></div>
                        <!-- 2 Buttons (Back, Enroll) -->
                        <div class="col-span-1 md:col-span-2 flex justify-between">
                            <button type="button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75"><a href="../profile.php">Back</a></button>
                            <button type="submit" name="" id="submit-button" class=" py-2 px-4 bg-white text-primary-main font-bold rounded-md opacity-50 cursor-not-allowed duration-75" disabled>Verify</button>
                        </div>
                </form>
            </div>

            <!-- Received Information Announced -->
            <div id="step2" class="form-step hidden text-center">
                <h2 class="text-white text-base md:text-xl mb-2 md:mb-6">Verification Received</h2>
                <div class="p-6 bg-white rounded-lg shadow-md text-gray-800 text-sm md:text-base">
                    <h3 class="text-base md:text-lg font-bold mb-4">Thank you for your Verification!</h3>
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

    <script src="../js/fileUpload.js"></script>
    <script src="../js/formStep.js"></script>
</body>

</html>