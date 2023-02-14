<?php
  require "funciones/conecta.php";
  $con = conecta();

  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 

  if(!isset($_SESSION["idUsuario"])){    
    echo "-1";
    header('Location: ./login.php');
  }else{
    $idUsuario = $_SESSION["idUsuario"];
    //Constula user pedido id
    $sql = "SELECT * FROM usuarios 
    WHERE status = 1 AND id = '$idUsuario' ";

    $resUsuarios = $con->query($sql);
    $result = mysqli_fetch_array($resUsuarios);
    if ($result > 0){
        $idPedido=$result['pedido'];   
    }

    //Consultar todos los productos en carrito de este pedido y usuario
    $sql = "SELECT * FROM carritos 
    WHERE usuario = '$idUsuario' AND pedUsuario = '$idPedido' ";
    $resCarritoItem = $con->query($sql);
    
    $contar_items = mysqli_num_rows($resCarritoItem);
  }

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

    <script src="javascript/jquery-3.3.1.min.js"></script>

    <title>Turbo Compas - Login</title>
  </head>

  <body>
    <header>
      <?php include("navBar.php") ?>
    </header>

    
    <!-- Carro --> 
    <section class="h-100 gradient-custom">
      <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Carro - <?php echo $contar_items; ?> items</h5>
              </div>
              <div class="card-body">
                <?php 
                  $contador=0;
                  $total=0;
                  while ($item = $resCarritoItem->fetch_array()){
                    
                    $contador = $contador + 1;
                    $id = $item["id"];
                    $idProducto = $item['producto'];
                    $cantidad = $item['cantidad'];
                    $costo=$item['precio'];

                    //Obtener datos del producto
                    $sql = "SELECT * FROM productos 
                    WHERE status = 1 AND eliminado = 0 AND id = '$idProducto' ";
                    $resProducto = $con->query($sql);
                    $result = mysqli_fetch_array($resProducto);
                    
                    if ($result > 0){
                      
                      $nombreProducto=$result['nombre'];
                      $stock = $result['stock'];
                      $descripcion = $result['descripcion'];
                      $archivo = "./../administrador/productos/archivos/".$result['archivo'];
                      
                      $t_costo = $cantidad*$costo;

                      $total = $total+$t_costo;
                    }
                ?>
                  <!-- Single item -->
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Image -->
                      <div class="img-phone">
                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                          <img src="<?php echo $archivo; ?>"
                            class="w-100" alt="Blue Jeans Jacket" 
                            height="150px"
                            />
                          <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                          </a>
                        </div>
                      </div>
                      <!-- Image -->
                    </div>
      
                    <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                      <!-- Data -->
                      <p><strong><?php echo $nombreProducto; ?></strong></p>
                      <p>Precio: $<?php echo $costo;?></p>
                      <!-- Data -->
                    </div>
      
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <div class="d-flex mb-4" style="max-width: 200px">
                        <div class="form-outline">
                          <input disabled id="cantidad-<?php echo $id; ?>" min="0" name="quantity" value="<?php echo $cantidad ?>" type="number" class="form-control" />
                          <label class="form-label" for="cantidad-<?php echo $id; ?>">Cantidad</label>
                        </div>
                      </div>
                      <!-- Quantity -->
                      
                      <!-- Price -->
                      <p class="text-start text-md-center">
                        <strong>$<?php echo $t_costo; ?></strong>
                      </p>
                      <!-- Price -->

                    </div>
                  </div>
                  <!-- Single item -->
                  <hr class="my-4" />
                <?php } ?>
              </div>

            </div>

            <div class="card mb-4 mb-lg-0">
              <div class="card-body">
                <p><strong>We accept</strong></p>
                <img class="me-2" width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                  alt="Visa" />
                <img class="me-2" width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                  alt="American Express" />
                <img class="me-2" width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                  alt="Mastercard" />
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Resumen</h5>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                    Productos
                    <span>$<?php echo $total; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    Costo de Envio
                    <span>Gratis</span>
                  </li>
                  <li
                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                    <div>
                      <strong>Cantidad total</strong>
                      <strong>
                        <p class="mb-0">(Con Impuestos)</p>
                      </strong>
                    </div>
                    <span><strong>$<?php echo $total ?> </strong></span>
                  </li>
                </ul>

                <form id="forma1" name="forma1" method="POST", action="funciones/finalizarPedido.php">
    
                <button type="button" class="btn btn-primary btn-lg btn-block">
                  <a class="nav-link text-light" href="carro.php">Volver</a>  
                </button>
                 
                
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Finalizar
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- FOOTER  -->
<?php include("footer.php") ?>
  </body>



</html>
