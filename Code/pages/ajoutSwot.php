 <?php 
session_start();
require_once 'connexion_bdd.php'; 

?>
<?php
if($_GET)
{
    
    $type=$_GET['inputTypeAction'];
    $idIshi = $_SESSION['id_ichikawa'];

    if($type == 'AjoutForce')
    {
        $contenu=$_GET['inputStrength'];
        $intitule = 'Force';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_SWOT, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idSwot, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idSwot', $_SESSION['id_swot']);
        $stmt->bindParam(':intitule', $intitule);

        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
       // echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
        
        
        echo "1 <option value='".$lastIdDonnee."'>".$contenu."</option>";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprForce')
    {
        $idSelect=$_GET['inputForceSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "2 ";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
   
    
    
    
    //echo $type;
}

//récupère la derniere donnée
function recupIdDerniereDonnee($cnn)
{
    $req="  SELECT max(ID_DONNEES) FROM donnees  
            ;";
    $reponse= $cnn->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    return $donnees[0]; 

}
function listerNoeud2($cnn,$id, $idParent)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM donnees WHERE NOEUD = 2 
            AND ID_ICHIKAWA = ".$id."
            AND NOEUDPARENT =".$idParent;
    $reponse= $cnn->prepare($req);
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_DONNEES'],$donnees['CONTENU']));
        }
    }
   
    return $liste;
}




       



?>