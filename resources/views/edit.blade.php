@extends('layouts.app')

@section('content')

    <h2>Edytuj zwierzaka</h2>
    
    <form method="POST" action="/edit">
        @csrf
        <input type="text" name="id" value="{{ $pet['id'] ?? '' }}" readonly><br>
        <input type="text" name="name" value="{{ $pet['name'] ?? '' }}" required><br>
        <select name="status" required>
            <option value="available" {{ ($pet['status'] ?? '') == 'available' ? 'selected' : '' }}>available</option>
            <option value="pending" {{ ($pet['status'] ?? '') == 'pending' ? 'selected' : '' }}>pending</option>
            <option value="sold" {{ ($pet['status'] ?? '') == 'sold' ? 'selected' : '' }}>sold</option>
        </select><br>
        <button type="submit">Zapisz zmiany</button>
    </form>
    @if(session('response'))
        <pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT) }}</pre>
    @endif
    <a href="/">Wróć</a>

@endsection