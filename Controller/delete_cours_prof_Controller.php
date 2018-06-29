<?php

require_once("../Model/BD_connexion.php");
require_once("../Model/proposer_model.php");

$idCours = htmlentities($_POST['idCours']);


if(Verif_presenceEleve($idCours) == 0 ){
  deleteProposition($idCours);
  $msg = "$idCours:success";
  header("Location: ./../prof/cours?supprcours=" .$msg ); 
}else{

  $msg = "student_reserved_this_course";
  header("Location: ./../prof/cours?errorsuppr=" .$msg);
}

?>
