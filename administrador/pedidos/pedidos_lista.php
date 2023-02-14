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
        <script src="./javascript/pd_lista.js"></script>
        <link rel="stylesheet" href="./../css/base.css">
        <link rel="stylesheet" href="./../css/listaAdministrador.css">
        <link rel="stylesheet" href="./../css/navBar.css">
    </head>

    <body>
        <header>
            <?php include("./../navBar.php") ?>
        </header>
        <script>
            $("#navBarPedidios").addClass('active');
        </script>

        <h2>Listado de Pedidos</h2>

        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th class="cl-small">ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estatus</th>
                    <th class="cl-small2">Detalles</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    require "funciones/conecta.php";
                    $con = conecta();
                    $sql = "SELECT * FROM pedidos ";

                    $res = $con->query($sql);
                    
                    while ($row = $res->fetch_array()){
                        $id = $row["id"];
                        $fecha = $row["fecha"];
                        $total = $row["total"];
                        $status = $row["status"];
                        $t_status = "No enviado";
                        if ($status == 1){
                            $t_status = "Enviado";
                        }

                        echo "
                        <tr id=\"$id\">
                            <td class=\"cl-small cl-id\">$id</td>
                            <td>$fecha</td>
                            <td>$$total</td>
                            <td>$t_status</td>

                            <td class=\"cl-small2\" >
                                <svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 24 24\" stroke-width=\"1.5\" stroke=\"currentColor\" class=\"w-6 h-6 lupa btn btn-lupa \" onclick=\"detalles($id)\">
                                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z\" />
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

