<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un utilisateur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
        <a href="{{ route('admin.index') }}" class="navbar-brand fw-bold text-danger">
            Administration
        </a>

        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
            Retour
        </a>
    </div>
</nav>

<main class="container py-5">

    <h1 class="h2 mb-4">Ajouter un utilisateur</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.users.store') }}"
        method="POST"
        class="border bg-white p-4"
    >
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>

            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>

            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">
                Confirmer le mot de passe
            </label>

            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
                required
            >
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>

            <select name="role" id="role" class="form-select">
                <option value="user">Utilisateur</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="is_premium" class="form-label">Premium</label>

            <select name="is_premium" id="is_premium" class="form-select">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <button type="submit" class="btn btn-danger">
            Ajouter l'utilisateur
        </button>

    </form>

</main>

</body>
</html>