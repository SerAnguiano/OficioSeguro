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
            
            $consulta= "select IdTrabajo, DescripcionEstatus, DescripcionOficio
            from trabajo t inner join estatustrabajo e on t.IdEstatusTrabajo= e.IdEstatusTrabajo inner join oficio o on t.IdOficio = o.IdOficio
            inner join empleador em on t.IdEmpleador= em.IDEmpleador inner join Persona p on em.IdPersona=p.IdPersona
            where e.IdEstatusTrabajo=1 OR e.IdEstatusTrabajo=2 OR e.idEstatusTrabajo= 5 AND p.usuario='".$usuario."';";
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
                                <th>Estatus</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Oficio</th>
                                <th>Folio</th>
                                <th>Estatus</th>
                                <th>Detalle</th>
                            </tr>
                        </tfoot>
            <?php
            while($fila = mysql_fetch_array($resultado)){
                $idTrabajo=$fila['IdTrabajo'];
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo "$fila[DescripcionOficio]"; ?></td>
                                <td><?php echo "$fila[IdTrabajo]"; ?></td>
                                <?php
                                if($fila['DescripcionEstatus']=="Activo")
                                {
                                ?>
                                    <td class="alert-success"><?php echo "$fila[DescripcionEstatus]"; ?></td>
                                    <?php echo "<td><a href='detallesTrabajoEmpleador.php?IdTrabajo=".$idTrabajo."&tipo=activo'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
                                <?php
                                }
                                ?>
                                <?php
                                if($fila['DescripcionEstatus']=="Pendiente")
                                {
                                ?>
                                    <td class="alert-warning"><?php echo "$fila[DescripcionEstatus]"; ?></td>
                                    <?php echo "<td><a href='detallesTrabajoEmpleador.php?IdTrabajo=".$idTrabajo."&tipo=pendiente'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
                                <?php
                                }
                                ?>
                                <?php
                                if($fila['DescripcionEstatus']=="En curso")
                                {
                                ?>
                                    <td class="alert-info"><?php echo "$fila[DescripcionEstatus]"; ?></td>
                                    <?php echo "<td><a href='detallesTrabajoEmpleador.php?IdTrabajo=".$idTrabajo."&tipo=curso'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
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