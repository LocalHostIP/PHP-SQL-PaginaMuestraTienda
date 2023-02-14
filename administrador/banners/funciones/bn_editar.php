<?php
//Administradores_salva.php
require "conecta.php";
$con = conecta();

//Recibe variables
$nombre = $_REQUEST["nombre"];
$id = $_REQUEST["id"];

#Archivo
$archivo_n = $_FILES['archivo']['name'];

#Actualizar los campos obligatorios
$sql="UPDATE banners
SET nombre = '$nombre' 
   WHERE id = '$id'";
$res = $con -> query($sql);

if ($archivo_n){
   $file_tmp= $_FILES['archivo']['tmp_name'];
   $cadena = explode(".",$archivo_n);
   $ext = $cadena[1];
   $dir = "./../archivos/";
   $file_enc = md5_file($file_tmp);
   $archivo = "$file_enc.$ext";
   copy($file_tmp,$dir.$archivo);
   
   $sql="UPDATE banners
   SET archivo = '$archivo',
      WHERE id = '$id'";
   $res = $con -> query($sql);   
}

header("Location: ./../banners_lista.php")

?> 