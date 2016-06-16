 <?php 
session_start();
require_once 'connexion_bdd.php'; 

?>
<?php
if($_GET)
{
    
    $type=$_GET['inputTypeAction'];
    $idIshi = $_SESSION['id_ichikawa'];

    if($type == 'AjoutPolitique')
    {
        $contenu=$_GET['inputPolitique'];
        $intitule = 'Politique';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_PESTEL, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idPestel, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idPestel', $_SESSION['id_pestel']);
        $stmt->bindParam(':intitule', $intitule);

        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
      
        
        
        
        echo "1 <option value='".$lastIdDonnee."'>".$contenu."</option>";
        
        
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprPolitique')
    {
        $idSelect=$_GET['inputPolitiqueSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "2 ";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'AjoutEconomique')
    {
        $contenu=$_GET['inputEconomique'];
        $intitule = 'Economique';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_PESTEL, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idPestel, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idPestel', $_SESSION['id_pestel']);
        $stmt->bindParam(':intitule', $intitule);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
       // echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
        
        
        echo "3 <option value='".$lastIdDonnee."'>".$contenu."</option>";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprEconomique')
    {
        $idSelect=$_GET['inputEconomiqueSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "4 ";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'AjoutSocioCulturel')
    {
        $contenu=$_GET['inputSocioCulturel'];
        $intitule = 'SocioCulturel';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_PESTEL, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idPestel, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idPestel', $_SESSION['id_pestel']);
        $stmt->bindParam(':intitule', $intitule);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
       // echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
        
        
        echo "5 <option value='".$lastIdDonnee."'>".$contenu."</option>";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprSocioCulturel')
    {
        $idSelect=$_GET['inputSocioCulturelSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "6 ";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'AjoutTechnologique')
    {
        $contenu=$_GET['inputTechnologique'];
        $intitule = 'Technologique';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_PESTEL, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idPestel, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idPestel', $_SESSION['id_pestel']);
        $stmt->bindParam(':intitule', $intitule);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
       // echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
        
        
        echo "7 <option value='".$lastIdDonnee."'>".$contenu."</option>";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprTechnologique')
    {
        $idSelect=$_GET['inputTechnologiqueSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "8 ";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'AjoutEcologique')
    {
        $contenu=$_GET['inputEcologique'];
        $intitule = 'Ecologique';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_PESTEL, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idPestel, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idPestel', $_SESSION['id_pestel']);
        $stmt->bindParam(':intitule', $intitule);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
       // echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
        
        
        echo "9 <option value='".$lastIdDonnee."'>".$contenu."</option>";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprEcologique')
    {
        $idSelect=$_GET['inputEcologiqueSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "10 ";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'AjoutLegal')
    {
        $contenu=$_GET['inputLegal'];
        $intitule = 'Legal';
        
        $req=" INSERT INTO donnees ( ID_ICHIKAWA, ID_PESTEL, INTITULÉ, CONTENU) 
                VALUES (:idIshikawa, :idPestel, :intitule, :contenu);";
        
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':idIshikawa', $idIshi);
        $stmt->bindParam(':idPestel', $_SESSION['id_pestel']);
        $stmt->bindParam(':intitule', $intitule);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->execute();

        $lastIdDonnee=recupIdDerniereDonnee($connexion);
       // echo "1 <option value='".$lastIdDonnee."'>".$obj."</option>";
        
        
        echo "11 <option value='".$lastIdDonnee."'>".$contenu."</option>";
       // echo $idIshi.' '.$contenu.' '.$intitule.' '.$_SESSION['id_swot'];
    }
    else if($type == 'SupprLegal')
    {
        $idSelect=$_GET['inputLegalSelect'];
        
        
        $req=" DELETE FROM donnees 
                WHERE ID_DONNEES = ".$idSelect;
        
        $stmt = $connexion->prepare($req);
     
        $stmt->execute();

        
        echo "12 ";
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