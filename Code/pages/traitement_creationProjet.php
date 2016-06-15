<?php
require_once 'connexion_bdd.php';
?>

<?php

if(!empty($_POST)){
  $req = $bdd->prepare('INSERT INTO ichikawa VALUES ()');
    $req->execute();

    $req = $bdd->prepare('INSERT INTO swot VALUES ()');
    $req->execute();

    $req = $bdd->prepare('INSERT INTO pestel VALUES ()');
    $req->execute();
 
    $req = $bdd->prepare('SELECT MAX(ID_ICHIKAWA) FROM ishikawa');
    $req->execute();



 if (isset(//valeur à mettre qui doit exister pour rediriger la page)){
    header('location:construire_swot.php');
}
}
?>