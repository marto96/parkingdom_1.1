var hora_i = document.getElementById("hora_entrada"),
	hora_s = document.getElementById("hora_salida"),
	tiempo_p = document.getElementById("tiempo_parqueo"),
	verificar = document.getElementById("verificar"),
	placa = document.getElementById("placa"),
	cancelar = document.getElementById("cancelar"),
	aceptar = document.getElementById("enviar"),
	valor_t = document.getElementById("valor_tiempo"),
	id = document.getElementById("id");

function objetoAjax() {
	var a = !1;
	try {
		a = new ActiveXObject("Msxml2.XMLHTTP")
	} catch (c) {
		try {
			a = new ActiveXObject("Microsoft.XMLHTTP")
		} catch (b) {
			a = !1
		}
	}
	a || "undefined" == typeof XMLHttpRequest || (a = new XMLHttpRequest);
	return a
}

function enviarDatosMensual() {
	var b = document.getElementById("placa").value;
	//console.log(b);

	d = 0;
	ajax = objetoAjax();
	ajax.open("POST", "salida.php", !0);
	ajax.onreadystatechange = function () {
		if (4 == ajax.readyState && 200 == ajax.status) {
			d = JSON.parse(ajax.responseText);
			console.log(d);
			if (!d.error) {
				document.getElementById("id").value = d.id;
				hora_i.value = d['fecha_inicial'].date;
				hora_s.value = d['fecha_final'].date;
				tiempo_p.value = d.tiempo_total;
				valor_t.value = "$ " + d.valor_tiempo;
				document.getElementById("bloque").style.display = "block";
			} else {
				error_box.classList.add("active")
				error_box.style.background = "#c40018";
				error_box.innerHTML = "La placa " + b + " no se encuentra registrada, Verifique por favor";
			}
		};
	}

	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	parametro = "placa=" + b;
	//console.log(parametro);
	ajax.send(parametro)
}

function ejecutarPago() {
	var l = document.getElementById("hora_entrada").value;
	var m = document.getElementById("hora_salida").value;
	var n = document.getElementById("tiempo_parqueo").value;
	var b = document.getElementById("placa").value;
	var p = document.getElementById("valor_tiempo").value;
	var i = document.getElementById("id").value;

	d = 0;
	ajax = objetoAjax();
	ajax.open("POST", "insertar.php", !0);
	ajax.onreadystatechange = function () {
		if (4 == ajax.readyState && 200 == ajax.status) {
			d = ajax.responseText;
	//		console.log(d);
			if (d == "error") {
				error_box.classList.add("active")
				error_box.style.background = "#c40018";
				error_box.innerHTML = "Ha ocurrido un error, Verifique por favor";

			} else {
				error_box.classList.add("active")
				error_box.innerHTML = "Transaccion Exitosa";
				error_box.style.background = "#3ead47";
				id.value = "";
				placa.value = "";
				hora_i.value = "";
				hora_s.value = "";
				tiempo_p.value = "";
				valor_t.value = "";
				document.getElementById("bloque").style.display = "none";
			}
		};
	}

	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	parametro = "placa=" + b + "&hora_salida=" + m + "&tiempo_parqueo=" + n + "&valor_tiempo=" + p + "&id=" + i;
	console.log(parametro);
	ajax.send(parametro)
}
placa.addEventListener("focus", function (e) {
	error_box.classList.remove("active")
	id.value = "";
	hora_i.value = "";
	hora_s.value = "";
	tiempo_p.value = "";
	valor_t.value = "";
	document.getElementById("bloque").style.display = "none";
});
aceptar.addEventListener("click", function (e) {
	e.preventDefault();
	ejecutarPago();
});
cancelar.addEventListener("click", function (e) {
	id.value = "";
	placa.value = "";
	hora_i.value = "";
	hora_s.value = "";
	tiempo_p.value = "";
	valor_t.value = "";
	document.getElementById("bloque").style.display = "none";
});
verificar.addEventListener("click", function (e) {
	e.preventDefault();
	if (placa.value == "") {
		error_box.classList.add("active")
		error_box.style.background = "orange";
		error_box.innerHTML = "Por favor digite una placa que se encuentre registrada";
	} else {
		enviarDatosMensual();
	}
});
