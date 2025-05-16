<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("location: ../vue/vue_interdictionadmin.php");
    exit();
}

require_once __DIR__ . "/../Controlleur/Controlleur.class.php";
$unControleur = new Controleur(); 
$unLocataire = null; 
$lesVilles = $unControleur->selectAllVille();


if (isset($_POST["ajouter"])) {
    $unLocataire = $unControleur->insertLocataire($_POST);
    
    if ($unLocataire) {
        echo "Ajout du locataire réussi";
        header("location: ../vue/vue_gestionadmin.php");
        exit;
    } else {
        echo "<script> alert('Échec de l\'ajout du locataire')</script>";
    }
}

require_once __DIR__ . "/../Vue/vue_insert_locataire.php";

?>