<?php
ini_set('display_errors', '1');
// include '../../Controller/SitemasterController.php';
include '../../Controller/PricesPlanController.php';
include '../../Controller/UserController.php';
// include '../../Controller/SlotController.php';

$userId = isset($_COOKIE['user_id']) ? $_COOKIE['user_id'] : null;
$instituteId = isset($_COOKIE['institute_id']) ? $_COOKIE['institute_id'] : null;

$baseUrl = 'http://localhost/MEP/storages/uploads/';

$userPrices = array_filter($prices, function ($price) {
    return $price['scope'] === 'user';
});


// $institutePrices = array_filter($prices, function ($price) {
//     return $price['scope'] === 'institute';
// });

// $homeContents = array_filter($sites, function ($site) {
//     return $site['page_name'] === 'Home';
// });

// $aboutContents = array_filter($sites, function ($site) {
//     return $site['page_name'] === 'About Us';
// });

// $serviceContents = array_filter($sites, function ($site) {
//     return $site['page_name'] === 'Service';
// });
// echo "<pre>";
// print_r($serviceContents);
// echo "<pre>";
// print_r($institutePrices);

// Separate home contents of title
// $titleText = $homeContents[1]['title'];
// Split the text into title and subtitle based on the delimiter
// $delimiter = 'with ';
// $parts = explode($delimiter, $titleText, 2);

// Handle cases where the delimiter might not be found
// $title = $parts[0] ?? $titleText;
// $subtitle = isset($parts[1]) ? $delimiter . $parts[1] : '';


// For service svgs
// $svgId = 0;
// $svgs = [
//     '<svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.9 47.9 0 0 1 176 120"/></svg>',
//     '<svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path d="M44 8H4v30h15l5 5l5-5h15z"/><circle cx="24" cy="19" r="5" fill="currentColor"/><path d="M33 32c0-4.418-4.03-8-9-8s-9 3.582-9 8"/></g></svg>',
//     '<svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12.005 13.003a3 3 0 0 1 2.08 5.162l-1.91 1.837h2.83v2h-6l-.001-1.724l3.694-3.555a1 1 0 1 0-1.693-.72h-2a3 3 0 0 1 3-3m6 0v4h2v-4h2v9h-2v-3h-4v-6zm-14-1a7.99 7.99 0 0 0 3 6.246v2.416a10 10 0 0 1-5-8.662zm8-10c5.185 0 9.449 3.946 9.95 9h-2.012a8.001 8.001 0 0 0-14.554-3.5h2.616v2h-6v-6h2v2.499a9.99 9.99 0 0 1 8-4"/></svg>',
//     '<svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 8H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h1v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h3l5 4V4zm9.5 4c0 1.71-.96 3.26-2.5 4V8c1.53.75 2.5 2.3 2.5 4"/></svg>',
//     '<svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" d="m665.216 768l110.848 192h-73.856L591.36 768H433.024L322.176 960H248.32l110.848-192H160a32 32 0 0 1-32-32V192H64a32 32 0 0 1 0-64h896a32 32 0 1 1 0 64h-64v544a32 32 0 0 1-32 32zM832 192H192v512h640zM352 448a32 32 0 0 1 32 32v64a32 32 0 0 1-64 0v-64a32 32 0 0 1 32-32m160-64a32 32 0 0 1 32 32v128a32 32 0 0 1-64 0V416a32 32 0 0 1 32-32m160-64a32 32 0 0 1 32 32v192a32 32 0 1 1-64 0V352a32 32 0 0 1 32-32"/></svg>',
//     '<svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M1.5 0A1.5 1.5 0 0 0 0 1.5v6A1.5 1.5 0 0 0 1.5 9h11A1.5 1.5 0 0 0 14 7.5v-6A1.5 1.5 0 0 0 12.5 0zm6.125 1.454a.625.625 0 1 0-1.25 0v.4a1.532 1.532 0 0 0-.15 3.018l1.197.261a.39.39 0 0 1-.084.773h-.676a.39.39 0 0 1-.369-.26a.625.625 0 0 0-1.178.416c.194.55.673.965 1.26 1.069v.415a.625.625 0 1 0 1.25 0V7.13a1.641 1.641 0 0 0 .064-3.219L6.492 3.65a.281.281 0 0 1 .06-.556h.786a.388.388 0 0 1 .369.26a.625.625 0 1 0 1.178-.416a1.64 1.64 0 0 0-1.26-1.069zM2.75 3.75a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5m8.5 0a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5M4.5 9.875c.345 0 .625.28.625.625v2a.625.625 0 1 1-1.25 0v-2c0-.345.28-.625.625-.625m5.625.625a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0zm-2.5.75a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0z" clip-rule="evenodd"/></svg>'
// ];

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEP - Pricing</title>
    <!-- Swiper Slider css1 js1 -->
    <link rel="stylesheet" href="./lib/swiper-bundle.min.css" type="text/css" />
    <!-- AOS scroll animation css1 js1 -->
    <link rel="stylesheet" href="./lib/aos.css" type="text/css">
    <!-- Tailwind output css -->
    <link href="./css/output.css" rel="stylesheet" />
