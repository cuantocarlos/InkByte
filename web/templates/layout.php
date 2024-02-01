
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InkByte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/modalGeneroUsuario.css" />



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    
        

    <!--EL FAVICON TAMBIEN VA AQUI-->

    <!--LINKS A MODIFICACIONES DE CSS AQUI-->
    <link rel="stylesheet" href="css/styles/navabar.css">
    <link rel="stylesheet" href="css/styles/book.css">
    <link rel="stylesheet" href="../css/footer.css">



</head>

<body>

    <!--AQUI VA EL HEADER (vamos a implementar 4 headers distintos: invitado/lector/escritor/admin. Todo esto con la funcionalidad de abajo)-->
    <?php
    include('navbar.php');
   
    ?>
         <!-- 
    // $tipoUsuario = 'invitado';
    // if ($tipoUsuario == 'invitado') {
    //     include 'menuInvitado.php';
    // } elseif ($tipoUsuario == 'lector') {
    //     include 'menuLector.php';
    // } elseif ($tipoUsuario == 'escritor') {
    //     include 'menuEscritor.php';
    // } elseif ($tipoUsuario == 'admin') {
    //     include 'menuAdmin.php';
    // }
    -->


    

        <br><br><br>
    <hr>
        
    <!--AQUI VA EL FOOTER-->
    <?php
        include('footer.php');
    ?>
</body>

</html>