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
        <link href="../css/css-calificacion.css" rel="stylesheet" type="text/css"/>
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
            $idTrabajo= $_GET['IdTrabajo'];
            
            
            $consulta= "Select t.IdTrabajo TIdTrabajo, of.DescripcionOficio OFDescripcionOficio, t.Descripcion TDescripcion,
                        concat(p.nombre,' ' ,p.ApellidoP,' ' ,p.ApellidoM)Nombre_Empleador, t.FechaPublicacion fechpublic,
                        (emple.CalEvaEmp + emple.TraEvaEmp + emple.PagoEvaEmp + emple.TiemEvaEmp) calificacion, p.correo correo
                        From trabajo t
                        Inner Join oficio of Inner Join empleador emple Inner Join persona p  Inner Join Persona per
                        Where of.IdOficio = t.IdOficio AND t.IdEmpleador = emple.IdEmpleador AND p.IdPersona = emple.IdPersona 
                        AND per.IdPersona = emple.IdPersona AND t.IdTrabajo =".$idTrabajo.";";
            $resultado = mysql_query($consulta);
            
            ?>
        
           
            <?php
            while($fila = mysql_fetch_array($resultado)){
                $calificacion=round($fila['calificacion']/4);
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
                                <td><input type="text"   style="border:none" name="Nombre_Empleador" size="50" value='<?php echo "$fila[Nombre_Empleador]"; ?>' readonly="readonly" ></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Calificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h3 class="clasificacion" align="center">
                                        
                                        <?php if($calificacion==5){
                                            echo '<input id="radio1" type="radio" name="estrellas" value="5" disabled checked>';  
                                        }
                                        else
                                        {
                                            echo '<input id="radio1" type="radio" name="estrellas" value="5" disabled>';  
                                        }
                                        ?>
                                        <label for="radio1">★</label>
                                        <?php if($calificacion==4){
                                            echo '<input id="radio2" type="radio" name="estrellas" value="4" disabled checked>';  
                                        }
                                        else
                                        {
                                            echo '<input id="radio2" type="radio" name="estrellas" value="4" disabled>';  
                                        }
                                        ?>
                                        <label for="radio2">★</label>
                                        <?php if($calificacion==3){
                                            echo '<input id="radio3" type="radio" name="estrellas" value="3" disabled checked>';  
                                        }
                                        else
                                        {
                                            echo '<input id="radio3" type="radio" name="estrellas" value="3" disabled>';  
                                        }
                                        ?>
                                        <label for="radio3">★</label>
                                        <?php if($calificacion==2){
                                            echo '<input id="radio4" type="radio" name="estrellas" value="2" disabled checked>';  
                                        }
                                        else
                                        {
                                            echo '<input id="radio4" type="radio" name="estrellas" value="2" disabled>';  
                                        }
                                        ?>
                                        <label for="radio4">★</label>
                                        <?php if($calificacion==1){
                                            echo '<input id="radio5" type="radio" name="estrellas" value="1" disabled checked>';  
                                        }
                                        else
                                        {
                                            echo '<input id="radio5" type="radio" name="estrellas" value="1" disabled>';  
                                        }
                                        ?>
                                        <label for="radio5">★</label>
                                    </h3>
                                </td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input size="40" type="text" style="border: none;"   name="Correo" value='<?php echo "$fila[correo]"; ?>' readonly="readonly" ></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea rows="3"  style="width:100%; border: none" type="text" name="Trabajo" readonly="readonly" ><?php echo "$fila[TDescripcion]"; ?></textarea></td>
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
                                <td><input type="text" style="border: none"  name="Fecha_Publicacion" value='<?php echo "$fila[fechpublic]"; ?>' readonly="readonly" ></td>
                            </tr>
                        </tbody>
                    </table>
            <?php                                              
            }            
            ?>

            </div>
            
            <div class="col-sm-4 form-group">
                <button type="button"  class="btn-lg btn-success" onclick="Aplicar()">APLICAR</button>
            </div>
            
            <div class="col-sm-4 form-group">
                <a href="../Vista/trabajosCursoEmpleado.php"><button type="button" value="" class="btn-lg btn-primary">REGRESAR</button></a>
            </div>
            </form>
        </div>
        </font>
    </body>        
</html>
<script>
    function Aplicar()
    {
      
        swal({   title: "¿Estas Seguro",   text: "Estas apunto de aplicar a esta  vacante!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, Aplicar",   cancelButtonText: "No, Regresar",   closeOnConfirm: false,   closeOnCancel: false },
        function(isConfirm)
        {   
            if (isConfirm) 
            {     
                swal("Listo!", "Trabajo aplicado", "success");  
                document.getElementById("metodo").value="aplicar";
                document.forms[0].submit();
            }
            else
            {
               swal("Listo!", "Regreso", "success"); 
            }
        });
    }    
</script>

