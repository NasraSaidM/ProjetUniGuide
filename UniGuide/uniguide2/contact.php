<?php
ini_set('SMTP', 'localhost');
ini_set('smtp_port', 25);
if (isset($_POST['send'])) {
    $to_email = "uniguide37@gmail.com"; // Replace with your email address
    $subject = "Soumisson du formulaire de contact";
    
    // Collect form data
    $name = test_input($_POST["nom"]);
    $email = test_input($_POST["mail"]);
    $phone = test_input($_POST["numero"]);
    $message = test_input($_POST["Message"]);

    // Compose the email message
    $email_message = "Nom: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Téléphone: $phone\n\n";
    $email_message .= "Message:\n$message\n";

    // Additional headers
    $headers = "From: $email";

    // Send email
    if (mail($to_email, $subject, $email_message, $headers)) {
        echo "Votre message a été envoyé avec succès.";
        echo '<script>window.setTimeout(function() {
          window.location.href = "../../UniGuide/contact.html";
      }, 5000);</script>';
    } else {
        echo "Erreur lors de l'envoi du message. Veuillez réessayer.";
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
