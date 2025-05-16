
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Neige & Soleil</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
  
  .table-container {
    width: 600px;
    height: 400px;
    overflow: auto;
    border: 1px solid #ccc;
    padding: 10px;
  }

  table {
    width: 1500px; /* Largeur du tableau plus grande pour forcer le défilement horizontal */
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
    position: sticky;
    top: 0;
  }
</style>
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
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="index.html" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                        <span class="text-xl font-display font-bold text-gray-900">Neige & Soleil Admin</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="../index.php" class="text-gray-700 hover:text-alpine-600 font-medium">Retour au site</a>
                    <a href="../controlleur/c_deconnexion.php" class="bg-alpine-600 text-white px-4 py-2 rounded-lg hover:bg-alpine-700 transition duration-300">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4">
                <nav class="space-y-2">
                    <button onclick="showTab('dashboard')" class="w-full flex items-center space-x-2 px-4 py-2 text-gray-700 hover:bg-alpine-50 hover:text-alpine-600 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        <span>Tableau de bord</span>
                    </button>
                    <button onclick="showTab('owners')" class="w-full flex items-center space-x-2 px-4 py-2 text-gray-700 hover:bg-alpine-50 hover:text-alpine-600 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span>Propriétaires</span>
                    </button>
                    <button onclick="showTab('apartments')" class="w-full flex items-center space-x-2 px-4 py-2 text-gray-700 hover:bg-alpine-50 hover:text-alpine-600 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Appartements</span>
                    </button>
                    <button onclick="showTab('reservations')" class="w-full flex items-center space-x-2 px-4 py-2 text-gray-700 hover:bg-alpine-50 hover:text-alpine-600 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span>Contrat</span>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Dashboard Tab -->
            <div id="dashboard" class="tab-content">
                <h2 class="text-2xl font-display font-bold text-gray-900 mb-6">Tableau de bord</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Propriétaires</p>
                                <p class="text-2xl font-bold text-gray-900"><?= htmlspecialchars($nombreProprietaire[0]) ?></p>    
                            </div>
                            <div class="bg-alpine-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Appartements</p>
                                <p class="text-2xl font-bold text-gray-900"> <?= htmlspecialchars($nombreAppartement[0]) ?>
                                    
                                </p>
                            </div>
                            <div class="bg-alpine-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Réservations</p>
                                <p class="text-2xl font-bold text-gray-900"><?= htmlspecialchars($nombreCDR[0]) ?> </p>
                            </div>
                            <div class="bg-alpine-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Owners Tab -->
            <div id="owners" class="tab-content hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-display font-bold text-gray-900">Propriétaires</h2>
                    <button onclick="showModal('ownerModal')" class="bg-alpine-600 text-white px-4 py-2 rounded-lg hover:bg-alpine-700 transition duration-300 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        <span>Ajouter un propriétaire</span>
                    </button>
                </div>

                <!-- Owners Table -->
                <div class="table-container">
  <table>
    <thead>
      <tr>
        <th>X</th>
       <th>ID Propriétaire</th>
        <th>ID Ville</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th>Operations</th>
      </tr>
    </thead>
     <tbody>
            <?php if (!empty($lesProprietaires)): ?>
                <?php $i = 1; ?>
                <?php foreach ($lesProprietaires as $unProprietaire ): ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                            <td><?= htmlspecialchars($unProprietaire['ID_PROPRIETAIRE']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['ID_VILLE']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['NOM']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['PRENOM']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['ADRESSE']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['CODE_POSTAL']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['TELEPHONE']) ?></td>
                            <td><?= htmlspecialchars($unProprietaire['EMAIL']) ?></td>
    
                            <?php for ($j = 1; $j <= 4; $j++): ?>
                                <?php if (!empty($unProprietaire["IMG$j"])): ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($unProprietaire["IMG$j"]) ?>" width="50" height="50" class="m-1">
                                <?php endif; ?>
                            <?php endfor; ?>
                        </td>
                        <td>
                            <form method="post" class="inline">
                                <input type="hidden" name="supprimer" value="<?= $unProprietaire['NUMERO_APPARTEMENT'] ?>">
                                <button type="submit" class="text-red-500 hover:text-red-700">❌ Supprimer</button>
                            </form>
                            <a href="modifier_appartement.php?id=<?= $unProprietaire['NUMERO_APPARTEMENT'] ?>" class="text-yellow-500 hover:text-yellow-700 ml-2">✏️ Modifier</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="15" class="text-center p-4 text-gray-500">Aucun proprietaire trouvé.</td>
                </tr>
            <?php endif; ?>
             

        </tbody>
  </table>
