<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer\src\PHPMailer.php');
require('PHPMailer\src\SMTP.php');
require('PHPMailer\src\Exception.php');

	
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$mail = new PHPMailer(true);
	
	try {
		// Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'nurmuhamadhusein@gmail.com';
		$mail->Password = 'tmcr ywhl rqqs sqgo';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$mail->Port = 465;

		// Recipient
		$mail->setFrom('nurmuhamadhusein@gmail.com', 'Mailer');
		$mail->addAddress('nurmuhamadhusein@gmail.com', 'Husein');
		
		// Content
		$mail->isHTML(true);
		$mail->Subject = 'Here is the subject';
		$mail->Body = 'This is the HTML message body <b>in bold!</b> '.$_POST['package'];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients '.$_POST['package'];
		
		$mail->send();
		echo 'Sent.';
		header('Location: book.php');
	} catch (Exception $exception) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
?>