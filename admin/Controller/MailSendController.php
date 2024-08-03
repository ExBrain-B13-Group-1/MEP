<?php
ini_set('display_errors', '1');

include "./common/mailSender.php";

$template =file_get_contents("./mailtemplate/welcome_template.html");

$template = str_replace("###username","Linn Ko",$template);

$mail = new SendMail();
$mail->sendMail(
    "@gmail.com",
    "Welcome From Our System",
    $template
    )
?>