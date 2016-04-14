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
        <font style="color: #fff">
        <?php
        include("../MasterPage/menuMaster.php");
        ?>
        <div class="container">
        <?php
            
            require '../Conexion/Datos.php';     
            $conexion = conexion();
            $usuario = $_SESSION['s_usuario'];
            $idTrabajo=$_GET['IdTrabajo'];
            
            
            $consulta= "Select t.IdTrabajo TIdTrabajo, of.DescripcionOficio OFDescripcionOficio, t.Descripcion TDescripcion,
                        concat(p.nombre,' ' ,p.ApellidoP,' ' ,p.ApellidoM)Nombre_Empleado, t.FechaPublicacion fechpublic
                        From trabajo t
                        Inner Join oficio of Inner Join empleador emple Inner Join persona p Inner Join empleado emp Inner Join Persona per
                        Where of.IdOficio = t.IdOficio AND t.IdEmpleador = emple.IdEmpleador AND p.IdPersona = emple.IdPersona 
                        AND t.IdEmpleado = emp.IdEmpleado AND per.IdPersona = emp.IdPersona AND t.IdTrabajo =".$idTrabajo.";";
            $resultado = mysql_query($consulta);
            
            ?>
        
           
            <?php
            while($fila = mysql_fetch_array($resultado)){
                ?>
        <form method="POST" action="../Modelo/modificarTrabajoCursoEmpleado.php">
        <div class="table-responsive">
                    <table class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Oficio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label style="font-weight: normal"><?php echo "$fila[OFDescripcionOficio]"; ?></label></td></tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Folio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input style="border:none" size="10" type="text" name="IdTrabajo" value='<?php echo "$fila[TIdTrabajo]"; ?>' readonly="readonly"></td>
                            </tr>
                        </tbody><thead>
                            <tr>
                                <th>Contratante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text"   style="border:none" name="Nombre_Empleador" size="50" value='<?php echo "$fila[Nombre_Empleado]"; ?>' readonly="readonly" ></td>
                            </tr>
                        </tbody>
                    
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea rows="3"  style="width:100%" type="text" name="Trabajo" readonly="readonly" ><?php echo "$fila[TDescripcion]"; ?></textarea></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Fecha Publicado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <input type="hidden" id="metodo" name="metodo" value=""/>
                                <td><input type="text"   name="Fecha_Publicacion" value='<?php echo "$fila[fechpublic]"; ?>' readonly="readonly" ></td>
                            </tr>
                        </tbody>
                    </table>
            <?php                                              
            }            
            ?>

            </div>
            
            <div class="col-sm-4 form-group">
                <button type="button"  class="btn-lg btn-danger" onclick="cancelar()">CANCELAR</button>
            </div>
            <div class="col-sm-4 form-group">
                <button type="button" value="" onclick="terminar()" class="btn-lg btn-warning" >TERMINAR</button>
            </div>
            
            <div class="col-sm-4 form-group">
                <a href="../Vista/trabajosCursoEmpleador.php"><button type="button" value="" class="btn-lg btn-primary">REGRESAR</button></a>
            </div>
            </form>
        </div>
        </font>
    </body>        
</html>
<script>
    function cancelar()
    {
      
        swal({   title: "¿Estas Seguro",   text: "Se cancelara este tabajo y nadie lo podrá ver!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, Cancelar",   cancelButtonText: "No, Regresar",   closeOnConfirm: false,   closeOnCancel: false },
        function(isConfirm)
        {   
            if (isConfirm) 
            {     
                swal("Listo!", "Trabajo Cancelado", "success");  
                document.getElementById("metodo").value="cancelar";
                document.forms[0].submit();
            }
            else
            {
               swal("Listo!", "Regreso", "success"); 
            }
        });
    }    
</script>
<script>
        function terminar()
    {
      
        swal({   title: "¿Estas Seguro",   text: "Se terminara este tabajo!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, Terminar",   cancelButtonText: "No, Regresar",   closeOnConfirm: false,   closeOnCancel: false },
        function(isConfirm)
        {   
            if (isConfirm) 
            {     
                swal("Listo!", "Trabajo Terminado", "success");  
                document.getElementById("metodo").value="terminar";
                document.forms[0].submit();
            }
            else
            {
               swal("Listo!", "Regreso", "success"); 
            }
        });
    }
</script>
