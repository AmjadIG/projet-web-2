<?php

	require('./../Model/utilisateur.php');


	$nom = htmlentities($_POST['nom']);
	$prenom = htmlentities($_POST['prenom']);
	$rue = htmlentities($_POST['rue']);
	$postal = htmlentities($_POST['postal']);
	$email = htmlentities($_POST['email']);
	$numero = htmlentities($_POST['numero']);
	$ville = htmlentities($_POST['ville']);
	$email_prof = verif_presenceProf_email($email);
	$email_eleve = verif_presenceEleve_email($email);

	//cryptage du mdp grace a sha1
	$mdp=sha1(htmlentities($_POST['mdp']));

	if($email_eleve == NULL && $email_prof == NULL){

		if($_POST['gender'] == 'professeur'){
			$res = ajouter_professeur($nom,$prenom,$mdp,$rue,$postal,$email,$numero,$ville);
			$msg ="Inscription réussi ";
			header("location:./../login?connex=" .$msg);

		}
		else{
			ajouter_eleve($nom,$prenom,$mdp,$rue,$postal,$email,$numero,$ville);
			$msg ="Inscription réussi ";
			header("location:./../login?connex=" .$msg);
		}

	}else{

			$msg ="Email deja utilisé ";
		   	header("location:../View/connexion_view.php?connex=" .$msg);

	}




?>
