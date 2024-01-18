export function validarCorreoElectronico(event, correo) {
    const regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const esCorreoValido = regexCorreo.test(correo);
    if (!esCorreoValido) {
      event.preventDefault();
      console.log("El correo electrónico no es válido. Evitando la acción predeterminada.");
    }
  }