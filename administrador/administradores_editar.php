<?php
    //administradores_elimina.php
    session_start();
    if(!isset($_SESSION["idU"])){
        header('Location: ./login.php');
    }
    
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    if ($id > 0){
        //$sql = "DELETE FROM administradores WHERE id = $id";
        $sql = "SELECT * FROM administradores WHERE id = $id";
        $res = $con->query($sql);
    }

    $row = $res->fetch_array();


    $res_rol = $con->query("SELECT * FROM roles");
    #Get roles
    $roles=array('');
    while ($rRol = $res_rol->fetch_array()){
        array_push($roles,$rRol['rol']);
    }
    $rol = $roles[$row['rol']];
    if ($row['status']==1){
        $status="Activo";
    }else{
        $status="Inactivo";
    }
    #Imagen
    $dir="archivos/";
    $imagen = $dir.$row['archivo'];
    $nombre = $row['nombre'];
?>

<html>
    <head>
        <title>Administradores</title>
        <script src="javascript/jquery-3.3.1.min.js"></script>
        <script src="javascript/adm_editar.js"></script>
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/agregarAdministrador.css">
        <link rel="stylesheet" href="./css/navBar.css">
    </head>
    <body>
        <header>
            <?php include("navBar.php") ?>
        </header>
        <script>
            $("#navBarAdministradores").addClass('active');
        </script>


        <h2>Editar de Administrador</h2>

        <div class="divForm">
            <form id="forma1" enctype="multipart/form-data" name="forma1" method="POST", action="funciones/adm_editar.php">
                <label for="nombre">Nombre</label>
                
                <?php
                    echo "<input type= \"hidden\" id=\"id\" name=\"id\" value=\"$id\">";
                ?>
                
                <?php
                    echo "<input type=\"text\" class=\"inputText\" name=\"nombre\" id=\"nombre\" placeholder=\"Nombre\" value= \"$nombre\" ><br>";
                ?>

                <label for="Apellidos">Apellidos</label>
                
                <?php
                    echo "<input type=\"text\" class=\"inputText\" name=\"Apellidos\" id=\"Apellidos\" placeholder=\"Apellidos\" value=".$row['apellido']."><br>";
                ?>
                <label for="correo">Correo electr&oacutenico</label>
                
                <?php
                    echo "<input type=\"email\" onBlur=\"validarCorreo('".$row['correo']."')\" class=\"inputText\" name=\"correo\" id=\"correo\" placeholder=\"Correo\" value=".$row['correo']."><br>";
                ?>

                <div id="msgCorreo" class="alertCorreo">
                    <strong>El correo ya existe!</strong> 
                </div>

                <label for="password">Contrase&ntildea (No necesario)</label>
                <?php
                    echo "<input type=\"password\" class=\"inputText\" name=\"password\" id=\"password\" placeholder=\"password de acceso\"><br>";
                ?>
                
                <label for="rol">Rol</label>
                <?php
                    $con = conecta();
                    $query_rol = mysqli_query($con,"SELECT * FROM roles");
                    mysqli_close($con);
                    $result_rol = mysqli_num_rows($query_rol);
                ?>

                <select name="rol" id="rol">

                <option value="0">Seleccionar</option>
                
                    <?php 
						if($result_rol > 0)
						{
                        while ($rol = mysqli_fetch_array($query_rol)) {
                            
                    ?>

                    <option value="<?php echo $rol["idrol"]; ?>" <?php if ($row['rol']==$rol["idrol"]){echo "selected=\"selected\"";} ?>> <?php echo $rol["rol"] ?></option>
                    
                    <?php 
                        }
                    }
                    ?>
                
                </select><br><br>
                <label for="archivo">Imagen de perfil (No necesario)</label><br>
                <input type="file" class="custom-input-file" id="archivo" name="archivo"><br><br>
                <br><br>
                <input class="btn" onClick="validacion('<?php echo $row["correo"]; ?>'); return false;" type="submit" value="Editar"/>
                <br>
                <br>
                <a class="btn linkRegresar" href='administradores_lista.php'> Regrear al listado </a>
                <br>
                <br>
                <div id="alertMessage" class="alert">
                    <span class="closebtn" onclick="btnAlert()">&times;</span>
                    <strong>Atencion!</strong> El usuario ha sido eliminado.
                </div>
            </form>
            
        </div>
        
        

    </body>
</html>

