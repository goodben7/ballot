<?php

require_once('src/controllers/homepage.php');

use App\Controllers\Homepage\Homepage;

 
try {

	(new Homepage())->execute();
}
catch (Exception $e) {
	$errorMessage = $e->getMessage();
} 