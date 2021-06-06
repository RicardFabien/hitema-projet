<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\BarsQuery;
use App\Query\BNQuery;
use App\Query\CommentsBarsQuery;
use App\Query\CommentsBNQuery;
use App\Query\UserQuery;

class Login extends AbstractController
{
    // id : variable d'URL
    /*public function index(int $id):void
    {
        $this->render('homepage/index', [
            'message' => $id,
        ]);
    }*/
    public function index(): void
    {
        if (isset($_POST["disconnect"])) {
            unset($_SESSION["login"]);
            unset($_SESSION["password"]);
        }

        
        if (isset($_POST["login"])) {

            $_SESSION["login"] = $_POST["login"];
            $login = $_SESSION["login"];
        }


        if (isset($_POST["password"])) {
            $_SESSION["password"] = $_POST["password"];
        }
        

              


        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();

        if($userLevel === UserQuery::HOST_INDICATOR || $userLevel === UserQuery::USER_INDICATOR || $userLevel === UserQuery::ADMIN_INDICATOR)
        {
            $login = $_SESSION["login"];
        $Comments = Container::getInstance(CommentsBarsQuery::class)->FindCommentsByUsers($login);
        $CommentsBN = Container::getInstance(CommentsBNQuery::class)->FindCommentsByUsers($login);
        $AnnoncesBars = Container::getInstance(BarsQuery::class)->FindAnnoncesByUsers($login);
        $AnnoncesBN = Container::getInstance(BNQuery::class)->FindAnnoncesByUsers($login);
        
        $this->render('login/index', ['level' => $userLevel, 'Comments' => $Comments, 'CommentsBN' => $CommentsBN, 'AnnoncesBars' => $AnnoncesBars, 'AnnoncesBN' => $AnnoncesBN]);
        }
        else {
            $this->render('login/index', ['level' => $userLevel]);
        }
    }
}
