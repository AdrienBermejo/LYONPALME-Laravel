<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CofinanceurController;
use App\Http\Controllers\PartnerController;

class AccueilController extends Controller
{
    protected $productController;
    protected $cofinanceurController;

    public function __construct(ProductController $productController, CofinanceurController $cofinanceurController, PartnerController $partnerController)
    {
        $this->productController = $productController;
        $this->cofinanceurController = $cofinanceurController;
        $this->partnerController = $partnerController;
    }

    public function index()
{
    // Appel à la méthode index de ProductController
    $products = $this->productController->index();

    // Appel à la méthode index de CofinanceurController
    $cofinanceurs = $this->cofinanceurController->index();

    // Appel à la méthode index de PartnerController
    $partners = $this->partnerController->index();

    return view('accueil', compact('products', 'cofinanceurs', 'partners'));
}    

}
