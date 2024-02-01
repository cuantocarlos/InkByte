export function validarCorreoElectronico(correo) {
    const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const esCorreoValido = regexCorreo.test(correo);
    if (esCorreoValido) {
      return true;
    } else {
        return false;
    }
  }
export function validarPassword(pass) {
    const mayus = document.getElementById("mayus");
    const minus = document.getElementById("minus");
    const num = document.getElementById("num");
    const especial = document.getElementById("especial");
    const longitud = document.getElementById("longitud");

    let contieneMayus = /[A-Z]/.test(pass);

    let contieneMinus = /[a-z]/.test(pass);

    let contieneNum = /[0-9]/.test(pass);

    let contieneEspecial = /[@,.\-_/!?*^<>¿=)(&%$"]/.test(pass);

    let longitudValida = pass.length >= 8 && pass.length <= 16;

    mayus.classList.toggle("text-success", contieneMayus);
    minus.classList.toggle("text-success", contieneMinus);
    num.classList.toggle("text-success", contieneNum);
    especial.classList.toggle("text-success", contieneEspecial);
    longitud.classList.toggle("text-success", longitudValida);

    if(contieneMayus && contieneMinus && contieneNum && contieneEspecial && longitudValida){
      document.getElementById("pass").classList.add("is-valid");
      if(document.getElementById("pass2").value === pass){
        document.getElementById("pass2").classList.remove("is-invalid");
        document.getElementById("pass2Mal").innerText="";
      }
    }else{
      document.getElementById("pass").classList.remove("is-valid");
    }
}

export function validarFecha(fechaString) {
    const hoy = new Date();
    const fecha = new Date(fechaString);
    return (
      !isNaN(fecha.getTime()) &&
      fecha.toISOString().slice(0, 10) === fechaString &&
      fecha < hoy
    );
}

  export function abrirModalInfoUser() {
    document.getElementById("infoUser").style.display = 'block';
  }

  export function verificarLibro(opcionIntroducida) {
    var opcionesDisponibles = document.getElementById("tus_opciones").options;

    for (var i = 0; i < opcionesDisponibles.length; i++) {
        if (opcionesDisponibles[i].value == opcionIntroducida) {
            alert("La opción introducida está entre las disponibles.");
            return true;
        }
    }
    alert("La opción introducida no está entre las disponibles.");
    return false;
}

export function compruebaNombre(nombre){
  const httpRequest = new XMLHttpRequest();
  const inputNombre = document.getElementById("nombre");

  httpRequest.open('POST','http://localhost/DWES/GitRepos/InkByte/web/index.php?ctl=usuarioUnico',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  httpRequest.onreadystatechange = function () {
    if(httpRequest.readyState === 4 && httpRequest.status === 200) {
      var respuesta = JSON.parse(httpRequest.responseText);
      if(!respuesta.existe == false){
        document.getElementById("nombreMal").innerText="El nombre de usuario ya existe!";
        inputNombre.classList.remove("is-valid");
        inputNombre.classList.add("is-invalid");
      }else{
        document.getElementById("nombreMal").innerText="";
        inputNombre.classList.remove("is-invalid");
        inputNombre.classList.add("is-valid");
      }
    }
  }
  httpRequest.send('nombre=' + encodeURIComponent(nombre));
}


export function compruebaCorreo(mail){
  const httpRequest = new XMLHttpRequest();
  const inputMail = document.getElementById("mail");

  httpRequest.open('POST','http://localhost/DWES/GitRepos/InkByte/web/index.php?ctl=mailUnico',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  httpRequest.onreadystatechange = function () {
    if(httpRequest.readyState === 4 && httpRequest.status === 200) {
      var respuesta = JSON.parse(httpRequest.responseText);
      if(!respuesta.existe == false){
        document.getElementById("mailMal").innerText="El email ya está en uso.";
        inputMail.classList.remove("is-valid");
        inputMail.classList.add("is-invalid");
      }else{
        document.getElementById("mailMal").innerText="";
        inputMail.classList.remove("is-invalid");
        inputMail.classList.add("is-valid");
      }
    }
  }
  httpRequest.send('mail=' + encodeURIComponent(mail));
}




