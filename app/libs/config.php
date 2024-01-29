<?php

class Config {
    //incluimos datos a la conexión de la BD
public static $db_hostname = "localhost";
public static $db_nombre = "inkbyte"; //nombre de la base de datos

public static $db_usuario = "root";
public static $db_clave = "";

//incluimos informacion para el guardado de imagenes
public static $extensionesValidas=["jpeg","jpg","png"];
public static $dir_usuario=__DIR__.DIRECTORY_SEPARATOR."../app/archivos/img/perfil".DIRECTORY_SEPARATOR;
public static $dir_libro=__DIR__.DIRECTORY_SEPARATOR."../archivos/img/libro".DIRECTORY_SEPARATOR;
public static $dir_usuario_perfil="../app/archivos/img/perfil".DIRECTORY_SEPARATOR;
// public static $dir_portadaLibro="/InkByte/app/archivos/img/portadaLibro/";
// public static $dir_libro=__DIR__.DIRECTORY_SEPARATOR."../img/libro".DIRECTORY_SEPARATOR;
public static $max_file_size=2000000;


//formato fecha
public static $formatoF="Y-m-d";

public static $extensionesCapitulos=["pdf"];

public static $menu = __DIR__.'/../templates/menuInvitado.php';
}
