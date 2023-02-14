<?php
    session_start();
    if(!isset($_SESSION["idU"])){
        header('Location: ./login.php');
    }
    //administradores_elimina.php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    if ($id > 0){
        //$sql = "DELETE FROM administradores WHERE id = $id";
        $sql = "SELECT * FROM administradores WHERE id = $id";
        $res = $con->query($sql);
    }

    $row = $res->fetch_array();


    $res_rol = $con->query("SELECT * FROM roles");
    #Get roles
    $roles=array('');
    while ($rRol = $res_rol->fetch_array()){
        array_push($roles,$rRol['rol']);
    }
    $rol = $roles[$row['rol']];
    if ($row['status']==1){
        $status="Activo";
    }else{
        $status="Inactivo";
    }
    #Imagen
    $dir="archivos/";
    $imagen = $dir.$row['archivo']
?>

<html>
    <head>
        <title>Actividad 10</title>

        <script src="javascript/jquery-3.3.1.min.js"></script>

        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/detallesAdministradores.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/navBar.css">
    </head>
    <body>
        
        <header>
            <?php include("navBar.php") ?>
        </header>
        <script>
            $("#navBarAdministradores").addClass('active');
        </script>

        <h2>Detalles del Administrador</h2>
            <div class="card">
            <?php            
                echo "<img  width=\"300\" style=\"border-radius: 50%;\" src=\"$imagen\"/>
                    <h1>".$row['nombre']." ".$row['apellido']."</h1>
                    <p>".$row['correo']."</p>
                    <p>".$rol."</p>
                    <p class=\"title\">".$status."</p>
                    <a href='administradores_lista.php'><button class=\"btn\">Regresar</button> </a>";
            ?>
        </div>

    </body>
</html>

