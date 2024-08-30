<?php

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/UpdateRemainingCoin.php';
require_once  __DIR__ . '/../Model/Pricing.php';

$obj = new UpdateRemainingCoin();
$obj1 = new Pricing();
$institute_id = $_POST['institute_id'];
$currentCoin = $obj->getCurrentCoin($institute_id);
$fixCoinForBuy = number_format($obj1->getFixCoin(), 0);
$updateCoin = $currentCoin + $fixCoinForBuy;
$success = $obj->updateRemainingCoin($updateCoin,$institute_id);

// echo json_encode(array("updateCoin"=>$updateCoin,"success"=>true));
if($success){
    echo json_encode(array("success"=>true,"update_coin"=>$updateCoin,"message"=>"Coin Buy Successful!"));
}else{
    echo json_encode(array("success"=>false,"message"=>"Fail to buy Coin!"));
}


?>