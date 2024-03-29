<?php
class Consultas extends Modelo
{
    /*Buscar en la linea de una tabla, con un campo*/
    public function buscar($input, $tabla, $columna, $campoWhere)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($resultado) ? $resultado[$columna] : null;
    }

    public function buscar2Campos($input1, $input2, $tabla, $columna, $campoWhere1, $campoWhere2)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere1 = ? AND $campoWhere2 = ?");
        $stmt->execute([$input1, $input2]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($resultado) ? $resultado[$columna] : null;
    }

    public function buscarFila($input, $tabla, $campoWhere)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($fila) ? $fila : null;
    }

    public function buscarColumna($input, $tabla, $columna, $campoWhere)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $columna = $stmt->fetch(PDO::FETCH_COLUMN);
        return ($columna !== false) ? $columna : null;
    }

    public function buscarTablaCompleta($tabla)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($resultados !== false) ? $resultados : null;
    }

    public function buscarTablaCompletaOrdenada($tabla)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM $tabla ORDER BY libro.valoracion DESC ");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($resultados !== false) ? array_slice($resultados, 0, 3) : null;
    }

    public function buscarColumnaArray($input, $tabla, $columna, $campoWhere)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $resultados;
    }

    public function buscarColumnaEnteraArray($tabla, $columna)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $resultados;
    }

    public function buscarFila2Campos($input1, $input2, $tabla, $campoWhere1, $campoWhere2)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM $tabla WHERE $campoWhere1 = ? AND $campoWhere2 = ?");
        $stmt->execute([$input1, $input2]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($fila) ? $fila : null;
    }

    public function buscarTodos($input, $tabla, $columna, $campoWhere)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function buscarTodos2Campos($input1, $input2, $tabla, $columna, $campoWhere1, $campoWhere2)
    {
        $stmt = $this->conexion->prepare("SELECT $columna FROM $tabla WHERE $campoWhere1 = ? AND $campoWhere2 = ?");
        $stmt->execute([$input1, $input2]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function filas($tabla, $campoWhere, $input)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) as totalFilas FROM $tabla WHERE $campoWhere = ?");
        $stmt->execute([$input]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['totalFilas'];
    }

    public function usuarioUnico($nombre)
    {
        $stmt = $this->conexion->prepare("SELECT nick FROM usuario WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($resultado)) {
            return true;
        } else {
            return false;
        }
    }

    public function correoUnico($email)
    {
        $stmt = $this->conexion->prepare("SELECT email FROM usuario WHERE email= ?");
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($resultado)) {
            return true;
        } else {
            return false;
        }
    }

    /*Agregar usuario a la base de datos*/
    public function agregarNuevoUsuario($nombre, $nick, $email, $pass, $f_nacimiento, $foto_perfil, $descripcion, $nivel, $activo)
    {
        $query = "INSERT INTO usuario (nombre, nick, email, pass, f_nacimiento, foto_perfil, descripcion, nivel, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
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

    public function creaGenerosUser($id_user)
    {
        $query = "INSERT INTO preferenciagenerosusuario (id_user, terror, romance, fantasia, cficcion, historia, arte, thriller, poesia, drama, biografia, misterio, policiaca) VALUES (?,0,0,0,0,0,0,0,0,0,0,0,0)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $id_user, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /*Tokens de usuarios*/
    public function agregarToken($token, $validez, $id)
    {
        $query = "INSERT INTO token (token, validez, id_user) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
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
    public function verificarToken($token)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) AS count FROM token WHERE token = ? AND validez > UNIX_TIMESTAMP(NOW())");
        $stmt->execute([$token]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($resultado['count'] > 0);
    }

    /*Verifica si el token tiene una fecha válida*/
    public function validarFechaValidezPorToken($token)
    {
        $stmt = $this->conexion->prepare("SELECT validez FROM token WHERE token = ?");
        $stmt->execute([$token]);
        $fechaValidez = $stmt->fetchColumn();

        $fechaActual = time();
        return ($fechaValidez > $fechaActual);
    }

    /*Activa la cuenta del usuario*/
    public function activarUsuarioPorToken($token)
    {
        $stmt = $this->conexion->prepare("UPDATE usuario SET activo = 1 WHERE id_user = (SELECT id_user FROM token WHERE token = ?)");
        return $stmt->execute([$token]);
    }

    /*Borra el token de la base de datos*/
    public function borrarToken($token)
    {
        $stmt = $this->conexion->prepare("DELETE FROM token WHERE token = ?");
        return $stmt->execute([$token]);
    }

    /*Comprueba que el email está en la base de datos*/
    public function verificarEmail($email)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /*Comprueba que la contraseña es correcta*/
    public function verificarPass($email, $pass)
    {
        $stmt = $this->conexion->prepare("SELECT pass FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        $hashAlmacenado = $stmt->fetchColumn();
        return password_verify($pass, $hashAlmacenado);
    }

    /*Guarda el libro en la base de datos*/
    public function agregarLibro($id_user, $titulo, $sinopsis, $imagen_portada, $capitulos, $num_resenas, $valoracion, $visitas, $visitasSemana, $estado)
    {
        $stmt = $this->conexion->prepare("INSERT INTO libro (id_user , titulo, sinopsis, imagen_portada, capitulos, num_resenas, valoracion, visitas, visitasSemana, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
        return $stmt->execute();
    }

    /*Guardar capítulo en la base de datos*/
    public function agregarCapitulo($id_libro, $num_cap, $titulo, $archivo)
    {
        $stmt = $this->conexion->prepare("INSERT INTO capitulos (id_libro, num_cap, titulo, archivo) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $id_libro);
        $stmt->bindParam(2, $num_cap);
        $stmt->bindParam(3, $titulo);
        $stmt->bindParam(4, $archivo);
        return $stmt->execute();
    }

    /*Al agregar un capitulo, se incrementa el numero de capitulos del libro*/
    public function aumentarCapitulosLibro($id_libro)
    {
        $stmt = $this->conexion->prepare("UPDATE libro SET capitulos = capitulos + 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Al borrar un capitulo, se decrementa el numero de capitulos del libro*/
    public function reducirCapitulosLibro($id_libro)
    {
        $stmt = $this->conexion->prepare("UPDATE libro SET capitulos = capitulos - 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Al agregar una reseña, se incrementa el numero de reseñas del libro*/
    public function aumentarNumResenasLibro($id_libro)
    {
        $stmt = $this->conexion->prepare("UPDATE libro SET num_resenas = num_resenas + 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Al borrar una reseña, se decrementa el numero de reseñas del libro*/
    public function reducirNumResenasLibro($id_libro)
    {
        $stmt = $this->conexion->prepare("UPDATE libro SET num_resenas = num_resenas - 1 WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Calcula la media de las valoraciones de un libro*/
    public function calcularMediaValoraciones($id_libro)
    {
        $stmt = $this->conexion->prepare("SELECT AVG(valoracion) AS media FROM resena WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado['media'] !== null) {
            return $resultado['media'];
        } else {
            return 0;
        }
    }

    /*Actualiza la valoracion de un libro*/
    public function actualizarValoracion($id_libro, $valoracion)
    {
        $stmt = $this->conexion->prepare("UPDATE libro SET valoracion = $valoracion WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
    }

    /*Agrega un libro a la lista de seguidos de un usuario*/
    public function agregarSeguido($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("INSERT INTO seguidos (id_libro, id_user) VALUES (?, ?)");
        $stmt->bindParam(1, $id_libro, PDO::PARAM_INT);
        $stmt->bindParam(2, $id_usuario, PDO::PARAM_INT);
        $exito = $stmt->execute();
        return $exito;
    }

    /*Quita un libro de la lista de seguidos de un usuario*/
    public function quitarSeguido($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("DELETE FROM seguidos WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /* Pregunta si existe la relacion */
    public function existeRelacionSeguido($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM seguidos WHERE id_libro = ? AND id_user = ?");
        $stmt->execute([$id_libro, $id_usuario]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    /*Agrega un libro a la lista de pendientes de un usuario*/
    public function agregarPendiente($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("INSERT INTO pendientes (id_libro, id_user) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de pendientes de un usuario*/
    public function quitarPendiente($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("DELETE FROM pendientes WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }

    /* Pregunta si existe la relacion */
    public function existeRelacionPendiente($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM pendientes WHERE id_libro = ? AND id_user = ?");
        $stmt->execute([$id_libro, $id_usuario]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    /*Agrega un libro a la lista de completados de un usuario*/
    public function agregarTerminado($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("INSERT INTO terminado (id_libro, id_user) VALUES (?, ?)");
        $stmt->execute([$id_libro, $id_usuario]);
    }

    /*Quita un libro de la lista de completados de un usuario*/
    public function quitarTerminado($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("DELETE FROM terminado WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_usuario, $id_libro]);
    }

    /* Pregunta si existe la relacion */
    public function existeRelacionTerminado($id_libro, $id_usuario)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM terminado WHERE id_libro = ? AND id_user = ?");
        $stmt->execute([$id_libro, $id_usuario]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    /*Actualiza los GENEROS de un usuario*/
    public function actualizarPreferenciasUsuario($id_user, $terror, $romance, $fantasia, $cficcion, $historia, $arte, $thriller, $poesia, $drama, $biografia, $misterio, $policiaca)
    {
        $stmt = $this->conexion->prepare("UPDATE preferenciagenerosusuario SET
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
    } //habría que cambiar el nombre para no confundir con los Ajustes del usuario

    public function obtenerTitulosLibrosPorUsuario($id_user)
    {
        $stmt = $this->conexion->prepare("SELECT titulo FROM libro WHERE id_user = ?");
        $stmt->bindParam(1, $id_user);
        $stmt->execute();

        $titulos = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $titulos[] = $row['titulo'];
        }

        return $titulos;
    }

    public function obtenerIdLibrosPorUsuario($id_user)
    {
        $stmt = $this->conexion->prepare("SELECT id_libro FROM libro WHERE id_user = ?");
        $stmt->bindParam(1, $id_user);
        $stmt->execute();

        $ids = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ids[] = $row['id_libro'];
        }

        return $ids;
    }

    public function nombreUnico($nombre)
    {
        $stmt = $this->conexion->prepare("SELECT id_user FROM usuario WHERE nombre = ?");
        $stmt->execute([$nombre]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function generosSelecionadosUsuario($id_user)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM preferenciagenerosusuario WHERE id_user = ?");

        $stmt->execute([$id_user]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function obtenerGenerosActivos($id_libro)
    {
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

    public function insertarValoracion($id_user, $id_libro, $nota)
    {
        $stmt = $this->conexion->prepare("INSERT INTO valoraciones (id_user, id_libro, nota) VALUES (?, ?, ?)");
        $stmt->execute([$id_user, $id_libro, $nota]);
        return $stmt->rowCount() > 0;
    }

    public function existeValoracion($id_user, $id_libro)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM valoraciones WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_user, $id_libro]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    public function borrarValoracion($id_user, $id_libro)
    {
        $stmt = $this->conexion->prepare("DELETE FROM valoraciones WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_user, $id_libro]);
        return $stmt->rowCount() > 0;
    }

    public function actualizarValoracionLibro($id_libro, $nueva_valoracion)
    {
        $stmt = $this->conexion->prepare("UPDATE libro SET valoracion = ? WHERE id_libro = ?");
        $stmt->execute([$nueva_valoracion, $id_libro]);
        return $stmt->rowCount() > 0;
    }

    public function obtenerResenasPorLibro($id_libro)
    {
        $stmt = $this->conexion->prepare("SELECT id_user, contenido FROM resena WHERE id_libro = ?");
        $stmt->execute([$id_libro]);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    public function guardarResena($id_user, $id_libro, $contenido)
    {
        $stmt = $this->conexion->prepare("INSERT INTO resena (id_user, id_libro, contenido) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $id_user);
        $stmt->bindParam(2, $id_libro);
        $stmt->bindParam(3, $contenido);

        return $stmt->execute() ? true : false;
    }

    public function existe2campos($id_user, $id_libro, $tabla)
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM $tabla WHERE id_user = ? AND id_libro = ?");
        $stmt->execute([$id_user, $id_libro]);
        $cantidad = $stmt->fetchColumn();
        return $cantidad > 0;
    }

    public function actualizarResena($id_user, $id_libro, $contenido)
    {
        $stmt = $this->conexion->prepare("UPDATE resena SET contenido = ? WHERE id_user = ? AND id_libro = ?");
        $stmt->bindParam(1, $contenido);
        $stmt->bindParam(2, $id_user);
        $stmt->bindParam(3, $id_libro);

        return $stmt->execute() ? true : false;
    }

    public function modificaNivelUsuario($id_user, $nivel)
    {
        $stmt = $this->conexion->prepare("UPDATE usuario SET nivel = ? WHERE id_user = ?");
        $stmt->execute([$nivel, $id_user]);
        return $stmt->rowCount() > 0;
    }

    public function buscarLibrosPorTitulo($texto)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM libro WHERE titulo LIKE ?");
        $textoBusqueda = "%$texto%";
        $stmt->bindParam(1, $textoBusqueda);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function obtenerNombresAutoresPorLibros($libros)
    {
        $nombresAutores = array();

        foreach ($libros as $libro) {
            $id_user = $libro['id_user'];
            $nombreAutor = $this->buscar($id_user, 'usuario', 'nombre', 'id_user');
            $nombresAutores[] = $nombreAutor;
        }

        return $nombresAutores;
    }

    public function obtenerLibrosMasVisitados($limite)
    {
        $consulta = "SELECT * FROM Libro ORDER BY visitas DESC LIMIT $limite";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();

        // Obtener resultados como un array asociativo
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function obtenerLibrosSeguidos($id_user)
    {
        $query = "SELECT * FROM Libro WHERE id_libro IN (SELECT id_libro FROM seguidos WHERE id_user = ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(1, $id_user);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function modificarUsuario($id_user, $nombre, $nick, $foto_perfil, $descripcion)
    {
        $stmt = $this->conexion->prepare("UPDATE usuario SET nombre = ?, nick = ?, foto_perfil = ?, descripcion = ? WHERE id_user = ?");
        $stmt->execute([$nombre, $nick, $foto_perfil, $descripcion, $id_user]);
    }

    public function verificarPassID($id_user, $pass)
    {
        $stmt = $this->conexion->prepare("SELECT pass FROM usuario WHERE id_user = ?");
        $stmt->execute([$id_user]);
        $hashAlmacenado = $stmt->fetchColumn();
        return password_verify($pass, $hashAlmacenado);
    }

    public function cambiarPass($id_user, $pass)
    {
        $stmt = $this->conexion->prepare("UPDATE usuario SET pass = ? WHERE id_user = ?");
        $stmt->execute([$pass, $id_user]);
        return $stmt->rowCount() > 0;
    }

    public function obtenerLibrosPorGenero($genero)
    {
        $stmt = $this->conexion->prepare("SELECT id_libro FROM generolibro WHERE $genero = 1");
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $libros = array();
        foreach ($resultados as $id_libro) {
            $stmt = $this->conexion->prepare("SELECT * FROM libro WHERE id_libro = ?");
            $stmt->execute([$id_libro]);
            $libros[] = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $libros;
    }

    public function obtenerLibrosAleatoriosPorGenero($genero)
    {
        $stmt = $this->conexion->prepare("SELECT id_libro FROM generolibro WHERE $genero = 1");
        $stmt->execute();
        $idsLibros = $stmt->fetchAll(PDO::FETCH_COLUMN);

        shuffle($idsLibros); // Baraja los IDs de los libros

        $idsLibros = array_slice($idsLibros, 0, 3); // Selecciona solo los primeros 3 IDs aleatorios

        $libros = array();
        foreach ($idsLibros as $id_libro) {
            $stmt = $this->conexion->prepare("SELECT * FROM libro WHERE id_libro = ?");
            $stmt->execute([$id_libro]);
            $libros[] = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return $libros;
    }

    public function guardarGeneroLibro($id_libro, $columnasPresentes)
    {
        $valores = array(
            'id_libro' => $id_libro,
            'terror' => 0,
            'romance' => 0,
            'fantasia' => 0,
            'cficcion' => 0,
            'historia' => 0,
            'arte' => 0,
            'thriller' => 0,
            'poesia' => 0,
            'drama' => 0,
            'biografia' => 0,
            'misterio' => 0,
            'policiaca' => 0,
        );
        foreach ($columnasPresentes as $columna) {
            if (array_key_exists($columna, $valores)) {
                $valores[$columna] = 1;
            }
        }

        $sql = "INSERT INTO generolibro (id_libro, terror, romance, fantasia, cficcion, historia, arte, thriller, poesia, drama, biografia, misterio, policiaca) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array_values($valores));
        return ($stmt->rowCount() > 0);
    }

}
