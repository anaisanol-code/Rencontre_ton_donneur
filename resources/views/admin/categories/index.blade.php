<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catégories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-4">

    <div class="mb-4">
        <a href="{{ route('admin.index') }}" class="text-decoration-none">
            ← Administration
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Catégories</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-danger">
            Ajouter
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

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($categories as $category)

                <tr>
                    <td>
                        {{ $category->name }}
                    </td>

                    <td>
                        {{ $category->description }}
                    </td>

                    <td>

                        <a
                            href="{{ route('admin.categories.edit', $category->id) }}"
                            class="btn btn-sm btn-secondary"
                        >
                            Modifier
                        </a>

                        <form
                            action="{{ route('admin.categories.destroy', $category->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm btn-danger"
                            >
                                Supprimer
                            </button>
                        </form>

                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>