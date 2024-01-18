<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cofinanceur;

class CofinanceurController extends Controller
{
    public function index()
    {   
        $cofinanceurs = Cofinanceur::all();
        return $cofinanceurs;
    }

    public function store(Request $request)
    {
        $cofinanceur = new Cofinanceur;
        $cofinanceur->name = $request->name;
        $cofinanceur->logo = $request->file('logo')->storePublicly('logos', 'public');
        $cofinanceur->save();

        return redirect('/cofinanceurs');
    }

    public function create()
    {
        return view('add-cofinanceur');
    }
}
