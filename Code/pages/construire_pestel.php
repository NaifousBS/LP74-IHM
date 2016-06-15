<?php
require_once 'connexion_bdd.php';
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

</head>

<body>

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
                <label for="inputStrength">Politique:</label>
            </div>
            
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" id="inputPol" placeholder="Ajouter un critère">
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-primary col-md-3" onclick="addOption('inputPol','listPol')">Ajouter</button>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id="listPol" class="form-control" size="5">
                    </select>
                    
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-danger col-md-3" onclick="delOption('listPol')">Supprimer</button>  
                </div>
            </div>
            
            
            
            <!-- Economique -->
            <div class="row">
                <label for="inputStrength">Economique:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" id="inputEcon" placeholder="Ajouter un critère">
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-primary col-md-3" onclick="addOption('inputEcon','listEcon')">Ajouter</button>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id="listEcon" class="form-control" size="5">
                    </select>
                    
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-danger col-md-3" onclick="delOption('listEcon')">Supprimer</button>  
                </div>
            </div>
            
             <!-- Socioculturel -->
            <div class="row">
                <label for="inputStrength">Socioculturel:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" id="inputSoc" placeholder="Ajouter un critère">
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-primary col-md-3" onclick="addOption('inputSoc','listSoc')">Ajouter</button>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id="listSoc" class="form-control" size="5">
                    </select>
                    
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-danger col-md-3" onclick="delOption('listSoc')">Supprimer</button>  
                </div>
            </div>
            
             <!-- Technologique -->
            <div class="row">
                <label for="inputStrength">Technologique:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" id="inputTec" placeholder="Ajouter un critère">
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-primary col-md-3" onclick="addOption('inputTec','listTec')">Ajouter</button>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id="listTec" class="form-control" size="5">
                    </select>
                    
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-danger col-md-3" onclick="delOption('listTec')">Supprimer</button>  
                </div>
            </div>

            <!-- Ecologique -->
            <div class="row">
                <label for="inputStrength">Ecologique:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" id="inputEcol" placeholder="Ajouter un critère">
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-primary col-md-3" onclick="addOption('inputEcol','listEcol')">Ajouter</button>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id="listEcol" class="form-control" size="5">
                    </select>
                    
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-danger col-md-3" onclick="delOption('listEcol')">Supprimer</button>  
                </div>
            </div>

            <!-- Légal -->
            <div class="row">
                <label for="inputStrength">Légal:</label>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <input type="text" class="form-control" id="inputLeg" placeholder="Ajouter un critère">
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-primary col-md-3" onclick="addOption('inputLeg','listLeg')">Ajouter</button>  
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 form-group">
                    <select id="listLeg" class="form-control" size="5">
                    </select>
                    
                </div>
                <div class="col-md-5">
                   <button type="button" class="btn btn-danger col-md-3" onclick="delOption('listLeg')">Supprimer</button>  
                </div>
            </div>


            <div class="row">
                <div class="form-group col-lg-6">
                   <button type="button" class="btn btn-secondary" onclick="window.location='visualiser_swot.php';">Retour au SWOT</button>
                   <input type="submit" value="Valider" />
                   <button type="button" class="btn btn-info pull-right " onclick="window.location='visualiser_pestel.php';">Visualiser le PESTEL</button>  
                </div>
            </div>
        </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
