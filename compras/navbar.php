<?php
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  
  $textoBT="Iniciar Sesion";
  $paginaAccion="./login.php";

  if(isset($_SESSION["idUsuario"])){    
    $textoBT="Cerrar Sesion";
    $paginaAccion="./funciones/cerrar_session.php";
  }
?>

    
    <!-- NAVBAR  -->
    <nav
      class="navbar navbar-expand-lg bg-black text-light navbar-bg-color py-3 px-4"
    >
      <div class="container-fluid navbar-container">
        <div>
          <a class="navbar-brand text-light" href="#"
            >Turbo Compas Inc &copy;</a
          >
          <button
            class="navbar-toggler text-light navbar-btn-color"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon text-light"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse navbar-ul-style" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
              <button
                class="nav-link text-light bg-transparent"
                style="border: none"
                data-bs-toggle="modal"
                data-bs-target="#contacto"
              >
                Contacto
              </button>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="carro.php">Carrito</a>
            </li>
          </ul>

          <a href="<?php echo $paginaAccion; ?>" class="btn btn-md btn-outline-light"
            ><?php echo $textoBT; ?></a
          >
        </div>

      </div>
    </nav>

    <!-- Modal Contacto -->
    <form id="forma1" name="forma1" method="GET", action="funciones/sendEmail.php">
      <div
        class="modal fade"
        id="contacto"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Suscribirse</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="form-outline text-center">
                <input
                  type="email"
                  id="tEmail"
                  name="tEmail"
                  class="form-control form-control-lg"
                />
                <label class="form-label" for="tEmail">Email</label>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>

        </div>
      </div>

    </form>