<?php
    $id = $_REQUEST["id"];

    require "conecta.php";
    $con = conecta();

    $sql = "DELETE FROM carritos WHERE id = $id";
    $res = $con->query($sql);

    echo "1";
?>

