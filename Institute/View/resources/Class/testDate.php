<?php 

$getdate = getdate();

// echo "<pre>".print_r($getdate,true)."</pre>";
$month = $getdate['mon'];
$day = $getdate['mday'] + 10;
$year = $getdate['year'];

echo "min start date = $month/$day/$year";

$currentDate = new DateTime();
$minStartDate = $currentDate->modify('+10 days')->format('m/d/Y');

echo $minStartDate;


?>