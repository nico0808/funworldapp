
mostrarEventos();

function mostrarEventos () {
    $("#tablaEventos").html("");
    $.ajax({
        url: "http://localhost/test/api/eventoCalendario.php",
        type: "GET",
        dataType: "json",
        success: mostrarMenuEventos,
        error: error
      });
}


function mostrarMenuEventos (respuesta) {
    console.log(respuesta);
    
    var salon;
    for (var i=0; i<respuesta.length; i++) {
        switch (respuesta[i].IDSalon) {
            case '1':
                salon="Fantasy";
                break;
            case '2':
                salon="Magic";
                break;
            default:
                salon="";
                break;
        }
        $("#tablaEventos").append(`<tr>
            <td class="tm-product-name">${respuesta[i].fechaEvento}</td>
            <td>${respuesta[i].horaInicio}</td>
            <td class="tm-product-name">${respuesta[i].horaFin}</td>
            <td>${salon}</td>
            <td class="tm-product-name">${respuesta[i].tipoEvento}</td>
            <td>${respuesta[i].homenajeadoEvento}</td>
            <td><i class="fas fa-trash-alt tm-trash-icon borrarBtn" onclick="borrarFuncionEvento(${respuesta[i].IDEvento})"></i></td>
            <td><a href='edit-event.php?idModificar=${respuesta[i].IDEvento}'><i class="fas fa-edit tm-edit-icon editBtn"></i></a></td>
        </tr>`);
    }
    
}

function error (e) {
    console.log(e);
    
}