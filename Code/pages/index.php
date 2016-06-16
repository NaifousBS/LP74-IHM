<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ISHIKAWA - Outil d'environnement d'étude stratégique</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

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
                    <h1 class="page-header" style="font-size: 20px; color: blue"><i class="fa fa-bar-chart" aria-hidden="true"></i> Bienvenue dans votre outil d'environnement d'étude stratégique <i class="fa fa-line-chart" aria-hidden="true"></i></h1>
                </div>
            </div>

                <div class="row">
                    <div class="col-md-4">
                        <img src="../img/1.png" class="img-thumbnail">
                    </div>
                    <div class="col-md-4">
                        <img src="../img/2.png" class="img-thumbnail">
                    </div>
                    <div class="col-md-4">
                        <img src="../img/3.png" class="img-thumbnail">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-sm-8">
                        <h2><span class="label label-primary">Pour commencer, créez votre projet</span></h2>                        
                    </div>
                </div>

                <form action="traitement_creationProjet.php" method="post">
                <div class="row" style="margin-top: 20px">
                    
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nomProjet" name="nomProjet" placeholder="Nom de votre projet"/>
                        </div>
                        <div class="col-sm-4">
                            <input type="submit" class="btn btn-primary" value="Valider" />
                        </div>
                    
                </div>
                </form>
                <div class="row">
                    <div class="col-sm-8">
                        <h2><span class="label label-primary">ou chargez un projet dans la liste</span></h2>                        
                    </div>
                </div>
                <div class="row" style="margin-top: 20px; margin-left: 40px;">
                    <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Chargez un projet
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Projet1</a></li>
                            <li><a href="#">Projet2</a></li>
                            <li><a href="#">Projet3</a></li>
                          </ul>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <style>
    img.img-thumbnail{
        width: 150px;
        height: 150px;
        border-radius:20px;
        border: 1px solid blue;
    }
    </style>

</body>

</html>
