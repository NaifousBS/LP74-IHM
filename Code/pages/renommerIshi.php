 <?php 
session_start();
require_once 'connexion_bdd.php'; 

?>

<?php
if(!empty($_POST)){

$req = $connexion->prepare('UPDATE donnees SET CONTENU = $_POST['inputObjectifsSelect'] 
	WHERE ID_DONNEES = $_POST['idObjetSelect']');
    $req->execute();

header('location:visualiser_ishikawa.php');
}
?>