<form action="{{ route('notes.store') }}" method="POST">
    @csrf
    <select name="ec_id">
        @foreach($ecs as $ec)
            <option value="{{ $ec->id }}">{{ $ec->code }} - {{ $ec->nom }}</option>
        @endforeach
    </select>
    <input type="number" name="note" min="0" max="20" step="0.25" required>
    <select name="session">
        <option value="normale">Session Normale</option>
        <option value="rattrapage">Rattrapage</option>
    </select>
    <button type="submit">Enregistrer</button>
</form>
