<?php 

namespace App\Query;

use PDO;
use App\Model\BN;
use App\Core\Database;

class BNQuery
{
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
            FROM API.BN
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

    public function insertOne(String $name, String $lieu, float $price, String $description)
    {
        
        $sql = "INSERT INTO API.BN
                    VALUES ('null', :name, :lieu, :price, NOW(), :description )";
        
        // préparation de la requête
        $query = $this->connection->prepare($sql);

        // exécution de la requête
        // donner des valeurs aux variables de requête avec un array associatif
        $query->execute([
            'name' => $name,
            'lieu' => $lieu,
            'price' => $price,
            'description' => $description,
        ]);
    }

    public function ModifOne(int $id, String $name, String $lieu, float $price, String $description)
    {
        // requête 
        $sql = '
            UPDATE API.BN
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
            DELETE FROM API.BN WHERE id= :id
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

    


}