<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="../CSS/votre_style.css">
</head>
<body>
    <h2>Réinitialisation du mot de passe</h2>
    <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
    
    <?php if (isset($resetRequest) && $resetRequest && strtotime($resetRequest['expiration']) >= time()): ?>
        <form method="post" action="">
             <label for="new_password">Nouveau mot de passe :</label>
             <input type="password" name="new_password" id="new_password" required>
             <br>
             <label for="confirm_password">Confirmez le nouveau mot de passe :</label>
             <input type="password" name="confirm_password" id="confirm_password" required>
             <br>
             <button type="submit" name="reset_password">Réinitialiser</button>
        </form>
    <?php endif; ?>
    <p><a href="../Controlleur/c_connexion.php">Retour à la connexion</a></p>
</body>
</html>
