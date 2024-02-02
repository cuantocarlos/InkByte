<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InkByte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    <!--EL FAVICON TAMBIEN VA AQUI-->

    <!--LINKS A MODIFICACIONES DE CSS AQUI-->
    <link rel="stylesheet" href="styles/modalGeneroUsuario.css"/>
    <link rel="stylesheet" href="styles/leerCapitulo_style.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="../web/css/styles/navbar.css">
    <link rel="stylesheet" href="../web/css/leerCapitulo_style.css">
    <link rel="stylesheet" href="../web/css/valoracionEstrella.css">


</head>
<body>
<!--AQUI VA EL HEADER + RESPONSIVO(vamos a implementar 4 headers distintos: invitado/lector/escritor/admin. Todo esto con la funcionalidad de abajo)-->
<?php
    if(!isset($menu)) {
        $menu = 'registro.php';
    }
    include $menu;
?>
<!--AQUI VA EL FOOTER-->

</body>
</html>