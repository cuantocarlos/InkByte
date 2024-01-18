<?php

//incluimos datos a la conexión de la BD
$db_hostname = "localhost";
$db_nombre = "login";

$db_usuario = "admin";
$db_clave = "";

//incluimos informacion para el guardado de imagenes
$extensionesValidas=["jpeg","jpg","png"];
$dir=__DIR__.DIRECTORY_SEPARATOR."../img".DIRECTORY_SEPARATOR;
$max_file_size=200000;

//formato fecha
$formatoF="Y-m-d";
