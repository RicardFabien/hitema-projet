<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\UserQuery;

class Register extends AbstractController
{

    public function index():void
    {

        $alreadyInUse = false;

        if(isset($_POST["login"]) &&  isset($_POST["password"])){
            $login = $_POST["login"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $alreadyInUse = !Container::getInstance(UserQuery::class)->addUser($login,$password,$email);

        }
            
        $userLevel =  Container::getInstance(UserQuery::class)->getStoredUserLevel();
        



        $this->render('register/index',["level" => $userLevel,"alreadyInUse" => $alreadyInUse]);
    }
}