<!-- Universidad Abierta y a Distancia de México -->
<!-- Programación Web II -->
<!-- Alumna: Jessica Trejo Méndez -->
<!-- Matrícula: ES1821000225 -->
<!-- 18/02/22 -->
<!-- comprobar_sesion.php -->

<!-- Código que valida la existencia de una sesión iniciada, de lo contrario envía al usuario a iniciar una. -->
<?php
if(!isset($_SESSION['id'])){
    print'<center><h2>Sesion no iniciada</h2></center><br><br>';
    print '<center><a href="../html/login.html">Iniciar Sesión</a></center>';
    exit;
} else {
    
}
?>