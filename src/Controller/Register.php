<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;

class Register extends AbstractController
{

    public function index():void
    {
        $userLevel =  Container::getInstance(UserQuery::class)->getStoredUserLevel();
        $alreadyInUse = false;



        $this->render('register/index',["level" => $userLevel,"alreadyInUse" => $alreadyInUse]);
    }
}