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
            $nivel=1;
        }
        else if($lector==="escritor"){
            $nivel=2;
        }

        if(empty($terminos)){
            $errores["terminos"]="Debes aceptar los términos y condiciones para registrarte";
        }


        //comprobamos que el array de errores esté vacío
        if(!empty($errores)){
            include("../../web/templates/template_registro.php");
        }else{
            try{
                include("../libs/consultas.php");
                include_once("../libs/config.php");
                $hash = password_hash($contrasena, PASSWORD_BCRYPT);
                if(agregarNuevoUsuario($pdo,$nombre,$mail,$fecha,$hash,$fecha,$nivel)){
                    include("../../web/templates/index.php");
                    echo("<script>abrirModalInfoUser();</script>");
                }else{
                    $errores["crearUsuario"]="Error en el registro de usuarios";
                    include("../../web/templates/template_registro.php");
                }
            }catch (PDOException $e){
                    // En este caso guardamos los errores en un archivo de errores log
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                    // guardamos en ·errores el error que queremos mostrar a los usuarios
                    $errores['datos'] = "Ha habido un error <br>";
                    include("../templates/formRegistro.php");
            }
        }

    }
    pie();
