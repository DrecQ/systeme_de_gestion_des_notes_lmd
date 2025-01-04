
<header>
    @vite('resources/css/app.css')
</header>

<body>  
    <div class="container mx-auto mt-10 overflow-x-auto">
       <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Liste des unités d'enseignement</h1>
        <table class="min-w-full bg-white border text-center">
            <thead>
                <tr class="border-t">
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Code</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Credits</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Semestre</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
          
            <tbody>
                @foreach($ues as $ue)
                <tr class="border-t">
                    <td class="py-3 px-4" >{{ $ue->code }}</td>
                    <td class="py-3 px-4" >{{ $ue->nom }}</td>
                    <td class="py-3 px-4" >{{ $ue->credits_ects }}</td>
                    <td class="py-3 px-4" >{{ $ue->semestre }}</td>
                    <td class="py-3 px-4"><a href="{{ route('listeECU')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Voir les Ecus</a></td>
                    <td class="py-3 px-4"><a href="{{ route('ue_id', ['ue' => $ue->id]) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Ajouter une Ecu</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>