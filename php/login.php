<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad 2 -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 17/02/22 -->
<!-- login.php -->
<?php
// Se inicia la sesión
session_start();
include("header.php");
include("con_mysql.php");

// Creación de la conexión a DB mediante PDO y declaración de sentencias preparadas:
try {
	$conexion = new PDO('mysql:host='.$host.'; dbname='.$database.'', $user, $pass);
	$sentencia = $conexion->prepare('SELECT * FROM USUARIOS WHERE ID_usuario =?');
	$sentencia->execute(array($_POST['id']));
	$fila = $sentencia->fetch();

	if ($fila['Password'] == $_POST['contrasena']) {
		// Si se validan correctamente las credenciales se inicializan las variables de sesión
		$_SESSION['id'] = $fila['ID_usuario'];
		$_SESSION['nombre'] = $fila['Nombre_usuario'];
		// Según el tipo de usuario detectado se ejecuta la función js correspondiente para personalizar el menú.
		if ($fila['Tipo_usuario'] == 'E') {
			$_SESSION['tipo_usuario'] = "estudiante";
			echo '<script type="text/javascript">'
			, 'menuEstudiante();'
			, '</script>';
		} else {
			$_SESSION['tipo_usuario'] = "profesor";
			echo '<script type="text/javascript">'
			, 'menuProfesor();'
			, '</script>';
		}
		// Mensaje de bienvenida
		print "<center><h2>Bienvenid@, <FONT color=red>$_SESSION[nombre]</font>.<br>
		Has iniciado sesión como $_SESSION[tipo_usuario].</h2></center>";
		
	} else {
		echo '<center><h2>ID o contraseña incorrecta.</h2></center><br>';
	}
	// Cierre de la conexión:
	$conexion = null;
} catch (PDOException $e) {
	echo '<center><h2>Error de conexión: '.$e->getMessage().'</h2></center>';
}
?>