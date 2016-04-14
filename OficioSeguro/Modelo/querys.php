<head>
    <script src="../js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="../css/sweetalert.css">
</head>

<?php
require '../Conexion/Datos.php';

$con=  conexion();
@$metodo= $_POST["metodo"];

 if($metodo=="login")
 {
     $usuario=$_POST["usuario"];  
     $contrasenia=$_POST["contrasennia"];

         if($con!="-1")
    {
        //Consultar si los valores ingresados coinciden con los datos que están 
        //guardados en la base de datos
        $consulta= "SELECT Usuario, Nombre, IdRol, IdPersona FROM Persona WHERE usuario='".$usuario."' AND 
                Contrasenia='".$contrasenia."'"; 
        $resultado= mysql_query($consulta,$con) or die (mysql_error());
        $fila=mysql_fetch_array($resultado); 
        
        if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
        {
            //marcas el indicador error para activarlo en la pagina a la que se  redirecciona
                $activarMensaje=1;
                $mensaje="Usuario o contraseña incorrectos";
                //redireccionamos a la pagina con el contenido de la variable mensaje
        header('Location: ../vista/index.php?errorLogin='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
        }
        else //opcion2: Usuario logueado correctamente
        {
            ?>
            
                <?php
            if (!isset($_SESSION)) 
            {
                session_start();
            }
                //Definimos las variables de sesión y redirigimos a la página de usuario
                $_SESSION['s_usuario'] = $fila['Usuario'];
                $_SESSION['s_nombre'] = $fila['Nombre'];
                $_SESSION['s_rol'] = $fila['IdRol'];
                $_SESSION['s_IdPersona'] = $fila['IdPersona'];
                header("Location: ../vista/inicio.php");
        }
    }
    else
    {
        $mensaje= 'No se pudo establecer la conexión';
        $pagina= 'inicio.php';
        header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
    }
}

  if($metodo=="registroEmpleado")
 {
        $oficios=$_POST["oficios"];  
        
        
    if($con!="-1")
    {
        $idPersona="";
        $nombres=$_POST["nombres"];
        $apellidoP=$_POST["apellidoP"];
        $apellidoM=$_POST["apellidoM"];
        $estado=$_POST["estado"];
        $idEstado="";
        $ciudad=$_POST["ciudad"];
        $idCiudad="";
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $usuario=$_POST["usuario"];
        $idEmpleado="";
        $contrasenia=$_POST["contrasennia"];
        $oficio1=$_POST["oficio1"];
        $idOficio1="";
        $habilidad1=$_POST["habilidad1"];
        $oficio2=$_POST["oficio2"];
        $idOficio2="";
        $habilidad2=$_POST["habilidad2"];
        $oficio3=$_POST["oficio3"];
        $idOficio3="";
        $habilidad3=$_POST["habilidad3"];
        $oficio4=$_POST["oficio4"];
        $idOficio4="";
        $habilidad4=$_POST["habilidad4"];
        $oficio5=$_POST["oficio5"];
        $idOficio5="";
        $habilidad5=$_POST["habilidad5"];
        
        
        $variables= '&nombres='.  urlencode($nombres).'&apellidoP='.  urlencode($apellidoP).'&apellidoM='.  urlencode($apellidoM);
        //Consultar si los valores ingresados coinciden con los datos que están 
        //guardados en la base de datos
        $consulta= "SELECT IdEstado FROM estado WHERE NombreEstado='".$estado."'";
        $resultado= mysql_query($consulta,$con) or die (mysql_error());
        $fila=mysql_fetch_array($resultado); 
        
        if (!$fila[0]) //opcion1: Si el estado NO existe o los datos son INCORRRECTOS
        {
            //marcas el indicador error para activarlo en la pagina a la que se  redirecciona
            $activarMensaje=1;
            $mensaje="El estado no existe teclea las primeras letras de tu estado y usa una de las sugerencias";
            //redireccionamos a la pagina con el contenido de la variable mensaje
			header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
			return;
		}
        else //opcion2: Estado existe
        {
            $idEstado=$fila["IdEstado"];
            
            $consulta= "SELECT IdCiudad FROM ciudad WHERE IdEstado='".$idEstado."'";
			$resultado= mysql_query($consulta,$con) or die (mysql_error());
			$fila=mysql_fetch_array($resultado); 
			
			if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
			{
				//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
				$activarMensaje=1;
				$mensaje="la ciudad no coincide con el estado teclea las primeras letras de tu ciudad y usa una de las sugerencias";
				//redireccionamos a la pagina con el contenido de la variable mensaje
				header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
				return;
			}
			else //opcion2: Ciudad y estado coninciden
			{
				$idCiudad=$fila["IdCiudad"];
				$consulta= "SELECT usuario FROM persona WHERE Usuario='".$usuario."'";
				$resultado= mysql_query($consulta,$con) or die (mysql_error());
				$fila=mysql_fetch_array($resultado); 
				
				if ($fila[0]) //opcion1: Si el usuario SI existe o los datos son INCORRRECTOS
				{
					//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
					$activarMensaje=1;
					$mensaje="Este usuario ya existe en MORLOM intenta con otro";
					//redireccionamos a la pagina con el contenido de la variable mensaje
					header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
					return;
				}
				else //opcion2: Usuario logueado correctamente
				{
					if($oficios==1)
					{
						$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio1."'";
						$resultado= mysql_query($consulta,$con) or die (mysql_error());
						$fila=mysql_fetch_array($resultado); 
						if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
						{
							//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
							$activarMensaje=1;
							$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
							//redireccionamos a la pagina con el contenido de la variable mensaje
							header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
							return;
						}
						else //opcion2: el oficio conincide
						{
							$idOficio1=$fila["IdOficio"];
						}
					}
										
					if($oficios==2)
					{
						$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio1."'";
						$resultado= mysql_query($consulta,$con) or die (mysql_error());
						$fila=mysql_fetch_array($resultado); 
						if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
						{
							//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
							$activarMensaje=1;
							$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
							//redireccionamos a la pagina con el contenido de la variable mensaje
							header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
							return;
						}
						else //opcion2: el oficio conincide
						{
							$idOficio1=$fila["IdOficio"];
							$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio2."'";
							$resultado= mysql_query($consulta,$con) or die (mysql_error());
							$fila=mysql_fetch_array($resultado); 
							if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
							{
								//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
								$activarMensaje=1;
								$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
								//redireccionamos a la pagina con el contenido de la variable mensaje
								header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='. urlencode($mensaje).$variables);	
								return;
							}
							else //opcion2: el oficio conincide
							{
								$idOficio2=$fila["IdOficio"];
							}
						}
					}
											
					if($oficios==3)
					{
						$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio1."'";
						$resultado= mysql_query($consulta,$con) or die (mysql_error());
						$fila=mysql_fetch_array($resultado); 
						if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
						{
							//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
							$activarMensaje=1;
							$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
							//redireccionamos a la pagina con el contenido de la variable mensaje
							header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
							return;
						}
						else //opcion2: el oficio conincide
						{
							$idOficio1=$fila["IdOficio"];
							$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio2."'";
							$resultado= mysql_query($consulta,$con) or die (mysql_error());
							$fila=mysql_fetch_array($resultado); 
							if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
							{
								//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
								$activarMensaje=1;
								$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
								//redireccionamos a la pagina con el contenido de la variable mensaje
								header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='. urlencode($mensaje).$variables);		
								return;
							}
							else //opcion2: el oficio conincide
							{
								$idOficio2=$fila["IdOficio"];
								$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio3."'";								$resultado= mysql_query($consulta,$con) or die (mysql_error());
								$fila=mysql_fetch_array($resultado); 
								if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
								{
									//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
									$activarMensaje=1;
									$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
									//redireccionamos a la pagina con el contenido de la variable mensaje
										   
									header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='. urlencode($mensaje).$variables);
									return;
								}
								else //opcion2: el oficio conincide
								{
									$idOficio3=$fila["IdOficio"];
								}
							}
						}
					}
													
					if($oficios==4)
					{
						$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio1."'";
						$resultado= mysql_query($consulta,$con) or die (mysql_error());
						$fila=mysql_fetch_array($resultado); 
						if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
						{
							//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
							$activarMensaje=1;
							$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
							//redireccionamos a la pagina con el contenido de la variable mensaje
							header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
							return;
						}
						else //opcion2: el oficio conincide
						{
							$idOficio1=$fila["IdOficio"];
							$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio2."'";
							$resultado= mysql_query($consulta,$con) or die (mysql_error());
							$fila=mysql_fetch_array($resultado); 
							if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
							{
								//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
								$activarMensaje=1;
								$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
								//redireccionamos a la pagina con el contenido de la variable mensaje
								header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);	
								return;
							}
							else //opcion2: el oficio conincide
							{
								$idOficio2=$fila["IdOficio"];
								$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio3."'";
								$resultado= mysql_query($consulta,$con) or die (mysql_error());
								$fila=mysql_fetch_array($resultado); 
								if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
								{
									//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
									$activarMensaje=1;
									$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
									//redireccionamos a la pagina con el contenido de la variable mensaje
											   
									header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);	
									return;
								}
								else //opcion2: el oficio conincide
								{
									$idOficio3=$fila["IdOficio"];
									$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio4."'";
									$resultado= mysql_query($consulta,$con) or die (mysql_error());
									$fila=mysql_fetch_array($resultado); 
									if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
									{
										//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
										$activarMensaje=1;
										$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
										//redireccionamos a la pagina con el contenido de la variable mensaje
										header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
										return;
									}
									else //opcion2: el oficio conincide
									{
										$idOficio4=$fila["IdOficio"];
									}
								} 
							}
						}
					}
					if($oficios==5)
					{
						$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio1."'";
						$resultado= mysql_query($consulta,$con) or die (mysql_error());
						$fila=mysql_fetch_array($resultado); 
						if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
						{
							//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
							$activarMensaje=1;
							$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
							//redireccionamos a la pagina con el contenido de la variable mensaje
							header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
							return;
						}
						else //opcion2: el oficio conincide
						{
							$idOficio1=$fila["IdOficio"];
							$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio2."'";
							$resultado= mysql_query($consulta,$con) or die (mysql_error());
							$fila=mysql_fetch_array($resultado); 
							if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
							{
								//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
								$activarMensaje=1;
								$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
								//redireccionamos a la pagina con el contenido de la variable mensaje
								header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);			
								return;
							}
							else //opcion2: el oficio conincide
							{
								$idOficio2=$fila["IdOficio"];
								$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio3."'";
								$resultado= mysql_query($consulta,$con) or die (mysql_error());
								$fila=mysql_fetch_array($resultado); 
								if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
								{
									//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
									$activarMensaje=1;
									$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
									//redireccionamos a la pagina con el contenido de la variable mensaje 
									header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);		
									return;
								}
								else //opcion2: el oficio conincide
								{
									$idOficio3=$fila["IdOficio"];
									$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio4."'";
									$resultado= mysql_query($consulta,$con) or die (mysql_error());
									$fila=mysql_fetch_array($resultado); 
									if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
									{
										//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
										$activarMensaje=1;
										$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
										//redireccionamos a la pagina con el contenido de la variable mensaje
										header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
										return;
									}
									else //opcion2: el oficio conincide
									{
										$idOficio4=$fila["IdOficio"];
										$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio5."'";
										$resultado= mysql_query($consulta,$con) or die (mysql_error());
										$fila=mysql_fetch_array($resultado); 
										if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
										{
											//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
											$activarMensaje=1;
											$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
											//redireccionamos a la pagina con el contenido de la variable mensaje
											header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
											return;
										}
										else //opcion2: el oficio conincide
										{
											$idOficio5=$fila["IdOficio"];
										}
									}
								} 
							}
						}
					}
					$queryInsertPersona= "INSERT INTO persona(
							Nombre,
							ApellidoP,
							ApellidoM,
							Telefono,
							Correo,
							Usuario,
							Contrasenia,
							IdRol,
							IdCiudad ) 
							VALUES(
							'$nombres',
							'$apellidoP',
							'$apellidoM',
							'$telefono',
							'$correo',
							'$usuario',
							'$contrasenia',
							2,
							$idCiudad)";
					$resultInsertPersona = mysql_query($queryInsertPersona,$con);
					if (!$resultInsertPersona) //opcion1: si la inserción no se ejecuto correctamente
					{
						//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
						$activarMensaje=1;
						$mensaje="No se pudo realizar el registro de persona";
						//redireccionamos a la pagina con el contenido de la variable mensaje
						header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
						return;
					}
					else //opcion2: Los datos se incertaron correctamente
					{
						$consulta= "SELECT * FROM Persona WHERE usuario='$usuario'";
						$resultado= mysql_query($consulta,$con) or die (mysql_error());
						$filaprin=mysql_fetch_array($resultado); 
				
						if (!$filaprin[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
						{
							//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
							$activarMensaje=1;
							$mensaje="Usuario o contraseña incorrectos";
							//redireccionamos a la pagina con el contenido de la variable mensaje
							header('Location: ../vista/index.php?errorLogin='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
							return;
						}
						else //opcion2: Usuario encontrado
						{
							$idPersona=$filaprin["IdPersona"];
							$consulta= "SELECT IdOficio FROM oficio WHERE DescripcionOficio='".$oficio1."'";
							$resultado= mysql_query($consulta,$con) or die (mysql_error());
							$fila=mysql_fetch_array($resultado); 
							if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
							{
								//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
								$activarMensaje=1;
								$mensaje="El oficio no coincide teclea las primeras letras de tu oficio y usa una de las sugerencias";
								//redireccionamos a la pagina con el contenido de la variable mensaje
								header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
								return;
							}
							else //opcion2: el oficio conincide
							{
								$idOficio1=$fila["IdOficio"];
										
								$queryInsertEmpleado= "INSERT INTO Empleado(IdOficio, IdPersona) VALUES($idOficio1,$idPersona)";
								$resultInsertEmpleado = mysql_query($queryInsertEmpleado,$con);
								if (!$resultInsertEmpleado) //opcion1: si la inserción no se ejecuto correctamente
								{
									//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
									$activarMensaje=1;
									$mensaje="No se pudo realizar el registro Empleado";
									//redireccionamos a la pagina con el contenido de la variable mensaje
									header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
									return;
								}
								else
								{
									$consulta= "SELECT IdEmpleado FROM empleado WHERE IdPersona=$idPersona";
									$resultado= mysql_query($consulta,$con) or die (mysql_error());
									$fila=mysql_fetch_array($resultado); 
									if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
									{
										//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
										$activarMensaje=1;
										$mensaje="Usuario no encontrado";
										//redireccionamos a la pagina con el contenido de la variable mensaje
										header('Location: ../vista/index.php?errorLogin='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
										return;
									}
									else //opcion2: Usuario encontrado
									{
										$idEmpleado=$fila["IdEmpleado"];
												
										if($oficios==1)
										{
											$queryInsert= "INSERT INTO descripcion(IdOficio, IdEmpleado, Habilidades)
											VALUES($idOficio1,$idEmpleado,'$habilidad1')";
											$resultInsert = mysql_query($queryInsert,$con);
											if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
											{
												//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
												$activarMensaje=1;
												$mensaje="No se pudo realizar el de oficios";
												//redireccionamos a la pagina con el contenido de la variable mensaje
												header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
												return;
											}
										}
										if($oficios==2)
										{
											$queryInsert= "INSERT INTO Descripcion(IdOficio, IdEmpleado, Habilidades)
											VALUES($idOficio1,$idEmpleado,'$habilidad1'),($idOficio2,$idEmpleado,'$habilidad2')";
											$resultInsert = mysql_query($queryInsert,$con);
											 if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
											{
												//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
												$activarMensaje=1;
												$mensaje="No se pudo realizar el registro Descripcion";
												//redireccionamos a la pagina con el contenido de la variable mensaje
												header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
												return;
											}
										}
										if($oficios==3)
										{
											$queryInsert= "INSERT INTO Descripcion(IdOficio, IdEmpleado, Habilidades)
											VALUES($idOficio1,$idEmpleado,'$habilidad1'),($idOficio2,$idEmpleado,'$habilidad2'),($idOficio3,$idEmpleado,'$habilidad3')";
											$resultInsert = mysql_query($queryInsert,$con);
											if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
											{
												//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
												$activarMensaje=1;
												$mensaje="No se pudo realizar el registro ";
												//redireccionamos a la pagina con el contenido de la variable mensaje
												header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
												return;
											}
										}
										if($oficios==4)
										{
											$queryInsert= "INSERT INTO Descripcion(IdOficio, IdEmpleado, Habilidades)
											VALUES($idOficio1,$idEmpleado,'$habilidad1'),($idOficio2,$idEmpleado,'$habilidad2'),
											($idOficio3,$idEmpleado,'$habilidad3'),($idOficio4,$idEmpleado,'$habilidad4')";
											$resultInsert = mysql_query($queryInsert,$con);
											if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
												{
													//marcas el indicador error para activarlo en la pagina a la que se redirecciona
													$activarMensaje=1;
													$mensaje="$idEmpleado";
													//redireccionamos a la pagina con el contenido de la variable mensaje
													header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
													return;
												}
										}
										if($oficios==5)
										{
											$queryInsert= "INSERT INTO Descripcion(IdOficio, IdEmpleado, Habilidades)
											VALUES($idOficio1,$idEmpleado,'$habilidad1'),($idOficio2,$idEmpleado,'$habilidad2'),
											($idOficio3,$idEmpleado,'$habilidad3'),($idOficio4,$idEmpleado,'$habilidad4'),
											($idOficio5,$idEmpleado,'$habilidad5')";
											$resultInsert = mysql_query($queryInsert,$con);
											if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
											{
												//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
												$activarMensaje=1;
												$mensaje="No se pudo realizar el registro";
												//redireccionamos a la pagina con el contenido de la variable mensaje
												 header('Location: ../vista/registro.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
												 return;
											}
										}
									}
								}
							} 
						}
						if (!isset($_SESSION)) 
						{
								session_start();
						}
						//Definimos las variables de sesión y redirigimos a la página de usuario
						$_SESSION['s_usuario'] = $filaprin['Usuario'];
						$_SESSION['s_nombre'] = $filaprin['Nombre'];
						$_SESSION['s_rol'] = $filaprin['Rol'];
                                                $_SESSION['s_rol'] = $filaprin['IdRol'];
                                                $_SESSION['s_IdPersona'] = $filaprin['IdPersona'];
						header("Location: ../vista/inicio.php");
					}
				}
			}
		}
	}
        else
        {
            $mensaje= 'No se pudo establecer la conexión';
            $pagina= 'inicio.php';
            header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
        }
}	
							
							
 if($metodo=="registroEmpleador")
 {
             
        
    if($con!="-1")
    {
        $idPersona="";
        $nombres=$_POST["nombresE"];
        $apellidoP=$_POST["apellidoPE"];
        $apellidoM=$_POST["apellidoME"];
        $estado=$_POST["estadoE"];
        $idEstado="";
        $ciudad=$_POST["ciudadE"];
        $idCiudad="";
        $telefono=$_POST["telefonoE"];
        $correo=$_POST["correoE"];
        $usuario=$_POST["usuarioE"];
        $contrasenia=$_POST["contrasenniaE"];
        
        
        $variables= '&nombresE='.  urlencode($nombres).'&apellidoPE='.  urlencode($apellidoP).'&apellidoME='.  urlencode($apellidoM);
        //Consultar si los valores ingresados coinciden con los datos que están 
        //guardados en la base de datos
        $consulta= "SELECT IdEstado FROM estado WHERE NombreEstado='".$estado."'";
        $resultado= mysql_query($consulta,$con) or die (mysql_error());
        $fila=mysql_fetch_array($resultado); 
        
        if (!$fila[0]) //opcion1: Si el estado NO existe o los datos son INCORRRECTOS
        {
            //marcas el indicador error para activarlo en la pagina a la que se  redirecciona
                $activarMensaje=1;
                $mensaje="El estado no existe teclea las primeras letras de tu estado y usa una de las sugerencias";
                //redireccionamos a la pagina con el contenido de la variable mensaje
        header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
        }
        else //opcion2: Estado existe
        {
            $idEstado=$fila["IdEstado"];
            
            $consulta= "SELECT IdCiudad FROM ciudad WHERE IdEstado='".$idEstado."'";
            $resultado= mysql_query($consulta,$con) or die (mysql_error());
            $fila=mysql_fetch_array($resultado); 
            if (!$fila[0]) //opcion1: Si la ciudad NO existe o los datos son INCORRRECTOS
            {
                //marcas el indicador error para activarlo en la pagina a la que se  redirecciona
                    $activarMensaje=1;
                    $mensaje="la ciudad no coincide con el estado teclea las primeras letras de tu ciudad y usa una de las sugerencias";
                    //redireccionamos a la pagina con el contenido de la variable mensaje
            header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables.$variables
                   );
            }
            else //opcion2: Ciudad y estado coninciden
            {
                $idCiudad=$fila["IdCiudad"];
                $consulta= "SELECT usuario FROM persona WHERE Usuario='".$usuario."'";
		$resultado= mysql_query($consulta,$con) or die (mysql_error());
		$fila=mysql_fetch_array($resultado); 
		if ($fila[0]) //opcion1: Si el usuario SI existe o los datos son INCORRRECTOS
		{
                    //marcas el indicador error para activarlo en la pagina a la que se  redirecciona
                    $activarMensaje=1;
                    $mensaje="Este usuario ya existe en MORLOM intenta con otro";
                    //redireccionamos a la pagina con el contenido de la variable mensaje
                    header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
                    return;
                }
		else //opcion2: Usuario logueado correctamente
		{
                    $queryInsert= "INSERT INTO persona(
                                    Nombre,
                                    ApellidoP,
                                    ApellidoM,
                                    Telefono,
                                    Correo,
                                    Usuario,
                                    Contrasenia,
                                    IdRol,
                                    IdCiudad ) 
                                    VALUES(
                                    '$nombres',
                                    '$apellidoP',
                                    '$apellidoM',
                                    '$telefono',
                                    '$correo',
                                    '$usuario',
                                    '$contrasenia',
                                    3,
                                    $idCiudad)";
                                    $resultInsert = mysql_query($queryInsert,$con);
                    if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
                    {
			//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
			$activarMensaje=1;
			$mensaje="No se pudo realizar el registro de persona";
			//redireccionamos a la pagina con el contenido de la variable mensaje
			header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
			return;
                    }      
                    else //opcion2: Los datos se incertaron correctamente
                    {
                        $consulta= "SELECT * FROM Persona WHERE usuario='$usuario' AND Contrasenia = '".$contrasenia."'"; 
                        $resultado= mysql_query($consulta,$con) or die (mysql_error());
			$filaprin=mysql_fetch_array($resultado); 
			if (!$filaprin[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
                            {
				//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
				$activarMensaje=1;
				$mensaje="Usuario no existe";
				//redireccionamos a la pagina con el contenido de la variable mensaje
				header('Location: ../vista/index.php?errorLogin='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
				return;
                            }
                        else //opcion2: Usuario encontrado
                        {
                            $idPersona=$filaprin["IdPersona"];
                            $queryInsert= "INSERT INTO Empleador(IdPersona) VALUE($idPersona)";
                            $resultInsert = mysql_query($queryInsert,$con);
								
                            if (!$resultInsert) //opcion1: si la inserción no se ejecuto correctamente
                            {
				//marcas el indicador error para activarlo en la pagina a la que se  redirecciona
				$activarMensaje=1;
				$mensaje="No se pudo realizar el registro Empleado";
				//redireccionamos a la pagina con el contenido de la variable mensaje
				header('Location: ../vista/registroEmpleador.php?errorRegistro='.urlencode($activarMensaje).'&mensaje='.  urlencode($mensaje).$variables);
				return;
                            }
			}
                    }
                    if (!isset($_SESSION)) 
                    {
			session_start();
                    }
                    //Definimos las variables de sesión y redirigimos a la página de usuario
                    $_SESSION['s_usuario'] = $filaprin['Usuario'];
                    $_SESSION['s_nombre'] = $filaprin['Nombre'];
                    $_SESSION['s_rol'] = $filaprin['IdRol'];
                    $_SESSION['s_IdPersona'] = $filaprin['IdPersona'];
                    header("Location: ../vista/inicio.php");
                }
            }
        }
    }
    else
    {
        $mensaje= 'No se pudo establecer la conexión';
        $pagina= 'inicio.php';
        header('Location: ../vista/error.php?mensaje='.urlencode($mensaje).'&pagina='.urlencode($pagina));
    }
 } 
?>