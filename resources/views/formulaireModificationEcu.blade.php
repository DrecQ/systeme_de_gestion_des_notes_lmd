<header>
    @vite('resources/css/app.css')
</header>

<body>
 <!-- Menu Principal -->
 <nav class="bg-white shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center h-16 px-4">
            
            <!-- Logo -->
            <a href="{{route('welcome')}}" class="text-xl font-bold text-blue-600">Retour</a>
        </div>
    </nav>

<div class="max-w-xl mx-auto mt-8 bg-gray p-4 rounded-lg shadow-lg">
<h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Modification ECUs</h1>
<form action="{{ route('elementsConstitutifs.update', $elementConstitutif->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="hidden" name="ue_id" value="{{ $ue->id }}">

    <label for="code" class="block text-sm font-medium text-gray-700">Code de l'ECU</label>
    <input type="text" name="code" id="code" value="{{ old('code', $elementConstitutif->code) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required><br><br>

    <label for="nom" class="block text-sm font-medium text-gray-700">Nom de l'ECU</label>
    <input type="text" name="nom" id="nom" value="{{ old('nom', $elementConstitutif->nom) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required><br><br>

    <label for="coefficient" class="block text-sm font-medium text-gray-700">Coefficient</label>
    <input type="number" name="coefficient" id="coefficient" value="{{ old('coefficient', $elementConstitutif->coefficient) }}" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required><br><br>

    <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-3 px-6 rounded-lg transition duration-3000">Enregistrer</button>
</form>

</div>

</body>
