<?php
include("../MasterPage/menuMaster.php");  
require '../Conexion/Datos.php';
    
$conexion = conexion();
    
$oficio = $_POST['oficio'];
$descripcion = $_POST['descripcion'];

$consultaoficio = "Select IdOficio From oficio Where DescripcionOficio like '".$oficio."'";
$resultado= mysql_query($consultaoficio,$conexion) or die (mysql_error());
$fila=mysql_fetch_array($resultado); 
        
if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
    $error = 1;               
    $mensje="El oficio no existe";
    //redireccionamos a la pagina con el contenido de la variable mensaje
            
        header('Location: ../vista/OfrecerTrabajo.php?errorUsuario='.urlencode($error).'&mensaje='.  urlencode($mensje)); 
}
else{
    
    $IdOficio = $fila['IdOficio'];
 
    $consultaidusuario = "SELECT IdPersona, IdCiudad FROM Persona Where Usuario like '".$s_usuario."'";
    $resultadoidusuario = mysql_query($consultaidusuario,$conexion) or die (mysql_error());
    $filaidusuario = mysql_fetch_array($resultadoidusuario);
    
    if (!$filaidusuario[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
    {
        $error = 1;               
        $mensje="No se ha encontrado a ninguna persona";
        //redireccionamos a la pagina con el contenido de la variable mensaje
            
        header('Location: ../vista/OfrecerTrabajo.php?errorUsuario='.urlencode($error).'&mensaje='.  urlencode($mensje)); 
    }else{
        $idPersona = $filaidusuario['IdPersona'];
        $idCiudad = $filaidusuario['IdCiudad'];
        
        $consultaempleador = "SELECT IdEmpleador FROM empleador WHERE IdPersona = ".$idPersona."";
        $resultempleador = mysql_query($consultaempleador, $conexion);
        $filaempleador = mysql_fetch_array($resultempleador);
        
        if (!$filaempleador[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
        {
            $error = 1;               
            $mensje="No se ha encontrado a ningun contratante";
            //redireccionamos a la pagina con el contenido de la variable mensaje
            
            header('Location: ../vista/OfrecerTrabajo.php?errorUsuario='.urlencode($error).'&mensaje='.  urlencode($mensje)); 
        }
        else{
            $IdEmpleador = $filaempleador['IdEmpleador'];
            
            $consultainsert= "INSERT INTO  Trabajo(Descripcion, FechaPublicacion,IdOficio,IdEmpleador,IdCiudad,IdEstatusTrabajo)"
            . "VALUES ('".$descripcion."', now(),'".$IdOficio."','".$IdEmpleador."',".$idCiudad.",1);"; 
            $resultinsert = mysql_query($consultainsert,$conexion);
            $filainsert = mysql_fetch_array($resultinsert);
            
            if (!$filaempleador[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
            {
                $error = 1;               
                $mensje="Se ha tenido un problema al insertar el trabajo";
                //redireccionamos a la pagina con el contenido de la variable mensaje
            
                header('Location: ../vista/OfrecerTrabajo.php?errorUsuario='.urlencode($error).'&mensaje='.  urlencode($mensje)); 
            }else{
                $error = 2;               
                $mensje="SE HA AGREGADO SATISFACTORIAMENTE EL TRABAJO";
                //redireccionamos a la pagina con el contenido de la variable mensaje
            
                header('Location: ../vista/OfrecerTrabajo.php?errorUsuario='.urlencode($error).'&mensaje='.  urlencode($mensje));
            }
            
            
        }
          
    }

}



?>