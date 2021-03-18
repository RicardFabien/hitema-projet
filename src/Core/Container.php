<?php 

namespace App\Core;

use App\Controller\AnnoncePage;
use App\Controller\Authentication;
use App\Controller\Homepage;
use App\Controller\NotFound;
use App\Model\User;
use App\Query\UserQuery;
use App\Service\JWT;
use App\Controller\Game;
use App\Query\GameQuery;
use App\Controller\Login;
use App\Controller\Logout;
use App\Controller\BN;
use App\Query\BNQuery;
use App\Controller\Bars;
use App\Controller\ContactPage;
use App\Query\BarsQuery;

use App\Controller\Register;

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
             AnnoncePage::class => function(){ 
               return new \App\Controller\AnnoncePage();
            },
            ContactPage::class => function(){ 
               return new \App\Controller\ContactPage();
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
            BN::class => function(){ 
               return new \App\Controller\BN();
            },
            BNQuery::class => function(){ 
               return new \App\Query\BNQuery(
                  self::getInstance(Database::class),
               );
            },
            Bars::class => function(){ 
               return new \App\Controller\Bars();
            },
            BarsQuery::class => function(){ 
               return new \App\Query\BarsQuery(
                  self::getInstance(Database::class),
               );
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