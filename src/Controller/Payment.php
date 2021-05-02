<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\BarsQuery;
use App\Query\BNQuery;
use App\Query\UserQuery;

class Payment extends AbstractController
{
    const BAR_INDICATOR = 'bar';
    

    public function index():void
    {
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

        $locationData = false;

        if(isset($_GET['type']) && isset($_GET['id'])){
            if($_GET['type'] === BarsQuery::BAR_INDICATOR){
                $locationData = Container::getInstance(BarsQuery::class)->findOneBy(["id" => $_GET['id']]);
            }
            else if($_GET['type'] === BNQuery::BN_INDICATOR ){
                $locationData = Container::getInstance(BNQuery::class)->findOneBy(["id" => $_GET['id']]);
            }
        }

       $userLevel =  Container::getInstance(UserQuery::class)->getStoredUserLevel();

    
        $this->render('payment/index',["level" => $userLevel,"locationData" => $locationData]);
    }

    public function process(): void{

    }
}