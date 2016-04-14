<html>
<head>
        
        <link href="../css/bootstrap-6.css" rel="stylesheet" type="text/css"/>
        <link href="../css/dataTable-Bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.12.0.js" type="text/javascript"></script>
        <script src="../js/jquery-table.js" type="text/javascript"></script>
        <script src="../js/bootstrap-tabla.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="../js/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="../css/sweetalert.css">
        <title>Trabajos en curso</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
        
    </head>
       
       
        
    <body class="principal">
        

        <?php   
            include("../MasterPage/menuMaster.php");        
        ?>
        
  
        <div class="container">
        <?php
            @$errorUsuario=$_GET['errorUsuario'];
            @$mensaje=$_GET['mensaje'];
            @$nombres=$_GET['nombres'];
            @$aPellidoP=$_GET['apellidoP'];
            @$apellidoM=$_GET['apellidoM'];
        
            
             if ($errorUsuario==1)
            {
                echo '<div class="alert alert-danger">';
                echo '<h4>'; 
                echo $mensaje;
                echo '</h4>';
                echo'</div>';
            }
            
            if ($errorUsuario==2)
            {
                echo '<div class="alert alert-success">';
                echo '<h4>'; 
                echo $mensaje;
                echo '</h4>';
                echo'</div>';
            }
           
        ?>
             <h3 class="well col-lg-8">OFRECER EMPLEO</h3>

                <div class="col-lg-8 well">
                    <div class="row">
                        <form action="../Modelo/insertarOficio.php" method="POST" name="formEmpleado">

                           
                            <div class="col-sm-8 form-group">
                                <label>Oficio a solicitar</label>
                                <input type="text" id="oficioauto" name="oficio" placeholder="Escribe tu oficio aquí..." class="form-control" required="">
                            </div>

                            <div class="col-sm-8 form-group" >
                                <label>Descripción del trabajo a realizar</label>
                                <input type="text-area" name="descripcion" placeholder="Escribe una descripcion aquí..." class="form-control" required="">
                            </div>
                            
                            
                            <div class="col-sm-6 form-group">
                                <input type="submit" value="REGISTRAR" class="btn-lg btn-primary"/>
                            </div>

                        </form>
                    </div>
            </div>
    </body>
</html>
<script>
    
    $(function() 
    {
        $( "#oficioauto" ).autocomplete
        ({
            source: '../Modelo/buscarOficios.php'
        });
    }
    );
    
</script>




