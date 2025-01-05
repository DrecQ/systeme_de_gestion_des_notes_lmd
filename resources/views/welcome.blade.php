<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Menu Principal -->
    <nav class="bg-white shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center h-16 px-6">
            
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold text-blue-600">Gestion des notes LMD</a>
            
            <!-- Bouton Connexion -->
            <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">
                Connexion
            </a>
        </div>
    </nav>

    <!-- Section de Boutons Fonctionnalités (Vertical et large) -->
    <div class="flex flex-col items-center justify-center mt-16 space-y-6 w-full">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Explorez nos fonctionnalités</h1>

        <div class="flex flex-col space-y-4 w-1/2">
            <a href="{{route('insertionUe.store')}}" class="bg-blue-500 text-white text-center w-full px-8 py-4 rounded-md hover:bg-blue-600">
                Creation des UE
            </a>
            <a href="{{route('ue_id')}}" class="bg-red-500 text-white text-center w-full px-8 py-4 rounded-md hover:bg-red-600">
                Liste des UEs
            </a>
            <a href="{{route('etudiant')}}" class="bg-green-500 text-white text-center w-full px-8 py-4 rounded-md hover:bg-green-600">
                Gestion des Etudiants
            </a>
            <a href="#" class="bg-yellow-500 text-white text-center w-full px-8 py-4 rounded-md hover:bg-yellow-600">
                Voir les résultats
            </a>
        </div>
    </div>

</body>
</html>
