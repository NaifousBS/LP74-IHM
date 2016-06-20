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
    <script src="http://code.jquery.com/jquery-1.10.1.min.js" ></script>
    <script>
    $(document).ready(function(){
    $("form").on('submit',function(event){
    event.preventDefault();
        data = $(this).serialize();

        $.ajax({
        type: "GET",
        url: "ajoutObj.php",
        data: data
        }).done(function( msg ) {
            
            if(msg.substring(1, 3) == 1)
            {
                document.getElementById('inputObj').value='';
                $("#listObjectifs").append(msg);
            }
            else if(msg.substring(1, 3) == 2)
            {
                addOptionFromList('listObjectifs','listNoeuds');
            }
            else if(msg.substring(1, 3) == 3)
            {
                addOptionFromList('listNoeuds','listObjectifs');
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
                    <h1 class="page-header">Construction du diagramme Ishikawa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row form-group">
                <div class="col-lg-8 ">
                    <p>Choisir les objectifs qui se retrouveront dans les arêtes de premier niveau dans le diagramme d'Ishikawa</p>
                </div>
            </div>
            
            
            <div class="row">
            
            <div class="col-lg-3 form-group">
                <input name="ajoutObj" type="text" class="form-control col-lg-3" id="inputObj" placeholder="Ajouter un nouvel objectif">
            </div>
            <div class="col-lg-1 form-group">
                 <input type="submit" class="btn btn-success pull-right" value="+" onclick="majInputType('AjoutObj');" />
            </div>
                <div class="col-sm-1">
                    
                </div>
                <div class="col-lg-4 form-group">
                    <label for="listNoeuds">Arêtes niveau 1:</label>
                </div>
            
            </div>
            <div class="row">
                <div class="col-lg-4 form-group">
                    <select  id ="listObjectifs" class="form-control" name="listObjectifs" size="20" onchange="selectOnChange('listObjectifs','inputObjSelect')">

                        <?php
                            $liste=listerObjectifs($connexion,$_SESSION['id_ichikawa']);
                            if(!empty($liste))
                            {
                               foreach ($liste as $objectif) 
                                {
                                    affichage($connexion,$objectif);
                                }
                            }
                            
                        ?>

                    </select>
                </div>
                <div class="col-sm-1">
                    <div class="row form-group ">
                        <input type="submit" class="btn btn-primary col-sm-12" onclick="majInputType('AjoutArete');" value=">>"/>   
                    </div>
                    <div class="row form-group ">
                        <input type="submit" class="btn btn-danger col-sm-12" onclick="majInputType('SupprArete');" value="<<"/> 
                    </div>
                </div>
                <div class="col-lg-4 form-group">
                    <select id ="listNoeuds" class="form-control" name="listNoeuds" size="20" onchange="selectOnChange('listNoeuds','inputNoeud1Select')">
                     <?php
                            $liste=listerNoeuds1($connexion,$_SESSION['id_ichikawa']);
                            if(empty($liste)==true)
                            {
                               
                            }
                            else
                            {
                                foreach ($liste as $noeud1) 
                                {
                                    affichage($connexion,$noeud1);
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row col-lg-9 form-group">
                <button type="button" class="btn btn-secondary" onclick="window.location='visualiser_pestel.php';">Retour au PESTEL</button>
                <button type="button" class="btn btn-info pull-right" onclick="window.location='ishikawa_2.php'"> Choisir arêtes 2 </button> <br/>
            </div>
            
            
            <input id="inputTypeAction" name="inputTypeAction" type="hidden" value=""/>
            <input id="inputObjSelect" name="inputObjSelect" type="hidden" value=""/>
            <input id="inputNoeud1Select" name="inputNoeud1Select" type="hidden" value=""/>
        
        </div>
        <!-- /#page-wrapper -->

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
    <script src="../js/monScript.js"></script>
    
</body>

</html>
