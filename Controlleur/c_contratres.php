<?php 
require_once __DIR__ . "/../Controlleur/Controlleur.class.php";
$unControleur = new Controleur(); 
$lesLocataires= $unControleur->selectAllLocataires();
$lesBatiments= $unControleur->selectAllBatiments();
$lesAppartements= $unControleur->selectAllAppartements();
$unContratDR= NULL;

if (isset($_POST["creer"])) {
    $unContratDR = $unControleur->insertContratDeReservation($_POST);
    if ($unContratDR) {
        echo "Ajout d\'un CDR réussi";
        header("location: ../vue/vue_gestionadmin.php");
        exit;
    } else {
        echo "<script> alert('Échec de l\'ajout d/'un CDR)</script>";
    }
}

require_once __DIR__ . "/../Vue/vue_insert_contratres.php";
?>