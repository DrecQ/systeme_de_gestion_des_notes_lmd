<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Application Université</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Lien vers le fichier CSS -->
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-universite.png') }}" alt="Logo de l'université" class="mx-auto w-32 h-32">
            <h1 class="text-3xl font-bold mt-4">Bienvenue sur l'Application Universitaire</h1>
        </div>

        <!-- Boutons de navigation -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ajouter des étudiants -->
            <a href="{{ route('etudiants.create') }}" class="block bg-blue-500 text-white text-center py-4 rounded-lg shadow hover:bg-blue-600">
                Ajouter un Étudiant
            </a>

            <!-- Consulter la liste des étudiants -->
            <a href="{{ route('etudiants.index') }}" class="block bg-green-500 text-white text-center py-4 rounded-lg shadow hover:bg-green-600">
                Voir les Étudiants
            </a>

            <!-- Ajouter des notes -->
            <a href="{{ route('notes.create') }}" class="block bg-purple-500 text-white text-center py-4 rounded-lg shadow hover:bg-purple-600">
                Ajouter des Notes
            </a>

            <!-- Gérer les Unités d'Enseignement -->
            <a href="{{ route('ue.create') }}" class="block bg-orange-500 text-white text-center py-4 rounded-lg shadow hover:bg-orange-600">
                Créer des Unités d'Enseignement
            </a>

            <!-- Modifier des notes -->
            <a href="{{ route('notes.index') }}" class="block bg-red-500 text-white text-center py-4 rounded-lg shadow hover:bg-red-600">
                Modifier ou Supprimer des Notes
            </a>

            <!-- À compléter -->
            <a href="#" class="block bg-gray-500 text-white text-center py-4 rounded-lg shadow hover:bg-gray-600">
                Autres Fonctionnalités
            </a>
        </div>
    </div>
</body>
</html>
