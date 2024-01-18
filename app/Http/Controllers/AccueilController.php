<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CofinanceurController;

class AccueilController extends Controller
{
    protected $productController;
    protected $cofinanceurController;

    public function __construct(ProductController $productController, CofinanceurController $cofinanceurController)
    {
        $this->productController = $productController;
        $this->cofinanceurController = $cofinanceurController;
    }

    public function index()
{
    // Appel à la méthode index de ProductController
    $products = $this->productController->index();

    // Appel à la méthode index de CofinanceurController
    $cofinanceurs = $this->cofinanceurController->index();

    return view('accueil', compact('products', 'cofinanceurs'));
}

    

}
