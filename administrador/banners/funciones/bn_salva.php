<?php
//Administradores_salva.php
require "conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_REQUEST["nombre"];

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
}

//Agregar nuevo banner a la base de datos
if ($valido){
   $sql = "INSERT INTO banners
   (nombre, archivo)
   VALUES ('$nombre','$archivo')";
   $res = $con -> query($sql);
   echo $res;
}
header("Location: ./../banners_lista.php")

?> 