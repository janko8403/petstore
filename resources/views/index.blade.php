@extends('layouts.app')

@section('content')

    <h1>Petstore Dashboard</h1>

    <a href="/add">Dodaj nowe zwierzę</a>

    <form method="GET" action="/">
        <label for="status">Filtruj po statusie:</label>
        <select name="status" onchange="this.form.submit()">
            <option value="available" {{ $currentStatus == 'available' ? 'selected' : '' }}>available</option>
            <option value="pending" {{ $currentStatus == 'pending' ? 'selected' : '' }}>pending</option>
            <option value="sold" {{ $currentStatus == 'sold' ? 'selected' : '' }}>sold</option>
        </select>
    </form>

    @if(session('response'))
        <pre>{{ print_r(session('response'), true) }}</pre>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Status</th>
            <th>Akcje</th>
        </tr>
        @foreach($pets as $pet)
            <tr>
                <td>{{ $pet['id'] }}</td>
                <td>{{ $pet['name'] ?? '-' }}</td>
                <td>{{ $pet['status'] ?? '-' }}</td>
                <td>
                    <a href="/edit?id={{ $pet['id'] }}">Edytuj</a>
                    <form action="/delete" method="POST" style="display:inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $pet['id'] }}">
                        <button type="submit">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    
    <div style="margin-top: 20px;">
        {{ $pets->links() }}
    </div>

    <style>
        nav.flex.items-center div.hidden {
            display: none;
        }
    </style>

@endsection