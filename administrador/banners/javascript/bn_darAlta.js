function validacion(){
    var nombre=$('#nombre').val();
    var filePhoto = $('#archivo').prop('files')[0];

    valido=true;
    if (nombre.length==0)
        valido=false;     
    if (filePhoto==undefined ){
        valido=false;
    }

    if (valido == false){
        $("#alertMessage").css("opacity","1");
        $("#alertMessage").css("background-color","#f44336");
        $("#alertMessage").html("<span class=\"closebtn\" onclick=\"btnAlert()\">&times;</span> <strong>Error!</strong> Faltan campos por llenar");
        setTimeout("$('#alertMessage').css(\"opacity\",\"0\");",5000);
    }else{
        $("#forma1").submit();
    }
}

function btnAlert(){
    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var divM = $("#alertMessage");
    console.log(divM)

    // Set the opacity of div to 0 (transparent)
    divM.css("opacity","0");
}

