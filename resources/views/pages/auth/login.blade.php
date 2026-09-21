<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>

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
                Connexion
            </h1>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">

                @csrf

                <div class="mb-3">

                    <label for="email" class="form-label">
                        Adresse e-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        required
                        autofocus
                    >

                </div>


                <div class="mb-3">

                    <label for="password" class="form-label">
                        Mot de passe
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required
                    >

                </div>


                <div class="form-check mb-3">

                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="form-check-input"
                    >

                    <label
                        for="remember"
                        class="form-check-label"
                    >
                        Se souvenir de moi
                    </label>

                </div>


                <button
                    type="submit"
                    class="btn btn-danger w-100"
                >
                    Se connecter
                </button>

            </form>


            <div class="text-center mt-3">

                <a
                    href="{{ route('password.request') }}"
                    class="text-danger"
                >
                    Mot de passe oublié ?
                </a>

            </div>


            <div class="text-center mt-2">

                <span>
                    Pas encore de compte ?
                </span>

                <a
                    href="{{ route('register') }}"
                    class="text-danger"
                >
                    Inscription
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>