<?php
ini_set('display_errors', '1');
include '../../../Controller/UserController.php';

$baseUrl = 'http://localhost/MEP/storages/uploads/';
// echo "<pre>";
// print_r($user);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Verification</title>
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
            <div class="flex justify-between items-center mb-6">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold">User Verification Details</h2>
            </div>

            <!-- User Information -->
            <div class="mb-10">
                <h2 class="text-white text-xl mb-6">User Information</h2>
                <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                    <!-- User Name -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">User Full Name</label>
                        <p class="text-white"><?= $user[0]['name']; ?></p>
                    </div>
                    <!-- User Email -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">User Email</label>
                        <p class="text-white"><?= $user[0]['email']; ?></p>
                    </div>
                    <!-- User Age -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Age</label>
                        <p class="text-white"><?= $user[0]['age']; ?></p>
                    </div>
                    <!-- User Contact -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">User Contact</label>
                        <p class="text-white"><?= $user[0]['contact']; ?></p>
                    </div>
                    <!-- User Gender -->
                    <div>
                        <label class="text-[#BDBDBD] text-sm">Gender</label>
                        <p class="text-white"><?= $user[0]['gender']; ?></p>
                    </div>
                    <div>
                    </div>
                    <!-- NRC Front -->
                    <div class="w-full">
                        <label class="block text-white text-lg">NRC Front</label>
                        <div class="my-2">
                            <div class="upload-area rounded-md border border-gray-300 p-2">
                                <img src="<?= $baseUrl . $user[0]['nrc_front']; ?>" id="uploaded-image-logo" alt="Uploaded Image" class="w-full h-32 object-cover rounded-md">
                                <p id="upload-text-logo" class="text-gray-400 text-sm">NRC</p>
                            </div>
                        </div>
                    </div>
                    <!-- NRC Back -->
                    <div class="w-full">
                        <label class="block text-white text-lg">NRC Back</label>
                        <div class="my-2">
                            <div class="upload-area rounded-md border border-gray-300 p-2">
                                <img src="<?= $baseUrl . $user[0]['nrc_back']; ?>" id="uploaded-image-logo" alt="Uploaded Image" class="w-full h-32 object-cover rounded-md">
                                <p id="upload-text-logo" class="text-gray-400 text-sm">NRC</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <form action="../../../Controller/UserController.php" method="POST" class="flex justify-between mt-6">
                <input type="hidden" name="id" value="<?= $user[0]['id']; ?>">
                <button type="submit" name="action" value="reject" class="bg-red-500 text-white px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 reject-button" data-action="reject" data-id="<?= $user[0]['id']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" class="mr-1" viewBox="0 0 16 16" {...$$props}>
                        <path fill="currentColor" fill-rule="evenodd" d="M7.67 14.72h.71L10.1 13h2.4l.5-.5v-2.42l1.74-1.72v-.71l-1.71-1.72V3.49l-.5-.49H10.1L8.38 1.29h-.71L6 3H3.53L3 3.5v2.43L1.31 7.65v.71L3 10.08v2.42l.53.5H6zM6.16 12H4V9.87l-.12-.35L2.37 8l1.48-1.51l.15-.35V4h2.16l.36-.14L8 2.35l1.54 1.51l.35.14H12v2.14l.17.35L13.69 8l-1.55 1.52l-.14.35V12H9.89l-.38.15L8 13.66l-1.48-1.52zm1.443-5.859a1 1 0 0 0-.128.291q-.045.164-.062.317l-.005.043h-.895l.003-.051q.027-.49.212-.864q.079-.162.193-.318q.122-.16.294-.28q.178-.125.409-.2A1.7 1.7 0 0 1 8.165 5q.42 0 .726.14q.301.133.494.363q.19.228.279.52q.087.291.087.599q0 .287-.098.54q-.096.247-.238.466q-.14.215-.31.41q-.165.193-.304.372a2.5 2.5 0 0 0-.23.34a.65.65 0 0 0-.088.318v.48h-.888v-.539q0-.252.094-.464a2 2 0 0 1 .24-.401q.145-.19.308-.368a5 5 0 0 0 .299-.356q.14-.18.228-.377a1 1 0 0 0 .09-.421a1 1 0 0 0-.047-.318v-.001a.6.6 0 0 0-.13-.243a.56.56 0 0 0-.216-.158H8.46a.7.7 0 0 0-.294-.059a.64.64 0 0 0-.339.083a.7.7 0 0 0-.223.215zM8.5 11h-.888v-.888H8.5z" clip-rule="evenodd" />
                    </svg>
                    Reject
                </button>
                <div class="w-2 h-2"></div>
                <button type="submit" name="action" value="verify" class="bg-green-600 text-white px-4 py-2 rounded text-sm flex items-center transition duration-100 transform hover:scale-105 verify-button" data-action="verify" data-id="<?= $user[0]['id']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" class="mr-1" viewBox="0 0 24 24" {...$$props}>
                        <path fill="currentColor" d="M23 11.99L20.56 9.2l.34-3.69l-3.61-.82L15.4 1.5L12 2.96L8.6 1.5L6.71 4.69L3.1 5.5l.34 3.7L1 11.99l2.44 2.79l-.34 3.7l3.61.82l1.89 3.2l3.4-1.47l3.4 1.46l1.89-3.19l3.61-.82l-.34-3.69zm-3.95 1.48l-.56.65l.08.85l.18 1.95l-1.9.43l-.84.19l-.44.74l-.99 1.68l-1.78-.77l-.8-.34l-.79.34l-1.78.77l-.99-1.67l-.44-.74l-.84-.19l-1.9-.43l.18-1.96l.08-.85l-.56-.65L3.67 12l1.29-1.48l.56-.65l-.09-.86l-.18-1.94l1.9-.43l.84-.19l.44-.74l.99-1.68l1.78.77l.8.34l.79-.34l1.78-.77l.99 1.68l.44.74l.84.19l1.9.43l-.18 1.95l-.08.85l.56.65l1.29 1.47z" />
                        <path fill="currentColor" d="m10.09 13.75l-2.32-2.33l-1.48 1.49l3.8 3.81l7.34-7.36l-1.48-1.49z" />
                    </svg>
                    Verified
                </button>
            </form>
        </div>
    </div>
</body>


</html>