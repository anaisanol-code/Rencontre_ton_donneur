<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte - Rencontre ton donneur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Rencontre ton donneur
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('home') }}">Accueil</a>
            <a class="nav-link" href="{{ route('products.index') }}">Profils</a>
            <a class="nav-link" href="{{ route('cart.index') }}">Panier</a>
            <a class="nav-link active" href="{{ route('dashboard') }}">Mon compte</a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <h1 class="h3 mb-2">
        Bonjour {{ auth()->user()->name }}
    </h1>

    <p class="text-secondary">
        Bienvenue dans votre espace personnel.
    </p>

    <p class="mb-4">
        {{ auth()->user()->email }}
    </p>

    <h2 class="h5 mb-3">Mon espace</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="border p-3 h-100">
                <h3 class="h5">Profils</h3>
                <p class="text-secondary">
                    Consultez les profils disponibles.
                </p>
                <a href="{{ route('products.index') }}" class="btn btn-outline-danger">
                    Voir les profils
                </a>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="border p-3 h-100">
                <h3 class="h5">Découvrir</h3>
                <p class="text-secondary">
                    Découvrez les profils disponibles.
                </p>
                <a href="{{ route('products.discover') }}" class="btn btn-outline-danger">
                    Découvrir
                </a>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="border p-3 h-100">
                <h3 class="h5">Panier</h3>
                <p class="text-secondary">
                    Consultez les profils ajoutés à votre panier.
                </p>
                <a href="{{ route('cart.index') }}" class="btn btn-outline-danger">
                    Voir le panier
                </a>
            </div>
        </div>

    </div>

    <div class="border p-3 mb-3">
        <h2 class="h5">Mes commandes</h2>
        <p class="text-secondary">
            Consultez votre historique de commandes.
        </p>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-danger">
            Voir mes commandes
        </a>
    </div>

    <div class="border p-3 mb-4">
        <h2 class="h5">Paramètres du compte</h2>
        <p class="text-secondary">
            Modifiez vos informations personnelles ou gérez votre compte.
        </p>
        <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
            Paramètres
        </a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary">
            Se déconnecter
        </button>
    </form>

</div>

<footer class="border-top py-3">
    <div class="container">
        Rencontre ton donneur
    </div>
</footer>

</body>
</html>