
<header>
    @vite('resources/css/app.css')
</header>
<body>
   <div class="max-w-xl mx-auto mt-12 bg-gray p-6 rounded-lg shadow-lg">
       <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Unités d'enseignement</h1>

        <form class="mb-6" action="{{ route('insertionUe.store') }}" method="POST">
                
        @csrf 

                <label class="block text-gray-700 font-medium mb-2" for="code">Code de l'ue</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" type="text" placeholder="Exemple : UAC123" name="code" required/><br><br>

                
                <label class="block text-gray-700 font-medium mb-2" for="nom">Nom de l'ue</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" placeholder="Exemple : Algorithmique" type="text" name="nom" required/><br><br>

                <label class="block text-gray-700 font-medium mb-2" for="credits_ects">Nombres de crédits de l'ue</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" placeholder="Nombre de crédits, ex : 4" type="number" name="credits_ects" required/><br><br>

                <label class="block text-gray-700 font-medium mb-2" for="semestre">Semestre</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" placeholder="Choisissez un nombres compris entre [1,6]" type="number" name="semestre" required/><br><br>

                <button class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-3 px-6 rounded-lg transition duration-3000" type="submit">Enregistrer</button>
            </form>    
    </div>
</body>