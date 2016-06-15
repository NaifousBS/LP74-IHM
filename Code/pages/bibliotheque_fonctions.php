<?php



/*
ID_PRODUIT          -> 0
NOM_PDT             -> 1
DESC_PDT            -> 2
PRIX                -> 3
CHEMIN_IMG_PDT      -> 4
STOCK               -> 5
LIEN_EXERCICE       -> 6
MUSCLE_CONCERNE     -> 7
*/







// Fonction appelé dans les pages: machines.php; poids_libres.php; complementd_alimentaires.php
// Liste tous les produits en fonction de la catégorie : 1 --> Machines ; 2 --> Poids libres ; 3 --> Complements alimentaires
// Apres avoir lister tous les produits, les ajoute dans un tableau puis renvoie le tableau
function listerProduits($cnn,$id)
{
    $req="  SELECT *
            FROM `produit`
            WHERE `ID_CATEGORIE` = ".$id.";";
    $reponse= $cnn->prepare($req);
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_PRODUIT'],$donnees['NOM_PDT'],$donnees['DESC_PDT']
                                     ,$donnees['PRIX'],$donnees['CHEMIN_IMG_PDT'],$donnees['STOCK'],$donnees['LIEN_EXERCICE']));
        }
    }
   
    return $liste;
}

// Fonction appelé dans les pages: machines.php; poids_libres.php; complementd_alimentaires.php
// Affiche les informations sur le produit passé en paramètre dans les pages concernées
function affichageProduit($cnn,$produit,$page) // affiche le titre 
{
    echo 
        '
            <div class="wrap box-1 top-4"> 
        ';
            if($produit[4] == null)
            {
                echo '<img src="images/img_vide.jpg" alt="" class="img-border img-indent">';
            }
            else
                echo '<img src="'.$produit[4].'" alt="" class="img-border img-indent">';
            echo'
                <div class="row">
                    <div class="col-md-4">
                        <p class="p2"><strong>'.$produit[1].'</strong></p>
                        <p>'.$produit[2].' </p>
                        <p style="color:red; font-weight:bold; width:5px;">Prix: '.$produit[3].'€ </p>
                    </div>
                    <div class="col-md-3">
                        <br/><br/><br/><br/>
                        <a href="ajout_panier.php?idProduit='.$produit[0].'&prixUnitaire='.$produit[3].'&qteProduit=1&page='.$page.'">
                        <button type="button" class="btn btn-primary" >Ajouter au panier</button>
                        </a>
                        <br/>
                        <a href="produit.php?idProduit='.$produit[0].'" > Plus de détails >></a>
                    </div>


                </div>
            </div>

        ';

}


function listerDetailsProduit($cnn, $idProduit)
{
    $req="  SELECT *
            FROM `produit`
            WHERE `ID_PRODUIT` = ".$idProduit.";";
    $reponse= $cnn->prepare($req);
   
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_PRODUIT'],$donnees['NOM_PDT'],$donnees['DESC_PDT'],$donnees['PRIX'],$donnees['CHEMIN_IMG_PDT'],$donnees['STOCK'],$donnees['LIEN_EXERCICE'],$donnees['MUSCLE_CONCERNE']  ));
        }
       
        
    }
   
    return $liste;
}

function afficheDetailsProduit($cnn,$produit)
{
    
    /*
    ID_PRODUIT          -> 0
    NOM_PDT             -> 1
    DESC_PDT            -> 2
    PRIX                -> 3
    CHEMIN_IMG_PDT      -> 4
    STOCK               -> 5
    LIEN_EXERCICE       -> 6
    */
    $page="produit.php";
    echo
        '
            <div class="col-1">
                <h2 class="p3"><span class="color-1">'.$produit[1].' </span></h2>
                <p class="p5">Description du produit : '.$produit[2].'</p>
                <div class="wrap box-1">';

                if($produit[4] == null)
                    echo '<img src="images/img_vide.jpg" alt="" class="img-border img-indent">';
                else
                    echo'<img src="'.$produit[4].'" alt="" class="img-border img-indent">';
                   
    
                echo'
                    <div class="extra-wrap">

                        <form>
                          <div class="form-group">
                            <p><strong>Prix unitaire</strong></p>
                            <p style="color:red; font-weight:bold;">'.$produit[3].'€</p>

                          </div>
                          
                          
                        </form>



                        <a href="ajout_panier.php?idProduit='.$produit[0].'&prixUnitaire='.$produit[3].'&qteProduit=1&page='.$page.'">

                        <button type="button" class="btn btn-primary" >Ajouter au panier</button>
                        </a>
                        
                    </div>



                </div>

            </div>
            <div class="col-2">
                <h2 class="p6"><span class="color-1">Muscles</span> Concernés</h2>';
                
                if($produit[7] == null)
                    echo '<img src="images/img_vide.jpg" alt="" class="img-border img-indent">';
                else
                    echo'<img src="'.$produit[7].'" alt="" class="img-border">';
                    
                echo'    
                <p class="p2 top-6"><strong>Lien:</strong></p>';
                    
                if($produit[6] == null)
                    echo '<p>Nous sommes désolés, nous n\'avons pas de lien pour le moment.</p>';
                else
                    echo' <a href="'.$produit[6].'">'.$produit[6].'</a>';
                    
                    
            echo'

                

            </div>
        ';
}

