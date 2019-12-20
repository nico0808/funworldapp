
mostrarServ();

function mostrarServ () {
    $.ajax({
        url: 'http://localhost/test/api/serviciosEvento.php?IDEvento=' + IDEvento,
        type: "GET",
        dataType: "json",
        success: mostrarServicios,
        error: error
      });
}

function mostrarServicios (respuesta) {
    console.log(respuesta);
    
}

function error (e) {
    console.log(e);
    
}