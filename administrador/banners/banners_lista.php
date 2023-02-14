<?php
    session_start();
    if(!isset($_SESSION["idU"])){
        header('Location: ./../login.php');
    }
?>
<html>
    <head>
        <title>Productos</title>
        <script src="./../javascript/jquery-3.3.1.min.js"></script>
        <script src="./javascript/bn_lista.js"></script>
        <link rel="stylesheet" href="./../css/base.css">
        <link rel="stylesheet" href="./../css/listaAdministrador.css">
        <link rel="stylesheet" href="./../css/navBar.css">
    </head>

    <body>
        <header>
            <?php include("./../navBar.php") ?>
        </header>
        <script>
            $("#navBarBanners").addClass('active');
        </script>

        <h2>Listado de Banners</h2>

        <div id="alertMessage" class="alert">
            <span class="closebtn" onclick="btnAlert()">&times;</span>
            <strong>Atencion!</strong> El banner ha sido eliminado.
        </div>

        <div class="divAgregar">
            <button class="btn" onClick="window.location.replace('banners_darAlta.php')">
                <span>Nuevo Banner</span>
            </button>
        </div>

        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th class="cl-small">ID</th>
                    <th>Nombre</th>
                    <th class="cl-small2">Borrar</th>
                    <th class="cl-small2">Detalles</th>
                    <th class="cl-small2">Editar</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    require "funciones/conecta.php";
                    $con = conecta();
                    $sql = "SELECT * FROM banners 
                            WHERE status = 1 AND eliminado = 0";

                    $res = $con->query($sql);
                    
                    while ($row = $res->fetch_array()){
                        $id = $row["id"];
                        $nombre = $row["nombre"];

                        echo "
                        <tr id=\"$id\">
                            <td class=\"cl-small cl-id\">$id</td>
                            <td>$nombre</td>
                            <td class=\"cl-small2\">
                                <button onclick=\"eliminar('$id','$nombre')\" class=\"btn btn-delete\">
                                    <span>Delete</span>
                                </button>
                            </td>

                            <td class=\"cl-small2\" >
                                <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"w-6 h-6 lupa btn btn-lupa \" onclick=\"detalles($id)\">
                                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z\" />
                                </svg>
                            </td>

                            <td class=\"cl-small2\" >
                                <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"w-6 h-6\ lupa btn btn-lupa\" onclick=\"editar($id)\">
                                <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10\" />
                                </svg>
                            </td>
                        </tr>";
                    }
                ?>
                <tbody>
            </table>
        </div>

    </body>
</html>

