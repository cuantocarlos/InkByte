import { validarCorreoElectronico } from "../libs/bGeneral.js";


window.onload = function () {
console.log("aaa");
  let email = document.getElementById("mail");
  email.addEventListener("blur", function (event) {
    console.log(validarCorreoElectronico(email.value));
    if( validarCorreoElectronico(email.value) == false){
      console.log("aa");
      event.preventDefault();

    }
  });
};