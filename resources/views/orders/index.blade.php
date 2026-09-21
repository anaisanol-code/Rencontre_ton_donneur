<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes commandes - Rencontre ton donneur</title>
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
            <a class="nav-link active" href="{{ route('orders.index') }}">Commandes</a>
            <a class="nav-link" href="{{ route('dashboard') }}">Mon compte</a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <h1 class="h3 mb-2">Mes commandes</h1>
    <p class="text-secondary mb-4">Retrouvez ici l'historique de vos commandes.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())

        <div class="border p-4">
            <h2 class="h5">Aucune commande</h2>
            <p class="text-secondary">Vous n'avez encore effectué aucune commande.</p>
            <a href="{{ route('products.index') }}" class="btn btn-danger">
                Voir les profils
            </a>
        </div>

    @else

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Commande</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y à H:i') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                {{ number_format($order->total, 2, ',', ' ') }} €
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-danger btn-sm">
                                    Voir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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