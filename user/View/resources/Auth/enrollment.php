<?php
ini_set('display_errors', '1');
include '../../../Controller/BankingController.php';
include '../../../Controller/PayController.php';

// Merge data into a single array using IDs as keys
$paymentData = [];
// To make default value to first item
$firstItem = null;

foreach ($bankings as $banking) {
    $key = 'bank:' . $banking['id'];
    $paymentData[$key] = [
        'name' => $banking['bank_name'],
        'image' => $banking['bank_image'],
        'qr_code' => $banking['qr_code']
    ];
    if (!$firstItem) {
        $firstItem = $key;
    }
}

foreach ($pays as $payment) {
    $key = 'pay:' . $payment['id'];
    $paymentData[$key] = [
        'name' => $payment['pay_name'],
        'image' => $payment['pay_image'],  
        'qr_code' => $payment['qr_code']
    ];
}
$paymentData = json_encode($paymentData);
$firstItem = json_encode($firstItem);
?>

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
            top: 55%;
            left: 73%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        @media (max-width: 767px) {

            /* When in Mobile device */
            .payment-overlay {
                top: 74%;
                left: 49%;
            }
        }
    </style>
</head>

<body class="bg-custom-enroll-bg">
    <div class="flex items-center justify-center min-h-screen">
        <div class="py-8 px-20 bg-primary-main rounded-lg bg-opacity-90 shadow-xl w-3/4 relative overflow-hidden">
            <!-- Logo and Form Name -->
            <div class="flex flex-col md:flex-row justify-between items-center ">
                <img src="../../../../storages/logo-white.svg" class="mb-5" alt="logo">
                <h2 class="text-white text-center text-xl font-bold mb-6">Enrollment Form</h2>
            </div>

            <div>
                <!-- Enrollment Form Back-End -->
                <form id="enrollForm" class="form-step active space-y-6" action="">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-4">
                        <div>
                            <!-- User Full Name -->
                            <div class="mb-4">
                                <label for="user-name" class="text-dark-gray text-sm">Full Name *</label>
                                <input type="text" id="user-name" value="John Smith (Acc Name)" disabled class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- User Email -->
                            <div class="mb-4">
                                <label for="user-email" class="text-dark-gray text-sm">Email Address *</label>
                                <input type="email" id="user-email" value="johnsmith@gmail.com" disabled class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Institute Name -->
                            <div class="mb-4">
                                <label for="institute-name" class="text-dark-gray text-sm">Institute Name</label>
                                <input type="text" id="institute-name" value="Tech Innovative Academy" disabled class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg" required>
                            </div>
                            <!-- Class Name -->
                            <div class="mb-4">
                                <label for="class-name" class="text-dark-gray text-sm">Class</label>
                                <input type="text" id="class-name" value="Javascript For Beginner" disabled class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                            <!-- Instructor Name -->
                            <div class="mb-4">
                                <label for="instructor-name" class="text-dark-gray text-sm">Instructor</label>
                                <input type="text" id="instructor-name" value="Matthew Davis" disabled class="w-full px-4 py-2 border rounded-md text-red-800 bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                            <!-- Start Date & End Date -->
                            <div class="flex space-x-5">
                                <div>
                                    <label for="start-date" class="text-dark-gray text-sm">Start Date</label>
                                    <input type="text" id="start-date" value="21 / 7 / 2024" disabled class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                </div>
                                <div>
                                    <label for="end-date" class="text-dark-gray text-sm">End Date</label>
                                    <input type="text" id="end-date" value="25 / 12 / 2024" disabled class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- Fees -->
                            <div class="mb-4">
                                <label for="fees-type" class="text-dark-gray text-sm">Fees</label>
                                <div class="relative">
                                    <select id="fees-type" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-10 rounded-md leading-tight focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                        <option value="250000" selected>250,000 MMKs</option>
                                        <option value="500">500 Coins</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10l5 5 5-5H7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Coupon code -->
                            <div class="mb-4">
                                <label for="coupon" class="text-dark-gray text-sm">Coupon Code (Optional)</label>
                                <input type="text" id="coupon" class="w-full px-4 py-2 border rounded-md bg-white focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                            </div>
                            <!-- Payment Plan -->
                            <div id="payment-plan-container" class="mb-44">
                                <label for="payment-plan" class="text-dark-gray text-sm">Payment Plan</label>
                                <div class="relative">
                                    <select id="payment-plan" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-10 rounded-md leading-tight focus:outline-none focus:ring-1 focus:ring-blue-light-bg">
                                        <!-- Group for Banking -->
                                        <optgroup label="Banking">
                                            <?php foreach ($bankings as $banking) : ?>
                                                <option value="bank:<?= $banking['id'] ?>">
                                                <?= ($banking['bank_name'] . " Banking - ") ?><?= ($banking['account_name'] . " ") ?><?= '(' . ($banking['account_number']) . ')' ?>
                                                </option>
                                            <?php endforeach ?>
                                        </optgroup>

                                        <!-- Group for Payments -->
                                        <optgroup label="Payments">
                                            <?php foreach ($pays as $pay) : ?>
                                                <option value="pay:<?= $pay['id'] ?>">
                                                <?= ($pay['pay_name'] . " - ") ?><?= ($pay['user_name'] . " ") ?><?= '(' .  '0' .($pay['ph_num']) . ')' ?>
                                                </option>
                                            <?php endforeach ?>
                                        </optgroup>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-2 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M7 10l5 5 5-5H7z" />
                                        </svg>
                                    </div>
                                </div>
                                <div id="payment-details" class="payment-overlay flex items-center mt-4">
                                    <img id="payment-logo" src=""  alt="Payment Logo" class="h-16 mr-4">
                                    <img id="qr-code" src="" alt="QR Code" class="w-24 h-24">
                                </div>
                            </div>
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
                        <button type="button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md hover:bg-opacity-90 duration-75"><a href="../viewdetailsclass.php">Back</a></button>
                        <button type="submit" id="submit-button" class="py-2 px-4 bg-white text-primary-main font-bold rounded-md opacity-50 cursor-not-allowed duration-75" disabled>Enroll</button>
                    </div>
                </form>
            </div>

            <!-- Received Information Announced -->
            <div id="step2" class="form-step hidden text-center">
                <h2 class="text-white text-base md:text-xl mb-2 md:mb-6">Enrollment Received</h2>
                <div class="p-6 bg-white rounded-lg shadow-md text-gray-800 text-sm md:text-base">
                    <h3 class="text-base md:text-lg font-bold mb-4">Thank you for enrolling!</h3>
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

    <script>
         var paymentData = <?php echo $paymentData; ?>;
         var defaultValue = <?php echo $firstItem; ?>;
    </script>
    <script src="../js/paymentData.js"></script>
    <script src="../js/formStep.js"></script>

</body>

</html>