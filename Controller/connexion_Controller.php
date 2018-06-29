<?php
require('./../Model/utilisateur.php');

        // recupération des informations transmisent
		   	$email =htmlentities($_POST['email']);
		   	// On hache le mot de passe pour pouvoir le comparer au mot de passe haché en bd
		   	$mdp=sha1(htmlentities($_POST['mdp']));

		   	// Verification de la presence du couple email+mdp en bd
		   	$connexionProf = verif_connexionProf($email,$mdp);
		   	$connexionEleve = verif_connexionEleve($email,$mdp);
		   	// L'utilisateur est dans la bd
		   	if ($connexionProf == 1)
		   	{
					setcookie("prof",$email,time() + (86400  *7),'/');
					setcookie('eleve','',-1,"/");
					header("Location: ./../prof/cours");
			 	}
			 	else if($connexionEleve == 1)
			  {
						setcookie("eleve",$email,time() + (86400  * 7),'/');
						setcookie('prof','',-1,"/");
						header("Location: ./../eleve/cours");
			 	}
			 	//Le couple email-password n'a pas été trouvé dans la bd, donc utilsateur inconnu, mauvais mmot de passe ou mauvais mail
			 	else
			 	{
			 			$msg ="false";
			   		header("location:./../login?account=".$msg);
				 		//exit();
				}

?>
