
<header>
    @vite('resources/css/app.css')
</header>
<body>
   <div class="max-w-xl mx-auto mt-12 bg-gray p-6 rounded-lg shadow-lg">
       <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Eléments constitutifs</h1>

        <form class="mb-6" action="" method="POST">
                
        @csrf 

                <input type="hidden" name="ue_id" value="{{ $ue->id }}">

                <label class="block text-gray-700 font-medium mb-2" for="code">Code de l'ECU</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" type="text" placeholder="Exemple : UAC123" name="code" required/><br><br>

                
                <label class="block text-gray-700 font-medium mb-2" for="nom">Nom de l'ECU</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" placeholder="Exemple : Algorithmique" type="text" name="nom" required/><br><br>

                <label class="block text-gray-700 font-medium mb-2" for="coefficient">Coefficient</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" placeholder="Nombre de crédits, ex : 4" type="number" name="coefficient" required/><br><br>

                <label class="block text-gray-700 font-medium mb-2" for="semestre">UE correspondant</label>
                <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-22 focus:ring-indigo-500 focus-outline-none" placeholder="" value="{{ $ue-> id}}" type="number" name="ue_id" required/><br><br>

                <button class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-3 px-6 rounded-lg transition duration-3000" type="submit">Enregistrer</button>
            </form>    
    </div>
</body>