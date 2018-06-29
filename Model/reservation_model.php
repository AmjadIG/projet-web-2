<?php

function supprimerReservation($idEleve,$idCours){
    try{
        require_once("BD_connexion.php");
        $bd=connexion();
        $req = $bd->prepare('UPDATE cours SET idEleve = NULL WHERE idCours =? AND idEleve =?');
        $req->execute(array ($idCours,$idEleve));
        return 0;
      }
        catch(Exception $e)
      {
              die('Erreur : '.$e->getMessage());
      }
  }
  function ajouterReservation($idEleve,$idCours){
      try{
        require_once("BD_connexion.php");
        $bd=connexion();
        $req = $bd->prepare('UPDATE cours SET idEleve=? WHERE idCours =?');
        $req->execute(array ($idEleve,$idCours));
        return 0;
      }
        catch(Exception $e)
      {
              die('Erreur : '.$e->getMessage());
      }
  }

  function supprimerAllReservations($idEleve){
      try{
    	require_once("BD_connexion.php");
  		$bd=connexion();
  		$req = $bd->prepare('UPDATE cours SET idEleve = NULL WHERE idEleve =?');
  		$req->execute(array ($idEleve));
  		$res = $req;
      }
        catch(Exception $e)
      {
              die('Erreur : '.$e->getMessage());
      }
  	}
?>
