<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('admin.index') }}" class="text-decoration-none">
            ← Administration
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Commandes</h1>
    </div>

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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>

                    <td>
                        {{ $order->user->name }}
                    </td>

                    <td>
                        {{ number_format($order->total, 2, ',', ' ') }} €
                    </td>

                    <td>
                        {{ $order->status }}
                    </td>

                    <td>
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </td>

                    <td>
                        <a
                            href="{{ route('admin.orders.show', $order->id) }}"
                            class="btn btn-sm btn-secondary"
                        >
                            Voir
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Aucune commande.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>