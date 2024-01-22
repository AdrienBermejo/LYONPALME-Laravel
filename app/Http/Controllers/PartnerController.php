<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return $partners;
    }

    public function create()
    {
        return view('add-partners');
    }

    public function store(Request $request)
    {
        $partners = new Partner;
        $partners->name = $request->name;
        $partners->logo = $request->file('logo')->storePublicly('logos', 'public');
        $partners->save();

        return redirect('/partners');
    }

}
