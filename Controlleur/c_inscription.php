<?php
ob_start();
session_start();
require_once __DIR__ . "/../Controlleur/Controlleur.class.php";
$unControleur = new Controleur();
$unUser = null;
$userConnecte = null;
$lesVilles = $unControleur->selectAllVille();


require_once __DIR__ . "/../Vue/vue_inscription.php";

if (isset($_POST["Inscription"])) {
    $unUser = $unControleur->insertUser($_POST);
    var_dump($unUser);
    $grainsel= $unControleur->getSelHashé();
    $email = $_POST["email"];
    $mdp = sha1($_POST["mdp"]).sha1($grainsel[0]);
    $userConnecte = $unControleur->verifConnexion($email, $mdp);
    if ($userConnecte) {
        echo "<script> alert('Inscription réussie')</script>";


        if (is_array($userConnecte)) {
            $_SESSION['nom'] = $userConnecte['NOM'];
            $_SESSION['prenom'] = $userConnecte['PRENOM'];
            $_SESSION['email'] = $userConnecte['EMAIL'];
            $_SESSION['role'] = $userConnecte['ROLE'];
            $_SESSION['id_user'] = $userConnecte['ID_USER'];
        } else {
            echo "<script> alert('Inscription Echouée')</script>";
        }

        header('Location: ../index.php');
        exit;
    } else {
        echo "<script> alert('Inscription Echouée')</script>";
    }
}
ob_end_flush(); 