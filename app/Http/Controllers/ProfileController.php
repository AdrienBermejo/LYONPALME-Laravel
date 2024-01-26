<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Affiche le formulaire de profil de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Met à jour les informations du profil de l'utilisateur.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Remplit le modèle utilisateur avec les données validées
        $request->user()->fill($request->validated());

        // Réinitialise la vérification de l'e-mail si l'e-mail change
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Sauvegarde les modifications dans la base de données
        $request->user()->save();

        // Redirige vers le formulaire de profil avec un message de réussite
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Supprime le compte de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valide les données du formulaire de suppression du compte
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Récupère l'utilisateur
        $user = $request->user();

        // Déconnecte l'utilisateur
        Auth::logout();

        // Supprime le compte de l'utilisateur
        $user->delete();

        // Invalide la session et régénère le jeton CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige vers la page d'accueil
        return Redirect::to('/');
    }
}
