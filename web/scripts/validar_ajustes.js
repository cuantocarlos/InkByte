import { validarCorreoElectronico, validarPassword, validarFecha, compruebaNombreAjustes, compruebaCorreo, compruebaNick } from "./bGeneral.js";

window.onload = function () {
    console.log('entra')

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
        const mail = inputEmail.value.trim();
        if (validarCorreoElectronico(mail) == true) {
            compruebaCorreo(mail);
        } else {
            inputEmail.classList.add("is-invalid");
            document.getElementById("mailMal").innerText = "El email no existe";
        }
    });

    inputOldPass.addEventListener('change', () => {//acabar parte de las contraseñas al enfiar el formulario
        console.log("entra en contraseñaold")
        const inputOldPass = inputOldPass.value.trim()
    }
    )

    inputPass.addEventListener('input', () => {
        validarPassword(inputPass.value)
    })

    inputPass2.addEventListener('blur', () => {
        const contrasenia = inputPass.value;
        const contrasenia2 = inputPass2.value;
    
        if (contrasenia2 !== contrasenia) {
            pass2.classList.add("is-invalid");
            document.getElementById("pass2Mal").innerText = "La contraseña no coincide";
        } else {
            pass2.classList.remove("is-invalid");
            document.getElementById("pass2Mal").innerText = "";
        }
    });





}
//que si se ha llenado la contraseña antigua no se pueda cambiar el nombre ni el nick
//validar imagen
