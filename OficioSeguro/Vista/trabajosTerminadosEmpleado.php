<html>
    <head>
        <link href="../css/bootstrap-6.css" rel="stylesheet" type="text/css"/>
        <link href="../css/dataTable-Bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.12.0.js" type="text/javascript"></script>
        <script src="../js/jquery-table.js" type="text/javascript"></script>
        <script src="../js/bootstrap-tabla.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>Trabajos en curso</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
        
    </head>
  
    <body class="principal">
        
        <?php
            include("../MasterPage/menuMaster.php");
            require '../Conexion/Datos.php';     
            $conexion = conexion();
            $usuario = $_SESSION['s_usuario'];
            $idPersona = $_SESSION['s_IdPersona'];
            
            
            $consulta= "Select t.FechaPublicacion FP, t.FechaTermino FT,t.Descripcion Des, t.IdTrabajo TIdTrabajo, of.DescripcionOficio OFDescripcionOficio, t.Descripcion TDescripcion,
                        concat(p.nombre,' ',p.ApellidoP)Nombre_Empleador
                        From trabajo t
                        Inner Join oficio of Inner Join empleador emple Inner Join persona p Inner Join empleado emp Inner Join Persona per
                        Where of.IdOficio = t.IdOficio AND t.IdEmpleador = emple.IdEmpleador AND p.IdPersona = emple.IdPersona 
                        AND t.IdEmpleado = emp.IdEmpleado AND per.IdPersona = emp.IdPersona AND per.usuario like '".$usuario."' AND t.IdEstatusTrabajo = 3 OR t.IdEstatusTrabajo = 4;";
            $resultado = mysql_query($consulta);
            
            ?>
        <div class="container">
             <div class=container well col-lg-8 col-lg-offset-2>
                <h1 class=well col-lg-8 col-lg-offset-2 ><strong>Trabajos Finalizados</strong></h1>
             </div>
            <br>
            <br>
           <div class="table-responsive">
               <font style="color: #fff">
               <table id="example" class="table table-hover" cellspacing="0" width="100%">
                   <thead>
                            <tr>
                                <th>Fecha Publicacion</th>
                                <th>Fecha Terminado</th>
                                <th>Descripcion</th>
                                <th>Detalle</th>
                            </tr>
                    </thead>
                    <tfoot>
                            <tr>
                                <th>Fecha Publicacion</th>
                                <th>Fecha Terminado</th>
                                <th>Descripcion</th>
                                <th>Detalle</th>
                            </tr>
                    </tfoot>

            <?php
            
            
            while($fila = mysql_fetch_array($resultado)){
                $IdTrabajo=$fila['TIdTrabajo'];
                ?>
                        <tbody>
                            <tr>
                                <td><input type="text" style="border:none;" value='<?php echo "$fila[FP]"; ?>'></td>
                                <td><input type="text" style="border:none;" size="10" name="IdTrabajo" value='<?php echo "$fila[FT]"; ?>' readonly="readonly"></td>
                                <td><label><?php echo "$fila[Des]"; ?></label></td>
                                <?php echo "<td><a href='detallesTrabajoTerminadoEmpleado.php?IdTrabajo=".$IdTrabajo."'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
                            </tr>
                        </tbody>
            <?php 
            }            
            ?>
                   
               </table>
        </font>
        </div>
        </div>
    </body>
            
</html>
<script type="text/javascript" class="init">
	
        $(document).ready(function() {
                $('#example').DataTable();
        } );
</script>
