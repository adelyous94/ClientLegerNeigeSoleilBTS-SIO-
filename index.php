<?php 
session_start();
require_once 'Controlleur/Controlleur.class.php';
$unControleur = new Controleur();

// Vérifier si une session existe
if (isset($_SESSION['role'])) {
    // Vérifier le rôle de l'utilisateur
    if ($_SESSION['role'] == 'Admin') {
        header("Location: vue/vue_indexadmin.php");
        exit(); // Toujours inclure exit() après header() pour éviter d'exécuter le reste du code
    } else if ($_SESSION['role'] == 'Locataire') {
        header("Location: Vue/vue_indexclient.php");
        exit();
    } else if ($_SESSION['role'] == 'Proprietaire') {
        header("Location: Vue/vue_indexproprio.php");
    }
} 
?>
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
            .hero-pattern {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('image/index.jpeg');
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
                        <a href="index.php" class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                            <span class="text-xl font-display font-bold text-gray-900">Neige & Soleil</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-8">
                        <a href="index.php" class="text-gray-700 hover:text-alpine-600 font-medium">Accueil</a>
                        <a href="Annonces.html" class="text-gray-700 hover:text-alpine-600 font-medium">Annonces</a>
                        <a href="./controlleur/c_connexion.php" class="bg-alpine-600 text-white px-4 py-2 rounded-lg hover:bg-alpine-700 transition duration-300">Connexion</a>
                    </div>
                </div>
            </div>
        </nav>
    <!-- Hero Section -->
    <section class="hero-pattern min-h-screen flex items-center justify-center pt-16">
        <div class="max-w-7xl mx-auto px-4 py-32 text-center">
            <h1 class="text-6xl font-display font-bold text-white mb-6 leading-tight">Découvrez Votre Refuge Alpin</h1>
            <p class="text-xl text-gray-200 mb-12 max-w-2xl mx-auto font-light">Vivez une expérience inoubliable dans nos locations sélectionnées au cœur des plus belles stations des Alpes</p>
            
            <div class="bg-white rounded-xl p-6 max-w-3xl mx-auto shadow-2xl backdrop-blur-sm bg-white/90">
                <form class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <input type="text" placeholder="Station de ski..." class="w-full pl-10 pr-4 py-3 rounded-lg border-2 border-gray-200 focus:border-alpine-500 focus:ring focus:ring-alpine-200 focus:ring-opacity-50 font-medium">
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <input type="date" class="w-full pl-10 pr-4 py-3 rounded-lg border-2 border-gray-200 focus:border-alpine-500 focus:ring focus:ring-alpine-200 focus:ring-opacity-50 font-medium">
                        </div>
                    </div>
                    <button class="bg-alpine-600 text-white px-8 py-3 rounded-lg hover:bg-alpine-700 transition duration-300 font-medium flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Rechercher
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-display font-bold text-gray-900 mb-4 text-center">Destinations Populaires</h2>
            <p class="text-gray-600 text-center mb-12 max-w-2xl mx-auto">Explorez nos destinations les plus prisées et trouvez votre prochain séjour au ski</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group card-hover">
                    <div class="relative rounded-xl overflow-hidden shadow-lg aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1583568671741-c75e1e3e9553?auto=format&fit=crop&q=80" alt="Chamonix" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-display font-bold text-white mb-2">Chamonix</h3>
                            <p class="text-gray-200">42 locations disponibles</p>
                        </div>
                    </div>
                </div>

                <div class="group card-hover">
                    <div class="relative rounded-xl overflow-hidden shadow-lg aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1551867633-194f125bddfa?auto=format&fit=crop&q=80" alt="Val Thorens" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-display font-bold text-white mb-2">Val Thorens</h3>
                            <p class="text-gray-200">28 locations disponibles</p>
                        </div>
                    </div>
                </div>

                <div class="group card-hover">
                    <div class="relative rounded-xl overflow-hidden shadow-lg aspect-[4/3]">
                        <img src="https://images.unsplash.com/photo-1518398046578-8cca57782e17?auto=format&fit=crop&q=80" alt="Courchevel" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <h3 class="text-2xl font-display font-bold text-white mb-2">Courchevel</h3>
                            <p class="text-gray-200">35 locations disponibles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-alpine-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h3 class="text-xl font-display font-bold text-gray-900 mb-4">Emplacements Premium</h3>
                    <p class="text-gray-600">Découvrez nos locations soigneusement sélectionnées au pied des pistes</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-alpine-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-display font-bold text-gray-900 mb-4">Réservation Sécurisée</h3>
                    <p class="text-gray-600">Profitez d'un système de réservation sûr et transparent</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-alpine-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-display font-bold text-gray-900 mb-4">Support 24/7</h3>
                    <p class="text-gray-600">Une équipe dédiée à votre service tout au long de votre séjour</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-20 bg-alpine-600">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-display font-bold text-white mb-4">Restez informé</h2>
            <p class="text-alpine-100 mb-8 max-w-2xl mx-auto">Recevez nos meilleures offres et découvrez nos nouvelles destinations en avant-première</p>
            
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Votre email..." class="flex-1 px-4 py-3 rounded-lg border-2 border-transparent focus:border-alpine-300 focus:ring focus:ring-alpine-200 focus:ring-opacity-50">
                <button class="bg-white text-alpine-600 px-6 py-3 rounded-lg hover:bg-alpine-50 transition duration-300 font-medium">S'inscrire</button>
            </form>
        </div>
    </section>

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

