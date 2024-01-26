<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Gère la demande entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        // Initialise un tableau pour stocker les événements
        $events = [];

        // Instancie le modèle Appointement
        $appointement = new \App\Models\Appointement;

        // Récupère les rendez-vous de l'utilisateur
        $appointements = $appointement->user();

        // Crée une liste d'événements à partir des heures de début et de fin des rendez-vous
        foreach ($appointements as $appointement) {
            $events[] = [
                'title' => $appointement->horairedebut,
                'start' => $appointement->horairedebut,
                'end' => $appointement->horairefin,
            ];
        }

        // Retourne la vue 'reservation' avec les événements
        return view('reservation', compact('events'));
    }
}
