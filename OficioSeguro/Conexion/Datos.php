<?php

$conexion =  mysql_connect("localhost","root");
if(!$conexion)
{
    die("No se ha podido conectar al servidor de MYSQL: ".mysql_error());	
}

$bd_seleccionada = mysql_select_db("Proyecto",$conexion);

if(!$bd_seleccionada)
{
    die("No se ha podido seleccionar la base de datos: ".mysql_error());	
}

?>