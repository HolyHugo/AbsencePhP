<?php
$bdd = new PDO('mysql:host=localhost;dbname=BS1;charset=utf8', 'admin', 'admin');
	
	//
	
	$refid = $_POST['nomV'];
	$Rins = $bdd->prepare("INSERT INTO Absence(refVisiteur,dateDebut) VALUES (:refid,NOW())");
	$Rins->execute(array(
		'refid' => $refid
		));
header('Location: FormulaireAbsence.php');

