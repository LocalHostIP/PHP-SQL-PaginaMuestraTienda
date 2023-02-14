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
        <script src="javascript/pd_darAlta.js"></script>
        <link rel="stylesheet" href="./../css/base.css">
        <link rel="stylesheet" href="./../css/agregarAdministrador.css">
        <link rel="stylesheet" href="./../css/navBar.css">
    </head>
    <body>

        <header>
            <?php include("./../navBar.php") ?>
        </header>
        <script>
            $("#navBarProductos").addClass('active');
        </script>

        <h2>Alta de Producto</h2>

        <div class="divForm">
            <form id="forma1" enctype="multipart/form-data" name="forma1" method="POST", action="funciones/pd_salva.php">
                <label for="nombre">Nombre</label>
                <input type="text" class="inputText" name="nombre" id="nombre" placeholder="Nombre"><br>
                
                <label for="codigo">Codigo</label>
                <br>
                <input type="text" onBlur="validarCorreo()" class="inputText" name="codigo" id="codigo" placeholder="Codigo"><br>
                <div id="msgCorreo" class="alertCorreo">
                    <strong>El codigo ya existe!</strong> 
                </div>
                <label for="descripcion">Descripci&oacuten</label> <br>
                <!-- <input type="textarea" class="inputText" name="correo" id="Area" placeholder="Descripcion"><br> -->
                
                <textarea id="descripcion" name="descripcion" rows="4" cols="500" form='forma1'>
                    
                </textarea>

                <label for="costo">Costo</label>
                <input type="number" class="inputText" name="costo" id="costo" placeholder="$"><br>

                <label for="stock">Stock</label>
                <input type="number" class="inputText" name="stock" id="stock" placeholder="$" value="0"><br>

                <label for="archivo">Imagen del producto</label><br>
                <input type="file" class="custom-input-file" id="archivo" name="archivo"><br><br>
                <br><br>

                <input class="btn" onClick="validacion(); return false;" type="submit" value="Enviar"/>
                <br>
                <br>
                <a class="btn linkRegresar" href='productos_lista.php'> Regrear al listado </a>
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

