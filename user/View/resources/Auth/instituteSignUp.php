<?php
// session_start();
ini_set('display_errors', '1');
include '../../../Controller/InstituteController.php';
include '../../../Controller/StateRegionController.php';
include '../../../Controller/CityController.php';
include '../../../Controller/InstituteTypeController.php';

if (isset($_SESSION['error_message'])) {
    echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    $message = htmlspecialchars($_SESSION['success_message'], ENT_QUOTES, 'UTF-8');
    echo "<script>
        var successMessage = '$message';
        console.log(successMessage);
    </script>";
    unset($_SESSION['success_message']);
}

// echo "<pre>";
// print_r($types);
$cities = json_encode($cities);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Sign-Up Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- jQuery -->
    <script src="../lib/jquery-3.7.1.js" type="text/javascript"></script>
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
        #uploaded-image-back,
        #uploaded-image-logo,
        #uploaded-image-slider {
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

<body class="bg-custom-bg">
    <div class="flex items-center justify-center min-h-screen">
        <div id="loadingSpinner" style="display: none;">Loading...</div>

        <div class="py-8 px-20 bg-[#4460EF] rounded-lg bg-opacity-90 shadow-xl w-3/4 relative overflow-hidden" id="page">
            <!-- Logo and Form Name -->
            <div class="flex justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6">Institute Register Form</h2>
            </div>

            <form id="regForm" action="../../../Controller/InstituteController.php" method="POST" enctype="multipart/form-data">
                <!-- Form Step 1 -->
                <div id="step1" class="form-step active">
                    <h2 class="text-white text-xl mb-6">1.Institute Information</h2>
                    <!-- Step 1 Form Back-End -->
                    <div id="form1" class="space-y-6">
                        <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                            <!-- Logo -->
                            <div class="w-full">
                                <label class="block text-white text-lg">Upload Your Logo * </label>
                                <p class="text-sm mb-2">&nbsp;</p>
                                <div class="mb-2">
                                    <div class="upload-area rounded-md" id="upload-area-logo">
                                        <input type="file" name="photo" id="file-input-logo" accept="image/*" required class="hidden">
                                        <img id="uploaded-image-logo" alt="Uploaded Image">
                                        <div id="upload-text-logo" class="upload-text text-center">
                                            <ion-icon name="cloud-upload-outline" class="text-2xl text-gray-500"></ion-icon>
                                            <p class="text-gray-400 text-sm">Upload Here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="w-full">
                                <label class="block text-white text-lg">Participate For Slider (Optional) </label>
                                <p class="text-gray-300 text-sm mb-2">Showcase image in our homepage slider—Top 4 highlights!</p>
                                <div class="mb-2">
                                    <div class="upload-area rounded-md" id="upload-area-slider">
                                        <input type="file" name="slider_image" id="file-input-slider" accept="image/*" required class="hidden">
                                        <img id="uploaded-image-slider" alt="Uploaded Image">
                                        <div id="upload-text-slider" class="upload-text text-center">
                                            <ion-icon name="cloud-upload-outline" class="text-2xl text-gray-500"></ion-icon>
                                            <p class="text-gray-400 text-sm">Upload Here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Institute Name -->
                            <div>
                                <label for="institute-name" class="text-[#BDBDBD] text-sm">Institute Name *</label>
                                <input type="text" id="institute-name" name="name" placeholder="Institute Name" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Institute Type -->
                            <div>
                                <label for="institute-type" class="text-[#BDBDBD] text-sm">Institute Type *</label>
                                <select id="institute-type" name="type_id" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                                    <option value="" disabled selected>Institute Type</option>
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type['id'] ?>">
                                            <?= ($type['itype']) ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- Institute Email -->
                            <div>
                                <label for="institute-email" class="text-[#BDBDBD] text-sm">Institute Email *</label>
                                <input type="email" id="institute-email" name="email" placeholder="Email Address" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Institute Contact -->
                            <div>
                                <label for="institute-contact" class="text-[#BDBDBD] text-sm">Contact *</label>
                                <input type="tel" id="institute-contact" name="contact" placeholder="+959" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Institute Address -->
                            <div>
                                <label for="institute-address" class="text-[#BDBDBD] text-sm">Institute Address *</label>
                                <input type="text" id="institute-address" name="address" placeholder="Institute Address" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- State/Division City -->
                            <div class="flex">
                                <div class="relative w-1/2">
                                    <label for="state-region" class="block mb-1 text-[#BDBDBD] text-sm opacity-80">State/Region</label>
                                    <select id="state-region" name="state" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-10 rounded-md leading-tight focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                        <option class="text-[#BDBDBD]" selected disabled>Select State/Region</option>
                                        <?php foreach ($stateRegions as $stateRegion) : ?>
                                            <option value="<?= $stateRegion['id'] ?>">
                                                <?= ($stateRegion['name']) ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 top-5 right-2 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10l5 5 5-5H7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative pl-5 w-1/2">
                                    <label for="city" class="block mb-1 text-[#BDBDBD] text-sm opacity-80">City</label>
                                    <select id="city" name="city" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-10 rounded-md leading-tight focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                        <option class="text-[#BDBDBD]" selected disabled>City</option>
                                        <!-- City options will be dynamically populated here -->
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 top-5 right-2 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10l5 5 5-5H7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Institute Website Link (Optional) -->
                            <div>
                                <label for="website-link" class="text-[#BDBDBD] text-sm">Website Link (Optional)</label>
                                <input type="url" id="website-link" name="website" placeholder="Website Link (Optional)" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                            <!-- Institute Social Links (Optional) -->
                            <div>
                                <label for="social-links" class="text-[#BDBDBD] text-sm">Social Links (Optional)</label>
                                <input type="url" id="social-links" name="social" placeholder="Social Links (If Possible)" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                        </div>
                        <!-- 2 Buttons (Login Back, Next Step) -->
                        <div class="flex justify-between mt-6">
                            <button type="button" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75"><a href="login.php">Login</a></button>
                            <button type="button" id="next1" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Next</button>
                        </div>
                    </div>
                </div>
                <!-- Form Step 2 -->
                <div id="step2" class="form-step hidden">
                    <h2 class="text-white text-xl mb-6">2.Founder Information</h2>
                    <!-- Step 2 Form Back-End -->
                    <div id="form2" class="space-y-6">
                        <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                            <!-- Founder Full Name -->
                            <div>
                                <label for="founder-name" class="text-[#BDBDBD] text-sm">Full Name *</label>
                                <input type="text" id="founder-name" name="f_name" placeholder="Full Name" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Founder Email Address -->
                            <div>
                                <label for="founder-email" class="text-[#BDBDBD] text-sm">Personal Email Address *</label>
                                <input type="email" id="founder-email" name="f_email" placeholder="Email Address" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Founder Contact -->
                            <div>
                                <label for="contact" class="text-[#BDBDBD] text-sm">Contact *</label>
                                <input type="tel" id="contact" name="f_contact" placeholder="+959" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Free Space -->
                            <div></div>
                            <!-- NRC Verification Upload (Front) -->
                            <div>
                                <label class="text-white text-sm">NRC Verification * </label>
                                <p class="text-red-500 text-sm">Please Also Upload Your NRC Information</p>
                                <!-- Front Side Upload -->
                                <div class="w-full">
                                    <label class="block text-white mb-2">Front Side *</label>
                                    <div class="mb-6">
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
                            <div class="mt-10">
                                <!-- Back Side Upload -->
                                <div class="w-full">
                                    <label class="block text-white mb-3">Back Side *</label>
                                    <div class="mb-6">
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
                        </div>
                    </div>
                    <!-- 2 Buttons (Step-1, Step-3) -->
                    <div class="flex justify-between mt-6">
                        <button type="button" id="prev1" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Prev</button>
                        <button name="register" type="submit" id="next2" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Next</button>
                    </div>
                </div>
            </form>

            <!-- Received Information Announced -->
            <div id="step3" class="form-step hidden text-center">
                <h2 class="text-white text-xl mb-6">Submission Received</h2>
                <div class="p-6 bg-white rounded-lg shadow-md text-gray-800">
                    <h3 class="text-lg font-bold mb-4">Thank you for your submission!</h3>
                    <p class="mb-4">Your information has been successfully submitted and is now under review. Please
                        allow up to <span class="font-semibold">24 hours</span> for our team to review your submission.
                    </p>
                    <p class="mb-4">You will receive an email notification once your submission is approved. If you have
                        any questions, please feel free to contact us.</p>
                    <p class="mb-4">We will send a password to your institute's email address, which you can change
                        later.</p>
                    <!-- Redirect Back Login Page -->
                    <div class="flex justify-center mt-6">
                        <a href="login.php" id="finishButton" class="py-2 px-4 bg-[#4460EF] text-white font-bold rounded-md hover:bg-opacity-90 duration-75">Finish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var cities = <?php echo $cities; ?>;
    </script>
    <script src="../js/fileUpload.js"></script>
    <script src="../js/instituteFormStep.js"></script>
</body>

</html>