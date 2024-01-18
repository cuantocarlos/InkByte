import { validarCorreoElectronico } from "../libs/bGeneral.js";


window.onload = function () {
console.log("aaa");
  let email = document.getElementById("mail");
  email.addEventListener("blur", function (event) {
    console.log("bbb");
    validarCorreoElectronico(event, email.value);
    console.log("ccc");
  });
};