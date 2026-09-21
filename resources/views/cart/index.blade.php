<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier - Rencontre ton donneur</title>
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
            <a class="nav-link active" href="{{ route('cart.index') }}">Panier</a>

            @auth
                <a class="nav-link" href="{{ route('orders.index') }}">Commandes</a>
                <a class="nav-link" href="{{ route('dashboard') }}">Mon compte</a>
            @else
                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
            @endauth
        </div>
    </div>
</nav>

<div class="container py-5">

    <h1 class="h3 mb-2">Mon panier</h1>
    <p class="text-secondary mb-4">
        Retrouvez les profils que vous avez ajoutés à votre panier.
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(empty($cart))

        <div class="border p-4">
            <h2 class="h5">Votre panier est vide</h2>
            <p class="text-secondary">
                Vous n'avez encore ajouté aucun profil.
            </p>
            <a href="{{ route('products.index') }}" class="btn btn-danger">
                Voir les profils
            </a>
        </div>

    @else

        <div class="row">

            <div class="col-lg-8">

                @foreach($cart as $item)

                    <div class="border p-3 mb-3">

                        <h2 class="h5 mb-2">
                            {{ $item['name'] }}
                        </h2>

                        <p class="mb-1">
                            Prix unitaire :
                            {{ number_format($item['price'], 2, ',', ' ') }} €
                        </p>

                        <p class="mb-3">
                            Sous-total :
                            <strong>
                                {{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} €
                            </strong>
                        </p>

                        <div class="d-flex flex-wrap gap-2">

                            <form action="{{ route('cart.update', $item['product_id']) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                @method('PUT')

                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item['quantity'] }}"
                                    min="1"
                                    class="form-control"
                                    style="width: 80px;"
                                >

                                <button type="submit" class="btn btn-outline-danger">
                                    Modifier
                                </button>
                            </form>

                            <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-secondary">
                                    Supprimer
                                </button>
                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="col-lg-4">

                <div class="border p-4">

                    <h2 class="h5 mb-4">Récapitulatif</h2>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Articles</span>
                        <span>{{ count($cart) }}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <strong>Total</strong>
                        <strong>
                            {{ number_format($total, 2, ',', ' ') }} €
                        </strong>
                    </div>

                    @auth

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                Valider ma commande
                            </button>
                        </form>

                    @else

                        <a href="{{ route('login') }}" class="btn btn-danger w-100">
                            Se connecter pour commander
                        </a>

                        <p class="small text-secondary text-center mt-2">
                            Vous devez être connecté pour valider votre commande.
                        </p>

                    @endauth

                    <form action="{{ route('cart.clear') }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-secondary w-100">
                            Vider le panier
                        </button>
                    </form>

                </div>

            </div>

        </div>

    @endif

</div>

<footer class="border-top py-3">
    <div class="container">
        Rencontre ton donneur
    </div>
</footer>

</body>
</html>