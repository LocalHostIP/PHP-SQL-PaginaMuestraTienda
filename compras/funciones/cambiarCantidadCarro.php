<?php
    $id = $_REQUEST["id"];
    $cantidad = $_REQUEST["cantidad"];

    require "conecta.php";
    $con = conecta();

    $sql = "UPDATE carritos SET cantidad = '$cantidad' WHERE id = $id ";
    $res = $con->query($sql);

    echo "1";
?>

