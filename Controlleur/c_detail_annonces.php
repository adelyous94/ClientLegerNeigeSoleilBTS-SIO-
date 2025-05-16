<?php
session_start();
require_once __DIR__ . "/Controlleur.class.php";
$unControleur = new Controleur();

// Extraire les ID_BATIMENT sous forme d'un tableau simple
$lesID = array_column($unControleur->verifierIdBat(), 'ID_BATIMENT');

// Extraire les NUMERO_APPARTEMENT sous forme d'un tableau simple
$lesAppart = array_column($unControleur->verifierAppart(), 'NUMERO_APPARTEMENT');

if (!isset($_GET['id_batiment']) || !isset($_GET['numero_appartement']) || empty($_GET['id_batiment']) || empty($_GET['numero_appartement']) || !in_array($_GET['id_batiment'], $lesID) || !in_array($_GET['numero_appartement'], $lesAppart)) {
    header("Location: ../Vue/Erreur404.php");
    exit();
}

$id_batiment = $_GET['id_batiment'] ;
$numero_appartement = $_GET['numero_appartement'] ;

$check=$unControleur->verifierAppartement($id_batiment, $numero_appartement);
if ($check == 1) {
$annonce = $unControleur->selectAppartementEkip($id_batiment, $numero_appartement);

}
else {
    header("Location: ../Vue/Erreur404.php"); 
}

$prixAffiche=$_GET['prix']; 

$anneeActuelle = date("Y");
$moisActuel = date("n"); // mois sans les zéros initiaux (1 à 12)

if ($moisActuel >= 1 && $moisActuel <= 3) {
    // Si nous sommes en janvier, février ou mars, la saison d'hiver a commencé l'année précédente
    $anneeHiverDebut = $anneeActuelle - 1;
    $anneeHiverFin = $anneeActuelle;
} else {
    $anneeHiverDebut = $anneeActuelle;
    $anneeHiverFin = $anneeActuelle + 1;
}

$saisons = [
    "haute" => [
        ["$anneeHiverDebut-12-01", "$anneeHiverFin-03-09"], // Hiver (ski)
        ["$anneeActuelle-07-01", "$anneeActuelle-08-31"]  // Été
    ],
    "moyenne" => [
        ["$anneeActuelle-04-01", "$anneeActuelle-05-04"], // Printemps
        ["$anneeActuelle-10-20", "$anneeActuelle-11-03"]  // Vacances de la Toussaint
    ],
    "basse" => [
        // Tout le reste = basse saison
    ]
];


// Fonction pour vérifier si une date est dans une période
function estDansPeriode($date, $periodes) {
    foreach ($periodes as [$debut, $fin]) {
        if ($date >= $debut && $date <= $fin) {
            return true;
        }
    }
    return false;
}

// Récupérer la date actuelle
$dateActuelle = date("Y-m-d");

$lesPrixHaute = $unControleur->verifierPrixHaute($id_batiment,$numero_appartement);

$lesPrixMoyen = $unControleur->verifierPrixMoyen($id_batiment,$numero_appartement);

$lesPrixBas = $unControleur->verifierPrixBas($id_batiment,$numero_appartement);

if(estdansPeriode($dateActuelle,$saisons["haute"] )) {
    if($prixAffiche !== $lesPrixHaute[0]) {
        //
    header("Location: ../Vue/Erreur404.php");}
    } else if (estDansPeriode( $dateActuelle,$saisons["moyenne"] )) {
        if($prixAffiche !== $lesPrixMoyen[0]) {
            //header("Location: ../Vue/Erreur404.php");
            echo "Moyenne";
        }
    } else if (estDansPeriode($dateActuelle,$saisons["basse"] )) {
        if($prixAffiche !== $lesPrixBas[0]) {
            //header("Location: ../Vue/Erreur404.php");
            echo "Basse";
        }
    }



 require_once __DIR__ . "/../Vue/vue_detail_annonces.php";
