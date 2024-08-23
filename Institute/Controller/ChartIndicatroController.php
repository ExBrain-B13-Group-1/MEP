<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/ChartIndicator.php';

$obj = new ChartIndicator();
$datas = [
    'monthlyEnrollments' => $obj->getMonthlyTrending(),
    'studentDemographics' => $obj->getStudentDemographics()

];

if($datas){
    echo json_encode($datas);
}else{
    echo json_encode(array("success"=>"false","message"=>"No data found!!!"));
}


?>