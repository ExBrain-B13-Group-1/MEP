<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './lib/PHPMailer/src/Exception.php';
require './lib/PHPMailer/src/PHPMailer.php';
require './lib/PHPMailer/src/SMTP.php';


class SendMail
{
    public function sendMail($toMail, $subject, $body)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'myanmareduportal@gmail.com'; // <<< Change 
            $mail->Password   = 'uvkqraahrqohlujw'; // <<< Change
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('myanmareduportal@gmail.com', 'Myanmar Education Portal'); //<<< Change
            $mail->addAddress($toMail);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
