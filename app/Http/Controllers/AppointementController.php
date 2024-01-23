<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointementRequest;
use App\Http\Requests\UpdateAppointementRequest;
use App\Models\Appointement;

class AppointementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //Savoir si l'utilisateur est connecté
        $user = auth()->user();
    
        //Rapporte les rendez vous pour cet utilisateur
        $appointements = $user->appointements;
    
        //rapporte les rendez vous à la vue
        return view('dashboard',['appointements' => $appointements]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointement $appointement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointement $appointement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointementRequest $request, Appointement $appointement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointement $appointement)
    {
        //
    }


}
