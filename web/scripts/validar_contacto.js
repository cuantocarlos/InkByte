import { validarCorreoElectronico, validarNombre, validarTelefono} from "./bGeneral.js"

const bAceptar = document.getElementById("bAceptar")
const formNombre = document.getElementById('name')
const formAsunto = document.getElementById('asunto')
const formCorreo = document.getElementById('mail')
const formTelefono = document.getElementById('telephone')
const formTerminos = document.getElementById('terminos')

window.onload = function () {
    //si teminos no está seleccionado, no se puede enviar el formulario
    bAceptar.addEventListener("click", function () {
        if (!formTerminos.checked) {
            alert("Debes aceptar los términos y condiciones")
            event.preventDefault()
            formTerminos.focus()
        }
        if (formNombre.value.trim().length === 0) {
            event.preventDefault()
            console.log("nombre vacio")
            formNombre.classList.remove("is-valid")
            formNombre.classList.add("is-invalid")
            document.getElementById("nombreMal").innerText = "No puede quedar vacío este campo."
            formNombre.focus()
        }
        if (formAsunto.value.trim().length === 0) {
            event.preventDefault();
            formAsunto.classList.remove("is-valid")
            formAsunto.classList.add("is-invalid")
            document.getElementById("asuntoMal").innerText = "No puede quedar vacío este campo."
            formAsunto.focus()
        }
        if (formCorreo.value.trim().length === 0) {
            event.preventDefault()
            formCorreo.classList.remove("is-valid")
            formCorreo.classList.add("is-invalid")
            document.getElementById("mailMal").innerText = "No puede quedar vacío este campo."
            formCorreo.focus()
        }
    }, true)

    formNombre.addEventListener('input', () => {
        const nom = formNombre.value.trim()
        if (!validarNombre(nom)) {
            formNombre.classList.remove("is-valid")
            formNombre.classList.add("is-invalid")
        } else {
            formNombre.classList.remove("is-invalid")
            formNombre.classList.add("is-valid")
        }
    })
    formCorreo.addEventListener('input', () => {
        const mail = formCorreo.value.trim()
        if (!validarCorreoElectronico(mail)) {
            formCorreo.classList.remove("is-valid")
            formCorreo.classList.add("is-invalid")
        } else {
            formCorreo.classList.remove("is-invalid")
            formCorreo.classList.add("is-valid")
        }
    })
    formTelefono.addEventListener('input', () => {
        const tel = formTelefono.value.trim()
        if (!validarTelefono(tel)) {
            formTelefono.classList.remove("is-valid")
        } else {
            formTelefono.classList.add("is-valid")
        }
    })

}

