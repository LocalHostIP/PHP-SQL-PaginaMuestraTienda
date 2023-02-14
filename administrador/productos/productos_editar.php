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
        $sql = "SELECT * FROM productos WHERE id = $id";
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
        <script src="javascript/pd_editar.js"></script>
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

        <h2>Editar de Productos</h2>

        <div class="divForm">
            <form id="forma1" enctype="multipart/form-data" name="forma1" method="POST", action="funciones/pd_editar.php">
                <label for="nombre">Nombre</label>
                <?php
                    echo "<input type= \"hidden\" id=\"id\" name=\"id\" value=\"$id\">";
                    echo $id;
                ?>
                
                <?php
                    echo "<input type=\"text\" class=\"inputText\" name=\"nombre\" id=\"nombre\" placeholder=\"Nombre\" value= \"$nombre\" ><br>";
                ?>

                <label for="codigo">C&oacutedigo</label>
                
                <?php
                    echo "<input type=\"text\" onBlur=\"validarCorreo('".$row['codigo']."')\" class=\"inputText\" name=\"codigo\" id=\"codigo\" placeholder=\"Codigo\" value=".$row['codigo']."><br>";
                ?>
                <div id="msgCorreo" class="alertCorreo">
                    <strong>El codigo ya existe!</strong> 
                </div>

                <label for="descripcion">Descripci&oacuten</label>
                <?php
                    echo "<textarea id=\"descripcion\" name=\"descripcion\" rows=\"4\" cols=\"500\" form=\"forma1\"> ".$row['descripcion']." </textarea>";
                ?>
                <br>

                <label for="costo">Costo</label>
                <?php
                    echo "<input type= \"text\"  class=\"inputText\" id=\"costo\" name=\"costo\" value=".$row['costo'].">";
                ?>

                <label for="stock">Stock</label>
                <?php
                    echo "<input type= \"text\" class=\"inputText\" id=\"stock\" name=\"stock\" value=".$row['stock'].">";
                ?>

                <label for="archivo">Imagen del producto (No necesario)</label><br>
                <input type="file" class="custom-input-file" id="archivo" name="archivo"><br><br>
                <br><br>
                <input class="btn" onClick="validacion('<?php echo $row["codigo"]; ?>'); return false;" type="submit" value="Editar"/>
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

