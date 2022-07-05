<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad II -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 18/02/22 -->
<!-- registrar_form.php -->
<?php
// Se comprueba la existencia de una sesión, de lo contrario envía al usuario a la página de inicio de sesión.
session_start();
include ("comprobar_sesion.php");
include ("header_p.php");
print "<div alight='rigth'><p>ID del profesor: $_SESSION[id]<br> Nombre del profesor: $_SESSION[nombre].</p></div>";
?>
<div>
	<h3>Formulario para registro de calificaciones: </h3>
	<form action="registrar_cal.php" method="POST">
		<label for="id">Matrícula del estudiante: </label><br>
		<input type="text" id="id" name="id" required onkeyup="validarNumeros();"><br>
		<!-- Mensaje de verificación -->
		<label id="alerta1" style="visibility: hidden;"><font color="red" size="2">¡Los campos sólo admiten números enteros!</font></label><br>

		<font size="2">Las calificaciones deben ingresarse en números enteros.</font><br>
		<label for="programacion">Calificación de Programación: </label><br>
		<input type="text" id="programacion" name="programacion" required><br>
		<label for="matematicas">Calificación de Matemáticas: </label><br>
		<input type="text" id="matematicas" name="matematicas" required><br>
		<label for="algoritmos">Calificación de Algoritmos: </label><br>
		<input type="text" id="algoritmos" name="algoritmos" required><br>
		<label for="logica">Calificación de Lógica: </label><br>
		<input type="text" id="logica" name="logica" required><br>
		<label for="so">Calificación de Sistemas Operativos: </label><br>
		<input type="text" id="so" name="so" required><br>
		<label for="bd">Calificación de Bases de Datos: </label><br>
		<input type="text" id="bd" name="bd" required><br><br>
		<input type="submit" name="enviar"><br>
	</form>
</div>