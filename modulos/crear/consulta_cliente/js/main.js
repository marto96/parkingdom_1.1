var btn_cargar = document.getElementById('btn_cargar_clientes');
var error_box = document.getElementById('error_box');
var tabla = document.getElementById('tabla');
var loader = document.getElementById('loader');

var tipDoc = document.getElementById('tipo_documento');
var numDoc = document.getElementById('num_documento');
var nombre = document.getElementById('nombre');
var apellido = document.getElementById('apellido');
var direccion = document.getElementById('direccion');
var telefono = document.getElementById('telefono');
var correo = document.getElementById('correo');
var observaciones = document.getElementById('observaciones');
//obj.value = setFormato(new Date());

var usuario_placa,
	usuario_fecha_inicio,
	usuario_fecha_fin;


function objetoAjax() {
	var xmlhttp = false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {

		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}

	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

$(document).ready(function() {
    cargarUsuarios();
});
function cargarUsuarios() {
	tabla.innerHTML = '<tr><th># DOCUMENTO</th><th>NOMBRE</th><th>APELLIDO</th><th>DIRECCION</th><th>TELEFONO</th><th>PLACA</th><th>Opciones</th></tr>';

	var peticion = new XMLHttpRequest();
	peticion.open('GET', 'pagos.php');

	loader.classList.add('active');
	peticion.onload = function () {
		var datos = JSON.parse(peticion.responseText);
		console.log(datos);
		if (datos.error) {
			error_box.classList.add('active');
		} else {

			for (var i = 0; i < datos.length; i++) {
				var elemento = document.createElement('tr');
				elemento.innerHTML += ("<td>" + datos[i].num_documento + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].nombre + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].apellido + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].direccion + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].telefono + "</td>");
				elemento.innerHTML += ("<td>" + datos[i].placa + "</td>");
				elemento.innerHTML += ("<td><div class='botones'> <button class='editar_btn' id='editar'> <img class='editar'  style='width:20px;height:30px;' src='../../imagenes/editar.svg'/></button><button id='eliminar' class='eliminar_btn'> <img class='eliminar' style='width:20px;height:30px;' src='../../imagenes/eliminar.svg'/></button></div></td>");

				tabla.appendChild(elemento);

			}
			var modal = document.getElementById('myModal');
			var modal1 = document.getElementById('myModal1');
			var span1 = document.getElementsByClassName("close")[1];
			var span = document.getElementsByClassName("close")[0];

			$(".editar_btn").on("click", function () {

				var num_documento = $(this).closest('tr').children()[0].textContent;
				var nombre = $(this).closest('tr').children()[1].textContent;
				var apellido = $(this).closest('tr').children()[2].textContent;
				var direccion = $(this).closest('tr').children()[3].textContent;
				var telefono = $(this).closest('tr').children()[4].textContent;
				var placa = $(this).closest('tr').children()[5].textContent;
                var imb = "num_documento=" + num_documento + "&nombre=" + nombre + "&apellido=" + apellido + "&direccion=" + direccion +"&telefono=" + telefono + "&placa=" + placa;
	           
                console.log(imb);
                window.open('../crear_cliente.php?'+imb,'_self');
                
			});
			$(".eliminar_btn").on("click", function () {
				modal1.style.display = "block";
				var num_documento = $(this).closest('tr').children()[0].textContent;
				var placa = $(this).closest('tr').children()[5].textContent;
				document.getElementById('num_documento').value = num_documento;
				document.getElementById('placa').value = placa;
				span1.onclick = function () {
					modal1.style.display = "none";
				}
			});


			//			var editar = document.getElementsByClassName('editar_btn');
			//			var eliminar = document.getElementsByClassName('eliminar_btn');
			//			var modal = document.getElementById('myModal');
			//			var modal1 = document.getElementById('myModal1');
			//			var span = document.getElementsByClassName("close")[0];
			//			var span1 = document.getElementsByClassName("close")[1];
			//			console.log(editar);
			//			console.log(eliminar);
			//			editar.addEventListener("click", function () {
			//				modal.style.display = "block";
			//			});
			//			eliminar.addEventListener("click", function () {
			//				modal1.style.display = "block";
			//			});
			//			span.onclick = function () {
			//				modal.style.display = "none";
			//			}
			//			span1.onclick = function () {
			//				modal1.style.display = "none";
			//			}
			//
			//			window.onclick = function (event) {
			//				if (event.target == modal) {
			//					modal.style.display = "none";
			//				}
			//			}
			//			window.onclick = function (event) {
			//				if (event.target == modal1) {
			//					modal1.style.display = "none";
			//				}
			//			}
		}
	}


	peticion.onreadystatechange = function () {
		if (peticion.readyState == 4 && peticion.status == 200) {
			loader.classList.remove('active');
		}
	}
	peticion.send();

}

function formulario_valido() {
	if (usuario_placa == '') {
		return false;
	} else if (usuario_fecha_inicio == '') {
		return false;

	} else if (usuario_fecha_fin == '') {
		return false;
	}
	return true;

}
$("#cambiar").on("click", function (e) {
	e.preventDefault();
	modificarPago();
});
$("#eliminar").on("click", function (e) {
	e.preventDefault();
	eliminarPago();
});

