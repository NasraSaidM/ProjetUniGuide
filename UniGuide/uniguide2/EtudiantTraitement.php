<?php
session_start();
require_once("connexion.php");
if (isset($_POST['Connexion'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $vide = null;

    // Récupérez le mot de passe depuis la base de données en utilisant l'e-mail stocké dans $_SESSION['num_etd']
    $query = "SELECT * FROM `eleve` AS E,`serie` AS S  WHERE E.id_serie=S.id_serie AND E.email_eleve = '$email'";
    
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Vérifiez si l'email a été trouvé dans la base de données
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['mdp_eleve'];

            $password = $_POST['password'];

            // Comparez le mot de passe directement
            if (password_verify($password, $stored_password)) {
                // Le mot de passe est correct
                $_SESSION['id_etudiant'] = $row['id_eleve'];
                $_SESSION['nom_etudiant'] = $row['nom_eleve'];
                $_SESSION['nom_serie'] = $row['nom_serie'];
                $_SESSION['prenom_etudiant'] = $row['prenom_eleve'];
                if($_SESSION['nom_serie'] =='S'){
                    header('location:../../main/Main_S/index.html');
              }
              else if($_SESSION['nom_serie'] =='ES'){
                  header('location:../../main/Main_ES/index.html');
            }
              else if($_SESSION['nom_serie'] =='L'){
                  header('location:../../main/Main_L/index.html');
            }
            else if($_SESSION['nom_serie'] =='IAG'){
              header('location:../../main/Main_IAG/index.html');
           }
        else if($_SESSION['nom_serie'] =='OGRH'){
          header('location:../../main/Main_OGRH/index.html');
         }else{
          header('location:../../main/Main_GFM/index.html');
         }

            } else {
                $vide = "Mot de passe incorrect!";
            }
        } else {
            // L'email n'a pas été trouvé dans la base de données, affichez un message d'erreur
            $vide = "E-mail non trouvé.";
        }
    } else {
        $vide = "Erreur dans la requête SQL : " . mysqli_error($conn);
    }
}

if (isset($_POST['Envoyer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $serie = $_POST['serie'];
    $conf = $_POST['confirmation'];
    $verification_token=0;
    $token=0;

    $resultat = mysqli_query($conn, "SELECT id_serie FROM serie WHERE nom_serie = '$serie'");
    $row = mysqli_fetch_assoc($resultat);


   if ($conf == $mot_de_passe ){

   

    if ($row) {
        $id_serie = $row['id_serie'];
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `eleve`(`id_serie`, `nom_eleve`, `prenom_eleve`, `email_eleve`, `sexe_eleve`, `mdp_eleve`)
        VALUES ('$id_serie', '$nom', '$prenom', '$email', '$sexe', '$mot_de_passe_hache')";
        
        if (mysqli_query($conn, $sql)) {
            $query = "SELECT * FROM `eleve` AS E, `serie` AS S WHERE E.id_serie = S.id_serie AND E.email_eleve = '$email'";
            if ($result = mysqli_query($conn, $query)) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $mdp_base = $row['mdp_eleve'];
            
                    // Utilisez password_verify pour comparer les mots de passe
                    if (password_verify($mot_de_passe, $mdp_base)) {
                        $_SESSION['id_eleve'] = $row['id_eleve'];
                        $_SESSION['nom_eleve'] = $row['nom_eleve'];
                        $_SESSION['nom_serie'] = $row['nom_serie'];
                        $_SESSION['prenom_eleve'] = $row['prenom_eleve'];
                        
                        header('location:index.php');
            
                        
                        exit(); // Assurez-vous de terminer l'exécution du script après la redirection
                    } else {
                        $vide1 = "Mot de passe incorrect!";
                    }
                }
            }
            
        } else {
            $vide1 = "Échec de l'enregistrement de l'élève.";
        }
    } else {
        $vide1 = "Erreur dans la requête SQL : " . mysqli_error($conn);
    }
} 
else {
    $error_message = "Votre mot de passe est incorrect.Veuillez réessayer!";
}
}



if (isset($_POST['oublie'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $vide1 = null;

    // Vérification que les données fournies sont correctes
    $query = "SELECT email_eleve FROM eleve WHERE email_eleve = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['email_eleve'] === $email) {
            // Vérification que les deux nouveaux mots de passe sont identiques
            if ($password === $password1) {
                // Insérer le mot de passe tel quel dans la base de données
                $update_query = "UPDATE eleve SET mdp_eleve = '$password' WHERE email_eleve = '$email'";
                $validation = mysqli_query($conn, $update_query);

                if ($validation) {
                    $vide1 = "La modification du mot de passe est réussie !!";
                } else {
                    $vide1 = "Erreur lors de la mise à jour du mot de passe.";
                }
            } else {
                $vide1 = "Les deux mots de passe ne sont pas identiques !!";
            }
        } else {
            $vide1 = "Les informations fournies sont incorrectes.";
        }

        mysqli_free_result($result);
    } else {
        $vide1 = "Erreur lors de la récupération des informations de l'étudiant.";
    }
}


?>
