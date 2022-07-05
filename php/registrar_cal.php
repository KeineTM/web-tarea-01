<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad II -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 18/02/22 -->
<!-- registrar_cal.php -->
<?php
// Se comprueba la existencia de una sesión, de lo contrario envía al usuario a la página de inicio de sesión.
session_start();
include("comprobar_sesion.php");
include("header_p.php");
include("con_mysql.php");

print "<div alight='rigth'><p>ID del profesor: $_SESSION[id]<br> Nombre del profesor: $_SESSION[nombre].</p></div>";

$id = $_POST['id'];
$programacion = $_POST['programacion'];
$matematicas = $_POST['matematicas'];
$algoritmos = $_POST['algoritmos'];
$logica = $_POST['logica'];
$so = $_POST['so'];
$bd = $_POST['bd'];

// Creación de la conexión a DB mediante PDO y declaración de sentencias preparadas:
try {
	$conexion = new PDO('mysql:host='.$host.'; dbname='.$database.'', $user, $pass);
	$sentencia = $conexion->prepare('INSERT INTO CALIFICACIONES VALUES (?, ?, ?, ?, ?, ?, ?)');
	$sentencia->bindParam(1, $id);
	$sentencia->bindParam(2, $programacion);
	$sentencia->bindParam(3, $matematicas);
	$sentencia->bindParam(4, $algoritmos);
	$sentencia->bindParam(5, $logica);
	$sentencia->bindParam(6, $so);
	$sentencia->bindParam(7, $bd);
	$sentencia->execute();

	echo '<center><h2>Calificaciones para el estudiante con matrícula <font color="red">'.$id.' </font> registradas correctamente.</h2></center>';

	// Cierre de la conexión
	$conexion = null;

} catch (PDOException $e) {
	echo '<center><h2>Error de conexión: '.$e->getMessage().'</h2></center>';
}
?>