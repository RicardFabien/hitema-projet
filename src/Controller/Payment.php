<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;

class Payment extends AbstractController
{
    public function index():void
    {
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

       $parts = parse_url($url);
       parse_str($parts['query'], $query);


    
        $this->render('payment/index',[]);
    }

    public function process(): void{

    }
}