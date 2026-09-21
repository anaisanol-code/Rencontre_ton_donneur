<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrir - Rencontre ton donneur</title>

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
            <a class="nav-link active" href="{{ route('products.discover') }}">Découvrir</a>
            <a class="nav-link" href="{{ route('cart.index') }}">Panier</a>
            <a class="nav-link" href="{{ route('dashboard') }}">Mon compte</a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <h1 class="h3 mb-2">Découvrir</h1>

    <p class="text-secondary mb-4">
        Découvrez les profils disponibles.
    </p>

    <div class="row">

        @forelse($products as $product)

            <div class="col-md-6 col-lg-4 mb-4">

                <div class="border p-3 h-100">

                    <div class="profile-photo mb-3">
                        Profil
                    </div>

                    <h2 class="h5">
                        {{ $product->name }}

                        @if($product->premium)
                            <span class="badge bg-warning text-dark">
                                Premium
                            </span>
                        @endif
                    </h2>

                    <p>
                        {{ $product->description }}
                    </p>

                    <p class="mb-1">
                        <strong>Âge :</strong> {{ $product->age }} ans
                    </p>

                    <p class="mb-1">
                        <strong>Genre :</strong> {{ $product->gender }}
                    </p>

                    <p class="mb-1">
                        <strong>Taille :</strong> {{ $product->height }} m
                    </p>

                    <p class="mb-1">
                        <strong>Poids :</strong> {{ $product->weight }} kg
                    </p>

                    <p class="mb-1">
                        <strong>Groupe :</strong> {{ $product->blood_type }}
                    </p>

                    <p class="mb-1">
                        <strong>Région :</strong> {{ $product->region }}
                    </p>

                    <p>
                        <strong>Catégories :</strong>

                        @forelse($product->categories as $category)
                            {{ $category->name }}@if(!$loop->last), @endif
                        @empty
                            Aucune
                        @endforelse
                    </p>

                    <p>
                        <strong>
                            {{ number_format($product->price, 2, ',', ' ') }} €
                        </strong>
                    </p>

                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-danger">
                            Ajouter au panier
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <p>Aucun profil disponible pour le moment.</p>

        @endforelse

    </div>

</div>

<footer class="border-top py-3">
    <div class="container">
        Rencontre ton donneur
    </div>
</footer>

</body>
</html>