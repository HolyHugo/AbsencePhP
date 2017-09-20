<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=BS1;charset=utf8', 'admin', 'admin');
	
	
}
catch(Exception $e)
{
            die('Erreur : '.$e->getMessage());
}
 
echo'<html style="background-color:#CFFF98;">';
echo'<h1 style="color:#7b95cd;">Ajouter une absence</h1>';
$reponse = $bdd->query('SELECT * FROM Visiteur');
 


	echo'<form action="AjoutAbsence.php" method="post">';
	echo'<label for="nomV" style="color:#B01919;">Qui ? : </label>';
	echo'<select name="nomV" id="idVisiteur">';
	while ($donnees = $reponse->fetch())
{
?>
	<option value="<?php echo $donnees['idVisiteur']; ?>"> <?php echo $donnees['nomV']; ?></option>
	<?php
	
	?>
<?php  
}
?>
	</select>
	<input type="submit" value="Envoyer"/>
	</form>    
<?php
	$reponse->closeCursor();
//Affichage des absences d'hier

	echo"Absence d'hier";
	$reponse = $bdd->query('SELECT nomV,dateDebut,refVisiteur,idVisiteur from Visiteur,Absence WHERE refVisiteur = idVisiteur AND dateDebut > DATE_SUB(CURDATE(), INTERVAL 1 DAY) and dateDebut < CURDATE()');
	while($donnees = $reponse->fetch()){
		echo "<p></p>";
		echo $donnees['nomV'];
		echo "<p></p>";

		}
	echo"Jamais Absent :";
	$answer = $bdd->query('SELECT nomV,idVisiteur from Visiteur  Where idVisiteur NOT IN (SELECT refVisiteur from Absence)');
	while($data = $answer->fetch()){
		echo "<p></p>";
		echo $data['nomV'];
		echo "<p></p>";
		}
		$reponse->closeCursor();

