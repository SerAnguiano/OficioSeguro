<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/css-calificacion.css" rel="stylesheet" type="text/css"/>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>Calificaciones</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="principal">
        
        <?php
            include("../MasterPage/menuMaster.php");
            $s_rol = $_SESSION['s_rol'];
            $idPersona=$_SESSION['s_IdPersona'];
            require '../Conexion/Datos.php';     
            $conexion = conexion();
            if($s_rol==3)
            {
      
         
             $consulta= "SELECT CalEvaEmp, TraEvaEmp, PagoEvaEmp, TiemEvaEmp   
                        FROM empleador 
                        where IdPersona=".$idPersona.";";
            $resultado = mysql_query($consulta);
            
            ?>
        <div class=container well col-lg-8 col-lg-offset-2>
                <h1 class=well col-lg-8 col-lg-offset-2 ><strong>Calificaciones</strong></h1>
             </div>
            <br>
            <br>
           
            <?php
            while($fila = mysql_fetch_array($resultado)){
                $calificacion=round($fila['CalEvaEmp']);
                $caltrato=round($fila['TraEvaEmp']);
                $calpago=round($fila['PagoEvaEmp']);
                $caltiempo=round($fila['TiemEvaEmp']);
                
                ?>
            <font style="color: #fff">
            <h1 class="clasificacion" align="center">
                lareneG
                  <input id="radio1" type="radio" name="estrellas" value="5" checked>
                  <?php echo $calificacion ?><label for="radio1">★</label>
                  <p></p>
                otarT
                  <input id="radio2" type="radio" name="estrellas" value="4">
                  <?php echo $caltrato ?><label for="radio2">★</label>
                  <p></p>
                ogaP
                  <input id="radio3" type="radio" name="estrellas" value="3"  >
                  <?php echo $calpago ?><label for="radio3">★</label>
                  <p></p>
                opmeiT
                  <input id="radio4" type="radio" name="estrellas" value="2" >
                  <?php echo $caltiempo ?><label for="radio4">★</label>
                  
                </h1>
            </font>
            <?php
            }
            
            }
            if($s_rol==2)
            {

             $consulta= "SELECT CalEvaEmpr, CaliEvaEmpr, CostEvaEmpr, TiemEvaEmpr   
                        FROM empleado 
                        where IdPersona=".$idPersona.";";
            $resultado = mysql_query($consulta);
            
            ?>
        <div class=container well col-lg-8 col-lg-offset-2>
                <h1 class=well col-lg-8 col-lg-offset-2 ><strong>Calificaciones</strong></h1>
             </div>
            <br>
            <br>
           
            <?php
            while($fila = mysql_fetch_array($resultado)){
                $calificacion=round($fila['CalEvaEmpr']);
                $calcalidad=round($fila['CaliEvaEmpr']);
                $calcosto=round($fila['CostEvaEmpr']);
                $caltiempo=round($fila['TiemEvaEmpr']);
                
                ?>
            <font style="color: #fff">
            <h1 class="clasificacion" align="center">
                lareneG
                  <input id="radio1" type="radio" name="estrellas" value="5" checked>
                  <?php echo $calificacion ?><label for="radio1">★</label>
                  <p></p>
                dadilaC
                  <input id="radio2" type="radio" name="estrellas" value="4">
                  <?php echo $calcalidad ?><label for="radio2">★</label>
                  <p></p>
                otsoC
                  <input id="radio3" type="radio" name="estrellas" value="3"  >
                  <?php echo $calcosto ?><label for="radio3">★</label>
                  <p></p>
                opmeiT
                  <input id="radio4" type="radio" name="estrellas" value="2" >
                  <?php echo $caltiempo ?><label for="radio4">★</label>
                  
                </h1>
            </font>
            <?php
            }
            }?>
            
    </body>
            
</html>
