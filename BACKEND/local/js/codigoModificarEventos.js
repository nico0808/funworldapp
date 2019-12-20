levantarDatos();

function levantarDatos() {
    /*levanta id a modificar por get*/
    function getSearchParameters() {
        var prmstr = window.location.search.substr(1);
        return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
    }

    function transformToAssocArray(prmstr) {
        var params = {};
        var prmarr = prmstr.split("&");
        for (var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = tmparr[1];
        }
        return params;
    }

    var params = getSearchParameters();

    var IDEvento = params.idModificar;
    token = localStorage.getItem('token');
    console.log(IDEvento);
    

    /*consulta para borrar*/

    $.ajax({
        url: "http://localhost/test/api/eventosBE.php",
        type: "GET",
        dataType: "json",
        data: {
            IDEvento: IDEvento,
        },
        success: mostrarEventoModificar,
        error: mostrarError
    })

}


function mostrarEventoModificar(respuesta) {
    console.log(respuesta);
    $("#salonEvento").val(respuesta[0].IDSalon);
    $('input:radio[name="señaEvento"]').filter('[value="'+respuesta[0].señaEvento+'"]').prop('checked', true);   
    $("#montoSeña").val(respuesta[0].montoSeña);
    $("#contratanteEvento").val(respuesta[0].contratanteEvento);
    $("#direccionContratanteEvento").val(respuesta[0].direccionContratanteEvento);
    $("#telFijoContratanteEvento").val(respuesta[0].telFijoContratanteEvento);
    $("#telMovilContratanteEventoUno").val(respuesta[0].telMovilContratanteEventoUno);
    $("#telMovilContratanteEventoDos").val(respuesta[0].telMovilContratanteEventoDos);
    $("#ciContratanteEvento").val(respuesta[0].ciContratanteEvento);
    $("#emailContratanteEvento").val(respuesta[0].emailContratanteEvento);
    $("#homenajeadoEventoUno").val(respuesta[0].homenajeadoEvento);
    $("#colegioHomenajeadoEventoUno").val(respuesta[0].colegioHomenajeadoEvento);
    $("#edadHomenajeadoEventoUno").val(respuesta[0].edadHomenajeadoEvento);

    $("#cantidadNinosEvento").val(cantidadNinos);
    $("#menuNino").val();
    $("#cantidadMenuNino").val();
    $("#menuNinoDos").val();
    $("#cantidadMenuNinoDos").val();

    $("#cantidadAdultosEvento").val();
    $("#menuAdulto").val();
    $("#cantidadMenuAdulto").val();
    $("#menuAdultooDos").val();
    $("#cantidadMenuAdultoDos").val();
}