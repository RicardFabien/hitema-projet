<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;

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
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/AnnoncePage',["level" => $userLevel]);
    }
    public function searchBars():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/searchBars',["level" => $userLevel]);
    }
    public function searchBN():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/searchBN',["level" => $userLevel]);
    }
    public function productPage():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/productPage',["level" => $userLevel]);
    }

    public function ajoutBars():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceAjoutBars',["level" => $userLevel]);
    }
    public function ajoutBN():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceAjoutBN',["level" => $userLevel]);
    }

    public function updateBars():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceUpdateBars',["level" => $userLevel]);
    }

    public function updateBN():void
    {
        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $this->render('Annonce/annonceUpdateBN',["level" => $userLevel] );
    }

}