/*
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return (bool)($d && $d->format($format) == $date);
}
*/


function listerPerformances($cnn,$id)
{
    
    
    $req="  SELECT *
            FROM `performances`
            WHERE `ID_UTILISATEUR` = ".$id.";";

    $reponse= $cnn->prepare($req);
   
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste,array($donnees['ID_PERFORMANCE'],$donnees['ID_UTILISATEUR'],$donnees['POIDS'],$donnees['TAILLE'],$donnees['BRAS']
                                    ,$donnees['EPAULES'],$donnees['POITRINES'],$donnees['CUISSES'],$donnees['TOUR_TAILLE'],$donnees['DATE_SAISIE'],$donnees['MASSE_GRAISSEUSE']));
        }
       
        
    }
    
    /*
    
    0 -> ID_PERFORMANCE
    1 -> ID_UTILISATEUR
    2 -> POIDS
    3 -> TAILLE
    4 -> BRAS
    5 -> EPAULES
    6 -> POITRINES
    7 -> CUISSES
    8 -> TOUR_TAILLE
    9 -> TOUR_TAILLE
    10 -> TOUR_TAILLE
    
    */
   
    return $liste;
}


function affichagePerformance($cnn,$perf) // affiche le titre 
{
    
    
    echo'
            <tr>
              <th scope="row"><a href="mes_performances.php?idPerf='.$perf[0].'">Modifier</a></th>
              <td>'.$perf[9].'</td>
              <td>'.$perf[2].'</td>
              <td>'.$perf[3].'</td>
              <td>'.$perf[4].'</td>
              <td>'.$perf[5].'</td>
              <td>'.$perf[6].'</td>
              <td>'.$perf[7].'</td>
              <td>'.$perf[8].'</td>
              <td>'.$perf[10].'</td>
            </tr>
            
    ';


}

function listeDetailsPerformance($cnn,$idPerf)
{
    
    
    $req="  SELECT *
            FROM `performances`
            WHERE `ID_PERFORMANCE` = ".$idPerf.";";

    $reponse= $cnn->prepare($req);
   
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste,array($donnees['ID_PERFORMANCE'],$donnees['ID_UTILISATEUR'],$donnees['POIDS'],$donnees['TAILLE'],$donnees['BRAS']
                                    ,$donnees['EPAULES'],$donnees['POITRINES'],$donnees['CUISSES'],$donnees['TOUR_TAILLE'],$donnees['DATE_SAISIE'],$donnees['MASSE_GRAISSEUSE']));
        }
       
        
    }
   
    return $liste;
}


