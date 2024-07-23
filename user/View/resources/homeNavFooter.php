<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="./css/output.css" rel="stylesheet">
    <link href="./css/navbar.css" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./lib/jquery-3.7.1.js"></script>
    <script src="./js/navbar.js" defer></script>
    <style>
        .underline-animation {
            position: relative;
            overflow: hidden;
        }

        .underline-animation::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: white;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .underline-animation:hover::after {
            transform: translateX(0);
        }

        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-open {
            transform: translateX(0);
        }

        .backdrop {
            background: rgba(0, 0, 0, 0.5);
        }

        .hover-underline-animation {
            display: inline-block;
            position: relative;
            color: whitesmoke;
        }

        .hover-underline-animation::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: whitesmoke;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .hover-underline-animation:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .active {
            color: white !important;
        }

        .inactive {
            color: #c2c2c2;
        }
    </style>
</head>

<body>

    <!-- Navigation bar -->
    <nav class="bg-[#4460EF] p-4 relative">
        <div class="container mx-auto flex justify-between items-center">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../../storages/logo-white.svg" class="md:h-auto h-10" alt="Flowbite Logo">
            </a>
            <div class="hidden md:flex justify-center items-center lg:space-x-14 md:space-x-8">
                <a href="home" class="text-white hover-underline-animation nav-link active">Home</a>
                <a href="about-us" class="text-[#c2c2c2] hover-underline-animation nav-link inactive">About</a>
                <a href="services" class="text-[#c2c2c2] hover-underline-animation nav-link inactive">Services</a>
                <a href="price-plan" class="text-[#c2c2c2] hover-underline-animation nav-link inactive">Price Plan</a>
                <a href="contact-us" class="text-[#c2c2c2] hover-underline-animation nav-link inactive">Contact Us</a>
                <a href="#" class="bg-white text-[#4460EF] px-6 py-2 rounded hover:bg-white/90">Join Now</a>
            </div>
            <div class="md:hidden">
                <button id="burger" class="text-white focus:outline-none">
                    <img src="../../storages/burger.svg" alt="">
                </button>
            </div>
        </div>
    </nav>

    <div id="backdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- Mobile Navbar -->
    <div id="mobile-menu" class="sidebar fixed inset-y-0 left-0 w-64 bg-[#4460EF] text-white p-4 z-50 flex flex-col pt-10 items-center">
        <a href="home" class="block py-2 text-center w-full nav-link active">Home</a>
        <a href="about-us" class="block py-2 text-center w-full nav-link inactive">About</a>
        <a href="services" class="block py-2 text-center w-full nav-link inactive">Services</a>
        <a href="price-plan" class="block py-2 text-center w-full nav-link inactive">Price Plan</a>
        <a href="contact-us" class="block py-2 text-center w-full nav-link inactive">Contact Us</a>
        <a href="#" class="inline-block px-6 py-2 mt-4 bg-white text-[#4460EF] text-center rounded-md">Join Now</a>
    </div>

    <!-- Code Here -->
    <div>

    </div>


    <!-- Footer -->
    <footer class="bg-[#4460EF] text-white py-8 px-4 mt-10">
        <div class="container mx-auto ">
            <div class="grid grid-cols-12">
                <div class="text-center md:text-left mb-4 md:mb-0 col-span-3">
                    <a href="https://flowbite.com/" class="flex items-start md:items-center justify-start space-x-3 rtl:space-x-reverse mb-4 md:mb-0">
                        <img src="../../storages/logo-white.svg" class="h-10" alt="Flowbite Logo">
                    </a>
                    <p class="mt-2 text-sm hidden md:block">“Join MEP, Your Path To Success”</p>
                    <div class="flex flex-col space-y-2 items-start visible md:invisible">
                        <a href="home" class="text-white hover-underline-animation nav-link">Home</a>
                        <a href="about-us" class="text-white hover-underline-animation nav-link">About</a>
                        <a href="services" class="text-white hover-underline-animation nav-link">Services</a>
                        <a href="price-plan" class="text-white hover-underline-animation nav-link">Price Plan</a>
                        <a href="contact-us" class="text-white hover-underline-animation nav-link">Contact Us</a>
                    </div>
                </div>
                <div class="my-0 text-center col-span-7 relative right-5">
                    <div class="flex invisible md:visible lg:space-x-14 md:space-x-8 mb-6 space-y-4 md:space-y-0">
                        <a href="home" class="text-white">Home</a>
                        <a href="about-us" class="text-white hover-underline-animation nav-link">About</a>
                        <a href="services" class="text-white hover-underline-animation nav-link">Services</a>
                        <a href="price-plan" class="text-white hover-underline-animation nav-link">Price Plan</a>
                        <a href="contact-us" class="text-white hover-underline-animation nav-link lg:block md:hidden">Contact Us</a>
                    </div>
                    <div class="">
                        <p class="mt-2 text-sm block md:hidden mb-8">“Join MEP, Your Path To Success”</p>
                        <p class="text-lg font-semibold mb-2">Navigate Your Future with Us</p>
                        <div class="flex justify-center mt-2">
                            <input type="email" class="p-2 rounded-l-md text-black focus:outline-none focus:ring-1 mr-1" placeholder="email">
                            <button class="bg-white text-[#4460EF] hover:text-white hover:bg-blue-600 px-4 rounded-r-md">Subscribe</button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col col-span-2 md:flex-row justify-start space-y-6 md:justify-end items-end space-x-4 mt-4 md:mt-0">
                    <a href="https://facebook.com" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 256 256" {...$$props}>
                            <path fill="#1877f2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                            <path fill="#fff" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z" />
                        </svg>
                    </a>
                    <a href="https://instagram.com" class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 256 256" {...$$props}>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 512 512" {...$$props}>
                            <path fill="currentColor" d="M389.2 48h70.6L305.6 224.2L487 464H345L233.7 318.6L106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9zm-24.8 373.8h39.1L151.1 88h-42z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8 text-center md:text-left">
            <div class="container mx-auto flex flex-row justify-between items-center">
                <p class="text-sm text-white/60">Myanmar Education Portal © 2024</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="privacyPolicy.php" class="text-sm">Privacy Policy</a>
                    <a href="feedback.php" class="text-sm">Feedback</a>
                    <a href="faq.php" class="text-sm">FAQ</a>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/homeNavFooter.js"></script>
</body>

</html>