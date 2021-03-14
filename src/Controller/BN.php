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
         $BNQuery = Container::getInstance(BNQuery::class);
         $BN = $BNQuery->findAll();
         $this->render('Annonce/searchBN', [
               'BN' => $BN,
         ]);
    }
}