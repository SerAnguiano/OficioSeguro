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
            
            $consulta= "Select t.IdTrabajo TIdTrabajo, o.DescripcionOficio OFDescripcionOficio, t.Descripcion TDescripcion,
                        concat(p.nombre,' ',p.ApellidoP)Nombre_Empleador, e.DescripcionEstatus
                        from trabajo t inner join estatustrabajo e on t.IdEstatusTrabajo= e.IdEstatusTrabajo inner join oficio o on t.IdOficio = o.IdOficio
                        inner join empleador em on t.IdEmpleador= em.IDEmpleador inner join Persona p on em.IdPersona=p.IdPersona
                        where e.IdEstatusTrabajo=2 OR e.idEstatusTrabajo= 5 AND p.usuario='".$usuario."';";
            $resultado = mysql_query($consulta);
            
            ?>
        <div class="container">
            <div class=container well col-lg-8 col-lg-offset-2>
                <h1 class=well col-lg-8 col-lg-offset-2 ><strong>Trabajos en curso</strong></h1>
             </div>
            <br>
            <br>
           <div class="table-responsive">
               <font style="color: #fff">
               <table id="example" class="table table-hover" cellspacing="0" width="100%">
                   <thead>
                            <tr>
                                <th>Oficio</th>
                                <th>Folio</th>
                                <th>Contratante</th>
                                <th>Estatus</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Oficio</th>
                                <th>Folio</th>
                                <th>Contratante</th>
                                <th>Estatus</th>
                                <th>Detalle</th>
                            </tr>
                        </tfoot>
            <?php
            while($fila = mysql_fetch_array($resultado)){
                ?>
                        <tbody>
                            <tr>
                                <td><input type="text" style="border:none;" value='<?php echo "$fila[OFDescripcionOficio]"; ?>'></td>
                                <td><input type="text" style="border:none;" size="10" name="IdTrabajo" value='<?php echo "$fila[TIdTrabajo]"; ?>' readonly="readonly"></td>
                                <td><label><?php echo "$fila[Nombre_Empleador]"; ?></label></td>
                                <?php
                                if($fila['DescripcionEstatus']=="Pendiente")
                                {
                                ?>
                                    <td class="alert-warning"><?php echo "$fila[DescripcionEstatus]"; ?></td>
                                    <?php echo "<td><a href='detallesTrabajoEmpleado.php?IdTrabajo=".$fila['TIdTrabajo']."&tipo=pendiente'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
                                <?php
                                }
                                ?>
                                <?php
                                if($fila['DescripcionEstatus']=="En curso")
                                {
                                ?>
                                    <td class="alert-info"><?php echo "$fila[DescripcionEstatus]"; ?></td>
                                    <?php echo "<td><a href='detallesTrabajoEmpleado.php?IdTrabajo=".$fila['TIdTrabajo']."&tipo=curso'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
                                <?php
                                }
                                ?>
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