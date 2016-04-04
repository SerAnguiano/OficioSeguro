<?php
require '../Conexion/Datos.php';

$con=  conexion();

 if($_POST["metodo"]=="login")
 {
        if($con!="-1")
    {
        $usuario=$_POST["usuario"];  
        $contrasenia=$_POST["contrasennia"];
        //Consultar si los valores ingresados coinciden con los datos que están 
        //guardados en la base de datos
        $consulta= "SELECT * FROM Persona WHERE usuario='".$usuario."' AND "
                . "Contrasenia='".$contrasenia."'"; 
        $resultado= mysql_query($consulta,$con) or die (mysql_error());
        $fila=mysql_fetch_array($resultado); 
        
        if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
        {
                $mensaje=1;
        header('Location: ../vista/index.php?errorLogin='.urlencode($mensaje));
        }
        else //opcion2: Usuario logueado correctamente
        {
            if (!isset($_SESSION)) 
            {
                session_start();
            }
                //Definimos las variables de sesión y redirigimos a la página de usuario
                $_SESSION['s_usuario'] = $fila['Usuario'];
                $_SESSION['s_nombre'] = $fila['Nombre'];
                $_SESSION['s_rol'] = $fila['Rol'];
                header("Location: ../vista/inicio.php");
        }
    }
    else{
        $mensaje= 'No se pudo establecer la conexión';
        $pagina= 'inicio.php';
        header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
    }
 }

?>