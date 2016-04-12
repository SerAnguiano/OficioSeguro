<?php



    //Validar si se está ingresando con sesión correctamente 
    //Si se creó una sesión se sigue adelante de lo contrario
    // se regresa a la página del login.html, esto sirve para
    // que no se pueda acceder directamente a esta página por
    //URL.
    if (!$_SESSION){
        $mensaje= 'Usuario no autenticado';
        $pagina= 'index.php';
        
        header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
    }

    //Recuperar las variables de nombre de usuario
    $s_usuario = $_SESSION['s_usuario'];
    $s_rol=$_SESSION['s_rol'];
    $s_nombre = $_SESSION['s_nombre'];
    $s_Id= $_SESSION['s_Id'];

    require '../Conexion/Datos.php';



$con=  conexion();


//$consulta= "SELECT IdTrabajo,Costo,Descripcion FROM trabajo WHERE Estatus='Terminado'"; 
      //  $resultado= mysql_query($consulta,$con) or die (mysql_error());
    //    $fila=mysql_fetch_array($resultado); 
       
        
        
        
    echo"<div class=container>";
       echo"<div class=panel panel-default>";
            echo"<div class=panel-heading>";
                            echo"  <h1 class=panel-title aligntext><strong>Trabajos Finalizados</strong></h1>";
	    echo"</div>";	  
        echo"</div>";
    echo"</div>";
    echo"<div class=container>";
       echo"<div class=panel panel-default>";
            echo"<div class=panel-heading>";
                            echo"  <form input >";
                            echo"<form action=querytrabtermEmpleador.php method=get>"; 
                            echo"Busqueda:"; 
                            echo".$criterio.<input type=text name=criterio size=22 maxlength=150>"; 
                            echo"<input type=submit value=Buscar>"; 
                            echo"</form>";
                            $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                            echo "<b>$url_actual</b>";
                            
                            
                            
	    echo"</div>";	  
        echo"</div>";
    echo"</div>";  
    echo"<br>";
    echo"<br>";
    
$consulta1 = "SELECT IdTrabajo,Costo,Descripcion FROM trabajo WHERE Estatus='Terminado'";
$rs_trabajo = mysql_query($consulta1, $con);
$num_total_registros = mysql_num_rows($rs_trabajo);
//Si hay registros
if ($num_total_registros > 0) {
	//Limito la busqueda
	$TAMANO_PAGINA = 1;
        $pagina = false;

	//examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	//calculo el total de paginas
	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

	//echo '<p>Esto es un ejemplo de paginacion con PHP recogiendo los datos de los articulos publicados en mi pagina principal.</p>';

	//pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
	//echo '<h3>Numero de articulos: '.$num_total_registros .'</h3>';
	///echo '<h3>En cada pagina se muestra '.$TAMANO_PAGINA.' articulos ordenados por fecha de forma descendente.</h3>';
	//echo '<h3>Mostrando la pagina '.$pagina.' de ' .$total_paginas.' paginas.</h3>';
	$consulta = "SELECT IdTrabajo,Costo,Descripcion FROM trabajo WHERE Estatus='Terminado' ORDER BY IdTrabajo DESC LIMIT ".$inicio."," . $TAMANO_PAGINA;
	$rs = mysql_query($consulta, $con);
	while ($fila = mysql_fetch_array($rs)) {
		echo"<div class=container>";//contenedor de informacion de la consulta
       echo"<div class=panel panel-default>";
            echo"<div class=panel-heading>";
                            echo"  <h1 class=panel-title ><strong>Folio</strong>:".utf8_encode($id=$fila['IdTrabajo'])."</h1>";
            echo"</div>";
                echo"<div class=row>";
                                echo"<div  class=col-md-1 ALIGN=center ><strong>Trabajo</strong>:".utf8_encode($trab='5')."</div>";
                                echo"<div  class=col-md-6  ALIGN=center ><strong>Descripcion</strong>: ".utf8_encode($des=$fila['Descripcion'])." </div>";
                                
                 echo "</div>";
                echo"<div class=row>";
                                echo"<div  class=col-md-3  ><strong>Costo del Servicio</strong>: $".utf8_encode($cost=$fila['Costo'])."</div>";
                                echo"<div  class=col-md-4  ALIGN=center > </div>";
                                echo"<div  class=col-md-4  ALIGN=center ><strong>Nombre del Empleado</strong>: ".utf8_encode($des=$fila['Descripcion'])." </div>";
                echo "</div>";
        echo"</div>";
    echo"</div>";
	}

	echo '<p>';

	if ($total_paginas > 1) {
            if ($pagina != 1)
            {
            echo '<a href="?pagina=' . ($pagina - 1 ) .'"><img src="../Images/izq.gif" border="0"></a>';
        }
        for ($i=1;$i<=$total_paginas;$i++) {
                    if ($pagina == $i) {
            //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo $pagina;
            } else {
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '  <a href="?pagina=' . $i . '">' . $i . '</a>  ';
            }
        }
        if ($pagina != $total_paginas) {
            echo '<a href="?pagina=' . ($pagina + 1) . '"><img src=../Images/der.gif border=0></a>';
        }
    }
	echo '</p>';
}