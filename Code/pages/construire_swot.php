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

    <title>Diagramme SWOT</title>

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
        url: "ajoutSwot.php",
        data: data
        }).done(function( msg ) {
            
            if(msg.substring(1, 3) == 1)
            {
                document.getElementById('inputStrength').value='';
                $("#listeForce").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 2)
            {
                delOption('listeForce');
            }
            
            else if(msg.substring(1, 3) == 3)
            {
                document.getElementById('inputWeakness').value='';
                $("#listeFaiblesse").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 4)
            {
                delOption('listeFaiblesse');
            }
            else if(msg.substring(1, 3) == 5)
            {
                document.getElementById('inputOpportunities').value='';
                $("#listeOpportunite").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 6)
            {
                delOption('listeOpportunite');
            }
            else if(msg.substring(1, 3) == 7)
            {
                document.getElementById('inputThreat').value='';
                $("#listeMenace").append(msg.substring(3));
            }
            else if(msg.substring(1, 3) == 8)
            {
                delOption('listeMenace');
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
                    <h1 class="page-header">SWOT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
            <!-- Strengths -->
            <div class="row">
                <label for="inputStrength">Forces:</label>
            </div>
            
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputStrength" name="inputStrength" type="text" class="form-control" placeholder="Ajouter une nouvelle force">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutForce');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeForce" class="form-control" name="listeForce" size="5" onchange="selectOnChange('listeForce','inputForceSelect')">
                     <?php
                            $liste=listerSwot($connexion,$_SESSION['id_swot'],'Force');
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
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprForce');" />
                </div>
            </div>
            
            
            
            <!-- Weaknesses -->
            <div class="row">
                <label for="inputStrength">Faiblesses:</label>
            </div>
           
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputWeakness" name="inputWeakness" type="text" class="form-control" placeholder="Ajouter une nouvelle faiblesse">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutFaiblesse');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeFaiblesse" class="form-control" name="listeFaiblesse" size="5" onchange="selectOnChange('listeFaiblesse','inputFaiblesseSelect')">
                     <?php
                            $liste=listerSwot($connexion,$_SESSION['id_swot'],'Faiblesse');
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
                   <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprFaiblesse');" />
                </div>
            </div>
            
             <!-- Opportunities -->
            <div class="row">
                <label for="inputStrength">Opportunités:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputOpportunities" name="inputOpportunities" type="text" class="form-control" placeholder="Ajouter une nouvelle opportunité">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutOpportunite');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                   <select id ="listeOpportunite" class="form-control" name="listeOpportunite" size="5" onchange="selectOnChange('listeOpportunite','inputOpportuniteSelect')">
                     <?php
                            $liste=listerSwot($connexion,$_SESSION['id_swot'],'Opportunite');
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
                   <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprOpportunite');" /> 
                </div>
            </div>
            
             <!-- Threats -->
            <div class="row">
                <label for="inputStrength">Menaces:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input id="inputThreat" name="inputThreat" type="text" class="form-control" placeholder="Ajouter une nouvelle menace">
                </div>
                <div class="col-md-5">
                     <input type="submit" class="btn btn-primary col-md-3" value="Ajouter" onclick="majInputType('AjoutMenace');" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id ="listeMenace" class="form-control" name="listeMenace" size="5" onchange="selectOnChange('listeMenace','inputMenaceSelect')">
                     <?php
                            $liste=listerSwot($connexion,$_SESSION['id_swot'],'Menace');
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
                    <input type="submit" class="btn btn-danger col-md-3" value="Supprimer" onclick="majInputType('SupprMenace');" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                   <button type="button" class="btn btn-info pull-right " onclick="window.location='visualiser_swot.php';">Visualiser le SWOT</button>  
                </div>
            </div>
        
        </div>
        <input id="inputTypeAction" name="inputTypeAction" type="hidden" value=""/>
        <input id="inputForceSelect" name="inputForceSelect" type="hidden" value=""/>
        <input id="inputFaiblesseSelect" name="inputFaiblesseSelect" type="hidden" value=""/>
        <input id="inputOpportuniteSelect" name="inputOpportuniteSelect" type="hidden" value=""/>
        <input id="inputMenaceSelect" name="inputMenaceSelect" type="hidden" value=""/>

    </div>
    
    </form>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../js/monScript.js"></script>

</body>

</html>
