<?php

class Config {
    //incluimos datos a la conexión de la BD
public static $db_hostname = "localhost";
public static $db_nombre = "inkbyte"; //nombre de la base de datos

public static $db_usuario = "root";
public static $db_clave = "";

//incluimos informacion para el guardado de imagenes
public static $extensionesValidas=["jpeg","jpg","png"];
public static $dir_usuario=__DIR__.DIRECTORY_SEPARATOR."../img/perfil".DIRECTORY_SEPARATOR;
public static $dir_libro=__DIR__.DIRECTORY_SEPARATOR."../img/libro".DIRECTORY_SEPARATOR;
public static $max_file_size=200000;

//formato fecha
public static $formatoF="Y-m-d";
}
