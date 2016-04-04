<?php 
session_start();

if (!$_SESSION)
{	
    echo '<script language = javascript>
	alert("No ha iniciado ninguna sesión, por favor regístrese")
	self.location = "Registro.html"
	</script>';
	}
else
{
    session_destroy();
	
        header('Location: ../vista/index.php');
	}
?>