<?php

	require('./../Model/proposer_model.php');

	$matiere = htmlspecialchars($_POST['matiere']);
	$niveau =  htmlspecialchars($_POST['niveau']);
	$lieu =    htmlspecialchars($_POST['lieu']);
	$ville =   htmlspecialchars($_POST['ville']);
	$prix =    htmlentities($_POST['prix']);
	$datecours = htmlentities($_POST['dateCours']);
	$debut =   htmlentities($_POST['debut']);
	$fin =     htmlentities($_POST['fin']);
	$mail =    getProf($_COOKIE['prof']);
	$idProf =  $mail['idProf'];
	$reserve = 0;

		$matierefinded = verif_presenceMatiere($matiere);
		$niveaufinded	=verif_presenceNiveau($niveau);

		if($matierefinded == NULL){
			$res = ajouter_matiere($matiere);
		}
		if($niveaufinded == NULL){
			$res = ajouter_niveau($niveau);
		}
		$mat = getMatiere($matiere);
		$idMatiere = $mat['idMatiere'];
		$niv = getNiveau($niveau);
		$nomMatiere = $mat['nomMatiere'];
		$idNiveau = $niv['idNiveau'];


		if( $matierefinded != NULL && $niveaufinded != NULL){
				$res = ajouter_cours($idMatiere,$idProf,$prix,$ville,$lieu,$debut,$fin,$reserve,$datecours,$idNiveau);
				$msg = "$nomMatiere";
				header("location:./../prof/cours?add=" .$msg);
		}
		else{
			$msg ="impossible_add";
				header("location:./../prof/cours?fail=" .$msg);
		}

?>
