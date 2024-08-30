<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Pricing.php';

$obj = new Pricing();

if (isset($_COOKIE['institute_id'])) {
    $id = $_COOKIE['institute_id'];

    $pricingdatas = $obj->getPricingForInstitute();
    $instituterole = $obj->getRoleForInstitute($id);   
    $coin_amt = $obj->getFixCoin();

    $datas = [
        "institute_id"=>$id,
        "pricingdata"=>$pricingdatas,
        "role"=>$instituterole,
        "coin_amt"=>$coin_amt
    ];

    echo json_encode($datas);   
}
// echo "<pre>";
// print_r($pricingdatas);
// echo "</pre>";

?>