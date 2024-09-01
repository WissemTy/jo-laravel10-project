@extends('admin.templateBase')

@section('title', 'Réservez vos billets')

@section('content')
    <h1>Réservation des billets</h1>

    <form method="POST" action="{{ route('reservation.store') }}">
        @csrf

        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="firstName">Prénom:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="phoneNumber">Téléphone:</label>
            <input type="text" id="phoneNumber" name="phoneNumber">
        </div>

        <div>
            <label for="competition">Choisir une compétition:</label>
            <select id="competition" name="competition" required>
                <option value="">Sélectionner une compétition</option>
                @foreach ($competitions as $competition)
                    <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="numberOfPlaces">Nombre de places:</label>
            <input type="number" id="numberOfPlaces" name="numberOfPlaces" min="1" max="5" value="1" required>
        </div>

        <div id="additionalNames"></div>

        <button type="submit">Réserver</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const numberOfPlacesInput = document.getElementById('numberOfPlaces');
            const additionalNamesDiv = document.getElementById('additionalNames');

            numberOfPlacesInput.addEventListener('input', function () {
                const numberOfPlaces = parseInt(numberOfPlacesInput.value);
                additionalNamesDiv.innerHTML = '';

                for (let i = 1; i < numberOfPlaces; i++) {
                    const personDiv = document.createElement('div');
                    personDiv.innerHTML = `
                        <label for="name${i}">Nom:</label>
                        <input type="text" id="name${i}" name="names[]" required>
                        <label for="firstName${i}">Prénom:</label>
                        <input type="text" id="firstName${i}" name="firstNames[]" required>
                    `;
                    additionalNamesDiv.appendChild(personDiv);
                }
            });
        });
    </script>
@endsection
