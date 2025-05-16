<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlpineLodge - Locations au ski</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Montserrat', 'sans-serif'],
                        'display': ['Playfair Display', 'serif'],
                    },
                    colors: {
                        'alpine': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                        },
                    },
                },
            },
        }
    </script>
    <style>

       <style>
    /* Style général de la page */
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: #fff;
      min-height: 100vh;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    /* Section d'en-tête */
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
    /* Style des cartes de réservation */
    .reservation-card {
      background: rgba(255, 255, 255, 0.15);
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(4px);
      -webkit-backdrop-filter: blur(4px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    .reservation-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 16px 64px rgba(0, 0, 0, 0.5);
    }
    .card-header {
      background: rgba(255, 255, 255, 0.2);
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
      font-size: 1.25rem;
    }
    .card-body p {
      margin-bottom: 0.5rem;
    }
  
        .hero-pattern {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1520681279154-51b3fb4ea0f7?auto=format&fit=crop&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .card-hover {
            transition: transform 0.3s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="./../index.php" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                        <span class="text-xl font-display font-bold text-gray-900">Neige & Soleil</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="./../index.PHP" class="text-gray-700 hover:text-alpine-600 font-medium">Accueil</a>
                    <a href="Annonces.html" class="text-gray-700 hover:text-alpine-600 font-medium">Annonces</a>
                    <a href="c_deconnexion.php" class="bg-alpine-600 text-white px-4 py-2 rounded-lg hover:bg-alpine-700 transition duration-300">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>
  <div class="container py-5">
    <!-- En-tête de la page -->
    <div class="hero-text">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h1>Mes Réservations</h1>
      <p>Retrouvez toutes vos réservations en un clin d'œil.</p>
    </div>
<center>
    <!-- Affichage en grille des réservations -->
    <div class="row g-4">
      <?php if(!empty($reservations)): ?>
        <?php foreach($reservations as $reservation): ?>
          <div class="col-md-6 col-lg-4">
            <a href="../Controlleur/c_detail_reservation.php?id_batiment=<?= $reservation['ID_BATIMENT']?>&numero_appartement=<?= $reservation['NUMERO_APPARTEMENT']?>&numero_contrat=<?= $reservation['NUMERO_CONTRAT']?>"> 
            <div class="card reservation-card h-100">
              <div class="card-header">
                Contrat n° <?= htmlspecialchars($reservation['NUMERO_CONTRAT']) ?>
              </div>
              <div class="card-body">
                <p><strong>Bâtiment :</strong> <?= htmlspecialchars($reservation['ID_BATIMENT']) ?></p>
                <p><strong>Appartement :</strong> <?= htmlspecialchars($reservation['NUMERO_APPARTEMENT']) ?></p>
                <p><strong>Type :</strong> <?= htmlspecialchars($reservation['TYPE'] ?? 'N/A') ?></p>
                <p><strong>Dates Louées :</strong> Du <?= htmlspecialchars($reservation['DATE_DEBUT'] ?? 'Non spécifié') ?> au <?= htmlspecialchars($reservation['DATE_FIN'] ?? 'Non spécifié') ?></p>
              </div>
            </div>
        </a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <div class="alert alert-info text-center" role="alert">
            Aucune réservation trouvée.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  </center>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
