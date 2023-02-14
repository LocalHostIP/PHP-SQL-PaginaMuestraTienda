<?php
    session_start();
    if(!isset($_SESSION["idU"])){
        header('Location: ./../login.php');
    }
    require "funciones/conecta.php";
?>

<html>
    <head>
        <title>Productos</title>
        <script src="./../javascript/jquery-3.3.1.min.js"></script>
        <script src="javascript/bn_darAlta.js"></script>
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

        <h2>Alta de Banner</h2>

        <div class="divForm">
            <form id="forma1" enctype="multipart/form-data" name="forma1" method="POST", action="funciones/bn_salva.php">
                <label for="nombre">Nombre</label>
                <input type="text" class="inputText" name="nombre" id="nombre" placeholder="Nombre"><br>

                <label for="archivo">Imagen</label><br>
                <input type="file" class="custom-input-file" id="archivo" name="archivo"><br><br>
                <br><br>

                <input class="btn" onClick="validacion(); return false;" type="submit" value="Enviar"/>
                <br>
                <br>
                <a class="btn linkRegresar" href='banners_lista.php'>Regrear al listado </a>
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

