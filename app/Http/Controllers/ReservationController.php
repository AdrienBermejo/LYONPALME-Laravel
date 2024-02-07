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
                'title' => $appointement->horairedebut->format(DateTime::ATOM),
                'start' => $appointement->horairedebut->format(DateTime::ATOM),
                'end' => $appointement->horairefin->format(DateTime::ATOM),

        ];
    }
        return view('reservation', ['event => $events']);
    }
}
