<?php
ini_set('display_errors', '1');
require_once  __DIR__ . '/../../Model/MClasses.php';


function generateClassID($lastID) {
    // Extract the numeric part from the last ID
    $numericPart = (int)substr($lastID, 1); // "C1001" becomes 1001
    
    // Increment the numeric part by 1
    $newNumericPart = $numericPart + 1;
    
    // Concatenate the prefix with the new numeric part
    $newClassID = "C" . $newNumericPart;
    
    return $newClassID; 
}

?>