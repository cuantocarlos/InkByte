var bAceptar = document.getElementById("bAceptar");
const correo = document.getElementById("mail");
const contrasenia = document.getElementById("pass");

window.onload = function () {

    bAceptar.addEventListener("click", function (event) {
        const httpRequest = new XMLHttpRequest();
        httpRequest.open('POST','http://localhost/DWES/GitRepos/InkByte/web/index.php?ctl=inicioSesionJS',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        httpRequest.onreadystatechange = function () {
            if(httpRequest.readyState === 4 && httpRequest.status === 200) {
            var respuesta = JSON.parse(httpRequest.responseText);

            if(respuesta.error == "mail"){
                correo.classList.add("is-invalid");
                document.getElementById("mailMal").innerText="El correo no existe";
                event.preventDefault();
            }
            if(respuesta.error == "pass"){
                contrasenia.classList.add("is-invalid");
                document.getElementById("passMal").innerText="Contraseña incorrecta";
                event.preventDefault();
            }

            }
        }
        httpRequest.send('mail=' + encodeURIComponent(correo.value.trim()) + '&contra=' + encodeURIComponent(contrasenia.value));
    });

    correo.addEventListener('focus',function(){
        correo.classList.remove("is-invalid");
        document.getElementById("mailMal").innerText="";
    });

    contrasenia.addEventListener('focus',function(){
        contrasenia.classList.remove("is-invalid");
        document.getElementById("passMal").innerText="";
    });
}

