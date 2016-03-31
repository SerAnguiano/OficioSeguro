<html>
    <head>
        <title>Oficio Seguro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/csslogin.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>

        <script src="../js/jslogin.js" type="text/javascript"></script>
        
    </head>
   
    <body>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">MORLOM</h3>
			 	</div>
                     <div class="panel-heading">                                
                                <div align='center' class="row-fluid user-row">
                                    <img  src="../Images/logo.jpg"  class="img-responsive" alt="Conxole Admin"/>
                                    
                                </div>
                            </div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form">
                    <fieldset>
			    	  	<div class="form-group has-feedback">
			    		    <input Class="form-control required" placeholder="E-mail" name="email" type="text">
                                            <i class="glyphicon glyphicon glyphicon-lock form-control-feedback"></i>
			    		</div>
			    		<div class="form-group has-feedback">
			    			<input Class="form-control required" placeholder="Password" name="password" type="password" value="">
                                                <i class="glyphicon glyphicon-user form-control-feedback"></i>
                                        </div>
			    		<div class="checkbox">
			    	    	
			    	    </div>
                        <input class="btn btn-lg btn-primary btn-block" type="button" value="Login" OnClick="return Validar()"><br/>
                        <div align="center">
                            <h5>¿No tienes cuenta? Registrate ahora <a href="Registro.php">aquí</a></h5>
                        </div>
			    	</fieldset>
			      	</form>
                                    
			    </div>
			</div>
		</div>
	</div>
</div>
    </body>
</html>
<script>
function Validar() {
            var error = 0;
            var inputs = document.getElementsByClassName('form-control required');
            for (var z = 0; z < inputs.length; z++) {
                var input = document.getElementsByName(inputs[z].name)[0];
                if (input.value == "" || input.value == "0") {
                    var formgroup = input.parentNode.parentElement;
                    formgroup.className = 'form-group has-error required';
                    error = error + 1;
                }
                else {
                    var formgroup = input.parentNode.parentElement;
                    formgroup.className = 'form-group required';
                }
            }
            if (error > 0) {
                return false;
            }
        }
       </script>
