<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MEP - Home</title>
    <!-- Swiper Slider css1 js1 -->
    <link rel="stylesheet" href="./lib/swiper-bundle.min.css" type="text/css" />
    <!-- AOS scroll animation css1 js1 -->
    <link rel="stylesheet" href="./lib/aos.css" type="text/css">
    <!-- Tailwind output css -->
    <link href="./css/output.css" rel="stylesheet" />
</head>

<body class="relative">
    <!-- Up Icon -->
    <div class="flex justify-center items-center fixed z-50 right-10 bottom-10">
        <svg class="md:w-20 md:h-20 w-14 h-14 text-gray-500 hover:text-gray-700 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m14.5 13.25l-2.5-2.5l-2.5 2.5"/><path d="M6 5h12a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V9a4 4 0 0 1 4-4"/></g></svg>
    </div>
    <!-- Start Header Section -->
    <header class="">
        <!-- start navbar -->
        <nav class="bg-white dark:bg-blue-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600 ">
            <div class="flex flex-wrap items-center justify-between p-4 md:px-32">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="../../../storages/logo-white.svg" class="h-10 md:h-12" alt="MEP Logo">
                </a>
                <div class="md:hidden md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col gap-4 p-4 md:p-0 mt-4 text-lg font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                        <li class="flex items-center justify-center">
                            <a href="#" class="block w-full text-center py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li class="flex items-center justify-center">
                            <a href="#" class="block w-full text-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li class="flex items-center justify-center">
                            <a href="#" class="block w-full text-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li class="flex items-center justify-center">
                            <a href="#" class="block w-full text-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                        <li class="flex items-center justify-center">
                            <a href="#" class="block w-full text-center py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Price Plan</a>
                        </li>
                        <li class="flex items-center justify-center mt-5 md:mt-0" >
                            <button type="button" id="join-now-btn"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Join Now</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->

        <!-- start banner -->
        <div class="md:h-[100vh] grid grid-cols-1 gap-10 md:grid-cols-2 pt-28 md:pt-36 md:px-32 ">
            <div class="flex justify-center items-center px-5">
                <div>
                    <div class="flex justify-center items-center md:hidden">
                        <svg class="relative bottom-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m10 7l-2 4h3v6H5v-6l2-4zm8 0l-2 4h3v6h-6v-6l2-4z"/></svg>
                        <p class="text-xl mb-3">Join MEP, Your Path To Success</p>
                        <svg class="relative bottom-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3z"/></svg>
                    </div>
                    <img src="../../storages/mainpic.jpg" class="md:pt-28" alt="main-pic" />
                </div>  
            </div>
            <div class="flex justify-start items-center px-5 md:px-0">
                <div>
                    <h1 class="md:text-4xl text-2xl font-semibold mb-1 md:mb-2">Unlock Your Potential</h1>
                    <h1 class="md:text-5xl text-2xl font-semibold text-blue-700 md:mb-3 mb-2">With MEP</h1>
                    <p class="text-base md:text-lg mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt deleniti expedita, architecto quia nam beatae voluptatem quasi! Repellat assumenda iste aliquam praesentium veniam inventore quis, eveniet corporis excepturi porro debitis.</p>
                    <div class="flex justify-end md:mt-5 lg:mb-12">
                        <button id="get-started-btn" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-base px-5 py-3 me-2 md:mb-10 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get Started</button>
                    </div>
                </div>  
            </div>
            <div class="md:relative md:bottom-48 bg-gray-400 md:bg-transparent md:col-start-2 pt-10 mb-32 md:mb-0">
                <div>
                    <h1 class="md:text-3xl text-xl md:hidden block text-center font-black">Let Us Build The bridge Between</h1>
                    <h2 class="md:text-3xl text-xl text-blue-700 md:hidden block text-center font-bold">You & Your Career</h2>
                </div>
                <div class="flex gap-5 justify-center md:justify-normal md:gap-10 md:col-start-2 relative top-5 md:relative md:bottom-44 md:bg-none px-5 md:pt-0">

                    <div class="md:w-44 w-40 md:h-36 h-24 bg-gray-300 rounded-xl flex justify-center items-center">
                        <div>
                            <p class="text-blue-700 text-2xl md:text-3xl font-bold text-center">20K +</p>
                            <p class="text-gray-500 text-lg md:text-xl text-center">Users</p>
                        </div>
                    </div>
                    <div class="relative top-10 md:top-0 md:w-44 w-40 md:h-36 h-24 bg-gray-300 rounded-xl flex justify-center items-center">
                        <div>
                            <p class="text-blue-700 text-2xl md:text-3xl font-bold text-center">10K +</p>
                            <p class="text-gray-500 text-lg md:text-xl text-center">Institutes</p>
                        </div>
                    </div>
                    <div class="md:w-44 w-40 md:h-36 h-24 bg-gray-300 rounded-xl flex justify-center items-center">
                        <div>
                            <p class="text-blue-700 text-2xl md:text-3xl font-bold text-center">100%</p>
                            <p class="text-gray-500 text-lg md:text-xl text-center">Verified</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end banner -->
    </header>
    <!-- End Header Section -->

    <!-- Start Our Latest Pick Section -->
    <section class="mb-20 md:mb-0 md:mt-10 md:px-32">
        <div class="flex justify-center items-center md:mb-14 mb-5">
            <div class="md:w-14 w-8 h-1 relative md:bottom-2 md:mr-5 mr-2 md:bg-blue-700 bg-blue-700 inline-block rounded-lg"></div>
            <div class="flex items-start">
                <span class="md:text-2xl text-xl relative md:bottom-2 font-bold md:mr-5 mr-3">Our</span>
                <span class="md:text-2xl text-xl relative md:bottom-2 font-semibold tracking-wider text-blue-700">Latest Pick</span>
            </div>
        </div>
        <div id="default-carousel" class="relative w-full md:h-[67vh] h-[31vh] md:mb-32 md:px-20 px-10" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden -z-10 rounded-lg md:h-[60vh]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out md:pb-10" data-carousel-item>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:bg-gray-300 relative">
                        <div>
                            <img src="../../storages/school1.jpg" class="institute-imgs md:mt-7 md:ml-5" alt="school1">
                        </div>
                        <div class="md:pt-[28px] py-5 px-5 md:pr-10 md:relative institute-infos">
                            <div class="flex justify-between">
                                <h1 class="md:text-xl text-base text-white md:text-gray-950 font-semibold">Sample1 Institute</h1>
                                <div>
                                    <ion-icon name="star" class="md:text-2xl text-base md:text-blue-600 text-yellow-300 relative md:top-1 top-0.5"></ion-icon>
                                    <span class="md:text-xl text-sm relative md:bottom-0 text-white md:text-gray-950">4.9</span>
                                </div>
                            </div>
                            <div class="md:mb-5 md:mt-2">
                                <div class="md:w-14 w-10 h-1 relative bottom-1 md:bottom-3 md:bg-blue-700 bg-white"></div> 
                            </div>
                            <div class="md:mb-5 hidden md:block">
                                <h3 class="md:text-lg font-bold text-base"> - About</h3>
                                <p class="md:text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?</p>
                            </div>
                            <div class="md:mt-0 mt-5">
                                <h3 class="md:text-xl text-sm font-semibold inline-block md:text-blue-600 md:mb-2 mb-4 text-white"> - Popular</h3> <span class="md:text-xl font-semibold text-sm invisible md:visible">Classes</span>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center mt-8 invisible md:visible">
                                <button type="button" class="cursor-pointer text-whitemb-40 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-base px-5 py-3 md:mb-10 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:bg-gray-300 relative">
                        <div>
                            <img src="../../storages/school2.jpg" class="institute-imgs md:mt-7 md:ml-5" alt="school2">
                        </div>
                        <div class="md:pt-[28px] py-5 px-5 md:pr-10 md:relative institute-infos">
                            <div class="flex justify-between">
                                <h1 class="md:text-xl text-base text-white md:text-gray-950 font-semibold">Sample2 Institute</h1>
                                <div>
                                    <ion-icon name="star" class="md:text-2xl text-base md:text-blue-600 text-yellow-300 relative md:top-1 top-0.5"></ion-icon>
                                    <span class="md:text-xl text-sm relative md:bottom-0 text-white md:text-gray-950">4.9</span>
                                </div>
                            </div>
                            <div class="md:mb-5 md:mt-2">
                                <div class="md:w-14 w-10 h-1 relative bottom-1 md:bottom-3 md:bg-blue-700 bg-white"></div> 
                            </div>
                            <div class="md:mb-5 hidden md:block">
                                <h3 class="md:text-lg font-bold text-base"> - About</h3>
                                <p class="md:text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?</p>
                            </div>
                            <div class="md:mt-0 mt-5">
                                <h3 class="md:text-xl text-sm font-semibold inline-block md:text-blue-600 md:mb-2 mb-4 text-white"> - Popular</h3> <span class="md:text-xl font-semibold text-sm invisible md:visible">Classes</span>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center mt-8 invisible md:visible">
                                <button type="button" class="cursor-pointer text-whitemb-40 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-base px-5 py-3 md:mb-10 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:bg-gray-300 relative">
                        <div>
                            <img src="../../storages/school3.jpg" class="institute-imgs md:mt-7 md:ml-5" alt="school3">
                        </div>
                        <div class="md:pt-[28px] py-5 px-5 md:pr-10 md:relative institute-infos">
                            <div class="flex justify-between">
                                <h1 class="md:text-xl text-base text-white md:text-gray-950 font-semibold">Sample3 Institute</h1>
                                <div>
                                    <ion-icon name="star" class="md:text-2xl text-base md:text-blue-600 text-yellow-300 relative md:top-1 top-0.5"></ion-icon>
                                    <span class="md:text-xl text-sm relative md:bottom-0 text-white md:text-gray-950">4.9</span>
                                </div>
                            </div>
                            <div class="md:mb-5 md:mt-2">
                                <div class="md:w-14 w-10 h-1 relative bottom-1 md:bottom-3 md:bg-blue-700 bg-white"></div> 
                            </div>
                            <div class="md:mb-5 hidden md:block">
                                <h3 class="md:text-lg font-bold text-base"> - About</h3>
                                <p class="md:text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?</p>
                            </div>
                            <div class="md:mt-0 mt-5">
                                <h3 class="md:text-xl text-sm font-semibold inline-block md:text-blue-600 md:mb-2 mb-4 text-white"> - Popular</h3> <span class="md:text-xl font-semibold text-sm invisible md:visible">Classes</span>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center mt-8 invisible md:visible">
                                <button type="button" class="cursor-pointer text-whitemb-40 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-base px-5 py-3 md:mb-10 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:bg-gray-300 relative">
                        <div>
                            <img src="../../storages/school4.jpg" class="institute-imgs md:mt-7 md:ml-5" alt="school4">
                        </div>
                        <div class="md:pt-[28px] py-5 px-5 md:pr-10 md:relative institute-infos">
                            <div class="flex justify-between">
                                <h1 class="md:text-xl text-base text-white md:text-gray-950 font-semibold">Sample4 Institute</h1>
                                <div>
                                    <ion-icon name="star" class="md:text-2xl text-base md:text-blue-600 text-yellow-300 relative md:top-1 top-0.5"></ion-icon>
                                    <span class="md:text-xl text-sm relative md:bottom-0 text-white md:text-gray-950">4.9</span>
                                </div>
                            </div>
                            <div class="md:mb-5 md:mt-2">
                                <div class="md:w-14 w-10 h-1 relative bottom-1 md:bottom-3 md:bg-blue-700 bg-white"></div> 
                            </div>
                            <div class="md:mb-5 hidden md:block">
                                <h3 class="md:text-lg font-bold text-base"> - About</h3>
                                <p class="md:text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?</p>
                            </div>
                            <div class="md:mt-0 mt-5">
                                <h3 class="md:text-xl text-sm font-semibold inline-block md:text-blue-600 md:mb-2 mb-4 text-white"> - Popular</h3> <span class="md:text-xl font-semibold text-sm invisible md:visible">Classes</span>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center mt-8 invisible md:visible">
                                <button type="button" class="cursor-pointer text-whitemb-40 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-base px-5 py-3 md:mb-10 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:bg-gray-300 relative">
                        <div>
                            <img src="../../storages/school5.jpg" class="institute-imgs md:mt-7 md:ml-5" alt="school5">
                        </div>
                        <div class="md:pt-[28px] py-5 px-5 md:pr-10 md:relative institute-infos">
                            <div class="flex justify-between">
                                <h1 class="md:text-xl text-base text-white md:text-gray-950 font-semibold">Sample5 Institute</h1>
                                <div>
                                    <ion-icon name="star" class="md:text-2xl text-base md:text-blue-600 text-yellow-300 relative md:top-1 top-0.5"></ion-icon>
                                    <span class="md:text-xl text-sm relative md:bottom-0 text-white md:text-gray-950">4.9</span>
                                </div>
                            </div>
                            <div class="md:mb-5 md:mt-2">
                                <div class="md:w-14 w-10 h-1 relative bottom-1 md:bottom-3 md:bg-blue-700 bg-white"></div> 
                            </div>
                            <div class="md:mb-5 hidden md:block">
                                <h3 class="md:text-lg font-bold text-base"> - About</h3>
                                <p class="md:text-base">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque libero quod pariatur, ipsa odit corrupti, esse aspernatur, deserunt at sequi quisquam doloremque enim velit maxime laudantium. Reprehenderit molestiae minima voluptates laboriosam delectus, quam dicta neque aperiam similique maxime voluptate alias sit?</p>
                            </div>
                            <div class="md:mt-0 mt-5">
                                <h3 class="md:text-xl text-sm font-semibold inline-block md:text-blue-600 md:mb-2 mb-4 text-white"> - Popular</h3> <span class="md:text-xl font-semibold text-sm invisible md:visible">Classes</span>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                                <div class="flex justify-between gap-3 md:gap-0">
                                    <div>
                                        <ion-icon name="flame" class="md:text-2xl relative md:top-1 bottom-0.5 text-red-500 md:text-red-600"></ion-icon>
                                        <span class="md:text-base text-xs text-white md:text-blue-600 relative md:bottom-0 bottom-1.5">Front-End Development</span>
                                    </div>
                                    <span class="md:text-base text-xs md:text-red-500 text-white font-black">By Mr.Matthwe Davis</span>
                                </div>
                            </div>
                            <div class="flex justify-end items-center mt-8 invisible md:visible">
                                <button type="button" class="cursor-pointer text-whitemb-40 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg md:text-xl text-base px-5 py-3 md:mb-10 mb-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute md:top-0 -top-6 start-0  flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute md:top-0 -top-6 end-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

    </section>
    <!-- End Our Latest Pick Section -->

    <!-- Start About Us Section -->
    <section class="md:px-72 px-5 pt-10 md:pt-20 bg-gray-200 md:mb-16 mb-6 md:pb-5">
        <div class="flex justify-center items-center md:mb-4 mb-10">
            <div class="md:w-14 w-8 h-1 relative md:bottom-2 md:mr-5 mr-2 md:bg-blue-700 bg-blue-700 inline-block rounded-lg"></div>
            <div class="flex items-start">
                <span class="md:text-2xl text-xl relative md:bottom-2 font-semibold tracking-wider text-blue-800">About Us</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="col-span-2 relative md:top-0 top-64">
                <p class="md:text-lg text-base text-center">Welcome to MEP, your trusted partner in education and professional development. We are dedicated to empowering students and professionals through high-quality educational programs and resources.</p>
            </div>
            <div class="col-span-2 md:grid grid-cols-1 md:grid-cols-2">
                <div>
                    <img src="../../storages/Trophy.png" class="w-full relative md:bottom-0 bottom-40" alt="Trophy_S" />
                </div>
                <div class="hidden md:block">
                    <div class="h-full flex justify-center items-center">
                        <div>
                            <h1 class="md:text-2xl text-xl font-semibold">Helping people grow their careers,</h1>
                            <h2 class="md:text-2xl text-blue-700 font-bold md:my-3">Everyday</h2>
                            <p class="md:text-lg text-sm">Our platform offers a diverse range of courses and programs tailored to meet the needs of students and professionals alike. Whether you are looking to advance your career, acquire new skills, or explore new fields, MEP is here to guide you every step of the way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End About Us Section -->

    <!-- Start Service Section -->
    <section class="md:px-32 px-5 md:mx-32 mx-5 pt-10 md:pb-24 pb-10 md:pt-20 bg-gradient-to-t from-gray-50 to-gray-400 rounded-lg">
        <h1 class="md:text-2xl text-xl text-center font-semibold md:mb-5">Reliable & High-Quality</h1>
        <div class="flex justify-center items-center md:mb-14 mb-10 ">
            <div class="md:w-14 w-8 h-1 relative md:bottom-2 md:mr-5 mr-2 md:bg-blue-700 bg-blue-700 inline-block rounded-lg"></div>
            <div class="flex items-start">
                <span class="md:text-2xl text-xl relative md:bottom-2  font-semibold tracking-wider text-blue-800">Services</span>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 md:gap-28 gap-5">
            <div class="w-full md:h-[50vh] h-[23vh]  hover:cursor-pointer md:hover:scale-105 hover:scale-105 transition-transform duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-xl relative">
                <div class="flex justify-center items-center md:mt-8 mt-4">
                    <div class="md:w-24 md:h-24 w-12 h-12 rounded-full bg-gray-400 flex justify-center items-center">
                        <svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.9 47.9 0 0 1 176 120"/></svg>
                    </div>
                </div>
                <div class="md:my-10 my-3">
                    <h2 class="text-center md:text-xl text-sm font-semibold opacity-80">Professional Classes</h2>
                </div>
                <div class="md:px-14 px-4">
                    <p class="text-center md:text-base text-[10px]">Enhance your skills and knowledge with our expert-led professional courses in IT, Business, and Language Studies etc...</p>
                </div>
                <div>
                    <img src="../../storages/wavy-bottom.png" class="w-full absolute left-0 bottom-0 rounded-bl-xl rounded-br-xl" alt="wave-img" />
                </div>
            </div>

            <div class="w-full md:h-[50vh] h-[23vh]  hover:cursor-pointer md:hover:scale-105 transition-transform duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-xl relative">
                <div class="flex justify-center items-center md:mt-8 mt-4">
                    <div class="md:w-24 md:h-24 w-12 h-12 rounded-full bg-gray-400 flex justify-center items-center">
                        <svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path d="M44 8H4v30h15l5 5l5-5h15z"/><circle cx="24" cy="19" r="5" fill="currentColor"/><path d="M33 32c0-4.418-4.03-8-9-8s-9 3.582-9 8"/></g></svg>
                    </div>
                </div>
                <div class="md:my-10 my-3">
                    <h2 class="text-center md:text-xl text-sm font-semibold opacity-80">Workshops & Seminars</h2>
                </div>
                <div class="md:px-14 px-4">
                    <p class="text-center md:text-base text-[10px]">Participate in interactive workshops and seminars led by industry experts to stay updated with the latest trends and best practices.</p>
                </div>
                <div>
                    <img src="../../storages/wavy-bottom.png" class="w-full absolute left-0 bottom-0 rounded-bl-xl rounded-br-xl" alt="wave-img" />
                </div>
            </div>

            <div class="w-full md:h-[50vh] h-[23vh]  hover:cursor-pointer md:hover:scale-105 hover:scale-105 transition-transform duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-xl relative">
                <div class="flex justify-center items-center md:mt-8 mt-4">
                    <div class="md:w-24 md:h-24 w-12 h-12 rounded-full bg-gray-400 flex justify-center items-center">
                        <svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12.005 13.003a3 3 0 0 1 2.08 5.162l-1.91 1.837h2.83v2h-6l-.001-1.724l3.694-3.555a1 1 0 1 0-1.693-.72h-2a3 3 0 0 1 3-3m6 0v4h2v-4h2v9h-2v-3h-4v-6zm-14-1a7.99 7.99 0 0 0 3 6.246v2.416a10 10 0 0 1-5-8.662zm8-10c5.185 0 9.449 3.946 9.95 9h-2.012a8.001 8.001 0 0 0-14.554-3.5h2.616v2h-6v-6h2v2.499a9.99 9.99 0 0 1 8-4"/></svg>
                    </div>
                </div>
                <div class="md:my-10 my-3">
                    <h2 class="text-center md:text-xl text-sm font-semibold opacity-80">24/7 Support</h2>
                </div>
                <div class="md:px-14 px-4">
                    <p class="text-center md:text-base text-[10px]">Access round-the-clock assistance from our dedicated support team. Whether you need technical help, we’re here to help anytime.</p>
                </div>
                <div>
                    <img src="../../storages/wavy-bottom.png" class="w-full absolute left-0 bottom-0 rounded-bl-xl rounded-br-xl" alt="wave-img" />
                </div>
            </div>

            <div class="w-full md:h-[50vh] h-[23vh]  hover:cursor-pointer md:hover:scale-105 hover:scale-105 transition-transform duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-xl relative">
                <div class="flex justify-center items-center md:mt-8 mt-4">
                    <div class="md:w-24 md:h-24 w-12 h-12 rounded-full bg-gray-400 flex justify-center items-center">
                        <svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 8H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h1v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h3l5 4V4zm9.5 4c0 1.71-.96 3.26-2.5 4V8c1.53.75 2.5 2.3 2.5 4"/></svg>
                    </div>
                </div>
                <div class="md:my-10 my-3">
                    <h2 class="text-center md:text-xl text-sm font-semibold opacity-80">Media Promotion</h2>
                </div>
                <div class="md:px-14 px-4">
                    <p class="text-center md:text-base text-[10px]">Boost your visibility with our media promotion services. Leverage our platform to reach a wider audience and enhance your brand's presence.</p>
                </div>
                <div>
                    <img src="../../storages/wavy-bottom.png" class="w-full absolute left-0 bottom-0 rounded-bl-xl rounded-br-xl" alt="wave-img" />
                </div>
            </div>
            <div class="w-full md:h-[50vh] h-[23vh] hover:cursor-pointer md:hover:scale-105 hover:scale-105 transition-transform duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-xl relative">
                <div class="flex justify-center items-center md:mt-8 mt-4">
                    <div class="md:w-24 md:h-24 w-12 h-12 rounded-full bg-gray-400 flex justify-center items-center">
                        <svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="currentColor" d="m665.216 768l110.848 192h-73.856L591.36 768H433.024L322.176 960H248.32l110.848-192H160a32 32 0 0 1-32-32V192H64a32 32 0 0 1 0-64h896a32 32 0 1 1 0 64h-64v544a32 32 0 0 1-32 32zM832 192H192v512h640zM352 448a32 32 0 0 1 32 32v64a32 32 0 0 1-64 0v-64a32 32 0 0 1 32-32m160-64a32 32 0 0 1 32 32v128a32 32 0 0 1-64 0V416a32 32 0 0 1 32-32m160-64a32 32 0 0 1 32 32v192a32 32 0 1 1-64 0V352a32 32 0 0 1 32-32"/></svg>
                    </div>
                </div>
                <div class="md:my-10 my-3">
                    <h2 class="text-center md:text-xl text-sm font-semibold opacity-80">Report & Analysis</h2>
                </div>
                <div class="md:px-14 px-4">
                    <p class="text-center md:text-base text-[10px]">Gain valuable insights with our detailed reports and analysis. Track your progress make data-driven decisions to optimize your circumstances.</p>
                </div>
                <div>
                    <img src="../../storages/wavy-bottom.png" class="w-full absolute left-0 bottom-0 rounded-bl-xl rounded-br-xl" alt="wave-img" />
                </div>
            </div>

            <div class="w-full md:h-[50vh] h-[23vh] hover:cursor-pointer md:hover:scale-105 hover:scale-105 transition-transform duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-xl relative">
                <div class="flex justify-center items-center md:mt-8 mt-4">
                    <div class="md:w-24 md:h-24 w-12 h-12 rounded-full bg-gray-400 flex justify-center items-center">
                        <svg class="md:w-14 md:h-14 w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M1.5 0A1.5 1.5 0 0 0 0 1.5v6A1.5 1.5 0 0 0 1.5 9h11A1.5 1.5 0 0 0 14 7.5v-6A1.5 1.5 0 0 0 12.5 0zm6.125 1.454a.625.625 0 1 0-1.25 0v.4a1.532 1.532 0 0 0-.15 3.018l1.197.261a.39.39 0 0 1-.084.773h-.676a.39.39 0 0 1-.369-.26a.625.625 0 0 0-1.178.416c.194.55.673.965 1.26 1.069v.415a.625.625 0 1 0 1.25 0V7.13a1.641 1.641 0 0 0 .064-3.219L6.492 3.65a.281.281 0 0 1 .06-.556h.786a.388.388 0 0 1 .369.26a.625.625 0 1 0 1.178-.416a1.64 1.64 0 0 0-1.26-1.069zM2.75 3.75a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5m8.5 0a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5M4.5 9.875c.345 0 .625.28.625.625v2a.625.625 0 1 1-1.25 0v-2c0-.345.28-.625.625-.625m5.625.625a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0zm-2.5.75a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <div class="md:my-10 my-3">
                    <h2 class="text-center md:text-xl text-sm font-semibold opacity-80">Easy Payment</h2>
                </div>
                <div class="md:px-14 px-4">
                    <p class="text-center md:text-base text-[10px]">Enjoy hassle-free transactions with our easy payment system. Use coin payments to conveniently manage and pay for your promotion of classes.</p>
                </div>
                <div>
                    <img src="../../storages/wavy-bottom.png" class="w-full absolute left-0 bottom-0 rounded-bl-xl rounded-br-xl" alt="wave-img" />
                </div>
            </div>
        </div>

    </section>
    <!-- End Service Section -->

    <!-- Start Client Love Section -->
    <section class="md:px-32 px-5 md:mx-0 mx-5 pt-10 md:pb-24 pb-10 md:pt-20 bg-indigo-500 rounded-lg md:h-[73vh]">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-20 gap-10 h-full">
            <div class="flex flex-col justify-center items-start">
                <h1 class="md:text-2xl text-xl font-semibold text-gray-100">Clients Love</h1> 
                <p class="md:my-6 my-5 md:text-lg text-sm text-gray-300">Hear from our satisfied clients who have benefited from our services. Their testimonials and reviews highlight the positive impact our platform has had on their careers and personal growth.</p>
                <button type="button" class="text-gray-800 md:mt-0 mt-2 bg-gray-200 hover:bg-indigo-900 hover:text-white font-medium rounded-lg text-lg md:text-lg px-7 md:px-10 py-3 me-2 mb-2">Contact Us</button>
            </div>
            <div class="flex flex-col gap-7">
                <div class="flex justify-center items-center">
                    <div class="flex flex-col items-center">
                        <div class="md:w-[90%] w-[100%] h-auto bg-gray-50 rounded-lg grid md:grid-cols-4 grid-cols-3 md:px-0 px-2">
                            <div class="md:col-span-1 col-span-3 flex md:flex-col items-center justify-center">
                                <img src="../../storages/clients-love1.png" class="w-[60px] md:my-2" alt="client-love1">
                                <h1 class="md:text-base md:mx-0 mx-3 font-semibold">XYZ Institute</h1>
                                <div class="flex gap-1 md:mb-2 relative md:bottom-0 bottom-1">
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star-half" class="md:text-lg text-yellow-500"></ion-icon>
                                </div>
                            </div>
                            <div class="md:col-start-2 col-start-1 md:col-span-3 col-span-4 relative md:my-0 my-2">
                                <svg class="md:w-8 md:h-8 text-gray-700 absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m10 7l-2 4h3v6H5v-6l2-4zm8 0l-2 4h3v6h-6v-6l2-4z"/></svg>
                                <div class="flex justify-center items-center h-full md:px-20 px-4">
                                    <p class="md:text-base text-sm md:text-left text-center">The exposure we've gained through MEP's media promotion services has been phenomenal. Our classes are always full!</p>
                                </div>  
                                <svg class="md:w-8 md:h-8 text-gray-700 absolute right-0 bottom-0" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="flex flex-col items-center">
                        <div class="w-[100%] h-auto bg-gray-50 rounded-lg grid md:grid-cols-4 grid-cols-3 md:px-0 px-2">
                            <div class="md:col-span-1 col-span-3 flex md:flex-col items-center justify-center">
                                <img src="../../storages/profile1.svg" class="w-[60px] md:my-2 my-2" alt="profile1">
                                <h1 class="md:text-base md:mx-0 mx-3 font-semibold">Mr. Matthwe Davis</h1> 
                            </div>
                            <div class="md:col-start-2 col-start-1 md:col-span-3 col-span-4 relative md:my-0 my-2">
                                <svg class="md:w-8 md:h-8 text-gray-700 absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m10 7l-2 4h3v6H5v-6l2-4zm8 0l-2 4h3v6h-6v-6l2-4z"/></svg>
                                <div class="flex justify-center items-center h-full md:px-20 px-4">
                                    <p class="md:text-base text-sm md:text-left text-center ">The exposure we've gained through MEP's media promotion services has been phenomenal. Our classes are always full!</p>
                                </div>  
                                <svg class="md:w-8 md:h-8 text-gray-700 absolute right-0 bottom-0" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center md:mb-0 mb-1">
                    <div class="flex flex-col items-center">
                        <div class="md:w-[90%] w-[100%] h-auto bg-gray-50 rounded-lg grid md:grid-cols-4 grid-cols-3 md:px-0 px-2">
                            <div class="md:col-span-1 col-span-3 flex md:flex-col items-center justify-center">
                                <img src="../../storages/clients-love1.png" class="w-[60px] md:my-2" alt="client-love2">
                                <h1 class="md:text-base md:mx-0 mx-3 font-semibold">XYZ Institute</h1>
                                <div class="flex gap-1 md:mb-2 relative md:bottom-0 bottom-1">
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star" class="md:text-lg text-yellow-500"></ion-icon>
                                    <ion-icon name="star-half" class="md:text-lg text-yellow-500"></ion-icon>
                                </div>
                            </div>
                            <div class="md:col-start-2 col-start-1 md:col-span-3 col-span-4 relative md:my-0 my-2">
                                <svg class="md:w-8 md:h-8 text-gray-700 absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m10 7l-2 4h3v6H5v-6l2-4zm8 0l-2 4h3v6h-6v-6l2-4z"/></svg>
                                <div class="flex justify-center items-center h-full md:px-20 px-4">
                                    <p class="md:text-base text-sm md:text-left text-center ">The exposure we've gained through MEP's media promotion services has been phenomenal. Our classes are always full!</p>
                                </div>  
                                <svg class="md:w-8 md:h-8 text-gray-700 absolute right-0 bottom-0" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M14 17h3l2-4V7h-6v6h3M6 17h3l2-4V7H5v6h3z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Client Love Section -->

    <!-- Start Plan & Pricing Section -->
    <section class="pricing-shows md:mx-32 md:mt-20 mt-12 md:pb-16 pb-8 relative h-full overflow-hidden">
        <div>
            <div class="flex justify-center items-center md:mb-16 mb-8">
                <div>
                    <span class="md:text-2xl text-xl text-center font-semibold md:mb-5" >Plan & Pricing for</span> 
                    <button type="button" id="personal-dropdown" class="relative text-transparent md:ml-3 font-semibold underline md:text-2xl text-xl bg-gradient-to-r from-blue-600 to-cyan-950 bg-clip-text" data-dropdown-toggle="dropdown-menu" aria-hidden="true">Personal
                        <ion-icon name="chevron-down-outline" class="text-blue-800 relative md:top-1.5 top-1"></ion-icon>
                        <div class="md:w-[75%] w-[75%] h-0.5 bg-blue-700"></div>
                    </button>
                </div>
                <!-- Dropdown Personal -->
                <div id="dropdown-menu" class="z-10 hidden rounded-lg shadow w-44 bg-gray-200">
                    <ul class="py-2 text-sm text-gray-700">
                        <li>
                            <a href="javascript:void(0);" class="block px-4 py-2 md:text-lg hover:text-blue-600">User</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="block px-4 py-2 md:text-lg hover:text-blue-600">Institute</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Can search and view info of institute and class</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Get 3 times consultations in one month</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Community chat</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Event (For Free)</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex justify-center absolute md:bottom-4 bottom-2 left-1/2 -translate-x-1/2">
                                <button type="button" class="text-white md:w-80 w-60 bg-indigo-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base md:text-xl px-10 md:px-5 py-3 mb-2">Get started</button>
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
                                    <h1 class="text-white font-semibold md:text-2xl text-xl">500,00 MMK</h1>
                                    <small class="text-gray-200 text-xs">One Time Payment</small>
                                </div>
                            </div>  
                            <div class="flex justify-start md:px-16 md:mt-3 md:pt-14 pt-14 px-10">
                                <ul class="space-y-4 text-left text-gray-800 flex flex-col gap-2">
                                    <p class="md:pl-6">Everything in Basic and :</p>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Receive 1000 point each month</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Unlimited consultations</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Support services</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Schedule</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Access all events</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Coupon codes</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex justify-center absolute md:bottom-4 bottom-2 left-1/2 -translate-x-1/2">
                                <button type="button" class="text-white md:w-80 w-60 bg-indigo-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base md:text-xl px-10 md:px-5 py-3 mb-2">Upgrade Pro</button>
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
                                    <h1 class="text-white font-semibold md:text-2xl text-xl">10,000 MMK</h1>
                                    <small class="text-gray-200 text-xs">Unlimited buy</small>
                                </div>
                            </div>  
                            <div class="flex justify-start md:px-16 md:mt-3 md:pt-14 pt-14 px-10">
                                <ul class="space-y-4 text-left text-gray-800 flex flex-col gap-2">
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Can buy unlimited</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Events</span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Enroll class (Verifed User) </span>
                                    </li>
                                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                        </svg>
                                        <span>Event (For Free)</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex justify-center absolute md:bottom-4 bottom-2 left-1/2 -translate-x-1/2">
                                <button type="button" class="text-white md:w-80 w-60 bg-indigo-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base md:text-xl px-10 md:px-5 py-3 mb-2">Buy now</button>
                            </div>
                        </div>  
                    </div>  
                </div>
            </div>
            <div class="swiper-pagination block md:hidden"></div>
        </div>
    </section>
    <!-- End Plan & Pricing Section -->

    <!-- Start Compare All Features Section -->
    <section class="md:mx-32 mx-5 rounded-lg">
        <div class="md:mb-5 flex justify-center items-center">
            <p class="relative text-transparent md:ml-3 font-semibold underline md:text-2xl text-lg md:mb-0 mb-3 bg-gradient-to-r from-blue-600 to-cyan-950 bg-clip-text">Compare All Features</p>
        </div>
        <div class="flex justify-between relative">
            <div>
                <div class="flex flex-col justify-start md:mt-[149px] mt-[2px] md:pt-[0px] pt-[130px] md:gap-[30px] gap-[30px] items-start absolute md:left-10 z-10 md:pl-0 pl-5 md:pr-0 pr-3 md:bg-transparent bg-gray-50">
                    <div class="md:mt-[5px]">Class</div>
                    <div class="md:mt-[1px]">Chat</div>
                    <div class="md:mt-[1px]">Event</div>
                    <div class="md:mt-[1px]">Consultations</div>
                    <div class="md:mt-[2px]">Coupons</div>
                    <div class="md:mt-[2px]">Slots</div>
                    <div class="md:mt-[0px]">SEO</div>
                </div>
            </div>
            <div class="relative overflow-x-auto sm:rounded-lg border-2 shadow-lg w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 border-3 md:ml-0 ml-28">
                        <tbody>
                            <tr class="border-b">
                                <td class="px-6 py-4 md:w-72 w-0">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center ">
                                        <div class="flex flex-col justify-center md:w-60 w-40">
                                            <p class="md:text-sm text-xs text text-indigo-800 text-center">Basic</p>
                                            <p class="text-center md:text-xl text-sm md:my-1 my-0.5 text-black">Free</p>
                                            <div class="flex justify-center">
                                                <button class="md:text-base text-sm bg-transparent hover:bg-indigo-800 duration-100 border text-indigo-800 hover:text-gray-50 border-indigo-800 md:w-40 w-full px-5 py-2 rounded-3xl">Sign Up</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center ">
                                        <div class="flex flex-col justify-center md:w-60 w-40">
                                            <p class="md:text-sm text-xs text text-gray-900 text-center">Pro</p>
                                            <div class="flex justify-center items-center">
                                                <p class="text-center inline-block md:text-xl text-sm md:my-1 my-0.5 text-blue-800 mr-3">50,000 Ks</p> <small>MMK/month</small>
                                            </div>
                                            <div class="flex justify-center">
                                                <button class="md:text-base text-sm bg-indigo-600 hover:bg-indigo-800 duration-100 border text-gray-50 hover:text-gray-50 border-indigo-800 md:w-40 w-full px-5 py-2 rounded-3xl">Buy Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center ">
                                        <div class="flex flex-col justify-center md:w-60 w-40">
                                            <p class="md:text-sm text-xs text text-gray-900 text-center">Bussiness</p>
                                            <div class="flex justify-center items-center">
                                                <p class="text-center inline-block md:text-xl text-sm md:my-1 my-0.5 text-blue-800 mr-3">100,000 Ks</p> <small>MMK/month</small>
                                            </div>
                                            <div class="flex justify-center">
                                                <button class="md:text-base text-sm bg-transparent hover:bg-indigo-800 duration-100 border text-indigo-800 hover:text-gray-50 border-indigo-800 md:w-40 w-full px-5 py-2 rounded-3xl">Contact Sales</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center">
                                        <div class="flex flex-col justify-center md:w-60 w-40">
                                            <p class="md:text-sm text-xs text text-gray-900 text-center">Enteprise</p>
                                            <div class="flex justify-center items-center">
                                                <p class="text-center inline-block md:text-xl text-sm md:my-1 my-0.5 text-blue-800 mr-3">1,000,000 Ks</p> <small>MMK/year</small>
                                            </div>
                                            <div class="flex justify-center">
                                                <button class="md:text-base text-sm bg-transparent hover:bg-indigo-800 duration-100 border text-indigo-800 hover:text-gray-50 border-indigo-800 md:w-40 w-full px-5 py-2 rounded-3xl">Contact Sales</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b ">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">3 Classes</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Unlimited</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Free only</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Unlimited</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">2 Events</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Unlimited</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">3 Times</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Unlimited</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <ion-icon name="checkmark-sharp" class="text-2xl text-indigo-900 "></ion-icon>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">10 Coupons</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Unlimited</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">One Slot</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">Unlimited</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4">

                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <div class="w-5 h-0.5 bg-gray-900"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">10 - 20</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <p class="text-sm text-black">1 - to</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Start Compare All Features Section -->

    <!-- Start Contact Us Section -->
    <section class="md:px-32 px-5 pt-10 md:pt-28 md:mb-16 mb-6 md:pb-5">
        <div class="flex justify-center items-center md:mb-10 mb-10">
            <div class="md:w-14 w-8 h-1 relative md:bottom-2 md:mr-5 mr-2 md:bg-blue-700 bg-blue-700 inline-block rounded-lg"></div>
            <div class="flex items-start">
                <span class="md:text-2xl text-xl relative md:bottom-2 font-semibold tracking-wider text-blue-800">Contact Us</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- left -->
            <div class="md:h-[60vh] h-[55vh] border-2 border-gray-400 rounded-lg">
                <div class="col-span-2 bg-indigo-500 md:h-3 h-2 rounded-tl-sm rounded-tr-sm"></div>
                <form action="" method="" class="md:px-5 md:py-5 px-3 py-3">  
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                            <input type="text" id="first_name" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="John" required />
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                            <input type="text" id="last_name" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Doe" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" id="email" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Email Address" required />
                        </div>
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900">Subject</label>
                            <input type="text" id="subject" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Subject" required />
                        </div>
                        <div class="col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Message</label>
                            <textarea name="message" id="message" rows="8" class="w-full resize-none bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="Write message....."></textarea>   
                        </div>
                        <div class="col-span-2 flex justify-center md:mt-4 mt-3">
                            <button id="send-message" class="ml-2 bg-[#4460EF] text-white py-2 px-10 rounded-md flex items-center space-x-4">
                                Send
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" class="inline ml-1" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14L21 3m0 0l-6.5 18a.55.55 0 0 1-1 0L10 14l-7-3.5a.55.55 0 0 1 0-1z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- right -->
            <div class="flex items-center">
                <div>
                    <p class="md:text-2xl text-xl font-medium md:mb-2 mb-3">How Can We Help You?</p>
                    <p class="md:text-lg text-base md:mb-10 mb-8">We're here to help! If you have any questions,feedback, or need support, please feel free to reach out to us through any of the following ways.</p>

                    <div>
                        <h3 class="md:text-xl font-semibold md:mb-2 mb-2">Content Information :</h3>
                        <div class="md:mb-1.5 mb-1">
                            <ion-icon name="mail-outline" class="text-2xl text-blue-800 md:mr-3 relative md:top-1.5 top-1.5"></ion-icon> <span class="md:mr-1">Email: </span> <span class="text-blue-700">support@mep.com</span>
                        </div>
                        <div>
                            <ion-icon name="call-outline" class="text-2xl text-blue-800 md:mr-3 relative md:top-1.5 top-1"></ion-icon> <span class="md:mr-1">Phone: </span> <span class="text-blue-700">+95 976XXXXXXXX</span>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <img src="../../storages/contact-tran.png" class="md:mt-16 h-60" alt="contact" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Us Section -->

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
                        <svg class="md:w-10 md:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="#1877f2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"/><path fill="#fff" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z"/></svg>
                    </a>
                    <a href="https://instagram.com" class="text-white">
                        <svg class="md:w-10 md:h-10 w-8 h-8 md:mx-5" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><g fill="none"><rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60"/><rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60"/><path fill="#fff" d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396s-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413s.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5s6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355s22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334s-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334"/><defs><radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1" gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)" gradientUnits="userSpaceOnUse"><stop stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></radialGradient><radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1" gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)" gradientUnits="userSpaceOnUse"><stop stop-color="#3771c8"/><stop offset=".128" stop-color="#3771c8"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></radialGradient></defs></g></svg>
                    </a>
                    <a href="https://twitter.com" class="text-white">
                        <svg class="md:w-10 md:h-10 w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 128 128"><path d="M75.916 54.2L122.542 0h-11.05L71.008 47.06L38.672 0H1.376l48.898 71.164L1.376 128h11.05L55.18 78.303L89.328 128h37.296L75.913 54.2ZM60.782 71.79l-4.955-7.086l-39.42-56.386h16.972L65.19 53.824l4.954 7.086l41.353 59.15h-16.97L60.782 71.793Z"/></svg>
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
    <!-- customjs -->
    <script src="./js/index.js" type="text/javascript"></script>
</body>

</html>

