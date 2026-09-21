<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des produits</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">

        <a href="{{ route('admin.index') }}" class="navbar-brand fw-bold text-danger">
            Administration
        </a>

        <div>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                Accueil
            </a>
        </div>

    </div>
</nav>

<main class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h2 mb-1">Gestion des produits</h1>

            <p class="text-secondary mb-0">
                Ajouter, modifier ou supprimer les produits.
            </p>
        </div>

        <a
            href="{{ route('admin.products.create') }}"
            class="btn btn-danger"
        >
            Ajouter un produit
        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">

        <table class="table table-bordered align-middle">

            <thead class="table-light">
                <tr>
                    <th>Nom</th>
                    <th>Région</th>
                    <th>Catégories</th>
                    <th>Prix</th>
                    <th>Disponible</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($products as $product)

                    <tr>

                        <td>
                            <strong>{{ $product->name }}</strong>
                        </td>

                        <td>
                            {{ $product->region }}
                        </td>

                        <td>
                            @forelse ($product->categories as $category)
                                {{ $category->name }}@if (!$loop->last), @endif
                            @empty
                                Aucune
                            @endforelse
                        </td>

                        <td>
                            {{ $product->price }} €
                        </td>

                        <td>
                            {{ $product->available ? 'Oui' : 'Non' }}
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn btn-sm btn-outline-secondary"
                                >
                                    Modifier
                                </a>

                                <form
                                    action="{{ route('admin.products.destroy', $product->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                    >
                                        Supprimer
                                    </button>
                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</main>

<footer class="border-top py-4 mt-5">
    <div class="container">
        <span>Rencontre ton donneur</span>
    </div>
</footer>

</body>
</html>