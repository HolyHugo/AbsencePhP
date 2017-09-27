<?php
try
{
require(__DIR__.'/../Modele/cobdd.php');
require(__DIR__.'/../Modele/requete.php');

	
}
catch(Exception $e)
{
            die('Erreur : '.$e->getMessage());
}
 
echo'<html>','<header class="header">','<h1>Appsence</h1>','</div>'; 

	echo'<h1>Ajouter une absence</h1>';
	echo'<head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> </head>';
	
	echo'<body>';
//Debut du formulaire 
		echo'<form action="AjoutAbsence.php" style="background-color: #D08CB3;margin:2px;padding:5px;margin-right:41%;"method="post">';
//Debut de la requete pour obtenir la liste des visiteurs		
			echo'<label for="nomV" style="color:#B01919;">Qui ? : </label>';
				echo'<select name="nomV" id="idVisiteur">';
					while ($donnees = $reponse1->fetch())
						{
							$idV = $donnees['idVisiteur'];
							$nomV = $donnees['nomV'];
							echo"<option value='",$idV ,"'", ">" , $nomV,"</option>";
						}
					echo"</select>";
					$reponse1->closeCursor();
// Fin de la requete Nom des visiteurs
// Debut de la seconde requete pour avoir le choix du motif 
			
			echo"<label for='libelle' style='color:#B01919;'>Pourquoi ? : </label>";
				echo'<select name="libelle" id="idMotif">';
					while ($donnees = $reponse2->fetch())
						{
							$idMotif = $donnees['idMotif'];
							$libelle = $donnees['libelle'];
							echo"<option value='",$idMotif,"'",">", $libelle ,"</option>";
						}
					echo"</select>";
					$reponse2->closeCursor();					
// Fin de la requete motif
//Bouton envoyer

			echo"<input type='submit' value='Envoyer'/>";
		echo"</form>";    
//Fin du formulaire		


//Affichage des absences d'hier
		echo"<div style='padding-left:25px;background-color: #DCE6EE;'>";
		echo"<h3 style='color:#14535f;'>Absence d'hier :</h3>";
			while($donnees = $reponse3->fetch())
				{
					echo "<p>",$donnees['nomV'],"</p>";
				}
			$reponse3->closeCursor();
//Affichage du visiteur jamais Absent 

		echo"<h3>Jamais Absent :</h3>";
			while($data = $reponse4->fetch())
				{
					echo "<p>",$data['nomV'],"</p>";
				}
			$reponse4->closeCursor();

//Affichage du Visiteur le plus Absent
	
		echo"<h3>Le plus Absent :</h3>";
			while($data = $reponse5->fetch())
				{
					echo "<p>",$data['nomV'],"</p>";
				}
				$reponse5->closeCursor();
//Affichage des jours d'absences pour maladie
		echo"<h3>Absence pour maladie :</h3>";
			while($data = $reponse6->fetch())
				{
					echo "<p>",$data['nomV']," : ",$data['snb'],"</p>";
				}
		$reponse6->closeCursor();
	echo'</div>';
	echo'</body>';

	echo'<footer style="position:absolute;bottom:0;width:100%;padding-left:50px;">','<h5>Mahery & Hugo</h5>','<p>Php & mysql : TP</p>','</footer>';


