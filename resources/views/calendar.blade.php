@extends('admin.templateBase')

@section('title', 'Calendrier des compétitions')

@section('content')
    <form method="GET" action="{{ route('competition.filter') }}">
        @csrf
        <label for="sport">Filtrer par sport:</label>
        <select name="sport" id="sport">
            <option value="">Tous les sports</option>
            @foreach($sports as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
            @endforeach
        </select>

        <label for="place">Filtrer par lieu:</label>
        <select name="place" id="place">
            <option value="">Tous les lieux</option>
            @foreach($places as $place)
                <option value="{{ $place->id }}">{{ $place->name }}</option>
            @endforeach
        </select>

        <label for="sort">Trier par:</label>
        <select name="sort" id="sort">
            <option value="">-- Choisir un critère de tri --</option>
            <option value="price_asc">Prix croissant</option>
            <option value="price_desc">Prix décroissant</option>
            <option value="date_asc">Date croissante</option>
            <option value="date_desc">Date décroissante</option>
        </select>

        <button type="submit">Filtrer et Trier</button>
    </form>

    <h1>Liste des compétitions</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Sport</th>
                <th>Lieu</th>
                <th>Type</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($competitions as $competition)
                <tr>
                    <td>{{ $competition->name }}</td>
                    <td>{{ optional($competition->sport)->name }}</td>
                    <td>{{ optional($competition->place)->name }}</td>
                    <td>{{ $competition->type }}</td>
                    <td>{{ $competition->timeStart }}</td>
                    <td>{{ $competition->timeEnd }}</td>
                    <td>{{ $competition->price }}</td>
                    <td>
                        <form method="GET" action="{{ route('reservation.show') }}">
                        @csrf
                        <input type="hidden" name="competition_id" value="{{ $competition->id }}">
                        <button type="submit">Réserver</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection