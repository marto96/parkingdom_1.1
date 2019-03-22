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

function enviarDatos() {
	
	 var a = document.getElementById("placa").value;
	var c = document.getElementById("tipovehiculo").value,
		b = document.getElementById("n_ubicacion").value,
		f = document.getElementById("placa"),
		d = document.getElementById("tipovehiculo"),
		g = document.getElementById("n_ubicacion"),
		e = 0;
	ajax = objetoAjax();
	ajax.open("POST", "ingreso.php", !0);
	ajax.onreadystatechange = function () {
		4 == ajax.readyState && 200 == ajax.status && (e = ajax.responseText,console.log(e),
			"correcto" == e ? (correcto_box.classList.add("active"),
				error_box.classList.remove("active"), f.value = "", d.value = "", g.value = "") : "incorrecto" == e ? (error_box.classList.add("active"), error_box.innerHTML = "No se inserto el registro, Intente de Nuevo") : "retorno" == e && (error_box.classList.add("active"), error_box.innerHTML = "La placa ingresada ya ha sido registrada previamente, Verifique por favor")
		)
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	w = "placa=" + a + "&tipovehiculo=" + c + "&ubicacion=" + b;
	console.log(w);
	ajax.send(w)
}

function enviarDatosMensual() {
	var a = document.getElementById("labl"),
		c = document.getElementById("n_ubicacion");
	document.getElementById("ubicacion_auto");
	document.getElementById("ubicacion_moto");
	var b = document.getElementById("placa").value,
		o = document.getElementById("tipovehiculo"),
		f = document.getElementById("tipovehiculo").value,
		d = 0;
	ajax = objetoAjax();
	ajax.open("POST", "consulta.php", !0);
	ajax.onreadystatechange = function () {
		if (4 == ajax.readyState && 200 == ajax.status) {
			d = JSON.parse(ajax.responseText);
			console.log(d);
			//			for (i = 0; i < d; i++) {
			if (d.cliente == "temporal") {
				error_box.classList.remove("active"),
					a.style.display = "none",
					document.getElementById("ubicacion_auto").style.display = "block"
				//					console.log(d[i]["tipo_vehiculo"]);
			} else {
				document.getElementById("tipovehiculo").value = d.tipo_vehiculo;
				a.style.display = "block", c.value = d.lugar,
					//						o.setAttribute("disabled","true"),
					document.getElementById("ubicacion_auto").style.display = "none", document.getElementById("ubicacion_moto").style.display = "none"
			}
			//			}
		}
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	b = "placa=" + b + "&tipovehiculo=" + f;
	//console.log(b);
	ajax.send(b)
}
var tipo = document.getElementById("tipovehiculo"),
	tipo1 = document.getElementById("placa"),
	seleccion_auto = document.getElementById("ubicacion_auto"),
	seleccion_moto = document.getElementById("ubicacion_moto");
seleccion_moto.style.display = "none";
seleccion_auto.style.display = "block";
tipo1.addEventListener("focusout", function (a) {
	enviarDatosMensual()
});
tipo1.addEventListener("focus", function (a) {
	a = document.getElementById("labl");
	document.getElementById("n_ubicacion").value = "";
	//	document.getElementById("tipovehiculo").setAttribute("disabled","false");
	error_box.classList.remove("active");
	a.style.display = "none";
	"motocicleta" == tipo.value ? (document.getElementById("ubicacion_auto").style.display = "none", document.getElementById("ubicacion_moto").style.display = "block") : "Automovil" == tipo.value && (document.getElementById("ubicacion_auto").style.display = "block", document.getElementById("ubicacion_moto").style.display = "none")
});
tipo.addEventListener("change", function (a) {
	a = document.getElementById("labl");
	var c = document.getElementById("n_ubicacion");
	a.style.display = "none";
	c.value = "";
	error_box.classList.remove("active");
	a = document.getElementById("tipovehiculo").value;
	"Automovil" == a ? (seleccion_moto.style.display = "none", seleccion_auto.style.display = "block") : "motocicleta" == a ? (seleccion_moto.style.display = "block", seleccion_auto.style.display = "none") : "Seleccione" == a && (seleccion_moto.style.display = "none", seleccion_auto.style.display =
		"block")
});
seleccion_moto.addEventListener("click", function (a) {
	seleccionUbicacion_moto(a)
});
seleccion_auto.addEventListener("click", function (a) {
	seleccionUbicacion_auto(a)
});
var formulariop = document.getElementById("enviop");
formulariop.addEventListener("click", function (a) {
	a.preventDefault();
	enviarDatos(a);
});

function seleccionUbicacion_auto(a) {
	a.preventDefault();
	document.getElementById("iframe").style.display = "block"
}

function seleccionUbicacion_moto(a) {
	a.preventDefault();
	document.getElementById("iframe").style.display = "block"
};