function eliminarPago() {
	ajax = objetoAjax();
	ajax.open("POST", "eliminar.php", !0);

	usuario_id = formulario_eliminar.ide.value.trim();

	var modal = document.getElementById('myModal1');



	error_box.classList.remove('active');
	var parametros = 'id=' + usuario_id;
	console.log(parametros);


	loader.classList.add('active');

	ajax.onreadystatechange = function () {

		if (ajax.readyState == 4 && ajax.status == 200) {
			loader.classList.remove('active');
			var recibido = (ajax.responseText);
			console.log(recibido);
			if (recibido != "error") {
				modal.style.display = "none";
				cargarUsuarios();

			} else {
				error_box.classList.add('active');
				error_box.innerHTML = 'No se pudo eliminar el registro, Verifique por favor.';
			}
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(parametros);

}


function modificarPago() {
	ajax = objetoAjax();
	ajax.open("POST", "insertar.php", !0);

	usuario_placa = formulario_editar.placa.value.trim();
	usuario_fecha_inicio = formulario_editar.fecha_inicio.value.trim();
	usuario_fecha_fin = formulario_editar.fecha_fin.value.trim();
	usuario_valor_mes = formulario_editar.valor.value.trim();
	usuario_id = formulario_editar.id.value.trim();
	var modal = document.getElementById('myModal');



	error_box.classList.remove('active');
	var parametros = 'placa=' + usuario_placa + '&fecha_inicio=' + usuario_fecha_inicio + '&valor_mes=' + usuario_valor_mes + '&fecha_fin=' + usuario_fecha_fin+ '&id=' + usuario_id;
	console.log(parametros);


	loader.classList.add('active');

	ajax.onreadystatechange = function () {

		if (ajax.readyState == 4 && ajax.status == 200) {
			loader.classList.remove('active');
			var recibido = (ajax.responseText);
			console.log(recibido);
			if (recibido != "error") {
				modal.style.display = "none";
				cargarUsuarios();
				formulario.placa.value = '';
				formulario.fecha_inicio.value = '';
				formulario.fecha_fin.value = '';
			} else {
				error_box.classList.add('active');
				error_box.innerHTML = 'La placa ingresada no tiene mensualidad, Verifique por favor.';
			}
		}
	}
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(parametros);

}

function agregarUsuarios(e) {
	e.preventDefault();

	ajax = objetoAjax();
	ajax.open("POST", "insertar.php", !0);

	usuario_placa = formulario.placa.value.trim();
	usuario_fecha_inicio = formulario.fecha_inicio.value.trim();
	usuario_fecha_fin = formulario.fecha_fin.value.trim();
	usuario_valor_mes = formulario.valor.value.trim();


	if (formulario_valido()) {
		error_box.classList.remove('active');
		var parametros = 'placa=' + usuario_placa + '&fecha_inicio=' + usuario_fecha_inicio + '&valor_mes=' + usuario_valor_mes + '&fecha_fin=' + usuario_fecha_fin;
		console.log(parametros);


		loader.classList.add('active');

		ajax.onreadystatechange = function () {

			if (ajax.readyState == 4 && ajax.status == 200) {
				loader.classList.remove('active');
				var recibido = (ajax.responseText);
				console.log(recibido);
				if (recibido != "error") {
					cargarUsuarios();
					formulario.placa.value = '';
					formulario.fecha_inicio.value = '';
					formulario.fecha_fin.value = '';
				} else {
					error_box.classList.add('active');
					error_box.innerHTML = 'La placa ingresada no tiene mensualidad, Verifique por favor.';
				}
			}
		}
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send(parametros);

	} else {
		error_box.classList.add('active');
		error_box.innerHTML = 'Por favor completa el formulario correctamente';
	}

}

placa.addEventListener('focus', function (e) {
	error_box.classList.remove('active');
	valor.value = '';
	valor.setAttribute("disabled", "false");
});
placa.addEventListener('focusout', function (e) {
	var equipo = document.getElementById('placa').value;
	if (placa.value == "") {
		error_box.classList.add("active")
		error_box.style.background = "orange";
		error_box.innerHTML = "Por favor digite una placa que se encuentre registrada";
	} else {

		var respuesta = 0;

		//instanciamos el objetoAjax
		ajax = objetoAjax();

		//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas
		ajax.open("POST", "consulta.php", true);

		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
		ajax.onreadystatechange = function () {

			//Cuando se completa la petición, mostrará los resultados
			if (ajax.readyState == 4 && ajax.status == 200) {

				//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'
				respuesta = (ajax.responseText)
				//console.log(respuesta);
				if (respuesta != "error") {
					valor.value = respuesta;
					valor.setAttribute("disabled", "true");
				} else {
					error_box.classList.add('active');
					error_box.innerHTML = 'La placa ingresada no tiene mensualidad, Verifique por favor.';
				}
			}
		}
		//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario.
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		var parametro = "placa=" + equipo;
		//console.log(parametro);
		//enviamos las variables a 'consulta.php'
		ajax.send(parametro)
	}

});

btn_cargar.addEventListener('click', function () {
	cargarUsuarios();
});


formulario.addEventListener('submit', function (e) {
	agregarUsuarios(e);
});

obj.addEventListener('focusout', function () {
	AddMes();
});
