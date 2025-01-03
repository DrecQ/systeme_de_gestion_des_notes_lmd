@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Note</h1>
    <form action="{{ route('notes.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="etudiant_id" class="block text-sm font-medium">Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="border rounded p-2 w-full">
                @foreach($etudiants as $etudiant)
                    <option value="{{ $etudiant->id }}">{{ $etudiant->numero_etudiant }} - {{ $etudiant->nom }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="ec_id" class="block text-sm font-medium">EC</label>
            <select name="ec_id" id="ec_id" class="border rounded p-2 w-full">
                @foreach($ecs as $ec)
                    <option value="{{ $ec->id }}">{{ $ec->nom }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="note" class="block text-sm font-medium">Note</label>
            <input type="number" name="note" id="note" step="0.01" min="0" max="20" class="border rounded p-2 w-full">
        </div>
        <div>
            <label for="session" class="block text-sm font-medium">Session</label>
            <select name="session" id="session" class="border rounded p-2 w-full">
                <option value="normale">Normale</option>
                <option value="rattrapage">Rattrapage</option>
            </select>
        </div>
        <div>
            <label for="date_evaluation" class="block text-sm font-medium">Date d'Évaluation</label>
            <input type="date" name="date_evaluation" id="date_evaluation" class="border rounded p-2 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection