<?php
ini_set('display_errors', '1');

include '../../../Controller/InstituteController.php';
include '../../../Controller/common/CountForEnrollmentPending.php';
include '../../../Controller/GetIndicatorOfInstituteController.php';
$pendingCount = $count;
// url for logo
$baseUrl = 'http://localhost/MEP/storages/uploads/';

function formatNumber($number) {
   if ($number >= 1000) {
       return number_format($number / 1000, 1) . ' K';
   }
   return number_format($number);
}

?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Dashboard</title>
   <!-- Tailwind output css -->
   <link href="./../css/output.css" rel="stylesheet" />
</head>

<body class="bg-gray-300">

   <!-- Navbar -->
   <nav class="fixed top-0 z-10 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 duration-300">
      <div class="px-3 py-3 lg:px-5 lg:pl-3">
         <div class="flex items-center justify-between">
            <div class="ml-64 relative top-2 pl-3">
               <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500  dark:border-gray-700 dark:text-gray-400">
                  <li class="me-2 h-10">
                     <a href="#" class="inline-block text-base p-4 rounded-t-lg hover:dark:bg-gray-600 changes actives">Dashboard Overview</a>
                  </li>
                  <li class="me-2 h-10">
                     <a href="#" class="inline-block p-4 text-base rounded-t-lg hover:dark:bg-gray-600 changes">Finance Overview</a>
                  </li>
               </ul>
            </div>

            <div class="flex items-center">
               <div class="flex items-center">
                  <div class="flex items-center">
                     <a href="http://localhost/MEP/Institute/View/resources/Class/createclass.php">
                        <button type="button" id="dash-add-news" class="relative text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                           <ion-icon name="add-circle-outline" class="w-5 h-5 relative top-1 right-2"></ion-icon>
                           Add New Class
                        </button>
                     </a>
                     <div class="grid grid-cols-3 gap-8 mx-14">
                        <ion-icon name="sunny-outline" class="w-6 h-6 cursor-pointer dark:text-white modechanges"></ion-icon>
                        <a href="http://localhost/MEP/Institute/View/resources/Notification/notification.php">
                           <svg class="w-6 h-6 cursor-pointer dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M427.68 351.43C402 320 383.87 304 383.87 217.35C383.87 138 343.35 109.73 310 96c-4.43-1.82-8.6-6-9.95-10.55C294.2 65.54 277.8 48 256 48s-38.21 17.55-44 37.47c-1.35 4.6-5.52 8.71-9.95 10.53c-33.39 13.75-73.87 41.92-73.87 121.35C128.13 304 110 320 84.32 351.43C73.68 364.45 83 384 101.61 384h308.88c18.51 0 27.77-19.61 17.19-32.57M320 384v16a64 64 0 0 1-128 0v-16" />
                           </svg>
                        </a>
                        <a href="http://localhost/MEP/Institute/View/resources/Setting/setting.php">
                           <svg class="w-6 h-6 cursor-pointer dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="currentColor" fill-rule="evenodd" d="M14.208 4.83q.68.21 1.3.54l1.833-1.1a1 1 0 0 1 1.221.15l1.018 1.018a1 1 0 0 1 .15 1.221l-1.1 1.833q.33.62.54 1.3l2.073.519a1 1 0 0 1 .757.97v1.438a1 1 0 0 1-.757.97l-2.073.519q-.21.68-.54 1.3l1.1 1.833a1 1 0 0 1-.15 1.221l-1.018 1.018a1 1 0 0 1-1.221.15l-1.833-1.1q-.62.33-1.3.54l-.519 2.073a1 1 0 0 1-.97.757h-1.438a1 1 0 0 1-.97-.757l-.519-2.073a7.5 7.5 0 0 1-1.3-.54l-1.833 1.1a1 1 0 0 1-1.221-.15L4.42 18.562a1 1 0 0 1-.15-1.221l1.1-1.833a7.5 7.5 0 0 1-.54-1.3l-2.073-.519A1 1 0 0 1 2 12.72v-1.438a1 1 0 0 1 .757-.97l2.073-.519q.21-.68.54-1.3L4.27 6.66a1 1 0 0 1 .15-1.221L5.438 4.42a1 1 0 0 1 1.221-.15l1.833 1.1q.62-.33 1.3-.54l.519-2.073A1 1 0 0 1 11.28 2h1.438a1 1 0 0 1 .97.757zM12 16a4 4 0 1 0 0-8a4 4 0 0 0 0 8" />
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="flex items-center bg-slate-200 dark:bg-gray-700 rounded-lg cursor-pointer" data-dropdown-toggle="dropdown-user">
                  <div class="flex items-center mx-3">
                     <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false">
                           <span class="sr-only">Open user menu</span>
                           <img class="w-14 h-14 rounded-full select-none" src="<?= $baseUrl . ($institute['photo']) ?>" alt="institute photo">
                        </button>
                     </div>
                     <div class="ml-3 pt-2 dark:text-white">
                        <p class="text-base leading-none select-none"><?= ($institute['name']) ?></p>
                        <p class="text-sm leading-none text-slate-500 select-none dark:text-white dark:text-opacity-50"><?= $institute['institute_type'] ?></p>
                        <div class="flex pt-1 opacity-90">
                           <svg class="w-4 h-4 mt-0.5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                 <path d="M7 13.5a6.5 6.5 0 1 0 0-13a6.5 6.5 0 0 0 0 13" />
                                 <path d="M8.702 5.222a1.332 1.332 0 0 0-1.258-.889H6.412a1.19 1.19 0 0 0-.254 2.353l1.571.344a1.334 1.334 0 0 1-.285 2.637h-.888a1.334 1.334 0 0 1-1.258-.89M7 4.333V3m0 8V9.666" />
                              </g>
                           </svg>
                           <span class="select-none"><?= abs($institute['remaining_coin']) ?></span>
                        </div>
                     </div>
                     <div class="flex items-center ml-6 text-2xl cursor-pointer dark:text-white">
                        <ion-icon name="chevron-down-outline"></ion-icon>
                     </div>
                     <div id="dropdown-user" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-64 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                           <li>
                              <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Guide</a>
                           </li>
                           <li>
                              <a href="http://localhost/MEP/Institute/View/resources/Setting/setting.php" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                           </li>
                           <li>
                              <a href="" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Help Center</a>
                           </li>
                        </ul>
                        <div class="py-2">
                           <a href="http://localhost/MEP/Institute/Controller/LogoutController.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </nav>

   <!-- Sidebar -->
   <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform-translate-x-full bg-white border-r border-gray-200 sm:translate-x-0  dark:border-gray-700 duration-300" aria-label="Sidebar">
      <div class="h-full px-3 overflow-y-auto hide-scrollbar bg-white dark:bg-gray-800 duration-300">
         <div class="flex items-center justify-start rtl:justify-end mb-9 mt-5">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
               </svg>
            </button>
            <a href="./dashoverview.php" class="flex ms-2 md:me-24">
               <img src="./../../../storages/meplogo.png" class="h-12 me-3" alt="MEP Logo" />
               <div class="">
                  <p class="text-sm  font-semibold sm:text-sm dark:text-white">Myanmar Education</p>
                  <p class="text-xl font-black tracking-widest sm:text-3xl dark:text-white uppercase">Portal</p>
               </div>
            </a>
         </div>
         <ul class="space-y-2 font-medium h-[80vh] flex flex-col justify-between sidebar-uls ">
            <div>
               <li class="mb-1.5 bg-[#d9dffc] dark:bg-gray-700 rounded-md sidebarlinks" click-page="dashboard">
                  <a href="javascript:void(0);" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                     </svg>
                     <span class="ms-3">Dashboard</span>
                  </a>
               </li>

               <li class="mb-1.5">
                  <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-class" data-collapse-toggle="dropdown-class">
                     <svg class="w-5 h-5  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 6.25A3.25 3.25 0 0 1 6.25 3h11.5A3.25 3.25 0 0 1 21 6.25v11.5A3.25 3.25 0 0 1 17.75 21h-5.036A4.73 4.73 0 0 0 14 17.75v-3A4.75 4.75 0 0 0 9.25 10h-3c-1.257 0-2.4.488-3.25 1.286zm0 8.5v3A3.25 3.25 0 0 0 6.25 21h3a3.25 3.25 0 0 0 3.25-3.25v-3a3.25 3.25 0 0 0-3.25-3.25h-3A3.25 3.25 0 0 0 3 14.75" />
                     </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Class</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                     </svg>
                  </button>
                  <ul id="dropdown-class" class="hidden py-2 space-y-2">
                     <li class="sidebarlinks" click-page="class-lists">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Class Lists</a>
                     </li>
                     <li class="sidebarlinks" click-page="create-new-class">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Create a New Class</a>
                     </li>
                     <li class="sidebarlinks" click-page="delete-class">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Delete Class</a>
                     </li>
                  </ul>
               </li>

               <li class="mb-1.5">
                  <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-instructor" data-collapse-toggle="dropdown-instructor">
                     <svg class="w-5 h-5  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path fill="currentColor" fill-rule="evenodd" d="M12.402 8.976H7.259a2.278 2.278 0 0 0-.193-4.547h-1.68A3.095 3.095 0 0 0 4.609 0h7.793a1.35 1.35 0 0 1 1.348 1.35v6.279c0 .744-.604 1.348-1.348 1.348ZM2.898 4.431a1.848 1.848 0 1 0 0-3.695a1.848 1.848 0 0 0 0 3.695m5.195 2.276c0-.568-.46-1.028-1.027-1.028H2.899a2.649 2.649 0 0 0-2.65 2.65v1.205c0 .532.432.963.964.963h.172l.282 2.61A1 1 0 0 0 2.66 14h.502a1 1 0 0 0 .99-.862l.753-5.404h2.16c.567 0 1.027-.46 1.027-1.027Z" clip-rule="evenodd" />
                     </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Instructor</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                     </svg>
                  </button>
                  <ul id="dropdown-instructor" class="hidden py-2 space-y-2">
                     <li class="sidebarlinks" click-page="instructor-list">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Instructor List</a>
                     </li>
                     <li class="sidebarlinks" click-page="add-instructor">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Add Instructor</a>
                     </li>
                     <li class="sidebarlinks" click-page="delete-instructor">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Delete Instructor</a>
                     </li>
                  </ul>
               </li>

               <li class="mb-1.5 sidebarlinks" click-page="student-list">
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                        <path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.9 47.9 0 0 1 176 120" />
                     </svg>
                     <span class="ms-3">Student</span>
                  </a>
               </li>

               <li class="b-1.5 sidebarlinks" click-page="enrollment-list">
                  <a href="javascript:void(0);" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="relative -top-0.5 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15 16.69V13h1.5v2.82l2.44 1.41l-.75 1.3zM19.5 3.5L18 2l-1.5 1.5L15 2l-1.5 1.5L12 2l-1.5 1.5L9 2L7.5 3.5L6 2L4.5 3.5L3 2v20l1.5-1.5L6 22l1.5-1.5L9 22l1.58-1.58c.14.19.3.36.47.53A7.001 7.001 0 0 0 21 11.1V2zM11.1 11c-.6.57-1.07 1.25-1.43 2H6v-2zm-2.03 4c-.07.33-.07.66-.07 1s0 .67.07 1H6v-2zM18 9H6V7h12zm2.85 7c0 .64-.12 1.27-.35 1.86c-.26.58-.62 1.14-1.07 1.57c-.43.45-.99.81-1.57 1.07c-.59.23-1.22.35-1.86.35c-2.68 0-4.85-2.17-4.85-4.85c0-1.29.51-2.5 1.42-3.43c.93-.91 2.14-1.42 3.43-1.42c2.67 0 4.85 2.17 4.85 4.85" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Enrollment</span>
                     <span class="flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-300 bg-blue-800 rounded-full dark:bg-blue-900 dark:text-blue-300">
                        <?= $pendingCount ?>
                     </span>
                  </a>
               </li>

               <li class="mb-1.5">
                  <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-event" data-collapse-toggle="dropdown-event">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                     </svg>
                     <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Event</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                     </svg>
                  </button>
                  <ul id="dropdown-event" class="hidden py-2 space-y-2">
                     <li class="sidebarlinks" click-page="event-list">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Event Lists</a>
                     </li>
                     <li class="sidebarlinks" click-page="create-event">
                        <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-[#d9dffc] dark:text-white dark:hover:bg-gray-700">Create Event</a>
                     </li>
                  </ul>
               </li>

               <li class="mb-1.5 sidebarlinks" click-page="history">
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g fill="none">
                           <circle cx="12" cy="12" r="9" fill="currentColor" opacity="0.16" />
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364A9 9 0 1 0 3 12.004V14" />
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 12l2 2l2-2m6-4v5h5" />
                        </g>
                     </svg>
                     <span class="ms-3">History</span>
                  </a>
               </li>
            </div>

            <div>
               <li class="border-t border-t-gray-400 dark:border-t-gray-500 pt-5 mb-1.5 sidebarlinks" click-page="notification">
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M14.5 18q-1.05 0-1.775-.725T12 15.5t.725-1.775T14.5 13t1.775.725T17 15.5t-.725 1.775T14.5 18M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Notification</span>
                     <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-300 bg-blue-800 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                  </a>
               </li>

               <li class="mb-1.5 sidebarlinks" click-page="setting">
                  <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill="currentColor" d="M11.078 0c.294 0 .557.183.656.457l.706 1.957q.379.094.654.192q.3.107.78.33l1.644-.87a.7.7 0 0 1 .832.131l1.446 1.495c.192.199.246.49.138.744l-.771 1.807q.191.352.308.604q.126.273.312.76l1.797.77c.27.115.437.385.419.674l-.132 2.075a.69.69 0 0 1-.46.605l-1.702.605q-.073.352-.154.606a9 9 0 0 1-.298.774l.855 1.89a.68.68 0 0 1-.168.793l-1.626 1.452a.7.7 0 0 1-.796.096l-1.676-.888a7 7 0 0 1-.81.367l-.732.274l-.65 1.8a.7.7 0 0 1-.64.457L9.11 20a.7.7 0 0 1-.669-.447l-.766-2.027a15 15 0 0 1-.776-.29a10 10 0 0 1-.618-.293l-1.9.812a.7.7 0 0 1-.755-.133L2.22 16.303a.68.68 0 0 1-.155-.783l.817-1.78a10 10 0 0 1-.302-.644a14 14 0 0 1-.3-.811L.49 11.74a.69.69 0 0 1-.49-.683l.07-1.921a.69.69 0 0 1 .392-.594L2.34 7.64q.13-.478.23-.748a9 9 0 0 1 .314-.712L2.07 4.46a.68.68 0 0 1 .15-.79l1.404-1.326a.7.7 0 0 1 .75-.138l1.898.784q.314-.209.572-.344q.307-.162.824-.346l.66-1.841A.7.7 0 0 1 8.984 0zm-1.054 7.019c-1.667 0-3.018 1.335-3.018 2.983s1.351 2.984 3.018 2.984s3.017-1.336 3.017-2.984s-1.35-2.983-3.017-2.983" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Settings</span>
                  </a>
               </li>

               <li class="mb-1.5 sidebarlinks" click-page="logout">
                  <a href="http://localhost/MEP/Institute/Controller/LogoutController.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#d9dffc] dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M16.125 12a.75.75 0 0 0-.75-.75H4.402l1.961-1.68a.75.75 0 1 0-.976-1.14l-3.5 3a.75.75 0 0 0 0 1.14l3.5 3 a.75.75 0 1 0 .976-1.14l-1.96-1.68h10.972a.75.75 0 0 0 .75-.75" clip-rule="evenodd" />
                        <path fill="currentColor" d="M9.375 8c0 .702 0 1.053.169 1.306a1 1 0 0 0 .275.275c.253.169.604.169 1.306.169h4.25a2.25 2.25 0 0 1 0 4.5h-4.25c-.702 0-1.053 0-1.306.168a1 1 0 0 0-.275.276c-.169.253-.169.604-.169 1.306c0 2.828 0 4.243.879 5.121c.878.879 2.292.879 5.12.879h1c2.83 0 4.243 0 5.122-.879c.879-.878.879-2.293.879-5.121V8c0-2.828 0-4.243-.879-5.121C20.617 2 19.203 2 16.375 2h-1c-2.829 0-4.243 0-5.121.879c-.879.878-.879 2.293-.879 5.121" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                  </a>
               </li>
            </div>
         </ul>
      </div>
   </aside>

   <!-- Data Area Dashboard Overview-->
   <div class="block pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-800 dashoverviews">
      <div class="flex items-center mb-4 gap-5 mt-10">
         <!-- <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
               <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg text-gray-600 hover:text-black dark:text-gray-300 hover:border-gray-300 dark:hover:text-white">Day</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">Week</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2  border-b-2 border-transparent rounded-t-lg dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Month</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg  dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Year</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2  rounded-t-lg  dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Custom</a>
            </li>
         </ul> -->
      </div>
      <div class="grid grid-cols-8 gap-4">
         <div class="col-span-4 gap-4">
            <div class="grid grid-cols-3 gap-4">
               <div class="bg-white rounded-lg px-5 dark:bg-gray-600 duration-500">
                  <div class="px-10 pb-5">
                     <p class="text-xl mt-2.5 mb-3 dark:text-white opacity-50 whitespace-nowrap">Total Classes</p>
                     <div class="flex justify-end">
                        <p class="text-2xl font-bold mt-3 text-blue-700 dark:text-blue-400 opacity-90">
                           <?= $totalclasses ? $totalclasses : 0 ?>
                        </p>
                        <!-- <div class="flex items-center text-green-500">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21.71 7.29a1 1 0 0 0-1.42 0L14 13.59l-4.29-4.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 11.41l4.29 4.3a1 1 0 0 0 1.42 0l7-7a1 1 0 0 0 0-1.42" />
                        </svg>
                        <span class="mt-3">+15%</span>
                     </div> -->
                     </div>
                  </div>
               </div>
               <div class="bg-white rounded-lg px-5 dark:bg-gray-600 duration-500">
                  <div class="px-10 pb-5">
                     <p class="text-xl mt-2.5 mb-3 dark:text-white opacity-50 whitespace-nowrap">Total Students</p>
                     <div class="flex justify-end">
                        <p class="text-2xl font-bold mt-3 text-blue-700 dark:text-blue-400 opacity-90">
                           <?= $totalstudents ? $totalstudents : 0 ?>
                        </p>
                        <!-- <div class="flex items-center text-green-500">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21.71 7.29a1 1 0 0 0-1.42 0L14 13.59l-4.29-4.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 11.41l4.29 4.3a1 1 0 0 0 1.42 0l7-7a1 1 0 0 0 0-1.42" />
                        </svg>
                        <span class="mt-3">+15%</span>
                     </div> -->
                     </div>
                  </div>
               </div>
               <div class="bg-white rounded-lg px-5 dark:bg-gray-600 duration-500">
                  <div class="px-10 pb-5">
                     <p class="text-xl mt-2.5 mb-3 dark:text-white opacity-50 whitespace-nowrap">Total Instructors</p>
                     <div class="flex justify-end">
                        <p class="text-2xl font-bold mt-3 text-blue-700 dark:text-blue-400 opacity-90">
                           <?= $totalinstructors ? $totalinstructors : 0 ?>
                        </p>
                        <!-- <div class="flex items-center text-green-500">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21.71 7.29a1 1 0 0 0-1.42 0L14 13.59l-4.29-4.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 11.41l4.29 4.3a1 1 0 0 0 1.42 0l7-7a1 1 0 0 0 0-1.42" />
                        </svg>
                        <span class="mt-3">+15%</span>
                     </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg-white col-span-4 row-span-4 rounded-lg px-4 py-2 dark:bg-gray-600 duration-500">
            <h3 class="font-bold dark:text-white mb-3 mt-4">Popular Classes</h3>
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 duration-500 dark:text-gray-400">
                     <tr>
                        <th scope="col" class="p-4">
                           ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CLASS TITLE
                        </th>
                        <th scope="col" class="px-6 py-3">
                           INSTRUCTOR
                        </th>
                        <th scope="col" class="px-6 py-3">
                           ENROLLED
                        </th>
                        <th scope="col" class="px-6 py-3">
                           FEE
                        </th>
                        <th scope="col" class="px-6 py-3">
                           ACTION
                        </th>
                     </tr>
                  </thead>
                  <tbody id="table-body">
                     <!-- data her -->
                  </tbody>
               </table>
               <div class="flex justify-end ">
                  <a href="http://localhost/MEP/Institute/View/resources/Class/classlist.php" class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></a>
               </div>
            </div>
         </div>
         <div class="bg-white col-span-4 row-span-3 rounded-lg px-4 py-2 dark:bg-gray-600 duration-300 pt-14">
            <div>
               <canvas id="trendingchart"></canvas>
            </div>
         </div>
         <div class="bg-white rounded-lg col-span-2 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
            <h3 class="text-black dark:text-white mb-8 mt-4">Student Demographics by Age</h3>
            <div class="w-full flex justify-center">
               <div class="demochart dark:text-white">
                  <canvas id="studemochart"></canvas>
               </div>
            </div>
         </div>
         <div class="bg-white rounded-lg col-span-2 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
            <h3 class="text-black dark:text-white mb-4 mt-4">Upcoming Event</h3>
            <!-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                     <tr>
                        <th scope="col" class="px-6 py-3">
                           EVENT TITLE & TYPE
                        </th>
                        <th scope="col" class="px-6 py-3">
                           INSTRUCTOR
                        </th>
                        <th scope="col" class="px-6 py-3">
                           DATE/TIME
                        </th>
                        <th scope="col" class="px-6 py-3">
                           ACTION
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                           Understanding Cloud Computing in 2024 <span>(Webinar)</span>
                        </th>
                        <td class="px-6 py-4">
                           Mr.Matthwe Davis
                        </td>
                        <td class="px-6 py-4">
                           July 29, 2024 9:00 AM
                        </td>
                        <td class="px-6 py-4 underline text-blue-700">
                           View
                        </td>
                     </tr>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                           Understanding Cloud Computing in 2024 <span>(Webinar)</span>
                        </th>
                        <td class="px-6 py-4">
                           Mr.Matthwe Davis
                        </td>
                        <td class="px-6 py-4">
                           July 29, 2024 9:00 AM
                        </td>
                        <td class="px-6 py-4 underline text-blue-700">
                           View
                        </td>
                     </tr>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                           Understanding Cloud Computing in 2024 <span>(Webinar)</span>
                        </th>
                        <td class="px-6 py-4">
                           Mr.Matthwe Davis
                        </td>
                        <td class="px-6 py-4">
                           July 29, 2024 9:00 AM
                        </td>
                        <td class="px-6 py-4 underline text-blue-700">
                           View
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div> -->
            <!-- <div class="flex justify-end ">
               <button class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></button>
            </div> -->
         </div>
         <div class="bg-white rounded-lg col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
            <h3 class="font-bold dark:text-white mb-4 mt-4">Top 5 Instructors</h3>
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 duration-500 dark:text-gray-400">
                     <tr>
                        <th scope="col" class="p-4">
                           NO
                        </th>
                        <th scope="col" class="px-6 py-3">
                           FULLNAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                           GENDER
                        </th>
                        <th scope="col" class="px-6 py-3">
                           PROFESSIONAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CLASS COUNT
                        </th>
                        <th scope="col" class="px-6 py-3">
                           ACTION
                        </th>
                     </tr>
                  </thead>
                  <tbody id="table-body-instructor">
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                           1.
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Emma Johnson
                        </th>
                        <td class="px-6 py-4">
                           Female
                        </td>
                        <td class="px-6 py-4">
                           Software Engineer
                        </td>
                        <td class="px-6 py-4">
                           Class Count
                        </td>
                        <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                           View
                        </td>
                     </tr>
                  </tbody>
               </table>
               <div class="flex justify-end">
                  <a href="http://localhost/MEP/Institute/View/resources/Instructor/instructorlist.php">
                     <button class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></button>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Data Area Finance Overview -->
   <div class="hidden pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-800 finaoverviews">
      <div class="flex items-center mb-4 gap-5 mt-10">
         <!-- <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
               <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Day</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">Week</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Month</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2 border-b-2 border-transparent rounded-t-lg  dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Year</a>
            </li>
            <li class="me-2">
               <a href="#" class="inline-block p-2  rounded-t-lg  dark:text-gray-300  text-gray-600 hover:text-black hover:border-gray-300 dark:hover:text-white">Custom</a>
            </li>
         </ul> -->
      </div>
      <div class="grid grid-cols-8 gap-4">
         <div class="col-span-4 grid grid-cols-3 gap-4">
            <div class="bg-white rounded-lg px-5 py-2 dark:bg-gray-600 duration-500 flex items-center">
               <div class="w-full">
                  <p class="text-xl text-center mb-3 dark:text-white opacity-50">Cash Income</p>
                  <div class="flex justify-end">
                     <p class="text-2xl text-blue-700 dark:text-blue-400 font-bold mt-3">
                        <?php echo formatNumber($total_cash); ?>
                     </p>
                     <!-- <div class="flex items-center text-green-500">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21.71 7.29a1 1 0 0 0-1.42 0L14 13.59l-4.29-4.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 11.41l4.29 4.3a1 1 0 0 0 1.42 0l7-7a1 1 0 0 0 0-1.42" />
                        </svg>
                        <span class="mt-3">+15%</span>
                     </div> -->
                  </div>
               </div>
            </div>
            <div class="bg-white rounded-lg px-5 dark:bg-gray-600 duration-500 flex items-center">
               <div class="w-full">
                  <p class="text-xl text-center mb-3 dark:text-white opacity-50">Coin Income</p>
                  <div class="flex justify-end">
                     <p class="text-2xl text-blue-700 dark:text-blue-400 font-bold mt-3">
                        <?php echo $total_coin; ?>
                     </p>
                     <!-- <div class="flex items-center text-green-500">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21.71 7.29a1 1 0 0 0-1.42 0L14 13.59l-4.29-4.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 11.41l4.29 4.3a1 1 0 0 0 1.42 0l7-7a1 1 0 0 0 0-1.42" />
                        </svg>
                        <span class="mt-3">+10%</span>
                     </div> -->
                  </div>
               </div>
            </div>
            <div class="bg-white rounded-lg px-5 dark:bg-gray-600 duration-500 flex items-center">
               <div class="w-full">
                  <p class="text-xl text-center mb-3 dark:text-white opacity-50">Total Income</p>
                  <div class="flex justify-end">
                     <p class="text-2xl text-blue-700 dark:text-blue-400 font-bold mt-3">
                     <?php echo formatNumber($tatal_amount); ?>
                     </p>
                     <!-- <div class="flex items-center text-green-500">
                        <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M21.71 7.29a1 1 0 0 0-1.42 0L14 13.59l-4.29-4.3a1 1 0 0 0-1.42 0l-6 6a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0L9 11.41l4.29 4.3a1 1 0 0 0 1.42 0l7-7a1 1 0 0 0 0-1.42" />
                        </svg>
                        <span class="mt-3">+8%</span>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="bg-white col-span-4 row-span-4 rounded-lg px-4 py-2 dark:bg-gray-600 duration-500">
            <h3 class="font-bold dark:text-white mb-3 mt-5">Recent Enrollments</h3>
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 duration-500 dark:text-gray-400">
                     <tr>
                        <th scope="col" class="px-6 py-3">
                           Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                           NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CLASS TITLE
                        </th>
                        <th scope="col" class="px-6 py-3">
                           AMOUNT
                        </th>
                        <th scope="col" class="px-6 py-3">
                           PAYMENT TYPE
                        </th>
                     </tr>
                  </thead>
                  <tbody id="table-body-recent-enrollments">
                     <!-- data here -->
                  </tbody>
               </table>
            </div>
         </div>
         <div class="bg-white col-span-4 row-span-3 rounded-lg px-4 py-2 dark:bg-gray-600 duration-300 pt-14">
            <div>
               <canvas id="monthlyrevenuechart"></canvas>
            </div>
         </div>
      
         <div class="bg-white col-span-4 row-span-4 rounded-lg px-4 py-2 dark:bg-gray-600 duration-300 pt-14">
            <div>
               <canvas id="monthlycoinusage"></canvas>
            </div>
         </div>

         <div class="bg-white rounded-lg col-span-4 row-span-4 px-4 py-2 dark:bg-gray-600 duration-300">
            <h3 class="font-bold dark:text-white mb-4 mt-5">Today Coin Usage</h3>
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 duration-500 dark:text-gray-400">
                     <tr>
                        <th scope="col" class="px-6 py-3">
                           No
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CLASS TITLE
                        </th>
                        <th scope="col" class="px-6 py-3">
                           COIN AMOUNT
                        </th>
                        <th scope="col" class="px-6 py-3">
                           CLASS FEES
                        </th>
                        <th scope="col" class="px-6 py-3">
                           ACTION
                        </th>
                     </tr>
                  </thead>
                  <tbody id="today-coin-usage">
                     <!-- data here -->
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <!-- ionicons icons -->
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <!-- flowbite -->
   <script src="./../lib/flowbite.min.js" type="text/javascript"></script>
   <!-- jQuery -->
   <script src="./../lib/jquery-3.7.1.min.js" type="text/javascript"></script>
   <!-- chartjs -->
   <script src="./../lib/chart.js" type="text/javascript"></script>
   <!-- datatable -->
   <script src="./../lib/dataTables.js"></script>
   <!-- darkmode lightmode sidebar js -->
   <script src="./../js/darkandlight.js" type="text/javascript"></script>
   <!-- path -->
   <script src="./../js/path.js" type="text/javascript"></script>
   <!-- customjs -->
   <script src="./../js/dashoverview.js" type="text/javascript"></script>
</body>

</html>