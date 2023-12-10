<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <script>
    if (window.history && window.history.pushState) {
        window.history.pushState('forward', null, 'index.php');
        window.onpopstate = function () {
            window.location.href = "index.php";
        };
    }
</script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="">
                <h2>Créer un compte</h2>

                <div class="scrollable-container">
                    <label for="nom">Nom :</label>
                    <input type="text" placeholder="Nom" name="nom" required>
                
                    <label for="prenom">Prénom :</label>
                    <input type="text" placeholder="Prénom" name="prenom"required>
        
                    <label for="email">E-mail :</label>
                    <input type="email" placeholder="E-mail" name="email"required>
                    
                    <label for="sexe">sexe :</label>
                    <select class="form-control" id="sexe" name="sexe"required>
                        <option value="Feminin">Feminin</option>
                        <option value="Masculin">Masculin</option>
                        </select>
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" placeholder="Mot de passe" name="mot_de_passe"required>
                   

                <style>
                    /* Style de base pour la balise select */
                    select {
                        padding: 8px;
                        font-size: 16px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        margin-bottom: 10px;
                    }

                    /* Style au survol */
                    select:hover {
                        border-color: #666;
                    }

                    /* Style au focus */
                    select:focus {
                        outline: none;
                        border-color: #3498db;
                        box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
                    }

                </style>
                    <label for="serie">Série :</label>
                    <select class="form-control" id="serie" name="serie"required>
                        <option value="S">S</option>
                        <option value="L">L</option>
                        <option value="ES">ES</option>
                        <option value="IAG">IAG</option>
                        <option value="GFM">GFM</option>
                        <option value="OGRH">OGRH</option>

                    </select>
                </div>
                <button type="submit" value="enregistre" name="Envoyer">enregistre</button>
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
        <div class="form-container sign-in"style="width:400px">
        <form method="POST" action="">
                <h1>Se connecter</h1>
                <span> utilisez votre adresse e-mail et mot de passe</span>
                <label for="email">E-mail :</label>
                    <input type="email" placeholder="E-mail" name="email">
                    <label for="password">Mot de passe :</label>
                    <input type="password" placeholder="Mot de passe" name="password">
                  
                <a href="mdp.php">Mot de passe oublié ?</a>
                <a href="conneadm.php">Administrateur</a>
                <button type="submit" value="Connexion" name="Connexion">Se connecter</button>
                <div  class="oui error-message">
                <style>
                    .error-message {
                        color: red;
                    }
                </style>

                    <p>
                    <?php echo $vide; ?>
                    </p> 
              </div>
                
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Inscription</h1>
                    <p>Inscrivez vous pour accédez a notre site</p>
                    <button class="hidden" id="login">Se connecter</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenue dans notre site </h1>
                    <p>Connectez vous aves vos données personnelles</p>
                    <button class="hidden" id="register">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>