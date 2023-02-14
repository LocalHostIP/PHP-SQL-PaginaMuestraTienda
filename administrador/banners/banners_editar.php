<?php
    //administradores_elimina.php
    session_start();
    if(!isset($_SESSION["idU"])){
        header('Location: ./../login.php');
    }
    
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    if ($id > 0){
        //$sql = "DELETE FROM administradores WHERE id = $id";
        $sql = "SELECT * FROM banners WHERE id = $id";
        $res = $con->query($sql);
    }

    $row = $res->fetch_array();


    
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
        <title>Productos</title>
        <script src="./../javascript/jquery-3.3.1.min.js"></script>
        <script src="javascript/bn _editar.js"></script>
        <link rel="stylesheet" href="./../css/base.css">
        <link rel="stylesheet" href="./../css/agregarAdministrador.css">
        <link rel="stylesheet" href="./../css/navBar.css">
    </head>

    <body>
        <header>
            <?php include("./../navBar.php") ?>
        </header>
        <script>
            $("#navBarBanners").addClass('active');
        </script>


        <h2>Editar de Banner</h2>

        <div class="divForm">
            <form id="forma1" enctype="multipart/form-data" name="forma1" method="POST", action="funciones/bn_editar.php">
                <label for="nombre">Nombre</label>
                <?php
                    echo "<input type= \"hidden\" id=\"id\" name=\"id\" value=\"$id\">";
                    echo $id;
                ?>  
                <?php
                    echo "<input type=\"text\" class=\"inputText\" name=\"nombre\" id=\"nombre\" placeholder=\"Nombre\" value= \"$nombre\" ><br>";
                ?> 

                <label for="archivo">Imagen del Banner (No necesario)</label><br>
                <input type="file" class="custom-input-file" id="archivo" name="archivo"><br><br>
                <br><br>
                <input class="btn" onClick="validacion(); return false;" type="submit" value="Editar"/>
                <br>
                <br>
                <a class="btn linkRegresar" href='banners_lista.php'> Regrear al listado </a>
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

