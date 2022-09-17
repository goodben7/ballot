<?php

namespace App\Controllers\Homepage;

require_once('src/lib/database.php');
require_once('src/model/candidate.php');

use App\Lib\Database\DatabaseConnection;
use App\Model\Candidate\CandidateRepository;

class Homepage
{
    public function execute()
    {
        $candidateRepository = new CandidateRepository();
        $candidateRepository->connection = new DatabaseConnection();
        $cps = $candidateRepository->getCp();
        $cpas = $candidateRepository->getCpa();

        require('templates/homepage.php');
    }
}
