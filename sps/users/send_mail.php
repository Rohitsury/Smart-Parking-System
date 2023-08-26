<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email=$_POST['email'];
$otp=rand(1000, 9999);
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'suryavanshir72@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'sjzavdconylbwwgr'; // Replace with your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('suryavanshir72@gmail.com', 'rohit');
    $mail->addAddress($email);
    
    $mail->isHTML(true);
    $mail->Subject = 'SPS OTP';
    $mail->Body = 'OTP is <b>'.$otp.'</b>';
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    $_POST['status']=base64_encode($otp);
    header("location: /sps/users/verify_otp.php?data=".json_encode($_POST));
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