</div>
</div>
            <!-- Apartments Tab -->
            <div id="apartments" class="tab-content hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-display font-bold text-gray-900">Appartements</h2>
                     <a href="../controlleur/c_appartement.php" class="bg-alpine-600 text-white px-4 py-2 rounded-lg hover:bg-alpine-700 transition duration-0"> + Ajouter un appartement </a>
                    </button>
                    </div>

                <div class="container mt-4">
    <h2 class="mb-4 text-center">
                <div class="table-container">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th>#</th>
                <th>Batiment</th>
                <th>Appartement</th>
                <th>Ville</th>
                <th>Propriétaire</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Type</th>
                <th>Exposition</th>
                <th>Surface</th>
                <th>Balcon</th>
                <th>Capacité</th>
                <th>Distance</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lesAppartements)): ?>
                <?php $i = 1; ?>
                <?php foreach ($lesAppartements as $unAppartement ): ?>
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
                        <td><?= htmlspecialchars($unAppartement['SURFACE_BALCON'] ?? '') ?> m²</td>
                        <td><?= htmlspecialchars($unAppartement['CAPACITE']) ?> personnes</td>
                        <td><?= htmlspecialchars($unAppartement['DISTANCE']) ?> m</td>
                        <td>
                            <?php for ($j = 1; $j <= 4; $j++): ?>
                                <?php if (!empty($unAppartement["IMG$j"])): ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($unAppartement["IMG$j"]) ?>" width="50" height="50" class="m-1">
                                <?php endif; ?>
                            <?php endfor; ?>
                        </td>
                        <td>
                            <form method="post" class="inline">
                                <input type="hidden" name="supprimer" value="<?= $unAppartement['NUMERO_APPARTEMENT'] ?>">
                                <button type="submit" class="text-red-500 hover:text-red-700">❌ Supprimer</button>
                            </form>
                            <a href="c_appartement.php?idbat=<?= $unAppartement['ID_BATIMENT'] ?>&id=<?= $unAppartement['NUMERO_APPARTEMENT'] ?>" class="text-yellow-500 hover:text-yellow-700 ml-2">✏️ Modifier</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="15" class="text-center p-4 text-gray-500">Aucun appartement trouvé.</td>
                </tr>
            <?php endif; ?>
             

        </tbody>
    </table>
</div>
</div>
            </div> 

            <!-- Reservations Tab -->
            <div id="reservations" class="tab-content hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-display font-bold text-gray-900">Réservations</h2>
                    <button onclick="showModal('reservationModal')" class="bg-alpine-600 text-white px-4 py-2 rounded-lg hover:bg-alpine-700 transition duration-300 flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        <span>Nouvelle réservation</span>
                    </button>
                </div>

                <!-- Reservations Table -->
               <div class="table-container">
  <table>
    <thead>
      <tr>
        <th>X</th>
        <th>Numéro Contrat</th>
        <th>ID Locataire</th>
        <th>ID Bâtiment</th>
        <th>Numéro Appartement</th>
        <th>Date Réservation</th>
        <th>Arrhes</th>
        <th>Solde</th>
        <th>État</th>
        <th>Opérations</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($lesContrats)): ?>
        <?php $i = 1; ?>
        <?php foreach ($lesContrats as $unContrat): ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?= htmlspecialchars($unContrat['NUMERO_CONTRAT']) ?></td>
            <td><?= htmlspecialchars($unContrat['ID_LOCATAIRE']) ?></td>
            <td><?= htmlspecialchars($unContrat['ID_BATIMENT']) ?></td>
            <td><?= htmlspecialchars($unContrat['NUMERO_APPARTEMENT']) ?></td>
            <td><?= htmlspecialchars($unContrat['DATE_RESERVATION']) ?></td>
            <td><?= htmlspecialchars($unContrat['ARRHES']) ?> €</td>
            <td><?= htmlspecialchars($unContrat['SOLDE']) ?> €</td>
            <td><?= htmlspecialchars($unContrat['ETAT']) ?></td>
            <td>
              <form method="post" class="inline">
                <input type="hidden" name="supprimer" value="<?= $unContrat['NUMERO_CONTRAT'] ?>">
                <button type="submit" class="text-red-500 hover:text-red-700">❌ Supprimer</button>
              </form>
              <a href="modifier_contrat.php?id=<?= $unContrat['NUMERO_CONTRAT'] ?>" class="text-yellow-500 hover:text-yellow-700 ml-2">✏️ Modifier</a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="10" class="text-center p-4 text-gray-500">Aucun contrat trouvé.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>


    <!-- Owner Modal -->
    <div id="ownerModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Ajouter un propriétaire</h3>
                <form class="space-y-4">
                    <div>
                        <label for="ownerName" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <input type="text" id="ownerName" name="ownerName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="ownerEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="ownerEmail" name="ownerEmail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="ownerPhone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="tel" id="ownerPhone" name="ownerPhone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="ownerAddress" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <textarea id="ownerAddress" name="ownerAddress" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="hideModal('ownerModal')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Annuler</button>
                        <button type="submit" class="px-4 py-2 bg-alpine-600 text-white rounded-md hover:bg-alpine-700">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <!-- Reservation Modal -->
    <div id="reservationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Nouvelle réservation</h3>
                <form class="space-y-4">
                    <div>
                        <label for="reservationApartment" class="block text-sm font-medium text-gray-700">Appartement</label>
                        <select id="reservationApartment" name="reservationApartment" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                            <option>Appartement Vue Mont Blanc</option>
                            <option>Chalet Moderne Proche Télécabine</option>
                        </select>
                    </div>
                    <div>
                        <label for="clientName" class="block text-sm font-medium text-gray-700">Nom du client</label>
                        <input type="text" id="clientName" name="clientName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="clientEmail" class="block text-sm font-medium text-gray-700">Email du client</label>
                        <input type="email" id="clientEmail" name="clientEmail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="checkIn" class="block text-sm font-medium text-gray-700">Date d'arrivée</label>
                        <input type="date" id="checkIn" name="checkIn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="checkOut" class="block text-sm font-medium text-gray-700">Date de départ</label>
                        <input type="date" id="checkOut" name="checkOut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div>
                        <label for="guests" class="block text-sm font-medium text-gray-700">Nombre de personnes</label>
                        <input type="number" id="guests" name="guests" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="hideModal('reservationModal')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Annuler</button>
                        <button type="submit" class="px-4 py-2 bg-alpine-600 text-white rounded-md hover:bg-alpine-700">Réserver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Tab switching
        function showTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');
        }

        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function hideModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('fixed')) {
                event.target.classList.add('hidden');
            }
        }

        // Show dashboard by default
        showTab('dashboard');
    </script>
</body>
</html>