<?php

require_once("./../Model/reservation_model.php");
require_once("./../Model/proposer_model.php");
require_once("./../Model/utilisateur.php");

$email = htmlentities($_POST['mail']);
$eleve = getEleve($email);
$idEleve = $eleve['idEleve'];

supprimerAllReservations($idEleve);
deleteEleve($idEleve);
setcookie('prof','',-1,"/");
setcookie('eleve','',-1,"/");
$msg ="success";
header("location:./../login?deleteUser=" .$msg);

?>
