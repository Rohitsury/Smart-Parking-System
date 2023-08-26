<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
	$mail->addAddress('suryavanshir20@gmail.com');
	
	$mail->isHTML(true);
	$mail->Subject = 'Subject';
	$mail->Body = 'HTML message body in <b>bold</b>';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
