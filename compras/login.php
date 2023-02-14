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
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem">
              <div class="card-body p-5 text-center">
                <h3 class="mb-5">Iniciar Sesion</h3>

                <div class="form-outline mb-4">
                  <input
                    type="email"
                    id="email"
                    class="form-control form-control-lg"
                  />
                  <label class="form-label" for="typeEmailX-2">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input
                    type="password"
                    id="password"
                    class="form-control form-control-lg"
                  />
                  <label class="form-label" for="typePasswordX-2"
                    >Password</label
                  >
                </div>

                <div class="d-flex flex-column gap-3">
                  <button class="btn btn-primary btn-lg" type="submit" onclick="validacion(); return false;">
                    Iniciar Sesion
                  </button>
                  <a href="./signup.php" class="btn btn-lg btn-outline-dark">
                    Registrarse
                  </a>
                  
                </div>
                <hr class="my-4" />
                <div class="alert alert-danger" id="msgNoCompletos" style="display:none" role="alert">
                  No estan todos los campos llenos
                </div>
                <div class="alert alert-danger" id="msgIncorrecto" style="display:none" role="alert">
                  Usuario o contraseña incorrectos
                </div>
                <div class="alert alert-danger" id="msgError" style="display:none" role="alert">
                  Error con el servidor
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </body>

  <script> 
    function validacion(){
        correo=$("#email").val();
        pass=$("#password").val();
        
        if (correo!='' & pass!='')
            $.ajax({
                    url     :'funciones/login_valida.php',
                    type    :'post',
                    dataType:'text',
                    data    :'correo='+correo+'&password='+pass,
                    success :function(res){
                        if (res==1){
                            window.location.replace("index.php");
                            return false;
                        }else if(res==0){
                            $("#msgIncorrecto").css("display","block");
                            setTimeout("$('#msgNoCompletos').css(\"display\",\"none\");",5000);
                            return true;
                        }else{
                            $("#msgError").css("display","block");
                            setTimeout("$('#msgNoCompletos').css(\"display\",\"none\");",5000);                                   
                        }
                    },error: function(){
                        $("#msgError").css("display","block");
                        setTimeout("$('#msgNoCompletos').css(\"display\",\"none\");",5000);     
                        return true;
                    }
                });
        else{
            $("#msgNoCompletos").css("display","block");
            setTimeout("$('#msgNoCompletos').css(\"display\",\"none\");",5000);
            return true;
        }
    }
</script>

</html>
