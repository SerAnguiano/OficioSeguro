<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    </head>
  
    <body class="registro">

        <div class="container">
            <h3 class="well col-lg-8">REGISTRO</h3>
            <div class="col-lg-8 well">
                <div class="row">
                    <form action="inicio.php">
                 
                        <div class="col-sm-8 form-group">
                            <label>Nombre(s)</label>
                            <input type="text" placeholder="Escribe tu(s) nombre(s) aquí..." class="form-control">
                        </div>
                            
                        <div class="col-sm-6 form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" placeholder="Escribe tu apellido paterno aquí..." class="form-control">
                        </div>
                        
                        <div class="col-sm-6 form-group">
                            <label>Apellido Materno</label>
                            <input type="text" placeholder="Escribe tu apellido Materno aquí..." class="form-control">
                        </div>
                        
                        <div class="col-sm-6 form-group" class="ui-widget">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" placeholder="Escribe tu ciudad aquí..." class="form-control">
                        </div>
                        
                        <div class="col-sm-6 form-group" class="ui-widget">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" id="ciudad" placeholder="Escribe tu ciudad aquí..." class="form-control">
                        </div>
                        
                        <div class="col-sm-6 form-group">
                            <label>Teléfono</label>
                            <input type="text" placeholder="Escribe tu teléfono aquí..." class="form-control">		
                        </div>		

                        <div class="col-sm-6 form-group">
                            <label>Correo</label>
                            <input type="email" placeholder="Escribe tu correo aquí..." class="form-control">
                        </div>
                        
                        
                        <div class="col-sm-6 form-group">
                            <label>Usuario</label>
                            <input type="text" placeholder="Escribe tu usuario aquí..." class="form-control">
                        </div>
                        
                        <div class="col-sm-6 form-group">
                            <label>Contraseña</label>
                            <input type="text" placeholder="Escribe tu contraseña aquí..." class="form-control">
                        </div>
                        
                        <div class="col-sm-6 form-group">
                            <button type="submit" class="btn-lg btn-primary">Registrarme</button>					
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
</script>