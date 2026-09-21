<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mot de passe oublié</title>

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

            <h1 class="text-center mb-3">
                Mot de passe oublié
            </h1>

            <p class="text-center text-secondary mb-4">
                Entrez votre adresse e-mail pour recevoir un lien de réinitialisation.
            </p>


            @if (session('status'))

                <div class="alert alert-success">
                    {{ session('status') }}
                </div>

            @endif


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
                action="{{ route('password.email') }}"
            >

                @csrf


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
                        placeholder="email@example.com"
                        required
                        autofocus
                        autocomplete="email"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-danger w-100"
                >
                    Envoyer le lien
                </button>

            </form>


            <div class="text-center mt-3">

                <a
                    href="{{ route('login') }}"
                    class="text-danger"
                >
                    Retour à la connexion
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>