function afficheFormulairePerf($cnn, $idPerf)
{
    /*
    
        0 -> ID_PERFORMANCE
        1 -> ID_UTILISATEUR
        2 -> POIDS
        3 -> TAILLE
        4 -> BRAS
        5 -> EPAULES
        6 -> POITRINES
        7 -> CUISSES
        8 -> TOUR_TAILLE
        9 -> DATE_SAISIE
        10 -> MASSE_GRAISSEUSE
    
    */
    
    $poids = "";
    $taille= "";

    $bras= "";
    $epaules= "";
    $poitrine= "";

    $cuisse= "";
    $trtaille= "";

    $masseGraisse= "";
    
    if($idPerf != null)
    {
        $liste=listeDetailsPerformance($cnn,$idPerf);
        
        
        
        foreach ($liste as $maPerformance) 
        {

            $poids = $maPerformance[2];
            $taille= $maPerformance[3];

            $bras= $maPerformance[4];
            $epaules= $maPerformance[5];
            $poitrine= $maPerformance[6];

            $cuisse= $maPerformance[7];
            $trtaille= $maPerformance[8];

            $masseGraisse= $maPerformance[10];
        }
        
        echo
            '<h2 class="p3"><span class="color-1">Modifier</span> ma performance</h2>';
        
    }
    else
       echo '<h2 class="p3"><span class="color-1">Ajouter</span> une nouvelle performance</h2>';
        
    
                
                
        
        
        
        echo'
                        <form id="monFormulaire" action="mes_performances.php" method="post">
                                <fieldset>
                                    
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="poids" >Poids:</label>
                                        </div>
                                        <div class="col-ld-3">
                                            <input type="text" class="form-control" id="poids" name="poids" placeholder="75 kg" value="'.$poids.'" />
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="taille">Taille:</label>
                                        </div>
                                        <div class="col-ld-3">
                                            <input type="text" class="form-control" id="taille" name="taille" placeholder="180 cm" value="'.$taille.'"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="bras">Bras:</label>
                                        </div>
                                        <div class="col-ld-3">
                                            <input type="text" class="form-control" id="bras" name="bras" placeholder="40 cm" value="'.$bras.'"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="epaules">Epaules:</label>
                                        </div>
                                        <div class="col-ld-3">
				                            <input type="email"  class="form-control" id="epaules" name="epaules" placeholder="100 cm" value="'.$epaules.'"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <label for="poitrine" >Poitrine:</label>
                                        </div>
                                        <div class="col-ld-3">
                                        <input type="text" class="form-control" id="poitrine" name="poitrine" placeholder="80 cm" value="'.$poitrine.'"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                        <label for="cuisse" >Cuisse:</label>
                                        </div>
                                        <div class="col-ld-3">
                                        <input type="text" class="form-control" id="cuisse" name="cuisse" placeholder="50 cm" value="'.$cuisse.'"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="trtaille" >Tour de taille:</label>
                                        </div>
                                        <div class="col-ld-3">
                                        <input type="text" class="form-control" id="trtaille" name="trtaille" placeholder="70 cm" value="'.$trtaille.'"/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="masseGraisse" >Masse graisseuse:</label>
                                        </div>
                                        <div class="col-ld-3">
                                            <input type="text" class="form-control" id="masseGraisse" name="masseGraisse" placeholder="17.5 %" value="'.$masseGraisse.'"/>
                                        </div>
                                    </div>
								<br>
                                    
                                    <br>';
    
                            if($idPerf != null)
                                echo'
                                
                                <div class="row">
                                    <div class="col-md-5">
                                        <button type="button" onclick=\'document.getElementById("monFormulaire").submit()\' class="btn btn-primary" >Confirmer</button>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="mes_performances.php">
                                        <button type="button" class="btn btn-danger" >Annuler</button>
                                        </a>
                                    </div>
                                </div>
                                <input type="hidden" name="typePost" value="'.$idPerf.'" />
                                
                                ';
                            else
                                echo '<a href="#" class="button top-6"  onclick=\'document.getElementById("monFormulaire").submit()\'>Ajouter une performance</a>
                                      <input type="hidden" name="typePost" value="Ajout" />
                                        ';
    
                                   
                                   
                                   
                       echo '
                            
                            </fieldset>
                        </form>
                        
                        
                ';
    
    
}

function ajouterPanier($cnn,$idUtilisateur,$idProduit,$qteCommande,$prixUnitaire)
{
        $date = date('Y-m-d H:i:s');
    
        $nbElementPanier=countPanier($cnn,$idUtilisateur);
        
        if($nbElementPanier==0)
        {
            $montant=0.0;
            $statut = 'Panier';

            $req="INSERT INTO `commande` (`ID_UTILISATEUR`, `DATE_COMMANDE`, `MONTANT_COMMANDE`, `STATUT_COMMANDE`) 
                    VALUES (:idUtilisateur,:date,:montant,:statut);     

            ";




            $stmt = $cnn->prepare($req);
            //$stmt->bindParam(':date', $date);


            $stmt->bindParam(':idUtilisateur', $idUtilisateur);
            $stmt->bindParam(':montant', $montant);
            $stmt->bindParam(':statut', $statut);
            $stmt->bindParam(':date', $date);
            
            
            

            $stmt->execute();
    
        }
    
        $idDerniereCommande= recupDerniereCommande($cnn);
        echo 'Id derniere commande'.$idDerniereCommande;
    
        $montantLC=intval($qteCommande)*floatval($prixUnitaire);
    
        $req=" INSERT INTO `ligne_commande`(ID_COMMANDE,ID_PRODUIT,QUANTITE_COMMANDE,MONTANT_LIGNE_CMD)
                VALUES (:idCommande,:idProduit,:qteCommande,:montantLC);     
                
        ";
        echo $req;
        $stmt = $cnn->prepare($req);
        //$stmt->bindParam(':date', $date);
        
        echo $idProduit;
        $stmt->bindParam(':idCommande', $idDerniereCommande);
        $stmt->bindParam(':idProduit', $idProduit);
        $stmt->bindParam(':qteCommande', $qteCommande);
        $stmt->bindParam(':montantLC', $montantLC);
        $stmt->execute();
    
    
       
}


