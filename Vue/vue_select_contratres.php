<?php
require_once '../Controlleur/Controlleur.class.php';
$unControleur = new Controleur();

// Suppression d'un contrat si l'ID est fourni via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $idContrat = $_POST['supprimer'];
$unControleur->deleteContratDeReservation($idContrat);
    header("Location: vue_select_contratres.php"); // Rafraîchir la page après suppression
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Liste des Contrats de Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="navbar-header">
            <h4>Admin Dashboard</h4>
        </div>
        <div class="navbar-center">
            <a href="vue_indexadmin.php">Retourner à l'accueil</a>
        </div>
    </nav>
</header>

<div class="container">
    <h2 class="mb-4 text-center">Liste des Contrats de Réservation (<?= isset($lesContrats) ? count($lesContrats) : 0 ?>)</h2>

    <table class="table table-hover table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>ID Locataire</th>
                <th>ID Bâtiment</th>
                <th>Numéro Appartement</th>
                <th>Date Réservation</th>
                <th>Arrhes</th>
                <th>Solde</th>
                <th>État</th>
                <th>Contrat PDF</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lesContrats)): ?>
                <?php $i = 1; ?>
                <?php foreach ($lesContrats as $unContrat): ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($unContrat['ID_LOCATAIRE']) ?></td>
                        <td><?= htmlspecialchars($unContrat['ID_BATIMENT']) ?></td>
                        <td><?= htmlspecialchars($unContrat['NUMERO_APPARTEMENT']) ?></td>
                        <td><?= htmlspecialchars($unContrat['DATE_RESERVATION']) ?></td>
                        <td><?= htmlspecialchars($unContrat['ARRHES']) ?></td>
                        <td><?= htmlspecialchars($unContrat['SOLDE']) ?></td>
                        <td><?= htmlspecialchars($unContrat['ETAT']) ?></td>
                        <td>
                            <?php if (!empty($unContrat['url_contrat_pdf'])): ?>
                                <a href="<?= htmlspecialchars($unContrat['url_contrat_pdf']) ?>" target="_blank">📄 Voir</a>
                            <?php else: ?>
                                Aucun fichier
                            <?php endif; ?>
                        </td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="supprimer" value="<?= $unContrat['NUMERO_CONTRAT'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">❌ Supprimer</button>
                            </form>
                            <a href="vue_select_contrats.php?modifier=<?= $unContrat['NUMERO_CONTRAT'] ?>" class="btn btn-warning btn-sm">
                                ✏️ Modifier
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">Aucun contrat trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Formulaire de modification -->
    <?php if ($contratModif): ?>
        <h3 class="mt-5">Modifier le Contrat #<?= $contratModif['NUMERO_CONTRAT'] ?></h3>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_contrat" value="<?= $contratModif['NUMERO_CONTRAT'] ?>">
            <input type="hidden" name="ancien_pdf" value="<?= $contratModif['url_contrat_pdf'] ?>">

            <div class="mb-3">
                <label for="etat" class="form-label">État</label>
                <select class="form-control" name="etat" required>
                    <option value="Confirm?" <?= ($contratModif['ETAT'] == 'Confirm?') ? 'selected' : '' ?>>Confirmé</option>
                    <option value="Annul?" <?= ($contratModif['ETAT'] == 'Annul?') ? 'selected' : '' ?>>Annulé</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="arrhes" class="form-label">Arrhes</label>
                <select class="form-control" name="arrhes" required>
                    <option value="Pay?" <?= ($contratModif['ARRHES'] == 'Pay?') ? 'selected' : '' ?>>Payé</option>
                    <option value="Non_Pay?" <?= ($contratModif['ARRHES'] == 'Non_Pay?') ? 'selected' : '' ?>>Non Payé</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="solde" class="form-label">Solde</label>
                <select class="form-control" name="solde" required>
                    <option value="Pay?" <?= ($contratModif['SOLDE'] == 'Pay?') ? 'selected' : '' ?>>Payé</option>
                    <option value="Non_Pay?" <?= ($contratModif['SOLDE'] == 'Non_Pay?') ? 'selected' : '' ?>>Non Payé</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pdf_contrat" class="form-label">Modifier le contrat PDF</label>
                <input type="file" class="form-control" name="pdf_contrat">
            </div>

            <button type="submit" name="modifier" class="btn btn-success">✅ Enregistrer</button>
        </form>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
