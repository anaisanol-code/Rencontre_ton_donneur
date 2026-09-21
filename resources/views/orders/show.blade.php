<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande #{{ $order->id }} - Rencontre ton donneur</title>
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

    <a href="{{ route('orders.index') }}" class="text-danger text-decoration-none">
        ← Retour à mes commandes
    </a>

    <h1 class="h3 mt-4 mb-2">
        Commande #{{ $order->id }}
    </h1>

    <p class="text-secondary mb-4">
        Commande passée le {{ $order->created_at->format('d/m/Y à H:i') }}
    </p>

    <div class="row">

        <div class="col-lg-8 mb-4">

            <div class="border p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 mb-0">Profils commandés</h2>
                    <span>{{ $order->status }}</span>
                </div>

                @foreach($order->items as $item)

                    <div class="border-top py-3">

                        <div class="row">

                            <div class="col-md-8">
                                <h3 class="h6">
                                    {{ $item->product->name }}
                                </h3>

                                <p class="text-secondary mb-1">
                                    Prix unitaire :
                                    {{ number_format($item->price, 2, ',', ' ') }} €
                                </p>

                                <p class="text-secondary mb-0">
                                    Quantité : {{ $item->quantity }}
                                </p>
                            </div>

                            <div class="col-md-4 text-md-end mt-2 mt-md-0">
                                <strong>
                                    {{ number_format($item->price * $item->quantity, 2, ',', ' ') }} €
                                </strong>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        <div class="col-lg-4">

            <div class="border p-4">

                <h2 class="h5 mb-4">Récapitulatif</h2>

                <div class="d-flex justify-content-between mb-3">
                    <span>Nombre de profils</span>
                    <span>{{ $order->items->sum('quantity') }}</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>
                        {{ number_format($order->total, 2, ',', ' ') }} €
                    </strong>
                </div>

            </div>

        </div>

    </div>

</div>

<footer class="border-top py-3">
    <div class="container">
        Rencontre ton donneur
    </div>
</footer>

</body>
</html>