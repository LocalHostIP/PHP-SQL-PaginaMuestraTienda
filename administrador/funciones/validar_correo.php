<?php
    //administradores_salva.php
    require "conecta.php";
    $con = conecta();
    $correo = $_REQUEST["correo"];
    $query = mysqli_query($con,"SELECT * FROM administradores WHERE correo = '$correo' and eliminado = '0' ");
    $result = mysqli_fetch_array($query);
    if ($result > 0){
        echo 1;
    }else{
        echo 0;
    }
?> 