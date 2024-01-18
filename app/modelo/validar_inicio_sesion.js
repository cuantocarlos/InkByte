import { validarCorreoElectronico } from "../libs/bGeneral.js";


window.onload = function () {
    console.log("1.Entra en js validar sesion");
    let email = document.getElementById("mail");
    email.addEventListener("blur", function (event) {
        console.log(validarCorreoElectronico(email.value));
        if (validarCorreoElectronico(email.value) == false) {
            console.log("2.Entra en if validar sesion ");
            event.preventDefault()
            
        }
    });
};