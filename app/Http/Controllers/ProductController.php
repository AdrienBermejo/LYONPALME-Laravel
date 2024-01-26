<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Affiche la liste de tous les produits.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        // Récupère tous les produits depuis la base de données
        $products = Product::all();

        // Retourne la collection des produits
        return $products;
    }

    /**
     * Stocke un nouveau produit dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Crée une nouvelle instance de Product
        $product = new Product;

        // Affecte les valeurs depuis la requête
        $product->title = $request->title;
        $product->image = $request->file('image')->storePublicly('images', 'public');
        $product->is_bio = $request->has('is_bio');

        // Enregistre le produit dans la base de données
        $product->save();

        // Redirige vers la liste des produits
        return redirect('/products');
    }

    /**
     * Affiche le formulaire de création d'un nouveau produit.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Affiche la vue pour ajouter un produit
        return view('add-product');
    }
}
