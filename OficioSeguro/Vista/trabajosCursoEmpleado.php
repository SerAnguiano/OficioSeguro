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
            
            $consulta= "Select t.IdTrabajo TIdTrabajo, of.DescripcionOficio OFDescripcionOficio, t.Descripcion TDescripcion,
                        concat(p.nombre,' ',p.ApellidoP,' ',p.ApellidoM)Nombre_Empleador
                        From trabajo t
                        Inner Join oficio of Inner Join empleador emple Inner Join persona p Inner Join empleado emp Inner Join Persona per
                        Where of.IdOficio = t.IdOficio AND t.IdEmpleador = emple.IdEmpleador AND p.IdPersona = emple.IdPersona 
                        AND t.IdEmpleado = emp.IdEmpleado AND per.IdPersona = emp.IdPersona AND per.usuario like '".$usuario."' AND t.IdEstatusTrabajo = 5;";
            $resultado = mysql_query($consulta);
            
            ?>
        <div class="container">
           <div class="table-responsive">
            <?php
            while($fila = mysql_fetch_array($resultado)){
                ?>
            
                <form action="detallesTrabajoEmpleado.php" method="POST">
                    
                    <table id="example" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Oficio</th>
                                <th>Folio</th>
                                <th>Contratante</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Oficio</th>
                                <th>Folio</th>
                                <th>Contratante</th>
                                <th>Detalle</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td><input type="text" style="border:none;" value='<?php echo "$fila[OFDescripcionOficio]"; ?>'></td>
                                <td><input type="text" style="border:none;" size="10" name="IdTrabajo" value='<?php echo "$fila[TIdTrabajo]"; ?>' readonly="readonly"></td>
                                <td><input type="text" style="border:none;" size="40" name="Nombre_Empleador" value='<?php echo "$fila[Nombre_Empleador]"; ?>' readonly="readonly" ></td>
                                <td><input type="submit" value='Detalle' class="btn btn-default"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
           
            <?php                                              
            }            
            ?>
        </div>
        </div>
    </body>
            
</html>
<script type="text/javascript" class="init">
	
        $(document).ready(function() {
                $('#example').DataTable();
        } );
</script>