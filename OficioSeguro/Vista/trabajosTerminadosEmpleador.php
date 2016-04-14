<?php


    //Validar si se estÃ¡ ingresando con sesiÃ³n correctamente 
    //Si se creÃ³ una sesiÃ³n se sigue adelante de lo contrario
    // se regresa a la pÃ¡gina del login.html, esto sirve para
    // que no se pueda acceder directamente a esta pÃ¡gina por
    //URL.
    
?>

<html>
    <head>
        <link href="../css/bootstrap-6.css" rel="stylesheet" type="text/css"/>
        <link href="../css/dataTable-Bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jquery-1.12.0.js" type="text/javascript"></script>
        <script src="../js/jquery-table.js" type="text/javascript"></script>
        <script src="../js/bootstrap-tabla.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>OficioSeguro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="principal" >
         
        <?php
    include("../MasterPage/menuMaster.php");
//$consulta= "SELECT IdTrabajo,Costo,Descripcion FROM trabajo WHERE Estatus='Terminado'"; 
      //  $resultado= mysql_query($consulta,$con) or die (mysql_error());
    //    $fila=mysql_fetch_array($resultado); 
       if (!$_SESSION){
        $mensaje= 'Usuario no autenticado';
        $pagina= 'index.php';
        
        header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
    }

    //Recuperar las variables de nombre de usuario
    $s_usuario = $_SESSION['s_usuario'];
    $s_rol=$_SESSION['s_rol'];
    $s_nombre = $_SESSION['s_nombre'];
    $idPersona= $_SESSION['s_IdPersona'];
        
       require '../Conexion/Datos.php';



$con=  conexion();  
        
    echo"<div class=container well col-lg-8 col-lg-offset-2>";
 
          echo"  <h1 class=well col-lg-8 col-lg-offset-2 ><strong>Trabajos Finalizados</strong></h1>";
    echo"</div>";
    echo"<br>";
    echo"<br>";
                            
                            
                            
	 
    
    
$consulta1 = "Select 
IdTrabajo as folio,
Descripcion,
persona.Nombre as nomempleado,
oficio.DescripcionOficio as nomoficio
from trabajo
left outer join empleado on trabajo.IdEmpleado=empleado.IdEmpleado
left outer join persona on persona.IdPersona=empleado.IdPersona
left outer join oficio on trabajo.IdOficio=oficio.IdOficio
left outer join estatustrabajo on trabajo.IdEstatusTrabajo=estatustrabajo.IdEstatusTrabajo
left outer join empleador on trabajo.IdEmpleador=empleador.IdEmpleador
where trabajo.IdEstatusTrabajo=3 and trabajo.IdEmpleador=(select empleador.IdEmpleador from empleador where empleador.IdPersona='".$idPersona."')
order by IdTrabajo DESC;";                                        
$rs_trabajo = mysql_query($consulta1, $con);
$num_total_registros = mysql_num_rows($rs_trabajo);
//Si hay registro

	

	//pongo el nï¿½mero de registros total, el tamaï¿½o de pï¿½gina y la pï¿½gina que se muestra
	//echo '<h3>Numero de articulos: '.$num_total_registros .'</h3>';
	///echo '<h3>En cada pagina se muestra '.$TAMANO_PAGINA.' articulos ordenados por fecha de forma descendente.</h3>';
	//echo '<h3>Mostrando la pagina '.$pagina.' de ' .$total_paginas.' paginas.</h3>';
	$consulta = "Select 
        IdTrabajo as folio,
        Descripcion,
        persona.Nombre as nomempleado,
        oficio.DescripcionOficio as nomoficio,
        FechaTermino,
        FechaPublicacion
        from trabajo
        left outer join empleado on trabajo.IdEmpleado=empleado.IdEmpleado
        left outer join persona on persona.IdPersona=empleado.IdPersona
        left outer join oficio on trabajo.IdOficio=oficio.IdOficio
        left outer join estatustrabajo on trabajo.IdEstatusTrabajo=estatustrabajo.IdEstatusTrabajo
        left outer join empleador on trabajo.IdEmpleador=empleador.IdEmpleador
        where trabajo.IdEstatusTrabajo=3 and trabajo.IdEmpleador=(select empleador.IdEmpleador from empleador where empleador.IdPersona='".$idPersona."')";
	$rs = mysql_query($consulta, $con);
        ?>
        <div class="container">
            <font style="color: #fff">
        <div class="table-responsive">
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
	while ($fila = mysql_fetch_array($rs)) 
                {
            $FP = strtotime($fila['FechaPublicacion']); 
            $FT = strtotime($fila['FechaTermino']); 
            ?>
                    
                    <tbody>
                            <tr>
                                <td><input type="text" style="border:none;" value='<?php echo date("Y-m-d", $FP); ?>'></td>
                                <td><input type="text" style="border:none;" size="15" name="IdTrabajo" value='<?php echo date("Y-m-d", $FT); ?>' readonly="readonly"></td>
                                <td><label><?php echo "$fila[Descripcion]"; ?></label></td>
                                <?php echo "<td><a href='detallesTrabajoTerminadoEmpleador.php?IdTrabajo=".$fila['folio']."'><input type='submit' value='Detalle' class='btn btn-default'></a></td>"?>
                            </tr>
                        </tbody>
 
            <?php
                }
                ?>
    </table>
        </div>
            </font>
        </div>
    </body>
</html>
<script type="text/javascript" class="init">
	
        $(document).ready(function() {
                $('#example').DataTable();
        } );
</script>