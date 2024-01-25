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
        /*$event=[];

        $appointements = \App\Models\Appointement::user();

        foreach ($appointements as $appointement){
            $event[] =[
                'heurededebut' => $appointement->heuredebut,
                'heuredefin' => $appointement->heurefin,
            ];
        }
        //
        return view('reservation',compact('events'));*/
    }
}
