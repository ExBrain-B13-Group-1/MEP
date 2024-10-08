<?php
ini_set('display_errors', '1');
include '../../Controller/UserController.php';

$userProId = isset($_COOKIE['pro_user_id']) ? $_COOKIE['pro_user_id'] : null;
$verified = isset($_COOKIE['verified']) ? $_COOKIE['verified'] : null;

// Split the name into parts by space
$name_parts = explode(' ', $user[0]['name']);

// get first and last name
$first_name = $name_parts[0];
$last_name = $name_parts[1];

// Split the social links
$social_links = explode(',', $user[0]['social_links']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link href="./css/output.css" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="./lib/jquery-3.7.1.js"></script>
  <script src="./js/navbar.js" defer></script>
  <script src="./js/profile.js" defer></script>
</head>

<style>
  .upload-area {
    position: relative;
    width: 100%;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }

  #uploaded-image-photo {
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

<body class="bg-bgColor">
  <!-- Notification Message -->
  <div id="notification" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-primary-main text-white py-2 px-4 rounded shadow-lg opacity-0 transition-opacity duration-500 ease-in-out z-50">
    <p id="notificationMessage" class="text-sm text-center"></p>
  </div>

  <!-- start navbar -->
  <nav class="bg-white fixed w-[100%] top-0 left-0 border-b border-gray-200 md:h-18 md:py-1 z-50">
    <div class="md:px-32 flex items-center justify-between mx-auto px-4 relative">
      <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="./img/LOGO.svg" class="md:h-14 h-10" alt="MEP Logo" />
      </a>

      <button onclick="menuForMobile()" data-collapse-toggle="menuList" type="button" class="inline-flex text-primaryColor hover:text-slate-800 flex-col items-center p-2 w-10 mx-3 h-full justify-center text-sm rounded-lg md:hidden" aria-controls="navbar-default" aria-expanded="false">
        <p class="font-bold text-blue-500">Profile</p>
        <ion-icon name="chevron-down-outline" class="text-lg"></ion-icon>
      </button>

      <div id="menuList" isOpen="false" class="hidden md:flex absolute md:static top-16 right-0 left-0 mx-24 md:mx-auto md:items-center md:justify-center bg-gray-200 rounded-xl ">
        <ul class="flex flex-col md:flex-row justify-between items-center font-medium md:space-x-10 p-3 md:p-0">
          <li>
            <a href="./home.php" id="userDashboard" class="block w-full md:w-auto text-center py-2 px-6 aria-[active=true]:bg-primaryColor aria-[active=true]:text-white text-black rounded-xl hover:text-primaryColor">Home</a>
          </li>
          <li>
            <a href="./class.php" id="userClass" class="block w-full md:w-auto text-center py-2 px-6 aria-[active=true]:bg-primaryColor aria-[active=true]:text-white text-black rounded-xl hover:text-primaryColor">Class</a>
          </li>
          <li>
            <a href="./pricing.php" id="userSchedule" class="block w-full md:w-auto text-center py-2 px-6 aria-[active=true]:bg-primaryColor aria-[active=true]:text-white text-black rounded-xl hover:text-primaryColor">Pricing</a>
          </li>
          <li>
            <a href="./support.php" id="userSupport" class="block w-full md:w-auto text-center py-2 px-6 aria-[active=true]:bg-primaryColor aria-[active=true]:text-white text-black rounded-xl hover:text-primaryColor">Support</a>
          </li>
        </ul>
      </div>

      <div class="flex items-center space-x-2 md:space-x-3 rtl:space-x-reverse my-2">
        <a href="./chat.php" class="md:mr-3 mr-2">
          <svg class="md:w-6 w-4" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.9734 18.4591C11.5788 18.4591 12.0688 17.967 12.0664 17.3617C11.4618 17.3639 10.9734 17.8544 10.9734 18.4591ZM13.1681 18.4602C12.8949 18.4602 12.8074 18.8285 13.0518 18.9507C13.1286 18.7981 13.1681 18.6302 13.1681 18.4602ZM6.69994 18.9507C6.94435 18.8285 6.8573 18.4602 6.58406 18.4602C6.58406 18.6302 6.62368 18.7981 6.69994 18.9507ZM7.68624 17.3617C7.68357 17.967 8.17349 18.4591 8.77875 18.4591C8.77875 17.8544 8.29033 17.3639 7.68624 17.3617ZM19.7522 10.7788C19.7522 9.26003 19.7533 8.03869 19.6545 7.06205C19.5525 6.06567 19.3374 5.20203 18.8271 4.43828L17.0022 5.65746C17.2316 6.00092 17.3874 6.4618 17.4708 7.28371C17.5564 8.12428 17.5575 9.21504 17.5575 10.7788H19.7522ZM18.8271 17.1192C19.3374 16.3555 19.5525 15.4918 19.6545 14.4954C19.7533 13.5188 19.7522 12.2975 19.7522 10.7788H17.5575C17.5575 12.3425 17.5564 13.4332 17.4708 14.2738C17.3874 15.0957 17.2316 15.5566 17.0022 15.9L18.8271 17.1192ZM17.3139 18.6325C17.913 18.233 18.4277 17.7184 18.8271 17.1192L17.0022 15.9C16.763 16.2589 16.4536 16.5683 16.0947 16.8075L17.3139 18.6325ZM12.0664 17.3617C12.0712 18.5736 13.0599 19.5805 14.2687 19.4953C14.549 19.4755 14.8135 19.4494 15.0632 19.4148C15.9038 19.2985 16.6467 19.0791 17.3139 18.6325L16.0947 16.8075C15.7941 17.0084 15.4045 17.1521 14.7626 17.241C14.1031 17.3321 13.2548 17.3562 12.0664 17.3617ZM13.1681 18.4602C13.1681 18.4595 13.1676 18.4591 13.167 18.4591H10.9734C10.9734 18.4597 10.9739 18.4602 10.9745 18.4602H13.1681ZM11.8392 21.3769L13.0518 18.9507C11.9681 18.4088 10.6504 18.8479 10.1084 19.9315L9.87609 20.3959L11.8392 21.3769ZM7.91305 21.3769C8.72191 22.9944 11.0305 22.9944 11.8392 21.3769L9.87609 20.3959L7.91305 21.3769ZM6.69994 18.9507L7.91305 21.3769L9.87609 20.3959L9.64432 19.9324C9.10225 18.8483 7.78411 18.4088 6.69994 18.9507ZM6.58517 18.4591C6.58456 18.4591 6.58406 18.4595 6.58406 18.4602H8.77765C8.77826 18.4602 8.77875 18.4597 8.77875 18.4591H6.58517ZM2.43841 18.6325C3.10559 19.0791 3.84828 19.2985 4.68928 19.4148C4.93872 19.4494 5.203 19.4755 5.483 19.4953C6.69201 19.5806 7.6809 18.5737 7.68624 17.3617C6.49716 17.3562 5.64935 17.3321 4.98985 17.241C4.3479 17.1521 3.95768 17.0084 3.65777 16.8075L2.43841 18.6325ZM0.924729 17.1192C1.32493 17.7184 1.83937 18.233 2.43841 18.6325L3.65777 16.8075C3.29828 16.5683 2.98971 16.2589 2.74951 15.9L0.924729 17.1192ZM8.74279e-07 10.7788C8.74279e-07 12.2975 -0.00131457 13.5188 0.0981048 14.4954C0.19939 15.4918 0.414245 16.3555 0.924729 17.1192L2.74951 15.9C2.52016 15.5566 2.36522 15.0957 2.28149 14.2738C2.19601 13.4332 2.19469 12.3425 2.19469 10.7788H8.74279e-07ZM0.924729 4.43828C0.414245 5.20203 0.19939 6.06567 0.0981048 7.06205C-0.00131457 8.03869 8.74279e-07 9.26003 8.74279e-07 10.7788H2.19469C2.19469 9.21504 2.19601 8.12428 2.28149 7.28371C2.36522 6.4618 2.52016 6.00092 2.74951 5.65746L0.924729 4.43828ZM2.43841 2.92505C1.83937 3.32448 1.32493 3.83913 0.924729 4.43828L2.74951 5.65746C2.98971 5.29862 3.29828 4.98918 3.65777 4.74996L2.43841 2.92505ZM8.77875 2C7.26047 2 6.03902 1.99889 5.06161 2.09765C4.06588 2.19971 3.20238 2.41478 2.43841 2.92505L3.65777 4.74996C4.00091 4.52061 4.46158 4.36479 5.28382 4.28139C6.12428 4.1958 7.21471 4.19469 8.77875 4.19469V2ZM10.9734 2H8.77875V4.19469H10.9734V2ZM17.3139 2.92505C16.5501 2.41478 15.6865 2.19971 14.6901 2.09765C13.7135 1.99889 12.4922 2 10.9734 2V4.19469C12.5372 4.19469 13.6279 4.1958 14.4685 4.28139C15.2904 4.36479 15.7513 4.52061 16.0947 4.74996L17.3139 2.92505ZM18.8271 4.43828C18.4277 3.83913 17.913 3.32448 17.3139 2.92505L16.0947 4.74996C16.4536 4.98918 16.763 5.29862 17.0022 5.65746L18.8271 4.43828Z" fill="#33363F" />
            <path d="M14.2653 11.8763C14.8714 11.8763 15.3627 11.385 15.3627 10.779C15.3627 10.1729 14.8714 9.68164 14.2653 9.68164C13.6593 9.68164 13.168 10.1729 13.168 10.779C13.168 11.385 13.6593 11.8763 14.2653 11.8763Z" fill="#33363F" stroke="#33363F" stroke-linecap="round" />
            <path d="M9.87615 11.8763C10.4822 11.8763 10.9735 11.385 10.9735 10.779C10.9735 10.1729 10.4822 9.68164 9.87615 9.68164C9.27011 9.68164 8.77881 10.1729 8.77881 10.779C8.77881 11.385 9.27011 11.8763 9.87615 11.8763Z" fill="#33363F" stroke="#33363F" stroke-linecap="round" />
            <path d="M5.48699 11.8763C6.09304 11.8763 6.58434 11.385 6.58434 10.779C6.58434 10.1729 6.09304 9.68164 5.48699 9.68164C4.88095 9.68164 4.38965 10.1729 4.38965 10.779C4.38965 11.385 4.88095 11.8763 5.48699 11.8763Z" fill="#33363F" stroke="#33363F" stroke-linecap="round" />
            <path d="M17.7088 6.41767C19.2049 6.41767 20.4177 5.20488 20.4177 3.70883C20.4177 2.21279 19.2049 1 17.7088 1C16.2128 1 15 2.21279 15 3.70883C15 5.20488 16.2128 6.41767 17.7088 6.41767Z" fill="#EF0000" stroke="#EF0000" />
          </svg>
        </a>

        <a href="./notification.php" class="md:mr-3 mr-2">
          <svg class="md:w-6 w-4" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8189 1.6075C12.1507 1.03836 11.9764 0.246541 11.3291 0.124153C10.8978 0.0426113 10.4535 0 10 0C6.36366 0 3.30808 2.73376 2.90717 6.34843L2.63417 8.80371L2.62762 8.86224C2.50518 9.92735 2.15849 10.9556 1.61022 11.8766L1.57987 11.9275L0.953583 12.971L0.927593 13.0143C0.665378 13.451 0.429148 13.8454 0.270952 14.1813C0.110589 14.5215 -0.0616715 14.9842 0.0217606 15.5075C0.103026 16.0244 0.369552 16.4946 0.770459 16.8316C1.17678 17.1718 1.66116 17.2618 2.03606 17.2997C2.40554 17.3365 2.86603 17.3365 3.37421 17.3365H3.42513H16.5749H16.6258C17.134 17.3365 17.5945 17.3365 17.9639 17.2997C18.3378 17.2618 18.8222 17.1718 19.2285 16.8316C19.6305 16.4946 19.897 16.0244 19.9782 15.5075C20.0617 14.9842 19.8894 14.5215 19.729 14.1813C19.5709 13.8454 19.3335 13.451 19.0724 13.0143L19.0464 12.971L18.4201 11.9275L18.3898 11.8766C18.1525 11.4784 17.9531 11.0602 17.7933 10.6276C17.5976 10.0981 17.0657 9.7518 16.5012 9.7518C15.9198 9.7518 15.4011 10.2472 15.5684 10.804C15.7971 11.5653 16.1185 12.2982 16.5272 12.9851L16.5619 13.0425L17.1881 14.0859C17.4839 14.58 17.6627 14.8802 17.7689 15.1045C17.7767 15.1216 17.765 15.142 17.7462 15.1435C17.5002 15.1684 17.1502 15.1695 16.5749 15.1695H3.42513C2.84977 15.1695 2.49976 15.1684 2.25271 15.1435C2.23444 15.142 2.2235 15.1211 2.23109 15.1045C2.33727 14.8802 2.51607 14.58 2.81187 14.0859L3.43809 13.0425L3.47281 12.9851C4.17711 11.7997 4.62349 10.4788 4.7806 9.10924L4.78821 9.04318L5.06127 6.5879C5.34083 4.07085 7.46778 2.16707 10 2.16707C10.2069 2.16707 10.411 2.17978 10.6116 2.20452C11.0898 2.26347 11.5762 2.02373 11.8189 1.6075ZM16.5793 4.36927C16.0749 3.17 14.3341 3.0331 14.3341 4.33413C14.3341 4.34922 14.3343 4.36427 14.3346 4.37927C14.3401 4.65567 14.4532 4.91224 14.5627 5.16604C14.6729 5.42104 14.7838 5.68413 14.9818 5.87893C15.3727 6.26357 15.9094 6.5012 16.5012 6.5012C16.6849 6.5012 16.8626 6.47837 17.033 6.43573C17.0721 6.42595 17.0972 6.38846 17.0928 6.34843C17.0155 5.65159 16.8393 4.98746 16.5793 4.36927Z" fill="#33363F" />
            <path d="M6.85889 16.9736C7.04417 18.0106 7.45269 18.9262 8.02046 19.5796C8.58823 20.2329 9.28384 20.5872 9.99898 20.5872C10.7141 20.5872 11.4097 20.2329 11.9775 19.5796C12.5453 18.9262 12.9538 18.0106 13.1391 16.9736" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
            <path d="M16.5008 7.04267C17.9969 7.04267 19.2097 5.82988 19.2097 4.33383C19.2097 2.83779 17.9969 1.625 16.5008 1.625C15.0048 1.625 13.792 2.83779 13.792 4.33383C13.792 5.82988 15.0048 7.04267 16.5008 7.04267Z" fill="#EF0000" stroke="" />
          </svg>
        </a>

        <div class="relative">
          <div id="userProfile" aria-isOpen="false" class="flex justify-center items-center cursor-pointer hover:text-primaryColor">
            <div class="relative">
              <img src="<?= !empty($user[0]['photo']) ? '../../../storages/uploads/' . $user[0]['photo'] : './img/profile.png'; ?>" alt="profile" class="rounded-full mr-2 md:w-10 w-8 md:h-10 h-8" />
              <?php if (isset($_COOKIE['verified'])): ?>
                <ion-icon name="checkmark-circle" class="text-green-600 absolute md:right-0 top-[1.45rem]"></ion-icon>
              <?php endif; ?>
            </div>
            <ion-icon name="chevron-down-outline" class="text-lg"></ion-icon>
          </div>
        </div>

        <div id="profileMenu" class="hidden absolute bottom-0 right-0 md:mr-0 mr-3 border-2 shadow-lg bg-white w-44 rounded-lg p-3 md:translate-y-52 translate-y-48 md:-translate-x-20 -translate-x-5">
          <h1 class="font-bold"><?= ucwords(strtolower($user[0]['name'])); ?></h1>
          <div class="flex items-center select-none">
            <ion-icon name="wallet-outline" class="text-lg mx-2 my-2"></ion-icon>
            <p>Coin - <span class="text-primaryColor"><?= $user[0]['remain_amount'] ?></span></p>
          </div>

          <a href="./profile.php" class="flex items-center hover:text-primaryColor cursor-pointer">
            <ion-icon name="person-circle-outline" class="text-lg mx-2 my-2"></ion-icon>
            <p>Profile</p>
          </a>

          <a href="./profile.php" class="flex items-center hover:text-primaryColor cursor-pointer">
            <ion-icon name="settings-outline" class="text-lg mx-2 my-2"></ion-icon>
            <p>Account Setting</p>
          </a>

          <a href="./Auth/login.php" class="flex items-center hover:text-primaryColor cursor-pointer">
            <ion-icon name="log-out-outline" class="text-lg mx-2 my-2"></ion-icon>
            <form action="../../Controller/LogoutController.php" method="POST" class="inline">
              <button type="submit">
                Logout
              </button>
            </form>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <!-- end navbar -->

  <!--! Start Code Here -->
  <div class="m-auto h-full flex flex-col md:flex-row mt-16 w-[95%] md:w-[80%] mb-6 md:mb-2 bg-white py-2 rounded-md">
    <div class="w-full md:w-[20%]">
      <div class="m-5 text-center flex justify-center items-center">
        <img src="<?= !empty($user[0]['photo']) ? '../../../storages/uploads/' . $user[0]['photo'] : './img/profile.png'; ?>" alt="profile" width="90" />
      </div>
      <div class="mt-4 px-2 md:pl-10 flex justify-center space-x-2 md:space-x-0 md:space-y-3 items-center md:items-start flex-row md:flex-col" id="profileSetting">
        <button aria-active="true" class="text-sm md:text-base aria-[active=true]:bg-primaryColor aria-[active=true]:text-white w-full text-center md:text-start p-2 rounded-md" onclick="profileMenu('general')">
          Profile
        </button>
        <button aria-active="false" class="text-sm md:text-base aria-[active=true]:bg-primaryColor aria-[active=true]:text-white w-full text-center md:text-start p-2 rounded-md" onclick="profileMenu('photo')">
          Photo
        </button>
        <button aria-active="false" class="text-sm md:text-base aria-[active=true]:bg-primaryColor aria-[active=true]:text-white w-full text-center md:text-start p-2 rounded-md" onclick="profileMenu('account')">
          Account Security
        </button>
        <form action="../../Controller/LogoutController.php" method="POST" class="inline">
          <button type="submit" class="text-sm md:text-base text-red-500 w-full text-center md:text-start p-2 rounded-md">
            Logout
          </button>
        </form>

      </div>
    </div>
    <div class="w-full md:w-[80%] h-full">
      <!--! profile section -->
      <div class=" w-full h-auto px-3 md:px-28" id="profileSection">
        <div class="w-full text-center p-4">
          <h1 class="font-bold text-xl">Profile</h1>
          <p>Add Information about yourself</p>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow-md text-center mb-6">
          <p class="font-semibold text-blue-800">
            You are currently using the <span class="text-blue-600 underline"><?= (!$userProId) ? 'Free Plan' : 'Pro Version'; ?></span>
          </p>
        </div>
        <div>
          <div class="flex justify-between items-center my-2">
            <p>Verify account with NRC</p>
            <form action="../../Controller/UserController.php" method="POST">
              <button type="submit" id="verifyButton"name="verifyPending"
                class="md:w-50 w-30 text-sm  rounded-lg md:text-xl px-10 md:px-5 py-3 mb-2 
                <?= ($verified) ? 'bg-gray-50 border border-gray-300 text-primaryColor text-sm cursor-not-allowed' : 'bg-white border border-red-400 text-red-400 px-10 py-2 rounded-md hover:bg-red-400 hover:text-white'; ?>"
                <?= (!$verified) ? '' : 'disabled'; ?>><?= (!$userProId) ? 'Verify' : 'Verified'; ?>
              </button>
            </form>

          </div>
          <form>
            <h1>Basics</h1>
            <div class="grid gap-6 mb-20">
              <input type="text" id="first_name" name="first_name" value="<?= ($first_name) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="First Name" required />
              <input type="text" id="last_name" name="last_name" value="<?= ($last_name) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Last Name" required />
            </div>

            <h1>Portfolio Links & Socail links</h1>
            <div class="grid gap-6 mb-6">
              <input type="url" id="portfolio" name="portfolio" value="<?= isset($social_links[0]) ? ($social_links[0]) : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Portfolio Website" />
              <input type="url" id="facebook" name="facebook" value="<?= isset($social_links[1]) ? ($social_links[1]) : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Facebook" />
              <input type="url" id="instagram" name="instagram" value="<?= isset($social_links[2]) ? ($social_links[2]) : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Instagram" />
              <input type="url" id="twitter" name="twitter" value="<?= isset($social_links[3]) ? ($social_links[3]) : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Twitter" />
              <input type="url" id="telegram" name="telegram" value="<?= isset($social_links[4]) ? ($social_links[4]) : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Telegram" />
            </div>
            <div class="text-end">
              <button type="button" id="saveBtn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center d">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>

      <!--! Photo section -->
      <div class="hidden w-full h-auto px-3 md:px-28" id="photoSection">
        <div class="w-full text-center p-4">
          <h1 class="font-bold text-xl">Profile</h1>
          <p>
            Add a nice photo of yourself for your profile.Add a nice photo of
            yourself for your profile.
          </p>
        </div>
        <div>
          <form action="../../Controller/UserController.php" method="POST" enctype="multipart/form-data">
            <div class="flex items-center justify-center w-full mb-6">
              <div class="w-[26rem]">
                <div class="mb-2 md:mb-6 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                  <div class="upload-area rounded-md" id="upload-area-photo">
                    <input type="file" name="photo" id="file-input-photo" accept="image/*" required class="hidden">
                    <img id="uploaded-image-photo" alt="Uploaded Image">
                    <div id="upload-text-photo" class="upload-text text-center">
                      <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                      </svg>
                      <p class="mb-2 text-sm text-gray-500">
                        <span class="font-semibold">Click to upload</span> or drag
                        and drop
                      </p>
                      <p class="text-xs text-gray-500">
                        SVG, PNG, JPG or GIF (MAX. 800x400px)
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-end">
              <button type="submit" name="updateProfile" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center d">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>

      <!--! Account Security section -->
      <div class="hidden w-full h-auto px-3 md:px-28" id="accountSection">
        <div class="w-full text-center p-4">
          <h1 class="font-bold text-xl">Profile</h1>
          <p>
            Add a nice photo of yourself for your profile.Add a nice photo of
            yourself for your profile.
          </p>
        </div>

        <form action="#">
          <h1>Basics</h1>
          <div class="grid gap-6 mb-20">
            <input type="email" id="email" value="<?= ($user[0]['email']) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Email" required />
          </div>

          <h1>Password</h1>
          <div class="grid gap-6 mb-10">
            <!-- Old Password -->
            <div class="password-container relative">
              <input type="password" id="old-password" name="old-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter current password" required>
              <?php if (isset($_SESSION['password_err_message'])) : ?>
                <p class="text-[#ff3e3e] text-xs mt-1 absolute"><?php echo $_SESSION['password_err_message'];
                                                                unset($_SESSION['password_err_message']); ?></p>
              <?php endif; ?>
            </div>
            <!-- Password -->
            <div class="password-container relative">
              <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter new password" required>
            </div>
            <!-- Confirm Password -->
            <div class="password-container relative">
              <input type="password" id="confirm-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Re-type new password" required>
            </div>
            <div class="relative mt-1">
              <p id="psMessage" class="absolute text-xs bottom-3"></p>
            </div>
          </div>
          <div class="text-end">
            <button type="button" id="changePs" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center d">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="./js/fileUpload.js"></script>

  <?php if (isset($_SESSION['notification_message'])): ?>
    <script>
      $(document).ready(function() {
        // Call the function to show notification
        showNotification('<?php echo $_SESSION['notification_message']; ?>');
        // Clear the session variables after showing notification
        <?php unset($_SESSION['notification_message']); ?>
      });

      // Show Notification for 2 seconds
      function showNotification(message) {
        const notification = $('#notification');
        const notificationMessage = $('#notificationMessage');
        notificationMessage.text(message);
        notification.removeClass('opacity-0').addClass('opacity-100');
        setTimeout(function() {
          notification.removeClass('opacity-100').addClass('opacity-0');
        }, 2000);
      }
    </script>
  <?php endif; ?>
</body>

</html>