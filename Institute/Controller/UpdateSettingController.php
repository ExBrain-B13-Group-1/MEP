<?php 

ini_set('display_errors', '1');
require_once  __DIR__ . '/../Model/Settings.php';
require_once  __DIR__ . '/../Model/History.php';

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");
header("Access-Control-Allow-Headers:Content-Type,X-Auth-Token,Origin,Authorization");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form data is set
    if (!isset($_POST['institute_name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['address']) || !isset($_POST['website'])) {
        echo "Missing required fields in POST request";
        exit;
    }

    $institute_name = $_POST['institute_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $website = $_POST['website'];

    // echo $institute_name;
    // echo $email;
    // echo $phone;
    // echo $address;
    // echo $website;

    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $allowedTypes = ["jpg", "jpeg", "png"];
        $photoExtension = pathinfo($photo['name'], PATHINFO_EXTENSION);

        if (!in_array($photoExtension, $allowedTypes)) {
            echo "Invalid photo type";
            exit;
        }

        $uploadDir = "../../storages/uploads/";
        
        // Check if the directory exists, if not, create it
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                echo "Failed to create upload directory";
                exit;
            }
        }

        $photoName = uniqid() . '.' . $photoExtension;
        $uploadFile = $uploadDir . $photoName;

        if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
            $datas['photo'] = $photoName;
        } else {
            echo "Failed to upload photo";
            exit;
        }
    } else {
        echo "Photo upload error";
        exit;
    }

    $datas = [
        "success" => true,
        "photo" => $photoName,
        "institute_name" => $institute_name,
        "email" => $email,
        "phone" => $phone,
        "website" => $website,
        "address" => $address
    ];

    $historyArr = [
        "module" => "Settings",
        "action" => "update",
        "remark" => "Settings Updated",
        "instituteid" => $_COOKIE['institute_id']
    ];

    if (isset($_COOKIE['institute_id'])) {
        $id = $_COOKIE['institute_id'];
        $obj = new Settings();
        $success = $obj->updateSetting($datas, $id);    
        if ($success) {
            $history = new History();
            $history->addHistoryModule($historyArr);
            echo json_encode($datas);
        } else {
            echo "<script>alert('Fail Update');</script>";
        }
    } else {
        echo "
            <script>
                alert('Your session is timed out');
                window.location.href = 'http://localhost/MEP/Institute/Controller/LogoutController.php';        
            </script>";
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method',
    ]);
}

?>