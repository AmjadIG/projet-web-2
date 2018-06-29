<?php

  function getCoursProf($mail){
    require_once("BD_connexion.php");
    $bd=connexion();
    $req = $bd->prepare('SELECT * FROM cours WHERE mailProf = :email');
    $req->bindParam(':email', $mail);
    $req->execute();
    return $req->fetchAll();
  }


function getCoursStatus($idCours){
    require_once("BD_connexion.php");
    $bd=connexion();
    $req = $bd->prepare('SELECT * FROM cours WHERE idCours = :idCours');
    $req->bindParam(':idCours', $idCours);
    $req->execute();
    return $req->fetch();
  }

function editerCours($idCours,$prix,$ville,$lieu,$debut,$fin,$dateCours,$idNiveau,$idMatiere){

      try{
        require_once("BD_connexion.php");
        $bd=connexion();
      	$req = $bd->prepare('UPDATE cours SET prix =?, ville =?, lieu =?, debut =?, fin =?, dateCours =?, idNiveau =?, idMatiere =?  WHERE idCours =?');
        $req->execute(array($prix,$ville,$lieu,$debut,$fin,$dateCours,$idNiveau,$idMatiere,$idCours));
        return $req->fetch();
      }
        catch(Exception $e)
      {
              die('Erreur : '.$e->getMessage());
      }
   }

?>
