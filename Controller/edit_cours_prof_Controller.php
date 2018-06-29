<?php

require_once("./../Model/proposer_model.php");
require_once("./../Model/cours_prof_model.php");

$prof = getProf($_COOKIE['prof']);
$id = $prof["idProf"];

$idCours = htmlentities($_POST['idCours']);
$lieu =    htmlspecialchars($_POST['lieu']); //
$ville =   htmlspecialchars($_POST['ville']); //
$prix =    htmlentities($_POST['prix']);
$dateCours = htmlentities($_POST['dateCours']);
$debut =   htmlentities($_POST['debut']);
$fin =     htmlentities($_POST['fin']);
$nomMatiere = htmlspecialchars($_POST['matiere']); //
$mat = getMatiere($nomMatiere);
$idMatiere = $mat['idMatiere'];
$niveau =     htmlspecialchars($_POST['niveau']); //
$niv = getNiveau($niveau);
$idNiveau = htmlentities($niv['idNiveau']);
$now = date('Y-m-d');

if ($dateCours < $now){
	$msg = "unvailable";
	header("location:./../prof/cours/editer?date=" .$msg);
}
/*
if(Verif_presenceEleve($idCours) == 0 ){
		editerCours($idCours,$prix,$ville,$lieu,$debut,$fin,$dateCours,$idNiveau,$idMatiere);
  $msg = "success";
  header("location:./../prof/cours?edit=" .$msg);
}
else{
  	$msg = "student_reserved_this_course";
    header("location:./../prof/cours?errorsuppr=" .$msg);
}
*/
?>
