<?php $title = "Election"; ?>

<?php ob_start(); ?> 
<fieldset>
	<legend><b>ELECTION DE CP ET CPA G3 INFORMATIQUE</b></legend>
	<form action="index.php?action=checkCode" method="post">	
		<label>CODE</label> 
		<input type="text" name="code">
		<p> CANDIDAT CP </p>
		<?php
		foreach ($cps as $cp) {
		?>
		<input type="radio" name="cp" value="<?= $cp->id; ?>">
		<label> N°<?= htmlspecialchars($cp->id);?> <?= htmlspecialchars($cp->name);?> 
		<?= htmlspecialchars($cp->lastname); ?> <?= htmlspecialchars($cp->firstname); ?></label> <br>
		<?php
		}
		?>
	
		<p> CANDIDAT CPA </p>
		<?php
		foreach ($cpas as $cpa) {
		?>
		<input type="radio" name="cpa" value="<?= $cpa->id; ?>">
		<label> N°<?= htmlspecialchars($cpa->id);?> <?= htmlspecialchars($cpa->name);?> 
		<?= htmlspecialchars($cpa->lastname); ?> <?= htmlspecialchars($cpa->firstname); ?></label> <br>
		<?php
		}
		?>
		<input type="submit" value="VALIDER">
	</form>
</fieldset>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>