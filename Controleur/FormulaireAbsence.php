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
	 }
	?>

	</select>
<?php $reponse2 = $bdd->query('SELECT * FROM Motif') ?>
<label for="libelle" style="color:#B01919;">Pourquoi ? : </label>
<select name="libelle" id="idMotif">
<?php
		while ($donnees = $reponse2->fetch()){
?>

		<option value="<?php echo $donnees['idMotif']; ?>"> <?php echo $donnees['libelle']; ?></option>
		<?php
		}
		?>
	</select>
	<input type="submit" value="Envoyer"/>
	</form>    
<?php
	$reponse->closeCursor();
	$reponse2->closeCursor();
//Affichage des absences d'hier

	echo"<h3>Absence d'hier :</h3>";
	$reponse = $bdd->query('SELECT nomV,dateDebut,refVisiteur,idVisiteur from Visiteur,Absence WHERE refVisiteur = idVisiteur AND dateDebut > DATE_SUB(CURDATE(), INTERVAL 1 DAY) and dateDebut < CURDATE()');
	while($donnees = $reponse->fetch()){
		echo "<p></p>";
		echo $donnees['nomV'];
		echo "<p></p>";

		}
	echo"<h3>Jamais Absent :</h3>";
	$answer = $bdd->query('SELECT nomV,idVisiteur from Visiteur  Where idVisiteur NOT IN (SELECT refVisiteur from Absence)');
	while($data = $answer->fetch()){
		echo "<p></p>";
		echo $data['nomV'];
		echo "<p></p>";
		}
		$reponse->closeCursor();
		
	
		echo"<h3>Le plus Absent :</h3>";
	$answer = $bdd->query('SELECT nomV,refVisiteur from Visiteur,CumulAbsences where idVisiteur = refVisiteur AND NJAV = ( SELECT MAX(NJAV) from CumulAbsences );
');
	while($data = $answer->fetch()){
		echo "<p></p>";
		echo $data['nomV'];
		echo "<p></p>";
		}
		$reponse->closeCursor();


