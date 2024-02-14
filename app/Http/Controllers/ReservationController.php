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
        foreach($appointements as $appointement){
            $events[] = [
                'title' => "Plage horaire déjà prise",
                'start' => $appointement->horairedebut,
                'end' => $appointement->horairefin,
                'validation' => $appointement->Validation,
            ];
    }
        return view('reservation', ['events' => $events]);
    }
}
