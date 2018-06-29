<?php

require_once("./../Model/proposer_model.php");
require_once("./../Model/reservation_model.php");

$eleve = getEleve($_COOKIE['eleve']);
$idEleve = $eleve["idEleve"];
$idCours = htmlentities($_POST['idCours']);
ajouterReservation($idEleve,$idCours);
$msg= "success";
header("location:../eleve/cours?reservation=".$msg);
?>
