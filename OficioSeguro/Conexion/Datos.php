<?php

$conexion =  mysql_connect("localhost","root");
if(!$conexion)
{
    die("no se ha podido conectar al servidor MYSQL: ".mysql_error());	
}

$bd_seleccionada = mysql_select_db("Proyecto",$conexion);

if(!$bd_seleccionada)
{
    die("no se ha podido seleccionar la base de datos: ".mysql_error());	
}

?>