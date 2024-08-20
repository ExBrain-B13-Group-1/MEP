<?php
ini_set('display_errors', '1');
include __DIR__ . '/../Model/MSlots.php';

$mSlots = new MSlot();

if (isset($_POST['institute_ids'])) {
    $instituteIds = json_decode($_POST['institute_ids'], true);

    if (is_array($instituteIds) && count($instituteIds) > 0) {
        $updateResult = $mSlots->updateAdSlots($instituteIds);


        if ($updateResult) {
            // Fetch the updated slots
            $slots = $mSlots->getAll();
            echo json_encode([
                'status' => 'success',
                'message' => 'Slots updated successfully.',
                'slots' => $slots
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update slots.',
                'slots' => []
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid institute IDs.',
            'slots' => []
        ]);
    }
}
