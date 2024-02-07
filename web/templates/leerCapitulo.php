<div class="container mt-5">
<form action="" method="post">
    <div class="cabecera bg-rosa p-3 fw-bold mt-5 d-flex justify-content-between">
        <div>
        <h1><?php echo $params["titulo_libro"] ?></h1>
        <h2>Capítulo: <?php echo $params["num_cap"]?> - <?php echo $params["titulo"]?></h2>
        </div>
        <div class="d-flex justify-content-end">
        <button type="submit" class="m-2 col-12 btn-dark btn" name="volver">Volver al libro</button>
        </div>
    </div>


    <!-- Utilizando la etiqueta <embed> para mostrar el PDF -->
    <div class="visorPDF d-flex">
        <embed class="contenidoPDF col-12" src="../app/archivos/capitulos/<?php echo $params["archivo"] ?>" type="application/pdf"/>
    </div>
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
        <button type="submit" class=" col-12 btn-dark btn d-flex justify-content-center" name="seleccionar_capitulo"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-book d-block d-md-none" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg><p class="d-none d-md-block">Seleccionar capítulo</p></button>
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