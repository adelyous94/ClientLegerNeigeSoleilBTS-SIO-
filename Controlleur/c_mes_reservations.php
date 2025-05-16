<?php
session_start();
require_once __DIR__ . "/../Controlleur/Controlleur.class.php";
$unControleur = new Controleur();


$id_locataire = $_SESSION['id_user'];

$reservations = $unControleur->selectReservationsLocataire($id_locataire); 

require_once __DIR__ . "/../Vue/vue_mes_reservations.php";