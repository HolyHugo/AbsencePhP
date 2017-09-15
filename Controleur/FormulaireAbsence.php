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
	<input type="submit" value="Envoyer"/>
	</form>    
