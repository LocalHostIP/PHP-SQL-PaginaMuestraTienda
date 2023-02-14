
function detalles(id){
    window.location.replace("pedidos_detalles.php?id="+id);
}

function editar(id){
    
}

function btnAlert(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var divM = $("#alertMessage");
    console.log(divM)

    // Set the opacity of div to 0 (transparent)
    divM.css("opacity","0");
}

