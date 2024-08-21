<?php 
ini_set('display_errors','1');
include __DIR__ . '/../Model/MPays.php';

$mPays = new MPays();
$pays = $mPays->getAll();

// Update Pay Phone Number
if ($_POST) {
    $ids = $_POST['id'];
    $ph_nums = $_POST['ph_num'];

    foreach ($ids as $index => $id) {
        $ph_num = $ph_nums[$index];

        $success = $mPays->updatePhNum($id, $ph_num);

        if ($success) {
            header("Location: ../View/resources/page.php");
        } else {
            echo "failed";
        }
    }
}

