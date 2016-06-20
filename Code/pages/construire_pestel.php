<?php
session_start();
require_once 'connexion_bdd.php';
include('bibliotheque_fonctions.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Diagramme PESTEL</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>
    <script>
    $(document).ready(function(){
    $("form").on('submit',function(event){
    event.preventDefault();
        data = $(this).serialize();

        $.ajax({
        type: "GET",
        url: "gestionPestel.php",
        data: data
        }).done(function( msg ) {
            
            if(msg.substring(1, 3) == 1)
            {
                document.getElementById('inputPolitique').value='';
                $("#listePolitique").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 2)
            {
                delOption('listePolitique');
            }
            
            else if(msg.substring(1, 3) == 3)
            {
                document.getElementById('inputEconomique').value='';
                $("#listeEconomique").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 4)
            {
                delOption('listeEconomique');
            }
            else if(msg.substring(1, 3) == 5)
            {
                document.getElementById('inputSocioCulturel').value='';
                $("#listeSocioCulturel").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 6)
            {
                delOption('listeSocioCulturel');
            }
            else if(msg.substring(1, 3) == 7)
            {
                document.getElementById('inputTechnologique').value='';
                $("#listeTechnologique").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 8)
            {
                delOption('listeTechnologique');
            }
            else if(msg.substring(1, 3) == 9)
            {
                document.getElementById('inputEcologique').value='';
                $("#listeEcologique").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 10)
            {
                delOption('listeEcologique');
            }
            else if(msg.substring(1, 3) == 11)
            {
                document.getElementById('inputLegal').value='';
                $("#listeLegal").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 12)
            {
                delOption('listeLegal');
            }
            
                
        
        //alert( "Data Saved: " + msg );
        });
    });
});
    
    </script>

</head>

<body>
<form>
    <div id="wrapper">

            <?php include('navbar.inc.php'); ?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">PESTEL</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <form action="visualiser_pestel.php" method="post">
            
            <!-- Politique -->
            <div class="row">
                <label for="inputPolitique">Politique:</label>
            </div>
            
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputPolitique" name="inputPolitique" type="text" class="form-control" placeholder="Ajouter un nouveau critère">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutPolitique');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listePolitique" class="form-control" name="listePolitique" size="5" onchange="selectOnChange('listePolitique','inputPolitiqueSelect')">
                     <?php
                            $liste=listerPestel($connexion,$_SESSION['id_pestel'],'Politique');
                            if(!empty($liste))
                            {
                               foreach ($liste as $donnee) 
                                {
                                    affichage($connexion,$donnee);
                                }
                            }
                            
                        ?>
                    </select>
                    
                </div>
                <div class="col-md-5">
                <!--   <button type="button" class="btn btn-danger col-md-3">Supprimer</button> -->
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprPolitique');" />
                </div>
            </div>
            
            
            
            <!-- Economique -->
            <div class="row">
                <label for="inputStrength">Economique:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputEconomique" name="inputEconomique" type="text" class="form-control" placeholder="Ajouter un nouveau critère">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutEconomique');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeEconomique" class="form-control" name="listeEconomique" size="5" onchange="selectOnChange('listeEconomique','inputEconomiqueSelect')">
                     <?php
                            $liste=listerPestel($connexion,$_SESSION['id_pestel'],'Economique');
                            if(!empty($liste))
                            {
                               foreach ($liste as $donnee) 
                                {
                                    affichage($connexion,$donnee);
                                }
                            }
                            
                        ?>
                    </select>
                    
                </div>
                <div class="col-md-5">
                <!--   <button type="button" class="btn btn-danger col-md-3">Supprimer</button> -->
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprEconomique');" />
                </div>
            </div>
            
             <!-- Socioculturel -->
            <div class="row">
                <label for="inputSocioCulturel">SocioCulturel:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputSocioCulturel" name="inputSocioCulturel" type="text" class="form-control" placeholder="Ajouter un nouveau critère">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutSocioCulturel');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeSocioCulturel" class="form-control" name="listeSocioCulturel" size="5" onchange="selectOnChange('listeSocioCulturel','inputSocioCulturelSelect')">
                     <?php
                            $liste=listerPestel($connexion,$_SESSION['id_pestel'],'SocioCulturel');
                            if(!empty($liste))
                            {
                               foreach ($liste as $donnee) 
                                {
                                    affichage($connexion,$donnee);
                                }
                            }
                            
                        ?>
                    </select>
                    
                </div>
                <div class="col-md-5">
                <!--   <button type="button" class="btn btn-danger col-md-3">Supprimer</button> -->
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprSocioCulturel');" />
                </div>
            </div>
            
             <!-- Technologique -->
            <div class="row">
                <label for="inputTechnologique">Technologique:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputTechnologique" name="inputTechnologique" type="text" class="form-control" placeholder="Ajouter un nouveau critère">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutTechnologique');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeTechnologique" class="form-control" name="listeTechnologique" size="5" onchange="selectOnChange('listeTechnologique','inputTechnologiqueSelect')">
                     <?php
                            $liste=listerPestel($connexion,$_SESSION['id_pestel'],'Technologique');
                            if(!empty($liste))
                            {
                               foreach ($liste as $donnee) 
                                {
                                    affichage($connexion,$donnee);
                                }
                            }
                            
                        ?>
                    </select>
                    
                </div>
                <div class="col-md-5">
                <!--   <button type="button" class="btn btn-danger col-md-3">Supprimer</button> -->
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprTechnologique');" />
                </div>
            </div>
            <!-- Ecologique -->
            <div class="row">
                <label for="inputEcologique">Ecologique:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputEcologique" name="inputEcologique" type="text" class="form-control" placeholder="Ajouter un nouveau critère">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutEcologique');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeEcologique" class="form-control" name="listeEcologique" size="5" onchange="selectOnChange('listeEcologique','inputEcologiqueSelect')">
                     <?php
                            $liste=listerPestel($connexion,$_SESSION['id_pestel'],'Ecologique');
                            if(!empty($liste))
                            {
                               foreach ($liste as $donnee) 
                                {
                                    affichage($connexion,$donnee);
                                }
                            }
                            
                        ?>
                    </select>
                    
                </div>
                <div class="col-md-5">
                <!--   <button type="button" class="btn btn-danger col-md-3">Supprimer</button> -->
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprEcologique');" />
                </div>
            </div>

            <!-- Légal -->
            <div class="row">
                <label for="inputLegal">Légal:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputLegal" name="inputLegal" type="text" class="form-control" placeholder="Ajouter un nouveau critère">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutLegal');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeLegal" class="form-control" name="listeLegal" size="5" onchange="selectOnChange('listeLegal','inputLegalSelect')">
                     <?php
                            $liste=listerPestel($connexion,$_SESSION['id_pestel'],'Legal');
                            if(!empty($liste))
                            {
                               foreach ($liste as $donnee) 
                                {
                                    affichage($connexion,$donnee);
                                }
                            }
                            
                        ?>
                    </select>
                    
                </div>
                <div class="col-md-5">
                <!--   <button type="button" class="btn btn-danger col-md-3">Supprimer</button> -->
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprLegal');" />
                </div>
            </div>


            <div class="row">
                <div class="form-group col-lg-6">
                   <button type="button" class="btn btn-secondary" onclick="window.location='visualiser_swot.php';">Retour au SWOT</button>

                   <button type="button" class="btn btn-info pull-right " onclick="window.location='visualiser_pestel.php';">Visualiser le PESTEL</button>  
                </div>
            </div>
        </form>
        </div>
        <input id="inputTypeAction" name="inputTypeAction" type="hidden" value=""/>
        <input id="inputPolitiqueSelect" name="inputPolitiqueSelect" type="hidden" value=""/>
        <input id="inputEconomiqueSelect" name="inputEconomiqueSelect" type="hidden" value=""/>
        <input id="inputSocioCulturelSelect" name="inputSocioCulturelSelect" type="hidden" value=""/>
        <input id="inputTechnologiqueSelect" name="inputTechnologiqueSelect" type="hidden" value=""/>
        <input id="inputEcologiqueSelect" name="inputEcologiqueSelect" type="hidden" value=""/>
        <input id="inputLegalSelect" name="inputLegalSelect" type="hidden" value=""/>

    </div>
    <!-- /#wrapper -->
</form>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Script IHM -->
    <script src="../js/monScript.js"></script>

</body>

</html>
