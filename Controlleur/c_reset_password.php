<?php
session_start();
require_once __DIR__ . "/../Controlleur/Controlleur.class.php";
$unControleur = new Controleur();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $resetRequest = $unControleur->getUserByToken($token);
    
    if ($resetRequest) {
        // Vérification que le token n'est pas expiré
        if (strtotime($resetRequest['expiration']) >= time()) {
            // Le token est valide
            if (isset($_POST['reset_password'])) {
                $newPassword     = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];
                
                if ($newPassword === $confirmPassword) {
                    // Récupération du "sel" pour le hashage (même méthode que lors de la connexion)
                    $grainsel = $unControleur->getSelHashé();
                    $hashedPassword = sha1($newPassword) . sha1($grainsel[0]);
                    
                    // Mise à jour du mot de passe en base
                    $unControleur->updateUserPassword($resetRequest['ID_USER'], $hashedPassword);
                    
                    // Supprimer le token pour éviter une réutilisation
                    $unControleur->deleteResetToken($resetRequest['ID_USER']);
                    
                    $message = "Votre mot de passe a été réinitialisé avec succès.";
                } else {
                    $message = "Les mots de passe ne correspondent pas.";
                }
            }
        } else {
            $message = "Le lien de réinitialisation a expiré.";
            $resetRequest = false;
        }
    } else {
        $message = "Lien invalide.";
    }
} else {
    $message = "Aucun token fourni.";
}

require_once __DIR__ . "/../Vue/vue_reset_password.php";