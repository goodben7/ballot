<?php $title = "Election"; ?>

<?php ob_start(); ?>

<fieldset>
	<legend><b>ELECTION DE CP ET CPA G3 INFORMATIQUE</b></legend>
	<p>Une erreur est survenue : <?= $errorMessage ?></p>
</fieldset>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>