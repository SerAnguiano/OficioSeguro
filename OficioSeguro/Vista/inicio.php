
<html>
    <head>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/cssmenu.css" rel="stylesheet" type="text/css"/>
   
        
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="../js/jsmenu.js" type="text/javascript"></script>
          
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  
    <body>
        
        <?php
            include("../MasterPage/MenuMaster.html");
        ?>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-body bg-primary">
                    <h2>Inicio</h2>
                </div>
                <div>
                    Bienvenido!
                </div>
                <p></p>
                
                <!-- Standard button -->
                <button type="button" class="btn btn-default">Default</button>

                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-primary">Primary</button>

                <!-- Indicates a successful or positive action -->
                <button type="button" class="btn btn-success">Success</button>

                <!-- Contextual button for informational alert messages -->
                <button type="button" class="btn btn-info">Info</button>

                <!-- Indicates caution should be taken with this action -->
                <button type="button" class="btn btn-warning">Warning</button>

                <!-- Indicates a dangerous or potentially negative action -->
                <button type="button" class="btn btn-danger">Danger</button>

                <!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
                <button type="button" class="btn btn-link">Link</button>

                <p></p>
                <p></p>
                <p class="bg-primary">Titulos</p>
                <p class="bg-success">Mensajes Satisfactorios</p>
                <p class="bg-info">Mensajes de información</p>
                <p class="bg-warning">Alertas</p>
                <p class="bg-danger">Errores</p>
                
                <div class="alert alert-success" role="alert" id="Carga" runat="server">
                    <span  class="glyphicon glyphicon-exclamation-sign"  aria-hidden="true"></span>
                    Bien
                </div>
                <div class=table-responsive> 
                <table class="table table-bordered table-striped"> 
                    <thead> 
                        <tr> 
                            <th>Oficio Seguro</th> 
                            <th> Titulo<br>
                                <small>SubTitulo</small>
                            </th> 
                            <th> Titulo<br>
                                <small>SubTitulo</small>
                            </th>
                            <th> Titulo<br>
                                <small>SubTitulo</small>
                            </th> 
                            <th> Titulo<br>
                                <small>SubTitulo</small>
                        </tr> 
                    </thead> 
                    <tbody> 
                        <tr>
                            <th class=text-nowrap scope=row>Datos</th>
                            <td></td> 
                            <td colspan=3></td>
                        </tr> 
                        <tr> 
                            <th class=text-nowrap scope=row>Datos</th> 
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td></td> 
                        </tr>
                        <tr>
                            <th class=text-nowrap scope=row>Datos</th>
                            <td>
                                <code></code>
                            </td> <td>
                                <code></code>
                            </td> <td>
                                <code></code>
                            </td> 
                            <td>
                                <code></code>
                            </td>
                        </tr> 
                        <tr> 
                            <th class=text-nowrap scope=row>Datos</th>
                            <td colspan=4></td>
                        </tr> 
                        <tr>
                            <th class=text-nowrap scope=row>Datos</th>
                            <td class=text-muted></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <th class=text-nowrap scope=row>Datos</th>
                            <td colspan=4></td>
                        </tr> 
                        <tr> 
                            <th class=text-nowrap scope=row>Datos</th>
                            <td colspan=4></td>
                        </tr> 
                        <tr> 
                            <th class=text-nowrap scope=row>Datos</th>
                            <td colspan=4></td> 
                        </tr> 
                        <tr> 
                            <th class=text-nowrap scope=row>Datos</th>
                            <td colspan=4></td>
                        </tr> 
                    </tbody> 
                </table>
            </div>
            </div>
        </div>
    </body>
            
</html>
