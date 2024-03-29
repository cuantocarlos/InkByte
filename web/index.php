
<?php
require_once __DIR__ . '/../app/modelo/classModelo.php';
require_once __DIR__ . '/../app/modelo/classConsultas.php';
require_once __DIR__ . '/../app/libs/config.php';
require_once __DIR__ . '/../app/libs/bGeneral.php';
require_once __DIR__ . '/../app/controlador/controller.php';

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
    // 'home' => array('controller' => 'Controller', 'action' => 'home', 'nivel' => 0),
    'subirCapitulo' => array('controller' => 'Controller', 'action' => 'subirCapitulo', 'nivel' => 2),
    'iniciarSesion' => array('controller' => 'Controller', 'action' => 'iniciarSesion', 'nivel' => 0),
    'registro' => array('controller' => 'Controller', 'action' => 'registro', 'nivel' => 0),
    'inicio' => array('controller' => 'Controller', 'action' => 'inicio', 'nivel' => 0),
    'generoUsuario' => array('controller' => 'Controller', 'action' => 'generoUsuario', 'nivel' => 1),
    'usuarioUnico' => array('controller' => 'Controller', 'action' => 'peticionNombre', 'nivel' => 0),
    'nickUnico' => array('controller' => 'Controller', 'action' => 'peticionNick', 'nivel' => 0),
    'mailUnico' => array('controller' => 'Controller', 'action' => 'peticionMail', 'nivel' => 0),
    'crearLibro' => array('controller' => 'Controller', 'action' => 'crearLibro', 'nivel' => 2),
    'leerCapitulo' => array('controller' => 'Controller', 'action' => 'leerCapitulo', 'nivel' => 1),
    'inicioSesionJS' => array('controller' => 'Controller', 'action' => 'inicioSesionJS', 'nivel' => 0),
    'activarCuenta' => array('controller' => 'Controller', 'action' => 'activarCuenta', 'nivel' => 0),
    'cerrarSesion' => array('controller' => 'Controller', 'action' => 'cerrarSesion', 'nivel' => 1),
    'generoUsuarioSelect' => array('controller' => 'Controller', 'action' => 'generoUsuarioSelect', 'nivel' => 1),
    'perfilUsuario' => array('controller' => 'Controller', 'action' => 'perfilUsuario', 'nivel' => 0),
    'escribirResena' => array('controller' => 'Controller', 'action' => 'escribirResena', 'nivel' => 1),
    'book' => array('controller' => 'Controller', 'action' => 'book', 'nivel' => 0),
    'menuInvitado' => array('controller' => 'Controller', 'action' => 'menuInvitado', 'nivel' => 0),
    'menuLector' => array('controller' => 'Controller', 'action' => 'menuLector', 'nivel' => 1),
    'menuEscritor' => array('controller' => 'Controller', 'action' => 'menuEscritor', 'nivel' => 2),
    'buscarLibros' => array('controller' => 'Controller', 'action' => 'buscarLibros', 'nivel' => 0),
    'error' => array('controller' => 'Controller', 'action' => 'error', 'nivel' => 0),
    'contacto' => array('controller' => 'Controller', 'action' => 'contacto', 'nivel' => 0),
    'dondeEstamos' => array('controller' => 'Controller', 'action' => 'dondeEstamos', 'nivel' => 0),
    'seguidos' => array('controller' => 'Controller', 'action' => 'seguidos', 'nivel' => 1),
    'modificaUsuario' => array('controller' => 'Controller', 'action' => 'modificaUsuario', 'nivel' => 1),
    'modificaNivelUsuario' => array('controller' => 'Controller', 'action' => 'modificaNivelUsuario', 'nivel' => 1),
    'cambiaPass' => array('controller' => 'Controller', 'action' => 'cambiaPass', 'nivel' => 1),
    'recomendados' => array('controller' => 'Controller', 'action' => 'recomendados', 'nivel' => 1),
    // 'salir' => array('controller' => 'Controller', 'action' => 'salir', 'nivel' => 1),
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

        $ruta = "error";
    }
} else {
    $ruta = 'inicio';
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

    if ($controlador['nivel'] <= $_SESSION['nivel']) {
        call_user_func(array(
            new $controlador['controller'],
            $controlador['action'],
        ));
    } else {
        call_user_func(array(
            new $controlador['controller'],
            'inicio',
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
