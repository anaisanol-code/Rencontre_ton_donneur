<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des utilisateurs</title>

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
            <h1 class="h2 mb-1">Gestion des utilisateurs</h1>

            <p class="text-secondary mb-0">
                Ajouter, modifier ou supprimer les utilisateurs.
            </p>
        </div>

        <a
            href="{{ route('admin.users.create') }}"
            class="btn btn-danger"
        >
            Ajouter un utilisateur
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
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Premium</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)

                    <tr>

                        <td>
                            <strong>{{ $user->name }}</strong>
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->role }}
                        </td>

                        <td>
                            {{ $user->is_premium ? 'Oui' : 'Non' }}
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <a
                                    href="{{ route('admin.users.edit', $user->id) }}"
                                    class="btn btn-sm btn-outline-secondary"
                                >
                                    Modifier
                                </a>

                                <form
                                    action="{{ route('admin.users.destroy', $user->id) }}"
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