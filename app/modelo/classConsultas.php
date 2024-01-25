<?php

class Consultas extends Modelo {
    /*Buscar en la linea de una tabla, con un campo*/
    function buscar($input, $tabla, $columna, $campoWhere){
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($resultado) ? $resultado[$columna] : null;
    }

    function usuarioUnico($nombre){
        $stmt =$this->conexion->prepare("SELECT nick FROM usuario WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($resultado)){
            return true;
        }else{
            return false;
        }
    }

    function correoUnico($email){
        $stmt =$this->conexion->prepare("SELECT email FROM usuario WHERE email= ?");
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($resultado)){
            return true;
        }else{
            return false;
        }
    }

    /*Agregar usuario a la base de datos*/
    function agregarNuevoUsuario($nombre, $nick, $email, $pass, $f_nacimiento, $foto_perfil,$descripcion, $nivel, $activo) {
        $query = "INSERT INTO usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt =$this->conexion->prepare($query);
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $nick);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $pass);
        $stmt->bindParam(5, $f_nacimiento);
        $stmt->bindParam(6, $foto_perfil);
        $stmt->bindParam(7, $descripcion);
        $stmt->bindParam(8, $nivel);
        $stmt->bindParam(9, $activo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*Tokens de usuarios*/
    function agregarToken($token, $validez, $id) {
        $query = "INSERT INTO token (token, validez, id_user) VALUES (?, ?, ?)";
        $stmt =$this->conexion->prepare($query);
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
    function verificarToken($token) {
        $stmt =$this->conexion->prepare("SELECT COUNT(*) AS count FROM token WHERE token = ? AND validez > UNIX_TIMESTAMP(NOW())");
        $stmt->execute([$token]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($resultado['count'] > 0);
    }

    /*Verifica si el token tiene una fecha válida*/
    function validarFechaValidezPorToken($token) {
        $stmt =$this->conexion->prepare("SELECT validez FROM token WHERE token = ?");
        $stmt->execute([$token]);
        $fechaValidez = $stmt->fetchColumn();

            $fechaActual = time();
            return ($fechaValidez > $fechaActual);
    }

    /*Activa la cuenta del usuario*/
    function activarUsuarioPorToken($token) {
        $stmt =$this->conexion->prepare("UPDATE usuario SET activo = 1 WHERE id_user = (SELECT id_user FROM tokens WHERE token = ?)");
        return $stmt->execute([$token]);
    }

    /*Borra el token de la base de datos*/
    function borrarToken($token) {
        $stmt =$this->conexion->prepare("DELETE FROM tokens WHERE token = ?");
        return $stmt->execute([$token]);
    }

    /*Comprueba que el email está en la base de datos*/
    function verificarEmail($email) {
        $stmt =$this->conexion->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /*Comprueba que la contraseña es correcta*/
    function verificarPass($email, $pass) {
        $stmt =$this->conexion->prepare("SELECT pass FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $hashAlmacenado = $stmt->fetchColumn();
        return password_verify($pass, $hashAlmacenado);
    }

    /*Guarda el libro en la base de datos*/
    function agregarLibro($id_user, $id_libro, $titulo, $sinopsis, $imagen_portada, $capitulos, $num_resenas, $valoracion, $visitas, $visitasSemana, $m_18, $m_16, $m_12) {
        $stmt =$this->conexion->prepare("INSERT INTO libro (id_user ,id_libro, titulo, sinopsis, imagen_portada, capitulos, num_resenas, valoracion, visitas, visitasSemana, m_18, m_16, m_12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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

    /*Guardar capítulo en la base de datos*/
    function agregarCapitulo($id_libro, $num_cap, $titulo, $archivo) {
        $stmt =$this->conexion->prepare("INSERT INTO capitulos (id_libro, num_cap, titulo, archivo) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $id_libro);
        $stmt->bindParam(2, $num_cap);
        $stmt->bindParam(3, $titulo);
        $stmt->bindParam(4, $archivo);
        return $stmt->execute();
    }

    /*Al agregar un capitulo, se incrementa el numero de capitulos del libro*/
    function aumentarCapitulosLibro($id_libro){
        $stmt =$this->conexion-> prepare("UPDATE libro SET capitulos = capitulos + 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Al borrar un capitulo, se decrementa el numero de capitulos del libro*/
    function reducirCapitulosLibro($id_libro){
        $stmt =$this->conexion-> prepare("UPDATE libro SET capitulos = capitulos - 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Al agregar una reseña, se incrementa el numero de reseñas del libro*/
    function aumentarNumResenasLibro($id_libro){
        $stmt =$this->conexion-> prepare("UPDATE libro SET num_resenas = num_resenas + 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Al borrar una reseña, se decrementa el numero de reseñas del libro*/
    function reducirNumResenasLibro($id_libro){
        $stmt = $this->conexion-> prepare("UPDATE libro SET num_resenas = num_resenas - 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Calcula la media de las valoraciones de un libro*/
    function calcularMediaValoraciones($id_libro) {
        $stmt =$this->conexion->prepare("SELECT AVG(valoracion) AS media FROM resena WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado['media'] !== null) {
            return $resultado['media'];
        } else {
            return 0;
        }
    }

    /*Actualiza la valoracion de un libro*/
    function actualizarValoracion($id_libro, $valoracion){
        $stmt =$this->conexion-> prepare("UPDATE libro SET valoracion = $valoracion WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Agrega un libro a la lista de seguidos de un usuario*/
    function agregarSeguido($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("INSERT INTO seguidos (id_libro, id_usuario) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de seguidos de un usuario*/
    function quitarSeguido($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("DELETE FROM seguidos WHERE id_usuario = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }

    /*Agrega un libro a la lista de pendientes de un usuario*/
    function agregarPendiente($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("INSERT INTO pendientes (id_libro, id_usuario) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de pendientes de un usuario*/
    function quitarPendiente($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("DELETE FROM pendientes WHERE id_usuario = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }

    /*Agrega un libro a la lista de completados de un usuario*/
    function agregarCompletado($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("INSERT INTO completados (id_libro, id_usuario) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de completados de un usuario*/
    function quitarCompletado($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("DELETE FROM completados WHERE id_usuario = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }


    /*Actualiza las preferencias de un usuario*/

    function actualizarPreferenciasUsuario($id_user, $terror, $romance, $fantasia, $cficcion, $historia, $arte, $thriller, $poesia, $drama, $biografia, $misterio, $policiaca) {
        $stmt =$this->conexion->prepare("UPDATE preferenciagenerosusuario SET
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

    function obtenerTitulosLibrosPorUsuario($id_user) {
        $stmt = $this->conexion->prepare("SELECT titulo FROM libro WHERE id_user = ?");
        $stmt->bindParam(1, $id_user);
        $stmt->execute();
    
        $titulos = array();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $titulos[] = $row['titulo'];
        }
    
        return $titulos;
    }
    

    function obtenerIdLibrosPorUsuario($id_user) {
        $stmt = $this->conexion->prepare("SELECT id_libro FROM libro WHERE id_user = ?");
        $stmt->bindParam(1, $id_user);
        $stmt->execute();
    
        $ids = array();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ids[] = $row['id_libro'];
        }
    
        return $ids;
    }
    
    
    
}