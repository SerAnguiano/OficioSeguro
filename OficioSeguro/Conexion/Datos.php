<?php

function conectarse()
{
 $conectarse =mysqli_connect("localhost","root","")  or die(mysql_error());
 
 if(Conectarse)
    {
	
	mysql_selectdb("isii",$conectarse);
	return($conectarse);

    }
 else
    {
	return("-1");
    }
}
?>