import { validarNombre, verificarLibro } from "./bGeneral.js";

var bAceptar = document.getElementById("bAceptar");
var opcion = document.getElementById("tus_opciones");
var titulo = document.getElementById("titulo_cap");


window.onload = function () {

  bAceptar.addEventListener("click", function () {
    if (validarCampos() == false) {
      this.preventDefault();
    }
  });
}

function validarCampos() {
  if (validarNombre(titulo.value) == false) {
    console.log("Error en el campo nombre");
    return false;
  }

  if (verificarLibro(opcion.value) == false)
    console.log("Error en el campo nombre");
  return false;
}
