<?php

//incluimos datos a la conexión de la BD
$db_hostname = "localhost";
$db_nombre = "inkbyte"; //nombre de la base de datos

$db_usuario = "root";
$db_clave = "";

/******************************************************************************/
//QUITAR ESTE CONTENIDO PARA CREAR BASE DE DATOS
// Conectamos
$pdo = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave);
// Realiza el enlace con la BD en utf-8
$pdo->exec("set names utf8");
//Accionamos el uso de excepciones
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//HASTA AQUI
/******************************************************************************/


//incluimos informacion para el guardado de imagenes
$extensionesValidas=["jpeg","jpg","png"];
$dir=__DIR__.DIRECTORY_SEPARATOR."../img".DIRECTORY_SEPARATOR;
$max_file_size=200000;

//formato fecha
$formatoF="Y-m-d";
