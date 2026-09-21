<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modifier un profil</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container py-4">

    <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
        ← Retour aux profils
    </a>

    <h1 class="h3 mt-4 mb-4">Modifier un profil</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du profil</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ $product->name }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                id="description"
                name="description"
                class="form-control"
                rows="4"
                required
            >{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prix</label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                value="{{ $product->price }}"
                step="0.01"
                min="0"
                required
            >
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Genre</label>

            <select id="gender" name="gender" class="form-select" required>
                <option value="Femme" {{ $product->gender == 'Femme' ? 'selected' : '' }}>
                    Femme
                </option>

                <option value="Homme" {{ $product->gender == 'Homme' ? 'selected' : '' }}>
                    Homme
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Âge</label>

            <input
                type="number"
                id="age"
                name="age"
                class="form-control"
                value="{{ $product->age }}"
                min="0"
                required
            >
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">Taille (m)</label>

            <input
                type="number"
                id="height"
                name="height"
                class="form-control"
                value="{{ $product->height }}"
                step="0.01"
                min="0"
                required
            >
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Poids (kg)</label>

            <input
                type="number"
                id="weight"
                name="weight"
                class="form-control"
                value="{{ $product->weight }}"
                step="0.01"
                min="0"
                required
            >
        </div>

        <div class="mb-3">
            <label for="blood_type" class="form-label">
                Groupe sanguin
            </label>

            <select id="blood_type" name="blood_type" class="form-select" required>
                @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodType)
                    <option
                        value="{{ $bloodType }}"
                        {{ $product->blood_type == $bloodType ? 'selected' : '' }}
                    >
                        {{ $bloodType }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="region" class="form-label">Région</label>

            <input
                type="text"
                id="region"
                name="region"
                class="form-control"
                value="{{ $product->region }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>

            <select id="status" name="status" class="form-select" required>
                <option
                    value="available"
                    {{ $product->status == 'available' ? 'selected' : '' }}
                >
                    Disponible
                </option>

                <option
                    value="unavailable"
                    {{ $product->status == 'unavailable' ? 'selected' : '' }}
                >
                    Indisponible
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="available" class="form-label">
                Disponible
            </label>

            <select id="available" name="available" class="form-select" required>
                <option value="1" {{ $product->available ? 'selected' : '' }}>
                    Oui
                </option>

                <option value="0" {{ !$product->available ? 'selected' : '' }}>
                    Non
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="premium" class="form-label">
                Profil premium
            </label>

            <select id="premium" name="premium" class="form-select" required>
                <option value="1" {{ $product->premium ? 'selected' : '' }}>
                    Oui
                </option>

                <option value="0" {{ !$product->premium ? 'selected' : '' }}>
                    Non
                </option>
            </select>
        </div>

        {{-- Catégories --}}
        <div class="mb-3">

            <label class="form-label">
                Catégories
            </label>

            @foreach($categories as $category)

                <div class="form-check">
                    <input
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }}"
                        class="form-check-input"
                        id="category{{ $category->id }}"
                        {{ $product->categories->contains($category->id) ? 'checked' : '' }}
                    >

                    <label
                        class="form-check-label"
                        for="category{{ $category->id }}"
                    >
                        {{ $category->name }}
                    </label>
                </div>

            @endforeach

        </div>

        <button type="submit" class="btn btn-danger">
            Enregistrer les modifications
        </button>

        <a
            href="{{ route('admin.products.index') }}"
            class="btn btn-secondary"
        >
            Annuler
        </a>

    </form>

</div>

</body>
</html>