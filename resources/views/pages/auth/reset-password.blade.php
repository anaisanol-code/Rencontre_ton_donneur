<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ request()->route('token') }}">

    <input type="email" name="email" value="{{ request('email') }}" required>

    <input type="password" name="password" required>

    <input type="password" name="password_confirmation" required>

    <button type="submit">
        Réinitialiser le mot de passe
    </button>
</form>