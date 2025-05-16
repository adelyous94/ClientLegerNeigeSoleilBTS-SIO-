<?php 
session_start();
require_once __DIR__ ."/../Controlleur/Controlleur.class.php";
$unControleur  = new Controleur(); 



if (isset($_POST['Connexion'])) {
    $grainsel=$unControleur->getSelHashé();
    $email = $_POST['EMAIL']; 
    $mdp = sha1($_POST['MDP']).sha1($grainsel[0]);
    $unUser = $unControleur->verifConnexion($email, $mdp);      

    if ($unUser) {
        var_dump($unUser);
        // Stocker les informations utilisateur dans la session
        $_SESSION['nom'] = $unUser['NOM'];
        $_SESSION['prenom'] = $unUser['PRENOM'];
        $_SESSION['email'] = $unUser['EMAIL'];
        $_SESSION['role'] = $unUser['ROLE'];
        $_SESSION['id_user'] = $unUser['ID_USER'];

        echo "Vous êtes connecté en tant que " . $_SESSION['role'];
        
        // Redirections en fonction du rôle
        if ($_SESSION['role'] == "Admin") {
            header("Location: ../Vue/vue_indexadmin.php");
            exit; // Toujours utiliser exit après un header("Location")
        } elseif ($_SESSION['role'] == "Locataire") {
            header("Location: ../Vue/vue_indexclient.php");
            exit;
        } elseif ($_SESSION['role'] == "Proprietaire") {
            header("Location: ../Vue/vue_indexproprio.php");
            exit;
        } else {
            // Rôle inconnu
            echo "Rôle non reconnu.";
        }
    } else {
        // Si $unUser est vide (identifiants incorrects)
        echo "Vérifiez vos identifiants";
    }
}

require_once __DIR__ . ("/../Vue/Vue_Connexion.php");