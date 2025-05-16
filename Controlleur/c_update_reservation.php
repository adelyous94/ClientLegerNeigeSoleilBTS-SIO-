<?php
ini_set('display_errors', 1);  // Afficher les erreurs
error_reporting(E_ALL);        // Afficher toutes les erreurs
session_start();
require_once __DIR__ . "/../Controlleur/controlleur.class.php";
$unControleur = new Controleur();

$id_user = $_SESSION['id_user'];
$numero_contrat = $_GET['numero_contrat'];
$id_batiment = $_GET['id_batiment'];    
$numero_appartement = $_GET['numero_appartement'];


$lesContrats = array_column($unControleur->verifierNumeroContrat($id_user),"numero_contrat");    
$lesBats = array_column($unControleur->verifierAppartLocataire($id_user),"id_batiment");
$lesApparts = array_column($unControleur->verifierAppartLocataire($id_user),"numero_appartement");


if (!isset($id_batiment) || !isset($numero_appartement) || empty($id_batiment) || empty($numero_appartement) || !isset($numero_contrat) || empty($numero_contrat) || !in_array($numero_contrat, $lesContrats) || !in_array($numero_appartement, $lesApparts) || !in_array($id_batiment, $lesBats)) {
    header("Location: ../Vue/Erreur404.php");
    exit();
    
}else{
    $laReservation = $unControleur->selectLaReservation($numero_contrat,$id_batiment, $numero_appartement);
}


if (isset($_POST['Modifier'])){
    $tab = [
        "numero_contrat" => $numero_contrat,
        "id_batiment" => $id_batiment,
        "numero_appartement" => $numero_appartement,
        "date_debut" => $_POST['date_debut'],
        "date_fin" => $_POST['date_fin']];

        $unControleur->updateContratDeReservationLocataire($tab);
        
        echo "Votre modification a été prise en compte"; 

header("Location: ../Controlleur/c_mes_reservations.php");
}

require_once __DIR__ . "/../Vue/vue_update_reservation.php";