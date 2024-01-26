<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cofinanceur;

class CofinanceurController extends Controller
{
    /**
     * Affiche la liste de tous les cofinanceurs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        // Récupère tous les cofinanceurs depuis la base de données
        $cofinanceurs = Cofinanceur::all();

        // Retourne la collection des cofinanceurs
        return $cofinanceurs;
    }

    /**
     * Stocke un nouveau cofinanceur dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Crée une nouvelle instance de Cofinanceur
        $cofinanceur = new Cofinanceur;

        // Affecte les valeurs depuis la requête
        $cofinanceur->name = $request->name;
        $cofinanceur->logo = $request->file('logo')->storePublicly('logos', 'public');

        // Enregistre le cofinanceur dans la base de données
        $cofinanceur->save();

        // Redirige vers la liste des cofinanceurs
        return redirect('/cofinanceurs');
    }

    /**
     * Affiche le formulaire de création d'un nouveau cofinanceur.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Affiche la vue pour ajouter un cofinanceur
        return view('add-cofinanceur');
    }
}
