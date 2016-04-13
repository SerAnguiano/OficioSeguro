<script type="text/javascript">

    function validar(){
        
        if(recuperar.password.value != recuperar.password1.value){
            alert("Las contraseñas no coinciden");
            return false;           
        }
        
    }
    
</script>


<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    <center><a href="index.php"><img src="../Images/logo.png" width="250" height="250"/></a></center>
    </head>
  
    <body class="registro">

        <div class="container">
            
            <?php 
         @$errorUsuario=$_GET['errorUsuario'];
         @$mensaje=$_GET['mensaje'];
        if ($errorUsuario==1)
        {
            echo '<div class="alert alert-danger">';
               echo '<h4>'; 
               echo $mensaje;
               echo '</h4>';
           echo'</div>';
        }     
        ?>
       
            
            <h3 class="well col-lg-8">RECUPERAR CONTRASEÑA</h3>
            
            <div class="col-lg-8 well">
                <div class="row">
                    
                    <form action="../Modelo/recuperar_password.php" name="recuperar" method="post">
                 
                        <div class="col-sm-8 form-group">
                            <label>Usuario:</label>
                            <input type="text" name="user" placeholder="Escribe tu usuario aquí..." class="form-control" required="">
                        </div>
                            
                        <div class="col-sm-8 form-group">
                            <label>Nueva Contraseña:</label>
                            <input type="password" name='password' placeholder="Escribe tu contraseña nueva..." class="form-control" required="">
                        </div>
                        
                        <div class="col-sm-8 form-group">
                            <label>Confirma tu Contraseña </label>
                            <input type="password" name='password1' placeholder="Escribe la confirmación de tu contreña..." class="form-control" required="">
                        </div>
                                                
                        <div class="col-sm-6 form-group">
                            <button type="submit" class="btn-lg btn-primary" onclick="return validar();">Continuar</button>
                        </div>
                    </form>             
            </div>              
	</div>
    </body>
            
</html>
 