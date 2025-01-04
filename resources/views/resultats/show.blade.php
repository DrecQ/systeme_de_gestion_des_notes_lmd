<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de {{ $etudiant->nom }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Résultats de {{ $etudiant->nom }} {{ $etudiant->prenom }}</h1>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Unité d'Enseignement</th>
                    <th class="py-3 px-6 text-center">Moyenne</th>
                    <th class="py-3 px-6 text-center">Validation</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($results as $ueResult)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">{{ $ueResult['ue'] }}</td>
                        <td class="py-3 px-6 text-center">{{ number_format($ueResult['average'], 2) }}</td>
                        <td class="py-3 px-6 text-center">
                            @if ($ueResult['validated'])
                                <span class="text-green-500 font-bold">Validé</span>
                            @else
                                <span class="text-red-500 font-bold">Non Validé</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('resultats.index') }}" class="text-blue-500 mt-6 inline-block">Retour à la liste des résultats</a>
    </div>
</body>
</html>
