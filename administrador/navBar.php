<?php
    $idNV = $_SESSION["idU"];

?>

<div class="nav">
    <ul>
    <li class="home"><a id="navHome" href="http://localhost:8080/actual/administrador/index.php">Inicio</a></li>
    <li class="home"><a id="navBarAdministradores" href="http://localhost:8080/actual/administrador/administradores_lista.php">Administradores</a></li>
    <li class="listAdm"><a id="navBarProductos" href="http://localhost:8080/actual/administrador/productos/productos_lista.php">Productos</a></li>
    <li class="detallesAdm"><a id="navBarBanners" href="http://localhost:8080/actual/administrador/banners/banners_lista.php">Banners</a></li>
    <li class="editAdm"><a id="navBarPedidios" href="http://localhost:8080/actual/administrador/pedidos/pedidos_lista.php">Pedidos</a></li>
    <li class="logout"><a id="navLogOut" href="http://localhost:8080/actual/administrador/funciones/cerrar_session.php">Cerrar Sesi&oacuten</a></li>
    </ul>
</div>