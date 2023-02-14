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
$id = $_REQUEST["id"];

echo $id;

#Archivo
$archivo_n = $_FILES['archivo']['name'];

#Actualizar los campos obligatorios
$sql="UPDATE productos
SET nombre = '$nombre', 
   codigo = '$codigo',
   descripcion = '$descripcion',
   costo = '$costo',
   stock = '$stock'
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
   
   $sql="UPDATE productos
   SET archivo = '$archivo',
      archivo_n = '$archivo_n'
      WHERE id = '$id'";
   $res = $con -> query($sql);   
}

header("Location: ./../productos_lista.php")

?> 