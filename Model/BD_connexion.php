<?php
function connexion()
	//Permet de se connecter à la bdd
{
	try
	{

	//online
	$bdd = new PDO('mysql:host=wyqk6x041tfxg39e.chr7pe7iynqr.eu-west-1.rds.amazonaws.com;dbname=dg3e1ou9chxatzw5;charset=utf8', 'gzx0wngo6koul15r', 'wp4x3td4s4on5vc2');


	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
return $bdd;
}
?>
