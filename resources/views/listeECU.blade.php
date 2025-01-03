<header>
    @vite('resources/css/app.css')
</header>

<body>  
    <div class="container mx-auto mt-10 overflow-x-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Liste des ECUs par Semestre</h1>

        @foreach($ues as $semestre => $uesParSemestre)
            <h1 class="text-3xl text-left font-bold text-blue-700 mt-10">
                Semestre : {{ $semestre }}
            </h1>

            @foreach($uesParSemestre as $ue)
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b pb-4">
    <h2 class="text-2xl font-bold text-gray-700 mb-2 md:mb-0">
        {{ $ue->nom }}
    </h2>
    <a href="" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded shadow-lg transition-transform transform hover:scale-105">
        + Ajouter un ECU
    </a>
</div>



                    <table class="min-w-full bg-white border text-center mb-8">
                        <thead>
                            <tr class="border-t">
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Code</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Nom de l'ECU</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Coefficient</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse($ue->elementsConstitutifs as $ec)
                                <tr class="border-t">
                                    <td class="py-3 px-4">{{ $ec->code }}</td>
                                    <td class="py-3 px-4">{{ $ec->nom }}</td>
                                    <td class="py-3 px-4">{{ $ec->coefficient }}</td>
                                    <td class="py-3 px-4">
                                        <a href="" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Modifier</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-4">Aucun EC disponible pour le moment.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    
                </div>
            @endforeach
        @endforeach
    </div>
</body>
