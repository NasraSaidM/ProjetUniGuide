<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="image/GESTION.png" />
    <title>Gestion d'orientation de filière</title>
    <style>
        .scrollable-container {
            max-height: 300px; /* ajustez la hauteur selon vos besoins */
            overflow-y: auto;
        }
    </style>
    	<?php 
	error_reporting(0);
	require_once("EtudiantTraitement.php");
	?>
</head>

<body>
    
    <div class="container" id="container" style="position: relative; text-align: center;">
        <div class="form-container sign-in" style="position: relative; text-align: center; margin: 0 auto; max-width: 400px">
            <form  method="POST" action="">
                <h2>Mot de passe oublié</h2><br>
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" name="email" placeholder="Entrez votre adresse e-mail" required>
                
                    <label for="newPassword">Nouveau mot de passe :</label>
                    <input type="password"  name="password" placeholder="Entrez votre nouveau mot de passe" required>
                
                    <label for="confirmPassword">Confirmer le nouveau mot de passe :</label>
                    <input type="password"  name="password1" placeholder="Confirmez votre nouveau mot de passe" required>
                     
                    <a href="index.php">Se connecter</a>
                    <button type="submit" name="oublie">Valider</button>
                    <div  class="oui error-message">
                <style>
                    .error-message {
                        color: red;
                    }
                </style>

                    <p>
                    <?php echo $vide1; ?>
                    </p> 
              </div>
                </form>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>

</html>
