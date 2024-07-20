<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Enrollment Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../../resources/css/output.css" rel="stylesheet">
    <script src="../../resources/lib/jquery-3.7.1.js"></script>
    <style>
        .hpp-checkbox,
        .hpp-radio {
            width: 20px;
            height: 20px;
        }

        .payment-overlay {
            position: absolute;
            top: 58%;
            left: 72%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
    </style>
</head>

<body class="bg-custom-enroll-bg">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-20 bg-primary-main rounded-lg bg-opacity-90 shadow-xl w-3/4 relative overflow-hidden">
            <!-- Logo and Form Name -->
            <div class="flex justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6">Enrollment Form</h2>
            </div>

            <div>
                <!-- Enrollment Form Back-End -->
                <form id="enrollForm" class="form-step active space-y-6" action="">
                    <div class="grid grid-cols-2 gap-x-20 gap-y-4">
                        <!-- User Full Name -->
                        <div>
                            <label for="user-name" class="text-dark-gray text-sm">Full Name *</label>
                            <input type="text" id="user-name" value="John Smith (Acc Name)" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Fees -->
                        <div>
                            <label for="fees-type" class="text-dark-gray text-sm">Fees</label>
                            <div class="relative">
                                <select id="fees-type" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-10 rounded-md leading-tight focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                    <option value="250,000" selected>250,000 MMKs</option>
                                    <option value="500">500 Coins</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M7 10l5 5 5-5H7z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- User Email -->
                        <div>
                            <label for="user-email" class="text-dark-gray text-sm">Email Address *</label>
                            <input type="email" id="user-email" value="johnsmith@gmail.com" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Coupon code -->
                        <div>
                            <label for="coupon" class="text-dark-gray text-sm">Coupon Code (Optional)</label>
                            <input type="text" id="coupon" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                        </div>
                        <!-- Institute Name -->
                        <div>
                            <label for="institute-name" class="text-dark-gray text-sm">Institute Name</label>
                            <input type="text" id="institute-name" value="Tech Innovative Academy" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                        <!-- Payment Plan -->
                        <div id="payment-plan-container">
                            <label for="payment-plan" class="text-dark-gray text-sm">Payment Plan</label>
                            <div class="relative">
                                <select id="payment-plan"
                                    class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-10 rounded-md leading-tight focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                    <option value="kpay" selected>Kpay (09123456789)</option>
                                    <option value="wavepay">Wavepay (09987654321)</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path d="M7 10l5 5 5-5H7z" />
                                    </svg>
                                </div>
                            </div>
                            <div id="payment-details" class="payment-overlay flex items-center mt-4">
                                <img id="payment-logo" src="../../../storages/payment/kpay.png" alt="Payment Logo"
                                    class="w-16 h-16 mr-4">
                                <img id="qr-code" src="../../../storages/payment/kpayQr.svg" alt="QR Code" class="w-24 h-24">
                            </div>
                        </div>
                        <!-- Class Name -->
                        <div>
                            <label for="class-name" class="text-dark-gray text-sm">Class</label>
                            <input type="text" id="class-name" value="Javascript For Beginner" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                        </div>
                        <!-- Empty Div -->
                        <div></div>
                        <!-- Instructor Name -->
                        <div>
                            <label for="instructor-name" class="text-dark-gray text-sm">Instructor</label>
                            <input type="text" id="instructor-name" value="Matthew Davis" class="w-full px-4 py-2 border rounded-md text-red-800 bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                        </div>
                        <!-- Empty Div -->
                        <div></div>
                        <!-- Start Date & End Date -->
                        <div class="flex space-x-5">
                            <div>
                                <label for="start-date" class="text-dark-gray text-sm">Start Date</label>
                                <input type="text" id="start-date" value="21 / 7 / 2024" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                            <div>
                                <label for="end-date" class="text-dark-gray text-sm">End Date</label>
                                <input type="text" id="end-date" value="25 / 12 / 2024" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                        </div>
                        <!-- Attachment -->
                        <div id="attachment-receipt">
                            <label for="attachment" class="text-dark-gray text-sm">Attachment *</label>
                            <input type="file" id="attachment" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                        </div>
                    </div>
                    <!-- Agree Terms & Conditions -->
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" id="agree-terms" class="form-checkbox hpp-checkbox">
                            <span class="ml-2 text-white text-sm">Agree Terms & Conditions</span>
                        </label>
                    </div>
                    <!-- 2 Buttons (Back, Enroll) -->
                    <div class="flex justify-between">
                        <button type="button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75"><a href="#">Back</a></button>
                        <button type="submit" id="submit-button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md opacity-50 cursor-not-allowed duration-75" disabled>Enroll</button>
                    </div>
                </form>
            </div>

            <!-- Received Information Announced -->
            <div id="step2" class="form-step hidden text-center">
                <h2 class="text-white text-xl mb-6">Enrollment Received</h2>
                <div class="p-6 bg-white rounded-lg shadow-md text-gray-800">
                    <h3 class="text-lg font-bold mb-4">Thank you for enrolling!</h3>
                    <p class="mb-4">We have successfully received your enrollment information. Our team is currently
                        reviewing your submission, and you should expect a response within <span class="font-semibold">24 hours</span>.</p>
                    <p class="mb-4">Once your enrollment is approved, you will receive an email notification. If you
                        have any questions in the meantime, please do not hesitate to contact us.</p>
                    <!-- Redirect Back to Login Page -->
                    <div class="flex justify-center mt-6">
                        <a href="../dashboard.php" class="py-2 px-4 bg-primary-main text-white font-bold rounded-md hover:bg-opacity-90 duration-75">Finish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/paymentData.js"></script>
    <script src="../js/formStep.js"></script>

</body>

</html>