@extends('admin.templateBase')

@section('title', 'Manage Sports')

@section('content')
<h1>Liste des sports</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sports as $sport)
            <tr>
                <td>{{ $sport->name }}</td>
                <td>
                    <form method="POST" action="{{ route('deleteSport', $sport->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Ajouter un nouveau sport</h1>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ route('storeSport') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nom du sport:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter un nouveau sport</button>
        </form>
    </div>
</div>
@endsection
