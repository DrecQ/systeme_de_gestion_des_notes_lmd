<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Enregistrement - Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-md shadow-md w-1/3">
        <h2 class="text-2xl font-bold text-center mb-6">Enregistrer une Note</h2>

        <!-- Formulaire Notes -->
        <form action="" method="POST">
            @csrf

            <!-- Étudiant -->
            <div class="mb-4">
                <label for="etudiant_id" class="block text-gray-700">Étudiant</label>
                <select id="etudiant_id" name="etudiant_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <!-- Liste des étudiants récupérés -->
                    <option value="1">Étudiant 1</option>
                    <option value="2">Étudiant 2</option>
                    <option value="3">Étudiant 3</option>
                    <!-- Dynamique via Laravel -->
                </select>
            </div>

            <!-- EC (Enseignement / Matière) -->
            <div class="mb-4">
                <label for="ec_id" class="block text-gray-700">Enseignement / Matière</label>
                <input type="text" id="ec_id" name="ec_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Note -->
            <div class="mb-4">
                <label for="note" class="block text-gray-700">Note</label>
                <input type="number" step="0.01" id="note" name="note" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Session -->
            <div class="mb-4">
                <label for="session" class="block text-gray-700">Session</label>
                <select id="session" name="session" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="normale">Normale</option>
                    <option value="rattrapage">Rattrapage</option>
                </select>
            </div>

            <!-- Date d'Évaluation -->
            <div class="mb-4">
                <label for="date_evaluation" class="block text-gray-700">Date d'Évaluation</label>
                <input type="date" id="date_evaluation" name="date_evaluation" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Soumettre le Formulaire -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Enregistrer Note</button>
            </div><br>
            <div class="flex justify-center">

            <a href="{{route('welcome')}}" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-yellow-600">Retour</a>
            </div>

        </form>
    </div>

</body>
</html>
