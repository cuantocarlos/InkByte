import { validarCorreoElectronico, validarPassword, validarFecha, compruebaNombreAjustes, compruebaCorreo, compruebaNick } from "./bGeneral.js";

window.onload = function () {

    const inputNombre = document.getElementById("nombre")
    const inputNick = document.getElementById("nick");
    const inputEmail = document.getElementById("mail");
    const inputOldPass = document.getElementById("oldpass");
    const inputPass = document.getElementById("pass");
    const inputPass2 = document.getElementById("pass2");
    const fecha = document.getElementById("fecha");
    const descripcion = document.getElementById("descripcion");
    const rol = document.getElementsByName("options-base");


    //cojo lo que hay en la base de datos y lo pongo en los campos

    inputNombre.addEventListener('blur', () => {
        const nombre = inputNombre.value.trim();
        compruebaNombreAjustes(nombre);
    });

    inputNick.addEventListener('blur', () => {
        const nick = inputNick.value.trim()
        compruebaNick(nick)
    })


    inputEmail.addEventListener('blur', () => {
        console.log("Entra mail")
        const mail = inputEmail.value.trim();
        if (validarCorreoElectronico(mail) == true) {
            compruebaCorreo(mail);
        } else {
            inputEmail.classList.add("is-invalid");
            document.getElementById("mailMal").innerText = "El email no existe";
        }
    });

    inputOldPass.addEventListener('', () => {//acabar parte de las contraseñas
        console.log("entra en contraseñaold")
        const oldPass = inputOldPass.value.trim()
        // if () {

        // } else {

        // }
    }
    )

    inputPass.addEventListener('input', () => {
        validarPassword(inputPass.value)
        
    })


}

