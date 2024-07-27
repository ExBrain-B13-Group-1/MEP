<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institute Sign-Up Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="./../lib/jquery-3.7.1.min.js" type="text/javascript"></script>
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
        #uploaded-image-business {
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
            <!-- Logo and Form Name -->
            <div class="flex justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6">Institute Register Form</h2>
            </div>

            <!-- Form Step 1 -->
            <div id="step1" class="form-step active">
                <h2 class="text-white text-xl mb-6">1.Institute Information</h2>
                <!-- Step 1 Form Back-End -->
                <form id="form1" class="space-y-6">
                    <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                        <!-- Institute Name -->
                        <div>
                            <label for="institute-name" class="text-[#BDBDBD] text-sm">Institute Name *</label>
                            <input type="text" id="institute-name" placeholder="Institute Name" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Institute Type -->
                        <div>
                            <label for="institute-type" class="text-[#BDBDBD] text-sm">Institute Type *</label>
                            <select id="institute-type" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                                <option value="" disabled selected>Institute Type</option>
                                <option value="school">School</option>
                                <option value="university">University</option>
                            </select>
                        </div>
                        <!-- Institute Email -->
                        <div>
                            <label for="institute-email" class="text-[#BDBDBD] text-sm">Institute Email *</label>
                            <input type="email" id="institute-email" placeholder="Email Address" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Institute Contact -->
                        <div>
                            <label for="institute-contact" class="text-[#BDBDBD] text-sm">Contact *</label>
                            <input type="tel" id="institute-contact" placeholder="+959" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Institute Address -->
                        <div>
                            <label for="institute-address" class="text-[#BDBDBD] text-sm">Institute Address *</label>
                            <input type="text" id="institute-address" placeholder="Institute Address" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- State/Division -->
                        <div class="flex">
                            <div class="">
                                <label for="region" class="block mb-1 font-medium text-[#BDBDBD] text-sm opacity-80">State/Region</label>
                                <select id="region" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full" required>
                                    <option selected disabled>Select State/Region</option>
                                    <option value="ayeyarwady">Ayeyarwady</option>
                                    <option value="bago">Bago</option>
                                    <option value="chin">Chin</option>
                                    <option value="kachin">Kachin</option>
                                    <option value="kayah">Kayah</option>
                                    <option value="kayin">Kayin</option>
                                    <option value="magway">Magway</option>
                                    <option value="mandalay">Mandalay</option>
                                    <option value="mon">Mon</option>
                                    <option value="rakhine">Rakhine</option>
                                    <option value="sagaing">Sagaing</option>
                                    <option value="shan">Shan</option>
                                    <option value="tanintharyi">Tanintharyi</option>
                                    <option value="yangon">Yangon</option>
                                </select>
                            </div>
                            <div class="pl-5">
                                <label for="region" class="block mb-1 text-sm font-medium text-[#BDBDBD] opacity-80">City</label>
                                <select id="region" class="bg-white border border-gray-300 text-gray-700 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full" required>
                                    <option selected disabled>Select City in Yangon</option>
                                    <option value="dagon">Dagon</option>
                                    <option value="hlaing">Hlaing</option>
                                    <option value="kamayut">Kamayut</option>
                                    <option value="kyauktada">Kyauktada</option>
                                    <option value="lanmadaw">Lanmadaw</option>
                                    <option value="latha">Latha</option>
                                    <option value="mayangone">Mayangone</option>
                                    <option value="mingaladon">Mingaladon</option>
                                    <option value="mingalartaungnyunt">Mingalartaungnyunt</option>
                                    <option value="north_dagon">North Dagon</option>
                                    <option value="south_dagon">South Dagon</option>
                                    <option value="pabedan">Pabedan</option>
                                    <option value="sanchaung">Sanchaung</option>
                                    <option value="tamwe">Tamwe</option>
                                    <option value="thaketa">Thaketa</option>
                                    <option value="thingangyun">Thingangyun</option>
                                    <option value="yangon_downtown">Yangon Downtown</option>
                                </select>
                            </div>
                        </div>
                        <!-- Institute Website Link (Optional) -->
                        <div>
                            <label for="website-link" class="text-[#BDBDBD] text-sm">Website Link (Optional)</label>
                            <input type="url" id="website-link" placeholder="Website Link (Optional)" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                        </div>
                        <!-- Institute Social Links (Optional) -->
                        <div>
                            <label for="social-links" class="text-[#BDBDBD] text-sm">Social Links (Optional)</label>
                            <input type="url" id="social-links" placeholder="Social Links (If Possible)" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                        </div>
                    </div>
                    <!-- Upload Institute Logo -->
                    <div class="text-center">
                        <label class="block text-white mb-2">Upload Your Institute Logo</label>
                        <input type="file" class="hidden" id="upload-logo" required>
                        <label for="upload-logo" class="cursor-pointer inline-block px-6 py-2 bg-white text-[#4460EF] font-bold rounded-md border border-gray-800 hover:bg-opacity-90 transition duration-75">Upload
                            Here</label>
                        <!-- Image Preview -->
                        <div class="mt-6" id="preview-logo">
                            <img id="preview-image-logo" src="#" alt="Logo Preview" class="hidden rounded-md mx-auto w-24 h-24">
                            <div id="file-name-logo" class="mt-2 text-sm text-white"></div>
                        </div>
                    </div>
                    <!-- 2 Buttons (Login Back, Next Step) -->
                    <div class="flex justify-between mt-6">
                        <button type="button" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75"><a href="login.php">Login</a></button>
                        <button type="button" id="next1" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Next</button>
                    </div>
                </form>
            </div>

            <!-- Form Step 2 -->
            <div id="step2" class="form-step hidden">
                <h2 class="text-white text-xl mb-6">2.Founder Information</h2>
                <!-- Step 2 Form Back-End -->
                <form id="form2" class="space-y-6">
                    <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                        <!-- Founder Full Name -->
                        <div>
                            <label for="founder-name" class="text-[#BDBDBD] text-sm">Full Name *</label>
                            <input type="text" id="founder-name" placeholder="Full Name" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Founder Email Address -->
                        <div>
                            <label for="founder-email" class="text-[#BDBDBD] text-sm">Personal Email Address *</label>
                            <input type="email" id="founder-email" placeholder="Email Address" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Founder Contact -->
                        <div>
                            <label for="contact" class="text-[#BDBDBD] text-sm">Contact *</label>
                            <input type="tel" id="contact" placeholder="+959" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
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
                                        <input type="file" id="file-input-front" accept="image/*" required class="hidden">
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
                                        <input type="file" id="file-input-back" accept="image/*" required class="hidden">
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
                    <!-- 2 Buttons (Step-1, Step-3) -->
                    <div class="flex justify-between mt-6">
                        <button type="button" id="prev1" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Prev</button>
                        <button type="button" id="next2" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Next</button>
                    </div>
                </form>
            </div>

            <!-- Form Step 3 -->
            <div id="step3" class="form-step hidden">
                <h2 class="text-white text-xl mb-6">3.Additional Information</h2>
                <!-- Step 3 Form Back-End -->
                <form id="form3" class="space-y-6">
                    <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                        <!-- Business License Verification Upload -->
                        <div>
                            <!-- Business License Upload -->
                            <div class="w-full">
                                <label class="block text-white text-lg">Business License Verification * </label>
                                <p class="text-red-500 text-sm mb-2">Please Also Upload Your Business License</p>
                                <div class="mb-2">
                                    <div class="upload-area rounded-md" id="upload-area-business">
                                        <input type="file" id="file-input-business" accept="image/*" required class="hidden">
                                        <img id="uploaded-image-business" alt="Uploaded Image">
                                        <div id="upload-text-business" class="upload-text text-center">
                                            <ion-icon name="cloud-upload-outline" class="text-2xl text-gray-500"></ion-icon>
                                            <p class="text-gray-400 text-sm">Upload Here</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Related Major Programs -->
                        <div>
                            <label class="text-white text-lg">Related Major Programs Offered</label>
                            <div class="flex flex-col space-y-2 mt-4 w-2/3">
                                <div class="flex flex-row justify-between">
                                    <label class="text-white text-sm flex items-center space-x-2">
                                        <input type="checkbox" name="programs" value="IT" class="hpp-checkbox">
                                        <span>IT</span>
                                    </label>
                                    <label class="text-white text-sm flex items-center space-x-2">
                                        <input type="checkbox" name="programs" value="Language" class="hpp-checkbox">
                                        <span>Language</span>
                                    </label>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <label class="text-white text-sm flex items-center space-x-2">
                                        <input type="checkbox" name="programs" value="Accounting" class="hpp-checkbox">
                                        <span>Accounting</span>
                                    </label>
                                    <label class="text-white text-sm flex items-center space-x-2">
                                        <input type="checkbox" name="programs" value="Business" class="hpp-checkbox">
                                        <span>Business&nbsp;</span>
                                    </label>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <label class="text-white text-sm flex items-center space-x-2">
                                        <input type="checkbox" name="programs" value="Marketing" class="hpp-checkbox">
                                        <span>Marketing</span>
                                    </label>
                                    <label class="text-white text-sm flex items-center space-x-2">
                                        <input type="checkbox" name="programs" value="Others" class="hpp-checkbox">
                                        <span>Others &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Brief Introduction about Institute -->
                        <div>
                            <label for="institution-intro" class="text-[#BDBDBD] text-sm">Introduce Your Institution
                                (max-300)</label>
                            <textarea id="institution-intro" rows="5" placeholder="About Your Institute" maxlength="300" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required></textarea>
                        </div>
                        <!-- Institute's Facilities Upload Multiple Images -->
                        <div>
                            <div>
                                <label class="block mb-2 text-[#BDBDBD] text-sm" for="facilities">Facilities - Library etc. (Optional)</label>
                                <input id="facilities" multiple class="block w-full text-base text-gray-900 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-light-bg" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                            </div>
                        </div>
                        <!-- Affiliations Name (Optional) -->
                        <div>
                            <!-- <label for="affiliations" class="text-[#BDBDBD] text-sm">Affiliations (Optional)</label>
                            <div id="affiliations-container">
                                <input type="text" name="affiliations[]" placeholder="Add Affiliations If Convenient" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg mb-2">
                            </div>
                          
                            <button type="button" id="add-affiliation" class="mt-2 px-4 py-2 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">+
                                Add</button> -->
                        </div>
                        <!-- Empty Div -->
                        <div></div>
                        <!-- Agree Terms & Conditions -->
                        <div class="mb-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" id="agree-terms" class="form-checkbox hpp-checkbox">
                                <span class="ml-2 text-white text-sm">Agree Terms & Conditions</span>
                            </label>
                        </div>
                    </div>
                    <!-- 2 Buttons (Step 2, Submit) -->
                    <div class="flex justify-between mt-5">
                        <button type="button" id="prev2" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md hover:bg-opacity-90 duration-75">Prev</button>
                        <button type="submit" id="submit-button" class="py-2 px-4 bg-white text-[#4460EF] font-bold rounded-md opacity-50 cursor-not-allowed duration-75" disabled>Send</button>
                    </div>
                </form>
            </div>

            <!-- Received Information Announced -->
            <div id="step4" class="form-step hidden text-center">
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
                        <a href="login.php" class="py-2 px-4 bg-[#4460EF] text-white font-bold rounded-md hover:bg-opacity-90 duration-75">Finish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/fileUpload.js"></script>
    <script src="../js/formStep.js"></script>
</body>

</html>