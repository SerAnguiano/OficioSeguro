<?php
    session_start();

    //Si  hay sesión iniciada  se regresa  a inicio
    if ($_SESSION)
    {
 
        header('Location: ../vista/inicio.php');
    }
   

?>
<html>
    <head>
        <title>MORLOM</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/csslogin.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
        <script src="../js/jslogin.js" type="text/javascript"></script>
        <script src="../js/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="../css/sweetalert.css">
    </head>
   
    <body>
        <div class="container">
            <?php 
         @$errorLogin=$_GET['errorLogin'];
         @$mensae=$_GET['mensaje'];
        if ($errorLogin==1)
        {
            echo '<div class="alert alert-danger">';
               echo '<h4>'; 
               echo $mensae;
               echo '</h4>';
           echo'</div>';
        }
        
        ?>
           
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        
			<div class="panel-heading">
                            <h3 class="panel-title">MORLOM</h3>
		 	</div>
                        
                        <div class="panel-heading">
                            
                            <div align='center' class="row-fluid user-row">
                                <img  src="../Images/logo.png"  class="img-responsive" alt="Conxole Admin"/>
                            </div>
                            
                        </div>
                  	<div class="panel-body">
                            <form accept-charset="UTF-8" name="acceso" action="../Modelo/querys.php" method="post" role="form" onsubmit="Validar()">;
                                
                                <fieldset>
			    	                               
                                    <div class="form-group has-feedback">

                                        <input Class="form-control required" placeholder="Usuario" name="usuario" type="text">
                                        
                                        <i class="glyphicon glyphicon glyphicon-lock form-control-feedback"></i>
			    		
                                    </div>
			    	
                                    <div class="form-group has-feedback">
			    	
                                        <input Class="form-control required" placeholder="Contraseña" name="contrasennia" type="password" value="">
                                        
                                        <i class="glyphicon glyphicon-user form-control-feedback"></i>
                                        
                                    </div>
			    	
                                    <div class="checkbox">
			    	    	
			    	    </div>
                                    <input type="hidden" name="metodo" value="login"/>
                                    <input class="btn btn-lg btn-primary btn-block" type="button" value="Entrar" OnClick="Validar()"><br/>
                        
                                    <div align="center">
                            
                                        <h5>¿No tienes cuenta? Registrate ahora <a href="../Vista/eligeRegistro.php">aquí</a></h5>
                        
                                    </div>
                                    <div align="center">
                            
                                        <h5>¿Olvidaste tu contraseña? <a href="recuperarPassword.php">aquí­</a></h5>
                        
                                    </div>
                                   
                                </fieldset>
			      	
                            </form>
                                    
                        </div>
			
                    </div>
		
                </div>
	
            </div>

        </div>
    </body>
</html>

<script>

function Validar() {
    var usuario = document.forms[0].usuario.value.length;
    var contrasennia = document.forms[0].contrasennia.value.length;
    
    if(usuario==0||contrasennia==0) 
    { 
        swal("Oops...", "Debes ingresar usuario y contraseña para entrar ", "error");
        return false;
    }
    else
    {
        document.forms[0].submit();
    }
}
</script>
