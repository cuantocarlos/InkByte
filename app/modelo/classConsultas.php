<?php
class Consultas extends Modelo {
    /*Buscar en la linea de una tabla, con un campo*/
    function buscar($input, $tabla, $columna, $campoWhere){
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($resultado) ? $resultado[$columna] : null;
    }

    function buscarFila($input, $tabla, $campoWhere) {
        $stmt = $this->conexion->prepare("SELECT * FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($fila) ? $fila : null;
    }

    function buscarColumna($input, $tabla, $columna, $campoWhere) {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $columna = $stmt->fetch(PDO::FETCH_COLUMN);
        return ($columna !== false) ? $columna : null;
    }

    function buscarColumnaArray($input, $tabla, $columna, $campoWhere) {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $resultados;
    }


    function buscarColumnaEnteraArray($tabla, $columna) {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla");
        $stmt->execute();  
        $resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $resultados;
    }
    
    


    function buscarFila2Campos($input1, $input2, $tabla, $campoWhere1, $campoWhere2) {
        $stmt = $this->conexion->prepare("SELECT * FROM $tabla WHERE $campoWhere1 = ? AND $campoWhere2 = ?");
        $stmt->execute([$input1, $input2]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($fila) ? $fila : null;
    }


    function buscarTodos($input, $tabla, $columna, $campoWhere){
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    function buscarTodos2Campos($input1, $input2, $tabla, $columna, $campoWhere1, $campoWhere2) {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere1 = ? AND $campoWhere2 = ?");
        $stmt->execute([$input1, $input2]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    function filas ($tabla, $campoWhere, $input){
        $stmt = $this->conexion->prepare("SELECT COUNT(*) as totalFilas FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['totalFilas'];
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

    function creaGenerosUser($id_user){
        $query = "INSERT INTO preferenciagenerosusuario (id_user, terror, romance, fantasia, cficcion, historia, arte, thriller, poesia, drama, biografia, misterio, policiaca) VALUES (?,0,0,0,0,0,0,0,0,0,0,0,0)";
        $stmt =$this->conexion->prepare($query);
        $stmt->bindParam(1, $id_user, PDO::PARAM_INT);

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
        $stmt =$this->conexion->prepare("UPDATE usuario SET activo = 1 WHERE id_user = (SELECT id_user FROM token WHERE token = ?)");
        return $stmt->execute([$token]);
    }

    /*Borra el token de la base de datos*/
    function borrarToken($token) {
        $stmt =$this->conexion->prepare("DELETE FROM token WHERE token = ?");
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
    function agregarLibro($id_user, $titulo, $sinopsis, $imagen_portada, $capitulos, $num_resenas, $valoracion, $visitas, $visitasSemana, $estado, $m_18, $m_16, $m_12) {
        $stmt =$this->conexion->prepare("INSERT INTO libro (id_user , titulo, sinopsis, imagen_portada, capitulos, num_resenas, valoracion, visitas, visitasSemana, estado, m_18, m_16, m_12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $id_user);
        $stmt->bindParam(2, $titulo);
        $stmt->bindParam(3, $sinopsis);
        $stmt->bindParam(4, $imagen_portada);
        $stmt->bindParam(5, $capitulos);
        $stmt->bindParam(6, $num_resenas);
        $stmt->bindParam(7, $valoracion);
        $stmt->bindParam(8, $visitas);
        $stmt->bindParam(9, $visitasSemana);
        $stmt->bindParam(10, $estado);
        $stmt->bindParam(11, $m_18);
        $stmt->bindParam(12, $m_16);
        $stmt->bindParam(13, $m_12);
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
        $stmt = $this->conexion->prepare("INSERT INTO seguidos (id_libro, id_user) VALUES (?, ?)");
        $stmt->bindParam(1, $id_libro, PDO::PARAM_INT);
        $stmt->bindParam(2, $id_usuario, PDO::PARAM_INT);
        $exito = $stmt->execute();
        return $exito;
    }


    /*Quita un libro de la lista de seguidos de un usuario*/
    function quitarSeguido($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("DELETE FROM seguidos WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /* Pregunta si existe la relacion */
    function existeRelacionSeguido($id_libro, $id_usuario) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM seguidos WHERE id_libro = ? AND id_user = ?");
        $stmt->execute([$id_libro, $id_usuario]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    /*Agrega un libro a la lista de pendientes de un usuario*/
    function agregarPendiente($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("INSERT INTO pendientes (id_libro, id_user) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de pendientes de un usuario*/
    function quitarPendiente($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("DELETE FROM pendientes WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }

    /* Pregunta si existe la relacion */
    function existeRelacionPendiente($id_libro, $id_usuario) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM pendientes WHERE id_libro = ? AND id_user = ?");
        $stmt->execute([$id_libro, $id_usuario]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    /*Agrega un libro a la lista de completados de un usuario*/
    function agregarTerminado($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("INSERT INTO terminado (id_libro, id_user) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de completados de un usuario*/
    function quitarTerminado($id_libro, $id_usuario) {
        $stmt =$this->conexion->prepare("DELETE FROM terminado WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }

    /* Pregunta si existe la relacion */
    function existeRelacionTerminado($id_libro, $id_usuario) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM terminado WHERE id_libro = ? AND id_user = ?");
        $stmt->execute([$id_libro, $id_usuario]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }


    /*Actualiza los GENEROS de un usuario*/
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
    }//habría que cambiar el nombre para no confundir con los Ajustes del usuario

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

    function nombreUnico($nombre){
        $stmt =$this->conexion->prepare("SELECT id_user FROM usuario WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    function generosSelecionadosUsuario($id_user) {
        $stmt =$this->conexion->prepare("SELECT * FROM preferenciagenerosusuario WHERE id_user = ?");

        $stmt->execute([$id_user]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }
    function obtenerGenerosActivos($id_libro) {
        $stmt = $this->conexion->prepare("SELECT * FROM generolibro WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $generosActivos = array();

            foreach ($fila as $campo => $valor) {
                if ($valor == 1 && $campo != 'id_libro') {
                    $generosActivos[] = $campo;
                }
            }

            return $generosActivos;
        }

        return false;
    }

    function insertarValoracion($id_user, $id_libro, $nota) {
        $stmt = $this->conexion->prepare("INSERT INTO valoraciones (id_user, id_libro, nota) VALUES (?, ?, ?)");
        $stmt->execute([$id_user, $id_libro, $nota]);
        return $stmt->rowCount() > 0;
    }

    function existeValoracion($id_user, $id_libro) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM valoraciones WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_user, $id_libro]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    function borrarValoracion($id_user, $id_libro) {
        $stmt = $this->conexion->prepare("DELETE FROM valoraciones WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_user, $id_libro]);
        return $stmt->rowCount() > 0;
    }

    function actualizarValoracionLibro($id_libro, $nueva_valoracion) {
        $stmt = $this->conexion->prepare("UPDATE libro SET valoracion = ? WHERE id_libro = ?");
        $stmt->execute([$nueva_valoracion, $id_libro]);
        return $stmt->rowCount() > 0;
    }

    function obtenerResenasPorLibro($id_libro) {
        $stmt = $this->conexion->prepare("SELECT id_user, contenido FROM resena WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    function guardarResena($id_user, $id_libro, $contenido) {
        $stmt = $this->conexion->prepare("INSERT INTO resena (id_user, id_libro, contenido) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $id_user);
        $stmt->bindParam(2, $id_libro);
        $stmt->bindParam(3, $contenido);

        return $stmt->execute() ? true : false;
    }

    function existe2campos($id_user, $id_libro, $tabla) {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM $tabla WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_user, $id_libro]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    function actualizarResena($id_user, $id_libro, $contenido) {
        $stmt = $this->conexion->prepare("UPDATE resena SET contenido = ? WHERE id_user = ? AND id_libro = ?");
        $stmt->bindParam(1, $contenido);
        $stmt->bindParam(2, $id_user);
        $stmt->bindParam(3, $id_libro);

        return $stmt->execute() ? true : false;
    }

    function actualizarUsuarioExistente($id_user, $nombre, $nick, $email, $pass, $f_nacimiento = null, $foto_perfil = null, $descripcion = null, $nivel = null) {
        $query = "UPDATE usuario SET nombre = ?, nick = ?, email = ?, pass = ?";
        $params = array($nombre, $nick, $email, $pass);
    
        // Agregar campos opcionales a la consulta y a los parámetros
        if ($f_nacimiento !== null) {
            $query .= ", f_nacimiento = ?";
            $params[] = $f_nacimiento;
        }
        if ($foto_perfil !== null) {
            $query .= ", foto_perfil = ?";
            $params[] = $foto_perfil;
        }
        if ($descripcion !== null) {
            $query .= ", descripcion = ?";
            $params[] = $descripcion;
        }
        if ($nivel !== null) {
            $query .= ", nivel = ?";
            $params[] = $nivel;
        }
    
        $query .= " WHERE id_user = ?";
        $params[] = $id_user;
    
        $stmt = $this->conexion->prepare($query);
    
        if ($stmt) {
            for ($i = 0; $i < count($params); $i++) {
                $stmt->bindParam($i + 1, $params[$i]);
            }
    
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    
    function buscarLibrosPorTitulo($texto) {
        $stmt = $this->conexion->prepare("SELECT * FROM libro WHERE titulo LIKE ?");
        $textoBusqueda = "%$texto%";  
        $stmt->bindParam(1, $textoBusqueda);
        $stmt->execute();
    
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultados;
    }

    function obtenerNombresAutoresPorLibros($libros) {
        $nombresAutores = array();
    
        foreach ($libros as $libro) {
            $id_user = $libro['id_user'];
            $nombreAutor = $this->buscar($id_user, 'usuario', 'nombre', 'id_user');
            $nombresAutores[] = $nombreAutor;
        }
    
        return $nombresAutores;
    }

    function obtenerLibrosMasVisitados($limite) {
        $consulta = "SELECT * FROM Libro ORDER BY visitas DESC LIMIT $limite";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    function obtenerLibrosSeguidos($id_user) {
        $query = "SELECT * FROM Libro WHERE id_libro IN (SELECT id_libro FROM seguidos WHERE id_user = ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $id_user);
        $stmt->execute();
    
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultados;
    }
    
    
    
}
