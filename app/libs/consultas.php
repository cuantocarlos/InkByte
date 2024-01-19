<?php

/*Conectarse a la base de datos*/
function conectarBD($db_hostname, $db_nombre, $db_usuario, $db_clave){
    $pdo = new PDO('mysql:host=' . $db_hostname . ';dbname=' . $db_nombre . '', $db_usuario, $db_clave);
    $pdo->exec("set names utf8");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

/*Buscar en la linea de una tabla, con un campo*/
function buscar($pdo, $input, $tabla, $columna){
    $stmt = $pdo->prepare("SELECT $columna FROM $tabla WHERE $input = ?");
    $stmt->execute([$input]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($resultado) ? $resultado[$columna] : null;
}

function usuarioUnico($pdo, $nombre){
    $stmt = $pdo->prepare("SELECT nick FROM usuario WHERE nombre = ?");
    $stmt->execute([$nombre]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($resultado)){
        return true;
    }else{
        return false;
    }
}

function correoUnico($pdo, $email){
    $stmt = $pdo->prepare("SELECT email FROM usuario WHERE email= ?");
    $stmt->execute([$email]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($resultado)){
        return true;
    }else{
        return false;
    }
}

/*Agregar usuario a la base de datos*/
function agregarNuevoUsuario($pdo, $nombre, $email, $pass, $f_nacimiento, $nivel, $activo) {
    $query = "INSERT INTO usuario (nombre, email, pass, f_nacimiento, nivel, activo) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $pass);
    $stmt->bindParam(4, $f_nacimiento);
    $stmt->bindParam(5, $nivel);
    $stmt->bindParam(6, $activo);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function agregarCosasAdicionales($id_user, $pdo, $nick, $foto_perfil, $descripcion) {
    $stmt = $pdo->prepare("UPDATE usuario SET
        nick = ?,
        foto_perfil = ?,
        descripcion = ?
        WHERE id_user = ?");

    $stmt->execute([$nick,$foto_perfil,$descripcion,$id_user]);
}

/*Tokens de usuarios*/
function agregarToken($pdo, $token, $validez, $id) {
    $query = "INSERT INTO token (token, validez, id_user) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(1, $token);
    $stmt->bindParam(2, $validez);
    $stmt->bindParam(3, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

/*Verifica si el token es correcto*/
function verificarToken($pdo, $token) {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM token WHERE token = ? AND validez > UNIX_TIMESTAMP(NOW())");
    $stmt->execute([$token]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($resultado['count'] > 0);
}

/*Verifica si el token tiene una fecha válida*/
function validarFechaValidezPorToken($pdo, $token) {
    $stmt = $pdo->prepare("SELECT validez FROM token WHERE token = ?");
    $stmt->execute([$token]);
    $fechaValidez = $stmt->fetchColumn();

        $fechaActual = time();
        return ($fechaValidez > $fechaActual);
}

/*Activa la cuenta del usuario*/
function activarUsuarioPorToken($pdo, $token) {
    $stmt = $pdo->prepare("UPDATE usuario SET activo = 1 WHERE id_user = (SELECT id_user FROM tokens WHERE token = ?)");
    return $stmt->execute([$token]);
}

/*Borra el token de la base de datos*/
function borrarToken($pdo, $token) {
    $stmt = $pdo->prepare("DELETE FROM tokens WHERE token = ?");
    return $stmt->execute([$token]);
}

/*Comprueba que el email está en la base de datos*/
function verificarEmail($pdo, $email) {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($resultado['count'] > 0);
}

/*Comprueba que la contraseña es correcta*/
function verificarPass($pdo, $email, $pass) {
    $stmt = $pdo->prepare("SELECT pass FROM usuario WHERE email = ?");
    $stmt->execute([$email]);
    $hashAlmacenado = $stmt->fetchColumn();
    return password_verify($pass, $hashAlmacenado);
}

/*Guarda el libro en la base de datos*/
function agregarLibro($pdo, $id_user, $id_libro, $titulo, $sinopsis, $imagen_portada, $capitulos, $num_resenas, $valoracion, $visitas, $visitasSemana, $m_18, $m_16, $m_12) {
    $stmt = $pdo->prepare("INSERT INTO libro (id_user ,id_libro, titulo, sinopsis, imagen_portada, capitulos, num_resenas, valoracion, visitas, visitasSemana, m_18, m_16, m_12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $titulo);
    $stmt->bindParam(2, $id_user);
    $stmt->bindParam(3, $id_libro);
    $stmt->bindParam(4, $titulo);
    $stmt->bindParam(5, $sinopsis);
    $stmt->bindParam(6, $imagen_portada);
    $stmt->bindParam(7, $capitulos);
    $stmt->bindParam(8, $num_resenas);
    $stmt->bindParam(9, $valoracion);
    $stmt->bindParam(10, $visitas);
    $stmt->bindParam(11, $visitasSemana);
    $stmt->bindParam(12, $m_18);
    $stmt->bindParam(13, $m_16);
    $stmt->bindParam(14, $m_12);
    return $stmt->execute();
}

/*Al agregar un capitulo, se incrementa el numero de capitulos del libro*/
function aumentarCapitulosLibro($pdo, $id_libro){
    $stmt = $pdo-> prepare("UPDATE libros SET capitulos = capitulos + 1 WHERE id_libro = ?");
    $stmt->execute([$id_libro]);
}

/*Al borrar un capitulo, se decrementa el numero de capitulos del libro*/
function reducirCapitulosLibro($pdo, $id_libro){
    $stmt = $pdo-> prepare("UPDATE libros SET capitulos = capitulos - 1 WHERE id_libro = ?");
    $stmt->execute([$id_libro]);
}

/*Al agregar una reseña, se incrementa el numero de reseñas del libro*/
function aumentarNumResenasLibro($pdo, $id_libro){
    $stmt = $pdo-> prepare("UPDATE libros SET num_resenas = num_resenas + 1 WHERE id_libro = ?");
    $stmt->execute([$id_libro]);
}

/*Al borrar una reseña, se decrementa el numero de reseñas del libro*/
function reducirNumResenasLibro($pdo, $id_libro){
    $stmt = $pdo-> prepare("UPDATE libros SET num_resenas = num_resenas - 1 WHERE id_libro = ?");
    $stmt->execute([$id_libro]);
}

/*Calcula la media de las valoraciones de un libro*/
function calcularMediaValoraciones($pdo, $id_libro) {
    $stmt = $pdo->prepare("SELECT AVG(valoracion) AS media FROM resena WHERE id_libro = ?");
    $stmt->execute([$id_libro]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado['media'] !== null) {
        return $resultado['media'];
    } else {
        return 0;
    }
}

/*Actualiza la valoracion de un libro*/
function actualizarValoracion($pdo, $id_libro, $valoracion){
    $stmt = $pdo-> prepare("UPDATE libros SET valoracion = $valoracion WHERE id_libro = ?");
    $stmt->execute([$id_libro]);
}

/*Agrega un libro a la lista de seguidos de un usuario*/
function agregarSeguido($pdo, $id_libro, $id_usuario) {
    $stmt = $pdo->prepare("INSERT INTO seguidos (id_libro, id_usuario) VALUES (?, ?)");
    $stmt->execute([$id_libro, $id_usuario]);
}

/*Quita un libro de la lista de seguidos de un usuario*/
function quitarSeguido($pdo, $id_libro, $id_usuario) {
    $stmt = $pdo->prepare("DELETE FROM seguidos WHERE id_usuario = ? AND id_libro = ?");
    $stmt->execute([$id_usuario, $id_libro]);
}

/*Agrega un libro a la lista de pendientes de un usuario*/
function agregarPendiente($pdo, $id_libro, $id_usuario) {
    $stmt = $pdo->prepare("INSERT INTO pendientes (id_libro, id_usuario) VALUES (?, ?)");
    $stmt->execute([$id_libro, $id_usuario]);
}

/*Quita un libro de la lista de pendientes de un usuario*/
function quitarPendiente($pdo, $id_libro, $id_usuario) {
    $stmt = $pdo->prepare("DELETE FROM pendientes WHERE id_usuario = ? AND id_libro = ?");
    $stmt->execute([$id_usuario, $id_libro]);
}

/*Agrega un libro a la lista de completados de un usuario*/
function agregarCompletado($pdo, $id_libro, $id_usuario) {
    $stmt = $pdo->prepare("INSERT INTO completados (id_libro, id_usuario) VALUES (?, ?)");
    $stmt->execute([$id_libro, $id_usuario]);
}

/*Quita un libro de la lista de completados de un usuario*/
function quitarCompletado($pdo, $id_libro, $id_usuario) {
    $stmt = $pdo->prepare("DELETE FROM completados WHERE id_usuario = ? AND id_libro = ?");
    $stmt->execute([$id_usuario, $id_libro]);
}


/*Actualiza las preferencias de un usuario*/

function actualizarPreferenciasUsuario($pdo, $id_user, $terror, $romance, $fantasia, $cficcion, $historia, $arte, $thriller, $poesia, $drama, $biografia, $misterio, $policiaca) {
    $stmt = $pdo->prepare("UPDATE preferenciagenerosusuario SET
        terror = ?,
        romance = ?,
        fantasia = ?,
        cficcion = ?,
        historia = ?,
        arte = ?,
        thriller = ?,
        poesia = ?,
        drama = ?,
        biografia = ?,
        misterio = ?,
        policiaca = ?
        WHERE id_user = ?");

    $stmt->execute([$terror, $romance, $fantasia, $cficcion, $historia, $arte, $thriller, $poesia, $drama, $biografia, $misterio, $policiaca, $id_user]);
}



