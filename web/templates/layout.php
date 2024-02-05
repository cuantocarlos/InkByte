<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InkByte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    <!--EL FAVICON TAMBIEN VA AQUI-->
    <link rel="icon" type="image/png" href="/web/img/favi.ico" />

    <!--LINKS A MODIFICACIONES DE CSS AQUI-->
    <link rel="stylesheet" href="../web/styles/generoUsuario.css"/>
    <link rel="stylesheet" href="../web/styles/leerCapitulo_style.css">
    <link rel="stylesheet" href="../web/styles/navbar.css">
    <link rel="stylesheet" href="../web/styles/registro.css">
    <link rel="stylesheet" href="../web/css/valoracionEstrella.css">



</head>
<body>
<!--AQUI VA EL HEADER + RESPONSIVO(vamos a implementar 4 headers distintos: invitado/lector/escritor/admin. Todo esto con la funcionalidad de abajo)-->
<?php
    if(!isset($menu)) {
        $menu = 'menuInvitado.php';
    }
    include $menu;
?>
<!--AQUI VA EL FOOTER-->

</body>
</html>