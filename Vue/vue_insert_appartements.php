<?php  
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("location: ../vue/vue_interdictionadmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/cssnavbar.css">
  <link rel="stylesheet" href="../CSS/formulaireinscription.css">
  <link rel="stylesheet" href="CSS/formulaireinscription.css">
  <link rel="shortcut icon" href="favicon.png">
</head>
<body>
  <div class="rectangle">
    <legend><strong>Ajouter un Appartement</strong></legend>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="Champs d'entrée">
        <label>ID Bâtiment :</label>
        <select name="id_batiment" required>
          <option value="">Sélectionnez un bâtiment</option>
          <?php foreach ($lesBatiments as $batiment) {
              echo "<option value='{$batiment['ID_BATIMENT']}'>{$batiment['ID_BATIMENT']}</option>";
          } ?>
        </select>
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="numero_appartement" placeholder="Numéro d'Appartement" required>
      </div>
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
        <label>ID Propriétaire :</label>
        <select name="id_proprietaire" required>
          <option value="">Sélectionnez un propriétaire</option>
          <?php foreach ($lesProprietaires as $proprietaire) {
              echo "<option value='{$proprietaire['ID_PROPRIETAIRE']}'>{$proprietaire['NOM']} {$proprietaire['PRENOM']}</option>";
          } ?>
        </select>
      </div>
      <div class="Champs d'entrée">
        <input type="text" name="adresse" placeholder="Adresse" required>
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="code_postal" placeholder="Code Postal" required>
      </div>
      <div class="Champs d'entrée">
        <label>Images :</label>
        <input type="file" name="img1">
        <input type="file" name="img2">
        <input type="file" name="img3">
        <input type="file" name="img4">
      </div>
      <div class="Champs d'entrée">
        <label>Type :</label>
        <select name="type" required>
          <option value="">Sélectionnez un type</option>
          <option value="F1">F1</option>
          <option value="F2">F2</option>
          <option value="F3">F3</option>
          <option value="F4">F4</option>
          <option value="F5">F5</option>
        </select>
      </div>
      <div class="Champs d'entrée">
        <label>Exposition :</label>
        <select name="exposition" required>
          <option value="">Sélectionnez une exposition</option>
          <option value="Nord">Nord</option>
          <option value="Nord-est">Nord-est</option>
          <option value="Nord-ouest">Nord-ouest</option>
          <option value="Sud">Sud</option>
          <option value="Sud-est">Sud-est</option>
          <option value="Sud-ouest">Sud-ouest</option>
          <option value="Est">Est</option>
          <option value="Ouest">Ouest</option>
        </select>
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="surface_habitable" placeholder="Surface Habitable (m²)" required>
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="surface_balcon" placeholder="Surface Balcon (m²)">
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="capacite" placeholder="Capacité" required>
      </div>
      <div class="Champs d'entrée">
        <input type="number" name="distance" placeholder="Distance (m)" required>
      </div>
      <input type="submit" name="ajouter" value="Ajouter Appartement">
    </form>
  </div>
</body>
</html>


