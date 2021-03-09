<?php

namespace App\Query;

use App\Core\Database;
use App\Model\User;
use PDO;

class UserQuery
{
    /*
        injection de dépendances : gérer les dépendances entre les objets 
        injection par le constructeur : 
            - créer une propriété du meme type que la classe supportée
            - créer le constructeur avec un paramètre du même type que la propriété
            - dans le constructeur, liaison entre la propriété et le paramètre du constructeur
    */

    private PDO $connection;

    public function __construct(Database $database)
    {
        // récupération de la connexion à la base de données
        $this->connection = $database->connect();
    }

    // requête des conditions sur les valeurs des colonnes
    // select user.* from api.user where user.login = 'admin';
    public function findOneBy(array $args = []):User|bool
    {
        // requête 
        $sql = '
            SELECT user.*
            FROM API.user
            WHERE 
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */
        foreach($args as $column => $value)
        {
            $sql .= "
                user.$column = :$column
            ";
        }

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute($args);

        /*
            récupération des résultats
                fetchObject : permet d'associer les données à un modèle
                fetchAll : récupérer plusieurs résultats
        */
        $result = $query->fetchObject(User::class);

        // retour des résultats 
        return $result;
    }
        // vérifier l'existance de l'utilisateur et le mot de passe
        public function checkUser(String $login, String $password):bool
        {
            // récupérer l'utilisateur
            $user = $this->findOneBy([
                'login' => $login,
            ]);

            /*
                password_verify : verifier le mot de passe
                    mot de passe en clair
                    hachage du mot de passe
            */ 
            if($user && password_verify($password, $user->getPassword()))
            {   
                return true;
            }

            return false;
        }

    
}