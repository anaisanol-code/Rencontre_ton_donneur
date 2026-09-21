<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Supprimer le compte de l'utilisateur connecté.
     */
    public function destroy()
    {
        $user = Auth::user();

        $user->delete();

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Votre compte a été supprimé avec succès.');
    }
}