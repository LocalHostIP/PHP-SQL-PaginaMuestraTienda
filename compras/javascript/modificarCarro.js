
function eliminar(id){
    //Agregar a carro
    $.ajax({
        url     :'./funciones/eliminarItemCarro.php',
        type    :'post',
        dataType:'text',
        data    :'id='+id,
        success :function(res){
            window.location.replace("carro.php");
        },error: function(){
            window.location.replace("carro.php");
        }
    });
}

function cambiarCantidad(id,stock){
    cantidad = $("#cantidad-"+id).val();
    
    stock = parseInt(stock);
    cantidad = parseInt(cantidad);

    if (cantidad>stock){
        cantidad=stock;
        $("#cantidad-"+id).val(cantidad)
    }
    if (cantidad<1){
        cantidad=1;
        $("#cantidad-"+id).val(cantidad)
    }

    //Modificar cantidad
    $.ajax({
        url     :'./funciones/cambiarCantidadCarro.php',
        type    :'post',
        dataType:'text',
        data    :'id='+id+"&cantidad="+cantidad,
        success :function(res){
            window.location.replace("carro.php");
        },error: function(){
            window.location.replace("carro.php");
        }
    });

}