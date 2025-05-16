<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            min-height: 100vh;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .reservation-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(4px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 20px;
            max-width: 600px;
            width: 100%;
        }
        .reservation-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 16px 64px rgba(0, 0, 0, 0.5);
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        input[type="date"] {
    color: #000 !important;  /* Texte en noir */
    background-color: #fff; /* Fond blanc pour plus de contraste */
    border: 1px solid rgba(255, 255, 255, 0.5); /* Bordure visible */
    padding: 8px;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <div class="reservation-card p-6">
        <h1 class="text-3xl font-bold mb-4 text-center">Formulaire de Réservation</h1>
        <form method="POST" class="space-y-4">
            <input type="hidden" name="id_locataire" id="id_locataire" required>
            
            <div>
                <label class="block text-white text-sm font-bold mb-2">
                    Bâtiment numéro : <span class="font-semibold"><?= htmlspecialchars($id_batiment) ?></span>
                </label>
            </div>
            
            <div>
                <label class="block text-white text-sm font-bold mb-2">
                    Numéro Appartement : <span class="font-semibold"><?= htmlspecialchars($numero_appartement) ?></span>
                </label>
            </div>
            
            <div>
                <label for="date_debut" class="block text-white text-sm font-bold mb-2">Date de début :</label>
                <input type="date" id="date_debut" name="date_debut" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>
            
            <div>
                <label for="date_fin" class="block text-white text-sm font-bold mb-2">Date de fin :</label>
                <input type="date" id="date_fin" name="date_fin" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>
            
            <div class="btn-container">
                <button type="submit" name="Modifier" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">Modifier</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split('T')[0];
            document.getElementById("date_debut").setAttribute("min", today);
            document.getElementById("date_fin").setAttribute("min", today);
            
            document.getElementById("date_debut").addEventListener("change", function () {
                document.getElementById("date_fin").setAttribute("min", this.value);
            });
        });
    </script>
</body>
</html>
