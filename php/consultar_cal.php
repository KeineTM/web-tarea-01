<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad II -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 18/02/22 -->
<!-- consultar_cal.php -->
<?php
// Se comprueba la existencia de una sesión, de lo contrario envía al usuario a la página de inicio de sesión.
session_start();
include ("comprobar_sesion.php");
include("header_e.php");
include("con_mysql.php");

// Creación de la conexión a DB mediante PDO y declaración de sentencias preparadas:
try {
	$conexion = new PDO('mysql:host='.$host.'; dbname='.$database.'', $user, $pass);
	$sentencia = $conexion->prepare('SELECT * FROM CALIFICACIONES WHERE Matricula =?');
	$sentencia->execute(array($_SESSION['id']));
	$fila = $sentencia->fetch();
	print "
	<div alight='rigth'><p>Matrícula: $_SESSION[id]<br><br> Nombre: $_SESSION[nombre].</p></div>
	<center><h3>Calificaciones</h3></center>";

	// Construcción de la tabla
	echo '
	<center><table>
	<tr>
	<th> Programación </th>
	<th> Matemáticas </th>
	<th> Algoritmos </th>
	<th> Lógica </th>
	<th> Sistemas Operativos </th>
	<th> Bases de Datos </th>
	</tr>
	<tr>
	<th> '. $fila[1] .' </th>
	<th> '. $fila[2] .' </th>
	<th> '. $fila[3] .' </th>
	<th> '. $fila[4] .' </th>
	<th> '. $fila[5] .' </th>
	<th> '. $fila[6] .' </th>
	</tr>
	</center></table>
	';

	// Cierre de la conexión
	$conexion = null;

} catch (PDOException $e) {
	echo '<center><h2>Error de conexión: '.$e->getMessage().'</h2></center>';
}
?>