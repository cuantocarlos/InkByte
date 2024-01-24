<?php

include('../app/modelo/classModelo.php');
include('../app/modelo/classConsultas.php');


require_once './../app/libs/config.php';
require_once './../app/libs/bGeneral.php';
require_once './../app/controlador/controller.php';

session_start(); // Se inicia la sesion
//Este logueado o no el usuario, siempre tendra un nivel_usuario

if (!isset($_SESSION['nivel'])) {
    $_SESSION['nivel'] = 0;
}


/**
 * Enrutamiento
 * Le añadimos el nivel mínimo que tiene que tener el usuario para ejecutar la acción
 * 
 * controller se refiere a controller.php
 * Controller.php se refiere a la clase Controller dentro de controller.php
 * action lo que va a hacer
 * home la función home dentro de la clase controller
 * nivel el nivel del usuario
 **/
$map = array(
    'home' => array('controller' => 'Controller', 'action' => 'home', 'nivel' => 0),
    'subirCapitulo' => array('controller' => 'Controller', 'action' => 'subirCapitulo', 'nivel' => 2),
    'iniciarSesion' => array('controller' => 'Controller', 'action' => 'iniciarSesion', 'nivel' => 0),
    'registro' => array('controller' => 'Controller', 'action' => 'registro', 'nivel' => 0),
    //'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel' => 0),
    // 'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel' => 1),
    // 'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel' => 0),
    // 'listarLibros' => array('controller' => 'Controller', 'action' => 'listarLibros', 'nivel' => 0),
    // 'verLibro' => array('controller' => 'Controller', 'action' => 'verLibro', 'nivel' => 0),
    // 'buscarPorTitulo' => array('controller' => 'Controller', 'action' => 'buscarPorTitulo', 'nivel' => 1),
    // 'buscarPorAutor' => array('controller' => 'Controller', 'action' => 'buscarPorAutor', 'nivel' => 1),
    // 'buscarPorEditorial' => array('controller' => 'Controller', 'action' => 'buscarPorEditorial', 'nivel' => 1),
    // 'insertarL' => array('controller' => 'Controller', 'action' => 'insertarL', 'nivel' => 2)
);

// Parseo de la ruta
if (isset($_GET['ctl'])) {
    if (isset($map[$_GET['ctl']])) {
        $ruta = $_GET['ctl'];
    } else {

        //Si el valor puesto en ctl en la URL no existe en el array de mapeo envía una cabecera de error
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] . '</p></body></html>';
        exit;
        /*
             * También podríamos poner $ruta=error; y mostraríamos una pantalla de error
             */
    }
} else {
    $ruta = 'home';
}
$controlador = $map[$ruta];
/*
Comprobamos si el metodo correspondiente a la acción relacionada con el valor de ctl existe,
si es así ejecutamos el método correspondiente.
En caso de no existir cabecera de error.
En caso de estar utilizando sesiones y permisos en las diferentes acciones comprobariamos tambien
si el usuario tiene permiso suficiente para ejecutar esa acción
*/

if (method_exists($controlador['controller'], $controlador['action'])) {
    //echo "el nivel es ". $controlador["nivel"];
    if ($controlador['nivel'] <= $_SESSION['nivel']) {
        call_user_func(array(
            new $controlador['controller'],
            $controlador['action']
        ));
    }else{
        call_user_func(array(
            new $controlador['controller'],
            'inicio'
        ));
    }
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['controller'] .
        '->' .
        $controlador['action'] .
        '</i> no existe</h1></body></html>';
    //console_log("entrarErrorInicio");
}
