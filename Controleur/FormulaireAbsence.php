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
 
echo'<html style="background-color:#CFFF98;">';
	echo'<h1 style="color:#7b95cd;">Ajouter une absence</h1>';
//Debut du formulaire 
		echo'<form action="AjoutAbsence.php" method="post">';
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

		echo"<h3>Absence d'hier :</h3>";
			while($donnees = $reponse3->fetch())
				{
					echo "<p></p>";
					echo $donnees['nomV'];
					echo "<p></p>";
				}
			$reponse3->closeCursor();
//Affichage du visiteur jamais Absent 

		echo"<h3>Jamais Absent :</h3>";
			while($data = $reponse4->fetch())
				{
					echo "<p></p>";
					echo $data['nomV'];
					echo "<p></p>";
				}
			$reponse4->closeCursor();

//Affichage du Visiteur le plus Absent
	
		echo"<h3>Le plus Absent :</h3>";
			while($data = $reponse5->fetch())
				{
					echo "<p></p>";
					echo $data['nomV'];
					echo "<p></p>";
				}
				$reponse5->closeCursor();
//Affichage des jours d'absences pour maladie
		echo"<h3>Absence pour maladie :</h3>";
			while($data = $reponse6->fetch())
				{
					echo "<p></p>";
					echo $data['nomV'];
					echo" : ";
					echo $data['snb'];
					echo "<p></p>";
				}
		$reponse6->closeCursor();


