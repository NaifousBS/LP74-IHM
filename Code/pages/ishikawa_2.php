 <?php
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
            else if(msg.substring(1, 3) == 4)
            {
                addOptionFromList('listObjectifs','listNoeuds2');
            }
            else if(msg.substring(1, 3) == 5)
            {
                addOptionFromList('listNoeuds2','listObjectifs');
            }
            else if(msg.substring(1, 3) == 6)
            {
                 //var arrayOfStrings = msg.substring(1, 3).split(';');
                //alert(msg.substring(3));
               
                $("#listNoeuds2").empty();
                $("#listNoeuds2").append(msg.substring(3));

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
                        <p>Sélectionnez un objectif et une arête de niveau 1, puis cliquez sur le bouton >> pour ajouter une arête de niveau 2 </p>
                    </div>
                </div>


                <div class="row">

                <div class="col-lg-2 form-group">
                    <input name="ajoutObj" type="text" class="form-control col-lg-3" id="inputObj" placeholder="Ajouter un objectif"> 
                    <!--<label for="listObjectifs">Objectifs:</label> -->
                </div>
                <div class="col-lg-1 form-group">
                     <input type="submit" class="btn btn-success pull-right" value="+" onclick="majInputType('AjoutObj');" /> 
                </div> 
                <div class="col-lg-4 form-group">
                    <label for="listNoeuds1">Arêtes niveau 1:</label>
                </div>
                <div class="col-lg-3 form-group">
                    <label for="listNoeuds2">Arêtes niveau 2:</label>
                </div>

                </div>

                <div class="row">
                    <div class="col-lg-3 form-group">
                        <select  id ="listObjectifs" class="form-control" name="listObjectifs" size="20" onchange="selectOnChange('listObjectifs','inputObjSelect')">

                        <?php
                            $liste=listerObjectifs($connexion,1);
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

                    <div class="col-lg-3 form-group">
                        <select id ="listNoeuds1" class="form-control" name="listNoeuds" size="20" onchange="selectOnChange('listNoeuds1','inputNoeud1Select');majInputType('Noeud1Changed');envoiForm();">
                         <?php
                                $liste=listerNoeuds1($connexion,1);
                                if(!empty($liste))
                                {
                                    foreach ($liste as $noeud1) 
                                    {
                                        affichage($connexion,$noeud1);
                                    }

                                }
                               
                            ?>
                        </select>
                    </div>

                       <div class="col-sm-1">
                            <div class="row form-group ">
                                <input type="submit" class="btn btn-primary col-sm-12" onclick="majInputType('AjoutNoeud2');" value=">>"/>   
                            </div>
                            <div class="row form-group ">
                                <input type="submit" class="btn btn-danger col-sm-12" onclick="majInputType('SupprNoeud2');" value="<<"/> 
                            </div>
                        </div>

                       

                    


                    <div class="col-lg-3 form-group">
                        <select id="listNoeuds2" class="form-control" name="listNoeuds2" size="20" onchange="selectOnChange('listNoeuds2','inputNoeud2Select')">
                            <?php
                               /* $liste=listerNoeuds2($connexion,1);
                                if(!empty($liste))
                                {
                                    foreach ($liste as $noeud1) 
                                    {
                                        affichage($connexion,$noeud1);
                                    }

                                }*/
                               
                            ?>

                        </select>
                    </div>
                </div>
                <div class="row col-lg-10 form-group">
                    <button type="button" class="btn btn-info pull-right" onclick="window.location='index.php';"> Visualiser </button> <br/>
                </div>



                
            </div>
            <!-- /#page-wrapper -->

        </div>
        <input id="inputTypeAction" name="inputTypeAction" type="hidden" value=""/>
            <input id="inputObjSelect" name="inputObjSelect" type="hidden" value=""/>
            <input id="inputNoeud1Select" name="inputNoeud1Select" type="hidden" value=""/>
            <input id="inputNoeud2Select" name="inputNoeud2Select" type="hidden" value=""/>
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
