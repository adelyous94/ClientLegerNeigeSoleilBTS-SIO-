<?php
session_start();
require_once '../Controlleur/Controlleur.class.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("location: vue_interdictionadmin.php");
    exit();
}
$unControleur = new Controleur();
$lesAppartements =$unControleur->selectAllAppartements();
$nombreAppartement = $unControleur->selectCountAppartement();
$nombreProprietaire = $unControleur->selectCountProprietaire();
$nombreCDR = $unControleur->selectCountCDR();
$lesProprietaires= $unControleur -> selectAllProprietaires();
$lesContrats=$unControleur->selectAllContratDeReservation();

require_once("../vue/vue_gestionadmin2.php");


?>