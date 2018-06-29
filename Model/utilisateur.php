<?php
	function ajouter_professeur($nom,$prenom,$mdp,$rue,$postal,$email,$numero,$ville){
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare("INSERT INTO prof(nomProf,prenomProf, mailProf, mdpProf,telProf,rueProf,codePostalProf,villeProf) VALUES (?,?,?,?,?,?,?,?)");
		$req->execute(array ($nom,$prenom,$email,$mdp,$numero,$rue,$postal,$ville));
		return 0;
	}
	function ajouter_eleve($nom,$prenom,$mdp,$rue,$postal,$email,$numero,$ville){
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare("INSERT INTO eleve(nomEleve,prenomEleve, mailEleve, mdpEleve,telEleve,rueEleve,codePostalEleve,villeEleve) VALUES (?,?,?,?,?,?,?,?)");
		$req->execute(array ($nom,$prenom,$email,$mdp,$numero,$rue,$postal,$ville));
		return 0;
	}
	function verif_presenceProf_email($email){
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare('SELECT * FROM prof WHERE mailProf=:email');
		$req->bindParam(':email', $email);
		$req->execute();
		$result = $req->fetch();
		return $result;
	}
	function verif_presenceEleve_email($email){
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare('SELECT * FROM eleve WHERE mailEleve=:email');
		$req->bindParam(':email', $email);
		$req->execute();
		$result = $req->fetch();
		return $result;
	}
	function verif_connexionProf($email,$mdp){
		require_once("BD_connexion.php");
	 	$bd=connexion();
		$req = $bd->prepare("SELECT * FROM prof as p WHERE p.mailProf=:email and p.mdpProf=:mdp");
		$req->execute(array(':email' => $email,':mdp' => $mdp));
		//On compte le nombre de ligne pour constater la presence ou non du couple email+mdp dans la bd
		$res=$req->rowCount();
		return $res;
	}
		function verif_connexionEleve($email,$mdp){
		require_once("BD_connexion.php");
	 	$bd=connexion();
		$req = $bd->prepare("SELECT * FROM eleve WHERE mailEleve=:email and mdpEleve=:mdp");
		$req->execute(array(':email' => $email,':mdp' => $mdp));
		//On compte le nombre de ligne pour constater la presence ou non du couple email+mdp dans la bd
		$res=$req->rowCount();
		return $res;
	}
	function editEleve($nom,$prenom,$rue,$CP,$tel,$ville,$mail){
	    try{
	        require_once("BD_connexion.php");
	        $bd=connexion();
	        $req = $bd->prepare('UPDATE eleve SET nomEleve =?,prenomEleve =?,rueEleve =?,codePostalEleve =?,telEleve =?,villeEleve =? WHERE mailEleve =?');
	        $req->execute(array ($nom,$prenom,$rue,$CP,$tel,$ville,$mail));
	        return 0;
	      }
	        catch(Exception $e)
	      {
	              die('Erreur : '.$e->getMessage());
	      }
	  }
	function deleteEleve($mail){
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare('DELETE FROM eleve WHERE mailEleve =?');
		$req->execute(array ($mail));
		return $req;
	}
	function editProf($nom,$prenom,$rue,$CP,$tel,$ville,$mail){
	    try{
	        require_once("BD_connexion.php");
	        $bd=connexion();
	        $req = $bd->prepare('UPDATE prof SET nomProf =?,prenomProf =?,rueProf =?,codePostalProf =?,telProf =?,villeProf =? WHERE mailProf =?');
	        $req->execute(array ($nom,$prenom,$rue,$CP,$tel,$ville,$mail));
	        return 0;
	      }
	        catch(Exception $e)
	      {
	              die('Erreur : '.$e->getMessage());
	      }
	  }
	function deleteProf($idProf){
		try{
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare('DELETE FROM prof WHERE idProf =?');
		$req->execute(array ($idProf));
		return 0;
	}
		catch(Exception $e)
	{
					die('Erreur : '.$e->getMessage());
	}
	}
	function deleteCoursProf($idProf){
		require_once("BD_connexion.php");
		$bd=connexion();
		$req = $bd->prepare('DELETE FROM prof WHERE idProf =?');
		$req->execute(array ($idProf));
		return 0;
	}

?>
