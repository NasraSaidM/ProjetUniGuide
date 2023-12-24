<?php
ini_set('SMTP', 'localhost');
ini_set('smtp_port', 25);
$mysqli = new mysqli("localhost", "root", "", "guide");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['password_reset_link'])) {
    $email = $_POST['email']; 

    // Échapper les caractères spéciaux dans l'e-mail pour éviter les injections SQL (c'est une mesure de sécurité)
    $email = $mysqli->real_escape_string($email);

   
    $query = "SELECT email_eleve FROM eleve WHERE email_eleve = '$email'";
    $result = $mysqli->query($query);

    if ($result->num_rows === 0) {
        
        echo "Vous n'êtes pas inscrit.";
    } else {
        
        $to = $email;
        $subject = "Réinitilisation du mot de passe";
        $mdp_link = 'http://localhost/PROJET/UniGuide/uniguide2/mdp.php';

        // Message with button link
        $message = "<table cellspacing='0' cellpadding='0'>
        <tr>
            <td style='font-size: 14px; padding-top: 10px; margin-top:10px;'>Cliquez sur le bouton ci-dessous pour réinitialiser votre mot de passe.</td>
        </tr>
        <tr>
        <td style='padding: 8px 5px; background-color: #007bff; border-radius: 5px;'>
            <a href='$mdp_link' style='color: #ffffff; text-decoration: none;'>Réinitialiser le mot de passe</a>
        </td>
    </tr>
    </table>";


        // Additional headers
        $headers = "From: your_email@example.com"; // Remplacez avec votre adresse e-mail
        $headers .= "\r\nContent-Type: text/html; charset=UTF-8"; // Set content type as HTML

        // Envoyer l'email
        if (mail($to, $subject, $message, $headers)) {
            echo "Email envoyé avec succès à $to";
            echo '<script>window.setTimeout(function() {
                window.location.href = "index.php";
            }, 5000);</script>';
        } else {
            echo "Échec de l'envoi de l'email";
        }
    }
}
?>
