/*login*/
$("#logUser").click(login);
/*elegir tipo de menu*/
$("#elegirMenu").click(elegirTipoMenu);
/*agregar menu*/
$("#agregarMenu").click(agregarMenu);
/*editar menu*/
$("#editarMenu").click(modificarMenu);


var token;
var id;




function login () {
    var Password = $("#Password").val();
    var User = $("#User").val();
    $.ajax ({
        url: "http://localhost/test/api/login.php",
        type: "POST",
        dataType: "json",
        data: {
            User,
            Password
        },
        success: mostrarDatosLogin,
        error: mostrarErrorLogin
    });
}

function mostrarDatosLogin (respuesta) {
    // console.log(respuesta); 
    token = respuesta.Token;
    localStorage.setItem('token', token);
    document.getElementById('logForm').submit();
} 
//FIN LOGUEO




function elegirTipoMenu () {
    var tipoMenu = $('#categoria').val();
    switch (tipoMenu) {
        case '1':
            $(".adulto").hide();
            $(".ninio").show();
            break;
        case '2':
            $(".adulto").show();
            $(".ninio").hide();
            break;
        case '0':
            $(".ninio").show();
            $(".adulto").show();
            break;
    }
}



function agregarMenu () {
    var NombreMenu=$("#NombreMenu").val();
    var DescripcionMenu=$("#DescripcionMenu").val();
    var PrecioMenu=$("#PrecioMenu").val();
    var IDCategoria=$("#IDCategoria").val();
    token=localStorage.getItem('token');    


    if (NombreMenu === "" || PrecioMenu === "" || IDCategoria === "") {
        $(".alert-danger").show();
        $("#msjDanger").html("Debe completar los datos obligatorios");
    } else {
        $.ajax ({
            url: "http://localhost/test/api/gastronomiaBE.php",
            headers: {
                Token:token
            },
            type: "POST",
            dataType: "json",
            data: {
                NombreMenu,
                DescripcionMenu,
                PrecioMenu,
                IDCategoria
            },
            success: agregarMenuOk,
            error: mostrarError
        })
    }
}

function agregarMenuOk (respuesta) {
    window.location.href = "/funworld/proyecto/backend/gastronomiaBE.php?mensaje="+respuesta.mensaje;
}


function modificarMenu () {
    var IDMenu=$("#IDMenu").val();
    var NombreMenu=$("#NombreMenu").val();
    var DescripcionMenu=$("#DescripcionMenu").val();
    var PrecioMenu=$("#PrecioMenu").val();
    var IDCategoria=$("#IDCategoria").val();
    token=localStorage.getItem('token'); 
    if (DescripcionMenu==="") {
        DescripcionMenu=" ";
    }
    
   
    if (NombreMenu === "" || PrecioMenu === "" || IDCategoria === "") {
        $(".alert-danger").show();
        $("#msjDanger").html("Debe completar los datos obligatorios");
    } else {
        $.ajax ({
            url: "http://localhost/test/api/gastronomiaBE.php",
            headers: {
                Token:token
            },
            type: "PUT",
            dataType: "json",
            data: {
                IDMenu,
                NombreMenu,
                DescripcionMenu,
                PrecioMenu,
                IDCategoria
            },
            success: modificarMenuOk,
            error: mostrarErrorModificar
        })
    }
}


function modificarMenuOk (respuesta) {
    window.location.href = "/funworld/proyecto/backend/gastronomiaBE.php?mensaje="+respuesta.mensaje;
}






function mostrarErrorLogin (respuesta) {
    var error = respuesta.responseJSON.mensaje;
    $(".mensajeError").html("<p>"+error+"</p>");
}


function mostrarErrorModificar (respuesta) {
    $(".alert-danger").show();
    $("#msjDanger").html("No se puede mostrar el registro");
}


function mostrarError (respuesta) {
    // console.log(respuesta);
    $(".alert-danger").show();
    $("#msjDanger").html(respuesta.responseJSON.mensaje);
}


