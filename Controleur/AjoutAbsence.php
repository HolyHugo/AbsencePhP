<?php
require(__DIR__.'/../Modele/cobdd.php');

	
	//
	$jour = 1;
	$refid = $_POST['nomV'];
	$refMotif = $_POST['libelle'];
	$Rins = $bdd->prepare("INSERT INTO Absence(refVisiteur,dateDebut,nbJours,refMotif) VALUES (:refid,DATE_ADD(CURDATE(),INTERVAL 1 SECOND),:nbJours,:refMotif)");
	$Rins->execute(array(
		'refid' => $refid,
		'nbJours' => $jour,
		'refMotif' => $refMotif
		));
header('Location: FormulaireAbsence.php');

