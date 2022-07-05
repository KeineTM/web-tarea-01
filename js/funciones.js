// Universidad Abierta y a Distancia de México
// Unidad 2. Actividad 2. Normas de seguridad en sitios
// Programación Web II
// Alumna: Jessica Trejo Méndez
// Matrícula: ES1821000225
// 16/02/22
// funciones.js

// Función que verifica que el campo ID sólo reciba números.
function validarNumeros() {
	// Compara el valor del campo con la expresión regular
	var validar = /^-?\d+$/.test(document.getElementById("id").value);

	// Si es válida se mantiene oculta la alerta
	if (validar) {
		document.getElementById('alerta1').style.visibility = "hidden";
	} else { // Sino, se muestra
		document.getElementById('alerta1').style.visibility = "visible";
	}
}

// Función que verifica el formato de la contraseña introducida y muestra un mensaje en caso de no concordar.
function validarPass() {
	// Se compara la contraseña con la expresión regular
	var valido = /^(?=(?:.*\d){1})(?=(?:.*[a-z]){1})(?=(?:.*[@$?¡\-_#]){1})\S{8,15}$/.test(document.getElementById("pass1").value);

	// Si es válida se oculta el mensaje de alerta
	if (valido) {
		document.getElementById('alerta2').style.visibility = "hidden";
	} else { // Sino, se muestra el mensaje de alerta
		document.getElementById('alerta2').style.visibility = "visible";
	}
}

// Función que compara las contraseñas del formulario y muestra un mensaje en caso de no concordar.
function confirmarPass() {
	// Si los valores de ambos campos son iguales
	if (document.getElementById("pass1").value == document.getElementById("pass_confirm").value) {
		// Se oculta el mensaje de alerta
		document.getElementById('alerta3').style.visibility = "hidden";
	} else { // Sino, se muestra el mensaje de alerta
		document.getElementById('alerta3').style.visibility = "visible";
	}
}

// Funciones que cambian las opciones del menú de acuerdo con el tipo de usuario.
function menuEstudiante() {
	document.getElementById("registrarse").style.display = "none";
	document.getElementById("login").style.display = "none";
	document.getElementById("logout").style.display = "block";
	document.getElementById("consultar_cal").style.display = "block";
	document.getElementById("estudiante").style.display = "block";
}
function menuProfesor() {
	document.getElementById("registrarse").style.display = "none";
	document.getElementById("login").style.display = "none";
	document.getElementById("logout").style.display = "block";
	document.getElementById("registrar_cal").style.display = "block";
	document.getElementById("consultar").style.display = "block";
	document.getElementById("profesor").style.display = "block";
}