<?php
require_once("BD_connexion.php");

function rechercher($idMatiere,$idNiveau,$ville,$datecours){
	$bd=connexion();
	$req = $bd->prepare('SELECT niveau,nomMatiere, c.* FROM cours AS c, matiere AS m, niveau AS n WHERE c.idNiveau=:idNiveau AND ville =:ville AND dateCours=:dateCours AND  c.idMatiere=:idMatiere
 			          																																								  AND c.idEleve IS NULL AND c.idMatiere = m.idMatiere AND c.idNiveau = n.idNiveau');
	$req->bindParam(':ville',$ville);
	$req->bindParam(':dateCours',$datecours);
	$req->bindParam(':idMatiere',$idMatiere);
	$req->bindParam(':idNiveau',$idNiveau);
	$req->execute();
	$rechercher =  $req->fetchAll();
	return $rechercher;
}

?>
