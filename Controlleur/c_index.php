<?php 
session_start();
require_once 'Controlleur/Controlleur.class.php';
$unControleur = new Controleur();

// Vérifier si une session existe
if (isset($_SESSION['role'])) {
    // Vérifier le rôle de l'utilisateur
    if ($_SESSION['role'] == 'Admin') {
        header("Location: Vue/vue_indexadmin.php");
        exit(); // Toujours inclure exit() après header() pour éviter d'exécuter le reste du code
    } else if ($_SESSION['role'] == 'Locataire') {
        header("Location: Vue/vue_indexclient.php");
        exit();
    } else if ($_SESSION['role'] == 'Proprietaire') {
        header("Location: Vue/vue_indexproprio.php");
    }
} 



require_once __DIR__ . "/index.php";