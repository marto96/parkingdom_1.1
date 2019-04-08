var consultar = document.getElementById("consultar");
var reporte = document.getElementById("reporte");
var estado = false;

/*-------------FUNCION OCULTAR--------------------*/
var contenedor_2 = document.getElementById("contenedor2");
contenedor_2.style.display = "none";

function esconder() {
    var plc = document.getElementById("placa");
    var plca = document.getElementById("lblplaca");

    var doc = document.getElementById("num_documento");
    var docum = document.getElementById("lbldoc");

    var tipo_cliente = document.getElementById("tipo_cliente");
    var typecliente = document.getElementById("lbltipo_cliente");

    var opcion = document.getElementById("reporte").value;
    var contenedor_2 = document.getElementById("contenedor2");

    if (opcion == "0") {
        contenedor_2.style.display = "none";

    } else if (opcion == "mensualidades") {
        typecliente.style.display = "none";
        plca.style.display = "block";
        docum.style.display = "block";
        contenedor_2.style.display = "block";
        tipo_cliente.setValue = "";

    } else if (opcion == "transaccion") {
        docum.style.display = "none";
        plca.style.display = "block";
        typecliente.style.display = "block";
        contenedor_2.style.display = "block";
        doc.setValue = 0;

    } else if (opcion == "ingresos") {
        docum.style.display = "none";
        plca.style.display = "none";
        contenedor_2.style.display = "block";
        doc.setValue = "";
        plc.setValue = "";

    } else {
        contenedor_2.style.display = "block";
    }
}

/*--------FUNCION ENVIAR DATOS A PROCESAR_DATOS.PHP---------*/
function objetoAjax() {
    var a = !1;
    try {
        a = new ActiveXObject("Msxml2.XMLHTTP")
    } catch (c) {
        try {
            a = new ActiveXObject("Microsoft.+XMLHTTP")
        } catch (b) {
            a = !1
        }
    }
    a || "undefined" == typeof XMLHttpRequest || (a = new XMLHttpRequest);
    return a
}

consultar.addEventListener("click", function (e) {
    e.preventDefault();

    var placa = document.getElementById("placa").value;
    var documento = document.getElementById("num_documento").value;
    var fechai = document.getElementById("fecha_ingreso").value;
    var fechaf = document.getElementById("fecha_salida").value;
    var report = document.getElementById("reporte").value;
    var type_cliente = document.getElementById("tipo_cliente").value;
    var type_vehiculo = document.getElementById("tipo_vehiculo").value;

    if (report == "transaccion") {
        var parametro = "";

        parametro += "&num_documento=" + "0";

        if (placa != "")
            parametro += "&placa=" + placa;
        else
            parametro += "&placa=" + "0";

        if (fechai != "")
            parametro += "&fecha_ingreso=" + fechai;
        else
            parametro += "&fecha_ingreso=" + "0";

        if (type_vehiculo != "")
            parametro += "&tipo_vehiculo=" + type_vehiculo;
        else
            parametro += "&tipo_vehiculo=" + "0";

        if (type_cliente != "")
            parametro += "&tipo_cliente=" + type_cliente;
        else
            parametro += "&tipo_cliente=" + "0";

        if (fechaf != "")
            parametro += "&fecha_salida=" + fechaf;
        else
            parametro += "&fecha_salida=" + "0";

        if (placa == "0" && fechai == "" && fechaf == "" && type_vehiculo == "0") {
            alert('NO se llenaron datos');
            return;
        } else {
            parametro += "&reporte=" + report;
            cargarTransaccion(parametro);
        }

    } 
    
    else if (report == "mensualidades") {
        var parametro = "";

        parametro += "&tipo_cliente=" + "0";
        
        if (placa != "")
            parametro += "&placa=" + placa;
        else
            parametro += "&placa=" + "0";

        if (fechai != "")
            parametro += "&fecha_ingreso=" + fechai;
        else
            parametro += "&fecha_ingreso=" + "0";
        
        if (documento != 0)
            parametro += "&num_documento=" + documento;
        else
            parametro += "&num_documento=" + "0";

        if (type_vehiculo != "")
            parametro += "&tipo_vehiculo=" + type_vehiculo;
        else
            parametro += "&tipo_vehiculo=" + "0";

        if (fechaf != "")
            parametro += "&fecha_salida=" + fechaf;
        else
            parametro += "&fecha_salida=" + "0";

        if (placa == 0 && fechai == "" && fechaf == "" && documento == 0 && type_vehiculo == 0) {
            alert('NO se llenaron datos');
            return;
        } else {
            parametro += "&reporte=" + report;
            cargarMensualidades(parametro);
        }
    } 
    
    else if (report == "ingresos") {
        var parametro = "";
        
        parametro += "&num_documento=" + "0";
        parametro += "&placa=" + "0";
        
        if (fechai != "")
            parametro += "&fecha_ingreso=" + fechai;
        else
            parametro += "&fecha_ingreso=" + "0";

        if (type_vehiculo != "")
            parametro += "&tipo_vehiculo=" + type_vehiculo;
        else
            parametro += "&tipo_vehiculo=" + "0";

        if (type_cliente != "")
            parametro += "&tipo_cliente=" + type_cliente;
        else
            parametro += "&tipo_cliente=" + "0";

        if (fechaf != "")
            parametro += "&fecha_salida=" + fechaf;
        else
            parametro += "&fecha_salida=" + "0";

        if (fechai == "" && fechaf == "" && type_cliente == 0 && type_vehiculo == 0) {
            alert('NO se llenaron datos');
            return;
        } else {
            parametro += "&reporte=" + report;
            cargarIngreso(parametro);
        }
    }
});

