<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDisponibilitesRequest;
use App\Http\Requests\UpdateDisponibilitesRequest;
use App\Models\Disponibilites;

class DisponibilitesController extends Controller
{
    /**
     * Affiche la liste des disponibilités (à personnaliser selon les besoins).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // À implémenter si nécessaire
    }

    /**
     * Affiche le formulaire de création d'une nouvelle disponibilité.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // À implémenter si nécessaire
    }

    /**
     * Stocke une nouvelle disponibilité dans la base de données.
     *
     * @param  \App\Http\Requests\StoreDisponibilitesRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDisponibilitesRequest $request)
    {
        // À implémenter pour sauvegarder la nouvelle disponibilité
    }

    /**
     * Affiche les détails d'une disponibilité spécifique.
     *
     * @param  \App\Models\Disponibilites  $disponibilites
     * @return \Illuminate\View\View
     */
    public function show(Disponibilites $disponibilites)
    {
        // À implémenter pour afficher les détails d'une disponibilité
    }

    /**
     * Affiche le formulaire de modification d'une disponibilité.
     *
     * @param  \App\Models\Disponibilites  $disponibilites
     * @return \Illuminate\View\View
     */
    public function edit(Disponibilites $disponibilites)
    {
        // À implémenter si nécessaire
    }

    /**
     * Met à jour les informations d'une disponibilité dans la base de données.
     *
     * @param  \App\Http\Requests\UpdateDisponibilitesRequest  $request
     * @param  \App\Models\Disponibilites  $disponibilites
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDisponibilitesRequest $request, Disponibilites $disponibilites)
    {
        // À implémenter pour mettre à jour les informations de la disponibilité
    }

    /**
     * Supprime une disponibilité spécifique de la base de données.
     *
     * @param  \App\Models\Disponibilites  $disponibilites
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Disponibilites $disponibilites)
    {
        // À implémenter pour supprimer la disponibilité
    }
}
