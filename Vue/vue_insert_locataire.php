<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/cssnavbar.css">
  <link rel="stylesheet" href="../CSS/formulaireinscription.css">
  <title>Ajouter un Locataire</title>
</head>
<body>
  <div class="rectangle">
    <legend><strong>Ajouter un Locataire</strong></legend>
    <form method="POST" action="">
      <div class="Champs d'entrée">
        <label>ID Ville :</label>
        <select name="id_ville" required>
          <option value="">Sélectionnez une ville</option>
          <?php foreach ($lesVilles as $ville) {
              echo "<option value='{$ville['ID_VILLE']}'>{$ville['NOM']}</option>";
          } ?>
        </select>
      </div>
      <div class="Champs d'entrée">
        <input type="text" name="nom" placeholder="Nom" required>
      </div>
      <div class="Champs d'entrée">
        <input type="text" name="prenom" placeholder="Prénom" required>
      </div>
      <div class="Champs d'entrée">
        <input type="text" name="adresse" placeholder="Adresse" required>
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="code_postal" placeholder="Code Postal" required>
      </div>
      <div class="Champs d'entrée">
        <input type="text" name="telephone" placeholder="Téléphone" required>
      </div>
      <div class="Champs d'entrée">
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="Champs d'entrée">
        <input type="password" name="mdp" placeholder="Mot de passe" required>
      </div>
      
      <input type="submit" name="ajouter" value="Ajouter Locataire">
    </form>
  </div>
</body>
</html>
