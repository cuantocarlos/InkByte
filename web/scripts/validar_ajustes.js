import {validarCorreoElectronico, validarPassword, validarFecha, compruebaNombre, compruebaCorreo} from "./bGeneral.js";

var nombre = document.getElementById("nombre")
var nick = document.getElementById("nick");
var email = document.getElementById("mail");
var oldpass = document.getElementById("oldpass");
var pass = document.getElementById("pass");
var pass2 = document.getElementById("pass2");
var fecha = document.getElementById("fecha");
var descripcion = document.getElementById("descripcion");
var rol = document.getElementsByName("options-base");



window.onload = function () {
    //cojo lo que hay en la base de datos y lo pongo en los campos

    nombre.addEventListener('input', () => {
        const nom = nombre.value.trim();
        compruebaNombre(nom);
    });



    fecha.addEventListener('change', () => {
        let fechaValida = false;
        const fechaMal = document.getElementById("fechaMal");
        if (!validarFecha(fecha.value)) {
            fechaValida = true;
            fechaMal.innerText = "La fecha de nacimiento no existe";
        } else {
            fechaValida = false;
            fechaMal.innerText = "";
        }

        fecha.classList.toggle("is-invalid", fechaValida);
    });


    email.addEventListener('blur', () => {
        const mail = email.value.trim();
        if (validarCorreoElectronico(mail) == true) {
            compruebaCorreo(mail);
        } else {
            email.classList.add("is-invalid");
            document.getElementById("mailMal").innerText = "El email no existe";
        }
    });

    pass.addEventListener('input', () => {
        const contrasenia = pass.value;
        validarPassword(contrasenia);
    });

    pass2.addEventListener('blur', () => {
        const contrasenia = pass.value;
        const contrasenia2 = pass2.value;
        let contieneMayus = false;
        if (contrasenia2 !== contrasenia) {
            contieneMayus = true;
        }
        if (contieneMayus) {
            pass2.classList.add("is-invalid");
            document.getElementById("pass2Mal").innerText = "La contraseña no coincide";
        } else {
            pass2.classList.remove("is-invalid");
            document.getElementById("pass2Mal").innerText = "";
        }
    });

}

