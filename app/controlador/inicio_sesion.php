<?php
include("../../app/libs/bGeneral.php");
include("../../app/libs/config.php");

cabecera("Inicio de Sesión");

$mail="";
$pass="";
$errores=[];

if(!isset($REQUEST["bAceptar"])){
    include("../../web/templates/template_inicioSesion.php");
}else{
    $mail = recoge("mail");
    $pass = recoge("pass");

    if(!empty($errores)){
    include("../../web/templates/template_inicioSesion.php");
    }else{
        try{
            include("../libs/consultas.php");
            include_once("../libs/config.php");
            if(!verificarEmail($pdo,$mail)){
                $errores["mail"]="El mail introducido no existe";
            }else{
                if(!verificarPass($pdo,$mail,$pass)){
                    $errores["pass"]="La contraseña es incorrecta";
                }
            }
            if(!empty($errores)){

            }else{
                include("../../web/templates/index.php");
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