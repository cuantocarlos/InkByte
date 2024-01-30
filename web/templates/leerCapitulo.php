<div class="container">
<form action="" method="post">
    <div class="cabecera bg-rosa p-3 mt-3 rounded-top-5">
        <h1><?php echo $params["titulo_libro"] ?></h1>
        <h2>Capítulo: <?php echo $params["num_cap"]?> - <?php echo $params["titulo"]?></h2>
    </div>


    <!-- Utilizando la etiqueta <embed> para mostrar el PDF -->
    <embed src="../app/archivos/capitulos/<?php echo $params["archivo"] ?>" type="application/pdf" width="100%" height="600px" />
    <div class="botones">
    
    <label for="opciones"></label>
    <div class="row">
        <div class="pt-5 pb-3 col-9">
        <select id="capituloDropdown" class="form-select" name="lista_capitulos">
            <?php
                $i = 1;
                foreach($capitulos as $capitulo){
                    echo '<option value='. $i . '> Capítulo ' . $i . ' - ' . $capitulo["titulo"] . '</option>';
                    $i++;
                }
            ?>
        </select>


        </div>
        <div class="pt-5 pb-3 col-3">
        <button type="submit" class=" col-12 btn-dark btn" name="seleccionar_capitulo">Seleccionar capítulo</button>
        </div>
    </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-center">
                <button type="submit" class="m-2 col-12 btn-dark btn" name="capitulo_anterior">Capítulo anterior</button>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <button type="submit" class="m-2 col-12 btn-dark btn" name="capitulo_siguiente">Capítulo siguiente</button>
            </div>
        </div>
    
    </div>
    </form>
</div>

<?php include 'layout.php' ?>