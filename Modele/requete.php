<?php
$reponse1 = $bdd->query('SELECT * FROM Visiteur');
$reponse2 = $bdd->query('SELECT * FROM Motif');
$reponse3 = $bdd->query('SELECT nomV,dateDebut,refVisiteur,idVisiteur from Visiteur,Absence WHERE refVisiteur = idVisiteur AND dateDebut > DATE_SUB(CURDATE(), INTERVAL 1 DAY) and dateDebut < CURDATE()');
$reponse4 = $bdd->query('SELECT nomV,idVisiteur from Visiteur  Where idVisiteur NOT IN (SELECT refVisiteur from Absence)');
$reponse5 = $bdd->query('SELECT nomV,refVisiteur from Visiteur,CumulAbsences where idVisiteur = refVisiteur AND NJAV = ( SELECT MAX(NJAV) from CumulAbsences );');
$reponse6 = $bdd->query('SELECT nomV,libelle,sum(nbJours) as snb from Visiteur,Absence,Motif WHERE idVisiteur = refVisiteur and idMotif = "MA" and refMotif = idMotif group by refVisiteur');



?>
