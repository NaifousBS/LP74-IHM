 <?php 
session_start();
require_once 'connexion_bdd.php'; 

?>

<?php
if(!empty($_POST)){
    
    if(isset($_POST['renommerObj'])){
            echo $_POST['inputObjectifsSelect'].' '.$_POST['idObjetSelect'];

            echo "UPDATE donnees SET CONTENU = '".$_POST['inputObjectifsSelect']."' 
            WHERE ID_DONNEES =".$_POST['idObjetSelect'];

        $req = $connexion->prepare("UPDATE donnees SET CONTENU = '".$_POST['inputObjectifsSelect']."' 
            WHERE ID_DONNEES =".$_POST['idObjetSelect']);
            $req->execute();

        header('location:visualiser_ishikawa.php');
        }
    
    if(isset($_POST['supprObj'])){
        
        echo "DELETE FROM donnees WHERE ID_DONNEES = '".$_POST['idObjetSelect']."' AND CONTENU='".$_POST['inputObjectifsSelect']."'";
        $req = $connexion->prepare("DELETE FROM donnees WHERE ID_DONNEES = '".$_POST['idObjetSelect']."' AND CONTENU='".$_POST['inputObjectifsSelect']."'");
            $req->execute();

        header('location:visualiser_ishikawa.php');
        
    }
}
?>