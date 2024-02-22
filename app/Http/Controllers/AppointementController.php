<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use App\Models\Appointement;
use Carbon\Carbon;

class AppointementController extends Controller
{
    /**
    * Affiche la liste des rendez-vous de l'utilisateur connecté.
    *
    * @return \Illuminate\View\View
    */
    public function index()
    {
        // Vérifie si l'utilisateur est connecté
        $user = auth()->user();

        // Récupère les rendez-vous pour cet utilisateur
        $appointements = $user->appointements()->orderBy('created_at','desc')->get();

        // Affiche les rendez-vous à la vue du tableau de bord
        return view('dashboard', ['appointements' => $appointements]);
    }

    /**
    * Affiche le formulaire de création d'un nouveau rendez-vous.
    *
    * @return void
    */
    public function create()
    {
        // À implémenter si nécessaire
    }

    /**
    * Enregistre un nouveau rendez-vous dans la base de données.
    *
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $user = auth()->user();
        $appointements = new Appointement;
        $appointements-> horairedebut = (new \DateTime($request->horairedebut))->format('Y-m-d H:i:s');
        $appointements-> horairefin = (new \DateTime($request->horairefin))->format('Y-m-d H:i:s');
        $appointements-> Validation = false;
        $appointements-> Comment = $request->Comment;
        $appointements->Commentaire = null;
        $appointements-> idusers = $user->id;
        $appointements-> save();

        return response()->json(['success' => true]);
        // À implémenter pour sauvegarder le nouveau rendez-vous
    }
        

    /**
    * Affiche les détails d'un rendez-vous spécifique.
    *
    * @param  int  $idusers
    * @return void
    */
    public function show($idusers)
    {
        $appointment = Appointment::find($id); // get the appointment
        $user = $appointment->user; // get the user related to the appointment
        $name = $user->name; // get the user's name


        // Now you can return this data to a view or wherever else it's needed
        return view('reservationadmin', ['appointment' => $appointment, 'user' => $user, 'name' => $name]);
    // À implémenter pour afficher les détails d'un rendez-vous
    }
        

    /**
    * Affiche le formulaire de modification d'un rendez-vous.
    *
    * @param  int  $idusers
    * @return void
    */
    public function edit($idusers)
    {
        // À implémenter si nécessaire
    }

    /**
    * Met à jour les informations d'un rendez-vous dans la base de données.
    *
    * @param  UpdateAppointementRequest  $request
    * @param  Appointement  $appointment
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateAppointementRequest $request, Appointement $appointement)
    {
           
        if (!$appointement) {
            // Handle the case where the appointment does not exist
            return redirect()->back()->with('error', 'Appointment not found!');
        }
        $validation = $request->has('Validation') ? true : false;


        // Update the appointment
        $appointement->horairedebut = Carbon::parse($request->horairedebut)->toDateTimeString();
        $appointement->horairefin = Carbon::parse($request->horairefin)->toDateTimeString();
        $appointement->Validation = $validation;
        $appointement->Commentaire = $request->input('Commentaire');
        $appointement->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Appointment updated successfully!');
    }

    /**
    * Supprime un rendez-vous spécifique de la base de données.
    *
    * @param  Appointement  $appointment
    * @return \Illuminate\Http\Response
    */
    public function destroy(Appointement $appointement)
    {
        // À implémenter pour supprimer le rendez-vous
        $appointement->delete();

        return redirect()->back()->with('success', 'Rendez-vous supprimé.');
    }


}
