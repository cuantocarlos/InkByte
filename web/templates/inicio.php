<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página con Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
   
    $cs = new Consultas();

    // Datos del libro de prueba
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 2; // o $_SESSION['id_user'] cuando funcione el login
    $titulo = 'Libro de Prueba';
    $sinopsis = 'Sinopsis del Libro de Prueba';
    $imagen_portada = 'imagen1.jpg';
    $capitulos = 10;
    $num_resenas = 5;
    $valoracion = 4.5;
    $visitas = 100;
    $visitasSemana = 20;
    $estado = 1;
    $m_18 = 0;
    $m_16 = 1;
    $m_12 = 0;

   
     //$cs->agregarLibro($id_user, $titulo, $sinopsis, $imagen_portada, $capitulos, $num_resenas, $valoracion, $visitas, $visitasSemana, $estado, $m_18, $m_16, $m_12);
   
    echo "Libros de prueba insertados correctamente.";
    ?>

    <div class="container mt-4">
    <h2>Por Género:</h2>
        <div class="row">

            <?php
            var_dump($id_user);
            if ($id_user !== null) {
                try {
                    $cs = new Consultas();
                    $librosRecomendados = $cs->obtenerLibrosRecomendados($id_user);

                    foreach ($librosRecomendados as $libro) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '<div class="card">';
                        echo '<img src="' . $libro['imagen_portada'] . '" class="card-img-top" alt="Portada del libro">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $libro['titulo'] . '</h5>';
                        echo '<p class="card-text">' . $libro['sinopsis'] . '</p>';
                        // Verifica si la clave 'descripcion' existe antes de intentar acceder a ella
                        if (isset($libro['descripcion'])) {
                            echo '<p class="card-text"><small class="text-muted">' . $libro['descripcion'] . '</small></p>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener libros recomendados: " . $e->getMessage();
                }
            } else {
                echo "No se ha encontrado el ID del usuario en la sesión.";
            }
            ?>

        </div>
    </div>
<hr>

    <div class="container mt-4">
            <h2>Por Visitas:</h2>
    <div class="row">

            <?php
            if ($id_user !== null) {
                try {
                    $cs = new Consultas();

                    $librosMasVisitados = $cs->obtenerLibrosMasVisitados(6);
                    
                    foreach ($librosMasVisitados as $libro) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '<div class="card">';
                        echo '<img src="' . $libro['imagen_portada'] . '" class="card-img-top" alt="Portada del libro">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $libro['titulo'] . '</h5>';
                        echo '<p class="card-text">' . $libro['sinopsis'] . '</p>';
                        // Verifica si la clave 'descripcion' existe antes de intentar acceder a ella
                        if (isset($libro['descripcion'])) {
                            echo '<p class="card-text"><small class="text-muted">' . $libro['descripcion'] . '</small></p>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener libros más visitados: " . $e->getMessage();
                }
            } else {
                echo "No se ha encontrado el ID del usuario en la sesión.";
            }
            ?>

        </div>
   
