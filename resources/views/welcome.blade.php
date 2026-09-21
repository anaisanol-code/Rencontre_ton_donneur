<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rencontre ton donneur</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Rencontre ton donneur
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="{{ route('home') }}">
                Accueil
            </a>

            <a class="nav-link" href="{{ route('products.index') }}">
                Profils
            </a>

            <a class="nav-link" href="{{ route('cart.index') }}">
                Panier
            </a>

            @guest
                <a class="nav-link" href="{{ route('login') }}">
                    Connexion
                </a>

                <a class="nav-link" href="{{ route('register') }}">
                    Inscription
                </a>
            @else
                <a class="nav-link" href="{{ route('dashboard') }}">
                    Mon compte
                </a>

                @if(auth()->user()->role === 'admin')
                    <a class="nav-link" href="{{ route('admin.index') }}">
                        Administration
                    </a>
                @endif
            @endguest

        </div>

    </div>
</nav>


<main>

    <section class="home-intro">
        <div class="container">

            <h1>Rencontre ton donneur</h1>

            <p>
                Découvrez des profils de donneurs et trouvez celui qui correspond
                à vos besoins.
            </p>

            <a href="{{ route('products.index') }}" class="btn btn-danger mt-3">
                Voir les profils
            </a>

        </div>
    </section>


    <section class="container py-5">

        <h2 class="h3 mb-4">Quelques profils</h2>

        <div class="row">

            @foreach($products->take(3) as $product)

                <div class="col-md-4 mb-4">

                    <div class="border p-3 h-100">

                        <div class="profile-photo mb-3">
                            @if($product->image)
                                <img
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid"
                                >
                            @else
                                Pas de photo
                            @endif
                        </div>

                        <h3 class="h5">
                            {{ $product->name }}

                            @if($product->premium)
                                <span class="badge bg-warning text-dark">
                                    Premium
                                </span>
                            @endif
                        </h3>

                        <p>
                            <strong>Sexe :</strong>
                            {{ $product->gender }}
                        </p>

                        <p>
                            <strong>Âge :</strong>
                            {{ $product->age }} ans
                        </p>

                        <p>
                            <strong>Taille :</strong>
                            {{ $product->height }} m
                        </p>

                        <p>
                            <strong>Groupe sanguin :</strong>
                            {{ $product->blood_type }}
                        </p>

                        <p>
                            <strong>Région :</strong>
                            {{ $product->region }}
                        </p>

                        <p>
                            <strong>Prix :</strong>
                            {{ number_format($product->price, 2, ',', ' ') }} €
                        </p>

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-outline-danger"
                        >
                            Voir
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </section>


    <section class="container pb-5">

        <h2 class="h3 mb-4">Catégories</h2>

        <div class="row">

            @foreach($categories as $category)

                <div class="col-md-3 mb-3">

                    <div class="border p-3">

                        <h3 class="h5">
                            {{ $category->name }}
                        </h3>

                        <p class="mb-2">
                            {{ $category->description }}
                        </p>

                        <small>
                            {{ $category->products_count }} profil(s)
                        </small>

                    </div>

                </div>

            @endforeach

        </div>

    </section>


    <section class="container pb-5">

        <h2 class="h3 mb-4">Comment ça fonctionne ?</h2>

        <ol>
            <li class="mb-2">
                Consultez les profils disponibles.
            </li>

            <li class="mb-2">
                Choisissez les profils qui vous intéressent.
            </li>

            <li class="mb-2">
                Ajoutez-les au panier.
            </li>

            <li>
                Connectez-vous pour valider votre commande.
            </li>
        </ol>

    </section>

</main>


<footer class="border-top py-4">

    <div class="container">

        <p class="mb-0">
            © {{ date('Y') }} Rencontre ton donneur
        </p>

    </div>

</footer>

</body>
</html>