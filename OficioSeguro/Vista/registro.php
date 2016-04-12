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
             @$nombres=$_GET['nombres'];
             @$aPellidoP=$_GET['apellidoP'];
             @$apellidoM=$_GET['apellidoM'];
            if ($errorLogin==1)
            {
                echo '<div class="alert alert-danger">';
                   echo '<h4>'; 
                   echo $mensae;
                   echo '</h4>';
               echo'</div>';
            }

            ?>
                <h3 class="well col-lg-8">REGISTRO EMPLEADO</h3>

                <div class="col-lg-8 well">
                    <div class="row">
                        <form action="../Modelo/querys.php" method="POST" name="formEmpleado">

                            <div class="col-sm-8 form-group">
                                <label>Nombre(s)</label>
                                <input type="text" id="nombres" name="nombres" placeholder="Escribe tu(s) nombre(s) aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" name="apellidoP" placeholder="Escribe tu apellido paterno aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Apellido Materno</label>
                                <input type="text" name="apellidoM" placeholder="Escribe tu apellido Materno aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group" class="ui-widget">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" placeholder="Escribe tu ciudad aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group" class="ui-widget">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" name="ciudad" id="ciudad" placeholder="Escribe tu ciudad aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Teléfono</label>
                                <input type="text" name="telefono" placeholder="Escribe tu teléfono aquí..." class="form-control">		
                            </div>		

                            <div class="col-sm-6 form-group">
                                <label>Correo</label>
                                <input type="email" name="correo" placeholder="Escribe tu correo aquí..." class="form-control">
                            </div>


                            <div class="col-sm-6 form-group">
                                <label>Usuario</label>
                                <input type="text" name="usuario" placeholder="Escribe tu usuario aquí..." class="form-control">
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Contraseña</label>
                                <input type="text" name="contrasennia" placeholder="Escribe tu contraseña aquí..." class="form-control">
                            </div>


                                <div class="col-sm-6 form-group">
                                    <label for="oficioauto">Oficio 1</label>
                                    <input type="text" name="oficio1" id="oficioauto" placeholder="Escribe tu oficio aquí..." class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Habilidades Oficio 1</label>
                                    <textarea  value=" " name="habilidad1" placeholder="Escribe tus habilidades en este oficio..." rows="2" class="form-control"></textarea>
                                </div>

                            <div id="oficio2" class="primero">
                                <div class="col-sm-6 form-group">
                                    <label for="oficioauto">Oficio 2</label>
                                    <input type="text" name="oficio2" id="oficioauto2" placeholder="Escribe tu oficio aquí..." class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Habilidades Oficio 2</label>
                                    <textarea  value="" name="habilidad2" placeholder="Escribe tus habilidades en este oficio..." rows="2" class="form-control"></textarea>
                                </div>
                            </div> 

                            <div id="oficio3" class="primero">
                                <div class="col-sm-6 form-group">
                                    <label for="oficioauto">Oficio 3</label>
                                    <input type="text" name="oficio3" id="oficioauto3" placeholder="Escribe tu oficio aquí..." class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Habilidades Oficio 3</label>
                                    <textarea  value="" name="habilidad3" placeholder="Escribe tus habilidades en este oficio..." rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div id="oficio4" class="primero">
                                <div class="col-sm-6 form-group">
                                    <label for="oficioauto">Oficio 4</label>
                                    <input type="text" name="oficio4" id="oficioauto4" placeholder="Escribe tu oficio aquí..." class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Habilidades Oficio 4</label>
                                    <textarea  value="" name="habilidad4" placeholder="Escribe tus habilidades en este oficio..." rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div id="oficio5" class="primero">
                                <div class="col-sm-6 form-group">
                                    <label for="oficioauto">Oficio 5</label>
                                    <input type="text" name="oficio5" id="oficioauto5" placeholder="Escribe tu oficio aquí..." class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Habilidades Oficio 5</label>
                                    <textarea  value="" name="habilidad5" placeholder="Escribe tus habilidades en este oficio..." rows="2" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <i type="button" onclick="agregar_caja()" class="glyphicon glyphicon-plus-sign btn-circle"><label class="">Agregar oficio</label></i>
                            </div>
                            <input type="hidden" name="metodo" value="registroEmpleado"/>
                            <input type="hidden" id="oficios" name="oficios" value="1"/>
                            <div class="col-sm-6 form-group">
                                <button type="button" class="btn-lg btn-primary" onclick="verificar_campos()">Registrarme</button>
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
        $( "#estado" ).autocomplete
        ({
            source: '../Modelo/buscarEstado.php'
        });
    }
    );
    $(function() 
    {
        $( "#ciudad" ).autocomplete
        ({
            source: '../Modelo/buscarCiudad.php'
        });
    }
    );
    
    $(function() 
    {
        $( "#oficioauto" ).autocomplete
        ({
            source: '../Modelo/buscarOficios.php'
        });
    }
    );
    
     $(function() 
    {
        $( "#oficioauto2" ).autocomplete
        ({
            source: '../Modelo/buscarOficios.php'
        });
    }
    );
    
    $(function() 
    {
        $( "#oficioauto3" ).autocomplete
        ({
            source: '../Modelo/buscarOficios.php'
        });
    }
    );
    
    $(function() 
    {
        $( "#oficioauto4" ).autocomplete
        ({
            source: '../Modelo/buscarOficios.php'
        });
    }
    );
   
   $(function() 
    {
        $( "#oficioauto5" ).autocomplete
        ({
            source: '../Modelo/buscarOficios.php'
        });
    }
    ); 
 </script>
 
 <script>
