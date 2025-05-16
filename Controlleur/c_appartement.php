<?php
session_start();
require_once __DIR__ . "/../Controlleur/Controlleur.class.php";
$unControleur = new Controleur(); 
$unAppartement = null; 
$lesBatiments = $unControleur->selectAllBatiments();
$lesVilles = $unControleur->selectAllVille();
$lesProprietaires = $unControleur->selectAllProprietaires();
$unAppartement2= $unControleur->selectAllAppartements();


if (isset($_POST["ajouter"])) {
    $unAppartement = $unControleur->insertAppartement($_POST);
    var_dump($unAppartement);
    if ($unAppartement) {
        echo "Ajout d\'appartement réussi";
        header("location: ../vue/vue_gestionadmin2.php");
        exit;
    } else {
        echo "<script> alert('Échec de l\'ajout de l\'appartement')</script>";
    }
}
$unAppart = null ;
if (isset($_GET['id']) && isset($_GET['idbat']))
{
    $id = $_GET['id']; 
    $idbat = $_GET['idbat'] ; 
    $unAppart = $unControleur->selectWhereAppartement($idbat, $id) ;
}
//var_dump($unAppart);
require_once __DIR__ . "/../Vue/vue_insert_appartements2.php";

if (isset($_POST["modifier"])) {
    $unAppartement = $unControleur->updateAppartement($_POST);
    
     
    header("location: ../vue/vue_gestionadmin2.php");
        
}