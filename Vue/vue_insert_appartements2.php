<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Appartement - Neige & Soleil </title>
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
                    <a href="index.html" class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-alpine-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 22 1-1h3l9-9"></path><path d="M3 21v-3l9-9"></path><path d="m15 6 3-3"></path><path d="M6.2 18h3.9"></path><path d="M18 3h3v3"></path></svg>
                        <span class="text-xl font-display font-bold text-gray-900">Neige & Soleil </span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-8">
                    <a href="../vue/vue_gestionadmin2.php" class="text-gray-700 hover:text-alpine-600 font-medium">Retour au tableau de bord</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-display font-bold text-gray-900">Ajouter un Appartement</h2>
                <p class="mt-1 text-sm text-gray-600">Remplissez les informations du nouvel appartement</p>
            </div>

            <form method="POST" class="p-6 space-y-6">
                <!-- Informations de base -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Informations de base</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="building-id" class="block text-sm font-medium text-gray-700">ID Bâtiment</label>
                            <select name="id_batiment" required>
                                <option value="">Sélectionnez un bâtiment</option>
                                        <?php foreach ($lesBatiments as $batiment) {

                                             echo "<option value='{$batiment['ID_BATIMENT']}'";

                                             if ($unAppart !=null && $batiment['ID_BATIMENT'] == $unAppart['ID_BATIMENT']) echo " selected ";
                                             echo ">{$batiment['ID_BATIMENT']}</option>";
                                                         } ?>
                                                            </select>
                                                      </div>
                        
                        <div>
                            <label for="apartment-number" class="block text-sm font-medium text-gray-700">Numéro d'appartement</label>
                            <input type="text" id="apartment-number" name="numero_appartement" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500" 
                            value="<?= ($unAppart!=null)?$unAppart['NUMERO_APPARTEMENT'] :'' ?>"
                            >
                        </div>
                        
                        <div>
                            <label for="city-id" class="block text-sm font-medium text-gray-700">ID Ville</label>
                            <select name="id_ville" required>
                                <option value="">Sélectionnez une ville</option>
                                 <?php foreach ($lesVilles as $ville) {
                                     echo "<option value='{$ville['ID_VILLE']}'";
                                     if ($unAppart !=null && $ville['ID_VILLE'] == $unAppart['ID_VILLE']) echo " selected ";

                                     echo">{$ville['NOM']}</option>";
                                 } ?>
                             </select>
                         </div>

                            <div>
                        <label for="owner" class="block text-sm font-medium text-gray-700">Propriétaire</label>
                        <select id="owner" name="id_proprietaire" required>
                            <option value="">Sélectionner un propriétaire</option>
                            <?php
                            foreach ($lesProprietaires as $proprietaire) {    
                            echo "<option value='{$proprietaire['ID_PROPRIETAIRE']}'";

                            if ($unAppart !=null && $proprietaire['ID_PROPRIETAIRE'] == $unAppart['ID_PROPRIETAIRE']) echo " selected ";

                            echo ">{$proprietaire['NOM']} {$proprietaire['PRENOM']}</option>";
                               } ?>
                        </select>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Adresse</h3>
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Rue</label>
                        <input type="text" id="address" name="adresse" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500"  value="<?= ($unAppart!=null)?$unAppart['ADRESSE'] :'' ?>" >
                    </div>

                    <div>
                        <label for="postal-code" class="block text-sm font-medium text-gray-700">Code postal</label>
                        <input type="text" id="postal-code" name="code_postal" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500" value="<?= ($unAppart!=null)?$unAppart['CODE_POSTAL'] :'' ?>">
                    </div>
                </div>

                <!-- Documents -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Documents</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="doc1" class="block text-sm font-medium text-gray-700">Document 1</label>
                            <input type="file" id="doc1" name="img1" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-alpine-50 file:text-alpine-600 hover:file:bg-alpine-100">
                        </div>
                        
                        <div>
                            <label for="doc2" class="block text-sm font-medium text-gray-700">Document 2</label>
                            <input type="file" id="doc2" name="img2" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-alpine-50 file:text-alpine-600 hover:file:bg-alpine-100">
                        </div>
                        
                        <div>
                            <label for="doc3" class="block text-sm font-medium text-gray-700">Document 3</label>
                            <input type="file" id="doc3" name="img3" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-alpine-50 file:text-alpine-600 hover:file:bg-alpine-100">
                        </div>
                        
                        <div>
                            <label for="doc4" class="block text-sm font-medium text-gray-700">Document 4</label>
                            <input type="file" id="doc4" name="img4" accept=".pdf,.jpg,.jpeg,.png" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-alpine-50 file:text-alpine-600 hover:file:bg-alpine-100">
                        </div>
                    </div>
                </div>

                <!-- Caractéristiques -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Caractéristiques</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="type" name="type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500">
                                <option  value="">Sélectionner un type</option>
                                <option value="F1" <?php 
                            if ($unAppart !=null && $unAppart['TYPE'] == "F1") echo " selected "; ?> >F1</option>
                                <option value="F2" <?php 
                            if ($unAppart !=null && $unAppart['TYPE'] == "F2") echo " selected "; ?>>F2</option>
                                <option value="F3" <?php 
                            if ($unAppart !=null && $unAppart['TYPE'] == "F3") echo " selected "; ?>>F3</option>
                                <option value="F4" <?php 
                            if ($unAppart !=null && $unAppart['TYPE'] == "F4") echo " selected "; ?>>F4</option>
                            <option value="F5" <?php 
                            if ($unAppart !=null && $unAppart['TYPE'] == "F5") echo " selected "; ?>>F5</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="exposure" class="block text-sm font-medium text-gray-700">Exposition</label>
                            <select id="exposure" name="exposition" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500"> 
                                <option value="">Sélectionner une exposition</option>
                                   <option value="Nord">Nord</option>
                                    <option value="Sud">Sud</option>
                                    <option value="Est">Est</option>
                                    <option value="Ouest">Ouest</option>
                                    <option value="Nord-Est">Nord-Est</option>
                                    <option value="Nord-Ouest">Nord-Ouest</option>
                                    <option value="Sud-Est">Sud-Est</option>
                                    <option value="Sud-Ouest">Sud-Ouest</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="living-area" class="block text-sm font-medium text-gray-700">Surface habitable (m²)</label>
                            <input type="number" id="living-area" name="surface_habitable" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500" value="<?= ($unAppart!=null)?$unAppart['SURFACE_HABITABLE'] :'' ?>">

                        </div>
                        
                        <div>
                            <label for="balcony-area" class="block text-sm font-medium text-gray-700">Surface balcon (m²)</label>
                            <input type="number" id="balcony-area" name="surface_balcon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500" value="<?= ($unAppart!=null)?$unAppart['SURFACE_BALCON'] :'' ?>">
                        </div>
                        
                        <div>
                            <label for="capacity" class="block text-sm font-medium text-gray-700">Capacité (personnes)</label>
                            <input type="number" id="capacity" name="capacite" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500"  value="<?= ($unAppart!=null)?$unAppart['CAPACITE'] :'' ?>">
                        </div>
                        
                        <div>
                            <label for="distance" class="block text-sm font-medium text-gray-700">Distance des pistes (m)</label>
                            <input type="number" id="distance" name="distance" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-alpine-500 focus:ring-alpine-500" value="<?= ($unAppart!=null)?$unAppart['DISTANCE'] :'' ?>">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-6">
                    <button type="button" onclick="window.location.href='admin.html'" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpine-500">
                        Annuler
                    </button>
                    <?= ($unAppart!=null)? '<button type="submit" value="ok" name="modifier" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-alpine-600 hover:bg-alpine-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpine-500">
                        Modifier l\'appartement
                    </button>' : '<button type="submit" value="ok" name="ajouter"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-alpine-600 hover:bg-alpine-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpine-500">
                        Ajouter l\'appartement
                    </button>' ?>
                </div>
            </form>
        </div>
    </div>
</body>
</html>