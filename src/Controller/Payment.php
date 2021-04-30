<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;

class Payment extends AbstractController
{
    public function index():void
    {
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

        $locationData = false;

        if(isset($_GET['type']) && isset($_GET['id'])){
            
        }

       $userLevel =  Container::getInstance(UserQuery::class)->getStoredUserLevel();

    
        $this->render('payment/index',["level" => $userLevel,"locationData" => $locationData]);
    }

    public function process(): void{

    }
}