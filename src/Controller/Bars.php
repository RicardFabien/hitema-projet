<?php 

namespace App\Controller;

use App\Core\Database;
use App\Query\BarsQuery;
use PDO;
use App\Core\Container;

class Bars extends AbstractController
{
    public function showTableBars():void
    {
         $BarsQuery = Container::getInstance(BarsQuery::class);
         $Bars = $BarsQuery->findAll();
         $this->render('Annonce/searchBars', [
               'Bars' => $Bars,
         ]);
    }
}