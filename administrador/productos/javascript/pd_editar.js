function validarCorreo(correoActual){
    codigo=$("#codigo").val();
    $.ajax({
            url     :'./funciones/validar_codigo.php',
            type    :'post',
            dataType:'text',
            data    :'codigo='+codigo,
            success :function(res){
                if (res>0 && correoActual!=codigo){
                    divMC=$("#msgCorreo")
                    divMC.css("opacity","1");
                    divMC.css('display',"block");

                    setTimeout("$('#msgCorreo').css(\"opacity\",\"0\");",5000);
                    setTimeout("$('#msgCorreo').css(\"display\",\"none\");",5000);
                    return false;
                }else{
                    divMC=$("#msgCorreo")
                    divMC.css('display',"none");
                    divMC.css("opacity","0");
                    return true;
                }
            },error: function(){
                return false;
            }
        });
}

function validacion(correoActual){
    var nombre=$('#nombre').val();
    var codigo=$('#codigo').val();
    var descripcion=$('#descripcion').val()
    var costo=$('#costo').val();
    var stock=$('#stock').val();
    var filePhoto = $('#archivo').prop('files')[0];

    valido=true;
    if (nombre.length==0)
        valido=false;     
        
    if (codigo.length==0)
        valido=false;
        
    if (descripcion.length==0)
        valido=false;

    if (costo.length==0)
        valido=false;
                        
    if (stock.length=0 ){
        valido=false;
    }

    if (valido == false){
        $("#alertMessage").css("opacity","1");
        $("#alertMessage").css("background-color","#f44336");
        $("#alertMessage").html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> <strong>Error!</strong> Faltan campos por llenar");
        setTimeout("$('#alertMessage').css(\"opacity\",\"0\");",5000);
    }else{
        //Validar correo
        $.ajax({
                url     :'./funciones/validar_codigo.php',
                type    :'post',
                dataType:'text',
                data    :'codigo='+codigo,
                success :function(res){
                    if (res>0 && correoActual!=codigo){
                        divMC=$("#msgCorreo")
                        divMC.css("opacity","1");
                        divMC.css('display',"block");

                        setTimeout("$('#msgCorreo').css(\"opacity\",\"0\");",5000);
                        setTimeout("$('#msgCorreo').css(\"display\",\"none\");",5000);

                        return false;
                    }else{
                        divMC=$("#msgCorreo")
                        divMC.css('display',"none");
                        divMC.css("opacity","0");

                        $("#forma1").submit();

                        return true;
                    }
                },error: function(){
                    return false;
                }
            });
    }
}

function btnAlert(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var divM = $("#alertMessage");
    console.log(divM)

    // Set the opacity of div to 0 (transparent)
    divM.css("opacity","0");
}

