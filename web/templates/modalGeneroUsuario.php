<style>
/* Terror */
.terror:checked + .terror-label,
.terror:hover + .terror-label {
    background-color: #8B4513; /* Marrón rojizo */
    color: #fff;
    border: 1px solid #8B4513;
}
.terror-label {
    border: 1px solid #8B4513;
    color: #8B4513;
}

/* Romance */
.romance:checked + .romance-label,
.romance:hover + .romance-label {
    background-color: #FF69B4; /* Rosa intenso */
    color: #fff;
    border: 1px solid #FF69B4;
}
.romance-label {
    border: 1px solid #FF69B4;
    color: #FF69B4;
}

/* Fantasía */
.fantasia:checked + .fantasia-label,
.fantasia:hover + .fantasia-label {
    background-color: #9370DB; /* Púrpura medio */
    color: #fff;
    border: 1px solid #9370DB;
}
.fantasia-label {
    border: 1px solid #9370DB;
    color: #9370DB;
}

/* Ciencia Ficción */
.cficcion:checked + .cficcion-label,
.cficcion:hover + .cficcion-label {
    background-color: #00CED1; /* Turquesa medio */
    color: #000;
    border: 1px solid #00CED1;
}
.cficcion-label {
    border: 1px solid #00CED1;
    color: #00CED1;
}

/* Historia */
.historia:checked + .historia-label,
.historia:hover + .historia-label {
    background-color: #FA8072; /* Rojo salmón claro */
    color: #fff;
    border: 1px solid #FA8072;
}
.historia-label {
    border: 1px solid #FA8072;
    color: #FA8072;
}

/* Arte */
.arte:checked + .arte-label,
.arte:hover + .arte-label {
    background-color: #5F9EA0; /* Azul verdoso claro */
    color: #fff;
    border: 1px solid #5F9EA0;
}
.arte-label {
    border: 1px solid #5F9EA0;
    color: #5F9EA0;
}


/* Thriller */
.thriller:checked + .thriller-label,
.thriller:hover + .thriller-label {
    background-color: #1E90FF; /* Azul real */
    color: #fff;
    border: 1px solid #1E90FF;
}
.thriller-label {
    border: 1px solid #1E90FF;
    color: #1E90FF;
}

/* Poesía */
.poesia:checked + .poesia-label,
.poesia:hover + .poesia-label {
    background-color: #FF6347; /* Rojo tomate */
    color: #fff;
    border: 1px solid #FF6347;
}
.poesia-label {
    border: 1px solid #FF6347;
    color: #FF6347;
}

/* Drama */
.drama:checked + .drama-label,
.drama:hover + .drama-label {
    background-color: #FF8C00; /* Naranja oscuro */
    color: #fff;
    border: 1px solid #FF8C00;
}
.drama-label {
    border: 1px solid #FF8C00;
    color: #FF8C00;
}

/* Biografía */
.biografia:checked + .biografia-label,
.biografia:hover + .biografia-label {
    background-color: #FFA07A; /* Salmón claro */
    color: #fff;
    border: 1px solid #FFA07A;
}
.biografia-label {
    border: 1px solid #FFA07A;
    color: #FFA07A;
}


/* Misterio */
.misterio:checked + .misterio-label,
.misterio:hover + .misterio-label {
    background-color: #8A2BE2; /* Violeta oscuro */
    color: #fff;
    border: 1px solid #8A2BE2;
}
.misterio-label {
    border: 1px solid #8A2BE2;
    color: #8A2BE2;
}

/* Policíaca */
.policiaca:checked + .policiaca-label,
.policiaca:hover + .policiaca-label {
    background-color: #DC143C; /* Rojo carmín */
    color: #fff;
    border: 1px solid #DC143C;
}
.policiaca-label {
    border: 1px solid #DC143C;
    color: #DC143C;
}
</style>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  GenerosUsuario
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Selecciona tus generos favoritos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?ctl=inicio" method="POST">
        <div class="container d-flex pt-5 py-3 gap-3 justify-content-center">



          <div class="d-flex flex-column gap-3">
          <!--Terror -->
          <input type="checkbox" class="btn-check terror" id="terror" autocomplete="off" name="generoUsuario" value="terror">
          <label class="btn btn-outline-primary mb-5 terror-label" for="terror">Terror</label>
          <!-- Romance -->
          <input type="checkbox" class="btn-check romance" id="romance" autocomplete="off" name="generoUsuario" value="romance">
          <label class="btn btn-outline-primary mb-5 romance-label" for="romance">Romance</label>
          <!-- Fantasía -->
          <input type="checkbox" class="btn-check fantasia" id="fantasia" autocomplete="off" name="generoUsuario" value="fantasia">
          <label class="btn btn-outline-primary mb-5 fantasia-label" for="fantasia">Fantasía</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Ciencia Ficción -->
          <input type="checkbox" class="btn-check cficcion" id="cficcion" autocomplete="off" name="generoUsuario" value="c_ficcion">
          <label class="btn btn-outline-primary mb-5 cficcion-label" for="cficcion">C.Ficción</label>
          <!-- Historia -->
          <input type="checkbox" class="btn-check historia" id="historia" autocomplete="off" name="generoUsuario" value="historia">
          <label class="btn btn-outline-primary mb-5 historia-label" for="historia">Historia</label>
          <!-- Arte -->
          <input type="checkbox" class="btn-check arte" id="arte" autocomplete="off" name="generoUsuario" value="arte">
          <label class="btn btn-outline-primary mb-5 arte-label" for="arte">Arte</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Thriller -->
          <input type="checkbox" class="btn-check thriller" id="thriller" autocomplete="off" name="generoUsuario" value="thriller">
          <label class="btn btn-outline-primary mb-5 thriller-label" for="thriller">Thriller</label>
          <!-- Poesía -->
          <input type="checkbox" class="btn-check poesia" id="poesia" autocomplete="off" name="generoUsuario" value="poesia">
          <label class="btn btn-outline-primary mb-5 poesia-label" for="poesia">Poesía</label>
          <!-- Biografía -->
          <input type="checkbox" class="btn-check biografia" id="biografia" autocomplete="off" name="generoUsuario" value="biografia">
          <label class="btn btn-outline-primary mb-5 biografia-label" for="biografia">Biografía</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Misterio -->
          <input type="checkbox" class="btn-check misterio" id="misterio" autocomplete="off" name="generoUsuario" value="misterio">
          <label class="btn btn-outline-primary mb-5 misterio-label" for="misterio">Misterio</label>
          <!-- Policíaca -->
          <input type="checkbox" class="btn-check policiaca" id="policiaca" autocomplete="off" name="generoUsuario" value="policiaca">
          <label class="btn btn-outline-primary mb-5 policiaca-label" for="policiaca">Policíaca</label>
          <!-- Drama -->
          <input type="checkbox" class="btn-check drama" id="drama" autocomplete="off" name="generoUsuario" value="drama">
          <label class="btn btn-outline-primary mb-5 drama-label" for="drama">Drama</label>
          </div>



    </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="bAceptar" name="bAceptar">Guardar</button>
      </div>
    </div>
  </div>
</div>

<?php include('layout.php'); ?>