<?php
//Administradores_salva.php
require "conecta.php";
$con = conecta();

//Recibe bariables
$nombre = $_REQUEST["nombre"];
$correo = $_REQUEST["email"];
$pass   =$_REQUEST["pass"];
$passEnc = md5($pass);

$valido=true;

//Si ya se ha eliminado un usuario con este correo elimianr completamente este, si no no permitir agregar
$valido=true;
$query_correo = mysqli_query($con,"SELECT * FROM usuarios WHERE correo = '$correo'");
$result_correo = mysqli_fetch_array($query_correo);
if ($result_correo > 0){
     if ($result_correo['eliminado']==1){
        $sql_d = "DELETE FROM usuarios WHERE correo = '$correo'";
        echo $sql_d;
        $res = $con -> query($sql_d);
     }
     else{
        $valido=false;
     }
}

//Agregar nuevo usuario a la base de datos
if ($valido){
        $sql = "INSERT INTO usuarios
        (nombre, correo, passEnc)
        VALUES ('$nombre','$correo','$passEnc')";
        $res = $con -> query($sql);
}

header("Location: ./../login.php");

?> 