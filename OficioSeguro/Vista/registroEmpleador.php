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
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>Registro</title>
        <meta charset="UTF-8">
        <script src="../js/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="../css/sweetalert.css">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="registro" onload="elegir()">
        <div class="container">
                 <?php 
             @$errorLogin=$_GET['errorRegistro'];
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
                <h3 class="well col-lg-8">REGISTRO EMPLEADOR</h3>

                <div class="col-lg-8 well">
                    <div class="row">
                        <form action="../Modelo/querys.php" method="POST" name="formEmpleador">

                            <div class="col-sm-8 form-group">
                                <label>Nombre(s)</label>
                                <input type="text" id="nombres" name="nombresE" placeholder="Escribe tu(s) nombre(s) aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" name="apellidoPE" placeholder="Escribe tu apellido paterno aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Apellido Materno</label>
                                <input type="text" name="apellidoME" placeholder="Escribe tu apellido Materno aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group" class="ui-widget">
                                <label for="estadoE">Estado</label>
                                <input type="text" name="estadoE" id="estadoE" placeholder="Escribe tu ciudad aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group" class="ui-widget">
                                <label for="ciudadE">Ciudad</label>
                                <input type="text" name="ciudadE" id="ciudadE" placeholder="Escribe tu ciudad aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Teléfono</label>
                                <input type="text" name="telefonoE" placeholder="Escribe tu teléfono aquí..." class="form-control">		
                            </div>		

                            <div class="col-sm-6 form-group">
                                <label>Correo</label>
                                <input type="email" name="correoE" placeholder="Escribe tu correo aquí..." class="form-control">
                            </div>


                            <div class="col-sm-6 form-group">
                                <label>Usuario</label>
                                <input type="text" name="usuarioE" placeholder="Escribe tu usuario aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Contraseña</label>
                                <input type="text" name="contrasenniaE" placeholder="Escribe tu contraseña aquí..." class="form-control">
                            </div>
                            <input type="hidden" name="metodo" value="registroEmpleador"/>
                            
                            <div class="col-sm-6 form-group">
                                <button type="button" nme="btnEmpleador" class="btn-lg btn-primary" onclick="verificar_campos()">Registrarme</button>
                            </div>
                        </form> 

                    </div>
                    <h5>¿Ya tienes cuenta? Inicia sesión <a href="index.php">aquí</a></h5>
                </div>
            </div>
    </body>
    
</html>

<script>
     $(function() 
    {
        $( "#estadoE" ).autocomplete
        ({
            source: '../Modelo/buscarEstado.php'
        });
    }
    );
	     $(function() 
    {
        $( "#ciudadE" ).autocomplete
        ({
            source: '../Modelo/buscarCiudad.php'
        });
    }
    );
function verificar_campos(){

    var nombresE = document.forms[0].nombresE.value.length;
    var apellidoPE = document.forms[0].apellidoPE.value.length;
    var apellidoME = document.forms[0].apellidoME.value.length;
    var estadoE = document.forms[0].estadoE.value.length;
    var ciudadE = document.forms[0].ciudadE.value.length;
    var telefonoE = document.forms[0].telefonoE.value.length;
    var correoE = document.forms[0].correoE.value.length;
    var usuarioE = document.forms[0].usuarioE.value.length;
    var contraseniaE = document.forms[0].contrasenniaE.value.length;
    
    if(nombresE==0||apellidoPE==0||apellidoME==0||estadoE==0||ciudadE==0||telefonoE==0||correoE==0||usuarioE==0||contraseniaE==0) 
    {
        swal("Oops...", "Todos los campos son obligatorios ", "error");
        return false;
    }
    else
    {
         document.forms[0].submit();
    }
    }
</script>

 