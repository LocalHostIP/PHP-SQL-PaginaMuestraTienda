<?php
//Administradores_salva.php
require "conecta.php";
$con = conecta();
$id = $_REQUEST["id"];



#Actualizar los campos obligatorios
$sql="UPDATE pedidos
SET status = '1' 
   WHERE id = '$id'";
$res = $con -> query($sql);

echo $sql;


header("Location: ./../pedidos_lista.php")

?> 