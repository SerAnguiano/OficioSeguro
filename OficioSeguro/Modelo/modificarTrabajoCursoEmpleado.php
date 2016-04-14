<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../Conexion/Datos.php';     
$conexion = conexion();

$trabajo = $_POST['IdTrabajo'];
$metodo=$_POST['metodo'];
if ($metodo=="terminar") 
    {  
        $consulta= "UPDATE  trabajo SET IdEstatusTrabajo = 3, FechaTermino = now()  WHERE IdTrabajo=".$trabajo.";"; 

        if (mysql_query($consulta,$conexion) === FALSE) {
            header('Location: ../vista/recuperarPassword.php');
        } 
        else {
            header('Location: ../vista/error.php');
        }
    }

if ($metodo=="aplicar") 
    {  
        $consulta= "UPDATE  trabajo SET IdEstatusTrabajo = 2, FechaTermino = now()  WHERE IdTrabajo=".$trabajo.";"; 

        if (mysql_query($consulta,$conexion) === FALSE) {
            header('Location: ../vista/recuperarPassword.php');
        } 
        else {
            header('Location: ../vista/error.php');
        }
    }
    
    if ($metodo=="cancelar") { 
        $consulta= "UPDATE  trabajo SET IdEstatusTrabajo = 4, FechaTermino = now() WHERE IdTrabajo=".$trabajo.";"; 
        if (mysql_query($consulta,$conexion) === FALSE) {
            header('Location: ../vista/recuperarPassword.php');
        } 
        else {
            header('Location: ../vista/error.php');
        }
    
}


?>