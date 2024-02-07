<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Partner;
use App\Models\Cofinanceur;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        if (!auth()->user()->is_admin) {
            return view('admin.admin');
        }

        $products = Product::all();
        $partners = Partner::all();
        $cofinanceurs = Cofinanceur::all();

        return view('admin.index', compact('products', 'partners', 'cofinanceurs'));
    }

    public function storeProduct(Request $request)
    {
        // Vérifie si l'utilisateur est un administrateur
        if (!auth()->user()->is_admin) {
            return view('admin.admin');
        }

        $product = new Product;
        $product->title = $request->title;
        $product->image = $request->file('image')->storePublicly('images', 'public');
        $product->is_bio = $request->has('is_bio');
        $product->save();

        return redirect('/admin');
    }

    public function storePartner(Request $request)
    {
        // Vérifie si l'utilisateur est un administrateur
        if (!auth()->user()->is_admin) {
            return view('admin.admin');
        }

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->logo = $request->file('logo')->storePublicly('logos', 'public');
        $partner->save();

        return redirect('/admin');
    }

    public function storeCofinanceur(Request $request)
    {
        // Vérifie si l'utilisateur est un administrateur
        if (!auth()->user()->is_admin) {
            return view('admin.admin');
        }

        $cofinanceur = new Cofinanceur;
        $cofinanceur->name = $request->name;
        $cofinanceur->logo = $request->file('logo')->storePublicly('logos', 'public');
        $cofinanceur->save();

        return redirect('/admin');
    }
}
