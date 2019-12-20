<?php
include 'conexion.php';

$metodo = $_SERVER["REQUEST_METHOD"];

$dev = array();

switch ($metodo) {
    case 'POST':
        $fechaEvento = filter_input(INPUT_POST, "fechaEvento");
        $salonEvento = filter_input(INPUT_POST, "salonEvento");
        $tipoEvento = filter_input(INPUT_POST, "tipoEvento");
        $horaInicio = filter_input(INPUT_POST, "horaInicio");
        $horaFin = filter_input(INPUT_POST, "horaFin");
        $señaEvento = filter_input(INPUT_POST, "señaEvento");
        $montoSeña = filter_input(INPUT_POST, "montoSeña");

        $contratanteEvento = filter_input(INPUT_POST, "contratanteEvento");
        $direccionContratanteEvento = filter_input(INPUT_POST, "direccionContratanteEvento");
        $telFijoContratanteEvento = filter_input(INPUT_POST, "telFijoContratanteEvento");
        $telMovilContratanteEventoUno = filter_input(INPUT_POST, "telMovilContratanteEventoUno");
        $telMovilContratanteEventoDos = filter_input(INPUT_POST, "telMovilContratanteEventoDos");
        $ciContratanteEvento = filter_input(INPUT_POST, "ciContratanteEvento");
        $emailContratanteEvento = filter_input(INPUT_POST, "emailContratanteEvento");

        $homenajeadoEventoUno = filter_input(INPUT_POST, "homenajeadoEventoUno");
        $colegioHomenajeadoEventoUno = filter_input(INPUT_POST, "colegioHomenajeadoEventoUno");
        $edadHomenajeadoEventoUno = filter_input(INPUT_POST, "edadHomenajeadoEventoUno");
        $homenajeadoEventoDos = filter_input(INPUT_POST, "homenajeadoEventoDos");
        $colegioHomenajeadoEventoDos = filter_input(INPUT_POST, "colegioHomenajeadoEventoDos");
        $edadHomenajeadoEventoDos = filter_input(INPUT_POST, "edadHomenajeadoEventoDos");

        $IDVisita = filter_input(INPUT_POST, "IDVisita");

        $consultaInsertarCliente = "INSERT INTO `clientes` (`IDCliente`, `contratanteEvento`, `direccionContratanteEvento`, `telFijoContratanteEvento`, `telMovilContratanteEventoUno`, `telMovilContratanteEventoDos`, `ciContratanteEvento`, `emailContratanteEvento`) VALUES ('', '$contratanteEvento', '$direccionContratanteEvento', '$telFijoContratanteEvento', '$telMovilContratanteEventoUno', '$telMovilContratanteEventoDos', '$ciContratanteEvento', '$emailContratanteEvento')";
        $resultadoInsertarCliente = mysqli_query($db, $consultaInsertarCliente) or die(mysqli_error($db));


        if ($resultadoInsertarCliente) {
            $IDCliente = mysqli_insert_id($db);

            $consultaBuscarCliente = "SELECT * FROM `clientes` WHERE `IDCliente` LIKE '$IDCliente'";
            $resultadoBuscarCliente = mysqli_query($db, $consultaBuscarCliente);
            $datosCliente = mysqli_fetch_array($resultadoBuscarCliente);
            $IDCliente = $datosCliente["IDCliente"];
        }

        $consultaInsertarEvento = "INSERT INTO `eventos` (`IDEvento`, `IDVisita`, `IDSalon`, `fechaEvento`, `tipoEvento`, `horaInicio`, `horaFin`, `señaEvento`, `montoSeña`, `IDCliente`) VALUES ('', '$IDVisita', '$salonEvento', '$fechaEvento', '$tipoEvento', '$horaInicio', '$horaFin', '$señaEvento', '$montoSeña', '$IDCliente')";
        $resultadoInsertarEvento = mysqli_query($db, $consultaInsertarEvento);


        if ($resultadoInsertarEvento) {
            $IDEvento = mysqli_insert_id($db);


            $consultaBuscarEvento = "SELECT * FROM `eventos` WHERE `IDEvento` LIKE '$IDEvento'";
            $resultadoBuscarEvento = mysqli_query($db, $consultaBuscarEvento);
            $datosEvento = mysqli_fetch_array($resultadoBuscarEvento);
            $IDEvento = $datosEvento["IDEvento"];
        }



        $consultaInsertarHomenajeado = "INSERT INTO `homenajeados` (`IDHomenajeado`, `IDEvento`, `homenajeadoEvento`, `colegioHomenajeadoEvento`, `edadHomenajeadoEvento`) VALUES ('', '$IDEvento', '$homenajeadoEventoUno', '$colegioHomenajeadoEventoUno', '$edadHomenajeadoEventoUno')";
        $resultadoInsertarHomenajeado = mysqli_query($db, $consultaInsertarHomenajeado);


        if ($homenajeadoEventoDos != NULL || $homenajeadoEventoDos != "") {
            $consultaInsertarHomenajeadoDos = "INSERT INTO  `homenajeados` (`IDHomenajeado`, `IDEvento`, `homenajeadoEvento`, `colegioHomenajeadoEvento`, `edadHomenajeadoEvento`) VALUES ('', '$IDEvento', '$homenajeadoEventoDos', '$colegioHomenajeadoEventoDos', '$edadHomenajeadoEventoDos')";
            $resultadoInsertarHomenajeadoDos = mysqli_query($db, $consultaInsertarHomenajeadoDos);
        }

        break;

    case 'GET':
        $IDEvento = filter_input(INPUT_GET, "IDEvento");

        // $consultaEventoFormDos = "SELECT * FROM `eventos` WHERE `IDEvento` LIKE '$IDEvento'";

        $consultaEventoFormDos = "SELECT *, e.IDEvento AS IDEvent
        FROM `eventos` AS e
        INNER JOIN `clientes` AS c ON e.IDCliente = c.IDCliente
        INNER JOIN `salon` AS s ON e.IDSalon = s.IDSalon
        LEFT JOIN `servicios_evento` AS se ON se.IDEvento = e.IDEvento
        WHERE e.IDEvento LIKE '$IDEvento'";
        $resultadoEventoFormDos = mysqli_query($db, $consultaEventoFormDos);

        $cantidadEvento = mysqli_affected_rows($db);

        $consultaHomenajeadosFormDos = "SELECT *
        FROM `homenajeados` AS h
        WHERE h.IDEvento LIKE '$IDEvento'";
        $resultadoHomenajeadosFormDos = mysqli_query($db, $consultaHomenajeadosFormDos);

        $cantidadHomenajeado = mysqli_affected_rows($db);

        $consultaAdicionalesFormDos = "SELECT *
        FROM `adicionales_evento` AS ae
        WHERE ae.IDEvento LIKE '$IDEvento'";
        $resultadoAdicionalesFormDos = mysqli_query($db, $consultaAdicionalesFormDos);

        $cantidadAdicional = mysqli_affected_rows($db);


        if ($cantidadEvento != 0) {
            $mostrarEvento = array();
            while ($fila = mysqli_fetch_assoc($resultadoEventoFormDos)) {
                array_push($mostrarEvento, $fila);
            }
            $mostrarEvento[0]['homenajeado'] = array();
            if ($cantidadHomenajeado != 0) {
                $homenajeadoEvento = array();
                while ($fila = mysqli_fetch_assoc($resultadoHomenajeadosFormDos)) {
                    array_push($homenajeadoEvento, $fila);
                }
                $mostrarEvento[0]['homenajeado'] = $homenajeadoEvento;
            }
            $mostrarEvento[0]['adicionales'] = array();
            if ($cantidadAdicional != 0) {
                $adicionalEvento = array();
                while ($fila = mysqli_fetch_assoc($resultadoAdicionalesFormDos)) {
                    array_push($adicionalEvento, $fila);
                }
                $mostrarEvento[0]['adicionales'] = $adicionalEvento;
            }
            $dev = $mostrarEvento;
        }
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $infoPut);
        //  evento
        $IDEvento = $infoPut["IDEvento"];
        $señaEvento = $infoPut["señaEvento"];
        $montoSeña = $infoPut["montoSeña"];
        $precioEvento = $infoPut["precioEvento"];

        // cliente
        $IDCliente = $infoPut["IDCliente"];
        $contratanteEvento = $infoPut["contratanteEvento"];
        $direccionContratanteEvento = $infoPut["direccionContratanteEvento"];
        $telFijoContratanteEvento = $infoPut["telFijoContratanteEvento"];
        $telMovilContratanteEventoUno = $infoPut["telMovilContratanteEventoUno"];
        $telMovilContratanteEventoDos = $infoPut["telMovilContratanteEventoDos"];
        $ciContratanteEvento = $infoPut["ciContratanteEvento"];
        $emailContratanteEvento = $infoPut["emailContratanteEvento"];

        // homenajeado
        $IDHomenajeadoUno = $infoPut["IDHomenajeadoUno"];
        $IDHomenajeadoDos = $infoPut["IDHomenajeadoDos"];
        $homenajeadoEventoUno = $infoPut["homenajeadoEventoUno"];
        $colegioHomenajeadoEventoUno = $infoPut["colegioHomenajeadoEventoUno"];
        $edadHomenajeadoEventoUno = $infoPut["edadHomenajeadoEventoUno"];
        $homenajeadoEventoDos = $infoPut["homenajeadoEventoDos"];
        $colegioHomenajeadoEventoDos = $infoPut["colegioHomenajeadoEventoDos"];
        $edadHomenajeadoEventoDos = $infoPut["edadHomenajeadoEventoDos"];



        $consultaPutCliente = "UPDATE `clientes` SET `contratanteEvento` = '$contratanteEvento', `direccionContratanteEvento` = '$direccionContratanteEvento', `telFijoContratanteEvento` = '$telFijoContratanteEvento', `telMovilContratanteEventoUno` = '$telMovilContratanteEventoUno', `telMovilContratanteEventoDos` = '$telMovilContratanteEventoDos', `ciContratanteEvento` = '$ciContratanteEvento', `emailContratanteEvento` = '$emailContratanteEvento' WHERE `clientes`.`IDCliente` = '$IDCliente'";
        $resultadoPutCliente = mysqli_query($db, $consultaPutCliente) or die(mysqli_error($db));

        $consultaPutEvento = "UPDATE `eventos` SET `señaEvento` = '$señaEvento', `montoSeña` = '$montoSeña', `precioEvento` = '$precioEvento' WHERE `eventos`.`IDEvento` = '$IDEvento'";
        $resultadoPutEvento = mysqli_query($db, $consultaPutEvento);

        $consultaPutHomenajeado = "UPDATE `homenajeados` SET `homenajeadoEvento` = '$homenajeadoEventoUno', `colegioHomenajeadoEvento` = '$colegioHomenajeadoEventoUno', `edadHomenajeadoEvento` = '$edadHomenajeadoEventoUno' WHERE `homenajeados`.`IDHomenajeado` = '$IDHomenajeadoUno'";
        $resultadoPutHomenajeado = mysqli_query($db, $consultaPutHomenajeado);

        if ($homenajeadoEventoDos != NULL || $homenajeadoEventoDos != "") {
            $consultaPutHomenajeadoDos = "UPDATE `homenajeados` SET `homenajeadoEvento` = '$homenajeadoEventoUno', `colegioHomenajeadoEvento` = '$colegioHomenajeadoEventoUno', `edadHomenajeadoEvento` = '$edadHomenajeadoEventoUno' WHERE `homenajeados`.`IDHomenajeado` = '$IDHomenajeadoDos'";
            $resultadoPutHomenajeadoDos = mysqli_query($db, $consultaPutHomenajeadoDos);
        }


        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $infoDelete);

        $idEliminarEvento = $infoDelete["IDEvento"];

        $consultaBorrarAevento = "DELETE FROM `adicionales_evento` WHERE `IDEvento` = " . $idEliminarEvento;
        $resultadoBorrarAevento = mysqli_query($db, $consultaBorrarAevento);

        $consultaBorrarGevento = "DELETE FROM `gastronomia_evento` WHERE `IDEvento` = " . $idEliminarEvento;
        $resultadoBorrarGevento = mysqli_query($db, $consultaBorrarGevento);

        $consultaBorrarSevento = "DELETE FROM `servicios_evento` WHERE `IDEvento` = " . $idEliminarEvento;
        $resultadoBorrarSevento = mysqli_query($db, $consultaBorrarSevento);

        $consultaBorrarEvento = "DELETE FROM `eventos` WHERE `IDEvento` = " . $idEliminarEvento;
        $resultadoBorrarEvento = mysqli_query($db, $consultaBorrarEvento);

        if ($resultadoBorrarEvento) {
            $dev["mensaje"] = "Se borro el registro con exito";
        } else {
            $dev["mensaje"] = "No se pudo borrar el registro porque no existe";
            http_response_code(400);
        }
        
        break;
    }
echo json_encode($dev);
