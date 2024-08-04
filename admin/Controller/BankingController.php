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


