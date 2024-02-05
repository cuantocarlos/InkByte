import {validarCorreoElectronico, validarPassword, validarFecha, compruebaNombre, compruebaCorreo} from "./bGeneral.js";

var bAceptar = document.getElementById("bAceptar");
var nombre = document.getElementById("nombre");
var email = document.getElementById("mail");
var pass = document.getElementById("pass");
var pass2 = document.getElementById("pass2");
var fecha = document.getElementById("fecha");
var terminosCondiciones = document.getElementById("terminos");

window.onload = function () {

  bAceptar.addEventListener("click", function () {
    if(!terminosCondiciones.checked){
      alert("Debes aceptar los términos y condiciones");
      event.preventDefault();
    }
  });

  nombre.addEventListener('input', ()=>{
    const nom = nombre.value.trim();
    if(nom.length===0){
      nombre.classList.remove("is-valid");
      nombre.classList.add("is-invalid");
      document.getElementById("nombreMal").innerText="No puede quedar vacío este campo.";
    }else{
    compruebaNombre(nom);
    }
  });

  fecha.addEventListener('change', ()=>{
    let fechaValida = false;
    const fechaMal = document.getElementById("fechaMal");
    if(!validarFecha(fecha.value)){
      fechaValida=true;
      fechaMal.innerText = "La fecha de nacimiento no existe";
    }else{
      fechaValida=false;
      fechaMal.innerText = "";
    }

    fecha.classList.toggle("is-invalid",fechaValida);
  });

  email.addEventListener('focus', ()=>{
    email.classList.remove("is-valid");
    email.classList.remove("is-invalid");
    document.getElementById("mailMal").innerText="";
  });

  email.addEventListener('blur', ()=>{
    const mail = email.value.trim();

    if(mail.length === 0){
      email.classList.remove("is-valid");
      email.classList.add("is-invalid");
      document.getElementById("mailMal").innerText="No puede quedar vacío este campo.";
    }else{
      if(validarCorreoElectronico(mail) == true){
        compruebaCorreo(mail);
      }else{
        email.classList.add("is-invalid");
        document.getElementById("mailMal").innerText="El email no existe";
      }
    }


  });

  pass.addEventListener('input', () => {
    const contrasenia = pass.value;
    validarPassword(contrasenia);
});

  pass2.addEventListener('focus', ()=>{
    pass2.classList.remove("is-valid");
    pass2.classList.remove("is-invalid");
    document.getElementById("pass2Mal").innerText="";
  });

  pass2.addEventListener('blur', ()=>{
    const contrasenia = pass.value;
    const contrasenia2 = pass2.value;
    let contieneMayus = false;
    if(contrasenia2 !== contrasenia){
      contieneMayus=true;
    }
    if(contieneMayus){
      pass2.classList.add("is-invalid");
      document.getElementById("pass2Mal").innerText="La contraseña no coincide";
    }else{
      pass2.classList.remove("is-invalid");
      document.getElementById("pass2Mal").innerText="";
    }
  });

}



