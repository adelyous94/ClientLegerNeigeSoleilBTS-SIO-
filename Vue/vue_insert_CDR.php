<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Réservation - AlpineLodge</title>
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
                    <a href="admin.html" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                        <span class="text-xl font-display font-bold text-gray-900">AlpineLodge Admin</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="admin.html" class="text-gray-700 hover:text-alpine-600 font-medium">Retour au tableau de bord</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-display font-bold text-gray-900">Nouvelle Réservation</h2>
                <p class="mt-1 text-sm text-gray-600">Créer une nouvelle réservation</p>
            </div>

            <form class="p-6 space-y-6">
                <!-- Informations de l'Appartement -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Appartement</h3>
                    
                    <div>
                        <label for="apartment" class="block text-sm font-medium text-gray-700">Sélectionner l'appartement</label>
                        <select id="apartment" name="apartment" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                            <option value="">Choisir un appartement</option>
                            <option value="1">Appartement Vue Mont Blanc - Chamonix</option>
                            <option value="2">Chalet Moderne - Val Thorens</option>
                            <option value="3">Studio Cosy - Courchevel</option>
                        </select>
                    </div>
                </div>

                <!-- Dates -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Dates du séjour</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="check-in" class="block text-sm font-medium text-gray-700">Date d'arrivée</label>
                            <input type="date" id="check-in" name="check-in" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        </div>
                        
                        <div>
                            <label for="check-out" class="block text-sm font-medium text-gray-700">Date de départ</label>
                            <input type="date" id="check-out" name="check-out" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine- 500 focus:ring-alpine-500">
                        </div>
                    </div>
                </div>

                <!-- Informations du Client -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Informations du Client</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" id="firstName" name="firstName" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        </div>
                        
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="lastName" name="lastName" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="tel" id="phone" name="phone" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>

                    <div>
                        <label for="guests" class="block text-sm font-medium text-gray-700">Nombre de personnes</label>
                        <input type="number" id="guests" name="guests" min="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                </div>

                <!-- Options -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Options</h3>
                    
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="cleaning" name="options[]" value="cleaning" class="h-4 w-4 text-alpine-600 focus:ring-alpine-500 border-gray-300 rounded">
                            <label for="cleaning" class="ml-2 block text-sm text-gray-700">Service de ménage (50€)</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="linen" name="options[]" value="linen" class="h-4 w-4 text-alpine-600 focus:ring-alpine-500 border-gray-300 rounded">
                            <label for="linen" class="ml-2 block text-sm text-gray-700">Location de linge (30€)</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" id="parking" name="options[]" value="parking" class="h-4 w-4 text-alpine-600 focus:ring-alpine-500 border-gray-300 rounded">
                            <label for="parking" class="ml-2 block text-sm text-gray-700">Place de parking (40€)</label>
                        </div>
                    </div>
                </div>

                <!-- Paiement -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Paiement</h3>
                    
                    <div>
                        <label for="payment-method" class="block text-sm font-medium text-gray-700">Méthode de paiement</label>
                        <select id="payment-method" name="payment-method" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                            <option value="">Sélectionner une méthode</option>
                            <option value="card">Carte bancaire</option>
                            <option value="bank-transfer">Virement bancaire</option>
                            <option value="check">Chèque</option>
                        </select>
                    </div>

                    <div>
                        <label for="deposit" class="block text-sm font-medium text-gray-700">Montant de l'acompte (€)</label>
                        <input type="number" id="deposit" name="deposit" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                    </div>
                </div>

                <!-- Notes -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Notes</h3>
                    
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Notes supplémentaires</label>
                        <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500"></textarea>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-6">
                    <button type="button" onclick="window.location.href='admin.html'" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpine-500">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-alpine-600 hover:bg-alpine-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpine-500">
                        Créer la réservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>