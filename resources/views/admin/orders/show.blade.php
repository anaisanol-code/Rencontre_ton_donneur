<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande #{{ $order->id }}</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
            ← Retour aux commandes
        </a>
    </div>

    <h1 class="h3 mb-4">
        Commande #{{ $order->id }}
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <strong>Utilisateur :</strong>
        {{ $order->user->name }}
    </p>

    <p>
        <strong>Email :</strong>
        {{ $order->user->email }}
    </p>

    <p>
        <strong>Date :</strong>
        {{ $order->created_at->format('d/m/Y H:i') }}
    </p>

    <p>
        <strong>Total :</strong>
        {{ number_format($order->total, 2, ',', ' ') }} €
    </p>

    <hr>

    <h2 class="h5 mb-3">Modifier le statut</h2>

    <form
        action="{{ route('admin.orders.update_status', $order->id) }}"
        method="POST"
        class="mb-4"
    >
        @csrf
        @method('PUT')

        <div class="row align-items-end">
            <div class="col-md-6">
                <label for="status" class="form-label">
                    Statut
                </label>

                <select name="status" id="status" class="form-select">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                        En attente
                    </option>

                    <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>
                        Payée
                    </option>

                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>
                        Expédiée
                    </option>

                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>
                        Terminée
                    </option>

                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                        Annulée
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-danger">
                    Modifier
                </button>
            </div>
        </div>
    </form>

    <h2 class="h5 mb-3">Produits commandés</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>
                        {{ $item->product->name }}
                    </td>

                    <td>
                        {{ number_format($item->price, 2, ',', ' ') }} €
                    </td>

                    <td>
                        {{ $item->quantity }}
                    </td>

                    <td>
                        {{ number_format($item->price * $item->quantity, 2, ',', ' ') }} €
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>