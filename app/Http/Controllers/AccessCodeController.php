<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessCodeController extends Controller
{

    /**
     * Affiche la vue du formulaire d'accès.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('accesscode');
    }


    /**
     * Vérifie le code d'accès soumis par le formulaire.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkAccess(Request $request)
    {
        // Récupère le code soumis dans le formulaire
        $inputCode = $request->input('access_code');

        // Récupère le code d'accès stocké dans la configuration
        $storedCode = config('app.access_code');

        // Vérifie si le code soumis est correct
        if ($inputCode === $storedCode) {
            // Stocke l'accès autorisé dans la session
            $request->session()->put('access_granted', true);
            // Redirige vers la page d'accueil
            return redirect('/accueil');
        } else {
            // Redirige vers la page d'accueil avec une erreur si le code est incorrect
            return redirect('/')->withErrors(['access_code' => 'Le code d\'accès est incorrect.']);
        }
    }


}
