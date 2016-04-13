<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
        <link href="../css/css-calificacion.css" rel="stylesheet" type="text/css"/>
        <link href="../css/cssfondo.css" rel="stylesheet" type="text/css"/>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='../Images/icon.png' rel='shortcut icon' type='image/png'>
    </head>
  
    <body class="principal">
        
        <?php
            include("../MasterPage/menuMaster.php");
        ?>
        

        <h1  align="center">
            Calificaciones
        </h1>
                <h1 class="clasificacion" align="center">
                  <input id="radio1" type="radio" name="estrellas" value="5">
                  <label for="radio1">★</label>
                  <input id="radio2" type="radio" name="estrellas" value="4">
                  <label for="radio2">★</label>
                  <input id="radio3" type="radio" name="estrellas" value="3"  checked="checked">
                  <label for="radio3">★</label>
                  <input id="radio4" type="radio" name="estrellas" value="2">
                  <label for="radio4">★</label>
                  <input id="radio5" type="radio" name="estrellas" value="1">
                  <label for="radio5">★</label>
                </h1>
  
    </body>
            
</html>
