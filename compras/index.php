<?php
  require "funciones/conecta.php";
  $con = conecta();
  $sql = "SELECT * FROM banners 
          WHERE status = 1 AND eliminado = 0
          ORDER BY rand() 
          LIMIT 3";

  $resBanner = $con->query($sql);

  $banners=array('');
  while ($rBanner = $resBanner->fetch_array()){
      array_push($banners,"./../administrador/banners/archivos/".$rBanner['archivo']);
  }

  $sql = "SELECT * FROM productos 
          WHERE status = 1 AND eliminado = 0
          ORDER BY rand() 
          LIMIT 3";

  $resProducto = $con->query($sql);
?>

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

    <script src="javascript/agregarCarro.js"></script>
    <script src="javascript/jquery-3.3.1.min.js"></script>

    <title>Turbo Compas - Home</title>
  </head>

  <body>
    <header>
            <?php include("navBar.php") ?>
        </header>

    <!-- BANNER -->
    <header class="mt-3">
      <div class="container">
        <div
          id="carouselExampleControls"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                width="250" height="500"
                src="<?php echo $banners[1];?>"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="carousel-item">
              <img  width="250" height="500"  src="<?php echo $banners[2];?>" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img width="250" height="500" src="<?php echo $banners[3];?>" class="d-block w-100" alt="..." />
            </div>
          </div>

          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleControls"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleControls"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </header>

    <!-- PRODUCTOS -->
    <section id="productos" class="mb-4">
      <div class="container mt-5 px-5">


        

        <div class="row row-cols-1 row-cols-md-3 g-4">
          
        <?php 
          $contador=0;
          while ($row = $resProducto->fetch_array()){
            $contador = $contador + 1;
            $id = $row["id"];
            $nombre = $row["nombre"];
            $codigo =$row["codigo"];
            $descripcion = $row["descripcion"];
            $costo = $row["costo"];
            $stock = $row['stock'];
            $archivo = "./../administrador/productos/archivos/".$row['archivo'];
        ?>

          <div class="col">
            <div class="card text-center">
              
              <div class="img-phone">
                <img src="<?php echo $archivo; ?>" class="card-img-top" height="300px" alt="..."  />
              </div>

              <div class="card-body">
                <h5 class="card-title"><?php echo $nombre ?></h5>
                <p class="card-text">
                  $<?php echo $costo ?>
                </p>
                <div class="d-flex flex-column align-items-center">
                  <div>
                    <button onclick="agregarCarrro(<?php echo $id; ?>);" type="button" class="btn btn-dark btn-md mb-2">
                      Agregar al Carrito
                    </button>
                    <select class="form-select-sm" id="<?php echo "cantidad-".$id; ?>">
                      <?php
                        $con=0;
                        while($con < $stock){
                          $con=$con+1;
                          echo "<option name=\"cantidad\" value=\"".$con."\">".$con."</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <button
                    type="button"
                    class="btn btn-sm btn-secondary"
                    data-bs-toggle="modal"
                    data-bs-target="<?php echo "#detalles-".$contador ?>"
                  >
                    Detalles
                  </button>
                </div>
              </div>
                <div id="msg-success-<?php echo $id; ?>" class="alert alert-success" style="display:none;" role="alert">
                  Se agreg?? al carrito!
                </div>
                <div id="msg-danger-<?php echo $id; ?>" class="alert alert-danger" style="display:none;" role="alert">
                  Error: No se pudo agregar al carrito!
                </div>
            </div>
          </div>

          <!-- Modal Producto 1 -->
          <div
            class="modal fade"
            id="<?php echo "detalles-".$contador?>"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <?php echo $nombre ?>
                  </h1>

                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="img-phone">
                  <div class="modal-img">
                    <img class="card-img-top" width="500" height="350px" src="<?php echo $archivo; ?>" alt="" />
                  </div>
                </div>
                <div class="modal-body">
                  <p style="text-align:center" > 
                    Stock: <?php echo $stock ?> 
                  </p>
                  <p style="text-align:center" > 
                    <?php echo $descripcion ?>
                    </p>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                  >
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          <?php } ?>

        </div>

        <div class="d-flex justify-content-center mt-3">
          <a href="./productos.php" class="btn btn-md btn-outline-dark"
            >Ver todos</a
          >
        </div>
      </div>
    </section>

    <!-- FOOTER  -->
    <?php include("footer.php") ?>


  </body>
</html>
