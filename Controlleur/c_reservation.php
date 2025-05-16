<?php
session_start();
if ($_SESSION["role"] !== "Locataire" && $_SESSION["role"] !== "Admin") {
  header("Location: ../Controlleur/c_connexion.php");
}

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

$id_batiment = $_GET['id_batiment'];
$numero_appartement = $_GET['numero_appartement'];

$check=$unControleur->verifierAppartement($id_batiment, $numero_appartement);
if ($check == 1) {
    
    $annonce = $unControleur->selectWhereAppartement($id_batiment, $numero_appartement);
}
else {
    header("Location: ../Vue/Erreur404.php"); 
}




if (isset($_POST['reserver'])){
    $tab = [
        "id_locataire" => $_SESSION['id_user'],
        "id_batiment" => $annonce['ID_BATIMENT'],
        "numero_appartement" => $annonce['NUMERO_APPARTEMENT'],
        "date_reservation" => date("Y-m-d"),
        "arrhes" => "Non_Payé",
        "solde" => "Non_Payé",
        "etat" => "En_Cours"];

    $Contrat=$unControleur->insertContratDeReservationLocataire($tab);

    if ($Contrat){
        echo "<script>alert('Réservation effectuée avec succès')</script>";
    } else {
        echo "<script>alert('Erreur lors de la réservation')</script>";
    }

    $tabl = [
        "numero_contrat" => $Contrat,
        "date_debut" => $_POST['date_debut'],
        "date_fin" => $_POST['date_fin']];

$unControleur->insertSemainesLouees($tabl); 

header("Location: ../Controlleur/c_mes_reservations.php");
}


require_once __DIR__ . "/../Vue/vue_reservation.php";

?>