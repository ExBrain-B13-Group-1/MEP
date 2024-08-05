<?php
ini_set('display_errors', '1');
include '../../../Controller/InstituteController.php';

// echo "<pre>";
// print_r($institute);

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
        <div class="py-8 px-20 bg-[#4460EF] rounded-lg bg-opacity-90 shadow-xl w-3/4 relative overflow-hidden">
            <!-- Logo and Title -->
            <div class="flex justify-between items-center mb-6">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold">Institute Registration Details</h2>
            </div>

            <!-- Institute Information -->
            <div class="mb-10">
                <h2 class="text-white text-xl mb-6">1. Institute Information</h2>
                <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                    <!-- Logo -->
                    <div class="w-full">
                        <label class="block text-white text-lg">Institute Logo</label>
                        <div class="mb-2">
                            <div class="upload-area rounded-md border border-gray-300 p-2">
                                <img src="#" id="uploaded-image-logo" alt="Uploaded Image" class="w-full h-32 object-cover rounded-md">
                                <p id="upload-text-logo" class="text-gray-400 text-sm">Logo Image</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slider -->
                    <div class="w-full">
                        <label class="block text-white text-lg">Slider</label>
                        <div class="mb-2">
                            <div class="upload-area rounded-md border border-gray-300 p-2">
                                <img src="#" id="uploaded-image-slider" alt="Uploaded Image" class="w-full h-32 object-cover rounded-md">
                                <p id="upload-text-slider" class="text-gray-400 text-sm">Slider Image</p>
                            </div>
                        </div>
                    </div>
                    <!-- Institute Name -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Institute Name</label>
                        <p id="institute-name" class="text-white">Institute Name Here</p>
                    </div>
                    <!-- Institute Type -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Institute Type</label>
                        <p id="institute-type" class="text-white">Institute Type Here</p>
                    </div>
                    <!-- Institute Email -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Institute Email</label>
                        <p id="institute-email" class="text-white">email@example.com</p>
                    </div>
                    <!-- Institute Contact -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Contact</label>
                        <p id="institute-contact" class="text-white">+959 123 456 789</p>
                    </div>
                    <!-- Institute Address -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Institute Address</label>
                        <p id="institute-address" class="text-white">Institute Address Here</p>
                    </div>
                    <!-- State/Region and City -->
                    <div class="flex">
                        <div class="relative w-1/2">
                            <label class="block mb-1 text-[#BDBDBD] text-sm opacity-80">State/Region</label>
                            <p id="state-region" class="text-white">State/Region Here</p>
                        </div>
                        <div class="relative pl-5 w-1/2">
                            <label class="block mb-1 text-[#BDBDBD] text-sm opacity-80">City</label>
                            <p id="city" class="text-white">City Here</p>
                        </div>
                    </div>
                    <!-- Institute Website Link (Optional) -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Website Link</label>
                        <p id="website-link" class="text-white">http://website-link.com</p>
                    </div>
                    <!-- Institute Social Links (Optional) -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Social Links</label>
                        <p id="social-links" class="text-white">http://social-link.com</p>
                    </div>
                </div>
            </div>

            <!-- Founder Information -->
            <div>
                <h2 class="text-white text-xl mb-6">2. Founder Information</h2>
                <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                    <!-- Founder Full Name -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Full Name</label>
                        <p id="founder-name" class="text-white">Full Name Here</p>
                    </div>
                    <!-- Founder Email Address -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Personal Email Address</label>
                        <p id="founder-email" class="text-white">founder@example.com</p>
                    </div>
                    <!-- Founder Contact -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Contact</label>
                        <p id="contact" class="text-white">+959 987 654 321</p>
                    </div>
                    <div></div>
                    <!-- Founder NRC Front -->
                    <div class="w-full">
                        <label class="block text-white text-lg">NRC Front</label>
                        <div class="mb-2">
                            <div class="upload-area rounded-md border border-gray-300 p-2">
                                <img src="#" id="uploaded-image-logo" alt="Uploaded Image" class="w-full h-32 object-cover rounded-md">
                                <p id="upload-text-logo" class="text-gray-400 text-sm">NRC</p>
                            </div>
                        </div>
                    </div>
                    <!-- Founder NRC Back -->
                    <div class="w-full">
                        <label class="block text-white text-lg">NRC Back</label>
                        <div class="mb-2">
                            <div class="upload-area rounded-md border border-gray-300 p-2">
                                <img src="#" id="uploaded-image-logo" alt="Uploaded Image" class="w-full h-32 object-cover rounded-md">
                                <p id="upload-text-logo" class="text-gray-400 text-sm">NRC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>