<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations d'Appartements</title>
    <link rel="stylesheet" href="../CSS/cssnavbar.css">
    <link rel="stylesheet" href="../CSS/search-bar-accueil.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styles pour le carrousel en pur CSS */
        .carousel {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            border-radius: 10px;
        }
        .carousel input { display: none; }
        .carousel-images { display: flex; width: 300%; transition: transform 0.5s ease-in-out; }
        .carousel input:nth-child(1):checked ~ .carousel-images { transform: translateX(0%); }
        .carousel input:nth-child(2):checked ~ .carousel-images { transform: translateX(-33.33%); }
        .carousel input:nth-child(3):checked ~ .carousel-images { transform: translateX(-66.66%); }
        .carousel label { position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background: white; padding: 5px; border-radius: 50%; cursor: pointer; opacity: 0.7; transition: opacity 0.3s; }
        .carousel label:hover { opacity: 1; }
    .dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        margin: 0 5px;
        background-color: #bbb;
        border-radius: 50%;
        cursor: pointer;
    }
    .dot:hover {
        background-color: #717171;
    }
    </style>
</head>
<body class="bg-gray-100 p-5">

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
          <li><a href="../Controlleur/c_deconnexion.php">Se Deconnecter</a></li>
      
        </ul>
      </div>
    </div>
  </nav>

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6" style="margin-top: 10px;">Appartements à Louer</h1>

         <!-- Barre de recherche -->
         <div class="mb-6">
            <form method="POST" class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
                <input type="text" name="ville" placeholder="Ville ou Type" class="p-2 border border-gray-300 rounded">
                <select name="type" class="p-2 border border-gray-300 rounded">
                    <option value="">Type</option>
                    <option value="F1">F1</option>
                    <option value="F2">F2</option>
                    <option value="F3">F3</option>
                    <option value="F4">F4</option>
                    <option value="F5">F5</option>
                </select>
                <input type="date" name="debut" class="p-2 border border-gray-300 rounded">
                <input type="date" name="fin" class="p-2 border border-gray-300 rounded">
                <button type="submit" name="Rechercher" class="p-2 bg-blue-500 text-white rounded">Rechercher</button>
                <button type="submit" name="Reset" class="p-2 bg-red-500 text-white rounded">Réinitialiser</button>
            </form>
        </div>

        <!-- Grille des annonces -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($annoncesPage as $annonce): ?>

                <div class="bg-white shadow-lg rounded-lg p-4">
                    
                    <!-- Carrousel -->
                    <div class="carousel">
                        <input type="radio" name="carousel-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>" id="img1-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>" checked>
                        <input type="radio" name="carousel-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>" id="img2-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>">
                        <input type="radio" name="carousel-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>" id="img3-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>">

                        <div class="carousel-images">
                            <?php if (!empty($annonce['IMG1'])): ?>
                                <img src="data:image/jpg;base64,<?= base64_encode($annonce['IMG1']) ?>" class="w-full h-48 object-cover">
                            <?php endif; ?>
                            <?php if (!empty($annonce['IMG2'])): ?>
                                <img src="data:image/jpg;base64,<?= base64_encode($annonce['IMG2']) ?>" class="w-full h-48 object-cover">
                            <?php endif; ?>
                            <?php if (!empty($annonce['IMG3'])): ?>
                                <img src="data:image/jpg;base64,<?= base64_encode($annonce['IMG3']) ?>" class="w-full h-48 object-cover">
                            <?php endif; ?>
                        </div>

                        <div class="carousel-dots">
                            <label for="img1-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT']?>" class="dot"></label>
                            <label for="img2-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>" class="dot"></label>
                            <label for="img3-<?= $annonce['ID_BATIMENT'].$annonce['NUMERO_APPARTEMENT'] ?>" class="dot"></label>
                        </div>
                    </div>
                    
    

                    <!-- Informations de l'annonce -->
                    <div class="p-4">
                        <h2 class="text-xl font-semibold"><?= htmlspecialchars($annonce['ville']) ?></h2>
                        <p class="text-gray-600"><?= htmlspecialchars($annonce['TYPE']) ?></p>
                        <p class="text-gray-600">Exposition: <?= htmlspecialchars($annonce['EXPOSITION']) ?></p>
                        <p class="text-gray-600">Surface habitable: <?= htmlspecialchars($annonce['SURFACE_HABITABLE']) ?> m²</p>
                        <p class="text-gray-600">Capacité: <?= htmlspecialchars($annonce['CAPACITE']) ?> personnes</p>
                        <p class="text-gray-600">Distance du centre: <?= htmlspecialchars($annonce['DISTANCE']) ?> m</p>
                        <p class="text-green-600 font-bold mt-2"><?= $annonce['prix'] ?>€/nuit</p>

                        
                <a href="../Controlleur/c_detail_annonces.php?id_batiment=<?= $annonce['ID_BATIMENT'] ?>&numero_appartement=<?= $annonce['NUMERO_APPARTEMENT']?>&prix=<?= $annonce['prix']?>" class="mt-4 block text-center bg-blue-500 text-white py-2 rounded">Voir plus</a>

                    </div>  
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 bg-gray-300 rounded-lg mx-2">Précédent</a>
            <?php endif; ?>

            <span class="px-4 py-2 bg-blue-500 text-white rounded-lg">Page <?= $page ?> / <?= $totalPages ?></span>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 bg-gray-300 rounded-lg mx-2">Suivant</a>
            <?php endif; ?>
            
        </div>
    </div>

</body>
</html>
