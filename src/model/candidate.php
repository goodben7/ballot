<?php

namespace App\Model\Candidate;

require_once('src/lib/database.php');

use App\Lib\Database\DatabaseConnection;

class Candidate 
{
    public int $id;
    public string $name;
    public string $lastname;
    public string $firstname;
}

class CandidateRepository
{
    public DatabaseConnection $connection;

    public function getCp(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, name, lastname, firstname FROM cp");
        $cps = [];
        while (($row = $statement->fetch())) {
            $cp = new Candidate();
            $cp->id = $row['id'];
            $cp->name = $row['name'];
            $cp->lastname = $row['lastname'];
            $cp->firstname = $row['firstname'];

            $cps[] = $cp;
        }

        return $cps;
    }

    public function getCpa(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, name, lastname, firstname FROM cpa");
        $cpas = [];
        while (($row = $statement->fetch())) {
            $cpa = new Candidate();
            $cpa->id = $row['id'];
            $cpa->name = $row['name'];
            $cpa->lastname = $row['lastname'];
            $cpa->firstname = $row['firstname'];

            $cpas[] = $cpa;
        }    

        return $cpas; 
    }
}