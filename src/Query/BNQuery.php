<?php 

namespace App\Query;

use PDO;
use App\Model\BN;
use App\Core\Database;


class BNQuery
{

    public const BN_INDICATOR = 'bn';
    private PDO $connection;

    public function __construct(Database $database)
    {
        // récupération de la connexion à la base de données
        $this->connection = $database->connect();
    }

    public function findOneBy(array $args = []):BN|bool
    {
        // requête 
        $sql = '
            SELECT 
            API.boites_de_nuit.*
            FROM App_user
            WHERE 
        ';

        /*
            requête préparée
            création de variables dans la requête avec :
        */
        foreach($args as $column => $value)
        {
            $sql .= "
                boites_de_nuit.$column = :$column
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
        $result = $query->fetchObject(BN::class);

        // retour des résultats 
        return $result;
    }

    public function findAll()
    {
        // requête 
        $sql = '
            SELECT *
            FROM API.boites_de_nuit
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

    public function insertOne(String $name, String $lieu, float $price, String $description, String $user)
    {
        
        $sql = "INSERT INTO API.boites_de_nuit
                    VALUES ('null', :name, :lieu, :price, NOW(), :description, :user )";
        
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

    public function ModifOne(int $id, String $name, String $lieu, float $price, String $description)
    {
        // requête 
        $sql = '
            UPDATE API.boites_de_nuit
                SET name = :name, lieu = :lieu, price = :price, date_creation = NOW(), description = :description
            WHERE id = :id
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'id' => $id,
            'name' => $name,
            'lieu' => $lieu,
            'price' => $price,
            'description' => $description,
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function deleteOne(int $id)
    {
        // requête 
        $sql = '
            DELETE FROM API.boites_de_nuit WHERE id= :id
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'id' => $id,
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }

    public function FindOne(int $id)
    {
        // requête 
        $sql = '
            SELECT * FROM API.boites_de_nuit WHERE id= :id
        ';

        $sql .= ';';

        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'id' => $id
        ]);

        $result = $query->fetchAll();

        // retour des résultats 
        return $result;
    }
    


}