<?php 

namespace App\Controller;

use App\Core\Database;
use App\Query\BarsQuery;
use PDO;
use App\Core\Container;
use App\Query\UserQuery;

class Bars extends AbstractController
{
    public function showTableBars():void
    {
         $BarsQuery = Container::getInstance(BarsQuery::class);
         $Bars = $BarsQuery->findAll();

         $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

         $this->render('Annonce/searchBars', [
               'Bars' => $Bars,
               "level" => $userLevel,
         ]);
    }

    public function addBars()
    {
      $gameQuery = Container::getInstance(BarsQuery::class);
      $gameQuery->insertOne($_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      header('location: /annonces/bars');
    }

    public function update()
    {
      $gameQuery = Container::getInstance(BarsQuery::class);
      $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      header('location: /annonces/bars');
    }

}