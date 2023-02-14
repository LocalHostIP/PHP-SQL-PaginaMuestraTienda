<?php
//administradores_elimina.php
require "conecta.php";
$con = conecta();

//Recibe variables
$id = $_REQUEST['id'];

if ($id > 0){
    //$sql = "DELETE FROM administradores WHERE id = $id";
    $sql = "UPDATE administradores
            SET eliminado=1
            WHERE id = $id";
    $res = $con->query($sql);
}
    echo $res;
    //header("Location: administradores_lista.php")
?>