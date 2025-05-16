<?php
// Détruire la session pour déconnecter l'utilisateur
session_start();
session_unset(); // Supprime toutes les variables de session
session_destroy();// Détruire la session pour déconnecter l'utilisateur
// Rediriger l'utilisateur vers la page d'accueil
header("Location: ../index.php");
exit();  // Arrêter l'exécution du script

?>