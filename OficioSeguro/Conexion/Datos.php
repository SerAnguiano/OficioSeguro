<?php

function conexion()
{
      @$conectarse=mysql_connect("localhost","root")
        or die("No se pudo realizar la conexion");
       @mysql_select_db("morlom",$conectarse)
	or die("ERROR con la base de datos");
      
//if (mysqli_connect_errno())
//  {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//  }
 
 if($conectarse)
    {
        return($conectarse);
    }
    else 
    {
        return("-1");
        
    }
}

class conexion
{
   function conexion()
    {
        @$conectarse=mysql_connect("localhost","root")
          or die("No se pudo realizar la conexion");
         @mysql_select_db("morlom",$conectarse)
          or die("ERROR con la base de datos");

  //if (mysqli_connect_errno())
  //  {
  //  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  //  }

   if($conectarse)
      {
          return($conectarse);
      }
      else 
      {
          return("-1");

      }
    } 
}

//$conexion =  mysql_connect("localhost","root");
//if(!$conexion)
//{
//    die("No se ha podido conectar al servidor MYSQL: ".mysql_error());	
//}
//
//$bd_seleccionada = mysql_select_db("Proyecto",$conexion);
//
//if(!$bd_seleccionada)
//{
//    die("No se ha podido seleccionar la base de datos: ".mysql_error());	
//}
//
//?>