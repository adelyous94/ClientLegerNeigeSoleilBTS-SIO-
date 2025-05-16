<?php
require_once '../Controlleur/Controlleur.class.php';
$unControleur = new Controleur();

// Suppression d'un appartement si l'ID est fourni via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $idAppartement = $_POST['supprimer'];
    $unControleur->deleteAppartement($idAppartement); // Fonction à définir dans ton contrôleur
    header("Location: vue_select_appartements.php"); // Rafraîchir la page après suppression
    exit();
}

$lesAppartements = $unControleur->selectAllAppartements(); // Récupération des appartements
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Liste des Appartements</title>
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
    <h2 class="mb-4 text-center">Liste des Appartements (<?= isset($lesAppartements) ? count($lesAppartements) : 0 ?>)</h2>

    <table class="table table-hover table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>ID Bâtiment</th>
                <th>Numéro Appartement</th>
                <th>ID Ville</th>
                <th>ID Propriétaire</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Type</th>
                <th>Exposition</th>
                <th>Surface Habitable</th>
                <th>Surface Balcon</th>
                <th>Capacité</th>
                <th>Distance</th>
                <th>Images</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lesAppartements)): ?>
                <?php $i = 1; ?>
                <?php foreach ($lesAppartements as $unAppartement): ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= htmlspecialchars($unAppartement['ID_BATIMENT']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['NUMERO_APPARTEMENT']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['ID_VILLE']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['ID_PROPRIETAIRE']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['ADRESSE']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['CODE_POSTAL']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['TYPE']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['EXPOSITION']) ?></td>
                        <td><?= htmlspecialchars($unAppartement['SURFACE_HABITABLE']) ?> m²</td>
                        <td><?= htmlspecialchars($unAppartement['SURFACE_BALCON']) ?> m²</td>
                        <td><?= htmlspecialchars($unAppartement['CAPACITE']) ?> personnes</td>
                        <td><?= htmlspecialchars($unAppartement['DISTANCE']) ?> m</td>
                        <td>
                            <?php for ($j = 1; $j <= 4; $j++): ?>
                                <?php if (!empty($unAppartement["IMG$j"])): ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($unAppartement["IMG$j"]) ?>" width="50" height="50" style="margin:5px;">
                                <?php endif; ?>
                            <?php endfor; ?>
                        </td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="supprimer" value="<?= $unAppartement['NUMERO_APPARTEMENT'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">❌ Supprimer</button>
                            </form>
                            <a href="modifier_appartement.php?id=<?= $unAppartement['NUMERO_APPARTEMENT'] ?>" class="btn btn-warning btn-sm">
                                ✏️ Modifier
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="15" class="text-center">Aucun appartement trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
