<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/History.php';

$history = new History();

$action = $_POST['action'];

// Check if the cookie for the user ID exists
if (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];

    // Fetch the user's details based on the ID from the cookie
    $history = $history->getHistoryModule($id, $action);

    echo json_encode($history);

} else {
    echo "No user ID cookie found.";
}



