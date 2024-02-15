import { compruebaNombre, modificaNivelUsuario, validarPassword } from "./bGeneral.js";

var nombre = document.getElementById("nombre");
var nivel = document.querySelectorAll('input[name="opcion_usuario"]');
var nivelUsuario = document.getElementById("nivel_usuario").innerText;
var pass = document.getElementById("pass");
var pass2 = document.getElementById("pass2");
var old = document.getElementById("oldPass");
var oldMalDiv = document.getElementById("oldMal");

window.onload = function () {
  recibeGeneros();
  const name = nombre.value;

  if (nivelUsuario == 1) {
    document.getElementById("lector").setAttribute("checked", "checked");
  } else if (nivelUsuario == 2) {
    document.getElementById("escritor").setAttribute("checked", "checked");
  }

  document.querySelectorAll('input[name="generoUsuario[]"]').forEach(checkbox => {
    checkbox.addEventListener("change", function () {
      updateGeneros();
    });

    nombre.addEventListener('input', () => {
      const nom = nombre.value.trim();
      if (nom.length === 0) {
        nombre.classList.remove("is-valid");
        nombre.classList.add("is-invalid");
        document.getElementById("nombreMal").innerText = "No puede quedar vacío este campo.";
      } else {
        if (nom === name) {
          nombre.classList.remove("is-valid");
          nombre.classList.remove("is-invalid");
          document.getElementById("nombreMal").innerText = "";
        } else {
          compruebaNombre(nom);
        }
      }
    });

    pass.addEventListener('input', () => {
      const contrasenia = pass.value;
      validarPassword(contrasenia);
    });

    nivel.forEach(function (radioButton) {
      radioButton.addEventListener('change', function () {
        var nivel;
        if (radioButton.value === "lector") {
          nivel = 1;
        } else if (radioButton.value === "escritor") {
          nivel = 2;
        }
        modificaNivelUsuario(nivel);
      });
    });

    pass2.addEventListener('focus', () => {
      pass2.classList.remove("is-valid");
      pass2.classList.remove("is-invalid");
      document.getElementById("pass2Mal").innerText = "";
    });


    pass2.addEventListener('blur', () => {
      const contrasenia = pass.value;
      const contrasenia2 = pass2.value;
      let igual = false;
      if (contrasenia2 !== contrasenia) {
        igual = true;
      }
      if (igual) {
        pass2.classList.add("is-invalid");
        document.getElementById("pass2Mal").innerText = "La contraseña no coincide";
      } else {
        pass2.classList.remove("is-invalid");
        document.getElementById("pass2Mal").innerText = "";
      }
    });

    old.classList.toggle("is-invalid", oldMalDiv !== null);

    old.addEventListener('focus', () => {
      if (oldMalDiv !== null) {
        oldMalDiv.remove();
        old.classList.remove("is-invalid");
      }
    });


  });

}

function recibeGeneros() {
  const httpRequest = new XMLHttpRequest();

  httpRequest.open('GET', 'http://localhost/InkCasa/InkByte/web/index.php?ctl=generoUsuarioSelect', true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState === 4 && httpRequest.status === 200) {
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

  httpRequest.open('POST', 'http://localhost/InkCasa/InkByte/web/index.php?ctl=generoUsuario', true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState === 4 && httpRequest.status === 200) {
      console.log(httpRequest.responseText);
    }
  }

  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  httpRequest.send('generos=' + encodeURIComponent(generosMarcados));
}







