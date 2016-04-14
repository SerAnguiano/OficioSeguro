<?php
    session_start();

    //Si  hay sesión iniciada  se regresa  a inicio
    if ($_SESSION)
    {
 
        header('Location: ../vista/inicio.php');
    }
?>

<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>Registro</title>
        <meta charset="UTF-8">
        <script src="../js/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="../css/sweetalert.css">
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  
    <body class="registro" onload="elegir()">
        
    </body>
    
</html> 
    <script>
    function elegir()
    {
        swal({   title: "Tipo De registro",   text: "Eligue tu rol en MORLOM",   type: "info",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "¿Buscas trabajo?",   cancelButtonText: "¿Ofreces Trabajo?",   closeOnConfirm: false,   closeOnCancel: false },
        function(isConfirm)
        {   
            if (isConfirm) 
            {     
                 swal("Listo!", "Registrate", "success");  
                window.location.replace("../Vista/registro.php");
            }
            else
            {
               swal("Listo!", "Registrate", "success"); 
                 window.location.replace("../Vista/registroEmpleador.php");
            }
        });
    }
</script>