<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad II -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 18/02/22 -->
<!-- consultar_todos.php -->
<?php
// Se comprueba la existencia de una sesión, de lo contrario envía al usuario a la página de inicio de sesión.
session_start();
include("comprobar_sesion.php");
include("header_p.php");
include("con_mysql.php");

print "<div alight='rigth'><p>ID del profesor: $_SESSION[id]<br> Nombre del profesor: $_SESSION[nombre].</p></div>";

// Creación de la conexión a DB mediante PDO y declaración de sentencias preparadas:
try {
	$conexion = new PDO('mysql:host='.$host.'; dbname='.$database.'', $user, $pass);
	$sentencia = $conexion->prepare('SELECT * FROM CALIFICACIONES');
	$sentencia->execute();

	print "<center><h3>Lista de Calificaciones</h3></center>";
	// Construcción de la tabla
	echo '
	<center><table>
	<tr>
	<th> Matrícula </th>
	<th> Programación </th>
	<th> Matemáticas </th>
	<th> Algoritmos </th>
	<th> Lógica </th>
	<th> Sistemas Operativos </th>
	<th> Bases de Datos </th>
	</tr>';
	$contador = 0;
	while ($fila = $sentencia->fetch()){
		echo '	<tr>
		<th> '. $fila[0] .' </th>
		<th> '. $fila[1] .' </th>
		<th> '. $fila[2] .' </th>
		<th> '. $fila[3] .' </th>
		<th> '. $fila[4] .' </th>
		<th> '. $fila[5] .' </th>
		<th> '. $fila[6] .' </th>
		</tr>';
		$contador++;
	}
	echo '
	</tr>
	</center></table>
	';

	// Cierre de la conexión
	$conexion = null;

} catch (PDOException $e) {
	echo '<center><h2>Error de conexión: '.$e->getMessage().'</h2></center>';
}
?>