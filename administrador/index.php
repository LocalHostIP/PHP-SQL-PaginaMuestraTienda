<?php
    session_start();
    if(!isset($_SESSION["idU"])){
        header('Location: ./login.php');
    }else{
        $nombre = $_SESSION["nombre"];
    }
?>

<html>
    <head>
        <title>Administrador</title>
        <script src="javascript/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="./css/navBar.css">
        
    </head>
    <body>
        <header>
            <?php include("navBar.php") ?>
        </header>
        <script>
            $("#navHome").addClass('active');
        </script>
        
        <br>
        <br>
        <br>
        <h1>
            Bienvenido
        </h1>
        <h2 class="h2_nombre">
            <?PHP echo $nombre ?>
        </h2>
    </body>
</html>

