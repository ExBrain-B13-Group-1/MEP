<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/MClasses.php';

$classObj = new MClasses();
$popularClasses = $classObj->getAllPopularClasses();
$newClasses = $classObj->getAllNewClasses();
$trendingClasses = $classObj->getAllTrendingClasses();

$classes = [
    "most-popular" => $popularClasses,
    "new" => $newClasses,
    "trending" => $trendingClasses
];

echo json_encode($classes);

?>