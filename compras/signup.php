<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- BOOTSTRAP CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />

    <!-- STYLES -->
    <link rel="stylesheet" href="./css/style.css" />
    
    <script src="javascript/registrar.js"></script>
    <script src="javascript/jquery-3.3.1.min.js"></script>

    <title>Turbo Compas - Registro</title>
  </head>

  <body>
  <header>
      <?php include("navBar.php") ?>
    </header>
    <section class="vh-100">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div
            class="row d-flex justify-content-center align-items-center h-100"
          >
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card text-center" style="border-radius: 1rem">
                <div class="card-body p-5">
                  <h3 class="text-center mb-5">Crear una cuenta</h3>

                  <form id="forma1" name="forma1" method="GET", action="funciones/registrar.php">
                    <div class="form-outline mb-4">
                      <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control form-control-lg"
                      />
                      <label class="form-label" for="form3Example1cg"
                        >Nombre
                      </label>
                    </div>

                    <div class="form-outline mb-4">
                      <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control form-control-lg"
                      />
                      <label class="form-label" for="form3Example3cg"
                        >Email</label
                      >
                      <div style="display:none" class="alert alert-danger" id="msgCorreo" role="alert">
                        El correo ya esta registrado!
                      </div>
  
                    </div>

                   
                    <div class="form-outline mb-4">
                      <input
                        type="password"
                        id="pass"
                        name="pass"
                        class="form-control form-control-lg"
                      />
                      <label class="form-label" for="form3Example4cg"
                        >Contraseña</label
                      >
                    </div>

                    <div class="d-flex justify-content-center">
                      <button onclick="validacion();" type="button" class="btn btn-primary btn-lg">
                        Registrarse
                      </button>
                    </div>
                  </form>
                </div>
                
                <div class="alert alert-danger" id="msgNoCompletos" style="display:none" role="alert">
                  No estan todos los campos llenos
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
