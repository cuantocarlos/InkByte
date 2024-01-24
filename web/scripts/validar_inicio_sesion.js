import { validarCorreoElectronico, validarPassword} from "./bGeneral.js";

var bAceptar = document.getElementById("bAceptar");
var email = document.getElementById("mail");
var pass = document.getElementById("pass");

window.onload = function () {

    bAceptar.addEventListener("click", function (event) { // Add the 'event' parameter to the click event listener function
        if (validarCampos() == false) {
            event.preventDefault();
        }
    });
}

function validarCampos() {
    if (validarCorreoElectronico(email.value) == false) {
        console.log("Error en el campo email");
        return false;
    }
    if (validarPassword(pass.value) == false) {
        console.log("Error en el campo pass");
        return false;
    }
}