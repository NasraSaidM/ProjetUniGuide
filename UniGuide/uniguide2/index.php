<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
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
    if(isset($error_message)){
        echo $error_message;
    }
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
                    
                    <label for="sexe">Sexe :</label>
                    <select class="form-control" id="sexe" name="sexe"required>
                        <option value="Feminin">Feminin</option>
                        <option value="Masculin">Masculin</option>
                        </select>
                        
                    <label for="mot_de_passe">Mot de passe :</label>

                    <div class="password_check">
                    
                    <input onkeyup="trigger()" onkeyup="checkPassword()" id="password" class="pass_input password" type="password" placeholder="Mot de passe" name="mot_de_passe" required >
                     <span class="showBtn">Voir</span>
                    </div>
                    <div class="indicateur">
                        <span class=" weak"></span>
                        <span class=" medium"></span>
                        <span class=" strong"></span>
                    </div>
                    <div class="text">Ton mot de passe est faible</div>
                    <script>
                        const indicateur= document.querySelector(".indicateur");
                        const input= document.querySelector(".pass_input");
                        const weak= document.querySelector(".weak");
                        const medium= document.querySelector(".medium");
                        const strong= document.querySelector(".strong");
                        const text= document.querySelector(".text");
                        const btn= document.querySelector(".showBtn");
                        let Weakpass = /[a-z]/  ;
                        let Mediumpass = /\d/;
                        let Strongpass = /[!,@,#,$,%,^,&,*,?,_,~,\-,(,)€]/;

                        let no = 0;
                        function trigger(){
                            
                            if (input.value != ""){
                                indicateur.style.display="block";
                                indicateur.style.display="flex";
                                

                                if (input.value.length <=3 && (input.value.match(Weakpass) || input.value.match(Mediumpass) || input.value.match(Strongpass))) 
                                {
                                    no=1;
                                }
                                if (input.value.length >=6 && ((input.value.match(Weakpass) && input.value.match(Mediumpass)) ||   (input.value.match(Mediumpass) && input.value.match(Strongpass)) || (input.value.match(Weakpass) && input.value.match(Strongpass)))) no=2;

                                if (input.value.length >=6 && input.value.match(Weakpass) && input.value.match(Mediumpass) && input.value.match(Strongpass)) no=3;

                                if (no ==1){
                                    console.log(no);
                                    weak.classList.add("active");
                                    text.style.display = "block";
                                    text.textContent = "Ton mot de passe est faible";
                                    text.classList.add("weak");
                                    
                                }
                                if (no ==2){
                                    console.log(no);
                                    medium.classList.add("active");
                                    text.style.display = "block";
                                    text.textContent = "Ton mot de passe est moyen";
                                    text.classList.add("medium");
                                    
                                } else{
                                    medium.classList.remove("active");
                                    text.classList.remove("medium");
                                    
                                }
                                if (no ==3){
                                    console.log(no);
                                    medium.classList.add("active");
                                    strong.classList.add("active");
                                    text.style.display = "block";
                                    text.textContent = "Ton mot de passe est fort";
                                    text.classList.add("strong");
                                    
                                } else{
                                    strong.classList.remove("active");
                                    text.classList.remove("strong");
                                    
                                }

                                btn.style.display="block";
                                btn.onclick = function (){
                                    if (input.type == "password"){
                                        input.type = "text";
                                        btn.textContent = "Voir";
                                    } else{
                                        input.type = "password";
                                        btn.textContent = "Masquer";
                                    }
                                }

                            } 
                            else{
                                indicateur.style.display="none";
                                text.style.display = "none";
                                btn.style.display="none";
                            }
                        }
                    </script>
                    <label for="cnfrm-password">Confirmation de mot de passe :</label>
                    <input id="cnfrm-password" onkeyup="checkPassword()" type="password" placeholder=" Confirmer le mot de passe" name="confirmation" required >
                  <p id="message"></p>
                  
                   
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
                <button type="submit" value="enregistre" name="Envoyer"  >enregistre</button>
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
            <script src="scriptt.js"></script>
        </div>
        <div class="form-container sign-in"style="width:400px">
        <form method="POST" action="">
                <h1>Se connecter</h1>
                <span> utilisez votre adresse e-mail et mot de passe</span>
                <label for="email">E-mail :</label>
                    <input type="email" placeholder="E-mail" name="email">
                    <label for="password">Mot de passe :</label>
                    <input type="password" placeholder="Mot de passe" name="password">
                  
                <a href="email_verification.php">Mot de passe oublié ?</a>
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
                    <button class="hidden" id="register" >S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>