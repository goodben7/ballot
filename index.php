<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/elector.php');

use App\Controllers\Homepage\Homepage;
use App\Controllers\Elector\Elector;

try {
	if (isset($_GET['action'] ) && $_GET['action'] === 'checkCode') {
	    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
	    $input = $_POST;
		(new Elector())->execute($input);}
		else{
			throw new \Exception('Les données du formulaire sont invalides.');	
		}
	    }
	else{
		(new Homepage())->execute();
	}
}
catch (Exception $e) {
	$errorMessage = $e->getMessage();

	require('templates/error.php');
}  
