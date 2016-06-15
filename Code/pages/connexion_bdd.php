<?php
 /*
 <?php
require_once 'connexion_bdd.php';
?>
 */


	$serveur ='localhost';
	$user = 'root';
	$pass = '';
	$bdd ='pimpyourbody';
try{
	$connexion = new PDO ('mysql:host='.$serveur.';dbname='.$bdd, $user,$pass);
    $connexion->exec("SET CHARACTER SET utf8");
	}
catch (PDOException $e)
{
	echo $e->getMessage();
}
?>