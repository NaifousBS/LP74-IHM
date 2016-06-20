<?php
session_start();
require_once 'connexion_bdd.php';
?>

<?php

if(!empty($_POST)){
  $req = $connexion->prepare('INSERT INTO ichikawa VALUES ()');
    $req->execute();

    $req = $connexion->prepare('INSERT INTO swot VALUES ()');
    $req->execute();

    $req = $connexion->prepare('INSERT INTO pestel VALUES ()');
    $req->execute();
 

    $req="SELECT MAX(ID_ICHIKAWA) FROM ichikawa";
    $reponse= $connexion->prepare($req);
    $reponse->execute();
    $donnees1 = $reponse->fetch();
    
    $_SESSION['id_ichikawa'] = $donnees1[0];

    $req="SELECT MAX(ID_SWOT) FROM swot";
    $reponse= $connexion->prepare($req);
    $reponse->execute();
    $donnees2 = $reponse->fetch();

    $_SESSION['id_swot'] = $donnees2[0];

    $req="SELECT MAX(ID_pestel) FROM pestel";
    $reponse= $connexion->prepare($req);
    $reponse->execute();
    $donnees3 = $reponse->fetch();

    $_SESSION['id_pestel'] = $donnees3[0];


    $req = $connexion->prepare("INSERT INTO donnees(id_ichikawa, id_swot, id_pestel, contenu, noeud) VALUES (:id_ichikawa,:id_swot,:id_pestel, :contenu, :noeud)");
    $req->execute(array(
    	'id_ichikawa' => $_SESSION['id_ichikawa'],
        'id_swot' => $_SESSION['id_pestel'],
        'id_pestel' => $_SESSION['id_pestel'],
    	'contenu' => $_POST['nomProjet'],
    	'noeud' => 0
    	));

    header('location:construire_swot.php');
}
?>