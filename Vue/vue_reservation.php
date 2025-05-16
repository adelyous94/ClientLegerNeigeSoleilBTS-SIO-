<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="../CSS/cssnavbar.css">
    <link rel="stylesheet" href="../CSS/formulaireinscription.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
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
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4 text-center">Formulaire de Réservation</h1>
        <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            
            <input type="hidden" name="id_locataire" id="id_locataire" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
           
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Bâtiment numéro : <span class="font-semibold"><?= htmlspecialchars($id_batiment) ?></span>	
                </label>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Numéro Appartement : <span class="font-semibold"><?= htmlspecialchars($numero_appartement) ?></span>
                </label>
            </div>

            <!-- Champ Date de début -->
            <div class="mb-4">
                <label for="date_debut" class="block text-gray-700 text-sm font-bold mb-2">Date de début :</label>
                <input type="date" id="date_debut" name="date_debut" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    required>
            </div>

            <!-- Champ Date de fin -->
            <div class="mb-4">
                <label for="date_fin" class="block text-gray-700 text-sm font-bold mb-2">Date de fin :</label>
                <input type="date" id="date_fin" name="date_fin" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    required>
            </div>

            <!-- Bouton Réserver -->
            <div class="flex items-center justify-between">
                <button type="submit" name="reserver" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Réserver
                </button>
            </div>
        </form>
    </div>

    <script>
        // Définir la date minimale pour éviter les dates passées
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split('T')[0];
            document.getElementById("date_debut").setAttribute("min", today);
            document.getElementById("date_fin").setAttribute("min", today);

            // Empêcher une date de fin antérieure à la date de début
            document.getElementById("date_debut").addEventListener("change", function () {
                document.getElementById("date_fin").setAttribute("min", this.value);
            });
        });
    </script>

</body>
</html>
