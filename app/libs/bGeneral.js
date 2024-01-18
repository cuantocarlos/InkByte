export function validarNombre(nombre) {
    const textoSinEspacios = nombre.trim();
    const longitudValida = textoSinEspacios.length >= 3 && textoSinEspacios.length <= 60;
    const caracteresValidos = /^[a-zA-Z\s]*$/.test(textoSinEspacios);
    return longitudValida && caracteresValidos;
  }

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
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(pass);
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

export function validarRol() {
    var opciones = document.getElementsByName("options-base");
    var valorSeleccionado;

    for (var i = 0; i < opciones.length; i++) {
      if (opciones[i].checked) {
        valorSeleccionado = opciones[i].value;
        break;
      }
    }

    if (valorSeleccionado && (valorSeleccionado !== "escritor" && valorSeleccionado !== "lector")) {
      return false;
    } else {
        return true;
    }
  }

  export function abrirModalInfoUser() {
    document.getElementById("infoUser").style.display = 'block';
  }
