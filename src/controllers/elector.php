<?php

namespace App\Controllers\Elector;

require_once('src/lib/database.php');
require_once('src/model/candidate.php');
require_once('src/model/elector.php');



use App\Lib\Database\DatabaseConnection;
use App\Model\Candidate\CandidateRepository;
use App\Model\Elector\ElectorRepository;

class Elector 
{
    public function execute(?array $input)
    {
        $id_cp = null;
        $id_cpa = null; 
        $code = null;
        if (isset($input['code']) && !empty($input['code'])  && isset($input['cp']) && isset($input['cpa'])) {
            $id_cp = $input['cp'];
            $id_cpa = $input['cpa'];
            $code = $input['code'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $electorRepository = new ElectorRepository();
        $electorRepository->connection = new DatabaseConnection();
        $success = $electorRepository->checkCode($code);
        if ($success['count'] == 0) {
                throw new \Exception('Le code que vous entrez est incorrect !!!');
            } 

        $elector = $electorRepository->getElector($code);
        
        if ($elector->vote == 'OUI'){
                throw new \Exception('Vous avez deja vote !!!');
            } 
        
        $candidateRepository = new CandidateRepository();
        $candidateRepository->connection = new DatabaseConnection();
        $cp = $candidateRepository->getCp($id_cp);
        $cpa = $candidateRepository->getCpa($id_cpa);

        require('templates/confirm.php');
    }
} 
