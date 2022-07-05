<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad 2. Actividad 2. Normas de seguridad en sitios -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 16/02/22 -->
<!-- registro.php -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Unidad 2. Actividad 2. Normas de seguridad en sitios.</title>
	<!-- Inserción de hoja de estilos CSS -->
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
	<header>
		<nav>
			<ul class="menu">
				<li><a href="../html/login.html">Iniciar sesión</a></li>
				<li><a href="../html/registro.html">Registrarse</a></li>
				<li><a href="../index.html">Inicio</a></li>
			</ul>
		</nav>
		<center><h1>Universidad Abierta y a Distancia de México</h1></center>
	</header>

	<?php
	// Primero se validan los campos del formulario
	// Si alguno de los campos está vacío regresa a la página del formulario
	if (! $_POST
	    || trim($_POST['id']) === ''
	    || trim($_POST['nombre']) === ''
	    || trim($_POST['pass1']) === ''
	    || trim($_POST['pass_confirm']) === ''
    ) {
    	echo '<center><h2>Los campos no pueden ir vacíos.</h2></center>';
	}

	// Sino, prosigue con la declaración de variables
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$pass1 = $_POST['pass1'];
	$pass_confirm = $_POST['pass_confirm'];
	$regex = '/^(?=(?:.*\d){1})(?=(?:.*[a-z]){1})(?=(?:.*[@$?¡\-_#]){1})\S{8,15}$/';

	// Valida el formato de la contraseña
	if (preg_match($regex, $pass1)) {

		// Si es válido pasa a comparar ambas contraseñas
		if ($pass1 == $pass_confirm) {
			// Si coinciden se inicia la conexión a la base de datos
			include("con_mysql.php");

			// Creación de la conexión a DB mediante PDO y declaración de sentencias preparadas:
			try {
				$conexion = new PDO('mysql:host='.$host.'; dbname='.$database.'', $user, $pass);
				$sentencia = $conexion->prepare('SELECT * FROM USUARIOS WHERE ID_usuario =?');
				$sentencia->execute(array($_POST['id']));
				$fila = $sentencia->fetch();

				// Si no existen registros con la misma ID, realiza el registro.
				if (empty($fila)) {
					$sentencia = $conexion->prepare('INSERT INTO USUARIOS VALUES (?, ?, ?, ?)');
					$sentencia->bindParam(1, $id);
					$sentencia->bindParam(2, $nombre);
					$sentencia->bindParam(3, $tipo);
					$sentencia->bindParam(4, $pass1);
					$tipo = "E";
					$sentencia->execute();
					// Impresión del resultado exitoso
					echo '
						<center>
							<h2>El estudiante <font color="red">'.$nombre.'</font> se ha registrado exitosamente con el ID: '.$id.'</h2>
						</center>
					';
				} else { // Si encuentra una coincidencia muestra el mensaje.
				echo '<center>El ID de usuario ya se encuentra en uso.</center>';
				}

				// Cierre de la conexión:
				$conexion = null;

			} catch (PDOException $e) {
				echo '<center><h2>Error de conexión: '.$e->getMessage().'</h2></center>';
			}

		} else { // Si no coinciden muestra el siguente mensaje
			echo '<center>Las contraseñas no son iguales.</center>';
		}

	} else { // Si no es válido muestra el mensaje correspondiente
		echo '<center>La contraseña no cumple con el formato indicado.</center>';
	}
	?>
</body>
</html>
