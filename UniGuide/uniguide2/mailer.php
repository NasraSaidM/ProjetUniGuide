<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



require __DIR__.'/vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP(); 
$mail->SMTPAuth   = true; 
$mail->Host  = 'smtp.gmail.com';   
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
$mail->Port   = 587;
$mail->Username   = 'habibzeinab81@gmail.com';
$mail->Password   = '';

$mail->isHTML(true);
return $mail;




?>