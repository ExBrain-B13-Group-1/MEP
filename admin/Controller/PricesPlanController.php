<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MPricesPlan.php';

$mPrices = new MPricesPlan();
$prices = $mPrices->getAll();

// Update Service
if (isset($_POST['updatePrice'])) {
    $ids = $_POST['id'];
    $amounts = $_POST['amount'];

    foreach ($ids as $index => $id) {
        // Get amount and remove MMK and comma
        $amount = str_replace(['MMK', ','], '', $amounts[$index]);
        $amount = (float) $amount;

        $success = $mPrices->updatePrice($id, $amount);

        if ($success) {
            header("Location: ../View/resources/page.php");
        } else {
            echo "failed";
        }
    }
}
