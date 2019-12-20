<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product - Dashboard Template</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="bg02">
    <div class="container">
        <!-- alerta success -->
        <div class="alert alert-success" role="alert">
            <span id='msjSuccess'>This is a success alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="alert alert-danger" role="alert">
            <span id='msjDanger'>This is a success alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php include 'header.php' ?>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12" style="margin: 0 auto;">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Editar Menu</h2>
                            <p style="font-size: 0.8em; margin-top: -1em;"><span class="obligatorio">* </span>Datos obligatorios</p>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-12 col-lg-12 col-md-12" style="margin-left: -7px;">
                            <form class="materialForm material" id="enviarEvento">
                                <div class="form-group">
                                    <!-- seña -->
                                    <p id="seña" style="margin: 0.4rem;">Seña</p>
                                    <div class="form-row rowSena">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="señaEvento" id="señaSi" value=1>
                                            <label class="form-check-label" for="señaSi">Si</label>
                                            <i><span id="mostrarSena"></span></i>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="señaEvento" id="señaNo" value=0>
                                            <label class="form-check-label" for="señaNo">No</label>
                                        </div>
                                        <input type="number" name="montoSeña" id="montoSeña" placeholder="Monto U$" required>
                                    </div>

                                    <hr>
                                    <?php
                                    $idModificar = $_GET['idModificar'];
                                    echo "<input type='hidden' name='IDMenu' id='IDMenu' value='${idModificar}'>";
                                    ?>
                                    <!-- salon -->
                                    <p style="margin: 0.4rem">Salón</p>
                                    <select id="salonEvento">
                                        <option value="">-- Elegir --</option>
                                        <option value="1">Fantasy</option>
                                        <option value="2">Magic</option>
                                    </select>
                                    <!-- nombre contratante -->
                                    <div class="form-row">
                                        <p>Nombre del contratante</p>
                                        <input type="text" name="contratanteEvento" id="contratanteEvento">
                                    </div>
                                    <!-- direccion -->
                                    <div class="form-row">
                                        <p>Direccion</p>
                                        <input type="text" name="direccionContratanteEvento" id="direccionContratanteEvento">
                                    </div>
                                    <!-- tel fijo -->
                                    <div class="form-row">
                                        <p>Teléfono fijo</p>
                                        <input type="text" name="telFijoContratanteEvento" id="telFijoContratanteEvento">
                                    </div>
                                    <!-- tel movil -->
                                    <div class="form-row">
                                        <p>Teléfono Movil</p>
                                        <input type="text" name="telMovilContratanteEventoUno" id="telMovilContratanteEventoUno">
                                    </div>
                                    <!-- tel movil -->
                                    <div class="form-row">
                                        <p>Teléfono Movil 2</p>
                                        <input type="text" name="telMovilContratanteEventoDos" id="telMovilContratanteEventoDos">
                                    </div>
                                    <!-- cedula -->
                                    <div class="form-row">
                                        <p>Cédula de identidad</p>
                                        <input type="number" name="ciContratanteEvento" id="ciContratanteEvento">
                                    </div>
                                    <!-- email -->
                                    <div class="form-row">
                                        <p>Email</p>
                                        <input type="email" name="emailContratanteEvento" id="emailContratanteEvento">
                                    </div>

                                    <hr>
                                    <!-- nombre homenajeado -->
                                    <div class="form-row">
                                        <p>Nombre del homenajeado</p>
                                        <input type="text" name="homenajeadoEventoUno" id="homenajeadoEventoUno">
                                    </div>
                                    <!-- colegio homenajeado -->
                                    <div class="form-row">
                                        <p>Colegio del homenajeado</p>
                                        <input type="text" name="colegioHomenajeadoEventoUno" id="colegioHomenajeadoEventoUno">
                                    </div>
                                    <!-- edad homenajeado -->
                                    <div class="form-row">
                                        <p>Edad del homenajeado</p>
                                        <input type="number" name="edadHomenajeadoEventoUno" id="edadHomenajeadoEventoUno">
                                    </div>
                                    <!-- <div id="homenajDos">
                                        nombre homenajeado 2 
                                        <div class="form-row">
                                            <p>Nombre del homenajeado</p>
                                            <input type="text" name="homenajeadoEventoDos" id="homenajeadoEventoDos">
                                        </div>
                                        colegio homenajeado 2
                                        <div class="form-row">
                                            <p>Colegio del homenajeado</p>
                                            <input type="text" name="colegioHomenajeadoEventoDos" id="colegioHomenajeadoEventoDos">
                                        </div>
                                         edad homenajeado 2
                                        <div class="form-row">
                                            <p>Edad del homenajeado</p>
                                            <input type="number" name="edadHomenajeadoEventoDos" id="edadHomenajeadoEventoDos">
                                        </div>
                                    </div> -->
                                    <hr>
                                    <h3 style="margin: 0.4rem;">Información del evento</h3>

                                    <!-- cantidad niños-->
                                    <div class="invitados">
                                        <p style="margin: 0.4rem;">Cantidad de niños</p>
                                        <input type="number" name="cantidadNinosEvento" id="cantidadNinosEvento" style="margin: 0.4rem;">
                                        <div class="form-row row-menu-ninos">
                                            <select name="menuNino" id="menuNino" style="width: 60%;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <input type="number" name="cantidadMenuNino" id="cantidadMenuNino">
                                        </div>
                                        <div class="form-row row-menu-ninos-dos">
                                            <select name="menuNinoDos" id="menuNinoDos" style="width: 60%;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <input type="number" name="cantidadMenuNinoDos" id="cantidadMenuNinoDos">
                                        </div>
                                        <!-- <div class="form-row row-menu-ninos-tres">
                                            <select name="menuNinoTres" id="menuNinoTres" style="width: 60%;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <input type="number" name="cantidadMenuNinoTres" id="cantidadMenuNinoTres">
                                        </div> -->
                                        <hr>
                                        <!-- cantidad adultos-->
                                        <p style="margin: 0.4rem;">Cantidad de adultos</p>
                                        <input type="number" name="cantidadAdultosEvento" id="cantidadAdultosEvento" style="margin: 0.4rem;">
                                        <div class="form-row row-menu-adulto">
                                            <select name="menuAdulto" id="menuAdulto" style="width: 60%;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <input type="number" name="cantidadMenuAdulto" id="cantidadMenuAdulto">
                                        </div>
                                        <div class="form-row row-menu-adulto-dos">
                                            <select name="menuAdultoDos" id="menuAdultoDos" style="width: 60%;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <input type="number" name="cantidadMenuAdultoDos" id="cantidadMenuAdultoDos">
                                        </div>
                                        <!-- <div class="form-row row-menu-adulto-tres">
                                            <select name="menuAdultoTres" id="menuAdultoTres" style="width: 60%;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <input type="number" name="cantidadMenuAdultoTres" id="cantidadMenuAdultoTres">
                                        </div> -->
                                    </div>
                                    <hr>
                                    <!-- cantidad mozos, animadores -->
                                    <!-- horas -->
                                    <p style="margin-top: 1em; margin: 0.4rem;">Horas extra</p>
                                    <input type="number" class="cantidadHorasExtra" value="0" style="margin: 0.4rem;" />
                                    <!-- mozos -->
                                    <p style="margin-top: 1em; margin: 0.4rem;">Mozos</p>
                                    <input type="number" class="cantidadMozos" value="0" style="margin: 0.4rem;" />
                                    <!-- animadores -->
                                    <p style="margin-top: 1em; margin: 0.4rem;">Animadores</p>
                                    <input type="number" class="cantidadAnimadores" value="0" style="margin: 0.4rem;" />
                                    <hr>
                                    <!-- colores -->
                                    <input type="text" name="coloresEvento" id="coloresEvento" placeholder="Colores del evento" style="margin: 0.4rem;">
                                    <!-- traen contratantes -->
                                    <p></p>
                                    <textarea style="margin: 0.4rem; width: 100%" name="traenContratantes" id="traenContratantes" cols="30" rows="10" placeholder="Traen los contratantes"></textarea>
                                    <hr>
                                    <!-- servicio adicionales -->

                                    <div class="servAdicionales">
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Helados: 50 conos de helado" id="servicio1">
                                            <label class="form-check-label" for="servicio1">
                                                Helados: 50 conos de helado
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="" id="servicio2">
                                            <label class="form-check-label" for="servicio2">
                                                Helados: 50 conos con confites
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="" id="servicio3">
                                            <label class="form-check-label" for="servicio3">
                                                Helados: Canilla libre de conos
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Helados: Canilla libre de conos con confites y salsa" id="servicio4">
                                            <label class="form-check-label" for="servicio4">
                                                Helados: Canilla libre de conos con confites y salsa
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Helados: 50 copas con salsa y confites" id="servicio5">
                                            <label class="form-check-label" for="servicio5">
                                                Helados: 50 copas con salsa y confites
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Helados: Canilla libre de copas" id="servicio6">
                                            <label class="form-check-label" for="servicio6">
                                                Helados: Canilla libre de copas
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Pop: 50 conos" id="servicio7">
                                            <label class="form-check-label" for="servicio7">
                                                Pop: 50 conos
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Pop: Canilla libre" id="servicio8">
                                            <label class="form-check-label" for="servicio8">
                                                Pop: Canilla libre
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Postres 1" id="servicio9">
                                            <label class="form-check-label" for="servicio9">
                                                Postres 1
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Postres 2" id="servicio10">
                                            <label class="form-check-label" for="servicio10">
                                                Postres 2
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Postres 3" id="servicio11">
                                            <label class="form-check-label" for="servicio11">
                                                Postres 3
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="DJ" id="servicio12">
                                            <label class="form-check-label" for="servicio12">
                                                DJ
                                            </label>
                                        </div>

                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Inflable" id="servicio13">
                                            <label class="form-check-label" for="servicio13">
                                                Inflable
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Sillas vestidas" id="servicio14">
                                            <label class="form-check-label" for="servicio14">
                                                Sillas vestidas
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin: 0.7em 0; margin-left: 0.4rem; ">
                                            <input class="form-check-input" type="checkbox" value="Torta temática al evento" id="servicio15">
                                            <label class="form-check-label" for="servicio15">
                                                Torta temática al evento
                                            </label>
                                        </div>
                                    </div>

                                    <textarea style="margin: 0.4rem; width: 100%" name="comentServiciosAdicionales" id="comentServiciosAdicionales" cols="30" rows="10" placeholder="Comentarios servicios adicionales"></textarea>
                                    <hr>
                                    <textarea style="margin: 0.4rem; width: 100%" name="aclaracionesEvento" id="aclaracionesEvento" cols="30" rows="10" placeholder="Aclaraciones"></textarea>

                                    <div class="bebidas">


                                    </div>
                                    <div class="btnSubmit">
                                        <button type="submit" id="enviarFormDos" class="btn btn-primary">Siguiente</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" style="display:none;" />
                                <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();" />
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        $(".alert-success").hide();
        $(".alert-danger").hide();
    </script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/codigo.js"></script>
    <script src="js/codigoModificarEventos.js"></script>    
    <script>
        $(".alert-success").hide();
        $(".alert-danger").hide();
    </script>


</body>

</html>