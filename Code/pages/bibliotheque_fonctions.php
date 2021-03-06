<?php

function listerObjectifs($cnn,$id)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM donnees WHERE NOEUD IS NULL AND ID_ICHIKAWA = ".$id;
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


function affichage($cnn,$entree) // affiche le titre 
{
    echo '<option value="'.$entree[0].'">'.$entree[1].'</option>';
}

function affichePanel($cnn,$entree) // affiche les données dans le panel
{
    echo '- '.$entree[1].'<br/>';
}


function listerNoeuds1($cnn,$id)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM donnees WHERE NOEUD = 1 AND ID_ICHIKAWA = ".$id;
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
function listerNoeuds2($cnn,$id)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM donnees WHERE NOEUD = 2 AND ID_ICHIKAWA = ".$id;
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

function listerNoeuds2AvecParent($cnn,$id, $idParent)
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

function listerNoeuds0($cnn,$id)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM donnees WHERE NOEUD = 0 AND ID_ICHIKAWA = ".$id;
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

function listerSwot($cnn,$idSwot,$intitule)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM `donnees` 
            WHERE ID_SWOT = ".$idSwot."
            AND INTITULÉ LIKE '".$intitule."' ";
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

function listerPestel($cnn,$idPestel,$intitule)
{
    $req="  SELECT ID_DONNEES,CONTENU FROM `donnees` 
            WHERE ID_PESTEL = ".$idPestel."
            AND INTITULÉ LIKE '".$intitule."' ";
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

function listerIshikawa($cnn,$idIchi)
{
    $req = "SELECT ID_DONNEES,CONTENU FROM `donnees` 
            WHERE ID_ICHIKAWA = ".$idIchi." AND NOEUD > 0";
    $reponse = $cnn->prepare($req);

    $liste=array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_DONNEES'],$donnees['CONTENU']));
        }
    }
   
    return $liste;

}

function listerProjets($cnn)
{
    $req="  SELECT ID_ICHIKAWA,CONTENU FROM donnees natural join ichikawa

            WHERE NOEUD = 0 ";
    $reponse= $cnn->prepare($req);
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_ICHIKAWA'],$donnees['CONTENU']));
        }
    }
   
    return $liste;
}
function affichageProjet($cnn,$entree) // affiche le titre 
{
    
    echo '<li><a href="traitementChoixProjet.php?idIshi='.$entree[0].'" >'.$entree[1].'</a></li>';
}



?>

