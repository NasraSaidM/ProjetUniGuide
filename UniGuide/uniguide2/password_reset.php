<?php 
include('mailer.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['password_reset_link'])){
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(16));
   $token_hash = hash("sha256",$token);

    $expiry= date("Y-m-d H:i:s",time()+ 60*30 );
 



     $mysqli = new mysqli("localhost", "root", "", "guide");


      if ($mysqli->connect_error) {
           die("Connection failed: " . $mysqli->connect_error);
      }

     $sql = "UPDATE eleve SET reset_token_hash = ? , reset_token_expired = ? WHERE email_eleve = ? ";
            
      $stmt= $mysqli -> prepare($sql);
     if (!$stmt) {
       die("Prepare failed:  " . $mysqli->error);
     }
     $stmt ->bind_param("sss",$token_hash,$expiry,$email);
     $stmt -> execute();
     if ($stmt->errno !== 0) {
      echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
  } 

     if ($mysqli->affected_rows){




require __DIR__.'/vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP(); 
$mail->SMTPAuth   = true; 
$mail->Host  = 'smtp.gmail.com';   
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
$mail->Port   = 587;
$mail->Username   = 'habibzeinab81@gmail.com';
$mail->Password   = 'ijde qjew kuzs miaw';

$mail->isHTML(true);
return $mail;


       $mail-> setFrom("habibzeinab81@gmail.com");
       $mail->addAddress($email);
       $mail->Subject ="password resset";

       $body = "Toucher <a href='http://localhost/PROJET/UniGuide/uniguide2/mdp.php?token=$token' > ici </a> pour reinitialiser votre mot de passe. ";
       $mail->Body =  $body;

    try {
      $mail->send();
    
    } catch (Exception $e ){
      echo"Message could not be sent. Mailer error: {$mail->ErrorInfo}";
    }
 }


 echo   "message sent . please check your inbox";

}






?>