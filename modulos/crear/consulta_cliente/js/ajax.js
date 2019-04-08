//alert("afgfg");
var btn = document.getElementById('btn_cargar_clientes');
var loader = document.getElementById('loader');

btn.addEventListener('click', function () {
    var peticion = new XMLHttpRequest();
    peticion.open('GET', 'consulta.php');

    loader.classList.add('active');
    peticion.onload = function(){
        var datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
            var elemento = document.createElement('tr');
            elemento.innerHTML += ("<td>" + datos[i].num_documento + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].tipo_documento + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].nombre + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].apellido + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].direccion + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].telefono + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].correo + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].observaciones + "</td>");
            document.getElementById('tabla').appendChild(elemento);
        }
    }

    peticion.onreadystatechange = function () {

        if (peticion.readyState == 4 && peticion.status == 200) {

            loader.classList.remove('active');
        }

    }

    peticion.send();
});
