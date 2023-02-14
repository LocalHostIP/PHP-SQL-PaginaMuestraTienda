<?php
    session_start();

    require "conecta.php";
    $con = conecta();

    $correo = $_REQUEST["correo"];
    $pass   =$_REQUEST["password"];
    $passEnc = md5($pass);

    $sql = "SELECT * FROM usuarios WHERE status = 1 AND correo='$correo' AND passEnc='$passEnc' ";

    $res = $con->query($sql);
    $filas = $res->num_rows;
    $row = $res->fetch_array();

    if ($filas){
        $idUsuario    = $row["id"];
        $nombre = $row["nombre"];
        $correo = $row["correo"];
        $_SESSION["idUsuario"] = $idUsuario;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["correo"] = $correo;        
    }   

    echo $filas;
?>
