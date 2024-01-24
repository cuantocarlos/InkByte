<?php 
include "../../app/libs/bGeneral.php";
include "../../app/modelo/classConsultas.php";

try{
    $cs = new Consultas();
    $titulos = $cs -> obtenerTitulosLibrosPorUsuario($_SESSION["id_user"]);
    $id = $cs -> obtenerIdLibrosPorUsuario($_SESSION["id_user"]);
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container d-flex flex-column mt-5">
        <h2>Sube tu capítulo</h2>
        <form action="" method="post">

            <div class="form-group">
                <label for="tus_opciones">Selecciona un libro:</label>
                <select class="form-control" id="tus_opciones" name="tus_opciones">
                    <?php
                        for ($i = 0; $i < count($titulos); $i++) {
                            echo '<option value='. $ids[$i] . '>' . $titulos[$i] . '</option>';
                        }                    
                    ?>
                </select>
            </div>
    
            <div class="form-group">
                <label for="titulo_cap">Título del capítulo:</label>
                <input type="text" class="form-control" name="titulo_cap" id="titulo_cap">
            </div>

            <div class="form-group">
                <label for="numero_cap">Ingresa un número:</label>
                <input type="number" class="form-control" id="numero_cap" name="numero_cap" min="0" max="9999" step="1">
            </div>
            
            <div class="form-group">
                <label for="archivoPDF">Selecciona un archivo PDF:</label>
                <input type="file" class="form-control-file" id="archivoPDF" name="archivoPDF" accept=".pdf">
            </div>

            
        </form>
    </div>