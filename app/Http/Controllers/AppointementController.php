<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use App\Models\Appointement;

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
        // À implémenter pour mettre à jour les informations du rendez-vous
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

        return redirect()->route('appointements.index')->with('success', 'Rendez-vous supprimé.');
    }


}
