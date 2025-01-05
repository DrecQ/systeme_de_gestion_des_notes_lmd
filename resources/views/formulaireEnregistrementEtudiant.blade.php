<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Enregistrement - Étudiant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
 

    <div class="bg-white p-8 rounded-md shadow-md w-1/3">
        <div class="max-w-6xl mx-auto flex justify-between items-center h-16 px-4"> 
            <a href="{{route('note')}}" class="w-full text-xl text-center font-bold bg-yellow-500 text-white px-6 py-3 rounded-md hover:bg-green-600">Ajouter des notes</a>
        </div><br>
        <h2 class="text-2xl font-bold text-center mb-6">Enregistrer un Étudiant</h2>
       
        <!-- Formulaire Étudiant -->
        <form action="" method="POST">
            @csrf

            <!-- Numéro Étudiant -->
            <div class="mb-4">
                <label for="numero_etudiant" class="block text-gray-700">Numéro Étudiant</label>
                <input type="text" id="numero_etudiant" name="numero_etudiant" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700">Nom</label>
                <input type="text" id="nom" name="nom" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Prénom -->
            <div class="mb-4">
                <label for="prenom" class="block text-gray-700">Prénom</label>
                <input type="text" id="prenom" name="prenom" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Niveau -->
            <div class="mb-4">
                <label for="niveau" class="block text-gray-700">Niveau</label>
                <select id="niveau" name="niveau" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                </select>
            </div>

            <!-- Soumettre le Formulaire -->
            <div class="flex justify-center">
                <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Enregistrer Étudiant</button>
            </div><br>
            <div class="flex justify-center">

<a href="{{route('welcome')}}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600">Retour</a>
</div>
</form>
    </div>
<!-- Menu Principal -->

</body>
</html>
