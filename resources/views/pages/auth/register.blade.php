<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inscription</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <h1 class="text-center mb-4">
                Créer un compte
            </h1>


            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('register.store') }}"
            >

                @csrf


                <div class="mb-3">

                    <label
                        for="name"
                        class="form-label"
                    >
                        Nom
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="form-control"
                        required
                        autofocus
                        autocomplete="name"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Adresse e-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        required
                        autocomplete="email"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Mot de passe
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required
                        autocomplete="new-password"
                    >

                </div>


                <div class="mb-4">

                    <label
                        for="password_confirmation"
                        class="form-label"
                    >
                        Confirmer le mot de passe
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                        required
                        autocomplete="new-password"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-danger w-100"
                >
                    Créer mon compte
                </button>

            </form>


            <div class="text-center mt-3">

                <span>
                    Vous avez déjà un compte ?
                </span>

                <a
                    href="{{ route('login') }}"
                    class="text-danger"
                >
                    Se connecter
                </a>

            </div>


            <div class="text-center mt-2">

                <a
                    href="{{ route('home') }}"
                    class="text-danger"
                >
                    Retour à l'accueil
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>