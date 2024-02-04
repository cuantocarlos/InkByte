window.onload = function () {
  recibeGeneros();


  document.querySelectorAll('input[name="generoUsuario[]"]').forEach(checkbox => {
    checkbox.addEventListener("change", function () {
      updateGeneros();
    });
  });


}

function recibeGeneros(){
  const httpRequest = new XMLHttpRequest();

    httpRequest.open('GET','http://localhost/InkCasa/InkByte/web/index.php?ctl=generoUsuarioSelect',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

    httpRequest.onreadystatechange = function () {
      if(httpRequest.readyState === 4 && httpRequest.status === 200) {
        console.log(httpRequest.responseText);
        var respuesta = JSON.parse(httpRequest.responseText);
        for (var genero in respuesta) {
                document.getElementById(genero).checked = respuesta[genero] === 1;
        }
      }
    }
    httpRequest.send(null);
}

function updateGeneros() {
  console.log("tal");
  const httpRequest = new XMLHttpRequest();
  var generosMarcados = Array.from(document.querySelectorAll('input[name="generoUsuario[]"]:checked')).map(checkbox => checkbox.value);
  console.log(generosMarcados);

  httpRequest.open('POST','http://localhost/InkCasa/InkByte/web/index.php?ctl=generoUsuario',true);   //ACORDARSE DE CAMBIAR LA RUTA ABSOLUTA SI SE SUBE A OTRO SITIO

  httpRequest.onreadystatechange = function () {
    if(httpRequest.readyState === 4 && httpRequest.status === 200) {
    }
  }

  httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  httpRequest.send('generos=' + encodeURIComponent(generosMarcados));


}

