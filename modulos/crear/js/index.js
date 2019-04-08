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

$("#correo").focusout(function (e) {
	e.preventDefault();
	alert("asdafs");
	var b = document.getElementById("correo").value;
	ajax = objetoAjax();
	ajax.open("POST", "consulta.php", !0);
	ajax.onreadystatechange = function () {
		4 == ajax.readyState && 200 == ajax.status && (e = ajax.responseText, console.log(e),
			"existe" == e ? (alert("funciona")) : "sigue" == e && (error_box.classList.add("active"), error_box.innerHTML = "No se inserto el registro, Intente de Nuevo")
		)
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	w = "correo=" + b;
	console.log(w);
	ajax.send(w)
});
$("#usuario").focusout(function (e) {
	e.preventDefault();
	alert("asdafs");
	var b = document.getElementById("usuario").value;
	ajax = objetoAjax();
	ajax.open("POST", "consulta.php", !0);
	ajax.onreadystatechange = function () {
		4 == ajax.readyState && 200 == ajax.status && (e = ajax.responseText, console.log(e),
			"existe" == e ? (alert("funciona")) : "sigue" == e && (error_box.classList.add("active"), error_box.innerHTML = "No se inserto el registro, Intente de Nuevo")
		)
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	w = "usuario=" + b;
	console.log(w);
	ajax.send(w)
});
$("#enviar").click(function (e) {
	e.preventDefault();
	alert("as");
	enviarDatos();
});

function enviarDatos() {

	var a = document.getElementById("nombres").value;
	var c = document.getElementById("apellidos").value,
		b = document.getElementById("correo").value,
		f = document.getElementById("usuario").value,
		d = document.getElementById("contra").value,
		g = document.getElementById("tipo").value,
		e = 0;
	ajax = objetoAjax();
	ajax.open("POST", "guardar2.php", !0);
	ajax.onreadystatechange = function () {
		4 == ajax.readyState && 200 == ajax.status && (e = ajax.responseText, console.log(e),
			"funciona" == e ? (correcto_box.classList.add("active"),
    document.getElementById("formulario").reset()) : "nofunciona" == e && (error_box.classList.add("active"), error_box.innerHTML = "No se inserto el registro, Intente de Nuevo")
		)
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	w = "nombres=" + a + "&apellidos=" + c + "&correo=" + b + "&usuario=" + f + "&contra=" + d + "&tipo=" + g;
	console.log(w);
	ajax.send(w)
}

$('.form').find('input, textarea').on('keyup blur focus', function (e) {

	var $this = $(this),
		label = $this.prev('label');

	if (e.type === 'keyup') {
		if ($this.val() === '') {
			label.removeClass('active highlight');
		} else {
			label.addClass('active highlight');
		}
	} else if (e.type === 'blur') {
		if ($this.val() === '') {
			label.removeClass('active highlight');
		} else {
			label.removeClass('highlight');
		}
	} else if (e.type === 'focus') {

		if ($this.val() === '') {
			label.removeClass('highlight');
		} else if ($this.val() !== '') {
			label.addClass('highlight');
		}
	}

});

$('.tab a').on('click', function (e) {

	e.preventDefault();

	$(this).parent().addClass('active');
	$(this).parent().siblings().removeClass('active');

	target = $(this).attr('href');

	$('.tab-content > div').not(target).hide();

	$(target).fadeIn(600);

});
