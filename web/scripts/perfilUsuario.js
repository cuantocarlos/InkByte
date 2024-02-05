import {compruebaNombre , nivelUsuario} from "./bGeneral.js";

var nombre = document.getElementById("nombre");


window.onload = function () {
  recibeGeneros();
  const name = nombre.value;

  document.querySelectorAll('input[name="generoUsuario[]"]').forEach(checkbox => {
    checkbox.addEventListener("change", function () {
      updateGeneros();
    });

    nombre.addEventListener('input', ()=>{
      const nom = nombre.value.trim();
      if(nom.length===0){
        nombre.classList.remove("is-valid");
        nombre.classList.add("is-invalid");
        document.getElementById("nombreMal").innerText="No puede quedar vacío este campo.";
      }else{
        if(nom===name){
          nombre.classList.remove("is-valid");
          nombre.classList.remove("is-invalid");
          document.getElementById("nombreMal").innerText="";
        }else{
          compruebaNombre(nom);
        }
      }
    });


  });

}

function recibeGeneros(){
  const httpRequest = new XMLHttpRequest();

    httpRequest.open('GET','http://localhost/InkCasa/InkByte/web/index.php?ctl=generoUsuarioSelect',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

    httpRequest.onreadystatechange = function () {
      if(httpRequest.readyState === 4 && httpRequest.status === 200) {
        console.log(httpRequest.responseText);
        var respuesta = JSON.parse(httpRequest.responseText);
        for (var genero in respuesta) {
                document.getElementById(genero).checked = respuesta[genero] === 1;
        }
      }
    }
    httpRequest.send(null);
}

function updateGeneros() {
  const httpRequest = new XMLHttpRequest();
  var generosMarcados = Array.from(document.querySelectorAll('input[name="generoUsuario[]"]:checked')).map(checkbox => checkbox.value);
  console.log(generosMarcados);

  httpRequest.open('POST','http://localhost/InkCasa/InkByte/web/index.php?ctl=generoUsuario',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

  httpRequest.onreadystatechange = function () {
    if(httpRequest.readyState === 4 && httpRequest.status === 200) {
      console.log(httpRequest.responseText);
    }
  }

  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  httpRequest.send('generos=' + encodeURIComponent(generosMarcados));


}

