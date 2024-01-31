import {validarCorreoElectronico, validarPassword, validarFecha, validarRol, compruebaNombre, compruebaCorreo} from "./bGeneral.js";

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

  nombre.addEventListener('input', ()=>{
    const nom = nombre.value.trim();

    compruebaNombre(nom);
  });

  email.addEventListener('blur', ()=>{
    const mail = email.value.trim();
    if(validarCorreoElectronico(mail) == true){
      compruebaCorreo(mail);
    }else{
      email.classList.add("is-invalid");
      document.getElementById("mailMal").innerText="El email no existe";
    }
  });

  pass.addEventListener('input', ()=>{
    const contrasenia = pass.value;


  });

  pass2.addEventListener('blur', ()=>{
    const contrasenia = pass.value;
    const contrasenia2 = pass2.value;
    if(contrasenia2 !== contrasenia){
      pass2.classList.add("is-invalid");
      document.getElementById("pass2Mal").innerText="La contraseña no coincide";
    }else{
      pass2.classList.remove("is-invalid");
      document.getElementById("pass2Mal").innerText="";
    }
  });
}

function validarCampos(){
  if( validarPassword(pass.value) == false ){
    console.log("Error en el campo pass");
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