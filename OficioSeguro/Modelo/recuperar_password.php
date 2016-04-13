<?php
    require '../Conexion/Datos.php';
    
    $conexion = conexion();

    $usuario = $_POST["user"];
    $password = $_POST["password"];
    
    $consulta= "UPDATE  Persona SET Contrasenia = '".$password."' WHERE Usuario='".$usuario."';"; 
        /*$resultado= mysql_query($consulta,$conexion) or die (mysql_error());
        $fila=  mysql_fetch_array($resultado); */
        
  if (mysql_query($consulta,$conexion) === FALSE) {
    $error = 1;               
            $mensje="El usuario no existe";
                //redireccionamos a la pagina con el contenido de la variable mensaje
            
        header('Location: ../vista/recuperarPassword.php?errorUsuario='.urlencode($error).'&mensaje='.  urlencode($mensje));
        
        
        
} else {
   $error = 1;               
            $mensje="Se ha modificado el password correctamente";
                //redireccionamos a la pagina con el contenido de la variable mensaje
            
            $consulta= "SELECT * FROM Persona WHERE usuario='$usuario' AND Contrasenia = '".$password."'";
                        $resultado= mysql_query($consulta,$conexion) or die (mysql_error());
			$filaprin=mysql_fetch_array($resultado); 
			if (!$filaprin[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
                            {
				//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
				$activarMensaje=1;
				$mensaje="Usuario no existe";
				//redireccionamos a la pagina con el contenido de la variable mensaje
				header('Location: ../vista/recuperarPassword.php?errorUsuario='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
				return;
                            }
                            else
                            {
                                if (!isset($_SESSION)) 
                                {
                                    session_start();
                                }
                                //Definimos las variables de sesión y redirigimos a la página de usuario
                                $_SESSION['s_usuario'] = $filaprin['Usuario'];
                                $_SESSION['s_nombre'] = $filaprin['Nombre'];
                                $_SESSION['s_rol'] = $filarprin['Rol'];
                                header('Location: ../vista/inicio.php?tipo='.urlencode($error).'&mensaje='.  urlencode($mensje));
                            }
                                
}
           
           

        
    
    ?>