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

    <title>Diagramme Ishikawa</title>

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
    
    <script src="../js/go.js"></script>
  <link href="../css/goSamples.css" rel="stylesheet" type="text/css" />  <!-- you don't need to use this -->
  <script src="../js/goSamples.js"></script>  <!-- this is only for the GoJS Samples framework -->
  <script src="../js/FishboneLayout.js"></script>
    
    <?php
    echo
        '<script id="code">
    function init() {

      var $ = go.GraphObject.make;  // for conciseness in defining templates

      myDiagram =
        $(go.Diagram, "myDiagramDiv",  // refers to its DIV HTML element by id
          { isReadOnly: true });  // do not allow the user to modify the diagram

      // define the normal node template, just some text
      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          $(go.TextBlock,
            new go.Binding("text"),
            new go.Binding("font", "", convertFont))
        );

      function convertFont(data) {
        var size = data.size;
        if (size === undefined) size = 13;
        var weight = data.weight;
        if (weight === undefined) weight = "";
        return weight + " " + size + "px sans-serif";
      }

      // This demo switches the Diagram.linkTemplate between the "normal" and the "fishbone" templates.
      // If you are only doing a FishboneLayout, you could just set Diagram.linkTemplate
      // to the template named "fishbone" here, and not switch templates dynamically.

      // define the non-fishbone link template
      myDiagram.linkTemplateMap.add("normal",
        $(go.Link,
          { routing: go.Link.Orthogonal, corner: 4 },
          $(go.Shape)
        ));

      // use this link template for fishbone layouts
      myDiagram.linkTemplateMap.add("fishbone",
        $(FishboneLink,  // defined above
          $(go.Shape)
        ));

      // here is the structured data used to build the model
      var json =

           
           ';
    
        $listeNoeud0=listerNoeuds0($connexion,1);
        if(!empty($listeNoeud0))
        {
            foreach ($listeNoeud0 as $noeud0) 
            {
               echo' { "text":"'.$noeud0[1].'", "size":18, "weight":"Bold", ';
            }

        }
    
                            $liste=listerNoeuds1($connexion,1);
                            if(!empty($liste))
                            {
                                echo ' "causes":[';
                               foreach ($liste as $noeud1) 
                                {
                                   echo ' { "text":"'.$noeud1[1].'", "size":14, "weight":"Bold"';
                                    
                                   $listeNoeud2 = listerNoeuds2AvecParent($connexion,1, $noeud1[0]);
                                   
                                   
                                    if(!empty($listeNoeud2))
                                    {
                                        echo ', 
                                        "causes":[';
                                        
                                        foreach ($listeNoeud2 as $noeud2) 
                                        {
                                           echo' { "text":"'.$noeud2[1].'" },';
                                        }
                                        
                                        echo ']';

                                    }
                                   
                                   echo' 
                                    },';
                                }
                                
                                echo ' ] ';
                            }
                            
                        
        
               /*
                        { "text":"Arete 2" },
                        { "text":"Arete 2" }*/
                    
                
        
    
        echo '

           
        };

      function walkJson(obj, arr) {
        var key = arr.length;
        obj.key = key;
        arr.push(obj);

        var children = obj.causes;
        if (children) {
          for (var i = 0; i < children.length; i++) {
            var o = children[i];
            o.parent = key;  // reference to parent node data
            walkJson(o, arr);
          }
        }
      }

      // build the tree model
      var nodeDataArray = [];
      walkJson(json, nodeDataArray);
      myDiagram.model = new go.TreeModel(nodeDataArray);

      layoutFishbone();
    }

    // use FishboneLayout and FishboneLink
    function layoutFishbone() {
      myDiagram.startTransaction("fishbone layout");
      myDiagram.linkTemplate = myDiagram.linkTemplateMap.getValue("fishbone");
      myDiagram.layout = go.GraphObject.make(FishboneLayout, {  // defined above
        angle: 180,
        layerSpacing: 10,
        nodeSpacing: 20,
        rowSpacing: 10
      });
      myDiagram.commitTransaction("fishbone layout");
    }

    // make the layout a branching tree layout and use a normal link template
    function layoutBranching() {
      myDiagram.startTransaction("branching layout");
      myDiagram.linkTemplate = myDiagram.linkTemplateMap.getValue("normal");
      myDiagram.layout = go.GraphObject.make(go.TreeLayout, {
        angle: 180,
        layerSpacing: 20,
        alignment: go.TreeLayout.AlignmentBusBranching
      });
      myDiagram.commitTransaction("branching layout");
    }

    // make the layout a basic tree layout and use a normal link template
    function layoutNormal() {
      myDiagram.startTransaction("normal layout");
      myDiagram.linkTemplate = myDiagram.linkTemplateMap.getValue("normal");
      myDiagram.layout = go.GraphObject.make(go.TreeLayout, {
        angle: 180,
        breadthLimit: 1000,
        alignment: go.TreeLayout.AlignmentStart
      });
      myDiagram.commitTransaction("normal layout");
    }
  </script>
      ';
      ?>

</head>

<body onload="init()">

    <div id="wrapper">
        
           <?php include('navbar.inc.php'); ?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ishikawa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                
                      <div id="myDiagramDiv" style="height:550px;width:100%;border:1px solid black;"></div>
                      <div id="buttons">
                        <label>Layout:</label>
                        <button onclick="layoutFishbone()">Fishbone</button>
                        <button onclick="layoutBranching()">Branching</button>
                        <button onclick="layoutNormal()">Normal</button>
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
