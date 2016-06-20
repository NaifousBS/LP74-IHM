 <?php 
session_start();
require_once 'connexion_bdd.php'; 

?>
<?php
if($_GET)
{
    
    $type=$_GET['inputTypeAction'];
    $paramishi = $_SESSION['id_ichikawa'];

    if($type == 'AjoutObj')
    {
        $obj=$_GET['ajoutObj'];
        
        $req=" INSERT INTO donnees (ID_ICHIKAWA,CONTENU)
                VALUES (:idIshikawa,:contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $paramishi);
        $stmt->bindParam(':contenu', $obj);
        $stmt->execute();

        $lastIdDonnee=recupDerniereCommande($connexion);
        echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
    }
    else if($type == 'AjoutArete')
    {
        $idObj=$_GET['inputObjSelect'];
        $req=" UPDATE donnees 
                SET NOEUD=1,NOEUDParent=0
                WHERE ID_DONNEES = ".$idObj;
        
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        
        echo "2 ";
    }
   
    

    else if($type == 'SupprArete')
    {
        $idObj=$_GET['inputNoeud1Select'];
        $req=" UPDATE donnees 
                SET NOEUD=NULL,NOEUDParent=NULL
                WHERE ID_DONNEES = ".$idObj;
        
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        
        echo "3 ";
        
    }
    else if($type == 'AjoutNoeud2')
    {
        $idObj=$_GET['inputObjSelect'];
        $idNoeud1=$_GET['inputNoeud1Select'];
        $req=" UPDATE donnees 
                SET NOEUD=2,NOEUDParent = ".$idNoeud1."
                WHERE ID_DONNEES = ".$idObj;
        
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        
        echo "4 ";
        
    }
    else if($type == 'SupprNoeud2')
    {
        $idNoeud2=$_GET['inputNoeud2Select'];
        $req=" UPDATE donnees 
                SET NOEUD=NULL,NOEUDParent = NULL
                WHERE ID_DONNEES = ".$idNoeud2;
        
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        
        echo "5 ".$idNoeud2;
        
    }
    
    else if($type == 'Noeud1Changed')
    {
       $idNoeud1=$_GET['inputNoeud1Select'];
        $liste=listerNoeud2($connexion,$paramishi,$idNoeud1);
        $retour="";
        
        if(!empty($liste))
        {
            foreach ($liste as $noeud2) 
            {
                //affichage($connexion,$noeud1);
                $retour=$retour.'<option value="'.$noeud2[0].'">'.$noeud2[1].'</option>;';
            }
        }
       
        echo "6 ".$retour;
        
    }   
    
    
    
    //echo $type;
}

//récupère la derniere donnée
function recupDerniereCommande($cnn)
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