<?php 

session_start();
ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/ChartIndicator.php';

$obj = new ChartIndicator();

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $datas = [
        'monthlyEnrollments' => $obj->getMonthlyTrending($id),
        'studentDemographics' => $obj->getStudentDemographics($id),
        'monthlyIncome' => $obj->getMonthlyIncome($id)
    ];

    if($datas){
        echo json_encode($datas);
    }else{
        echo json_encode(array("success"=>"false","message"=>"No data found!!!"));
    }
}else{
    echo json_encode(array("success"=>"false","message"=>"Your session is timed out!!!"));
}




?>