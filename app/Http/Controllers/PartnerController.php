<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(Request $request)
    {
        $partner = new Partner($request->all());
        $partner->save();
        return redirect('partners');
    }
}
