<?php
//Administradores_salva.php
require "conecta.php";
$con = conecta();

//Recibe bariables
$nombre = $_REQUEST["nombre"];
$apellidos = $_REQUEST["Apellidos"];
$correo = $_REQUEST["correo"];
$pass   =$_REQUEST["password"];
$rol = $_REQUEST["rol"];
$passEnc = md5($pass);
#Archivo
$archivo_n = $_FILES['archivo']['name'];
$file_tmp= $_FILES['archivo']['tmp_name'];
$cadena = explode(".",$archivo_n);
$ext = $cadena[1];
$dir = "./../archivos/";
$file_enc = md5_file($file_tmp);

// echo "file_name: $archivo_n <br>";
// echo "file_tmp: $file_tmp <br>";
// echo "ext: $ext <br>";
// echo "file_enc: $file_enc <br>";

$valido=true;
if ($archivo_n != ''){
    $archivo = "$file_enc.$ext";
    copy($file_tmp,$dir.$archivo);
    $valido = false;
}

//Si ya se ha eliminado un usuario con este correo elimianr completamente este, si no no permitir agregar
$valido=true;
$query_correo = mysqli_query($con,"SELECT * FROM administradores WHERE correo = '$correo'");
$result_correo = mysqli_fetch_array($query_correo);
if ($result_correo > 0){
     if ($result_correo['eliminado']==1){
        $sql_d = "DELETE FROM administradores WHERE correo = '$correo'";
        echo $sql_d;
        $res = $con -> query($sql_d);
     }
     else{
        $valido=false;
     }
}

//Agregar nuevo usuario a la base de datos
if ($valido){
        $sql = "INSERT INTO administradores
        (nombre, apellido, correo, passEnc, rol, archivo_n, archivo)
        VALUES ('$nombre','$apellidos','$correo','$passEnc',$rol,'$archivo_n','$archivo')";
        $res = $con -> query($sql);
}

header("Location: ./../administradores_lista.php")

?> 