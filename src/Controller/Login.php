<?php

namespace App\Controller;

use App\Core\Container;
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
    public function index():void
    {
        if(isset($_POST["disconnect"])){
            unset($_SESSION["login"]);
            unset($_SESSION["password"]);
        }

        if(isset($_POST["login"]))
            $_SESSION["login"] = $_POST["login"];

        if(isset($_POST["password"])){
            $_SESSION["password"] = $_POST["password"];
        }

        $CommentsBar = Container::getInstance(CommentsBarsQuery::class);
        $Comments = $CommentsBar->FindCommentsByUsers($_SESSION["login"]);
        $CommentsBN = Container::getInstance(CommentsBNQuery::class);
        $CommentsBN = $CommentsBN->FindCommentsByUsers($_SESSION["login"]);


        $userLevel = Container::getInstance(UserQuery::class)->getStoredUserLevel();
    
        $this->render('login/index',['level' => $userLevel, 'Comments' => $Comments, 'CommentsBN' => $CommentsBN]);
    }
}