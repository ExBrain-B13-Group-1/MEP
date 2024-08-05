<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MBankings.php';

$mBankings = new MBankings();
$bankings = $mBankings->getAll();

// Update Bank Account Number
if ($_POST) {
    $ids = $_POST['id'];
    $account_numbers = $_POST['account_number'];

    foreach ($ids as $index => $id) {
        $account_number = $account_numbers[$index];

        $success = $mBankings->updateAccNumber($id, $account_number);

        if ($success) {
            header("Location: ../View/resources/page.php");
        } else {
            echo "failed";
        }
    }
}

// Later
// Add New Bank Account Number
if (isset($_POST["addBanking"])) {
    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $account_name = $_POST['account_name'];

    // Generate QR Code
    $data = "Account Name: $bankAccountName\nAccount Number: $accountNumber";
    $qrCodePath = 'path_to_save_qr_code/qr_code.png';
    
    // QRcode::png($data, $qrCodePath, QR_ECLEVEL_L, 4);
    $success = $mSites->updateHome($id, $slogan, $title, $description);
    if ($success) {
        header("Location: ../View/resources/page.php");
    } else {
        echo "failed";
    }
}


