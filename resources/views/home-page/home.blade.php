<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - Site des Jeux Olympiques</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @include("home-page/templateHeader")   
</head>
<body>
    <div class="container">
        <header>
            <h1 class="text-center mt-5">Bienvenue sur le site des Jeux Olympiques</h1>
        </header>
        <main>
            <div class="jumbotron mt-5">
                <h2 class="display-4">Découvrez les compétitions en direct !</h2>
                <p class="lead">Consultez le calendrier des compétitions et réservez vos billets dès maintenant.</p>
                <hr class="my-4">
                <p class="h3">Les identifiants pour acceder au panel administrateur sont [admin ; password]</p>
                <a class="btn btn-primary btn-lg" href="/calendrier" role="button">Voir le calendrier</a>
            </div>

            <section class="my-5">
                <h2 class="text-center">À propos des Jeux Olympiques</h2>
                <p class="text-center">Les Jeux Olympiques sont un événement international majeur mettant en compétition des athlètes du monde entier dans divers sports.</p>
                <p class="text-center">Les Jeux Olympiques sont un symbole d'unité, de compétition saine et d'excellence sportive.</p>
            </section>

            <section class="my-5">
                <h2 class="text-center">Sports aux Jeux Olympiques</h2>
                <p class="text-center">Découvrez des sports lors des Jeux Olympiques, des épreuves traditionnelles aux sports modernes.</p>
                <p class="text-center">Chaque sport est une occasion de voir les meilleurs athlètes du monde en action.</p>
            </section>

            <section class="my-5">
                <h2 class="text-center">Fonctionnalités du site</h2>
                <p class="text-center">Explorez les différentes fonctionnalités du site pour vivre pleinement l'expérience des Jeux Olympiques :</p>
                <ul class="list-group">
                    <li class="list-group-item">Consultation du calendrier des compétitions</li>
                    <li class="list-group-item">Réservation de billets pour les événements sportifs</li>
                    <li class="list-group-item">Informations sur les sports et les lieux des compétitions</li>
                    <li class="list-group-item">Gestion des compétitions pour les organisateurs</li>
                </ul>
            </section>
        </main>
    </div>
</body>
</html>