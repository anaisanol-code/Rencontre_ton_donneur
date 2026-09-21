<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter une catégorie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-4">

    <div class="mb-4">
        <a
            href="{{ route('admin.categories.index') }}"
            class="text-decoration-none"
        >
            ← Retour aux catégories
        </a>
    </div>

    <h1 class="h3 mb-4">Ajouter une catégorie</h1>

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
        action="{{ route('admin.categories.store') }}"
        method="POST"
    >

        @csrf

        <div class="mb-3">

            <label for="name" class="form-label">
                Nom
            </label>

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

            <label for="description" class="form-label">
                Description
            </label>

            <textarea
                name="description"
                id="description"
                class="form-control"
                rows="4"
                required
            >{{ old('description') }}</textarea>

        </div>

        <button type="submit" class="btn btn-danger">
            Ajouter
        </button>

        <a
            href="{{ route('admin.categories.index') }}"
            class="btn btn-secondary"
        >
            Annuler
        </a>

    </form>

</div>

</body>
</html>