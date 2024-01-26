<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Affiche la liste des partenaires.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        // Récupère tous les partenaires depuis la base de données
        $partners = Partner::all();

        // Retourne la collection des partenaires
        return $partners;
    }

    /**
     * Stocke un nouveau partenaire dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Crée une nouvelle instance de Partner
        $partner = new Partner;

        // Affecte les valeurs depuis la requête
        $partner->name = $request->name;
        $partner->logo = $request->file('logo')->storePublicly('logos', 'public');

        // Enregistre le partenaire dans la base de données
        $partner->save();

        // Redirige vers la liste des partenaires
        return redirect('/partners');
    }

    /**
     * Affiche le formulaire de création d'un nouveau partenaire.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Affiche la vue pour ajouter un partenaire
        return view('add-partners');
    }
}
