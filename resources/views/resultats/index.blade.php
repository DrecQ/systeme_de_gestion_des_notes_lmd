<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Étudiants</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Résultats des Étudiants</h1>

        @foreach ($results as $result)
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold mb-4">{{ $result['etudiant']->nom }} {{ $result['etudiant']->prenom }}</h2>
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">Unité d'Enseignement</th>
                            <th class="py-3 px-6 text-center">Moyenne</th>
                            <th class="py-3 px-6 text-center">Validation</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($result['results'] as $ueResult)
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
            </div>
        @endforeach

        
        <div class="mt-6">
            {{ $etudiants->links() }}
        </div>
    </div>
</body>
</html>
