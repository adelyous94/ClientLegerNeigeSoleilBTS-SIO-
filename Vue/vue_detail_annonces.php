<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'Annonce</title>
    <link rel="stylesheet" href="../CSS/cssnavbar.css">
    <link rel="stylesheet" href="../CSS/search-bar-accueil.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

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

      <div class="navbar-menu" id="open-navbar1">
        <ul class="navbar-nav">
          <li class="active"><a href="../index.php">Accueil</a></li>
          <li class="navbar-dropdown">
            <a href="../Controlleur/c_annonces.php">
              Appartements <i class="fa fa-angle-down"></i>
            </a>
          </li>
          <li><a href="#">A propos de nous</a></li>
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Locataire') echo '<li><a href="../Controlleur/c_mes_reservations.php">Mes réservations</a></li>'; ?>
          <?php if (isset($_SESSION['email'])) echo '<li><a href="../Controlleur/c_deconnexion.php">Se Deconnecter</a></li>';  ?>
      
        </ul>
      </div>
    </div>


  </nav>
    <div class="container mx-auto p-6">
        <!-- Titre -->
        <h1 class="text-3xl font-bold mb-4">Appartement à <?= htmlspecialchars($annonce['ville']) ?></h1>
        <p class="text-gray-600 text-lg">Type: <?= htmlspecialchars($annonce['TYPE']) ?> • Capacité: <?= htmlspecialchars($annonce['CAPACITE']) ?> personnes</p>
        
        <!-- Galerie d'images -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-6">
            <?php foreach([$annonce['IMG1'], $annonce['IMG2'], $annonce['IMG3']] as $img): ?>
                <?php if (!empty($img)): ?>
                    <img src="data:image/jpg;base64,<?= base64_encode($img) ?>" class="w-full h-64 object-cover rounded-lg shadow">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <!-- Détails -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Détails</h2>
            <p class="text-gray-700"><strong>Exposition:</strong> <?= htmlspecialchars($annonce['EXPOSITION']) ?></p>
            <p class="text-gray-700"><strong>Surface:</strong> <?= htmlspecialchars($annonce['SURFACE_HABITABLE']) ?> m²</p>
            <p class="text-gray-700"><strong>Distance du centre:</strong> <?= htmlspecialchars($annonce['DISTANCE']) ?> m</p>
            <p class="text-green-600 font-bold text-xl mt-4">Prix: <?= $prixAffiche ?>€/nuit</p>
        </div>
        
        <?php if (isset($annonce['TYPE_EQUIPEMENT'])): ?>
        <!-- Équipements -->
        <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-semibold mb-4">Équipements</h2>
            <ul class="grid grid-cols-2 md:grid-cols-3 gap-3 text-gray-700">
                <li class="flex items-center">
                    <span class="mr-2">✔️</span> <?= htmlspecialchars($annonce["TYPE_EQUIPEMENT"]) ?>
                </li>
            </ul>
        </div>
        <?php endif; ?>
        
        <!-- Réservation -->
        <div class="text-center mt-8">
            <a href="../Controlleur/c_reservation.php?id_batiment=<?= $id_batiment ?>&numero_appartement=<?= $numero_appartement ?>" class="px-6 py-3 bg-blue-500 text-white font-bold rounded-lg shadow-lg hover:bg-blue-600">Réserver</a>

          
        </div>
    </div>
</body>
</html>
