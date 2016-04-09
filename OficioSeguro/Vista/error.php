<?php
    $mensaje=""; 
    $pagina=""; 
     
    @$mensaje=$_GET["mensaje"]; 
    @$pagina=$_GET["pagina"]; 
    
    if($mensaje==""&&$pagina=="")
    {
         header('Location: ../vista/index.php');
    }
?>
<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>Error</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="registro">
           <div class="alert alert-danger">
               <h3>
                   <?php 
                        echo $mensaje;
                   ?>
               </h3>
           </div>
           
           <div class="container">
               <div align="center">
                   <img src="../Images/no-results.png" alt="" class="img-circle" align="center"/>
               </div>
               
               <div>
                   <?php 
                        echo "<a href=../vista/".$pagina."><input type='submit' name='regresar' class='btn btn-primary' value='Regresar'></a>"
                   ?> 
                </div>
           </div>
           
           
           
    </body>
            
</html>
