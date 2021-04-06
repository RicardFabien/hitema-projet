<?php 

namespace App\Controller;

use App\Core\Database;
use App\Query\BNQuery;
use PDO;
use App\Core\Container;

class BN extends AbstractController
{
    public function showTableBN():void
    {
      $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

         $BNQuery = Container::getInstance(BNQuery::class);
         $BN = $BNQuery->findAll();
         $this->render('Annonce/searchBN', [
               'BN' => $BN,
               "level" => $userLevel
         ]);
    }

    public function addBN()
    {
      $gameQuery = Container::getInstance(BNQuery::class);
      $gameQuery->insertOne($_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      header('location: /annonces/BN');
    }

    public function update()
    {
      $gameQuery = Container::getInstance(BNQuery::class);
      $gameQuery->ModifOne($_POST['id'], $_POST['name'], $_POST['lieu'], $_POST['price'], $_POST['description']);
      header('location: /annonces/BN');
    }
}