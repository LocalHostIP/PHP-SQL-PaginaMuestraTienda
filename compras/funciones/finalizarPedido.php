<?php
require "conecta.php";
$con = conecta();

if(!isset($_SESSION)) 
{ 
session_start(); 
} 

if(!isset($_SESSION["idUsuario"])){    
echo "-1";
header('Location: ./../login.php');
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

    //Obtener total
    $sql = "SELECT * FROM carritos 
    WHERE usuario = '$idUsuario' AND pedUsuario = '$idPedido' ";
    $resCarritoItem = $con->query($sql);

    $total=0;
    while ($item = $resCarritoItem->fetch_array()){    
        $cantidad = $item['cantidad'];
        $costo=$item['precio'];
        
        $t_costo = $cantidad*$costo;
        $total = $total+$t_costo;
    }
    //Registrar Pedido
    $sql = "INSERT INTO pedidos
    (usuario, pedUsuario, total)
    VALUES ('$idUsuario','$idPedido','$total')";
    $res = $con -> query($sql);
    echo "1";
    $nuevoPedido = $idPedido+1;
    //Aumnetar pedido usuario
    $sql = "UPDATE usuarios SET pedido = '$nuevoPedido' WHERE id = $idUsuario ";
    $res = $con->query($sql);

    header("Location: ./../index.php");
}
?>
