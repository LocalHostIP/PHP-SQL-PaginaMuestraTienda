
function detalles(id){
    window.location.replace("administradores_detalles.php?id="+id);
}

function editar(id){
    window.location.replace("administradores_editar.php?id="+id);
}

function eliminar(id,nombre){
    c=confirm("Eliminar a "+nombre+"?\n Administrador con id: "+id);
    if(c){
        //window.location.href = 'administradores_elimina.php?id='+id;
        $.ajax({
            url     :'funciones/adm_elimina.php',
            type    :'post',
            dataType:'text',
            data    :'id='+id,
            success :function(res){
                if (res==1){
                    $("#"+id).remove()
                    $("#alertMessage").css("opacity","1");
                    $("#alertMessage").css("background-color","#ff9800");
                    $("#alertMessage").html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> <strong>Atencion!</strong> El administrador "+nombre+" ha sido eliminado.");
                }else{
                    $("#alertMessage").css("opacity","1");
                    $("#alertMessage").css("background-color","#f44336");
                    $("#alertMessage").html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> <strong>Error!</strong> No se ha podido eliminar");                            
                }
            },error: function(){
                $("#alertMessage").css("opacity","1");
                $("#alertMessage").css("background-color","#f44336");
                $("#alertMessage").html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> <strong>Error!</strong> No se ha eliminado debido a que no se encontro el archivo");                            
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

