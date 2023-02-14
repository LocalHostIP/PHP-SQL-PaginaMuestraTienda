<?php
    session_start();

    require "conecta.php";
    $con = conecta();

    $correo = $_REQUEST["correo"];
    $pass   =$_REQUEST["password"];
    $passEnc = md5($pass);

    $sql = "SELECT * FROM administradores WHERE status = 1 AND eliminado = 0 AND correo='$correo' AND passEnc='$passEnc' ";

    $res = $con->query($sql);
    $filas = $res->num_rows;
    $row = $res->fetch_array();

    if ($filas){
        $idU    = $row["id"];
        $nombre = $row["nombre"].' '.$row["apellido"];
        $correo = $row["correo"];
        $_SESSION["idU"] = $idU;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["correo"] = $correo;        
    }   

    echo $filas
?>