//récupère l'id de la dernière commande
function recupDerniereCommande($cnn)
{
    $req="  SELECT max(ID_COMMANDE) FROM commande  
            ;";
    $reponse= $cnn->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    return $donnees[0]; 


}


//réupère l'id du dernier utilisateur crée
function recupDernierIdUser($cnn)
{
    $req="  SELECT max(ID_UTILISATEUR) FROM utilisateur 
            ;";
    $reponse= $cnn->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    return $donnees[0]; 


}

//Vérifie si le panier est vide où s'il existe déjà une commande en cours
function countPanier($cnn, $idUtilisateur)
{
    
    
    $req="  SELECT COUNT(*) 

            FROM `commande` NATURAL JOIN ligne_commande
            WHERE `ID_UTILISATEUR` = ".$idUtilisateur."
            AND `STATUT_COMMANDE` like 'Panier' 
            ;";
    
    
    $reponse= $cnn->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    return $donnees[0]; 
   
}


function listerCommandes($cnn, $idUtilisateur,$statut)
{
    
    
    $req="  SELECT *
            FROM `commande`
            WHERE `ID_UTILISATEUR` = ".$idUtilisateur."
            AND STATUT_COMMANDE like '".$statut."'  
            ;";
    $reponse= $cnn->prepare($req);
   
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_COMMANDE'],$donnees['ID_UTILISATEUR'],$donnees['DATE_COMMANDE'],$donnees['MONTANT_COMANDE'],$donnees['STATUT_COMMANDE']));
        }
       
        
    }
   
    return $liste;
    
    /*
    0->ID_COMMANDE
    1->ID_UTILISATEUR
    2->DATE_COMMANDE
    3->MONTANT_COMANDE
    4->STATUT_COMMANDE
    
    
    */
}


function listerPanier($cnn, $idUtilisateur)
{
     $req="     SELECT * 
                FROM `commande` 
                NATURAL JOIN ligne_commande
                NATURAL JOIN produit


                WHERE `ID_UTILISATEUR` = ".$idUtilisateur."
                AND `STATUT_COMMANDE` like 'Panier'  
            ;";
    $reponse= $cnn->prepare($req);
   
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_PRODUIT'],$donnees['ID_COMMANDE'],$donnees['ID_UTILISATEUR'],$donnees['QUANTITE_COMMANDE'],$donnees['MONTANT_LIGNE_CMD'],$donnees['ID_CATEGORIE'],$donnees['NOM_PDT'],$donnees['PRIX'],$donnees['CHEMIN_IMG_PDT'],$donnees['STOCK'],$donnees['DESC_PDT']));
        }
       
        
    }
   
    return $liste;
    
    
    
    
    
}

function affichageCommandePanier($cnn,$commandePanier) 
{
    /*
   
    0->ID_PRODUIT
    1->ID_COMMANDE
    2->ID_UTILISATEUR
    3->QUANTITE_COMMANDE
    4->MONTANT_LIGN_CMD
    5->ID_CATEGORIE
    6->NOM_PDT
    7->PRIX
    8->CHEMIN_IMG_PDT
    9->STOCK
    10->STOCK
    
    
    
    
    */
   

    
    
    echo'
    
                        <div class="wrap box-1 top-4"> 
                            <h3>'.$commandePanier[6].'</h2>
                            ';
                            if($commandePanier[8] == null)
                                echo '<img src="images/img_vide.jpg" alt="" class="img-border img-indent">';
                            else
                                echo'<img src="'.$commandePanier[8].'" alt="" class="img-border img-indent">';
                            
        echo'
                            <div class="extra-wrap">
                                
                                <h4>Quantité:</h4>
                                    <div class="pull-left">
                                    <a href="traitement_qte_panier.php?idProduit='.$commandePanier[0].'&idCommande='.$commandePanier[1].'&qteCommande='.$commandePanier[3].'&prixUnitaire='.$commandePanier[7].'&type=-1">
                                    <button class="btn btn-primary pull-left">-</button>
                                    </a>

                                    <input type="text" class="form-control pull-left" id="qteTxt" placeholder="1" value="'.$commandePanier[3].'" disabled/>
                                    
                                    <a href="traitement_qte_panier.php?idProduit='.$commandePanier[0].'&idCommande='.$commandePanier[1].'&qteCommande='.$commandePanier[3].'&prixUnitaire='.$commandePanier[7].'&type=1">
                                    <button class="btn btn-primary ">+</button>
                                    </a>
                                    </div>
                                <p><strong>Prix total</strong></p>
                                <p style="color:red; font-weight:bold;">'.$commandePanier[4].'€</p>
                                <a href="supprime_panier.php?idCommande='.$commandePanier[1].'&idProduit='.$commandePanier[0].'">
                                    
                                    <button type="button" class="btn btn-danger">Retirer le produit</button>
                                    
                                </a>
                            </div>
                        </div>
                        
        ';


}

