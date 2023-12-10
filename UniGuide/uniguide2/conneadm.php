<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
   
    <title>Gestion d'orientation de filière</title>
    <style>
        .scrollable-container {
            max-height: 300px; /* ajustez la hauteur selon vos besoins */
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
       
        <div class="form-container sign-in"style="width:400px">
            <form >
                <h1>Se connecter</h1>
                <span> utilisez votre adresse e-mail et mot de passe</span>
                <label for="email">E-mail :</label>
                    <input type="email" placeholder="E-mail" name="email">
                    <label for="mot_de_passe">Mot de passe :</label>
                    <input type="password" placeholder="Mot de passe" name="mot_de_passe">
                  
                <a href="mdp.php">Mot de passe oublié ?</a>
                <button>Se connecter</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenue  </h1>
                    <p>Connectez vous en tant que administrateur</p>
                   
                </div>
            </div>
        </div>
    </div>

   
</body>

</html>