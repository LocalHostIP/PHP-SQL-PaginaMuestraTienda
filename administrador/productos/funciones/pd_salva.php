<?php
//Administradores_salva.php
require "conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_REQUEST["nombre"];
$codigo = $_REQUEST["codigo"];
$descripcion = $_REQUEST["descripcion"];
$costo   =$_REQUEST["costo"];
$stock = $_REQUEST["stock"];

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

//Si ya se ha eliminado un usuario con este codigo eliminar completamente este, si no no permitir agregar
$valido=true;
$query_correo = mysqli_query($con,"SELECT * FROM productos WHERE codigo = '$correo'");
$result_correo = mysqli_fetch_array($query_correo);
if ($result_correo > 0){
     if ($result_correo['eliminado']==1){
        $sql_d = "DELETE FROM productos WHERE codigo = '$correo'";
        echo $sql_d;
        $res = $con -> query($sql_d);
     }
     else{
        $valido=false;
     }
}

//Agregar nuevo usuario a la base de datos
if ($valido){
        $sql = "INSERT INTO productos
        (nombre, codigo, descripcion, costo, stock, archivo_n, archivo)
        VALUES ('$nombre','$codigo','$descripcion','$costo',$stock,'$archivo_n','$archivo')";
        $res = $con -> query($sql);
}

header("Location: ./../productos_lista.php")

?> 