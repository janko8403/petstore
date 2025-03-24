@extends('layouts.app')

@section('content')

    <h2>Dodaj zwierzaka</h2>
    
    <form method="POST" action="/add-pet">
        @csrf
        <input type="text" name="name" placeholder="Nazwa" required><br>
        <select name="status" required>
            <option value="available">available</option>
            <option value="pending">pending</option>
            <option value="sold">sold</option>
        </select><br>
        <button type="submit">Dodaj</button>
    </form>
    @if(session('response'))
        <pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT) }}</pre>
    @endif
    <a href="/">Wróć</a>

@endsection