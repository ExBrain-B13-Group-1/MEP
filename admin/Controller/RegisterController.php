<?php

ini_set('display_errors', '1');
include "./common/mailSender.php";
include "./common/commonFunction.php";
include "../Model/MUsers.php";

if (isset($_POST["register"])) {
    // get request
    $username = $_POST["username"];
    $useremail = $_POST["useremail"];
    $userpassword = $_POST["userpassword"];

    // register to database
    $mUsers = new MUsers();
    if (!$mUsers->isDuplicateEmail($useremail)) {
        // generate verify code
        $vcode = getRandom(10);
        $success = $mUsers->register($username, $useremail, $userpassword, $vcode);
        if ($success) {
            // send verify
            $mail = new SendMail();
            $mail->sendMail(
                "$useremail",
                "Welcome From Our System",
                "<h1>Here is your verfiy link</h1>
                <a href='http://localhost/education/student/Controller/VerifyController.php?vcode=$vcode'>Verify Now</a>"
            );
            
        }
    } else {
        echo "Email is already Exist!Try another email";
    }
} else {
    header("Location: ../View/error/404.php");
}
