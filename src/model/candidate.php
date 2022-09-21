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
    public string $image;
    public int $voice; 
}

class CandidateRepository
{
    public DatabaseConnection $connection;

    public function getCps(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM cp");
        $cps = [];
        while (($row = $statement->fetch())) {
            $cp = new Candidate();
            $cp->id = $row['id'];
            $cp->name = $row['name'];
            $cp->lastname = $row['lastname'];
            $cp->firstname = $row['firstname'];
            $cp->image = $row['image'];
            $cp->voice = $row['voice'];

            $cps[] = $cp;
        }

        return $cps;
    }

    public function getCp(int $id): ?Candidate 
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM cp WHERE id = ?");

        $statement->execute([$id]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $cp = new Candidate();
        $cp->id = $row['id'];
        $cp->name = $row['name'];
        $cp->lastname = $row['lastname'];
        $cp->firstname = $row['firstname'];
        $cp->image = $row['image'];
        $cp->voice = $row['voice'];

        return $cp;
    }

    public function getCpas(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM cpa");
        $cpas = [];
        while (($row = $statement->fetch())) {
            $cpa = new Candidate();
            $cpa->id = $row['id'];
            $cpa->name = $row['name'];
            $cpa->lastname = $row['lastname'];
            $cpa->firstname = $row['firstname'];
            $cpa->image = $row['image'];
            $cpa->voice = $row['voice'];

            $cpas[] = $cpa;
        }    

        return $cpas; 
    }


    public function getCpa(int $id): ?Candidate 
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM cpa WHERE id = ?");

        $statement->execute([$id]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $cpa = new Candidate();
        $cpa->id = $row['id'];
        $cpa->name = $row['name'];
        $cpa->lastname = $row['lastname'];
        $cpa->firstname = $row['firstname'];
        $cpa->image = $row['image'];
        $cpa->voice = $row['voice'];

        return $cpa;
    }
}