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

</head>

<body>

    <div id="wrapper">
        
           <?php include('navbar.inc.php'); ?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">SWOT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Forces
                        </div>
                        <div class="panel-body">
                             <?php
                                $liste=listerSwot($connexion,$_SESSION['id_swot'],'Force');
                                if(!empty($liste))
                                {
                                   foreach ($liste as $donnee) 
                                    {
                                        affichePanel($connexion,$donnee);
                                    }
                                }
                            
                             ?>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Faiblesses
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerSwot($connexion,$_SESSION['id_swot'],'Faiblesse');
                                if(!empty($liste))
                                {
                                   foreach ($liste as $donnee) 
                                    {
                                        affichePanel($connexion,$donnee);
                                    }
                                }
                            
                             ?>
                        </div>
                        
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Opportunités
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerSwot($connexion,$_SESSION['id_swot'],'Opportunite');
                                if(!empty($liste))
                                {
                                   foreach ($liste as $donnee) 
                                    {
                                        affichePanel($connexion,$donnee);
                                    }
                                }
                            
                             ?>
                        </div>
                        
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            Menaces
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerSwot($connexion,$_SESSION['id_swot'],'Menace');
                                if(!empty($liste))
                                {
                                   foreach ($liste as $donnee) 
                                    {
                                        affichePanel($connexion,$donnee);
                                    }
                                }
                            
                             ?>                        
                         </div>
                        
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <div class="row">
                <div class="form-group col-lg-8">
                    <button type="button" class="btn btn-secondary pull-left " onclick="window.location='construire_swot.php';">Modifier le SWOT</button>  
                   <button type="button" class="btn btn-info pull-right " onclick="window.location='construire_pestel.php';">Passer au PESTEL</button>  
                </div>
            </div>
            
            
            
        
            <!-- /.row -->
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

</body>

</html>
