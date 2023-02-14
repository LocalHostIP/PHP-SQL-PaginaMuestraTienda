function agregarCarrro(id){
    cantidad=$("#cantidad-"+id).val();
    
    //Agregar a carro
    $.ajax({
        url     :'./funciones/agregarCarro.php',
        type    :'post',
        dataType:'text',
        data    :'id='+id+'&cantidad='+cantidad,
        success :function(res){
            if (res=="-1"){
                window.location.replace("login.php");
                return false;
            }
            if (res="1"){
                //msg-success
                $("#msg-success-"+id).css("display","block");
                setTimeout("$('#msg-success-"+id+"').css(\"display\",\"none\");",2000);
            }else{
                $("#msg-danger-"+id).css("display","block");
                setTimeout("$('#msg-danger-"+id+"').css(\"display\",\"none\");",4000);
            }
        },error: function(){
            return false;
        }
    });

}