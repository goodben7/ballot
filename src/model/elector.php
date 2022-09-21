<?php

namespace App\Model\Elector;

require_once('src/lib/database.php');

use App\Lib\Database\DatabaseConnection;

class Elector 
{
    public int $id;
    public string $name;
    public string $lastname;
    public string $firstname;
    public int $code; 
    public string $vote;
}

class ElectorRepository
{
    public DatabaseConnection $connection;

    public function getElector(int $code): ?Elector
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM elector WHERE code = ?"
        );
        $statement->execute([$code]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $elector = new Elector();
        $elector->id = $row['id'];
        $elector->name = $row['name'];
        $elector->lastname = $row['lastname'];
        $elector->firstname = $row['firstname'];
        $elector->code = $row['code'];
        $elector->vote = $row['vote'];

        return $elector;
    }

    public function checkCode(int $code)
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(*) AS count FROM elector WHERE 
            code = ?"
        );
        $statement->execute([$code]);

        $affectedLines = $statement->fetch();

        return $affectedLines; 
    }

}