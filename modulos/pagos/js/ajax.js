//alert("afgfg");
var btn = document.getElementById('btn_cargar_usuarios');
var loader = document.getElementById('loader');

btn.addEventListener('click', function () {
    var peticion = new XMLHttpRequest();
    peticion.open('GET', 'pagos.php');

    loader.classList.add('active');
    peticion.onload = function(){
        var datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
            var elemento = document.createElement('tr');
            elemento.innerHTML += ("<td>" + datos[i].id + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].placa + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].fecha_inicio + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].fecha_fin + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].estado + "</td>");
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
