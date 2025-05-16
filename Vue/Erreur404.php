<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404 - Page Introuvable</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="text-center">
        <h1 class="text-9xl font-bold text-blue-600">404</h1>
        <h2 class="text-3xl font-semibold text-gray-800 mt-4">Oups! Page non trouvée</h2>
        <p class="text-gray-600 mt-2">Désolé, la page que vous cherchez n'existe pas ou a été déplacée.</p>

        <a href="../index.php" class="mt-6 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg text-lg font-medium shadow-md hover:bg-blue-600 transition">
            Retour à l'accueil
        </a>
    </div>

    <script>
    setTimeout(() => {
        window.location.href = "../index.php";
    }, 5000); // Redirection après 5 secondes
</script>


</body>
</html>
