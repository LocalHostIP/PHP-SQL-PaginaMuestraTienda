<?php
    session_start();
    if(isset($_SESSION["idU"])){
        header('Location: ./index.php');
    }
?>

<html>
    <head>
        <title>Login</title>

        <script src="javascript/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/agregarAdministrador.css">
    </head>
    <body>
        <h2>Login</h2>
        <div class="divForm">
            <form id="forma1" name="forma1" method="POST">
               
                <label for="correo">Correo electr&oacutenico</label>
                <input type="email" class="inputText" name="correo" id="correo" placeholder="Correo"><br>

                <label for="password">Contrase&ntildea</label>
                <input type="password" class="inputText" name="password" id="password" placeholder="password de acceso"><br>
               
                <input class="btn" onClick="validacion(); return false;" type="submit" value="Enviar"/>
                <br>
                <div id="alertMessage" class="alert alertIncorrecto">
                    <span class="closebtn" onclick="btnAlert()">&times;</span>
                    Usuario o password incorrecta
                </div>
            </form>
            
        </div>
    </body>

    
    <script> 
            function validacion(){
                correo=$("#correo").val();
                pass=$("#password").val();
                
                if (correo!='' & pass!='')
                    $.ajax({
                            url     :'funciones/login_valida.php',
                            type    :'post',
                            dataType:'text',
                            data    :'correo='+correo+'&password='+pass,
                            success :function(res){

                                if (res==1){
                                    window.location.replace("index.php");
                                    return false;
                                }else if(res==0){
                                    divMC=$("#alertMessage")
                                    divMC.css("opacity","1");
                                    divMC.html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> Usuario o password incorrectos")    
                                    setTimeout("$('#alertMessage').css(\"opacity\",\"0\");",5000);
                                    return true;
                                }else{
                                    divMC=$("#alertMessage")
                                    divMC.html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> Error con el servidor")         
                                    divMC.css("opacity","1");
                                    setTimeout("$('#alertMessage').css(\"opacity\",\"0\");",5000);                                    
                                }
                            },error: function(){
                                divMC=$("#alertMessage")
                                divMC.html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> Error con el servidor")         
                                divMC.css("opacity","1");
                                setTimeout("$('#alertMessage').css(\"opacity\",\"0\");",5000);
                                return true;
                            }
                        });
                else{
                    divMC=$("#alertMessage")
                    divMC.html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> Llene todos los campos")         
                    divMC.css("opacity","1");
                    setTimeout("$('#alertMessage').css(\"opacity\",\"0\");",5000);
                    return true;
                }
            }
            function btnAlert(){

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var divM = $("#alertMessage");
                console.log(divM)

                // Set the opacity of div to 0 (transparent)
                divM.css("opacity","0");
            }

        </script>

</html>

