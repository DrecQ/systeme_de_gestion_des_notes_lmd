<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Notes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Utilisation de Tailwind CSS ou autre -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Tableau des Notes</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Numéro Étudiant</th>
                    <th class="py-3 px-6 text-left">Nom Complet</th>
                    <th class="py-3 px-6 text-left">Matière</th>
                    <th class="py-3 px-6 text-center">Note</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($notes as $note)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $note->etudiant->numero_etudiant }}</td>
                        <td class="py-3 px-6 text-left">{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                        <td class="py-3 px-6 text-left">{{ $note->matiere->nom }}</td>
                        <td class="py-3 px-6 text-center">{{ $note->note }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:underline">Modifier</a>
                            |
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-3 px-6 text-center text-gray-500">Aucune note trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6 text-center">
            <a href="{{ route('notes.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Ajouter une Note
            </a>
        </div>
        
    </div>
</body>
</html>
