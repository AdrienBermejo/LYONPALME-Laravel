<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all(); // Récupère tous les produits de la base de données
    return view('accueil', ['products' => $products]); // Renvoie une vue avec les produits
}

    public function store(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->image = $request->file('image')->storePublicly('images', 'public');
        $product->is_bio = $request->has('is_bio');
        $product->save();

        return redirect('/products');
    }

    public function create()
{
    return view('add-product');
}
}
