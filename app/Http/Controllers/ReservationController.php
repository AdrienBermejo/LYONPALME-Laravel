<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointement;

class ReservationController extends Controller
{
    /**
     * Gère la demande entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = array();
        $appointements = Appointement::all();
        $currentUserId = auth()->user()->id; 
        foreach($appointements as $appointement){
            $color = ($appointement->idusers === $currentUserId) ? '#008000' : '#4d7fb0';
            $title = ($appointement->idusers === $currentUserId) ? "Mon rendez-vous" : "Plage horaire déjà prise";
            $events[] = [
                'title' => $title,
                'start' => $appointement->horairedebut,
                'end' => $appointement->horairefin,
                'validation' => $appointement->Validation,
                'userid' => $appointement->idusers,
                'color'=> $color,
            ];
    }
        return view('reservation', ['events' => $events]);
    }
}
