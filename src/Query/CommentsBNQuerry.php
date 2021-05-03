<?php 

namespace App\Query;

use PDO;
use App\Model\Comments_BN;
use App\Core\Database;


class CommentsBNQuery
{

    public const CBN_INDICATOR = 'Comment_BN';
    private PDO $connection;

    public function __construct(Database $database)
    {
        // récupération de la connexion à la base de données
        $this->connection = $database->connect();
    }


    public function findAll()
    {
        // requête 
        $sql = '
            SELECT *
            FROM API.comments_boites_de_nuit
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */

        
        
        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute();

        /*
            récupération des résultats
                fetchObject : permet d'associer les données à un modèle
                fetchAll : récupérer plusieurs résultats
        */
        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function insertOne(String $description, int $reviews, String $user, int $BN_id)
    {
        
        $sql = "INSERT INTO API.comments_boites_de_nuit
                    VALUES ('null', :description, :reviews, :user,:BN_id, NOW())";
        
        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'name' => $name,
            'lieu' => $lieu,
            'price' => $price,
            'description' => $description,
            'user' => $user
        ]);
    }

    

    

    
    


}