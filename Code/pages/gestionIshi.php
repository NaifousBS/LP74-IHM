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

        
        
        /*$req = $connexion->prepare("DELETE FROM donnees WHERE ID_DONNEES = '".$_POST['idObjetSelect']."' AND CONTENU='".$_POST['inputObjectifsSelect']."'");
            $req->execute();*/
        
        
        $maReq="
        UPDATE donnees 
        SET 
        NOEUD = NULL,
        NOEUDPARENT=NULL
        
        WHERE ID_DONNEES = ".$_POST['idObjetSelect']."
        ;
        UPDATE donnees
        SET NOEUDPARENT=NULL,
            NOEUD = NULL
        WHERE NOEUDPARENT = ".$_POST['idObjetSelect'];
       
        $req = $connexion->prepare($maReq);
        $req->execute();
        

        header('location:visualiser_ishikawa.php');
        
    }
}
?>