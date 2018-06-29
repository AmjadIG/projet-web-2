<?php

require_once("./../Model/BD_connexion.php");
require_once("./../Model/rechercher_model.php");
require_once("./../Model/proposer_model.php");

$ville =  		 htmlentities($_POST['ville']);
$datecours =	 htmlentities($_POST['dateCours']);
$matiere =     htmlentities($_POST['matiere']);
$mat =         getMatiere($matiere);
$idMatiere =   htmlentities($mat['idMatiere']);
$niv =         htmlentities($_POST['niveau']);
$niveau =      getNiveau($niv);
$idNiveau =    ($niveau['idNiveau']);

$cours =       rechercher($idMatiere,$idNiveau,$ville,$datecours);
$now = date('Y-m-d');

if ($dateCours < $now){
  echo($dateCours);
  echo($now);
	$msg = "unvailable";
	//header("location:./../../cours?date=" .$msg);
}
?>
