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
$id = $_REQUEST["id"];
#Archivo
$archivo_n = $_FILES['archivo']['name'];

#Actualizar los campos obligatorios
$sql="UPDATE administradores
SET nombre = '$nombre', 
   apellido = '$apellidos',
   correo = '$correo',
   rol = '$rol'
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
   
   $sql="UPDATE administradores
   SET archivo = '$archivo',
      archivo_n = '$archivo_n'
      WHERE id = '$id'";
   $res = $con -> query($sql);   
}

if ($pass != ''){
   $sql="UPDATE administradores
   SET passEnc = '$passEnc'
      WHERE id = '$id'";   
   $res = $con -> query($sql);  
}

header("Location: ./../administradores_lista.php");

?> 