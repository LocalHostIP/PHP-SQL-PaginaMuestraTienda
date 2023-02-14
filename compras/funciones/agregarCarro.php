<?php
    $id = $_REQUEST["id"];
    $cantidad = $_REQUEST["cantidad"];

    session_start();
    if(!isset($_SESSION["idUsuario"])){    
        echo "-1";
    }else{
        $idUsuario = $_SESSION["idUsuario"];

        require "conecta.php";
        $con = conecta();
        
        $valido=true;
        $actualizado=false;

        if ($cantidad<0){
            $valido=false;
        }

        //Consulta Productos (costo)
        $sql = "SELECT * FROM productos 
        WHERE status = 1 AND eliminado = 0 AND id = '$id' ";
        $resProducto = $con->query($sql);
        $result = mysqli_fetch_array($resProducto);
        
        if ($result > 0){
            $costo=$result['costo'];
            $stock=$result['stock'];
        }else{
            $valido=false;
        }

        //Constula user pedido id
        $sql = "SELECT * FROM usuarios 
        WHERE status = 1 AND id = '$idUsuario' ";
        $resUsuarios = $con->query($sql);
        $result = mysqli_fetch_array($resUsuarios);
        if ($result > 0){
            $idPedido=$result['pedido'];   
        }else{
            $valido=false;
        }

        //Revisar si solo se actualiza la cantidad de un producto
        $sql = "SELECT * FROM carritos 
        WHERE usuario = '$idUsuario' AND pedUsuario = '$idPedido' AND producto = '$id' ";
        $resCarrito = $con->query($sql);
        $result = mysqli_fetch_array($resCarrito);
        
        if ($result > 0 & $valido){
            $cantidad_vieja = $result['cantidad'];
            $id_carrito = $result['id'];

            //Comprobar Stock
            if ($cantidad>$stock){
                $cantidad=$stock;
            }
            if ($cantidad<1){
                $cantidad=1;
            }

            //Actualizar
            $cantidad_nueva = ((int) $cantidad_vieja)+ ((int) $cantidad);

            if ($cantidad_nueva>$stock){
                $cantidad_nueva=$stock;
            }

            $sql = "UPDATE carritos
            SET cantidad='$cantidad_nueva'
            WHERE id = $id_carrito";
            $res = $con->query($sql);

            echo "1";
            $actualizado=true;
        }

        //Crear Consulta registro carrito 
        if ($valido==true & !$actualizado){
            $sql = "INSERT INTO carritos
            (usuario, pedUsuario, producto, cantidad, precio)
            VALUES ('$idUsuario','$idPedido','$id','$cantidad', '$costo')";
            $res = $con -> query($sql);
            echo "1";
        }else{
            if (!$actualizado){
                echo "0";
            }
        }
    }
?>