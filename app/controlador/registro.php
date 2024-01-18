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
    $terminos=[];

    if(!isset($REQUEST["bAceptar"])){
        include("../../web/templates/template_registro.php");
    }else{
        //recogemos datos de los inputs
        $nombre=recoge("nombre");
        $mail=recoge("mail");
        $pass=recoge("pass");
        $pass2=recoge("pass2");
        $fecha=recoge("fecha");
        $radio=recoge("lector");
        $check=recoge("terminos");


        //comenzamos las validaciones
        if(empty($nombre)){
            $errores["nombre"]="Por favor ingrese un nombre";
        }else{
            $nombre=sinEspacios($nombre);
        }

        cEmail($mail,$errores,"mail",30,8);

        if(cPassword($pass,$errores) && $pass!==$pass2){
            $errores["pass"]="Las contraseñas no coinciden";
        }

        cFecha($fecha,$errores);

        if($lector==="lector"){
            $lector=true;
        }
        else if($lector==="escritor"){
            $lector=false;
        }

        if(empty($terminos)){
            $errores["terminos"]="Debes aceptar los términos y condiciones para registrarte";
        }


        //comprobamos que el array de errores esté vacío
        if(!empty($errores)){
            include("../../web/templates/template_registro.php");
        }else{

            echo("Ha funcionado");

        }

    }
    pie();
