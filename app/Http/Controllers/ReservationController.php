<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //la variable events qui prépares les evenements sont crées
        $events=[];
        //On invoque une instance du modèle Appointement et on en fait variable rendezvous
        $rendezvous = new \App\Models\Appointement;
        //Ensuite on veux la fonction user de la classe Appointement
        $appointements = $rendezvous->user();

        //On fait maintenent la liste des heures de début et fin des rendez vous et on le mets dans la valeur event
        foreach ($appointements as $appointement){
            $events[] =[
                'heurededebut' => $appointement->heuredebut,
                'heuredefin' => $appointement->heurefin,
            ];
        }
        //Et on retourne la vue reservation avec les events dedans
        return view('reservation',compact('events'));
    }
}
