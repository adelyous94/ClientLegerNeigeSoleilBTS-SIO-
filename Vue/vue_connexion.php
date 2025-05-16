<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - AlpineLodge</title>
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
                    <a href="../index.php" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                        <span class="text-xl font-display font-bold text-gray-900">Neige & Soleil</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="../index.php" class="text-gray-700 hover:text-alpine-600 font-medium">Accueil</a>
                    <a href="listings.html" class="text-gray-700 hover:text-alpine-600 font-medium">Annonces</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Auth Section -->
    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-display font-bold text-gray-900">Bienvenue</h2>
                <p class="mt-2 text-gray-600">Connectez-vous à votre compte</p>
            </div>
             <form method="post" class="mt-8 space-y-6">
            <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <div class="mt-1">
                        <input
                            id="email"
                            name="EMAIL"
                            type="email"
                            required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-alpine-500 focus:border-alpine-500"
                            placeholder="vous@exemple.com"
                        />
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <span class="flex justify-between">
                            <span>Mot de passe</span>
                            <a href="/c_mot_de_passe_oublié.php" class="text-alpine-600 hover:text-alpine-500">Mot de passe oublié ?</a>
                        </span>
                    </label>
                    <div class="mt-1">
                        <input
                            id="password"
                            name="MDP"
                            type="password"
                            required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-alpine-500 focus:border-alpine-500"
                            placeholder="••••••••"
                        />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember-me"
                            name="remember-me"
                            type="checkbox"
                            class="h-4 w-4 text-alpine-600 focus:ring-alpine-500 border-gray-300 rounded"
                        />
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                            Se souvenir de moi
                        </label>
                    </div>
                </div>

                <div>
                    <button
                        type="submit"
                        name="Connexion"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-alpine-600 hover:bg-alpine-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpine-500">Se connecter</button>
                </div>
            </form>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Pas encore de compte ?
                    <a href="c_inscription.php" class="font-medium text-alpine-600 hover:text-alpine-500">
                        Créer un compte
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


