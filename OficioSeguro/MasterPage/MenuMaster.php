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
?>
       
        <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand" class="item-nav">
                    <a href="#">
                       MORLOM
                    </a>
                </li>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Quienes Somos</a>
                </li>
                <li>
                    <a href="#">Buscar</a>
                </li>
                <li>
                    <a href="#">Oficios</a>
                </li>
                
                <li>
                    <a href="#">Servicos</a>
                </li>
                <li>
                    <a href="#">Contacto</a>
                </li>
                <li>
                    <a href="../Modelo/cerrarSesion.php">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
        
        <nav class="navbar navbar-default">
                <div class="container-fluid " >
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="row">
                      <div class="col-xs-6 col-sm-4" align="Center">
                          <h1>INICIO</h1>
                      </div>
                      <div class="col-xs-6 col-sm-4" align="right">
                        <h2>Hola! <?php echo $s_nombre ?></h2>
                      </div>
                      <div class="col-xs-6 col-sm-4" align="right">
                          <img src="../Images/avatar.png" alt="" class="img-circle"/>
                      </div>
                  </div>
                </div>
        </nav>
        <!-- /#sidebar-wrapper -->
            <div id="page-content-wrapper">
                
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>