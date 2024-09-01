<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .panel-content {
            max-width: 600px;
            margin: 100px auto;
        }
        .btn-panel {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include("home-page/templateHeader") 

    <div class="panel-content">
        <h2 class="mb-4">Panel Administrateur</h2>
        <div class="list-group">
            <a href="{{ route('manageSports') }}" class="btn btn-primary btn-lg btn-block btn-panel">Gérer les sports</a>
            <a href="{{ route('managePlaces') }}" class="btn btn-primary btn-lg btn-block btn-panel">Gérer les lieux</a>
            <a href="{{ route('manageCompetitions') }}" class="btn btn-primary btn-lg btn-block btn-panel">Gérer les compétitions</a>
        </div>
    </div>
</body>
</html>