<!-- Universidad Abierta y a Distancia de México -->
<!-- Unidad 2. Actividad 2. Normas de seguridad en sitios -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 17/02/22 -->
<!-- logout.php -->
<?php
@session_start();
session_destroy();
header("Location: ../index.html");
?>