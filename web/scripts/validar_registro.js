import { validarNombre, validarCorreoElectronico, validarPassword, validarFecha, validarRol, compruebaNombre, compruebaCorreo} from "./bGeneral.js";

var bAceptar = document.getElementById("bAceptar");
var nombre = document.getElementById("nombre");
var email = document.getElementById("mail");
var pass = document.getElementById("pass");
var pass2 = document.getElementById("pass2");
var fecha = document.getElementById("fecha");
var rol = document.getElementsByName("options-base");
var terminosCondiciones = document.getElementById("terminos");

window.onload = function () {

  bAceptar.addEventListener("click", function () {
    if(validarCampos() == false){
      event.preventDefault();
    }
  });

  nombre.addEventListener('blur', ()=>{
    const nom = nombre.value.trim();

    compruebaNombre(nom);
  });

  email.addEventListener('blur', ()=>{
    const mail = email.value.trim();

    compruebaCorreo(mail);
  });
}

function validarCampos(){
  if( validarCorreoElectronico(email.value) == false ){
    console.log("Error en el campo email");
    return false;
  }
  if( validarNombre(nombre.value) == false ){
    console.log("Error en el campo nombre");
    return false;
  }
  if( validarPassword(pass.value) == false ){
    console.log("Error en el campo pass");
    return false;
  }
  if(pass.value !== pass2.value){
    console.log("Error en el campo pass2");
    return false;
  }
  if( validarFecha(fecha.value) == false ){
    console.log("Error en el campo fecha");
    return false;
  }
  if( validarRol(rol.value) == false){
    console.log("Error en el campo rol");
    return false;
  }
  if( !terminosCondiciones.checked){
    alert("Debes aceptar los términos y condiciones");
    return false;
  }
}