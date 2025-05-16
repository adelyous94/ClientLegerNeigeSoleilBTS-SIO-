<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - AlpineLodge</title>
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
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="../index.PHP" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                        <span class="text-xl font-display font-bold text-gray-900">Neige & Soleil</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="../index.PHP" class="text-gray-700 hover:text-alpine-600 font-medium">Accueil</a>
                    <a href="listings.html" class="text-gray-700 hover:text-alpine-600 font-medium">Annonces</a>
                    <a href="auth.html" class="text-gray-700 hover:text-alpine-600 font-medium">Connexion</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-display font-bold text-gray-900">Créer votre compte</h2>
                <p class="mt-2 text-gray-600">Rejoignez AlpineLodge et découvrez nos locations exceptionnelles</p>
            </div>

            <form class="mt-8 space-y-6" method="POST">
                <!-- Type de compte -->
                <div class="space-y-4">

                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative">
                            <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center">
                                        
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="relative">
                            <input type="radio" name="account-type" id="owner" value="owner" class="peer sr-only">
                            
                                <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center">
                                        
                                        <div class="block">
                                           
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Informations personnelles -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Informations personnelles</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" id="firstName" name="prenom" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        </div>
                        
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="lastName" name="nom" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>

                    <select name="id_ville" id="Ville" class="form-select">
                 <option value="">Sélectionnez une ville</option>
                     <?php
                     if (!empty($lesVilles)) {
                        foreach ($lesVilles as $ville) {
                   if (isset($ville['ID_VILLE']) && isset($ville['NOM'])) {
                    echo "<option value=\"{$ville['ID_VILLE']}\">{$ville['NOM']}</option>";
                   }
                }
             } else {
               echo "<option value=\"\">Aucune ville disponible</option>" ;
       }
    ?>
</select>

                     <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <input type="tel" id="phone" name="adresse" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>

                    <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700">Code Postal</label>
                            <input type="text" id="firstName" name="code_postal" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="tel" id="phone" name="telephone" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                </div>

                <!-- Mot de passe -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Sécurité</h3>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input type="password" id="password" name="mdp" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        <p class="mt-1 text-sm text-gray-500">Au moins 8 caractères avec des lettres, chiffres et caractères spéciaux</p>
                    </div>
                </div>

               
                <div>
                   <button type="submit" name="Inscription" value="ok">S'inscrire</button>

                </div>
            </form>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Déjà un compte ?
                    <a href="c_connexion.php" class="font-medium text-alpine-600 hover:text-alpine-500">
                        Se connecter
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-display font-bold text-lg mb-4">AlpineLodge</h3>
                    <p class="text-sm">Votre partenaire de confiance pour des vacances au ski inoubliables.</p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Destinations</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Chamonix</a></li>
                        <li><a href="#" class="hover:text-white">Val Thorens</a></li>
                        <li><a href="#" class="hover:text-white">Courchevel</a></li>
                        <li><a href="#" class="hover:text-white">Méribel</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Services</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Location de matériel</a></li>
                        <li><a href="#" class="hover:text-white">Cours de ski</a></li>
                        <li><a href="#" class="hover:text-white">Transport</a></li>
                        <li><a href="#" class="hover:text-white">Conciergerie</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm">
                        <li>contact@alpinelodge.fr</li>
                        <li>+33 (0)4 50 12 34 56</li>
                        <li>74400 Chamonix</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm">
                <p>&copy; 2024 AlpineLodge. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>