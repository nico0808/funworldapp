levantarDatos();

function levantarDatos () {
    /*levanta id a modificar por get*/
    function getSearchParameters() {
            var prmstr = window.location.search.substr(1);
            return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
    }
  
    function transformToAssocArray( prmstr ) {
        var params = {};
        var prmarr = prmstr.split("&");
        for ( var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = tmparr[1];
        }
        return params;
    }
    
    var params = getSearchParameters();

    var IDMenu = params.idModificar;
    token=localStorage.getItem('token');  
    
    /*consulta para borrar*/

    $.ajax ({
        url: "http://localhost/test/api/gastronomiaBE.php",
        headers: {
            Token:token
        },
        type: "GET",
        dataType: "json",
        data: {
            IDMenu:IDMenu,
        },
        success: mostrarMenuModificar,
        error: mostrarError
    })
 
}


function mostrarMenuModificar (respuesta) {

    $("#NombreMenu").val(respuesta.menu[0].NombreMenu);
    $("#PrecioMenu").val(respuesta.menu[0].PrecioMenu);
    $("#DescripcionMenu").val(respuesta.menu[0].DescripcionMenu);
    $("#IDMenu").val(respuesta.menu[0].IDMenu);
    $("#IDCategoria").val(respuesta.menu[0].IDCategoria);
    
}