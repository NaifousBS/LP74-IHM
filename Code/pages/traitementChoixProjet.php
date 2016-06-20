<?php
session_start();
require_once 'connexion_bdd.php';
?>

<?php

if(!empty($_GET)){
   
    $_SESSION['id_ichikawa'] = $_GET['idIshi'];

    $req="SELECT ID_SWOT,ID_PESTEL,CONTENU FROM donnees 
            WHERE ID_ICHIKAWA = ".$_SESSION['id_ichikawa']." AND NOEUD = 0";
    $reponse= $connexion->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    $_SESSION['id_swot'] = $donnees[0];
    $_SESSION['id_pestel'] = $donnees[1];
    $_SESSION['nom_projet'] = $donnees[2];
   
    
    /*echo $_SESSION['id_ichikawa']." ";
    echo $_SESSION['id_swot']." ";
    echo $_SESSION['id_pestel']." ";*/

    header('location:construire_swot.php');
}
?>