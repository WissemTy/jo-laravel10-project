@extends('admin.templateBase')

@section('title', 'Manage Places')

@section('content')
    <h1>Liste des lieux</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Capatité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->description }}</td>
                    <td>{{ $place->capacity }}</td>
                    <td>
                        <form method="POST" action="{{ route('deletePlace', $place->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Ajouter un nouveau lieu</h1>

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('storePlace') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nom du lieu:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="capacity">Capacité:</label>
                    <input type="text" class="form-control" id="capacity" name="capacity">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter un nouveau lieu</button>
            </form>
        </div>
    </div>
@endsection
