<?php
session_start();    
require_once __DIR__ . "/Controlleur.class.php";
$unControleur = new Controleur();

$ville = null;
$type = null; 
$debut = null;
$fin = null;


if (isset($_GET['ville']) || isset($_GET['type']) || isset($_GET['debut']) || isset($_GET['fin'])) {
    $ville = $_GET['ville'];
    $type = $_GET['type'];
    $debut = $_GET['debut'];
    $fin = $_GET['fin'];
}

if (isset($_POST["Rechercher"])) {
    if (!empty($ville) && !empty($type) && !empty($debut) && !empty($fin)) {
        $ville = null;
        $type = null; 
        $debut = null;
        $fin = null;
    }
    $ville = $_POST['ville'];
    $type = $_POST['type'];
    $debut = $_POST['debut'];
    $fin = $_POST['fin'];
}

// Récupérer les annonces
$annonces = $unControleur->selectAnnonces($ville, $type, $debut, $fin);

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

// Calculer les tarifs pour chaque annonce
foreach ($annonces as &$annonce) {
    $id_batiment = $annonce['ID_BATIMENT'];
    $numero_appartement = $annonce['NUMERO_APPARTEMENT'];

    // Condition pour déterminer la saison et calculer le tarif
    if (estDansPeriode($dateActuelle, $saisons["haute"])) {
        $tarif = $unControleur->selectWhereTarifHaute($id_batiment, $numero_appartement);
        $prix = $tarif['tarif_haute'];     
    } elseif (estDansPeriode($dateActuelle, $saisons["moyenne"])) {
        $tarif = $unControleur->selectWhereTarifMoyen($id_batiment, $numero_appartement);
        $prix = $tarif['tarif_moyen'];
    } else {
        $tarif = $unControleur->selectWhereTarifBasse($id_batiment, $numero_appartement);
        $prix = $tarif['tarif_basse'];
    }
    $annonce['prix'] = $prix;
}

// Pagination
$annoncesParPage = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalAnnonces = count($annonces);
$totalPages = ceil($totalAnnonces / $annoncesParPage);
$offset = ($page - 1) * $annoncesParPage;

// Sélectionner les annonces pour la page actuelle
$annoncesPage = array_slice($annonces, $offset, $annoncesParPage);

// Inclure la vue
require_once __DIR__ . "/../Vue/vue_annonces.php";
?>
