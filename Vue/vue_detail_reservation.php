<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            min-height: 100vh;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .hero-text {
            text-align: center;
            margin-bottom: 50px;
        }
        .hero-text h1 {
            font-size: 3rem;
            font-weight: bold;
            animation: fadeInDown 1s ease-out;
        }
        .hero-text p {
            font-size: 1.25rem;
            animation: fadeInUp 1s ease-out;
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .reservation-card {
            background: rgba(255, 255, 255, 0.15);
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        .reservation-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 64px rgba(0, 0, 0, 0.5);
        }
        .card-header {
            background: rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 1.25rem;
            text-align: center;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="hero-text">
            <h1>Détails de la Réservation</h1>
            <p>Consultez les informations de votre réservation.</p>
        </div>
        <div class="reservation-card">
            <div class="card-header">
                Contrat n° <?= htmlspecialchars($laReservation['NUMERO_CONTRAT']) ?>
            </div>
            <div class="card-body">
                <p><strong>Bâtiment :</strong> <?= htmlspecialchars($laReservation['ID_BATIMENT']) ?></p>
                <p><strong>Appartement :</strong> <?= htmlspecialchars($laReservation['NUMERO_APPARTEMENT']) ?></p>
                <p><strong>Type :</strong> <?= htmlspecialchars($laReservation['TYPE'] ?? 'N/A') ?></p>
                <p><strong>Dates Louées :</strong> Du <?= htmlspecialchars($laReservation['DATE_DEBUT'] ?? 'Non spécifié') ?> au <?= htmlspecialchars($laReservation['DATE_FIN'] ?? 'Non spécifié') ?></p>
            </div>
            <div class="btn-container">
                <?php 
                if ($Louee['existe'] == 0) { 
                    echo '<form method="post">
                            <a href="../Controlleur/c_update_reservation.php?numero_contrat=' . $laReservation['NUMERO_CONTRAT'] . 
                            '&id_batiment=' . $laReservation['ID_BATIMENT'] . 
                            '&numero_appartement=' . $laReservation['NUMERO_APPARTEMENT'] . 
                            '" class="btn btn-warning">Modifier</a>
                            <button type="submit" name="Delete" class="btn btn-danger" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette réservation ?\');">Supprimer</button>
                        </form>';
                } 
                ?>
            </div>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>