<?php
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
    
}else {
    $laReservation = $unControleur->selectLaReservation($numero_contrat,$id_batiment, $numero_appartement);
}

if (isset($_POST['Delete'])){
    $unControleur->deleteReservation($numero_contrat);
    header("Location: ../Controlleur/c_mes_reservations.php");
    exit(); 
}

$Louee = $unControleur->verifierLocation($numero_contrat);











require_once __DIR__ . "/../Vue/vue_detail_reservation.php";