<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CofinanceurController;
use App\Http\Controllers\PartnerController;
use App\Models\Appointement;

class AccueilController extends Controller
{
    // Les contrôleurs utilisés dans ce contrôleur
    protected $productController;
    protected $cofinanceurController;
    protected $partnerController;

    /**
     * Constructeur.
     *
     * @param  ProductController  $productController
     * @param  CofinanceurController  $cofinanceurController
     * @param  PartnerController  $partnerController
     * @return void
     */
    public function __construct(ProductController $productController, CofinanceurController $cofinanceurController, PartnerController $partnerController)
    {
        $this->productController = $productController;
        $this->cofinanceurController = $cofinanceurController;
        $this->partnerController = $partnerController;
    }

    /**
     * Affiche la page d'accueil avec les données nécessaires.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Appel à la méthode index de ProductController
        $products = $this->productController->index();

        // Appel à la méthode index de CofinanceurController
        $cofinanceurs = $this->cofinanceurController->index();

        // Appel à la méthode index de PartnerController
        $partners = $this->partnerController->index();

        $events = array();
        $appointements = Appointement::all();
        foreach($appointements as $appointement){
            $color = '#4d7fb0';
            $title = "Plage horaire déjà prise";
            $events[] = [
                'title' => $title,
                'start' => $appointement->horairedebut,
                'end' => $appointement->horairefin,
                'validation' => $appointement->Validation,
                'userid' => $appointement->idusers,
                'color'=> $color,
            ];
    }
        //return view('accueil', ['events' => $events]);

        return view('accueil', compact('products', 'cofinanceurs', 'partners','events'));
    }

      /**
     * Récupère la liste des produits.
     *
     * @return array
     */
    protected function getProducts()
    {
        return app(ProductController::class)->index();
    }

    /**
     * Récupère la liste des cofinanceurs.
     *
     * @return array
     */
    protected function getCofinanceurs()
    {
        return app(CofinanceurController::class)->index();
    }

    /**
     * Récupère la liste des partenaires.
     *
     * @return array
     */
    protected function getPartners()
    {
        return app(PartnerController::class)->index();
    }

}
