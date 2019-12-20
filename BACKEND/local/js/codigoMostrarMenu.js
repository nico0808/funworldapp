token=localStorage.getItem('token');

mostrarMenu();

function mostrarMenu () {
    $("#tablaProductos").html("");
    $.ajax ({
        url: "http://localhost/test/api/gastronomiaBE.php",
        headers: {
            Token:token
        },
        type: "GET",
        dataType: "json",
        data: {
            idCategoria:'-1'
        },
        success: mostrarMenuDatos,
        error: mostrarError
    })
    

}


function mostrarMenuDatos (respuesta) {
    var cat;
    for (var i=0; i<respuesta.menu.length; i++) {
        switch (respuesta.menu[i].IDCategoria) {
            case '1':
                cat="ninio";
                break;
            case '2':
                cat="adulto";
                break;
            default:
                cat="";
                break;
        }
        $("#tablaProductos").append(`<tr class='${cat}'>
            <td class="tm-product-name">${respuesta.menu[i].NombreMenu}</td>
            <td class="text-center">${respuesta.menu[i].PrecioMenu}</td>
            <td><i class="fas fa-trash-alt tm-trash-icon borrarBtn" onclick="borrarFuncion(${respuesta.menu[i].IDMenu})"></i></td>
            <td><a href='edit-product.php?idModificar=${respuesta.menu[i].IDMenu}'><i class="fas fa-edit tm-edit-icon editBtn"></i></a></td>
        </tr>`);
    }
    
}