function supprimerPanier($cnn,$idUtilisateur,$idProduit,$idCommande)
{
        
    
        $nbElementPanier=countPanier($cnn,$idUtilisateur);
        $req="      DELETE FROM `ligne_commande` 
                    WHERE ID_PRODUIT =:idProduit
                    AND  ID_COMMANDE=:idCommande; "; 
        if($nbElementPanier==1)
        {
            $req=$req."
                    DELETE FROM commande
                    WHERE ID_COMMANDE=:idCommande;
            ";
            
        }

        $stmt = $cnn->prepare($req);
        $stmt->bindParam(':idProduit', $idProduit);
        $stmt->bindParam(':idCommande', $idCommande);
        $stmt->execute();

       
}


function changeQtePanier($cnn,$idProduit,$idCommande,$qteLC,$mntLC)
{
    
    
    $req="    
    UPDATE `ligne_commande` 
    SET `QUANTITE_COMMANDE`=:qteLC,`MONTANT_LIGNE_CMD`=:mntLC 
    WHERE ID_PRODUIT = :idProduit AND ID_COMMANDE=:idCommande";
    
    

    $stmt = $cnn->prepare($req);
    $stmt->bindParam(':idProduit', $idProduit);
    $stmt->bindParam(':idCommande', $idCommande);
    $stmt->bindParam(':qteLC', $qteLC);
    $stmt->bindParam(':mntLC', $mntLC);
    $stmt->execute();
    
    
}


function sumMntCommande($cnn,$idCommande)
{
    
    

    $req="  
        SELECT ROUND(SUM(`MONTANT_LIGNE_CMD`),2)
        FROM `ligne_commande`
        WHERE `ID_COMMANDE`=".$idCommande.";";
        
    $reponse= $cnn->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    return $donnees[0]; 
    
    
}

function recupIdPanier($cnn,$idUtil)
{
    $req="  
        SELECT `ID_COMMANDE` FROM `commande` 
        WHERE `ID_UTILISATEUR`=".$idUtil."
        AND `STATUT_COMMANDE` like 'Panier'";
        
    $reponse= $cnn->prepare($req);
    $reponse->execute();
    $donnees = $reponse->fetch();
    
    return $donnees[0]; 
    
}

function validerCommande($cnn, $idCommande)
{
    $mntCommande= sumMntCommande($cnn,$idCommande);
    $req="    
    UPDATE `commande` 
    SET `STATUT_COMMANDE`= 'En cours'
        , MONTANT_COMMANDE=:mntCommande
    WHERE ID_COMMANDE=:idCommande";
    $stmt = $cnn->prepare($req);
    $stmt->bindParam(':idCommande', $idCommande);
    $stmt->bindParam(':mntCommande', $mntCommande);
    $stmt->execute();
}








function listerCommande($cnn, $idUtilisateur,$statut)
{
     $req="     SELECT * 
                FROM `commande` 
                WHERE `ID_UTILISATEUR` = ".$idUtilisateur."
                AND `STATUT_COMMANDE` like '".$statut."'  
            ;";
    $reponse= $cnn->prepare($req);
   
    
    $liste =array();
    if($reponse->execute())
    {
         while ($donnees = $reponse->fetch())
        {
            array_push($liste, array($donnees['ID_COMMANDE'],$donnees['ID_UTILISATEUR'],$donnees['DATE_COMMANDE'],$donnees['MONTANT_COMMANDE'],$donnees['STATUT_COMMANDE']));
        }
       
        
    }
   
    return $liste;
    
    
    
    
    
}
function afficheCommande($cnn,$cmd,$statut)
{
    echo'
        <tr>
                                  
            <td>'.$cmd[2].'</td>
            <td>'.$cmd[3].'</td>
            <td>'.$cmd[4].'</td>
            
            
            ';
    if($statut=='En cours')
            echo'<th scope="row"><a href="#">Suivre ma commande</a></th>';
    else
        echo'<th scope="row"><a href="#">Détails commande</a></th>';

    
        echo'
        </tr>';
}














?>

