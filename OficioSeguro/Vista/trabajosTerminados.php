<html>
    <head>
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <title>Trabajos terminados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="principal">
        
        <?php
        //  Notas:Crear disparador que cuando se agregue trabajo terminado, ponga fecha en su campo 
        //  Notas:Manejar combobox en el estatus de trabajo propongo Terminado, Trabajado, Cancelado. 
        //  Notas:NO pude hacer correr el proyecto en mi compu pero ya te desarrole la logica 
        //  Notas:Falta darle el formato por que no puedo ver como quedo  
            include("../MasterPage/menuMaster.php");
            echo "<div class='container'>";
            include("../Conexion/Datos.php");
            
            $con=  conexion();
            // Variables que se supone estaran en mi clase disponibles 
            $s_usuario = $_SESSION['s_usuario'];
            $s_nombre = $_SESSION['s_nombre'];
            // Checar con se va a firmar para evitar conflicto con mismos usuarios y contraseñas
            //Sirve para obtener el idPersona y trabajar la variable para obtener datos.
            $consulta= "SELECT idPersona FROM Persona WHERE usuario='".$s_usuario."' AND "
                . "Contrasenia='".$s_nombre."'";
            
            $resultadoidpersona = mysql_query($consulta,$con) or die (mysql_error());
            $datospersona = mysql_fetch_array($resultadoidpersona);
            // Da el tamaño del arreglo :)
            $tamarr = count($datospersona);
            
            echo "<table border=1>";
            echo "<tr><td> <h1>Trabajos Completados</h1></td></tr>";    
            if ($tamarr == 0) {
                echo "<tr><td><h1>Aun no Tienes Trabajos Completados</h1></td></tr><tr";
            }else{
            for ($index = 0; $index < count($datospersona); $index++) {
                // No se si con esto va recorer el array y mostrar los datos especificos
                $datospersona[$index];
                //Datos obtenidos de los trabajos
                echo "<tr>";
                echo $datospersona["FechaPublicacion"],"&nbsp&nbsp",$datospersona["FechaTermino"],"<p>";
                echo $datospersona["Descripcion"],"<p>";
                echo $datospersona["Costo"],"<p>";
                echo "<tr>";
                echo "</td>";
                echo "</tr>";
            }// Fin for creacion fila colunas
            }
            echo "</table>";
            
        ?> 
        </div>
    </body>
            
</html>
