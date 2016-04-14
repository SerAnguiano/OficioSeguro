
<html>
    <head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>DataTables example - Bootstrap 3</title>
        <link href="../css/bootstrap-6.css" rel="stylesheet" type="text/css"/>
        <link href="../css/dataTable-Bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.12.0.js" type="text/javascript"></script>
        <script src="../js/jquery-table.js" type="text/javascript"></script>
        <script src="../js/bootstrap-tabla.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="principal" >
         
        <?php
            include("../MasterPage/menuMaster.php");
        ?>
         <?php 
         @$tipo=$_GET['tipo'];
         @$mensaje=$_GET['mensaje'];
        if ($tipo==1)
        {
            echo '<div class="alert alert-success">';
               echo '<h4>'; 
               echo $mensaje;
               echo '</h4>';
           echo'</div>';
        }     
        ?>
        <div class="container">
            
             <?php
            
            require '../Conexion/Datos.php';     
            $conexion = conexion();
            $usuario = $_SESSION['s_usuario'];
            
            
            $consulta= "Select t.IdTrabajo TIdTrabajo, of.DescripcionOficio OFDescripcionOficio, t.Descripcion TDescripcion,
                        t.FechaPublicacion FP
                        From trabajo t
                        Inner Join oficio of 
                        Where of.IdOficio = t.IdOficio AND t.IdEstatusTrabajo = 1;";
            $resultado = mysql_query($consulta);
            
            ?>
        <div class=container well col-lg-6>
                <h1 class=well col-lg-6><strong>Busca trabajo</strong></h1>
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
                <th>Fecha Publicado</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Oficio</th>
                <th>Folio</th>
                <th>Fecha Publicado</th>
                <th>Detalle</th>
            </tr>
        </tfoot>
            <?php
            while($fila = mysql_fetch_array($resultado)){
                $FP = strtotime($fila['FP']);
                ?>
        <tbody>
            <tr>
                <td><?php echo "$fila[OFDescripcionOficio]"; ?></td>
                <td><?php echo "$fila[TIdTrabajo]"; ?></td>
                <td><?php echo date("Y-m-d", $FP); ?></td>
                <?php echo "<td><a href='detallesTrabajo.php?IdTrabajo=".$fila['TIdTrabajo']."'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
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