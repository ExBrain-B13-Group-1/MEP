<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Settings.php';
require_once  __DIR__ . '/../Model/History.php';

header("Access-Control-Allow-Origin:*");		// any website (*)
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");		// methods
header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");

$getdatas = json_decode($_POST['datas']);

$facebook_link = $getdatas->facebooklink;
$telegram_link = $getdatas->telegramlink;
$instagram_link = $getdatas->instagramlink;
$x_link = $getdatas->xlink;


$datas = [
    "facebooklink"=>$facebook_link,
    "telegramlink"=>$telegram_link,
    "instagramlink"=>$instagram_link,
    "xlink"=>$x_link 
];

$historyArr = [
    "module" => "Settings",
    "action" => "update",
    "remark" => "Social Links Updated",
    "instituteid" => $_COOKIE['institute_id']
];

// echo json_encode($datas);

if(isset($_COOKIE['institute_id'])){
    $id = $_COOKIE['institute_id'];
    $obj = new Settings();
    $success = $obj->updateSociallinks($datas,$id);
    // $success = true;
    if($success){
        $history = new History();
        $history->addHistoryModule($historyArr);
        echo json_encode($datas);
    }else{
        echo "Fail Update";
    }
}else{
    echo "
    <script>
        alert('Your session is timed out');
        window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
    </script>";
}

?>