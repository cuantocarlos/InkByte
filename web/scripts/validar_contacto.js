import { validarCorreoElectronico, validarNombre } from "./bGeneral";

const bAceptar = document.getElementById("bAceptar");
const formNombre = document.getElementById('name');
const formAsunto = document.getElementById('asunto');
const formDescripcion = document.getElementById('description');
const formCorreo = document.getElementById('mail');
const formTelefono = document.getElementById('telephone');
const formOpcion = document.getElementById('horario');
const formTerminos = document.getElementById('terminos');

window.onload = function () {
    //si teminos no está seleccionado, no se puede enviar el formulario
    bAceptar.addEventListener("click", function () {
        if (!formOpcion.checked) {
            alert("Debes aceptar los términos y condiciones");
            event.preventDefault();
        }
    });

}