/*--------FUNCION DEVOLVER DATOS DE PROCESAR_DATOS.PHP---------*/

var table = document.getElementById("tbtabla");

function cargarTransaccion(a) {
    //alert(a);
    table.innerHTML = '<tr><th>Placa</th><th>Tipo de vehiculo</th><th>Tipo de cliente</th><th>Fecha de inicio</th><th>Fecha de fin</th><th>Espacio</th><th>Operador de registro</th></tr>';
    
    var parametro = a;
    ajax = objetoAjax();
    ajax.open("POST", "procesar_datos.php", !0);
    ajax.onreadystatechange = function () {
        if (4 == ajax.readyState && 200 == ajax.status) {

            //d = ajax.responseText;

            var d = JSON.parse(ajax.responseText);
            console.log(d);

            if (!d.error) {
                
                if(d==""){
                    alert('El Dato ingresado no existe o es incorrecto');
                }else{
                    
                    $('.seccionToggle').slideToggle();

                        if (estado == true) {
                            $(this).text("Abrir");
                            $('body').css({
                                "overflow": "auto"
                            });
                            estado = false;
                        } else {
                            $(this).text("");
                            $('body').css({
                                "overflow": "hidden"
                            });
                            estado = true;
                        }
                    
                    for (var i = 0; i < d.length; i++) {

                    var elemento = document.createElement('tr');
                    elemento.innerHTML += ("<td>" + d[i].PLACA + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].TIPO_DE_VEHICULO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].TIPO_CLIENTE + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].FECHA_INICIO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].FECHA_FIN + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].ESPACIO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].USUARIO_DE_REGISTRO + "</td>");
                    document.getElementById('tbtabla').appendChild(elemento);
                    }
                }
            } else {
                error_box.classList.add("active")
                error_box.style.background = "#c40018";
                error_box.innerHTML = "No se encuentran DATOS, Verifique por favor";
            }
        }
    }

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //console.log(parametro);
    ajax.send(parametro)

}

function cargarMensualidades(a) {
    //alert(a);
    table.innerHTML = '<tr><th>Placa</th><th>Tipo de vehiculo</th><th>N° Documento</th><th>Nombre</th><th>Apellido</th><th>Estado</th><th>Desde</th><th>Hasta</th></tr>';

    var parametro = a;
    ajax = objetoAjax();
    ajax.open("POST", "procesar_datos.php", !0);
    ajax.onreadystatechange = function () {
        if (4 == ajax.readyState && 200 == ajax.status) {

            //d = ajax.responseText;

            var d = JSON.parse(ajax.responseText);
            console.log(d);

            if (!d.error) {
                
                if(d==""){
                    alert('El Dato ingresado no existe o es incorrecto');
                }else{
                    $('.seccionToggle').slideToggle();

                        if (estado == true) {
                            $(this).text("Abrir");
                            $('body').css({
                                "overflow": "auto"
                            });
                            estado = false;
                        } else {
                            $(this).text("");
                            $('body').css({
                                "overflow": "hidden"
                            });
                            estado = true;
                        }
                    
                    for (var i = 0; i < d.length; i++) {
                    var elemento = document.createElement('tr');
                    elemento.innerHTML += ("<td>" + d[i].PLACA + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].TIPO_DE_VEHICULO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].N_DOCUMENTO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].NOMBRE + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].APELLIDO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].ESTADO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].DESDE + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].HASTA + "</td>");
                    document.getElementById('tbtabla').appendChild(elemento);
                    }
                }
                
            } else {
                error_box.classList.add("active")
                error_box.style.background = "#c40018";
                error_box.innerHTML = "No se encuentran DATOS, Verifique por favor";
            }
        };
    }

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //console.log(parametro);
    ajax.send(parametro)

}

function cargarIngreso(a) {
    //alert(a);
    table.innerHTML = '<tr><th>Tipo de cliente</th><th>Tipo de vehiculo</th><th>Placa</th><th>Costo Parqueo</th><th>Desde</th><th>Hasta</th></tr>';

    var parametro = a;
    ajax = objetoAjax();
    ajax.open("POST", "procesar_datos.php", !0);
    ajax.onreadystatechange = function () {
        if (4 == ajax.readyState && 200 == ajax.status) {

            //d = ajax.responseText;

            var d = JSON.parse(ajax.responseText);
            console.log(d);

            if (!d.error) {
                
                if(d==""){
                    alert('El Dato ingresado no existe o es incorrecto');
                }else{
                    
                    $('.seccionToggle').slideToggle();

                        if (estado == true) {
                            $(this).text("Abrir");
                            $('body').css({
                                "overflow": "auto"
                            });
                            estado = false;
                        } else {
                            $(this).text("");
                            $('body').css({
                                "overflow": "hidden"
                            });
                            estado = true;
                        }
                    
                    for (var i = 0; i < d.length; i++) {
                    var elemento = document.createElement('tr');
                    elemento.innerHTML += ("<td>" + d[i].TIPO_DE_CLIENTE + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].TIPO_VEHICULO + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].PLACA + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].VALOR + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].DESDE + "</td>");
                    elemento.innerHTML += ("<td>" + d[i].HASTA + "</td>");
                    document.getElementById('tbtabla').appendChild(elemento);
                    }
                }
                
            } else {
                error_box.classList.add("active")
                error_box.style.background = "#c40018";
                error_box.innerHTML = "No se encuentran DATOS, Verifique por favor";
            }
        };
    }

    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //console.log(parametro);
    ajax.send(parametro)

}
/*------------------------------------------------------*/

