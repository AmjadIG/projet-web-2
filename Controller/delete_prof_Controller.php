<?php

require_once("./../Model/proposer_model.php");
require_once("./../Model/utilisateur.php");

$email = htmlentities($_POST['mail']);
$prof =  getProf($email);
$idProf = $prof['idProf'];

deleteAllPropositions($idProf);
deleteProf($idProf);
setcookie('prof','',-1,"/");
setcookie('eleve','',-1,"/");
$msg ="success";
header("location:./../login?deleteUser=" .$msg);

?>
