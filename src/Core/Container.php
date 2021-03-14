<?php 

namespace App\Core;

use App\Controller\Authentication;
use App\Controller\Homepage;
use App\Controller\NotFound;
use App\Model\User;
use App\Query\UserQuery;
use App\Service\JWT;
use App\Controller\Game;
use App\Controller\Login;
use App\Controller\Logout;

use App\Controller\Register;

use App\Query\GameQuery;

/*
    Conteneurs d'instances des classes utilisées dans l'application cette classe renvoie les instances
*/

class Container
{
    static public function getInstance(String $namespace)
    {
        /*
            Une fonction est utilisée pour différer l'instanciation
        */

        $instances = [
            NotFound::class => function(){ 
                return new \App\Controller\NotFound();
             },
             Homepage::class => function(){ 
                return new \App\Controller\Homepage();
             },
             Authentication::class => function(){ 
               return new \App\Controller\Authentication(
                  self::getInstance(UserQuery::class),
               );
             },
             Login::class => function(){ 
               return new \App\Controller\Login();
             },
             Logout::class => function(){ 
               return new \App\Controller\Logout();
             },
             Register::class => function(){ 
               return new \App\Controller\Register();
             },


             Routing::class => function(){ 
                return new \App\Core\Routing();
             },
             Game::class => function(){ 
               return new \App\Controller\Game();
            },
            GameQuery::class => function(){ 
               return new \App\Query\GameQuery(
                  self::getInstance(Database::class),
               );
            },


             Database::class => function(){
                return new \App\Core\Database();
             },
             Dotenv::class => function(){
                return new \App\Core\Dotenv();
             },
             User::class => function(){
                return new \App\Model\User();
             }, 
             UserQuery::class => function(){
                return new \App\Query\UserQuery(
                    self::getInstance(Database::class),
                );
             },
             JWT::class => function(){
                return new \App\Service\JWT();
             }   
        ];

        return $instances[$namespace]();
    }
}