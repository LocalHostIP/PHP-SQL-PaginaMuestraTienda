<?php
    //administradores_salva.php
    require "conecta.php";
    $con = conecta();
    $correo = $_REQUEST["correo"];
    
    $query = mysqli_query($con,"SELECT * FROM usuarios WHERE correo = '$correo'");
    $result = mysqli_fetch_array($query);
    if ($result > 0){
        echo 1;
    }else{
        echo 0;
    }
?> 