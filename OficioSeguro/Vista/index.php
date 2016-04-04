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
        <title>Oficio Seguro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/csslogin.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <link href='../Images/avatar.png' rel='shortcut icon' type='image/png'>
        <script src="../js/jslogin.js" type="text/javascript"></script>
        
    </head>
   
    <body>
        <div class="container">
            <?php 
         @$errorLogin=$_GET['errorLogin'];
        if ($errorLogin==1)
        {
            echo '<div class="alert alert-danger">';
               echo '<h3>'; 
               echo 'Usuario o contraseña incorrectos';
               echo '</h3>';
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
                            <form accept-charset="UTF-8" name="acceso" action="../Modelo/querys.php" method="post" role="form">;
                                
                                <fieldset>
			    	                               
                                    <div class="form-group has-feedback">

                                        <input Class="form-control required" placeholder="Usuario" name="usuario" type="text">
                                        
                                        <i class="glyphicon glyphicon glyphicon-lock form-control-feedback"></i>
			    		
                                    </div>
			    	
                                    <div class="form-group has-feedback">
			    	
                                        <input Class="form-control required" placeholder="Password" name="contrasennia" type="password" value="">
                                        
                                        <i class="glyphicon glyphicon-user form-control-feedback"></i>
                                        
                                    </div>
			    	
                                    <div class="checkbox">
			    	    	
			    	    </div>
                                    <input type="hidden" name="metodo" value="login"/>
                                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login" OnClick=""><br/>
                        
                                    <div align="center">
                            
                                        <h5>¿No tienes cuenta? Registrate ahora <a href="Registro.php">aquí</a></h5>
                        
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
            var error = 0;
            var inputs = document.getElementsByClassName('form-control required');
            for (var z = 0; z < inputs.length; z++) {
                var input = document.getElementsByName(inputs[z].name)[0];
                if (input.value == "" || input.value == "0") {
                    var formgroup = input.parentNode.parentElement;
                    formgroup.className = 'form-group has-error required';
                    error = error + 1;
                }
                else {
                    var formgroup = input.parentNode.parentElement;
                    formgroup.className = 'form-group required';
                }
            }
            if (error > 0) {
                return false;
            }
        }
       </script>
