<?php

 function ajouter_cours($idMatiere,$idProf,$prix,$ville,$lieu,$debut,$fin,$reserve,$datecours,$idNiveau){
   require_once("BD_connexion.php");
   $bd=connexion();
   $req = $bd->prepare("INSERT INTO cours(idMatiere,idProf,prix,ville,lieu,debut,fin,reserve,dateCours,idNiveau) VALUES (?,?,?,?,?,?,?,?,?,?)");
   $req->execute(array ($idMatiere,$idProf,$prix,$ville,$lieu,$debut,$fin,$reserve,$datecours,$idNiveau));
   $req->fetch();
   return 0;
 }

 function ajouter_matiere($matiere){
   require_once("BD_connexion.php");
   $bd=connexion();
   $req = $bd->prepare("INSERT INTO matiere(nomMatiere) VALUES (?)");
   $req->execute(array($matiere));
   return 0;
 }

 function ajouter_niveau($niveau){
   require_once("BD_connexion.php");
   $bd=connexion();
   $req = $bd->prepare("INSERT INTO niveau(niveau) VALUES (?)");
   $req->execute(array($niveau));
   return 0;
 }
 function Verif_presenceEleve($idCours){
   require_once("BD_connexion.php");
   $bd=connexion();
   $req = $bd->prepare('SELECT * FROM cours WHERE idCours=:idCours and idEleve IS NOT NULL');
   $req->bindParam(':idCours', $idCours);
   $req->execute();
   $res=$req->rowCount();
   return $res;
 }
 function verif_presenceMatiere($matiere){
   require_once("BD_connexion.php");
   $bd=connexion();
   $req = $bd->prepare('SELECT * FROM matiere WHERE nomMatiere=:nomMatiere');
   $req->bindParam(':nomMatiere', $matiere);
   $req->execute();
   $result = $req->fetch();
   return $result;
 }

 function verif_presenceNiveau($niveau){
   require_once("BD_connexion.php");
   $bd=connexion();
   $req = $bd->prepare('SELECT * FROM niveau WHERE niveau=:niveau');
   $req->bindParam(':niveau', $niveau);
   $req->execute();
   $result = $req->fetch();
   return $result;
 }

  function verif_horaire($debut,$fin){
    return 0;
  }
  function getEleve($email){
    require_once("BD_connexion.php");
    $bd=connexion();
    $req = $bd->prepare('SELECT * FROM eleve WHERE mailEleve = :email ');
    $req->bindParam(':email' ,$email);
    $req->execute();
    return $req->fetch();
  }

  function getProf($email){
    require_once("BD_connexion.php");
    $bd=connexion();
    $req = $bd->prepare('SELECT * FROM prof WHERE mailProf = :email ');
    $req->bindParam(':email' ,$email);
    $req->execute();
    return $req->fetch();
  }
    function getCours($id){
      require_once("BD_connexion.php");
      $bd=connexion();
      $req = $bd->prepare('SELECT * FROM cours WHERE idProf = :id ');
      $req->bindParam(':id' ,$id);
      $req->execute();
      return $req->fetch();
    }

    function getMatiere($matiere){
      require_once("BD_connexion.php");
      $bd=connexion();
      $req = $bd->prepare('SELECT * FROM matiere WHERE nomMatiere = :matiere ');
      $req->bindParam(':matiere', $matiere);
      $req->execute();
      return $req->fetch();
    }
    
  function getNiveau($niveau){
    require_once("BD_connexion.php");
    $bd=connexion();
    $req = $bd->prepare('SELECT * FROM niveau WHERE niveau = :niveau ');
    $req->bindParam(':niveau', $niveau);
    $req->execute();
    return $req->fetch();

  }

  function deleteProposition($idCours){
      try{
      require_once("BD_connexion.php");
      $bd=connexion();
      $req = $bd->prepare('DELETE FROM cours WHERE idCours =?');
      $req->execute(array($idCours));
      return 0;
    }
      catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
  }
  function deleteAllPropositions($idProf){
      try{
      require_once("BD_connexion.php");
      $bd=connexion();
      $req = $bd->prepare('DELETE FROM cours WHERE idProf =?');
      $req->execute(array($idProf));
      return 0;
    }
      catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
  }
  function readProposition($id){
    $bd=connexion();
    $req = $bd->prepare('SELECT nomMatiere, c.* FROM cours AS c, matiere AS m WHERE c.idMatiere = m.idMatiere and c.idProf =:idProf');
    $req->bindParam(':idProf', $id);
    $req->execute();
    $cours = $req->fetchAll();
  }
?>
