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

        return redirect('/admin')->with('success', 'Produit ajouté avec succès');
    }

    public function storePartner(Request $request)
    {
        // Vérifie si l'utilisateur est un administrateur
        if (!auth()->user()->is_admin) {
            return view('admin.admin');
        }

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->logo = $request->file('imagepartenaire')->storePublicly('logos', 'public');
        $partner->save();

        return redirect('/admin')->with('success', 'Partenaire ajouté avec succès');
    }

    public function storeCofinanceur(Request $request)
    {
        // Vérifie si l'utilisateur est un administrateur
        if (!auth()->user()->is_admin) {
            return view('admin.admin');
        }

        $cofinanceur = new Cofinanceur;
        $cofinanceur->name = $request->name;
        $cofinanceur->logo = $request->file('imagecofi')->storePublicly('logos', 'public');
        $cofinanceur->save();

        return redirect('/admin')->with('success', 'Co-financeur ajouté avec succès');;
    }

    public function deleteProduct(Request $request)
{
    // Récupérez l'ID du produit à partir de la requête
    $id = $request->input('id');

    // Trouvez le produit avec l'ID spécifié
    $product = Product::find($id);

    // Si le produit existe, supprimez-le
    if ($product) {
        $product->delete();
        return redirect('/admin')->with('success', 'Produit supprimé avec succès');
    }

    // Si le produit n'existe pas, retournez un message d'erreur
    return redirect('/admin')->with('error', 'Produit non trouvé');
}

public function deletePartner(Request $request)
{
    // Récupérez l'ID du partenaire à partir de la requête
    $id = $request->input('id');

    // Trouvez le partenaire avec l'ID spécifié
    $partner = Partner::find($id);

    // Si le partenaire existe, supprimez-le
    if ($partner) {
        $partner->delete();
        return redirect('/admin')->with('success', 'Partenaire supprimé avec succès');
    }

    // Si le partenaire n'existe pas, retournez un message d'erreur
    return redirect('/admin')->with('error', 'Partenaire non trouvé');
}

public function deleteCofinanceur(Request $request)
{
    // Récupérez l'ID du co-financeur à partir de la requête
    $id = $request->input('id');

    // Trouvez le co-financeur avec l'ID spécifié
    $cofinanceur = Cofinanceur::find($id);

    // Si le co-financeur existe, supprimez-le
    if ($cofinanceur) {
        $cofinanceur->delete();
        return redirect('/admin')->with('success', 'Co-financeur supprimé avec succès');
    }

    // Si le co-financeur n'existe pas, retournez un message d'erreur
    return redirect('/admin')->with('error', 'Co-financeur non trouvé');
}


}
