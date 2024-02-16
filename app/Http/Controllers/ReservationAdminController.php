<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use App\Models\Appointement;
use App\Models\User;

class ReservationAdminController extends Controller
{
    /**
    * Affiche la liste des rendez-vous de l'utilisateur connecté.
    *
    * @return \Illuminate\View\View
    */
    //
    public function index()
    {
        $appointements = Appointement::orderBy('created_at','desc')->get();

        return view('admin.reservationadmin', ['appointements'=>$appointements]);

    }
}
