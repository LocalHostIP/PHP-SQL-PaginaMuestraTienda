<?php
    //administradores_salva.php
    require "conecta.php";
    $con = conecta();
    $codigo = $_REQUEST["codigo"];
    $query = mysqli_query($con,"SELECT * FROM productos WHERE codigo = '$codigo' and eliminado = '0' ");
    $result = mysqli_fetch_array($query);
    if ($result > 0){
        echo 1;
    }else{
        echo 0;
    }
?> 