</head>

<body class="relative">
    <!-- start navbar -->
    <nav class="bg-white fixed w-[100%] top-0 left-0 border-b border-gray-200 md:h-18 md:py-1 z-50">
        <div class="md:px-32 flex items-center justify-between mx-auto px-4 relative">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="./img/LOGO.svg" class="md:h-14 h-10" alt="MEP Logo" />
            </a>

            <button onclick="menuForMobile()" data-collapse-toggle="menuList" type="button" class="inline-flex text-primaryColor hover:text-slate-800 flex-col items-center p-2 w-10 mx-3 h-full justify-center text-sm rounded-lg md:hidden" aria-controls="navbar-default" aria-expanded="false">
                <p class="font-bold">Detail Class</p>
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
                        <a href="./pricing.php" id="userSchedule" aria-active="true" class="block w-full md:w-auto text-center py-2 px-6 aria-[active=true]:bg-primaryColor aria-[active=true]:text-white text-black rounded-xl hover:text-primaryColor">Pricing</a>
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
    </header>
    <!-- End Header Section -->

    <!-- Start Plan & Pricing Section -->
    <section class="pricing-shows md:mx-32 md:mt-36 mt-12 md:pb-16 pb-8 relative h-full overflow-hidden">
        <!-- Dropdown -->
        <div>
            <div class="flex justify-center items-center md:mb-16 mb-8">
                <div>
                    <span class="md:text-2xl text-xl text-center font-semibold md:mb-5 text-indigo-900">Plan & Pricing</span>
                </div>
            </div>
        </div>

        <!-- User Pricing -->
        <div class="swiper-container w-full py-[50px]">
            <div class="swiper-wrapper md:flex md:justify-center md:items-center md:gap-11">
                <!-- pricing card 1 -->
                <div class="swiper-slide bg-center b    g-cover w-[300px] md:w-[450px] h-auto md:h-auto">
                    <div class="pricing-box w-full h-full">
                        <div class="w-full md:h-[60vh] h-[50vh] rounded-xl border-2 border-gray-300 border-t-0 shadow-lg relative swiper-slide">
                            <div class="flex justify-center items-center md:mt-8 mt-4 absolute md:-top-24 -top-14 left-1/2 -translate-x-1/2">
                                <div class="md:w-80 md:h-24 w-60 h-20 rounded-xl bg-indigo-800 flex flex-col justify-center items-center shadow-lg">
                                    <p class="text-gray-400 md:text-base text-sm">Basic</p>
                                    <h1 class="text-white font-semibold md:text-2xl text-xl">Free</h1>
                                    <small class="text-gray-200 text-xs">Free To Use</small>
                                </div>
                            </div>
                            <div class="flex justify-start md:px-16 md:mt-3 md:pt-14 pt-14 px-10">
                                <ul class="space-y-4 text-left text-gray-800 flex flex-col gap-2">
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Can search and view info of institute and class</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Get 3 times consultations in one month</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Community chat</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Event (For Free)</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex justify-center absolute md:bottom-4 bottom-2 left-1/2 -translate-x-1/2">
                                <button type="button" class="text-white md:w-80 w-60 bg-gray-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base md:text-xl px-10 md:px-5 py-3 mb-2 cursor-pointer" disabled>In Use</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pricing card 2 -->
                <div class="swiper-slide bg-center bg-cover w-[300px] md:w-[450px] h-auto md:h-auto">
                    <div class="pricing-box w-full h-full">
                        <div class="w-full md:h-[60vh] h-[50vh] rounded-xl border-2 border-gray-300 border-t-0 shadow-lg relative swiper-slide">
                            <div class="flex justify-center items-center md:mt-8 mt-4 absolute md:-top-24 -top-14 left-1/2 -translate-x-1/2">
                                <div class="md:w-80 md:h-24 w-60 h-20 rounded-xl bg-indigo-800 flex flex-col justify-center items-center shadow-lg">
                                    <p class="text-gray-400 md:text-base text-sm">Pro</p>
                                    <h1 class="text-white font-semibold md:text-2xl text-xl"><?= number_format($userPrices[0]['amount'], 0, '', ','); ?> MMK</h1>
                                    <small class="text-gray-200 text-xs">One Time Payment</small>
                                </div>
                            </div>
                            <div class="flex justify-start md:px-16 md:mt-3 md:pt-14 pt-14 px-10">
                                <ul class="space-y-4 text-left text-gray-800 flex flex-col gap-2">
                                    <p class="md:pl-6">Everything in Basic and :</p>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Receive 1000 point each month</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Unlimited consultations</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Support services</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Schedule</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Access all events</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Coupon codes</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex justify-center absolute md:bottom-4 bottom-2 left-1/2 -translate-x-1/2">
                                <button type="button" class="text-white md:w-80 w-60 bg-indigo-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base md:text-xl px-10 md:px-5 py-3 mb-2" <?= ($userId) ? '' : 'disabled'; ?>>Upgrade Pro</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pricing card 3 -->
                <div class="swiper-slide bg-center bg-cover w-[300px] md:w-[450px] h-auto md:h-auto">
                    <div class="pricing-box w-full h-full">
                        <div class="w-full md:h-[60vh] h-[50vh] rounded-xl border-2 border-gray-300 border-t-0 shadow-lg relative swiper-slide">
                            <div class="flex justify-center items-center md:mt-8 mt-4 absolute md:-top-24 -top-14 left-1/2 -translate-x-1/2">
                                <div class="md:w-80 md:h-24 w-60 h-20 rounded-xl bg-indigo-800 flex flex-col justify-center items-center shadow-lg">
                                    <p class="text-gray-400 md:text-base text-sm">500 Coins</p>
                                    <h1 class="text-white font-semibold md:text-2xl text-xl"><?= number_format($userPrices[1]['amount'], 0, '', ','); ?> MMK</h1>
                                    <small class="text-gray-200 text-xs">Unlimited buy</small>
                                </div>
                            </div>
                            <div class="flex justify-start md:px-16 md:mt-3 md:pt-14 pt-14 px-10">
                                <ul class="space-y-4 text-left text-gray-800 flex flex-col gap-2">
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Can buy unlimited</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Events</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Enroll class (Verifed User) </span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                        <span>Event (For Free)</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex justify-center absolute md:bottom-4 bottom-2 left-1/2 -translate-x-1/2">
                                <button type="button" class="text-white md:w-80 w-60 bg-indigo-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base md:text-xl px-10 md:px-5 py-3 mb-2" <?= ($userId) ? '' : 'disabled'; ?>>Buy now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination block md:hidden"></div>
        </div>

    </section>
    <!-- End Plan & Pricing Section -->

    <!-- Start Footer Section -->
    <footer class="bg-blue-900 text-white md:px-32 py-8 px-4 mt-10">
        <div class="w-full">
            <div class="grid grid-cols-12">
                <div class="text-center md:text-left mb-4 md:mb-0 col-span-3">
                    <a href="https://flowbite.com/" class="flex items-start md:items-center justify-start space-x-3 rtl:space-x-reverse mb-4 md:mb-0">
                        <img src="./../../../storages/logo-white.svg" class="h-12" alt="Flowbite Logo">
                    </a>
                    <p class="mt-2 md:text-lg text-xs hidden md:block">“Join MEP, Your Path To Success”</p>
                    <div class="block md:hidden">
                        <div class="flex flex-col items-start space-y-1.5">
                            <a href="home" class="text-white md:text-lg text-sm hover:text-blue-400">Home</a>
                            <a href="about-us" class="text-white md:text-lg text-sm">About</a>
                            <a href="services" class="text-white">Services</a>
                            <a href="price-plan" class="text-white">Price Plan</a>
                            <a href="contact-us" class="text-white">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="my-0 text-center col-span-7">
                    <div class="hidden md:flex justify-center md:space-x-32 mb-6">
                        <a href="home" class="text-white md:text-lg text-sm hover:text-blue-400">Home</a>
                        <a href="about-us" class="text-white md:text-lg text-sm hover:text-blue-400">About</a>
                        <a href="services" class="text-white md:text-lg text-sm hover:text-blue-400">Services</a>
                        <a href="price-plan" class="text-white md:text-lg text-sm hover:text-blue-400">Price Plan</a>
                        <a href="contact-us" class="text-white md:text-lg text-sm hover:text-blue-400">Contact Us</a>
                    </div>
                    <div>
                        <p class="mt-3 md:text-sm text-xs block md:hidden md:mb-8 mb-10">“Join MEP, Your Path To Success”</p>
                        <p class="md:text-lg text-sm font-semibold md:mb-2 mb-3 md:mt-10 ">Navigate Your Future with Us</p>
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="col-span-2 justify-center md:mt-5">
                                <input type="email" class="px-2 md:py-3 py-2.5 md:w-60 w-40 md:mb-0 mb-4 rounded-l-md md:rounded-r-none rounded-r-lg text-black focus:outline-none focus:ring-1 mr-1" placeholder="email">
                                <button class="bg-white text-blue-600 px-4 md:py-3 py-2.5 rounded-r-md md:rounded-l-none rounded-l-lg">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col col-span-2 md:flex-row justify-start space-y-6 md:justify-end items-end space-x-4 mt-10 md:mt-0">
                    <a href="https://facebook.com" class="text-white">
                        <svg class="md:w-10 md:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                            <path fill="#1877f2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                            <path fill="#fff" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z" />
                        </svg>
                    </a>
                    <a href="https://instagram.com" class="text-white">
                        <svg class="md:w-10 md:h-10 w-8 h-8 md:mx-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                            <g fill="none">
                                <rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60" />
                                <rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60" />
                                <path fill="#fff" d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396s-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413s.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5s6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355s22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334s-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334" />
                                <defs>
                                    <radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1" gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fd5" />
                                        <stop offset=".1" stop-color="#fd5" />
                                        <stop offset=".5" stop-color="#ff543e" />
                                        <stop offset="1" stop-color="#c837ab" />
                                    </radialGradient>
                                    <radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1" gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#3771c8" />
                                        <stop offset=".128" stop-color="#3771c8" />
                                        <stop offset="1" stop-color="#60f" stop-opacity="0" />
                                    </radialGradient>
                                </defs>
                            </g>
                        </svg>
                    </a>
                    <a href="https://twitter.com" class="text-white">
                        <svg class="md:w-10 md:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 128 128">
                            <path d="M75.916 54.2L122.542 0h-11.05L71.008 47.06L38.672 0H1.376l48.898 71.164L1.376 128h11.05L55.18 78.303L89.328 128h37.296L75.913 54.2ZM60.782 71.79l-4.955-7.086l-39.42-56.386h16.972L65.19 53.824l4.954 7.086l41.353 59.15h-16.97L60.782 71.793Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="md:mt-8 text-center md:text-left">
            <div class="flex flex-row justify-between items-center w-full">
                <p class="md:text-sm text-xs text-gray-400 md:mt-0 mt-4">Myanmar Education Portal © 2024</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="privacyPolicy.php" class="md:text-sm text-xs text-gray-400">Privacy Policy</a>
                    <a href="feedback.php" class="md:text-sm text-xs text-gray-400">Feedback</a>
                    <a href="support.php" class="md:text-sm text-xs text-gray-400">FAQ</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- ionicons icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- flowbite js1-->
    <script src="./lib/flowbite.min.js" type="text/javascript"></script>
    <!-- swiper slider css1 js1 -->
    <script src="./lib/swiper-bundle.min.js" type="text/javascript"></script>
    <!-- aos scroll animation css1 js1 -->
    <script src="./lib/swiper-bundle.min.js" type="text/javascript"></script>
    <!-- jQuery js1-->
    <script src="./lib/jquery-3.7.1.js" type="text/javascript"></script>
    <!-- nav js1 -->
    <script src="./js/navbar.js" type="text/javascript"></script>
    <!-- customjs -->
    <script src="./js/pricing.js" type="text/javascript"></script>

</body>

</html>