var oficios=2;
function agregar_caja(){
     
    if(oficios<=5)
    {
        document.getElementById("oficio"+oficios+"").className='';
         document.getElementById("oficios").value=oficios;
        oficios=oficios+1;
       
    }
    else
    {
        swal("Oops...", "Solo se permiten dar de alta 5 oficios", "warning");
        
    }

}
</script>

<script>

function verificar_campos(){
    
    var nombres = document.forms[0].nombres.value.length;
    var apellidoP = document.forms[0].apellidoP.value.length;
    var apellidoM = document.forms[0].apellidoM.value.length;
    var estado = document.forms[0].estado.value.length;
    var ciudad = document.forms[0].ciudad.value.length;
    var telefono = document.forms[0].telefono.value.length;
    var correo = document.forms[0].correo.value.length;
    var usuario = document.forms[0].usuario.value.length;
    var contrasenia = document.forms[0].contrasennia.value.length;
    var oficio1 = document.forms[0].oficio1.value.length;
    var habilidad1 = document.forms[0].habilidad1.value.length;
    var oficio2 = document.forms[0].oficio2.value.length;
    var habilidad2 = document.forms[0].habilidad2.value.length;
    var oficio3 = document.forms[0].oficio3.value.length;
    var habilidad3 = document.forms[0].habilidad3.value.length;
    var oficio4 = document.forms[0].oficio4.value.length;
    var habilidad4 = document.forms[0].habilidad4.value.length;
    var oficio5 = document.forms[0].oficio5.value.length;
    var habilidad5 = document.forms[0].habilidad5.value.length;
    
    if(nombres==0||apellidoP==0||apellidoM==0||estado==0||ciudad==0||telefono==0||correo==0||usuario==0||contrasenia==0) 
    {
        
        swal("Oops...", "Todos los campos son obligatorios ", "error");
        return false;
    }
    else
    {
        if((oficios-1)==1)
        {
            if(oficio1==0||habilidad1==0)
            {
                swal("Oops...", "Debes ingresar el oficio y la habilidad de los oficios seleccionados", "error");
                return false;
            }
            else
            {
                document.forms[0].submit();
            }
        }
        if((oficios-1)==2)
        {
            if(oficio1==0||habilidad1==0||oficio2==0||habilidad2==0)
            {
                swal("Oops...", "Debes ingresar el nombre y la habilidad de los oficios seleccionados", "error");
                return false;
            }
            else
            {
                document.forms[0].submit();
            }
        }
        if((oficios-1)==3)
        {
            if(oficio1==0||habilidad1==0||oficio2==0||habilidad2==0
                        ||oficio3==0||habilidad3==0)
            {
                swal("Oops...", "Debes ingresar el nombre y la habilidad de los oficios seleccionados", "error");
                return false;
            }
            else
            {
                document.forms[0].submit();
            }
        }
        if((oficios-1)==4)
        {
            if(oficio1==0||habilidad1==0||oficio2==0||habilidad2==0
                        ||oficio3==0||habilidad3==0||oficio4==0||habilidad4==0)
            {
                swal("Oops...", "Debes ingresar el nombre y la habilidad de los oficios seleccionados", "error");
                return false;
            }
            else
            {
                document.forms[0].submit();
            }
        }
        if((oficios-1)==5)
        {
            if(oficio1==0||habilidad1==0||oficio2==0||habilidad2==0
                        ||oficio3==0||habilidad3==0||oficio4==0||habilidad4==0
                        ||oficio5==0||habilidad5==0)
            {
                swal("Oops...", "Debes ingresar el nombre y la habilidad de los oficios seleccionados", "error");
                return false;
            }
            else
            {
                document.forms[0].submit();
            }
        }
        
        document.forms[0].submit();
    }
}
</script>

