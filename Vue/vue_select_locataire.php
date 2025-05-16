<?php
require_once '../Controlleur/Controlleur.class.php';
$unControleur = new Controleur();

// Suppression d'un locataire si l'ID est fourni via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $idLocataire = $_POST['supprimer'];
    $unControleur->deleteLocataire($idLocataire); // Fonction à définir dans ton contrôleur
    header("Location: vue_select_locataire.php"); // Rafraîchir la page après suppression
    exit();
}

// Récupération des locataires
$lesLocataires = $unControleur->selectAllLocataires();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Liste des Locataires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Roboto", sans-serif;
            background-color: #f4f4f9;
        }
        .container { margin-top: 30px; }
        .btn-sm { padding: 5px 10px; }
    </style>
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
    <h2 class="mb-4 text-center">Liste des Locataires (<?= isset($lesLocataires) ? count($lesLocataires) : 0 ?>)</h2>

    <table class="table table-hover table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>ID Ville</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lesLocataires)): ?>
                <?php $i = 1; ?>
                <?php foreach ($lesLocataires as $unLocataire): ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($unLocataire['ID_VILLE']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['NOM']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['PRENOM']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['ADRESSE']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['CODE_POSTAL']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['TELEPHONE']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['EMAIL']) ?></td>
                        <td><?= htmlspecialchars($unLocataire['ROLE']) ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="supprimer" value="<?= $unLocataire['ID_LOCATAIRE'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">❌ Supprimer</button>
                            </form>
                            <a href="modifier_locataire.php?id=<?= $unLocataire['ID_LOCATAIRE'] ?>" class="btn btn-warning btn-sm">
                                ✏️ Modifier
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">Aucun locataire trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
