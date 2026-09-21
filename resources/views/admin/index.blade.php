<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand fw-bold text-danger">
            Rencontre ton donneur
        </a>

        <div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-danger">
                Profils
            </a>

            <a href="{{ route('cart.index') }}" class="btn btn-danger">
                Panier
            </a>
        </div>
    </div>
</nav>

<main class="container py-5">

    <div class="mb-5">
        <h1 class="h2 mb-2">Administration</h1>

        <p class="text-secondary">
            Gérez les profils, les catégories et les utilisateurs.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="border bg-white p-4 h-100">
                <h2 class="h5">Profils</h2>

                <p class="text-secondary">
                    Ajouter, modifier ou supprimer les profils disponibles.
                </p>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="btn btn-danger"
                >
                    Gérer les profils
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="border bg-white p-4 h-100">
                <h2 class="h5">Catégories</h2>

                <p class="text-secondary">
                    Gérer les catégories associées aux profils.
                </p>

                <a
                    href="{{ route('admin.categories.index') }}"
                    class="btn btn-danger"
                >
                    Gérer les catégories
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="border bg-white p-4 h-100">
                <h2 class="h5">Utilisateurs</h2>

                <p class="text-secondary">
                    Modifier les rôles et les comptes utilisateurs.
                </p>

                <a
                    href="{{ route('admin.users.index') }}"
                    class="btn btn-danger"
                >
                    Gérer les utilisateurs
                </a>
            </div>
        </div>

    </div>

    <div class="mt-5">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">
            Retour à l'accueil
        </a>
    </div>

</main>

<footer class="border-top py-4 mt-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <span>Rencontre ton donneur</span>

            <a
                href="{{ route('home') }}"
                class="text-danger text-decoration-none"
            >
                Accueil
            </a>
        </div>
    </div>
</footer>

</body>
</html>
