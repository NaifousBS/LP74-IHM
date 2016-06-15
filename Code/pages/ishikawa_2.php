<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mes objectifs niveau 1</title>

    
    <link href="../css/monStyle.css" rel="stylesheet">
    
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

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Environnement d'étude stratégique </a>
            </div>
            <!-- /.navbar-header -->

                

            <?php include('navbar.inc.php'); ?> 
            <!-- /.navbar-static-side -->
        </nav>
        

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">Construction du diagramme Ishikawa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row form-group">
                <div class="col-lg-8 ">
                    <p>Sélectionnez un objectif et une arête de niveau 1, puis cliquez sur le bouton Ajouter pour ajouter une arête de niveau 2 </p>
                </div>
            </div>
            
           
            <div class="row">
            
            <div class="col-lg-3 form-group">
                <input type="text" class="form-control col-lg-3" id="inputObj" placeholder="Ajouter un nouvel objectif">
            </div>
            <div class="col-lg-1 form-group">
                 <button type="button" class="btn btn-success pull-right"> + </button> 
            </div>
                <div class="col-lg-4 form-group">
                    <label for="listNoeuds">Arêtes:</label>
                </div>
            
            </div>
            <div class="row">
                <div class="col-lg-4 form-group">
                    <select  class="form-control" name="listObjectifs" size="20">
                        <option>text1</option>
                        <option>text2</option>
                        <option>text3</option>
                        <option>text4</option>
                        <option>text5</option>
                    </select>
                </div>
                
                <div class="col-lg-4 form-group">
                    <select  class="form-control" name="listNoeuds" size="20">
                        <option class="gras">text1</option>
                        <option>&nbsp;&nbsp;&nbsp;text2</option>
                        <option class="gras">text3</option>
                        <option>&nbsp;&nbsp;&nbsp;text4</option>
                        <option>&nbsp;&nbsp;&nbsp;text5</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <div class="row form-group ">
                        <button type="button" class="btn btn-primary col-sm-12"> Ajouter </button> <br/>
                    </div>
                    <div class="row form-group ">
                        <button type="button" class="btn btn-danger col-sm-12"> Retirer </button> 
                    </div>
                </div>
            </div>
            <div class="row col-lg-8 form-group">
                <button type="button" class="btn btn-info pull-right" onclick="window.location='index.php';"> Valider </button> <br/>
            </div>
            
            
           
        
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
