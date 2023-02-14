function validacion(){
    var nombre=$('#nombre').val();
    var correo=$('#email').val();
    var contra=$('#pass').val();

    valido=true;
    if (nombre.length==0)
        valido=false;     
          
    if (correo.length<=7 || !correo.includes('@'))
        valido=false;

    if (contra.length==0)
        valido=false;

    if (valido == false){
        $("#msgNoCompletos").css("display","block");
        setTimeout("$('#msgNoCompletos').css(\"display\",\"none\");",5000);
    }else{
        //Validar correo
        $.ajax({
                url     :'./funciones/validar_correo.php',
                type    :'post',
                dataType:'text',
                data    :'correo='+correo,
                success :function(res){
                    alert(res);
                    if (res==0){
                        $("#msgCorreo").css("display","none");
                        $("#forma1").submit();

                        return true;
                    }else{
                        $("#msgCorreo").css("display","block");
                        setTimeout("$('#msgCorreo').css(\"display\",\"none\");",5000);
                        
                        return false;
                    }
                },error: function(){
                    return false;
                }
            });
    }
}