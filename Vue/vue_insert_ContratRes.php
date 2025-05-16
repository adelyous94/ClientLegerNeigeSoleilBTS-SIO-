<?php  
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "Admin") {
    header("location: ../vue/vue_interdictionadmin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/cssnavbar.css">
  <link rel="stylesheet" href="../CSS/formulaireinscription.css">
  <link rel="stylesheet" href="CSS/formulaireinscription.css">
  <link rel="shortcut icon" href="favicon.png">
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggler" data-toggle="open-navbar1">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <a href="../index.php">
          <h4>Neige&<span>Soleil</span></h4>
        </a>
      </div>
    </div>
     <li class="active"><a href="#">Accueil</a></li>
  </nav>

  <div class="hero page-inner overlay" style="background-image: url('images/chalet1.jpg')">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center mt-5">
        </div>
      </div>
    </div>
  </div>

  <div class="rectangle">
    <legend><strong>Completez votre contrat de réservation </strong></legend>
<form method="POST">
    <div class="row">
        <div class="Champs d'entrée">
            <label for="id_locataire">ID Locataire</label>
            <select name="id_locataire" id="id_locataire" class="form-select" required>
                <option value="">Sélectionnez un locataire</option>
                <?php
                if (!empty($lesLocataires)) {
                    foreach ($lesLocataires as $locataire) {
                        echo "<option value=\"{$locataire['ID_LOCATAIRE']}\">{$locataire['NOM']} {$locataire['PRENOM']}</option>";
                    }
                } else {
                    echo "<option value=\"\">Aucun locataire disponible</option>";
                }
                ?>
            </select>
        </div>

                <div class="Champs d'entrée">
                    <label>ID du Batiment</label>
                  <select name="id_batiment" id="Batiment" class="form-select">
            <option value="">Sélectionnez un bâtiment</option>
            <?php
            if (!empty($lesBatiments)) {
                foreach ($lesBatiments as $batiment) {
                    if (isset($batiment['ID_BATIMENT'])) {
                        echo "<option value=\"{$batiment['ID_BATIMENT']}\">{$batiment['ID_BATIMENT']}</option>";
                    }
                }
            } else {
                echo "<option value=\"\">Aucun bâtiment disponible</option>";
            }
            ?>
        </select>

                </div>

                <div class="Champs d'entrée">
                    <label>Numero de l'appartement</label>
                  <select name="numero_appartement" id="appartement" class="form-select">
            <option value="">Sélectionnez un appartement</option>
             <?php
            if (!empty($lesAppartements)) {
                foreach ($lesAppartements as $appartement) {
                    if (isset($appartement['NUMERO_APPARTEMENT'])) {
                        echo "<option value=\"{$appartement['NUMERO_APPARTEMENT']}\">{$appartement['NUMERO_APPARTEMENT']}</option>";
                    }
                }
            } else {
                echo "<option value=\"\">Aucun bâtiment disponible</option>";
            }
            ?>
        </select>
        <
        <div class="Champs d'entrée">
            <label for="date_reservation">Date de réservation</label>
            <input type="date" name="date_reservation" id="date_reservation" required>
        </div>

        <div class="Champs d'entrée">
            <label>Arrhes</label>
            <div>
                <input type="radio" name="arrhes" value="Payé" required> Payé
                <input type="radio" name="arrhes" value="Non_Payé" required> Non Payé
            </div>
        </div>

        <div class="Champs d'entrée">
            <label>Solde</label>
            <div>
                <input type="radio" name="solde" value="Payé" required> Payé
                <input type="radio" name="solde" value="Non_Payé" required> Non Payé
            </div>
        </div>

        <div class="Champs d'entrée">
            <label for="etat">État</label>
            <select name="etat" id="etat" class="form-select" required>
                <option value="Confirmé">Confirmé</option>
                <option value="Annulé">Annulé</option>
            </select>
        </div>

        <input type="submit" name="creer" value="Ajouter le contrat">
    </div>
</form>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/aos.js"></script>
<script src="js/navbar.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
