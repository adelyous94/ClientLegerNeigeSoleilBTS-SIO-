<?php 
session_start();
require_once __DIR__ . "/../Controlleur/Controlleur.class.php"; 
$unControleur = new Controleur(); 

require_once __DIR__ . "/../Vue/vue_indexadmin.php"; 

if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("location: vue_interdictionadmin.php");
    exit();
}


if (isset($_POST['Deconnexion'])) {
	            header("location: c_deconnexion.php");     
	          }

?>