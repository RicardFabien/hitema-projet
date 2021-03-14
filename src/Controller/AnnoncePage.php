<?php

namespace App\Controller;

class AnnoncePage extends AbstractController
{
    // id : variable d'URL
    /*public function index(int $id):void
    {
        $this->render('homepage/index', [
            'message' => $id,
        ]);
    }*/
    public function annoncePage():void
    {
        $this->render('Annonce/AnnoncePage');
    }
    public function searchBars():void
    {
        $this->render('Annonce/searchBars');
    }
    public function searchBN():void
    {
        $this->render('Annonce/searchBN');
    }
    public function productPage():void
    {
        $this->render('Annonce/productPage');
    }
}