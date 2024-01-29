<?php

$params = array(
    'id_libro' => '',
    'num_cap' => '',
    'titulo' => '',
    'archivo' => '',
    'titulo_libro' => ''
);

$params["id_libro"] = isset($_GET['id_libro']) ? $_GET['id_libro'] : null;
$params["num_cap"] = isset($_GET['num_cap']) ? $_GET['num_cap'] : null;
$params["titulo"] = isset($_GET['titulo']) ? $_GET['titulo'] : null;
$params["archivo"] = isset($_GET['archivo']) ? $_GET['archivo'] : null;
$params["titulo_libro"] = isset($_GET['titulo_libro']) ? $_GET['titulo_libro'] : null;

?>

<div class="container">
    <h1><?php echo $params["titulo_libro"] ?></h1>
    <h2>Capítulo: <?php echo $params["num_cap"]?> - <?php echo $params["titulo"]?></h2>


    <!-- Utilizando la etiqueta <embed> para mostrar el PDF -->
    <embed src="../app/archivos/capitulos/<?php echo $params["archivo"] ?>" type="application/pdf" width="100%" height="600px" />
</div>

<?php include 'layout.php' ?>