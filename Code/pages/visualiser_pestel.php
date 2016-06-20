<?php
session_start();
require_once 'connexion_bdd.php';
include('bibliotheque_fonctions.php');

?>

<?php

if(!empty($_POST)){
  $req = $bdd->prepare('INSERT INTO donnees(id_donnees, id_ichikawa, id_swot, id_pestel, intitulé, contenu, noeud) VALUES(:id_donnees, :id_ichikawa, :id_swot, :id_pestel, :intitulé, :contenu, :noeud)');
    $req->execute(array(
        'id_donnees' => $id_donnees,
        'id_ichikawa' => $id_ichikawa,
        'id_swot' => $id_swot,
        'id_pestel' => $id_pestel,
        'intitulé' => $intitulé,
        'contenu' => $contenu,
        'noeud' => $noeud
        ));

    echo 'Ajout du PESTEL!';  
    
}
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
                <div class="col-lg-12">
                    <h1 class="page-header">PESTEL</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <!-- Politique -->
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Politique
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerPestel($connexion,$_SESSION['id_swot'],'Politique');
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

                <!-- Economique -->
                <div class="col-lg-offset-4 col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Economique
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerPestel($connexion,$_SESSION['id_swot'],'Economique');
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
            </div>

                <div class="row">
                <!-- SocioCulturel -->
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            SocioCulturel
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerPestel($connexion,$_SESSION['id_swot'],'SocioCulturel');
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
                
                <!-- Nom projet -->
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Titre
                        </div>
                        <div class="panel-body">
                            <p>Titre du diagramme PESTEL</p>
                        </div>
                    </div>
                </div>

                <!-- Technologique -->
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Technologique
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerPestel($connexion,$_SESSION['id_swot'],'Technologique');
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
            </div>
            <div class="row">
                <!-- Ecologique -->
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Ecologique
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerPestel($connexion,$_SESSION['id_swot'],'Ecologique');
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
                <!-- Légal -->
                <div class="col-lg-offset-4 col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Légal
                        </div>
                        <div class="panel-body">
                            <?php
                                $liste=listerPestel($connexion,$_SESSION['id_swot'],'Legal');
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
            </div>
            
            <div class="row">               
                    <button type="button" class="btn btn-secondary pull-left" onclick="window.location='construire_pestel.php';">Modifier le PESTEL</button>  
                   <button type="button" class="btn btn-info pull-right" onclick="window.location='ishikawa_1.php';">Passer au ISHIKAWA</button>                  
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
<style>

</style>
</html>
