<?php
    include("../../app/libs/bGeneral.php");
    include("../../app/libs/config.php");

    cabecera("Registro");

    $errores=[];
    $nombre="";
    $mail="";
    $pass="";
    $pass2="";
    $fecha="";
    $radio="";
    $lector=true;
    $terminos=false;

    if(!isset($REQUEST["bAceptar"])){
        include("../../web/templates/template_registro.php");
    }else{
        $nombre=recoge("nombre");
        $mail=recoge("mail");
        $pass=recoge("pass");
        $pass2=recoge("pass2");
        $fecha=recoge("fecha");
        $radio=recoge("lector");

    }

?>