<?php
	include '/Controleur/cobbd.php';
	
	
	//
	
	$nomV = $_POST['nomV'];
	
	$Rins = $bdd->prepare("INSERT INTO Visiteur(nomV) VALUES (:nomV)");
	$Rins->execute(array(
		'nomV' => $nomV
		));
	
