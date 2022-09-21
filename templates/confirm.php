<?php $title = "Election"; ?>

<?php ob_start(); ?>

<fieldset>
	<legend><b>CONFIRMATION</b></legend>
	<p><?= htmlspecialchars($elector->name); ?> <?= htmlspecialchars($elector->lastname); ?> 
	<?= htmlspecialchars($elector->firstname); ?> Veillez Confirmer Votre Choix </p>

	<p> CANDIDAT CP N° <?= htmlspecialchars($cp->id);?> </p> <br>
	<img src="<?= htmlspecialchars($cp->image);?>" style="height: 10%; width: 20%; display: block;"> <br>

	<p> <?= htmlspecialchars($cp->name); ?> <?= htmlspecialchars($cp->lastname); ?> 
	<?= htmlspecialchars($cp->firstname); ?> </p>

	<p> CANDIDAT CPA N° <?= htmlspecialchars($cpa->id);?> </p> <br>
	<img src="<?= htmlspecialchars($cpa->image);?>" style="height: 10%; width: 20%; display: block;"> <br>

	<p> <?= htmlspecialchars($cpa->name); ?> <?= htmlspecialchars($cpa->lastname); ?> 
	<?= htmlspecialchars($cpa->firstname); ?> </p>

	<a href="index.php">ANNULER</a> <a href="envoyer.php">CONFIRMER</a>
</fieldset>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

