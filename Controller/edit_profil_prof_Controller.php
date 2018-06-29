<?php

require_once("./../Model/BD_connexion.php");
require_once("./../Model/utilisateur.php");

$mail = htmlentities($_POST['mail']);
$nom =  htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$ville  = htmlentities($_POST['ville']);
$rue = htmlentities($_POST['rue']);
$CP  = htmlentities($_POST['CP']);
$tel = htmlentities($_POST['tel']);

editProf($nom,$prenom,$rue,$CP,$tel,$ville,$mail);
$msg = "success";
header("location:./../prof/profil?edit=".$msg);


?>
