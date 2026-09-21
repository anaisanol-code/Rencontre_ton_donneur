<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un profil</title>
</head>

<body>

    <h1>Ajouter un profil</h1>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nom du profil :</label>
            <input type="text" id="name" name="name" required>
        </div>

        <br>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <br>

        <div>
            <label for="price">Prix :</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required>
        </div>

        <br>

        <div>
            <label for="gender">Genre :</label>
            <select id="gender" name="gender" required>
                <option value="Femme">Femme</option>
                <option value="Homme">Homme</option>
            </select>
        </div>

        <br>

        <div>
            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" min="0" required>
        </div>

        <br>

        <div>
            <label for="height">Taille (m) :</label>
            <input type="number" id="height" name="height" step="0.01" min="0" required>
        </div>

        <br>

        <div>
            <label for="weight">Poids (kg) :</label>
            <input type="number" id="weight" name="weight" step="0.01" min="0" required>
        </div>

        <br>

        <div>
            <label for="blood_type">Groupe sanguin :</label>
            <select id="blood_type" name="blood_type" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>

        <br>

        <div>
            <label for="region">Région :</label>
            <input type="text" id="region" name="region" required>
        </div>

        <br>

        <div>
            <label for="status">Statut :</label>
            <select id="status" name="status" required>
                <option value="available">Disponible</option>
                <option value="unavailable">Indisponible</option>
            </select>
        </div>

        <br>

        <div>
            <label for="available">Disponible :</label>
            <select id="available" name="available" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>

        <br>

        <div>
            <label for="premium">Profil premium :</label>
            <select id="premium" name="premium" required>
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <br>

        <button type="submit">
            Ajouter le profil
        </button>
    </form>

    <br>

    <a href="{{ route('admin.products.index') }}">
        Retour aux profils
    </a>

</body>
</html>