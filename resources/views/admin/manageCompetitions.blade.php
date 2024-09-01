@extends('admin.templateBase')

@section('title', 'Manage Competitions')

@section('content')
    <h1>Liste des compétitions</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Sport</th>
                <th>Lieu</th>
                <th>Capacité</th>
                <th>Places restantes</th>
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
                    <td>{{ optional($competition->place)->capacity }}</td>
                    <td>{{ $competition->place_restante }}</td>
                    <td>{{ $competition->type }}</td>
                    <td>{{ $competition->timeStart }}</td>
                    <td>{{ $competition->timeEnd }}</td>
                    <td>{{ $competition->price }}</td>
                    <td>
                        <form method="POST" action="{{ route('deleteCompetition', $competition->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Ajouter une nouvelle compétition</h1>

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('storeCompetition') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="sport_id">Sport:</label>
                    <select class="form-control" id="sport_id" name="sport_id">
                        @foreach($sports as $sport)
                            <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="place_id">Lieu:</label>
                    <select class="form-control" id="place_id" name="place_id">
                        @foreach($places as $place)
                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type">
                        <option value="1er tour">1er tour</option>
                        <option value="demi-finale">Demi-finale</option>
                        <option value="finale">Finale</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="timeStart">Début:</label>
                    <input type="datetime-local" class="form-control" id="timeStart" name="timeStart">
                </div>
                <div class="form-group">
                    <label for="timeEnd">Fin:</label>
                    <input type="datetime-local" class="form-control" id="timeEnd" name="timeEnd">
                </div>
                <div class="form-group">
                    <label for="price">Prix:</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter une nouvelle compétition</button>
            </form>
        </div>
    </div>
@endsection
