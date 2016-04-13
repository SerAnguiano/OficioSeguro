<?php
    session_start();

    //Validar si se está ingresando con sesión correctamente 
    //Si se creó una sesión se sigue adelante de lo contrario
    // se regresa a la página del login.html, esto sirve para
    // que no se pueda acceder directamente a esta página por
    //URL.
    if (!$_SESSION){
        $mensaje= 'Usuario no autenticado';
        $pagina= 'index.php';
        
        header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
    }

    //Recuperar las variables de nombre de usuario
    $s_usuario = $_SESSION['s_usuario'];
    $s_nombre = $_SESSION['s_nombre'];
    $s_rol = $_SESSION['s_rol'];
    
    if($s_rol==2)
    {
        
    
?>
       
<!-- Second navbar for search -->
    <nav class="navbar navbar-inverse">
        
      <div class="container">
          
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
         
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
       
            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
           <img src="../Images/logoMenu.png" alt="" class="img-circle"/>
            <font color="#fff" size="5px">¡Hola, <?php echo $s_nombre ?>! </font>
          <ul class="nav navbar-nav navbar-right">
              
              <li><a href="../Vista/"><h4>Inicio</h4></a></li>
              <li><a href="../Vista/trabajosCursoEmpleado.php"><h4>Trabajos en curso</h4></a></li>
              <li><a href="../Vista/trabajosTerminados.php"><h4>Trabajos terminados</h4></a></li>
              <li><a href="../Vista/calificaciones.php"><h4>Calificaciones</h4></a></li>
            <li><a href="../Modelo/cerrarSesion.php"><h4>Cerrar sesión</h4></a></li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <?php
    
    }
    if($s_rol==3)
    {
        ?>
    
        <!-- Second navbar for search -->
    <nav class="navbar navbar-inverse">
        
      <div class="container">
          
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
         
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
       
            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
           <img src="../Images/logoMenu.png" alt="" class="img-circle"/>
            <font color="#fff" size="5px">¡Hola, <?php echo $s_nombre ?>! </font>
          <ul class="nav navbar-nav navbar-right">
              
              <li><a href="../Vista/"><h4>Inicio</h4></a></li>
              <li><a href="../Vista/trabajosCurso.php"><h4>Trabajos en curso</h4></a></li>
              <li><a href="../Vista/trabajosTerminados.php"><h4>Trabajos terminados</h4></a></li>
              <li><a href="../Vista/calificaciones.php"><h4>Calificaciones</h4></a></li>
            <li><a href="../Modelo/cerrarSesion.php"><h4>Cerrar sesión</h4></a></li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    <?php
    
    }
    ?>