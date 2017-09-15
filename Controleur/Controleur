<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Absence</title>
</head>
<body>  
<?php
    try{
	   include '/Controleur/cobdd.php';
        }

    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>
    <form action="abs_post.php" method="post">
        <h2><strong>ABSENCES</strong></h2>
        <p>
            <?php
            $bdd_nom = $bdd->query('SELECT * FROM VISITEUR');
            
            echo'<label for="nomV">Choisissez l\'élève : </label>';
            
            echo'<select name="nomV" id="nomV">';
                while($donnees = $bdd_nom->fetch()){
                ?>
                <option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom']; ?></option>
                <?php
                }
                ?>
            </select><br />
            <input type="submit" value="Envoyer" /> 
        </p>
    </form>

<h3><strong>Les dernières absences :</strong></h3>
<div>
<?php
$reponse = $bdd->query('SELECT id, nom, date FROM ABSENCE ORDER BY ID DESC LIMIT 0, 5');


while ($donnees = $reponse->fetch()){
	echo '<p><strong>' . htmlspecialchars($donnees['nom']) . 
    ' :</strong> ' . htmlspecialchars($donnees['date']) . 
    '</p>';
    }

$reponse->closeCursor();

?>
</div>
    
</body>

</html>