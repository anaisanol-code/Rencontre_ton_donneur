<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier une catégorie</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-4">

    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
        ← Retour aux catégories
    </a>

    <h1 class="h3 mt-4 mb-4">Modifier une catégorie</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">
                Nom de la catégorie
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ $category->name }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                class="form-control"
                rows="4"
                required
            >{{ $category->description }}</textarea>
        </div>

        <div class="mb-3">

            <label class="form-label">
                Produits de cette catégorie
            </label>

            @foreach($products as $product)

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="products[]"
                        value="{{ $product->id }}"
                        class="form-check-input"
                        id="product{{ $product->id }}"
                        {{ $category->products->contains($product->id) ? 'checked' : '' }}
                    >

                    <label
                        class="form-check-label"
                        for="product{{ $product->id }}"
                    >
                        {{ $product->name }}
                    </label>

                </div>

            @endforeach

        </div>

        <button type="submit" class="btn btn-danger">
            Enregistrer
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