<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>

<body>

    <h1>Modifier un utilisateur</h1>

    <p>
        Nom : {{ $user->name }}
    </p>

    <p>
        Email : {{ $user->email }}
    </p>

    <form
        action="{{ route('admin.users.update', $user->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="role">Rôle :</label>

            <select id="role" name="role" required>
                <option
                    value="user"
                    {{ $user->role === 'user' ? 'selected' : '' }}
                >
                    Utilisateur
                </option>

                <option
                    value="admin"
                    {{ $user->role === 'admin' ? 'selected' : '' }}
                >
                    Administrateur
                </option>
            </select>
        </div>

        <br>

        <div>
            <label for="is_premium">Premium :</label>

            <select id="is_premium" name="is_premium" required>
                <option
                    value="0"
                    {{ !$user->is_premium ? 'selected' : '' }}
                >
                    Non
                </option>

                <option
                    value="1"
                    {{ $user->is_premium ? 'selected' : '' }}
                >
                    Oui
                </option>
            </select>
        </div>

        <br>

        <button type="submit">
            Enregistrer les modifications
        </button>
    </form>

    <br>

    <a href="{{ route('admin.users.index') }}">
        Retour aux utilisateurs
    </a>

</body>
</html>