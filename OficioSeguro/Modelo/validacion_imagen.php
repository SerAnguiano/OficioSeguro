<?php
require_once '../Conexion/Datos.php';
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="../fotos".$foto;
copy($ruta,$destino);
mysql_query("insert into persona (foto) values('$destino')");
?>


